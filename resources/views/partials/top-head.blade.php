<div class="header-top-content">
    <div class="header-top-left">
        <ul>
            <li> <a href="https://www.india.gov.in/">Goverment of India</a></li>
            <li><a href="https://ayushmanbharat.mp.gov.in/">Ayushman Bharat</a></li>
            <li>
                <!-- <a href="{{ route('site-map') }}">
                    <span class="accessbility-nav-link">
                        @if (Session::get('locale') == 'en')
                        {{ __('messages.sitemap') }}
                        @else
                        {{ __('messages.sitemap') }}
                        @endif
                    </span>
                    <span class="accessbility-nav-link-icon">
                        <i class="fa fa-sitemap" aria-hidden="true"></i>
                    </span>
                </a> -->
                  <span class="dateTime"></span>
            </li>
            <!-- <li>
                <a href="#about-us">
                    <span class="">
                        @if (Session::get('locale') == 'en')
                        {{ __('messages.Skip-content') }}
                        @else
                        {{ __('messages.Skip-content') }}
                        @endif
                    </span>
                    <span class="accessbility-nav-link-icon">
                        <i class="fa fa-arrow-up" aria-hidden="true"></i>
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('screen-reader-access') }}">
                    <span class="accessbility-nav-link">
                        @if (Session::get('locale') == 'en')
                        {{ __('messages.Screen-Access') }}
                        @else
                        {{ __('messages.Screen-Access') }}
                        @endif
                    </span>
                    <span class="accessbility-nav-link-icon">
                        <i class="fa fa-volume-up" aria-hidden="true"></i>
                    </span>
                </a>
            </li> -->
        </ul>
    </div>
    <div class="header-top-right">
        <ul class="d-flex align-items-center">
            <li class="acees-style1"> <a href="#" title="Skip to main Content"><i class="fa fa-arrow-up"></i> </a></li>
            <li class="acees-style1"> <a href="#" title="Screen Reader Access"> <i class="fa fa-volume-up"></i></a></li>
           
            <li class="dropdown acees-style1 acees-style2">
                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <a href="#" title="accessbility" > <b>T</b><sub><b>T</b></sub></a>
                </button>
                <ul class="dropdown-menu">
                    <li>  <button class="text-increment-btn" onclick="decreaseFontSize()">A-</button></li>
                    <li>  <button class="text-increment-btn" onclick="normaltext()">A</button></li>
                    <li><button class="text-increment-btn" onclick="increaseFontSize()">A+</button></li>
                </ul>
            </li>
 
            <!-- <li>
                <div class="d-flex">
                    <button class="text-increment-btn" onclick="decreaseFontSize()">A-</button>
                    <button class="text-increment-btn" onclick="normaltext()">A</button>
                    <button class="text-increment-btn" onclick="increaseFontSize()">A+</button>
                </div>
            </li> -->
            <li>

                <div class="select-wrap">
                    <img src="assets/images/globe.svg" alt="globe" class="img-fluid">
                    <select class="form-select language" id="language-eng" onchange="setlang(value);">
                        <option value="en" @if (Session::get('locale')=='en' ) selected @endif>
                            English</option>
                        <option value="hi" @if (Session::get('locale')=='hi' ) selected @endif>
                            हिन्दी</option>
                    </select>
                </div>
            </li>
            <li class="acees-style1"> <a href="#" title="Sitemap"> <i class="fa fa-sitemap" aria-hidden="true"></i></a></li>
            <li>
                <div class="theme-toggle">
                    <label class="switch">
                        <input type="checkbox" class="switch-input" id="mode" onclick="setTheme()">
                        <span data-on="On" data-off="Off" class="switch-label"></span>
                        <span class="switch-handle"></span>
                    </label>
                </div>
            </li>
        </ul>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
        aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        <span class="navbar-toggler-icon"></span>
        <span class="navbar-toggler-icon"></span>
    </button>
</div>