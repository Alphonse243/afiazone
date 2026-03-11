#  AfiaZone - Medical Marketplace with Health E-Wallet

A comprehensive digital healthcare marketplace platform connecting clinics, pharmacies, laboratories, doctors, and patients.

## Documentation

- **Project Documentation**: [ docs/afiazone.md](docs/afiazone.md)
- **Development Plan**: [ docs/plan.md](docs/plan.md)
- **Complete Development Plan**: [ docs/PLAN-COMPLET.md](docs/PLAN-COMPLET.md)
- **Laragon Setup Guide**: [ docs/LARAGON-SETUP.md](docs/LARAGON-SETUP.md) ← Start here for local development

## Quick Start

### Prerequisites - Laragon Setup (Recommended)

- **Laragon** (installed and running)
- PHP 8.1+ (comes with Laragon)
- MySQL 8.0+ (comes with Laragon)
- Composer 2.0+ (comes with Laragon)
- Node.js 18+ (For frontend assets - optional)

### Setup with Laragon (Recommended)

1. **Navigate to your project**

   ```bash
   cd C:\laragon\www\afiazone
   ```

2. **Copy environment file**

   ```bash
   copy .env.example .env
   # Or: cp .env.example .env (if using GitBash)
   ```

3. **Run setup script**

   ```bash
   php bin/setup.php
   ```

   This will:
   - Install PHP dependencies via Composer
   - Create the database and tables
   - Generate APP_KEY
   - Set up upload directories

4. **Configure Laragon virtual host**
   - Edit `C:\laragon\etc\hosts` and add:

     ```
     127.0.0.1 afiazone.test
     ```

   - Edit `C:\laragon\etc\nginx\conf.d\vhosts.conf` and add:

     ```nginx
     server {
         listen 8888;
         server_name afiazone.test;
         root "C:/laragon/www/afiazone";
         index index.php index.html;

         location / {
             try_files $uri $uri/ /index.php?$query_string;
         }

         location ~ \.php$ {
             fastcgi_pass 127.0.0.1:9000;
             fastcgi_index index.php;
             include fastcgi_params;
             fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
         }
     }
     ```

5. **Restart Laragon**
   - In Laragon: Click **Stop All**, then **Start All**
   - Access your app at: **http://afiazone.test**
   - Entry point: `index.php` at the root serves as the application entry point

##  Project Structure

```
afiazone/
├── app/                          # Application code
│   ├── Controllers/              # Request handlers
│   ├── Models/                   # Data models
│   ├── Services/                 # Business logic
│   ├── Repositories/             # Data access layer
│   ├── Middleware/               # Request middleware
│   ├── Validators/               # Input validation
│   ├── Exceptions/               # Custom exceptions
│   └── helpers.php               # Helper functions
├── config/                       # Configuration files
│   ├── app.php                   # App configuration
│   ├── database.php              # Database configuration
│   ├── services.php              # Services configuration
│   └── ...
├── database/                     # Database files
│   ├── migrations/               # Migration files
│   ├── seeds/                    # Database seeders
│   └── schema.sql                # Initial schema
├── public/                      # Public assets directory
│   ├── uploads/                  # User upload files
│   └── ...
├── routes/                       # Route definitions
│   ├── api.php                   # API routes
│   └── web.php                   # Web routes
├── resources/                    # Frontend resources
│   ├── views/                    # HTML templates
│   ├── css/                      # Stylesheets
│   └── js/                       # JavaScript files
├── storage/                      # Temporary files
│   ├── logs/                     # Application logs
│   └── cache/                    # Cached files
├── tests/                        # Test files
│   ├── Unit/                     # Unit tests
│   └── Integration/              # Integration tests
├── docs/                         # Documentation
├── composer.json                 # PHP dependencies
├── .env.example                  # Environment variables template
├── .gitignore                    # Git ignore rules
├── README.md                     # This file
└── index.php                     # Entry point
```

##  Available Commands

### Development

```bash
# Start development server
composer serve

# Run PHP code formatter
composer format

# Check code style
composer lint

# Run PHP static analysis
composer phpstan

# Run Psalm analysis
composer psalm

# Run unit tests
composer phpunit

# Run all checks (lint, phpstan, psalm, tests)
composer test
```

### Database

```bash
# Run migrations
php bin/migrate.php

# Seed database
php bin/seed.php

# Generate migration
php bin/make-migration.php <name>
```



## Security

- All sensitive data is environment-based (.env file)
- Database passwords and API keys should never be committed
- Enable HTTPS in production
- Use strong JWT secrets
- Implement rate limiting on API endpoints
- Validate all user inputs server-side
- Follow OWASP security guidelines

##  Database Credentials (Laragon Development)

```
MySQL:
  Host: 127.0.0.1 (localhost)
  Port: 3306
  User: root
  Password: (empty)
  Database: afiazone
```

## Testing

```bash
# Run all tests
composer test

# Run specific test file
./vendor/bin/phpunit tests/Unit/UserControllerTest.php

# Run with coverage
./vendor/bin/phpunit --coverage-html=coverage/
```

##  Email Testing

Emails are sent using PHP mail() driver in development environment.

##  File Storage

Files are stored locally in the `public/uploads/` directory.

## Git Workflow

See [CONTRIBUTING.md](CONTRIBUTING.md) for detailed contribution guidelines.

```bash
# Create feature branch
git checkout -b feature/your-feature-name

# Make commits
git commit -m "Descriptive message"

# Push and create pull request
git push origin feature/your-feature-name
```

##  API Documentation

API documentation is available at: `/api/docs`

##  Troubleshooting

### Database connection errors

Ensure Laragon MySQL is running and credentials in `.env` match:
- Host: 127.0.0.1 (localhost)
- User: root
- Password: (empty)
- Database: afiazone

### Virtual host not working

1. Verify hosts entry: `C:\laragon\etc\hosts` contains `127.0.0.1 afiazone.test`
2. Verify Nginx vhost config in `C:\laragon\etc\nginx\conf.d\vhosts.conf`
3. Restart Laragon: Click **Stop All**, then **Start All**
4. Check Laragon logs in `C:\laragon\logs\`

### Database setup issues

Run setup script again:
```bash
php bin/setup.php
```

## 📞 Support

For issues, documentation, or questions:

- Create an issue on GitHub
- Check existing documentation in `/docs`
- Review contribution guidelines in `CONTRIBUTING.md`

##  License

Proprietary - AfiaZone 2026

##  Team

AfiaZone Development Team

### Alphonse katumba 
[Alphonse243](https://github.com/Alphonse 243)
<https://github.com/Alphonse243>


---

**Last Updated**: March 2026
