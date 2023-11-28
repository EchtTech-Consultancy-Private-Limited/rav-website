<div class="row">
    <div class="col-md-4">
        <div class="footer-logo">
            <img src="assets/images/rav-logo-white.png" alt="logo" class="img-fluid">
        </div>
    </div>
    <div class="col-md-8 d-flex justify-content-end align-items-end">
        <div class="sociallink-wrap">
            <ul>
                <li>
                    <a href="#">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-12">
       
        <div class="footer-nav">
            <ul>

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
                    </ul>
                @else
                    <h5>No menu available.</h5>
                @endif

                {{-- <li>
                <a title="link" href="{{ route('feedback') }}">Feedback</a>
            </li>
            <li>
                <a title="link" href="{{ route('site-map') }}">Site Map</a>
            </li>
            <li>
                <a title="link" href="./terms-conditions.html">Terms and Conditions</a>
            </li>
            <li>
                <a title="link" href="{{route('contact-us')}}">Contact Us</a>
            </li> --}}
            </ul>
        </div>
    </div>
    <div class="col-md-12">
        <div class="copyright-wrap">
            <p>© 2023 Rashtriya Ayurveda Vidyapeeth</p>
        </div>
    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <span data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="fa fa-times rotate-icon" aria-hidden="true"></i>
            </span>
        </div>
        <div class="offcanvas-body">
            <ul>
                <li class="nav-item my-2">
                    <a class="nav-link an-hove-sidemenu" href="../awards.html"> Awards</a>
                </li>
                <li class="nav-item my-2">
                    <a class="nav-link an-hove-sidemenu" href="../gallery.html"> Gallery</a>
                </li>
                <li class="nav-item my-2">
                    <a class="nav-link an-hove-sidemenu" href="../annualreport.html"> Annual Report</a>
                </li>
                <li class="nav-item my-2">
                    <a class="nav-link an-hove-sidemenu" href="../e-newsletter.html"> E-News Letter</a>
                </li>
                <li class="nav-item my-2">
                    <a class="nav-link an-hove-sidemenu" href="../covid-19-helpline.html"> Ayush Covid-19</a>
                </li>
                <li class="nav-item my-2">
                    <a class="nav-link an-hove-sidemenu" href="../endorsement-overseas-ayurveda-professionals.html">
                        Overseas Ayurveda Professionals</a>
                </li>
                <li class="nav-item my-2">
                    <a class="nav-link an-hove-sidemenu" href="../almuni-corner.html"> Alumni Corner</a>
                </li>
                <li class="nav-item my-2">
                    <a class="nav-link an-hove-sidemenu" href="../contact.html"> Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</div>
