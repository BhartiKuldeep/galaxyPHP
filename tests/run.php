<?php

declare(strict_types=1);

use Galaxy\App\Repositories\NoteRepository;
use Galaxy\App\Repositories\UserRepository;
use Galaxy\Core\Config;
use Galaxy\Core\JsonStore;
use Galaxy\Core\Request;
use Galaxy\Core\Response;
use Galaxy\Core\Router;
use Galaxy\Core\Validator;

$_ENV['APP_ENV'] = 'testing';
$_ENV['APP_DEBUG'] = 'true';
$_ENV['STORAGE_PATH'] = sys_get_temp_dir() . '/galaxyphp-test-' . bin2hex(random_bytes(4));

$app = require dirname(__DIR__) . '/bootstrap/app.php';

$passed = 0;
$failed = 0;

function assert_true(bool $condition, string $message): void
{
    global $passed, $failed;

    if ($condition) {
        $passed++;
        echo "[PASS] {$message}" . PHP_EOL;
        return;
    }

    $failed++;
    echo "[FAIL] {$message}" . PHP_EOL;
}

function test(string $name, callable $callback): void
{
    try {
        $callback();
    } catch (Throwable $exception) {
        global $failed;
        $failed++;
        echo "[FAIL] {$name}: {$exception->getMessage()}" . PHP_EOL;
    }
}

test('Config can read nested values', function (): void {
    assert_true(config('app.env') === 'testing', 'config reads app.env');
});

test('JsonStore writes and reads data', function (): void {
    $store = new JsonStore(storage_path('data/test.json'));
    $store->write([['name' => 'Galaxy']]);
    assert_true($store->all()[0]['name'] === 'Galaxy', 'json store persists array data');
});

test('Validator detects invalid email and short password', function (): void {
    $validator = Validator::make(['email' => 'wrong', 'password' => '123'], [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);
    assert_true($validator->fails(), 'validator fails invalid data');
    assert_true(isset($validator->errors()['email']), 'validator returns email error');
});

test('UserRepository creates users and verifies hashed password', function (): void {
    $users = new UserRepository();
    $user = $users->create('Test User', 'test@example.com', 'secret123');
    $found = $users->findByEmail('test@example.com');
    assert_true($found['id'] === $user['id'], 'user can be found by email');
    assert_true(password_verify('secret123', $found['password_hash']), 'password is hashed and verifiable');
});

test('NoteRepository performs CRUD for a user', function (): void {
    $users = new UserRepository();
    $user = $users->create('Note User', 'note@example.com', 'secret123');
    $notes = new NoteRepository();
    $note = $notes->create($user['id'], 'First note', 'Body text', 'draft');
    assert_true(count($notes->forUser($user['id'])) === 1, 'note can be listed');
    $updated = $notes->update($note['id'], $user['id'], ['title' => 'Updated note', 'body' => 'Updated body', 'status' => 'published']);
    assert_true($updated['status'] === 'published', 'note can be updated');
    assert_true($notes->delete($note['id'], $user['id']), 'note can be deleted');
});

test('Router dispatches basic route', function (): void {
    $router = new Router();
    $router->get('/hello/{name}', fn (Request $request): Response => Response::json(['hello' => $request->route('name')]));
    $response = $router->dispatch(Request::fake('GET', '/hello/Bharti', [], ['HTTP_ACCEPT' => 'application/json']));
    assert_true($response->status() === 200, 'router returns successful response');
    assert_true(str_contains($response->content(), 'Bharti'), 'router passes route parameter');
});

test('Application routes load', function () use ($app): void {
    require dirname(__DIR__) . '/routes/web.php';
    require dirname(__DIR__) . '/routes/api.php';
    assert_true(count($app->router()->routes()) >= 10, 'app registers web and api routes');
});

echo PHP_EOL . "Passed: {$passed}, Failed: {$failed}" . PHP_EOL;

if ($failed > 0) {
    exit(1);
}
