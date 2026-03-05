# 🤝 Contributing to AfiaZone

First off, thank you for considering a contribution to AfiaZone! It's people like you that make AfiaZone such a great platform.

---

## 📋 Table of Contents

1. [Code of Conduct](#code-of-conduct)
2. [How Can I Contribute?](#how-can-i-contribute)
3. [Reporting Bugs](#reporting-bugs)
4. [Suggesting Enhancements](#suggesting-enhancements)
5. [Pull Requests](#pull-requests)
6. [Git Workflow](#git-workflow)
7. [Coding Standards](#coding-standards)
8. [Development Setup](#development-setup)

---

## 📖 Code of Conduct

This project adheres to a [Code of Conduct](CODE_OF_CONDUCT.md). By participating, you are expected to uphold this code. Please report unacceptable behavior to support@afiazone.local.

---

## 🚀 How Can I Contribute?

### Ways to Contribute
- **Report Bugs** — Found a bug? Let us know!
- **Suggest Features** — Have an idea? We'd love to hear it!
- **Improve Documentation** — Help us explain things better
- **Write Code** — Implement features or fix bugs
- **Review Code** — Help review PRs from others
- **Write Tests** — Improve test coverage

---

## 🐛 Reporting Bugs

Before creating a bug report, please check if the issue has already been reported. When you create a bug report, include as many details as possible:

### Bug Report Template
```markdown
**Describe the Bug**
A clear and concise description of what the bug is.

**Steps to Reproduce**
1. Go to '...'
2. Click on '...'
3. See error

**Expected Behavior**
What you expected to happen.

**Actual Behavior**
What actually happened.

**Environment**
- PHP Version: 
- MySQL Version:
- Browser: 
- OS:

**Screenshots / Logs**
If applicable, add screenshots or error logs.

**Additional Context**
Any other context about the problem here.
```

### Where to Report
- **GitHub Issues**: https://github.com/afiazone/afiazone/issues
- **Email**: bugs@afiazone.local

---

## 💡 Suggesting Enhancements

Enhancement suggestions are welcomed! Include as much detail as possible:

### Enhancement Template
```markdown
**Is your enhancement request related to a problem?**
e.g., I'm always frustrated when [...]

**Describe the Solution You'd Like**
A clear and concise description of what you want to happen.

**Describe Alternatives You've Considered**
Other solutions or features you've considered.

**Additional Context**
Any other context or screenshots about the enhancement.
```

---

## 📥 Pull Requests

We actively welcome pull requests! 

### PR Process
1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Make your changes
4. Write/update tests
5. Ensure code style is correct
6. Commit with clear messages
7. Push to your fork
8. Open a pull request

### PR Guidelines
- One feature per PR (keep them focused)
- Include a clear description of what you changed and why
- Link to related issues if any
- Add/update tests and documentation
- Follow the coding standards (see below)

### PR Checklist
- [ ] My code follows the style guidelines
- [ ] I have updated the documentation
- [ ] I have added tests for new functionality
- [ ] All tests pass locally
- [ ] My commits have clear, descriptive messages
- [ ] Code review is requested

---

## 🌿 Git Workflow

### Branch Naming Convention
```
feature/*        — New features
bugfix/*         — Bug fixes
hotfix/*         — Critical production fixes
docs/*           — Documentation changes
refactor/*       — Code refactoring
test/*           — Test additions
perf/*           — Performance improvements
```

Examples:
```bash
git checkout -b feature/wallet-topup
git checkout -b bugfix/order-validation
git checkout -b docs/api-endpoints
```

### Commit Message Convention
```
<type>(<scope>): <subject>

<body>

<footer>
```

**Type**: `feat`, `fix`, `docs`, `style`, `refactor`, `perf`, `test`, `build`, `ci`, `chore`

**Examples**:
```
feat(wallet): add top-up functionality
fix(orders): resolve payment validation issue
docs(readme): update installation instructions
refactor(auth): simplify token validation
test(orders): add order workflow tests
```

---

## 💻 Coding Standards

### PHP Standards
- Follow **PSR-12** coding standard
- Use strict types: `declare(strict_types=1);`
- Maximum line length: 120 characters
- Use meaningful variable/function names
- Add docblocks to classes and methods

### Code Style Check
```bash
# Check code style
php vendor/bin/php-cs-fixer fix app/ --dry-run

# Auto-fix code style
php vendor/bin/php-cs-fixer fix app/

# Static analysis
php vendor/bin/psalm
```

### Naming Conventions
```
✓ Classes:        ProductController, WalletService
✗ Classes:        productController, Product_Controller

✓ Methods:        processPayment(), getUserById()
✗ Methods:        Process_Payment, processPayment_

✓ Properties:     $userName, $_privateProperty
✗ Properties:     $user_name, $UserName

✓ Constants:      DB_HOST, MAX_RETRIES
✗ Constants:      db_host, Max_Retries

✓ Tables:         users, wallet_transactions
✗ Tables:         User, WalletTransactions

✓ Columns:        user_id, created_at
✗ Columns:        userId, CreatedAt
```

### File Locations
```
Controllers:   app/Controllers/{FeatureName}Controller.php
Models:        app/Models/{EntityName}.php
Services:      app/Services/{FeatureName}Service.php
Repositories:  app/Repositories/{EntityName}Repository.php
```

---

## 🔧 Development Setup

### Prerequisites
- PHP 8.1+
- MySQL 8.0+
- Composer
- Git

### Local Setup
```bash
# 1. Clone your fork
git clone https://github.com/your-username/afiazone.git
cd afiazone

# 2. Add upstream remote
git remote add upstream https://github.com/afiazone/afiazone.git

# 3. Install dependencies
composer install

# 4. Create .env file
cp .env.example .env

# 5. Setup database
php bin/setup-db.php

# 6. Run tests
php vendor/bin/phpunit

# 7. Check code style
php vendor/bin/php-cs-fixer fix app/ --dry-run
```

### Useful Commands
```bash
# Update your fork from upstream
git fetch upstream
git rebase upstream/develop

# Create feature branch
git checkout -b feature/your-feature

# Run tests
php vendor/bin/phpunit

# Check code style
php vendor/bin/php-cs-fixer fix app/

# Static analysis
php vendor/bin/psalm

# Run dev server
php -S localhost:8000
```

---

## 📚 Additional Resources

- **API Documentation**: See [docs/API.md](docs/API.md)
- **Architecture**: See [docs/ARCHITECTURE.md](docs/ARCHITECTURE.md)
- **Development Plan**: See [docs/PLAN-COMPLET.md](docs/PLAN-COMPLET.md)
- **Stack Details**: See [STACK.md](STACK.md)

---

## ❓ Questions?

- Check existing [GitHub Issues](https://github.com/afiazone/afiazone/issues)
- Read [README.md](README.md)
- Email: support@afiazone.local
- Slack: #afiazone-dev

---

## 🙏 Thank You!

Thank you for taking the time to contribute! Your efforts are appreciated and will help make AfiaZone better for everyone.

**Happy Coding!** 🚀
