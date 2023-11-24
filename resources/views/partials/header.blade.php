<div class="logo-wrap">
    <div class="container-fluid">
    <div class="row align-items-center">
        <div class="col-md-5">
            <div class="logo-left">
                <a href="{{ route('/') }}">
                <img src="./assets/images/rav-logo.png" alt="logo" class="img-fluid">
                </a>
            </div>
        </div>
        <div class="col-md-7">
            <div class="logo-right">
                <div class="search-wrap me-4">
                <form class="d-flex" role="search">
                    <input
                        class="form-control"
                        type="text"
                        placeholder="Search"
                        aria-label="Search"
                        >
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
                <img src="./assets/images/international-yoga.svg" alt="international-yoga" class="img-fluid">
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
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('/') }}">
                <svg
                    version="1.2"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 25 22"
                    width="25"
                    height="22"
                    >
                    <g>
                        <path d="m24.5 10.1l-11.2-9.8q-0.2-0.1-0.4-0.2-0.3-0.1-0.5-0.1-0.3 0-0.5 0.1-0.3 0.1-0.5 0.2l-11.1 9.8c-0.5 0.5-0.4 0.9 0.3 0.9h3.5v10q0 0.2 0 0.4 0.1 0.2 0.3 0.3 0.1 0.1 0.3 0.2 0.2 0.1 0.4 0.1h4.2v-6.6q0-0.2 0-0.4 0.1-0.2 0.3-0.3 0.1-0.2 0.3-0.2 0.2-0.1 0.4-0.1h4.2q0.2 0 0.4 0.1 0.2 0 0.3 0.2 0.2 0.1 0.2 0.3 0.1 0.2 0.1 0.4v6.6h4.2q0.2 0 0.4-0.1 0.2-0.1 0.3-0.2 0.2-0.1 0.2-0.3 0.1-0.2 0.1-0.4v-10h3.4c0.7 0 0.9-0.4 0.4-0.9z"/>
                    </g>
                </svg>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link an-hove" href="{{ route('/') }}" aria-expanded="false"> About Us
                <img src="./assets/images/arrow-down.png" alt="arrow" class="img-fluid">
                </a>
                <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="{{ route('/') }}">Our Objective</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('/') }}">Citizens Charter</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('/') }}">Fellows of Vidyapeeth</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('/') }}">Governing Body</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('/') }}">Publication of Vidyapeeth</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('/') }}">Standing Finance Committee</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('/') }}">CRAV Gurus</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('/') }}">Who's Who</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('/') }}">Honable Cabinet Minister</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('/') }}">Honable Minister of State</a>
                </li>
                </ul>
            </li>
            <!-- <li class="nav-item dropdown">
                <a class="nav-link an-hove" href="#" aria-expanded="false">
                    Meet Minister
                    <img src="./assets/images/arrow-down.png" alt="arrow" class="img-fluid">
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="./pages/honable-cabinet-minister.html">Honb'le Cabinet Minister</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="./pages/honable-minister-of-state.html">Honb'le Minister of State</a>
                    </li>
                </ul>
                </li> -->
            <li class="nav-item dropdown">
                <a class="nav-link an-hove" href="https://dev.ravguru.staggings.in/public/" aria-expanded="false">
                GSP
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link an-hove" href="https://dev.accr.staggings.in/public/" aria-expanded="false">
                ATAB
                </a>
            </li>
            <li class="nav-item dropdown">
                <a
                class="nav-link an-hove"
                href="./rsbk-e-directory.html"
                role="button"
                aria-expanded="false"
                >
                RSBK E-Directory
                <img src="./assets/images/arrow-down.png" alt="arrow" class="img-fluid">
                </a>
                <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="{{ route('/') }}">RSBK Directory Institute Wise</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('/') }}">RSBK Directory Qualification Wise</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('/') }}">RSBK Directory State Wise</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('/') }}">RSBK Directory Year Wise</a>
                </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a
                class="nav-link an-hove"
                href="./activities.html"
                role="button"
                aria-expanded="false"
                >
                Activities
                <img src="./assets/images/arrow-down.png" alt="arrow" class="img-fluid">
                </a>
                <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="{{ route('/') }}">Interactive Workshops</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('/') }}">Promotion of Ayurvedic Aahar</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('/') }}">Gyanganga - Knowledge Voyage - A weekly Webinar Series</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('/') }}">Exploring the Facts: Covid-19</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('/') }}">New Initiative</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('/') }}">Conduction of Training Programs</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('/') }}">Theses Submitted by RAV Students</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('/') }}">Celebration of International Yoga Day 2023</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('/') }}">Expert Talks Series on Poshan-Nutrition</a>
                </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a
                class="nav-link an-hove"
                href="{{ route('/') }}"
                role="button"
                aria-expanded="false"
                >
                Events
                <img src="./assets/images/arrow-down.png" alt="arrow" class="img-fluid">
                </a>
                <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="{{ route('/') }}">Seminars/Conferences</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('/') }}">Convocation</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('/') }}">Training Calendar</a>
                </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link an-hove" href="{{ route('/') }}"> Ayurveda Training</a>
            </li>
            <li class="nav-item my-2 nav-item-for-mob">
                <a class="nav-link an-hove-sidemenu" href="{{ route('/') }}"> Awards</a>
            </li>
            <li class="nav-item my-2 nav-item-for-mob">
                <a class="nav-link an-hove-sidemenu" href="{{ route('/') }}"> Gallery</a>
            </li>
            <li class="nav-item my-2 nav-item-for-mob">
                <a class="nav-link an-hove-sidemenu" href="{{ route('/') }}"> Annual Report</a>
            </li>
            <li class="nav-item my-2 nav-item-for-mob">
                <a class="nav-link an-hove-sidemenu" href="{{ route('/') }}"> E-News Letter</a>
            </li>
            <li class="nav-item my-2 nav-item-for-mob">
                <a class="nav-link an-hove-sidemenu" href="{{ route('/') }}"> Ayush Covid-19</a>
            </li>
            <li class="nav-item my-2 nav-item-for-mob">
                <a class="nav-link an-hove-sidemenu" href="{{ route('/') }}"> Overseas Ayurveda Professionals</a>
            </li>
            <li class="nav-item my-2 nav-item-for-mob">
                <a class="nav-link an-hove-sidemenu" href="{{ route('/') }}"> Alumni Corner</a>
            </li>
            <li class="nav-item my-2 nav-item-for-mob">
                <a class="nav-link an-hove-sidemenu" href="{{ route('/') }}"> Contact Us</a>
            </li>
            <button
                class="btn side-mn-icn"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasRight"
                aria-controls="offcanvasRight"
                >
            <i class="fa fa-bars fa-bars-m" aria-hidden="true"></i>
            </button>
        </ul>
    </div>
    </div>
</nav>