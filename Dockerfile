FROM php:8.3-cli-alpine

WORKDIR /app
COPY . /app
RUN chmod +x /app/galaxy && php /app/galaxy migrate
EXPOSE 8080
CMD ["php", "galaxy", "serve", "0.0.0.0", "8080"]
