# phoenix-enterprise-core

Phoenix Creator Team — Enterprise Core Repository
Slogan: "Rise Above the Ordinary"

This repository is an enterprise-ready scaffold for the Phoenix Creator Team platform.
It contains deployment infrastructure (Docker, docker-compose), CI/CD workflows,
NGINX configuration, and a structured Laravel-ready project layout.

> IMPORTANT: This is a scaffold. After cloning, run `composer create-project laravel/laravel .` 
or copy an existing Laravel codebase into this repo and then run `composer install`.

## What's included
- Dockerfile & docker-compose.yml (PHP-FPM, Nginx, MySQL, Redis, Workspace)
- GitHub Actions workflow for CI/CD (deploy to Droplet via SSH)
- deploy/deploy-enterprise.sh — server-side bootstrap script
- deploy/nginx_phoenix.conf — Nginx config for production
- .env.example
- README with deploy instructions

## Quickstart (recommended)
1. Clone this repo:
   ```bash
   git clone https://github.com/<your-org>/phoenix-enterprise-core.git
   cd phoenix-enterprise-core
   ```

2. Initialize Laravel (if empty):
   ```bash
   composer create-project laravel/laravel .
   ```

3. Copy `.env.example` to `.env` and edit DB and APP settings.

4. Start with Docker (local dev):
   ```bash
   docker-compose up -d --build
   docker exec -it phoenix_workspace bash
   composer install
   php artisan key:generate
   php artisan migrate --seed
   npm install
   npm run build
   ```

5. Push to GitHub and use GitHub Actions to deploy to your Droplet.

