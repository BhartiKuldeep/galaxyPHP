# 🌌 GalaxyPHP

<p align="center">
  <strong>A lightweight, secure, and beginner-friendly PHP MVC starter kit.</strong>
</p>

<p align="center">
  Build modern PHP apps with clean architecture, routing, auth, validation, CSRF protection, JSON storage, CLI tools, tests, and zero database setup.
</p>

<p align="center">
  <a href="https://github.com/BhartiKuldeep/galaxyPHP">
    <img src="https://img.shields.io/badge/GitHub-galaxyPHP-181717?style=for-the-badge&logo=github" alt="GitHub Repo">
  </a>
  <img src="https://img.shields.io/badge/PHP-8.1%2B-777BB4?style=for-the-badge&logo=php" alt="PHP Version">
  <img src="https://img.shields.io/badge/Status-Active-success?style=for-the-badge" alt="Project Status">
  <img src="https://img.shields.io/badge/License-MIT-blue?style=for-the-badge" alt="License">
</p>

---

## ✨ About GalaxyPHP

**GalaxyPHP** is a clean, secure, and easy-to-understand PHP MVC starter kit created by **Bharti Kuldeep**.

It is designed for developers who want to learn or build PHP applications without starting from zero every time. GalaxyPHP gives you a small but powerful structure that includes routing, controllers, middleware, views, authentication, validation, CSRF protection, file-based storage, and CLI commands.

It is simple enough for beginners, but structured enough to be used as a foundation for real projects.

---

## 🚀 Features

- ✅ PHP 8.1+ support
- ✅ Clean MVC folder structure
- ✅ Custom router
- ✅ Route parameters
- ✅ Middleware support
- ✅ Authentication system
- ✅ Register, login, logout
- ✅ Protected dashboard
- ✅ Notes CRUD example module
- ✅ JSON file-based storage
- ✅ No database required
- ✅ CSRF protection
- ✅ Input validation
- ✅ Rate limiting
- ✅ Session handling
- ✅ API routes
- ✅ CLI commands
- ✅ Basic test runner
- ✅ Docker support
- ✅ Composer-ready autoloading
- ✅ Beginner-friendly codebase
- ✅ Production-inspired project structure

---

## 📸 Preview

GalaxyPHP includes a working web app with:

- Home page
- Register page
- Login page
- Dashboard
- Notes management
- API health endpoint
- CLI command interface

---

## 🧠 Why GalaxyPHP?

Most PHP starters are either too basic or too complex.

GalaxyPHP sits in the middle:

- Easy to understand
- Good project structure
- Security-first defaults
- No heavy framework dependency
- Works without database setup
- Great for learning MVC concepts
- Great for portfolio projects
- Easy to extend into a real app

---

## 🛠️ Requirements

Make sure your system has:

```bash
PHP >= 8.1
```

Optional but recommended:

```bash
Composer
Git
Docker
```

GalaxyPHP can run without Composer, but Composer support is included.

---

## ⚡ Quick Start

Clone the repository:

```bash
git clone https://github.com/BhartiKuldeep/galaxyPHP.git
cd galaxyPHP
```

Copy the environment file:

```bash
cp .env.example .env
```

Run setup commands:

```bash
php galaxy migrate
php galaxy seed
```

Start the development server:

```bash
php galaxy serve
```

Now open:

```text
http://localhost:8000
```

---

## 🔐 Demo Login

After running the seed command, you can log in using:

```text
Email: admin@galaxyphp.test
Password: password
```

> Change or remove demo credentials before deploying.

---

## 📁 Project Structure

```text
galaxyPHP/
├── bootstrap/
│   ├── app.php
│   └── autoload.php
│
├── config/
│   └── app.php
│
├── public/
│   └── index.php
│
├── resources/
│   └── views/
│       ├── auth/
│       ├── errors/
│       ├── layouts/
│       ├── notes/
│       └── home.php
│
├── routes/
│   ├── api.php
│   └── web.php
│
├── src/
│   ├── App/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   │   └── Models/
│   │
│   ├── Core/
│   │   ├── App.php
│   │   ├── Controller.php
│   │   ├── Request.php
│   │   ├── Response.php
│   │   ├── Router.php
│   │   ├── Session.php
│   │   ├── Validator.php
│   │   └── View.php
│   │
│   └── Support/
│       └── helpers.php
│
├── storage/
│   ├── cache/
│   ├── data/
│   └── logs/
│
├── tests/
│   └── Feature/
│
├── .env.example
├── .gitignore
├── composer.json
├── Dockerfile
├── docker-compose.yml
├── galaxy
├── LICENSE
├── Makefile
├── README.md
└── SECURITY.md
```

---

## 🌍 Web Routes

| Method | Route | Description |
|---|---|---|
| GET | `/` | Home page |
| GET | `/register` | Show register page |
| POST | `/register` | Create user account |
| GET | `/login` | Show login page |
| POST | `/login` | Authenticate user |
| POST | `/logout` | Logout user |
| GET | `/dashboard` | Protected dashboard |
| GET | `/notes` | List user notes |
| GET | `/notes/create` | Create note form |
| POST | `/notes` | Store new note |
| GET | `/notes/{id}` | View note |
| GET | `/notes/{id}/edit` | Edit note form |
| POST | `/notes/{id}` | Update note |
| POST | `/notes/{id}/delete` | Delete note |

---

## 🔌 API Routes

| Method | Route | Description |
|---|---|---|
| GET | `/api/health` | App health check |
| GET | `/api/version` | App version info |

