# EasyAdminBundle Test

## Docker Development Environment

This repository includes a complete Docker-based development environment with PHP-FPM, Nginx, MySQL, and Valkey (Redis fork) for testing EasyAdminBundle in a Symfony application.

### Prerequisites

- Docker and Docker Compose installed on your system
- Git

### Getting Started

1. Clone this repository:
   ```
   git clone https://github.com/g-kari/EasyAdminBundle-test.git
   cd EasyAdminBundle-test
   ```

2. Start the Docker containers:
   ```
   docker compose up -d
   ```

3. Set up the database:
   ```
   docker compose exec app php bin/console doctrine:database:create
   docker compose exec app php bin/console doctrine:migrations:migrate
   ```

4. Access the EasyAdmin interface in your browser:
   ```
   http://localhost/admin
   ```

### Environment Details

- **PHP-FPM**: PHP 8.2 with common extensions required for Symfony
- **Nginx**: Latest stable version configured to serve PHP applications
- **MySQL**: Version 8.0 with persistent storage
- **Valkey**: Redis-compatible in-memory data store

### Database Connection

- Host: `localhost` (from host) or `db` (from containers)
- Port: `3306`
- Username: `statamic`
- Password: `secret`
- Database: `statamic`

### EasyAdminBundle Features

The demo includes:

1. A Product entity with fields:
   - Name
   - Description
   - Price
   - Created At
   - Is Published

2. A fully functional admin interface for:
   - Viewing all products
   - Creating new products
   - Editing existing products
   - Deleting products

### Troubleshooting

If you encounter any issues:

1. Check container logs:
   ```
   docker compose logs
   ```

2. Verify all containers are running:
   ```
   docker compose ps
   ```

3. Restart all containers:
   ```
   docker compose restart
   ```