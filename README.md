# Urlshortener

## How to setup the project

1. Clone the project
    ```shell
    git clone https://github.com/mustaphaelaqyl/Urlshortener.git
    cd url_shortener
    ```
2. Install composer dependencies
    ```shell
    composer install
    ```
    3. Install Npm dependencies
    ```shell
    npm i
    ```
3. Create e .env file and update its content if needed
    ```shell
    cp .env.example .env
    ```

4. Generate Laravel APP Key
    ```shell
    php artisan key:generate --ansi
    ```
5. Create  a data base on mysql and edit The name on .env
  ```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=urlshortener
DB_USERNAME=root
DB_PASSWORD=
  ```

6. Run migrations
    ```shell
    php artisan migrate
    ```

7. Start Laravel server
    ```shell
    php artisan serve
    ```

8. Start Node.js development server
    ```shell
    npm run dev
    ```

9. Open your browser at http://localhost:8000
