<div class="row">
    <div class="col-md-4">
        <div class="footer-logo">
            <a href="{{ route('/')}}">
            <img src="{{ asset('assets/images/rav-logo-white.png') }}" alt="logo" class="img-fluid">
            </a>
        </div>
    </div>
    @if (isset($social_links) && $social_links != '')
        <div class="col-md-8 d-flex justify-content-end align-items-end">
            <div class="sociallink-wrap">
                <ul>
                    <li>
                    @if ($social_links->facebook != '' && $social_links->facebook != 0)
                        <a href="{{ url($social_links->facebook) ?? '' }}" onclick="return confirm('{{ $alertMessage }}')"
                            target="_blank" class="Facebook" title="Facebook"><i class="fa fa-facebook"
                                aria-hidden="true"></i>
                        </a>
                    @endif
                 </li>
                    <li> 
                    @if ($social_links->twitter != '' && $social_links->twitter != 0)
                        <a href="{{ url($social_links->twitter) ?? '' }}" class="Twitter"
                            onclick="return confirm('{{ $alertMessage }}')" target="_blank" title="Twitter">
                            <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                             <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
                            </svg>
                            </i> 
                        </a>
                    @endif
                    </li>
                    <li>
                    @if ($social_links->instagram != '' && $social_links->instagram != 0)
                        <a href="{{ url($social_links->instagram) ?? '' }}"
                            onclick="return confirm('{{ $alertMessage }}')" class="" target="_blank"
                            title="Instagram"> <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                    @endif
                    </li>
                    <li> 
                    @if ($social_links->linkedin != '' && $social_links->linkedin != 0)
                    <a href="{{url($social_links->linkedin)}}"
                            onclick="return confirm('{{ $alertMessage }}')" class="linkedin" target="_blank"
                            title="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                    @endif
                    </li>
                    
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
                        <a href="{{ route('contact-us') }}">
                            @if (Session::get('locale') == 'hi')
                                हमसे संपर्क करें
                            @else
                                Contact us
                            @endif
                        </a>
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
                <li class="" id="offcanvasli" tabindex="0"></li>
            </ul>
            @endif
        </div>
    </div>
</div>
</div>
<div class="footer-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 px-0">
                <div class="copyright-wrap">
                    <p>
                        @if (Session::get('locale') == 'hi')
                            {{ __('messages.©_Copyright') }}
                        @else
                            {{ __('messages.©_Copyright') }}
                        @endif
                        <?php
                        echo date('Y');
                        ?>
                        <b>
                            @if (Session::get('locale') == 'hi')
                                {{ __('messages.Rashtriya_Ayurveda_Vidyapeeth') }}
                            @else
                                {{ __('messages.Rashtriya_Ayurveda_Vidyapeeth') }}
                            @endif
                        </b>
                        @if (Session::get('locale') == 'hi')
                            {{ __('messages.All_Rights_Reserved') }}
                        @else
                            {{ __('messages.All_Rights_Reserved') }}
                        @endif
                    </p>
                </div>
            </div>
            <div class="col-md-6 justify-content-end">
                <ul>
                    <li>
                        @if (Session::get('locale') == 'hi')
                            {{ __('messages.Last_Updated') }}
                        @else
                            {{ __('messages.Last_Updated') }}
                        @endif <span class="">{{ $LastUpdateRecordDate->format('j F, Y') }}</span>
                    </li>
                    <li class="visitors">
                        @if (Session::get('locale') == 'hi')
                            {{ __('messages.Total_Visitors') }}
                        @else
                            {{ __('messages.Total_Visitors') }}
                        @endif
                        <span id="visitors">{{ $total_visitors ?? 0 }}</span> </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@if(isset($popupAdvertisings->images) && $popupAdvertisings->images !='')
<div id="costumModal8" class="modal fade" data-bs-easein="shrinkIn" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"> <i
                        class="fa fa-times" aria-hidden="true"></i> </button>
                <a href="https://shorturl.at/DLTY3" target="_blank"><img src="{{ asset('resources/uploads/popupadvertising/' . $popupAdvertisings->images) }}" data-id="show" alt="{{$popupAdvertisings->title_name_en??''}}"
                    class="md-img show-model">
                </a>
            </div>
        </div>
    </div>
</div>
@endif