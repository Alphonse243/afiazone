# Backend Layout System

AfiaZone Admin Panel uses a modular layout system with reusable components.

## Layout Files

### 1. **admin.php** - Main Admin Dashboard Layout
- Used for all admin pages (dashboard, products, orders, users, settings)
- Includes: Sidebar menu, top navbar, footer
- Best for pages with sidebar navigation

**Usage:**
```php
$this->renderAdmin('back.pages.dashboard', [
    'pageTitle' => 'Dashboard',
    'additionalStyles' => [],
    'additionalScripts' => []
]);
```

### 2. **auth.php** - Authentication Layout
- Used for login, register, password reset, 2FA pages
- Full-width layout without sidebar
- Centered content area

**Usage:**
```php
$this->renderAuth('back.pages.login', [
    'pageTitle' => 'Admin Login',
    'additionalStyles' => [],
    'additionalScripts' => []
]);
```

## Layout Components

### Sidebar (`sidebar.php`)
- Main navigation menu
- Customizable menu items
- Collapsible on mobile devices
- Update links to match your routes

```php
<!-- Example menu item -->
<li class="menu-item">
  <a href="/admin/products" class="menu-link">
    <i class="menu-icon tf-icons ti ti-package"></i>
    <div data-i18n="Products">Products</div>
  </a>
</li>
```

### Navbar (`navbar.php`)
- Top navigation bar
- Search functionality
- Language switcher
- Theme switcher (light/dark)
- User profile dropdown
- Notifications bell

### Footer (`footer.php`)
- Company/site information
- Footer links (Privacy, Terms, Help, Contact)
- Copyright notice

## Template Variables

Available in all templates:

```php
$pageTitle        // Page title shown in browser tab
$additionalStyles // Array of extra CSS files
$additionalScripts// Array of extra JS files
$content          // Main content (passed by layout system)
$appUrl           // Application base URL
```

## Example: Creating a Products Page

1. **Create the template:** `html/back/pages/products-list.php`

```php
<!-- Content -->
<div class="card">
  <div class="card-header">
    <h5 class="card-title">Products</h5>
  </div>
  <div class="card-body">
    <!-- Your content here -->
  </div>
</div>
<!-- / Content -->
```

2. **Create the controller method:**

```php
// app/Controllers/Product/ProductController.php

public function list(): void
{
    $this->renderAdmin('back.pages.products-list', [
        'pageTitle' => 'Products - Admin',
        'additionalStyles' => [
            '/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css'
        ],
        'additionalScripts' => [
            '/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js'
        ]
    ]);
}
```

3. **Add route:** `routes/api.php`

```php
[
    'method' => 'GET',
    'path' => '/admin/products',
    'controller' => 'ProductController@list',
    'middleware' => ['auth', 'admin']
],
```

## CSS Framework

Uses **Bootstrap 5** with customizations:
- Responsive grid system
- Component classes
- Theme variables
- Dark mode support

## Icons

Available icon libraries:
- **Tabler Icons**: `<i class="ti ti-icon-name"></i>`
- **FontAwesome**: `<i class="fa fa-icon-name"></i>`

## Best Practices

1. ✅ Keep templates focused on presentation
2. ✅ Use `$data` array to pass variables
3. ✅ Organize views in subdirectories (pages/, products/, orders/)
4. ✅ Use semantic HTML and Bootstrap classes
5. ✅ Add middleware for authentication/authorization
6. ✅ Leverage sidebar navigation for main features

## File Structure

```
html/back/
├── layouts/
│   ├── admin.php      (main admin layout)
│   ├── auth.php       (auth layout)
│   ├── sidebar.php    (sidebar component)
│   ├── navbar.php     (navbar component)
│   └── footer.php     (footer component)
├── pages/
│   ├── dashboard.php
│   ├── login.php
│   ├── products-list.php
│   └── ...
└── ...
```

## Extending Layouts

To customize layouts:

1. Edit `sidebar.php` to add/modify menu items
2. Edit `navbar.php` for top bar changes
3. Edit `footer.php` for footer content
4. Modify `admin.php` or `auth.php` for structural changes

All templates use output buffering to capture content and inject it into layouts seamlessly.
