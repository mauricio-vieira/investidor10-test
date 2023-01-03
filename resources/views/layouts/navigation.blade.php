<ul class="sidebar-nav" data-coreui="navigation" data-simplebar>

    <li class="nav-item">
        <a class="nav-link" href="/">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-home') }}"></use>
            </svg>
            {{ __('Ver site') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('news.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-file') }}"></use>
            </svg>
            {{ __('Notícias') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('categories.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-file') }}"></use>
            </svg>
            {{ __('Categorias') }}
        </a>
    </li>
</ul>
