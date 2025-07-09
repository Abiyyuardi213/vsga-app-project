<aside class="main-sidebar elevation-4" style="background: linear-gradient(180deg, #2d3d56, #1c2636);">
    <!-- Logo -->
    <a href="#" class="brand-link d-flex justify-content-center align-items-center" style="background: linear-gradient(180deg, #2d3d56, #1c2636);">
        <img src="{{ asset('image/logo1.png') }}" alt="Logo Resep" class="brand-image" style="max-width: 180px; max-height: 120px; object-fit: contain;">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ url('dashboard-admin') }}" class="nav-link {{ request()->is('dashboard') ? 'active-custom' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('restoran.index') }}" class="nav-link {{ request()->is('restoran*') ? 'active-custom' : '' }}">
                        <i class="nav-icon fas fa-store-alt"></i>
                        <p>Restoran</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('makanan.index') }}" class="nav-link {{ request()->is('makanan*') ? 'active-custom' : '' }}">
                        <i class="nav-icon fas fa-utensils"></i>
                        <p>Makanan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('katalog.index') }}" class="nav-link {{ request()->is('katalog') ? 'active-custom' : '' }}">
                        <i class="nav-icon fas fa-utensils"></i>
                        <p>Katalog Makanan</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<style>
    .nav-sidebar .nav-item:hover {
        background-color: #3f4f6b;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .nav-sidebar .nav-link .nav-icon {
        font-size: 18px;
        color: #e0e0e0;
        transition: color 0.3s ease;
    }

    .nav-sidebar .nav-link:hover .nav-icon {
        color: #a3ffac;
    }

    .nav-sidebar .nav-link {
        padding: 12px 15px;
        font-size: 16px;
        color: #f8f9fa;
    }

    .nav-treeview .nav-link {
        font-size: 15px;
        padding-left: 30px;
    }

    /* Aktif styling */
    .active-custom {
        background: linear-gradient(to right, #4e73df, #1cc88a) !important;
        color: #fff !important;
        border-radius: 5px;
    }

    .active-custom-sub {
        background-color: rgba(255, 255, 255, 0.15) !important;
        color: #ffffff !important;
        border-left: 4px solid #1cc88a;
        font-weight: bold;
    }

    .nav-link.active-custom-sub .nav-icon {
        color: #1cc88a !important;
    }
</style>
