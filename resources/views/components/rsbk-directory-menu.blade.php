@if (isset($parentMenu) && $parentMenu != '')
<div class="main-sidebar" id="main-sidebar">
    <ul>
        @if ($parentMenu != '' && isset($parentMenu))
            <h3 class="heading-txt-styl">
                @if (Session::get('locale') == 'hi')
                    {{ $parentMenu->name_hi ?? '' }}
                @else
                    {{ $parentMenu->name_en ?? '' }}
                @endif
            </h3>
        @endif
        @if (isset($tree) && count($tree) > 0)
            @foreach ($tree as $index => $trees)
                @php
                    $parentMenuUrl = $parentMenu->url ?? '';
                    $treesUrl = $trees->url ?? '';
                @endphp
                @if ($trees->url == 'rsbk-directory-qualification-wise')
                    <li class="accordion accordion-flush position-relative sl-accordion @if (request()->is($parentMenuUrl . '/' . $treesUrl)) active @endif"
                        id="sidebarDropdown_0">
                        <div class="accordion-item border-0">
                            <div class="list-start" id="flush-headingOne_0">
                                <a href="{{ url($parentMenuUrl . '/' . $treesUrl) }}"
                                    class="nav-link collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne_0"
                                    aria-expanded="false" aria-controls="flush-collapseOne"
                                    tabindex="0">
                                    @if (Session::get('locale') == 'hi')
                                        {{ $trees->name_hi ?? '' }}
                                    @else
                                        {{ $trees->name_en ?? '' }}
                                    @endif
                                </a>
                            </div>
                            <div id="flush-collapseOne_0"
                                class="accordion-collapse collapse @if (request()->is($parentMenuUrl . '/' . $treesUrl)) show @endif"
                                aria-labelledby="flush-headingOne_0"
                                data-bs-parent="#sidebarDropdown_0">
                                <div class="accordion-body p-0">
                                    <ul class="p-0 m-0 mt-3">
                                        <li><a href="{{ url('m-pharma') }}">M. Pharma</a>
                                        </li>
                                        <li><a href="{{ url('m-d') }}">M. D</a></li>
                                        <li><a href="{{ url('p-g') }}">P. G</a></li>
                                        <li><a href="{{ url('ph-d') }}">Ph. D</a></li>
                                        <!-- Add more submenu items as needed -->
                                    </ul>
                                </div>

                            </div>


                    </li>
                @elseif ($trees->url == 'rsbk-directory-state-wise')
                    <li class="accordion accordion-flush position-relative sl-accordion @if (request()->is($parentMenuUrl . '/' . $treesUrl)) active @endif"
                        id="sidebarDropdown_0">
                        <div class="accordion-item border-0">
                            <div class="list-start" id="flush-headingOne_0">
                                <a href="{{ url($parentMenuUrl . '/' . $treesUrl) }}"
                                    class="nav-link collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne_1"
                                    aria-expanded="false" aria-controls="flush-collapseOne"
                                    tabindex="0">
                                    @if (Session::get('locale') == 'hi')
                                        {{ $trees->name_hi ?? '' }}
                                    @else
                                        {{ $trees->name_en ?? '' }}
                                    @endif
                                </a>
                            </div>
                            <div id="flush-collapseOne_1"
                                class="accordion-collapse collapse @if (request()->is($parentMenuUrl . '/' . $treesUrl)) show @endif"
                                aria-labelledby="flush-headingOne_0"
                                data-bs-parent="#sidebarDropdown_0">
                                <div class="accordion-body p-0">
                                    <ul class="p-0 m-0 mt-3">
                                        <li><a href="{{ url('delhi') }}">Delhi</a></li>
                                        <li><a href="{{ url('goa') }}">Goa</a></li>
                                        <li><a href="{{ url('gujarat') }}">Gujarat</a></li>
                                        <li><a href="{{ url('himachal-pradesh') }}">Himachal Pradesh</a></li>
                                        <li><a href="{{ url('karnataka') }}">Karnataka</a></li>
                                        <li><a href="{{ url('kerala') }}">Kerala</a></li>
                                        <li><a href="{{ url('madhya-pradesh') }}">Madhya Pradesh</a></li>
                                        <li><a href="{{ url('chhattisgarh') }}">Chhattisgarh</a></li>
                                        <li><a href="{{ url('maharashtra') }}">Maharashtra</a></li>
                                        <li><a href="{{ url('odisha') }}">Odisha</a></li>
                                        <li><a href="{{ url('punjab') }}">Punjab</a></li>
                                        <li><a href="{{ url('rajasthan') }}">Rajasthan</a></li>
                                        <li><a href="{{ url('uttar-pradesh') }}">Uttar Pradesh</a></li>
                                        <li><a href="{{ url('uttarakhand') }}">Uttarakhand</a></li>
                                        <!-- Add more submenu items as needed -->
                                    </ul>
                                </div>

                            </div>


                    </li>
                    @elseif ($trees->url == 'rsbk-directory-year-wise')
                    <li class="accordion accordion-flush position-relative sl-accordion @if (request()->is($parentMenuUrl . '/' . $treesUrl)) active @endif"
                        id="sidebarDropdown_0">
                        <div class="accordion-item border-0">
                            <div class="list-start" id="flush-headingOne_0">
                                <a href="{{ url($parentMenuUrl . '/' . $treesUrl) }}"
                                    class="nav-link collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne_2"
                                    aria-expanded="false" aria-controls="flush-collapseOne"
                                    tabindex="0">
                                    @if (Session::get('locale') == 'hi')
                                        {{ $trees->name_hi ?? '' }}
                                    @else
                                        {{ $trees->name_en ?? '' }}
                                    @endif
                                </a>
                            </div>
                            <div id="flush-collapseOne_2"
                                class="accordion-collapse collapse @if (request()->is($parentMenuUrl . '/' . $treesUrl)) show @endif"
                                aria-labelledby="flush-headingOne_0"
                                data-bs-parent="#sidebarDropdown_0">
                                <div class="accordion-body p-0">
                                    <ul class="p-0 m-0 mt-3">
                                        <li><a href="{{ url('rsbk-directory-from-1951-to-1960') }}">RSBK Directory From 1951 to 1960</a></li>
                                        <li><a href="{{ url('rsbk-directory-from-1961-to-1970') }}">RSBK Directory From 1961 to 1970</a></li>
                                        <li><a href="{{ url('rsbk-directory-from-1971-to-1980') }}">RSBK Directory From 1971 to 1980</a></li>
                                        <li><a href="{{ url('rsbk-directory-from-1981-to-1990') }}">RSBK Directory From 1981 to 1990</a></li>
                                        <li><a href="{{ url('rsbk-directory-from-1991-to-2000') }}">RSBK Directory From 1991 to 2000</a></li>
                                        <li><a href="{{ url('rsbk-directory-from-2001-to-2005') }}">RSBK Directory From 2001 to 2005</a></li>
                                        <li><a href="{{ url('rsbk-directory-from-2006-to-2010') }}">RSBK Directory From 2006 to 2010</a></li>
                                        <li><a href="{{ url('rsbk-directory-from-2011-to-2015') }}">RSBK Directory From 2011 to 2015</a></li>
                                        <li><a href="{{ url('rsbk-directory-from-2016-to-2020') }}">RSBK Directory From 2016 to 2020</a></li>
                                        <li><a href="{{ url('rsbk-directory-from-2021-to-2023') }}">RSBK Directory From 2021 to 2023</a></li>
                                        <!-- Add more submenu items as needed -->
                                    </ul>
                                </div>

                            </div>


                    </li>
                @else
                    <li class="nav-item @if (request()->is($parentMenuUrl . '/' . $treesUrl)) active @endif"
                        role="presentation">
                        <a href="{{ url($parentMenuUrl . '/' . $treesUrl) }}"
                            class="nav-link ">
                            @if (Session::get('locale') == 'hi')
                                {{ $trees->name_hi ?? '' }}
                            @else
                                {{ $trees->name_en ?? '' }}
                            @endif
                        </a>
                    </li>
                @endif
            @endforeach
        @endif
    </ul>
</div>
@endif