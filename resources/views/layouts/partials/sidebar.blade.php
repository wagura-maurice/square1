<div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <a href="{{ route('website.index') }}"><img src="{{ getSetting('SYSTEM_LOGO_IMAGE') }}" alt="{{ config('app.name') }}" srcset="{{ getSetting('SYSTEM_LOGO_IMAGE') }}"></a>
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="sidebar-item {{ checkRoute('home') ? 'active' : NULL }}">
                <a href="{{ route('home') }}" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <hr>

            <li class="sidebar-title">Support</li>
            <li class="sidebar-item {{ checkRoute('logout') ? 'active' : NULL }}">
                <a class='sidebar-link' href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-power"></i>
                    <span>{{ __('Logout') }}</span>
                </a>
            </li>

        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>