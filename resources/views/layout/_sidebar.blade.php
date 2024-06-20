<div class="ui-theme-settings">
    <div class="theme-settings__inner">
        <div class="scrollbar-container">
            <div class="theme-settings__options-wrapper">
            </div>
        </div>
    </div>
</div>
<div class="app-sidebar sidebar-shadow {{ Auth::user()->sidebar }}">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ms-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>


    <div class="scrollbar-sidebar ps ps--active-y">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">

                <x-menu icon="pe-7s-home" :active="request()->routeIs('*.home')" :href="route('home')" divider="Beranda">
                    Beranda
                </x-menu>

                <x-menu icon="pe-7s-server" :active="request()->routeIs('landing.dashboard')" :href="route('landing.dashboard')" divider='Dashboard'>
                    Dashboard
                </x-menu>

                <x-menu icon="pe-7s-photo" :active="request()->routeIs('*.galeri')" :href="route('list.galeri')">
                    Galeri
                </x-menu>

                @if (Auth::user()->role == 1)
                    <x-menu icon="pe-7s-paint-bucket" :active="request()->routeIs('*.cagar_budaya')" :href="route('index.cagar_budaya')">
                        Cagar Budaya
                    </x-menu>
                @endif

                <x-menu icon="pe-7s-camera" :active="request()->routeIs('*.karya-budaya')" :href="route('index.karya-budaya')">
                    Karya Budaya
                </x-menu>

                <x-menu icon="pe-7s-album" :active="request()->routeIs('*.karya-seni')" :href="route('index.karya-seni')">
                    Karya Seni
                </x-menu>

                <x-menu icon="pe-7s-folder" :active="request()->routeIs('*.pendataan-kebudayaan')" :href="route('index.pendataan-kebudayaan')">
                    Tenaga Kebudayaan
                </x-menu>
                <x-menu icon="pe-7s-box2" :active="request()->routeIs('*.lembaga-komunitas')" :href="route('index.lembaga-komunitas')">
                    Lembaga/Komunitas
                </x-menu>

                @if (Auth::user()->role == 1)
                    <x-menu icon="pe-7s-photo" :active="request()->routeIs('*.wbtb')" :href="route('index.wbtb')">
                        WBTB
                    </x-menu>

                    <x-menu icon="pe-7s-hammer" :active="request()->routeIs('*.dasar-hukum')" :href="route('index.dasar-hukum')">
                        Dasar Hukum
                    </x-menu>

                    <x-menu icon="pe-7s-moon" :active="request()->routeIs('*.odcb')" :href="route('index.odcb')">
                        ODCB
                    </x-menu>
                @endif

                @if (Auth::user()->role == 1)
                    <x-menu icon="pe-7s-door-lock" :active="request()->routeIs('list.admin')" :href="route('list.admin')" divider='Admin'>
                        Admin
                    </x-menu>

                    <x-menu icon="pe-7s-news-paper" :active="request()->routeIs('*.berita')" :href="route('list.berita')" divider='Lainnya'>
                        Berita
                    </x-menu>
                @endif

                <x-menu icon="pe-7s-chat" :href="route('SPDK-Chat')">
                    Pesan
                </x-menu>

                <x-menu dropdown="Pengaturan" icon="pe-7s-paint" :active="request()->routeIs('*.profile', '*.theme')">
                    <x-menu :active="request()->routeIs('*.profile')" :href="route('setting.profile')">
                        Profile
                    </x-menu>

                    <x-menu :active="request()->routeIs('*.theme')" :href="route('setting.theme')">
                        Tema
                    </x-menu>

                    @if (Auth::user()->role == 1)
                        <x-menu :active="request()->routeIs('*.info')" :href="route('setting.info')">
                            Informasi
                        </x-menu>
                    @endif
                </x-menu>
            </ul>
        </div>
    </div>
</div>
