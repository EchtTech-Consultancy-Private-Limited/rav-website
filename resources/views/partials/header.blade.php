<div class="logo-wrap">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-5">
                <div class="logo-left">
                    <a href="{{ route('/') }}">
                        @if (isset($website_core_settings) && $website_core_settings->header_logo != '')
                            <img src="{{ asset('resources/uploads/WebsiteCoreSettings/'.$website_core_settings->header_logo) }}"
                                alt="logo" class="img-fluid">
                        @else
                            <img src="./assets/images/rav-logo.png" alt="logo" class="img-fluid">
                        @endif
                    </a>
                </div>
            </div>
            <div class="col-md-7">
                <div class="logo-right">
                    <div class="search-wrap me-4">
                        <form class="d-flex" role="search">
                            <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                            <button class="btn btn-search" type="submit">
                                <img src="./assets/images/search.png" alt="search" class="img-fluid">
                            </button>
                        </form>
                    </div>
                    <div class="d-flex align-items-center">
                        <a href="https://www.india.gov.in/" class="me-4">
                            <img src="./assets/images/emblem.svg" alt="emblem" class="img-fluid">
                        </a>
                        <a href="https://yoga.ayush.gov.in/" class="me-4">
                            <img src="./assets/images/international-yoga.svg" alt="international-yoga"
                                class="img-fluid">
                        </a>
                        <a href="https://amritmahotsav.nic.in/" class="me-4">
                            <img src="./assets/images/aazadi.svg" alt="aazadi" class="img-fluid">
                        </a>
                        <a href="https://www.g20.org/en/">
                            <img src="./assets/images/g20-india.svg" alt="g20-india" class="img-fluid">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <div class="navbar-collapse collapse" id="navbarContent">
            <ul class="navbar-nav">
                <li class="nav-item" tabindex="0">
                    <a class="nav-link active" aria-current="page" href="{{ url('/') }}" tabindex="-1">
                        <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 22" width="25"
                            height="22">
                            <g>
                                <path
                                    d="m24.5 10.1l-11.2-9.8q-0.2-0.1-0.4-0.2-0.3-0.1-0.5-0.1-0.3 0-0.5 0.1-0.3 0.1-0.5 0.2l-11.1 9.8c-0.5 0.5-0.4 0.9 0.3 0.9h3.5v10q0 0.2 0 0.4 0.1 0.2 0.3 0.3 0.1 0.1 0.3 0.2 0.2 0.1 0.4 0.1h4.2v-6.6q0-0.2 0-0.4 0.1-0.2 0.3-0.3 0.1-0.2 0.3-0.2 0.2-0.1 0.4-0.1h4.2q0.2 0 0.4 0.1 0.2 0 0.3 0.2 0.2 0.1 0.2 0.3 0.1 0.2 0.1 0.4v6.6h4.2q0.2 0 0.4-0.1 0.2-0.1 0.3-0.2 0.2-0.1 0.2-0.3 0.1-0.2 0.1-0.4v-10h3.4c0.7 0 0.9-0.4 0.4-0.9z" />
                            </g>
                        </svg>
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
                                    <img src="./assets/images/arrow-down.png" alt="arrow" class="img-fluid">
                                </a>
                                <ul class="dropdown-menu" tabindex = "0">
                                    @if (isset($headerMenus->children) && count($headerMenus->children) > 0)
                                        @foreach ($headerMenus->children as $subMenus)
                                            @php
                                                $subMenusurl = $subMenus->url ?? 'javascript:void(0)';
                                            @endphp

                                            <li>
                                                @if ($subMenus->tab_type == 1)
                                                    <a class="nav-link an-hove"
                                                        onclick="return confirm('{{ $alertMessage }}')" target="_blank"
                                                        href="{{ url($subMenusurl) ??"" }}" aria-expanded="false">
                                                        @if (Session::get('locale') == 'hi')
                                                            {{ $subMenus->name_hi ?? '' }}
                                                        @else
                                                            {{ $subMenus->name_en ?? '' }}
                                                        @endif
                                                    </a>
                                                @else
                                                    <a class="dropdown-item" href="{{ url($subMenusurl) ??"" }}">

                                                        @if (Session::get('locale') == 'hi')
                                                            {{ $subMenus->name_hi ?? '' }}
                                                        @else
                                                            {{ $subMenus->name_en ?? '' }}
                                                        @endif
                                                    </a>
                                                @endif
                                            </li>
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

                @if( isset($toogleMenu) &&  count($toogleMenu) > 0 )
                <button class="btn side-mn-icn" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <i class="fa fa-bars fa-bars-m" aria-hidden="true"></i>
                </button>
                @endif
            </ul>
        </div>
    </div>
</nav>
