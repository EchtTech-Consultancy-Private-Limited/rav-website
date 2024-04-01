<div class="logo-wrap">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-5">
                <div class="logo-left">
                    <a href="{{ route('/') }}">
                        @if (isset($website_core_settings) && $website_core_settings->header_logo != '')
                            <img src="{{ asset('resources/uploads/WebsiteCoreSettings/' . $website_core_settings->header_logo) }}"
                                alt="logo" class="img-fluid">
                        @else
                            <img src="{{ asset('/assets/images/rav-logo.png') }}" alt="logo" class="img-fluid">
                        @endif
                    </a>
                </div>
            </div>
            <div class="col-md-7">
                <div class="logo-right">
                    <div class="search-wrap me-4">
                        <form name="searchForm" action="{{ url('search') }}" method="get">
                            <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                            <button class="btn btn-search" type="submit">
                                <img src="{{ asset('assets/images/search.png') }}" alt="search" class="img-fluid">
                            </button>
                        </form>
                    </div>
                    <div class="d-flex align-items-center">
                        <a href="https://www.india.gov.in/" onclick="return confirm('{{ $alertMessage }}')"
                            target="_blank" class="me-4">
                            <img src="{{ asset('assets/images/emblem.svg') }}" alt="emblem" class="img-fluid">
                        </a>
                        <a href="https://yoga.ayush.gov.in/" onclick="return confirm('{{ $alertMessage }}')"
                            target="_blank" class="me-4">
                            <img src="{{ asset('assets/images/international-yoga.svg') }}" alt="international-yoga"
                                class="img-fluid">
                        </a>
                        <a href="https://amritmahotsav.nic.in/" onclick="return confirm('{{ $alertMessage }}')"
                            target="_blank" class="me-4">
                            <img src="{{ asset('assets/images/aazadi.svg') }}" alt="aazadi" class="img-fluid">
                        </a>
                        <a href="https://www.g20.org/en/" onclick="return confirm('{{ $alertMessage }}')"
                            target="_blank">
                            <img src="{{ asset('assets/images/g20-india.svg') }}" alt="g20-india" class="img-fluid">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg" id="myHeader">
    <div class="container-fluid">
        <div class="navbar-collapse collapse" id="navbarContent">
            <ul class="navbar-nav">
                <li class="nav-item " tabindex="0">
                    <a class="nav-link active" aria-current="page" href="{{ url('/') }}" tabindex="-1">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    </a>
                </li>
                @if (isset($headerMenu) && count($headerMenu) > 0)
                    @foreach ($headerMenu as $headerMenus)
                        @php
                            $url = $headerMenus->url ?? 'javascript:void(0)';
                        @endphp
                        @if (isset($headerMenus->children) && count($headerMenus->children) > 0)
                            <li class="nav-item dropdown ">
                                <a class="nav-link an-hove" href="javascript:void(0)" aria-expanded="false" tabindex = "-1">
                                    @if (Session::get('locale') == 'hi')
                                        {{ $headerMenus->name_hi ?? '' }}
                                    @else
                                        {{ $headerMenus->name_en ?? '' }}
                                    @endif
                                    <img src="{{ asset('/assets/images/arrow-down.png') }}" alt="arrow" class="img-fluid">
                                </a>
                                <ul class="dropdown-menu" tabindex = "0">
                                    @if (isset($headerMenus->children) && count($headerMenus->children) > 0)
                                        @foreach ($headerMenus->children as $subMenus)
                                    @php
                                        $subMenusurl = $subMenus->url ?? 'javascript:void(0)';
                                    @endphp

                                    @if (isset($subMenus->children) && count($subMenus->children) > 0)
                                        @if ($subMenus->tab_type == 1)
                                            <li class="env">
                                                <a href="javascript:void(0)"
                                                    onclick="return confirm('{{ $alertMessage }}')" target="_blank">
                                                    @if (Session::get('Lang') == 'hi')
                                                        {{ $subMenus->name_hi ?? '' }}
                                                    @else
                                                        {{ $subMenus->name_en ?? '' }}
                                                    @endif
                                                </a>
                                        @else
                                            <li class="dropdown nav-item menu-subdropdown">
                                                <a href="javascript:void();" class="dropdown-item">
                                                    @if (Session::get('Lang') == 'hi')
                                                        {{ $subMenus->name_hi ?? '' }}
                                                    @else
                                                        {{ $subMenus->name_en ?? '' }}
                                                    @endif
                                                </a>
                                        @endif
                                        <ul class="submenu dropdown-menu">
                                            @foreach ($subMenus->children as $ChildMenus)
                                                @php
                                                    $ChildMenusurl = $ChildMenus->url ?? 'javascript:void(0)';
                                                    $ChildMenusurlfixed = $ChildMenus->footer_url ?? 'javascript:void(0)';
                                                @endphp

                                                @if (isset($ChildMenus->children) && count($ChildMenus->children) > 0)
                                                    @if ($ChildMenus->tab_type == 1)
                                                        <li class="env sub-menu-drop-g">
                                                            <a class="dropdown-item" href="{{ url($ChildMenusurlfixed) }}"
                                                                onclick="return confirm('{{ $alertMessage }}')"
                                                                target="_blank">
                                                                @if (Session::get('Lang') == 'hi')
                                                                    {{ $ChildMenus->name_hi ?? '' }}
                                                                @else
                                                                    {{ $ChildMenus->name_en ?? '' }}
                                                                @endif
                                                            </a>
                                                        @else
                                                        <li class="env sub-menu-drop-g">
                                                            <a href="{{ url($ChildMenusurlfixed) }}" class="sub-menu-drop-f dropdown-item">
                                                                @if (Session::get('Lang') == 'hi')
                                                                    {{ $ChildMenus->name_hi ?? '' }}
                                                                @else
                                                                    {{ $ChildMenus->name_en ?? '' }}
                                                                @endif
                                                            </a>
                                                    @endif
                                                    </li>
                                                @else
                                                    @if ($ChildMenus->tab_type == 1)
                                                        <li>
                                                            <a class="dropdown-item" onclick="return confirm('{{ $alertMessage }}')"
                                                                target="_blank" href="{{ $ChildMenusurl ?? '' }}">
                                                                @if (Session::get('Lang') == 'hi')
                                                                    {{ $ChildMenus->name_hi ?? '' }}
                                                                @else
                                                                    {{ $ChildMenus->name_en ?? '' }}
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <a class="dropdown-item" href="{{ url($url . '/' . $subMenusurl . '/' . $ChildMenusurl) ?? '' }}">
                                                                @if (Session::get('Lang') == 'hi')
                                                                    {{ $ChildMenus->name_hi ?? '' }}
                                                                @else
                                                                    {{ $ChildMenus->name_en ?? '' }}
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </ul>
                                        </li>
                                    @else
                                    
                                        @if ($subMenus->tab_type == 1)                                            
                                            <li>
                                                <a onclick="return confirm('{{ $alertMessage }}')" target="_blank"
                                                    href="{{ $subMenusurl ?? '' }}">
                                                    @if (Session::get('Lang') == 'hi')
                                                        {{ $subMenus->name_hi ?? '' }}
                                                    @else
                                                        {{ $subMenus->name_en ?? '' }}
                                                    @endif
                                                </a>
                                            </li>
                                        @else                                       
                                            <li><a class="dropdown-item"
                                                    href="{{ url($url . '/' . $subMenusurl) ?? '' }}">
                                                    @if (Session::get('Lang') == 'hi')
                                                        {{ $subMenus->name_hi ?? '' }}
                                                    @else
                                                        {{ $subMenus->name_en ?? '' }}
                                                    @endif
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                @endforeach
                                    @else
                                        <h5>No menu available.</h5>
                                    @endif
                                </ul>
                            </li>
                        @else
                            <li class="nav-item " tabindex= "0">
                                @if ($headerMenus->tab_type == 1)
                                    <a class="nav-link an-hove" onclick="return confirm('{{ $alertMessage }}')"
                                        target="_blank" href="{{ url($url) ??"" }}" aria-expanded="false" tabindex= "-1">
                                        @if (Session::get('locale') == 'hi')
                                            {{ $headerMenus->name_hi ?? '' }}
                                        @else
                                            {{ $headerMenus->name_en ?? '' }}
                                        @endif
                                    </a>
                                @else
                                    <a class="nav-link an-hove" href="{{ url($url) ??''}}" aria-expanded="false">
                                        @if (Session::get('locale') == 'hi')
                                            {{ $headerMenus->name_hi ?? '' }}
                                        @else
                                            {{ $headerMenus->name_en ?? '' }}
                                        @endif
                                    </a>
                                @endif
                            </li>
                        @endif
                    @endforeach
                @else
                    <h5>No menu available.</h5>
                @endif

                @if (isset($toogleMenu) && count($toogleMenu) > 0)
                    <button class="btn side-mn-icn" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        <i class="fa fa-bars fa-bars-m" aria-hidden="true"></i>
                    </button>
                @endif
            </ul>
        </div>
    </div>
</nav>
<div class="sticky-i d-non">
            <div class="sticky-icon">
                <a href="https://www.facebook.com/vidyapeeth.delhi"
                    onclick="return confirm('This link will take you to an external web site.')" target="_blank"
                    class="Facebook" title="Facebook">
                    <i class="fa fa-facebook-f"></i> Facebook
                </a>
                <a href="https://twitter.com/ravdelhi?lang=en" class="Twitter" onclick="return confirm('This link will take you to an external web site.')"
                    target="_blank" title="Twitter">
                    <i class="fa fa-twitter" title="Twitter"></i> Twitter
                </a>
                <a href="https://www.instagram.com/ravdelhi/" onclick="return confirm('This link will take you to an external web site.')"
                    class="Instagram" target="_blank" title="Instagram">
                    <i class="fa fa-instagram"></i> Instagram
                </a>
                <a href="https://at.linkedin.com/company/rashtriya-ayurveda-vidyapeeth" class="Youtube" onclick="return confirm('This link will take you to an external web site.')"
                    target="_blank" title="Linkedin">
                    <i class="fa fa-linkedin"></i> Linkedin
                </a>
            </div>
        </div>