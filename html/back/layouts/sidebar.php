<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="index.html" class="app-brand-link">
      <span class="app-brand-logo demo">
        <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
            fill="#7367F0" />
          <path
            opacity="0.06"
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
            fill="#161616" />
          <path
            opacity="0.06"
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
            fill="#161616" />
          <path
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
            fill="#7367F0" />
        </svg>
      </span>
      <span class="app-brand-text demo menu-text fw-bold">AfiaZone</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
      <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item">
      <a href="/admin/dashboard" class="menu-link">
        <i class="menu-icon tf-icons ti ti-smart-home"></i>
        <div data-i18n="Dashboard">Dashboard</div>
      </a>
    </li>

    <!-- Products -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ti ti-package"></i>
        <div data-i18n="Products">Products</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="/admin/products" class="menu-link">
            <div data-i18n="All Products">All Products</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="/admin/products/add" class="menu-link">
            <div data-i18n="Add Product">Add Product</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="/admin/categories" class="menu-link">
            <div data-i18n="Categories">Categories</div>
          </a>
        </li>
      </ul>
    </li>

    <!-- Orders -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
        <div data-i18n="Orders">Orders</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="/admin/orders" class="menu-link">
            <div data-i18n="All Orders">All Orders</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="/admin/orders/pending" class="menu-link">
            <div data-i18n="Pending">Pending</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="/admin/orders/completed" class="menu-link">
            <div data-i18n="Completed">Completed</div>
          </a>
        </li>
      </ul>
    </li>

    <!-- Users -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ti ti-users"></i>
        <div data-i18n="Users">Users</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="/admin/users" class="menu-link">
            <div data-i18n="All Users">All Users</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="/admin/merchants" class="menu-link">
            <div data-i18n="Merchants">Merchants</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="/admin/roles" class="menu-link">
            <div data-i18n="Roles">Roles</div>
          </a>
        </li>
      </ul>
    </li>

    <!-- Settings -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ti ti-settings"></i>
        <div data-i18n="Settings">Settings</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="/admin/settings/general" class="menu-link">
            <div data-i18n="General">General</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="/admin/settings/payments" class="menu-link">
            <div data-i18n="Payments">Payments</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="/admin/settings/shipping" class="menu-link">
            <div data-i18n="Shipping">Shipping</div>
          </a>
        </li>
      </ul>
    </li>

    <!-- Misc -->
    <li class="menu-header small text-uppercase mt-4">
      <span class="menu-header-text">More</span>
    </li>
    <li class="menu-item">
      <a href="/admin/analytics" class="menu-link">
        <i class="menu-icon tf-icons ti ti-chart-bar"></i>
        <div data-i18n="Analytics">Analytics</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="/admin/logs" class="menu-link">
        <i class="menu-icon tf-icons ti ti-list-check"></i>
        <div data-i18n="Activity Logs">Activity Logs</div>
      </a>
    </li>
  </ul>
</aside>
<!-- / Menu -->
