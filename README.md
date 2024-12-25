# CMS Starter Template

This repository is a very opinionated CMS starter template based on my personal preferences, using Laravel and Filament. It provides a robust foundation for building content management systems with ease and efficiency.

## How to Use This Template

1. **Use the Template**: Click the "Use this template" button on the GitHub repository page to create a new repository based on this template.

2. **Clone the Repository**: Clone the newly created repository to your local machine using the following command:
    ```sh
    git clone https://github.com/your-username/your-new-repo-name.git
    ```

3. **Navigate to the Project Directory**: Move into the project directory:
    ```sh
    cd your-new-repo-name
    ```

4. **Install Dependencies**: Install the required dependencies using Composer and NPM:
    ```sh
    composer install
    npm install
    ```

5. **Set Up Environment Variables**: Copy the `.env.example` file to `.env` and configure your environment variables:
    ```sh
    cp .env.example .env
    ```

6. **Generate Application Key**: Generate a new application key:
    ```sh
    php artisan key:generate
    ```

7. **Run Migrations**: Run the database migrations to set up the database schema:
    ```sh
    php artisan migrate
    ```

8. **Serve the Application**: Start the local development server:
    ```sh
    php artisan serve
    ```

## Installation Instructions for Local Development

1. **Ensure System Requirements**: Make sure you have the following installed on your local machine:
    - PHP >= 8.1
    - Composer
    - Node.js & NPM
    - MySQL or any other supported database

2. **Use the Template**: Click the "Use this template" button on the GitHub repository page to create a new repository based on this template.

3. **Clone the Repository**: Clone the newly created repository to your local machine:
    ```sh
    git clone https://github.com/your-username/your-new-repo-name.git
    ```

4. **Navigate to the Project Directory**: Move into the project directory:
    ```sh
    cd your-new-repo-name
    ```

5. **Install PHP Dependencies**: Install the PHP dependencies using Composer:
    ```sh
    composer install
    ```

6. **Install JavaScript Dependencies**: Install the JavaScript dependencies using NPM:
    ```sh
    npm install
    ```

7. **Set Up Environment Variables**: Copy the `.env.example` file to `.env` and configure your environment variables:
    ```sh
    cp .env.example .env
    ```

8. **Generate Application Key**: Generate a new application key:
    ```sh
    php artisan key:generate
    ```

9. **Run Database Migrations**: Run the database migrations to set up the database schema:
    ```sh
    php artisan migrate
    ```

10. **Start the Development Server**: Serve the application locally:
    ```sh
    php artisan serve
    ```

You should now be able to access the application at `http://localhost:8000`.

Enjoy building your CMS with Laravel 11 and Filament 3!
