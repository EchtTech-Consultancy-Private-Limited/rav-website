<div class="logo-wrap">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-5">
                <div class="logo-left">
                    <a href="{{ route('/') }}">
                        @if (isset($website_core_settings) && $website_core_settings->header_logo != '')
                        <img src="{{ asset('resources/uploads/WebsiteCoreSettings/' . $website_core_settings->header_logo) }}"
                            alt="rashstriya  ayurveda vidyapeeth" title="rashstriya  ayurveda vidyapeeth"
                            class="img-fluid">
                        @else
                        <img src="{{ asset('/assets/images/rav-logo.png') }}" alt="rashstriya  ayurveda vidyapeeth"
                            title="rashstriya  ayurveda vidyapeeth" class="img-fluid">
                        @endif
                    </a>
                </div>
            </div>
            <div class="col-md-7">
                <div class="logo-right">
                    <div class="search-wrap me-4">
                        <form name="searchForm" action="{{ url('/search') }}" method="get">
                            <div class="position-relative">
                                <input class="form-control" type="search" name="search_key" id="search_key"
                                    value="{{ request('search_key') ?? '' }}" placeholder="Search" aria-label="Search">

                                <button class="btn btn-search" type="submit">
                                    <img src="{{ asset('assets/images/search.png') }}" alt="search" class="img-fluid"
                                        title="search">
                                </button>
                            </div>
                            @error('search_key')
                            <span id="searchValidationErrorLabel" class="text-danger">{{ $message }}</span>
                            @enderror
                        </form>
                    </div>
                    <div class="d-flex align-items-center">
                        <a href="https://www.india.gov.in/" onclick="return confirm('{{ $alertMessage }}')"
                            target="_blank" class="me-4">
                            <img src="{{ asset('assets/images/emblem.svg') }}" alt="emblem" title="emblem"
                                class="img-fluid">
                        </a>
                        <a href="https://yoga.ayush.gov.in/" onclick="return confirm('{{ $alertMessage }}')"
                            target="_blank" class="me-4">
                            <img src="{{ asset('assets/images/international-yoga.svg') }}" alt="international-yoga"
                                class="img-fluid" title="ayush yoga">
                        </a>
                        <a href="https://amritmahotsav.nic.in/" onclick="return confirm('{{ $alertMessage }}')"
                            target="_blank" class="me-4">
                            <img src="{{ asset('assets/images/aazadi.svg') }}" alt="aazadi" title="aazadi"
                                class="img-fluid">
                        </a>
                        <a href="https://www.g20.org/en/" onclick="return confirm('{{ $alertMessage }}')"
                            target="_blank">
                            <img src="{{ asset('assets/images/g20-india.svg') }}" alt="g20-india" title="g20-india"
                                class="img-fluid">
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
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page"
                        href="{{ url('/') }}" tabindex="-1">
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </a>
                </li>
                @if(isset($headerMenu) && count($headerMenu)>0)
                @foreach($headerMenu as $firstmenu)
                @php if(Session::get('locale') == 'hi'){ $alrt ="return confirm('यह लिंक आपको एक बाहरी वेब साइट पर ले
                जाएगा।')"; } else { $alrt ="return confirm('This link will take you to an external web site.')"; }
                @endphp
                <li class="nav-item dropdown">
                    <a class="nav-link"
                        href="@php if(isset($firstmenu->children) && count($firstmenu->children)>0){ echo 'javascript:void(0)'; }else{ echo url($firstmenu->url); } @endphp"
                        target="@php if(isset($firstmenu->tab_type) && $firstmenu->tab_type ==1){ echo'_blank'; }else{ echo ''; } @endphp"
                        onclick="@php if($firstmenu->tab_type ==1){ echo $alrt; }else{ echo ''; } @endphp"
                        aria-expanded="false">
                        @if(Session::get('locale') == 'hi') {{ $firstmenu->name_hi }} @else {{ $firstmenu->name_en }}
                        @endif
                        @if(isset($firstmenu->children) && count($firstmenu->children)>0)
                        <img src="{{ asset('/assets/images/arrow-down.png') }}" alt="arrow" class="img-fluid" />
                        @endif
                    </a>
                    <ul class="dropdown-menu">
                        @if(isset($firstmenu->children) && count($firstmenu->children)>0)
                        @foreach($firstmenu->children as $secondmenu)
                        <li class="dropdown-submenu-item"><a class="@php if(isset($secondmenu->children) && count($secondmenu->children)>0){ echo 'dropdown-submenu-link'; }else{ ''; } @endphp"
                                href="@php if(isset($secondmenu->children) && count($secondmenu->children)>0){ echo 'javascript:void(0)'; }else{  if(isset($secondmenu->tab_type) && $secondmenu->tab_type ==1){echo $secondmenu->url; }else{ echo url($firstmenu->url.'/'.$secondmenu->url); }	} @endphp"
                                target="@php if($secondmenu->tab_type ==1){ echo'_blank'; }else{ echo ''; } @endphp"
                                onclick="@php if($secondmenu->tab_type ==1){ echo $alrt; }else{ echo ''; } @endphp">
                                @if(Session::get('locale') == 'hi') {{ $secondmenu->name_hi }} @else
                                {{ $secondmenu->name_en }} @endif
                            </a>
                            <ul class="dropdown-submenu">
                                @if(isset($secondmenu->children) && count($secondmenu->children)>0)
                                @foreach($secondmenu->children as $thirdmenu)
                                <li><a class="dropdown-item"
                                        href="
                                             @php if(isset($thirdmenu->children) && count($thirdmenu->children)>0){ echo 'javascript:void(0)'; }else{  if(isset($thirdmenu->tab_type) && $thirdmenu->tab_type ==1){echo $thirdmenu->url; }else{ echo url($firstmenu->url.'/'.$secondmenu->url.'/'.$thirdmenu->url); }	} @endphp"
                                        target="@php if($thirdmenu->tab_type ==1){ echo'_blank'; }else{ echo ''; } @endphp"
                                        onclick="@php if($thirdmenu->tab_type ==1){ echo $alrt; }else{ echo ''; } @endphp">
                                        @if(Session::get('locale') == 'hi') {{ $thirdmenu->name_hi }} @else
                                        {{ $thirdmenu->name_en }} @endif
                                    </a></li>
                                @endforeach
                                @endif
                            </ul>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                </li>
                @endforeach
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
    @if(isset($social_links->facebook) && $social_links->facebook !=null)
        <a href="{{$social_links->facebook}}"
            onclick="return confirm('@if(Session::get('locale') == 'hi'){{ 'यह लिंक आपको एक बाहरी वेबसाइट पर ले जाएगा.' }}@else{{ 'This link will take you to an external website.' }}@endif ')"
            target="_blank" class="Facebook" title="Facebook">
            <i class="fa fa-facebook-f"></i>
            @if (Session::get('locale') == 'hi'){{ 'फेसबुक' }}@else{{'Facebook'}}@endif
        </a>
    @endif
    @if(isset($social_links->twitter) && $social_links->twitter !=null)
        <a href="{{$social_links->twitter}}" class="Twitter"
            onclick="return confirm('@if(Session::get('locale') == 'hi'){{ 'यह लिंक आपको एक बाहरी वेबसाइट पर ले जाएगा.' }}@else{{ 'This link will take you to an external website.' }}@endif ')"
            target="_blank" title="Twitter">
            <div class="twitter-icon"> <img src="{{ asset('assets/images/twitter_icon.png') }}" alt="twitter" title="twitter"></div>
            @if (Session::get('locale') == 'hi') {{ 'ट्विटर' }}@else{{'Twitter'}}@endif
        </a>
    @endif
    @if(isset($social_links->instagram) && $social_links->instagram !=null)
        <a href="{{$social_links->instagram}}"
            onclick="return confirm('@if(Session::get('locale') == 'hi'){{ 'यह लिंक आपको एक बाहरी वेबसाइट पर ले जाएगा.' }}@else{{ 'This link will take you to an external website.' }}@endif ')"
            class="Instagram" target="_blank" title="Instagram">
            <i class="fa fa-instagram"></i>
            @if (Session::get('locale') == 'hi'){{ 'इंस्टाग्राम' }}@else {{'Instagram'}}@endif
        </a>
    @endif
    @if(isset($social_links->linkedin) && $social_links->linkedin !=null)
        <a href="{{$social_links->linkedin}}" class="Youtube"
            onclick="return confirm('@if(Session::get('locale') == 'hi'){{ 'यह लिंक आपको एक बाहरी वेबसाइट पर ले जाएगा.' }}@else{{ 'This link will take you to an external website.' }}@endif ')"
            target="_blank" title="LinkedIn">
            <i class="fa fa-linkedin"></i>
            @if (Session::get('locale') == 'hi'){{ 'लिंक्डइन' }}@else{{'LinkedIn'}}@endif
        </a>
    @endif
    </div>
</div>