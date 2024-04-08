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
                                        class="nav-link {{ request()->is('m-pharma') || request()->is('m-d') || request()->is('p-g') || request()->is('ph-d') ? 'qm-active' : 'collapsed' }}"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseOne_0"
                                        aria-expanded="{{ request()->is('m-pharma') || request()->is('m-d') || request()->is('p-g') || request()->is('ph-d') ? 'true' : 'false' }}"
                                        aria-controls="flush-collapseOne" tabindex="0">
                                        @if (Session::get('locale') == 'hi')
                                            {{ $trees->name_hi ?? '' }}
                                        @else
                                            {{ $trees->name_en ?? '' }}
                                        @endif
                                    </a>
                                </div>
                                <div id="flush-collapseOne_0"
                                    class="accordion-collapse collapse {{ request()->is('m-pharma') || request()->is('m-d') || request()->is('p-g') || request()->is('ph-d') ? 'show' : '' }}"
                                    aria-labelledby="flush-headingOne_0" data-bs-parent="#sidebarDropdown_0">
                                    <div class="accordion-body p-0">
                                        <ul class="p-0 m-0 mt-3">
                                            <li class="{{ request()->is('m-pharma') ? 'qm-active' : '' }}"><a
                                                    href="{{ url('m-pharma') }}">M. Pharma</a>
                                            </li>
                                            <li class="{{ request()->is('m-d') ? 'qm-active' : '' }}"><a
                                                    href="{{ url('m-d') }}">M. D</a></li>
                                            <li class="{{ request()->is('p-g') ? 'qm-active' : '' }}"><a
                                                    href="{{ url('p-g') }}">P. G</a></li>
                                            <li class="{{ request()->is('ph-d') ? 'qm-active' : '' }}"><a
                                                    href="{{ url('ph-d') }}">Ph. D</a></li>
                                            <!-- Add more submenu items as needed -->
                                        </ul>
                                    </div>

                                </div>


                        </li>
                    @elseif ($trees->url == 'rsbk-directory-state-wise')
                        <li class="accordion accordion-flush position-relative sl-accordion @if (request()->is($parentMenuUrl . '/' . $treesUrl)) active @endif"
                            id="sidebarDropdown_1">
                            <div class="accordion-item border-0">
                                <div class="list-start" id="flush-headingOne_1">
                                    <a href="{{ url($parentMenuUrl . '/' . $treesUrl) }}"
                                        class="nav-link {{ request()->is('delhi') ||
                                        request()->is('goa') ||
                                        request()->is('gujarat') ||
                                        request()->is('himachal-pradesh') ||
                                        request()->is('karnataka') ||
                                        request()->is('kerala') ||
                                        request()->is('madhya-pradesh') ||
                                        request()->is('chhattisgarh') ||
                                        request()->is('maharashtra') ||
                                        request()->is('odisha') ||
                                        request()->is('punjab') ||
                                        request()->is('rajasthan') ||
                                        request()->is('uttar-pradesh') ||
                                        request()->is('uttarakhand')
                                            ? 'qm-active'
                                            : 'collapsed' }}"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseOne_1"
                                        aria-expanded="{{ request()->is('delhi') ||
                                        request()->is('goa') ||
                                        request()->is('gujarat') ||
                                        request()->is('himachal-pradesh') ||
                                        request()->is('karnataka') ||
                                        request()->is('kerala') ||
                                        request()->is('madhya-pradesh') ||
                                        request()->is('chhattisgarh') ||
                                        request()->is('maharashtra') ||
                                        request()->is('odisha') ||
                                        request()->is('punjab') ||
                                        request()->is('rajasthan') ||
                                        request()->is('uttar-pradesh') ||
                                        request()->is('uttarakhand')
                                            ? 'true'
                                            : 'false' }}"
                                        aria-controls="flush-collapseOne" tabindex="0">
                                        @if (Session::get('locale') == 'hi')
                                            {{ $trees->name_hi ?? '' }}
                                        @else
                                            {{ $trees->name_en ?? '' }}
                                        @endif
                                    </a>
                                </div>
                                <div id="flush-collapseOne_1"
                                    class="accordion-collapse collapse {{ request()->is('delhi') ||
                                    request()->is('goa') ||
                                    request()->is('gujarat') ||
                                    request()->is('himachal-pradesh') ||
                                    request()->is('karnataka') ||
                                    request()->is('kerala') ||
                                    request()->is('madhya-pradesh') ||
                                    request()->is('chhattisgarh') ||
                                    request()->is('maharashtra') ||
                                    request()->is('odisha') ||
                                    request()->is('punjab') ||
                                    request()->is('rajasthan') ||
                                    request()->is('uttar-pradesh') ||
                                    request()->is('uttarakhand')
                                        ? 'show'
                                        : '' }}"
                                    aria-labelledby="flush-headingOne_1" data-bs-parent="#sidebarDropdown_1">
                                    <div class="accordion-body p-0">
                                        <ul class="p-0 m-0 mt-3">
                                            <li class="{{ request()->is('delhi') ? 'qm-active' : '' }}"><a
                                                    href="{{ url('delhi') }}">Delhi</a></li>
                                            <li class="{{ request()->is('goa') ? 'qm-active' : '' }}"><a
                                                    href="{{ url('goa') }}">Goa</a></li>
                                            <li class="{{ request()->is('gujarat') ? 'qm-active' : '' }}"><a
                                                    href="{{ url('gujarat') }}">Gujarat</a></li>
                                            <li class="{{ request()->is('himachal-pradesh') ? 'qm-active' : '' }}"><a
                                                    href="{{ url('himachal-pradesh') }}">Himachal Pradesh</a></li>
                                            <li class="{{ request()->is('karnataka') ? 'qm-active' : '' }}"><a
                                                    href="{{ url('karnataka') }}">Karnataka</a></li>
                                            <li class="{{ request()->is('kerala') ? 'qm-active' : '' }}"><a
                                                    href="{{ url('kerala') }}">Kerala</a></li>
                                            <li class="{{ request()->is('madhya-pradesh') ? 'qm-active' : '' }}"><a
                                                    href="{{ url('madhya-pradesh') }}">Madhya Pradesh</a></li>
                                            <li class="{{ request()->is('chhattisgarh') ? 'qm-active' : '' }}"><a
                                                    href="{{ url('chhattisgarh') }}">Chhattisgarh</a></li>
                                            <li class="{{ request()->is('maharashtra') ? 'qm-active' : '' }}"><a
                                                    href="{{ url('maharashtra') }}">Maharashtra</a></li>
                                            <li class="{{ request()->is('odisha') ? 'qm-active' : '' }}"><a
                                                    href="{{ url('odisha') }}">Odisha</a></li>
                                            <li class="{{ request()->is('punjab') ? 'qm-active' : '' }}"><a
                                                    href="{{ url('punjab') }}">Punjab</a></li>
                                            <li class="{{ request()->is('rajasthan') ? 'qm-active' : '' }}"><a
                                                    href="{{ url('rajasthan') }}">Rajasthan</a></li>
                                            <li class="{{ request()->is('uttar-pradesh') ? 'qm-active' : '' }}"><a
                                                    href="{{ url('uttar-pradesh') }}">Uttar Pradesh</a></li>
                                            <li class="{{ request()->is('uttarakhand') ? 'qm-active' : '' }}"><a
                                                    href="{{ url('uttarakhand') }}">Uttarakhand</a></li>

                                            <!-- Add more submenu items as needed -->
                                        </ul>
                                    </div>

                                </div>


                        </li>
                    @elseif ($trees->url == 'rsbk-directory-year-wise')
                        <li class="accordion accordion-flush position-relative sl-accordion @if (request()->is($parentMenuUrl . '/' . $treesUrl)) active @endif"
                            id="sidebarDropdown_3">
                            <div class="accordion-item border-0">
                                <div class="list-start" id="flush-headingOne_3">
                                    <a href="{{ url($parentMenuUrl . '/' . $treesUrl) }}"
                                        class="nav-link {{ request()->is('rsbk-directory-from-1951-to-1960') || request()->is('rsbk-directory-from-1961-to-1970') || request()->is('rsbk-directory-from-1971-to-1980') || request()->is('rsbk-directory-from-1981-to-1990') || request()->is('rsbk-directory-from-1991-to-2000') || request()->is('rsbk-directory-from-2001-to-2005') || request()->is('rsbk-directory-from-2006-to-2010') || request()->is('rsbk-directory-from-2011-to-2015') || request()->is('rsbk-directory-from-2016-to-2020') || request()->is('rsbk-directory-from-2021-to-2023') ? 'qm-active' : 'collapsed' }}"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseOne_3"
                                        aria-expanded="{{ request()->is('rsbk-directory-from-1951-to-1960') || request()->is('rsbk-directory-from-1961-to-1970') || request()->is('rsbk-directory-from-1971-to-1980') || request()->is('rsbk-directory-from-1981-to-1990') || request()->is('rsbk-directory-from-1991-to-2000') || request()->is('rsbk-directory-from-2001-to-2005') || request()->is('rsbk-directory-from-2006-to-2010') || request()->is('rsbk-directory-from-2011-to-2015') || request()->is('rsbk-directory-from-2016-to-2020') || request()->is('rsbk-directory-from-2021-to-2023') ? 'true' : 'false' }}"
                                        aria-controls="flush-collapseOne" tabindex="0">
                                        @if (Session::get('locale') == 'hi')
                                            {{ $trees->name_hi ?? '' }}
                                        @else
                                            {{ $trees->name_en ?? '' }}
                                        @endif
                                    </a>
                                </div>
                                <div id="flush-collapseOne_3"
                                    class="accordion-collapse collapse {{ request()->is('rsbk-directory-from-1951-to-1960') || request()->is('rsbk-directory-from-1961-to-1970') || request()->is('rsbk-directory-from-1971-to-1980') || request()->is('rsbk-directory-from-1981-to-1990') || request()->is('rsbk-directory-from-1991-to-2000') || request()->is('rsbk-directory-from-2001-to-2005') || request()->is('rsbk-directory-from-2006-to-2010') || request()->is('rsbk-directory-from-2011-to-2015') || request()->is('rsbk-directory-from-2016-to-2020') || request()->is('rsbk-directory-from-2021-to-2023') ? 'show' : '' }}"
                                    aria-labelledby="flush-headingOne_3" data-bs-parent="#sidebarDropdown_3">
                                    <div class="accordion-body p-0">
                                        <ul class="p-0 m-0 mt-3">
                                            <li
                                                class="{{ request()->is('rsbk-directory-from-1951-to-1960') ? 'qm-active' : '' }}">
                                                <a href="{{ url('rsbk-directory-from-1951-to-1960') }}">RSBK Directory
                                                    From 1951 to 1960</a>
                                            </li>
                                            <li
                                                class="{{ request()->is('rsbk-directory-from-1961-to-1970') ? 'qm-active' : '' }}">
                                                <a href="{{ url('rsbk-directory-from-1961-to-1970') }}">RSBK Directory
                                                    From 1961 to 1970</a>
                                            </li>
                                            <li
                                                class="{{ request()->is('rsbk-directory-from-1971-to-1980') ? 'qm-active' : '' }}">
                                                <a href="{{ url('rsbk-directory-from-1971-to-1980') }}">RSBK Directory
                                                    From 1971 to 1980</a>
                                            </li>
                                            <li
                                                class="{{ request()->is('rsbk-directory-from-1981-to-1990') ? 'qm-active' : '' }}">
                                                <a href="{{ url('rsbk-directory-from-1981-to-1990') }}">RSBK Directory
                                                    From 1981 to 1990</a>
                                            </li>
                                            <li class="{{ request()->is('rsbk-directory-from-1991-to-2000') ? 'qm-active' : '' }}">
                                                <a href="{{ url('rsbk-directory-from-1991-to-2000') }}">RSBK Directory
                                                    From 1991 to 2000</a></li>
                                            <li class="{{ request()->is('rsbk-directory-from-2001-to-2005') ? 'qm-active' : '' }}">
                                                <a href="{{ url('rsbk-directory-from-2001-to-2005') }}">RSBK Directory
                                                    From 2001 to 2005</a></li>
                                            <li class="{{ request()->is('rsbk-directory-from-2006-to-2010') ? 'qm-active' : '' }}">
                                                <a href="{{ url('rsbk-directory-from-2006-to-2010') }}">RSBK Directory
                                                    From 2006 to 2010</a></li>
                                            <li class="{{ request()->is('rsbk-directory-from-2011-to-2015') ? 'qm-active' : '' }}">
                                                <a href="{{ url('rsbk-directory-from-2011-to-2015') }}">RSBK Directory
                                                    From 2011 to 2015</a></li>
                                            <li class="{{ request()->is('rsbk-directory-from-2016-to-2020') ? 'qm-active' : '' }}">
                                                <a href="{{ url('rsbk-directory-from-2016-to-2020') }}">RSBK Directory
                                                    From 2016 to 2020</a></li>
                                            <li class="{{ request()->is('rsbk-directory-from-2021-to-2023') ? 'qm-active' : '' }}">
                                                <a href="{{ url('rsbk-directory-from-2021-to-2023') }}">RSBK Directory
                                                    From 2021 to 2023</a></li>
                                            <!-- Add more submenu items as needed -->
                                        </ul>
                                    </div>

                                </div>


                        </li>
                    @else
                        <li class="nav-item @if (request()->is($parentMenuUrl . '/' . $treesUrl)) active @endif" role="presentation">
                            <a href="{{ url($parentMenuUrl . '/' . $treesUrl) }}" class="nav-link ">
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
