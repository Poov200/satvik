


<!-- =========================================================
     MOBILE OVERLAY
========================================================= -->

    <div class="overlay" id="overlay" onclick="toggleSidebar()"></div>


    <!-- =========================================================
     SIDEBAR
========================================================= -->

    <aside class="sidebar" id="sidebar">

        <div class="brand">

            <div class="brand-icon">
                S
            </div>

            <div class="brand-text">
                <strong>
                    Satvik Foods
                </strong>

                <span>
                    Admin Panel
                </span>
            </div>

        </div>

        <nav class="side-nav">

            <div class="nav-title">Main</div>

            <a href="{{ route('admin.orders') }}" class="nav-link">
                <span class="nav-icon">📊</span>
                Dashboard
            </a>

            <div class="nav-title">Store</div>

            <a href="{{ route('admin.orders') }}" class="nav-link">
                <span class="nav-icon">🛒</span>
                Orders
            </a>

            <a href="{{ route('admin.products') }}" class="nav-link">
                <span class="nav-icon">📦</span>
                Products
            </a>

            <a href="{{ route('admin.offers.index', ['type' => 'combo']) }}"
                class="nav-link {{ request()->routeIs('admin.offers.*') ? 'active' : '' }}">
                <span class="nav-icon">🎁</span>
                Offers
            </a>

            <div class="nav-title">Management</div>

            <a href="#" class="nav-link">
                <span class="nav-icon">👥</span>
                Customers
            </a>

            <a href="#" class="nav-link">
                <span class="nav-icon">📈</span>
                Reports
            </a>

        </nav>

        <div class="side-footer">

            <div class="admin-user">

                <div class="admin-avatar">
                    A
                </div>

                <div class="admin-info">

                    <strong>
                        Administrator
                    </strong>

                    <span>
                        {{ session('admin_email') }}
                    </span>

                </div>

            </div>

            <form method="POST" action="{{ route('admin.logout') }}">

                @csrf

                <button type="submit" class="logout-btn">
                    ↪ &nbsp; Logout
                </button>

            </form>

        </div>

    </aside>