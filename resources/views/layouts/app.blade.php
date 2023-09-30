<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') {{ config('app.name', 'Cafe Bahagia') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
    <!-- Scripts -->
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body id="kt_app_body" data-kt-app-header-fixed-mobile="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <script>
        var defaultThemeMode = "system"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }
    </script>
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            <div id="kt_app_header" class="app-header" data-kt-sticky="true"
                data-kt-sticky-activate="{default: false, lg: true}" data-kt-sticky-name="app-header-sticky"
                data-kt-sticky-offset="{default: false, lg: '300px'}">
                <!--begin::Header container-->
                <div class="app-container container-xxl d-flex align-items-stretch justify-content-between"
                    id="kt_app_header_container">
                    <!--begin::Header mobile toggle-->
                    <div class="d-flex align-items-center d-lg-none ms-n3 me-2" title="Show sidebar menu">
                        <div class="btn btn-icon btn-color-gray-600 btn-active-color-primary w-35px h-35px"
                            id="kt_app_header_menu_toggle">
                            <i class="ki-outline ki-abstract-14 fs-2"></i>
                        </div>
                    </div>
                    <!--end::Header mobile toggle-->
                    <!--begin::Logo-->
                    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
                        <a href="{{ route('dashboard') }}">
                            <img alt="Logo" src="{{ asset('assets/media/logos/default-small.svg') }}"
                                class="h-25px d-lg-none" />
                            <img alt="Logo" src="{{ asset('assets/media/logos/default-small.svg') }}"
                                class="h-25px d-none d-lg-inline app-sidebar-logo-default theme-light-show" />
                            <img alt="Logo" src="{{ asset('assets/media/logos/default-dark.svg') }}"
                                class="h-25px d-none d-lg-inline app-sidebar-logo-default theme-dark-show" />
                        </a>
                    </div>
                    <!--end::Logo-->
                    <!--begin::Header wrapper-->
                    <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1"
                        id="kt_app_header_wrapper">
                        <!--begin::Menu wrapper-->
                        <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true"
                            data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                            data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start"
                            data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
                            data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
                            data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                            <div class="menu menu-rounded menu-active-bg menu-state-primary menu-column menu-lg-row menu-title-gray-700 menu-icon-gray-500 menu-arrow-gray-500 menu-bullet-gray-500 my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0"
                                id="kt_app_header_menu" data-kt-menu="true">
                                <div class="menu-item">
                                    <a class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                                        href="{{ route('dashboard') }}">
                                        <span class="menu-icon">
                                            <i class="ki-duotone ki-home-2 fs-3">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                        <span class="menu-title">Dashboard</span>
                                    </a>
                                </div>
                                @if (Auth::user()->role == "admin")
                                <div class="menu-item">
                                    <a class="menu-link {{ request()->routeIs('product.*') ? 'active' : '' }}"
                                        href="{{ route('product.index') }}">
                                        <span class="menu-icon">
                                            <i class="ki-duotone ki-parcel fs-3">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                                <span class="path5"></span>
                                            </i>
                                        </span>
                                        <span class="menu-title">Manage Product</span>
                                    </a>
                                </div>
                                @else
                                @endif
                                <div class="menu-item">
                                    <a class="menu-link {{ request()->routeIs('transaction.*') ? 'active' : '' }}"
                                        href="{{ route('transaction.index') }}">
                                        <span class="menu-icon">
                                            <i class="ki-duotone ki-shop fs-3">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                                <span class="path5"></span>
                                            </i>
                                        </span>
                                        <span class="menu-title">Manage Transactions</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--end::Menu wrapper-->
                        <!--begin::Navbar-->
                        <div class="app-navbar flex-shrink-0">
                            <!--begin::User menu-->
                            <div class="app-navbar-item ms-3 ms-lg-5" id="kt_header_user_menu_toggle">
                                <div class="cursor-pointer symbol symbol-35px symbol-md-45px"
                                    data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                                    data-kt-menu-placement="bottom-end">
                                    <img class="symbol symbol-35px symbol-md-45px"
                                        src="{{ asset('assets/media/avatars/blank.png') }}" alt="user" />
                                </div>
                                <!--begin::User account menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                                    data-kt-menu="true">
                                    <div class="menu-item px-3">
                                        <div class="menu-content d-flex align-items-center px-3">
                                            <div class="symbol symbol-50px me-5">
                                                <img alt="Logo" src="{{ asset('assets/media/avatars/blank.png') }}" />
                                            </div>
                                            <div class="d-flex flex-column">
                                                <div class="fw-bold d-flex align-items-center fs-5">{{
                                                    Auth::user()->name }}
                                                    <span
                                                        class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">on</span>
                                                </div>
                                                <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{
                                                    Auth::user()->email }}</a>
                                            </div>
                                            <!--end::Username-->
                                        </div>
                                    </div>
                                    <div class="separator my-2"></div>
                                    <div class="menu-item px-5">
                                        <a :href="route('profile.edit')" class="menu-link px-5">My
                                            Profile</a>
                                    </div>
                                    <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                        data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                                        <a href="#" class="menu-link px-5">
                                            <span class="menu-title position-relative">Mode
                                                <span class="ms-5 position-absolute translate-middle-y top-50 end-0">
                                                    <i class="ki-outline ki-night-day theme-light-show fs-2"></i>
                                                    <i class="ki-outline ki-moon theme-dark-show fs-2"></i>
                                                </span></span>
                                        </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                                            data-kt-menu="true" data-kt-element="theme-mode-menu">
                                            <div class="menu-item px-3 my-0">
                                                <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                                    data-kt-value="light">
                                                    <span class="menu-icon" data-kt-element="icon">
                                                        <i class="ki-outline ki-night-day fs-2"></i>
                                                    </span>
                                                    <span class="menu-title">Light</span>
                                                </a>
                                            </div>
                                            <div class="menu-item px-3 my-0">
                                                <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                                    data-kt-value="dark">
                                                    <span class="menu-icon" data-kt-element="icon">
                                                        <i class="ki-outline ki-moon fs-2"></i>
                                                    </span>
                                                    <span class="menu-title">Dark</span>
                                                </a>
                                            </div>
                                            <div class="menu-item px-3 my-0">
                                                <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                                    data-kt-value="system">
                                                    <span class="menu-icon" data-kt-element="icon">
                                                        <i class="ki-outline ki-screen fs-2"></i>
                                                    </span>
                                                    <span class="menu-title">System</span>
                                                </a>
                                            </div>
                                        </div>
                                        <!--end::Menu-->
                                    </div>
                                    <div class="menu-item px-5">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a class="menu-link px-5" :href="route('logout')" onclick="event.preventDefault();
                                                                        this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Header-->

            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <div id="kt_app_toolbar" class="app-toolbar py-6">
                    <!--begin::Toolbar container-->
                    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex align-items-start">
                        <!--begin::Toolbar container-->
                        <div class="d-flex flex-column flex-row-fluid">
                            <!--begin::Toolbar wrapper-->
                            <div class="d-flex align-items-center pt-1">
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
                                    <li class="breadcrumb-item text-white fw-bold lh-1">
                                        <a href="{{ route('dashboard') }}" class="text-white text-hover-primary">
                                            <i class="ki-outline ki-home text-white fs-3"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <i class="ki-outline ki-right fs-4 text-white mx-n1"></i>
                                    </li>
                                    <li class="breadcrumb-item text-white fw-bold lh-1">Dashboards</li>
                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <div class="d-flex flex-stack flex-wrap flex-lg-nowrap gap-4 gap-lg-10 pt-6 pb-18 py-lg-13">
                                <div class="page-title d-flex align-items-center me-3">
                                    <h1
                                        class="page-heading d-flex text-white fw-bolder fs-2 flex-column justify-content-center my-0">
                                        {{ Auth::user()->name }}
                                        <span class="page-desc text-white opacity-50 fs-6 fw-bold pt-4">
                                            {{ Auth::user()->email }}
                                        </span>
                                    </h1>
                                </div>
                                {{-- <div class="d-flex gap-4 gap-lg-13">
                                    <div class="d-flex flex-column">
                                        <span class="text-white fw-bold fs-3 mb-1">{{ $products_total }}</span>
                                        <div class="text-white opacity-50 fw-bold">Total Products</div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="text-white fw-bold fs-3 mb-1">{{ $transactions_total }}</span>
                                        <div class="text-white opacity-50 fw-bold">Total Transactions</div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Toolbar-->

                <!--begin::Wrapper container-->
                <div class="app-container container-xxl">
                    <!--begin::Main-->
                    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                        <!--begin::Content wrapper-->
                        <div class="d-flex flex-column flex-column-fluid">
                            <!--begin::Content-->
                            <div id="kt_app_content" class="app-content">

                                {{ $slot }}

                            </div>
                        </div>
                        <!--end::Content wrapper-->
                        <!--begin::Footer-->
                        <div id="kt_app_footer"
                            class="app-footer d-flex flex-column flex-md-row align-items-center flex-center flex-md-stack py-2 py-lg-4">
                            <!--begin::Copyright-->
                            <div class="text-dark order-2 order-md-1">
                                <span class="text-muted fw-semibold me-1">2023&copy;</span>
                                <a href="#" target="_blank" class="text-gray-800 text-hover-primary">Hisyam</a>
                            </div>
                        </div>
                        <!--end::Footer-->
                    </div>
                    <!--end:::Main-->
                </div>
                <!--end::Wrapper container-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-up-square">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </div>
    <!--end::Scrolltop-->

    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    @stack('scripts')
</body>

</html>
