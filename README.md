# Dockerized PHP Application with Hot Reload

This repository contains a Dockerized PHP application setup with hot reload functionality for PHP file changes. This setup uses Docker and Docker Compose to streamline the development environment.

## Prerequisites

Before you begin, ensure you have the following installed on your local machine:

- Docker: [Install Docker](https://docs.docker.com/get-docker/)
- Docker Compose: [Install Docker Compose](https://docs.docker.com/compose/install/)

## Getting Started

Follow these steps to set up and run the Dockerized PHP application locally:

### 1. Clone the Repository

```bash
git clone <repository-url>
cd <repository-directory>
```

### 2. Build and Start Docker Containers

Run the following command to build and start the Docker containers defined in `docker-compose.yml`:

```bash
docker-compose up --build
```

### 3. Access the Application

Open your web browser and go to `http://localhost:8080` to view the PHP application.

## Features

- **PHP Version**: PHP 7.4 with Apache server.
- **Composer**: Dependencies are managed using Composer. `composer install` is automatically run during the Docker build process to install PHPMailer and other dependencies.
- **Hot Reload**: Uses `inotifywait` to monitor PHP file changes and trigger actions like cache clearing or Apache server restart for instant updates.

## Project Structure

The project directory structure is as follows:

```
my-php-app/
├── Dockerfile
├── docker-compose.yml
└── src/
    ├── index.php
    └── composer.json
```

- `Dockerfile`: Defines the Docker image for PHP application setup.
- `docker-compose.yml`: Orchestrates multiple Docker containers (PHP and Composer).
- `src/`: Contains PHP application files (`index.php`) and `composer.json` for Composer dependencies.

## Usage

### Monitoring File Changes

To enable hot reload for PHP file changes, a `watch.sh` script is provided:

1. Enter the PHP container:
   ```bash
   docker-compose exec php bash
   ```

2. Run the `watch.sh` script:
   ```bash
   ./watch.sh
   ```

The script monitors changes in the `src/` directory and triggers actions (e.g., Apache server restart) for instant updates.

## Customization

- Modify `composer.json` in the `src/` directory to add or update PHP dependencies.
- Adjust the `Dockerfile` or `docker-compose.yml` for specific PHP configurations or additional services.

## Notes

- This setup is intended for development environments. Review security and performance considerations before deploying to production.
- Ensure proper permissions and file paths are set up, especially with volume mounts and file watching mechanisms.
