<div class="app-header header-shadow {{ Auth::user()->header }}">
    <div class="app-header__logo">
        <div class="nav-logo">
            @php
                $logo = strpos(Auth::user()->header, 'header-text-light');
            @endphp
            <img src="{{ asset('assets/img/default.png') }}" alt="dadas" height="30">
            <strong class="fs-5 ms-2 {{ $logo ? 'text-light' : '' }}"> {{ $info->nama_web }}</strong>
        </div>

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
    <div class="app-header__content">
        <div class="app-header-right">
            <div class="header-btn-lg pe-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="btn-group">
                                <a data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    class="p-0 btn btn-profile-menu">
                                    <img width="42" height="42" class="rounded-circle"
                                        src="{{ asset('storage/profile/' . Auth::user()->foto) }}" alt="" />
                                    <i class="fa fa-angle-down ms-2 opacity-8"></i>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true"
                                    class="dropdown-menu dropdown-menu-right text-white">
                                    <a href="{{ route('setting.profile') }}" tabindex="0" class="dropdown-item">
                                        Profile
                                    </a>
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    <a tabindex="0" class="dropdown-item text-danger"
                                        href="{{ route('logOut.user') }}">
                                        Keluar
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left ms-3 header-user-info">
                            <div class="widget-heading">{{ Auth::user()->name }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