Example:

```bash
curl http://localhost:8000/api/health
```

Response:

```json
{
  "status": "ok",
  "app": "GalaxyPHP"
}
```

---

## 🧰 CLI Commands

GalaxyPHP includes a small command-line tool.

Show available commands:

```bash
php galaxy
```

Run migrations:

```bash
php galaxy migrate
```

Seed demo data:

```bash
php galaxy seed
```

Start local server:

```bash
php galaxy serve
```

Run tests:

```bash
php galaxy test
```

---

## 🧪 Testing

Run the test suite:

```bash
php galaxy test
```

Expected result:

```text
Tests passed successfully.
```

You can add more tests inside:

```text
tests/
```

---

## ⚙️ Configuration

Application settings are stored in:

```text
config/app.php
```

Environment values are stored in:

```text
.env
```

Example `.env`:

```env
APP_NAME=GalaxyPHP
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000
APP_KEY=change-this-secret-key
```

Never commit your real `.env` file.

---

## 💾 Storage

GalaxyPHP uses JSON file storage by default.

Data is stored inside:

```text
storage/data/
```

This makes the project easy to run without MySQL, SQLite, PostgreSQL, or any database server.

Useful for:

- Learning projects
- Small demos
- Portfolio apps
- Prototypes
- Teaching MVC concepts

For production apps, you can replace the JSON storage layer with MySQL, PostgreSQL, or SQLite.

---

## 🔒 Security Features

GalaxyPHP includes several built-in security basics:

- Password hashing using PHP password functions
- CSRF token protection
- Session-based authentication
- Rate limiting support
- Escaped output helpers
- Basic validation layer
- Protected routes with middleware
- Safe redirect helpers

Security files included:

```text
SECURITY.md
```

---

## 🐳 Docker Usage

Build and run with Docker:

```bash
docker compose up --build
```

Then open:

```text
http://localhost:8000
```

Stop containers:

```bash
docker compose down
```

---

## 🧱 Built With

- PHP
- MVC architecture
- Native sessions
- JSON storage
- Custom router
- Custom validation
- No heavy framework dependency

---

## 📦 Composer Support

GalaxyPHP includes a `composer.json` file.

Install dependencies if needed:

```bash
composer install
```

Regenerate autoload files:

```bash
composer dump-autoload
```

The project is designed to work even without Composer, but Composer support makes it easier to extend.

---

## 🧩 How to Add a New Page

Create a controller method:

```php
public function about(): string
{
    return view('about', [
        'title' => 'About GalaxyPHP',
    ]);
}
```

Create a view:

```text
resources/views/about.php
```

Add a route:

```php
$router->get('/about', [PageController::class, 'about']);
```

Visit:

```text
http://localhost:8000/about
```

---

## 🧩 How to Add a New Module

Example module: `Tasks`

Suggested files:

```text
src/App/Controllers/TaskController.php
src/App/Models/Task.php
resources/views/tasks/index.php
resources/views/tasks/create.php
resources/views/tasks/edit.php
```

Suggested routes:

```php
$router->get('/tasks', [TaskController::class, 'index']);
$router->get('/tasks/create', [TaskController::class, 'create']);
$router->post('/tasks', [TaskController::class, 'store']);
$router->get('/tasks/{id}/edit', [TaskController::class, 'edit']);
$router->post('/tasks/{id}', [TaskController::class, 'update']);
$router->post('/tasks/{id}/delete', [TaskController::class, 'destroy']);
```

---

## 🚀 Deployment Notes

Before deploying:

- Set `APP_ENV=production`
- Set `APP_DEBUG=false`
- Use a strong `APP_KEY`
- Remove demo users
- Protect the `storage/` directory
- Point your web server to the `public/` directory
- Do not expose root project files publicly
- Do not commit `.env`

Recommended public document root:

```text
public/
```

---

## 🧹 Files You Should Not Commit

These should stay ignored:

```text
.env
vendor/
storage/cache/*
storage/data/*.json
storage/logs/*.log
```

Keep these placeholder files:

```text
storage/cache/.gitkeep
storage/data/.gitkeep
storage/logs/.gitkeep
```

---

## 🗺️ Roadmap

Planned improvements:

- Database driver support
- Migration system
- Blade-like template engine
- Better test utilities
- API token authentication
- Admin dashboard
- Role-based access control
- Package installer
- Form request classes
- Better error pages
- Project scaffolding commands

---

## 🤝 Contributing

Contributions are welcome.

Steps:

```bash
fork the repository
create a new branch
make your changes
run tests
open a pull request
```

Branch example:

```bash
git checkout -b feature/add-task-module
```

Commit example:

```bash
git commit -m "Add task module"
```

Push example:

```bash
git push origin feature/add-task-module
```

---

## 🐛 Reporting Issues

If you find a bug, please open an issue with:

- Clear title
- Steps to reproduce
- Expected behavior
- Actual behavior
- PHP version
- Screenshots if useful

---

## 👨‍💻 Author

**Bharti Kuldeep**

GitHub: [@BhartiKuldeep](https://github.com/BhartiKuldeep)

Project: [galaxyPHP](https://github.com/BhartiKuldeep/galaxyPHP)

---

## 📄 License

This project is open-source and available under the **MIT License**.

See:

```text
LICENSE
```

---

## ⭐ Support

If you like this project, consider giving it a star on GitHub.

It helps the project grow and motivates future improvements.

<p align="center">
  <strong>Made with PHP, clean code, and curiosity by Bharti Kuldeep.</strong>
</p>
