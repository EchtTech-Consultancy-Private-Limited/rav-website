<div class="row">
    <div class="col-md-4">
        <div class="footer-logo">
            <img src="{{ asset('assets/images/rav-logo-white.png') }}" alt="logo" class="img-fluid">
        </div>
    </div>
    @if (isset($social_links) && $social_links != '')
    <div class="col-md-8 d-flex justify-content-end align-items-end">
        <div class="sociallink-wrap">
            <ul>
                @if ($social_links->facebook != '' && $social_links->facebook != 0)
                <a href="{{ url($social_links->facebook) ?? '' }}" onclick="return confirm('{{ $alertMessage }}')"
                    target="_blank" class="Facebook" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                @endif
                @if ($social_links->twitter != '' && $social_links->twitter != 0)
                <a href="{{ url($social_links->twitter) ?? '' }}" class="Twitter"
                    onclick="return confirm('{{ $alertMessage }}')" target="_blank" title="Twitter">
                    <i class="fa fa-twitter" aria-hidden="true"></i> </a>
                @endif
                @if ($social_links->instagram != '' && $social_links->instagram != 0)
                <a href="{{ url($social_links->instagram) ?? '' }}" onclick="return confirm('{{ $alertMessage }}')"
                    class="Instagram" target="_blank" title="Instagram"> <i class="fa fa-instagram"
                        aria-hidden="true"></i>
                </a>
                @endif
            </ul>
        </div>
    </div>
    @endif
    <div class="col-md-12">
        <div class="footer-nav">
        @if (isset($footerMenu) && count($footerMenu) > 0)
                <ul>
                    @foreach ($footerMenu->slice(0, 8) as $footerMenus)
                    @php
                    $footerMenusurl = $footerMenus->url ?? 'javascript:void(0)';
                    @endphp
                    @if ($footerMenus->tab_type == 1)
                    <li>
                        <a onclick="return confirm('{{ $alertMessage }}')" target="_blank"
                            href="{{ url($footerMenusurl) ?? '' }}">
                            @if (Session::get('locale') == 'hi')
                            {{ $footerMenus->name_hi ?? '' }}
                            @else
                            {{ $footerMenus->name_en ?? '' }}
                            @endif
                        </a>
                    </li>
                    @else
                    <li><a href="{{ url($footerMenusurl) ?? '' }}">
                            @if (Session::get('locale') == 'hi')
                            {{ $footerMenus->name_hi ?? '' }}
                            @else
                            {{ $footerMenus->name_en ?? '' }}
                            @endif
                        </a>
                    </li>
                    @endif
                    @endforeach
                    <li>
                        <a href="{{ route('contact-us') }}">Contact us</a>
                    </li>
                </ul>
                @else
                <h5>No menu available.</h5>
                @endif
        </div>
    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <span data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="fa fa-times rotate-icon" aria-hidden="true"></i>
            </span>
        </div>
        <div class="offcanvas-body">
            @if (isset($toogleMenu) && count($toogleMenu) > 0)
            <ul>
                @foreach ($toogleMenu as $toogleMenus)
                @php
                $toogleMenuurl = $toogleMenus->url ?? 'javascript:void(0)';
                @endphp
                <li class="nav-item my-2">
                    <a class="nav-link an-hove-sidemenu" href="{{ url($toogleMenuurl) ?? '' }}">
                        @if (Session::get('locale') == 'hi')
                        {{ $toogleMenus->name_hi ?? '' }}
                        @else
                        {{ $toogleMenus->name_en ?? '' }}
                        @endif
                    </a>
                </li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
</div>
</div>
<div class="footer-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5 px-0">
                <div class="copyright-wrap">
                    <p> © Copyright 2023 <b>Rashtriya Ayurveda Vidyapeeth.</b> All Rights Reserved.</p>
                </div>
            </div>
            <div class="col-md-7 justify-content-end">
                <ul>
                    <li>Last Updated - <span class="date"></span></li>
                    <li class="visitors"> Total Visitors: <span id="visitors">10</span> </a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
