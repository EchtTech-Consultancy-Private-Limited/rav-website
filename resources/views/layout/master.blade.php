<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.header-script')
</head>
<body>
    <div id="english-lang">
        <div class="header-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @include('partials.top-head')
                    </div>
                </div>
            </div>
        </div>
        <div class="site-header">
            @include('partials.header')
        </div>
        <!--Start Social Media  Sticky Icon HTML COde-->
        @if (isset($social_links) && $social_links != '')
            <div class="sticky-i d-non">
                <div class="sticky-icon">
                    @if ($social_links->facebook != '' && $social_links->facebook != 0)
                        <a href="{{ url($social_links->facebook) ?? '' }}"
                            onclick="return confirm('{{ $alertMessage }}')" target="_blank" class="Facebook"
                            title="Facebook"><i class="fa fa-facebook-f"> </i> Facebook
                        </a>
                    @endif
                    @if ($social_links->twitter != '' && $social_links->twitter != 0)
                        <a href="{{ url($social_links->twitter) ?? '' }}" class="Twitter"
                            onclick="return confirm('{{ $alertMessage }}')" target="_blank" title="Twitter">
                            <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                             <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
                            </svg>
                            </i>  Twitter </a>
                    @endif
                    @if ($social_links->instagram != '' && $social_links->instagram != 0)
                        <a href="{{ url($social_links->instagram) ?? '' }}"
                            onclick="return confirm('{{ $alertMessage }}')" class="Instagram" target="_blank"
                            title="Instagram"><i class="fa fa-instagram"></i> Instagram
                        </a>
                    @endif
                    @if ($social_links->linkedin != '' && $social_links->linkedin != 0)
                        <a href="{{ url($social_links->linkedin) ?? '' }}" class="Youtube"
                            onclick="return confirm('{{ $alertMessage }}')" target="_blank" title="Linkedin"><i
                                class="fa fa-linkedin"> </i> Linkedin </a>
                    @endif
                </div>
            </div>
        @endif
        <!--End Social Media  Sticky Icon-->
        @yield('content')
        <div class="site-footer">
            <div class="container">
                @include('partials.footer')
            </div>
        </div>
    </div>
    @include('partials.footer-script')
</body>
</html>
