@extends('layout.master')
@section('title')
    {{ __('Site Map') }}
@endsection
@section('content')
<section class="breadcrumb">
    <div class="page-breadcrumb">
      <div class="breadcrumb-img">
        <img src="{{ asset('assets/images/bredcrumb.jpg') }}" alt="" />
      </div>
      <div class="breadcrumb-title">
        <h3 class="title"> Sitemap</h3>
      </div>
    </div>
  </section>
  <div class="main-body">
    <div class="container breadcrumbs-link">
      <div class="breadcrumbs-link-text">
        <ul>
          <li>
            <a class="active" href="{{ route('/') }}" tabindex="0"> Home </a>
          </li>
          <li>Sitemap</li>
        </ul>
      </div>
    </div>
    <section class="sitemap bg-grey" id="about">
      <div class="container">
        <div class="master">
          <h1>RAV Website Link</h1>
          <h2>Main menu</h2>
          <ul class="site-map-menu">
            <li class="first leaf"><a href="/en" title="Home">Home</a></li>
            <li class="expanded"><a href="/en/about-us" title="About Us">About Us</a>
              <ul class="site-map-menu">
                <li class="first leaf"><a href="/en/our-objective" title="Our Objective.">Our Objective</a></li>
                <li class="leaf"><a href="/en/citizens-charter" title="Citizens Charter">Citizens Charter</a></li>
                <li class="leaf"><a href="/en/fellows-vidyapeeth-1" title="">Fellows of Vidyapeeth</a></li>
                <li class="leaf"><a href="/en/governing-body" title="Governing Body">Governing Body</a></li>
                <li class="leaf"><a href="/en/publication-vidyapeeth" title="Publication of Vidyapeeth">Publication of
                    Vidyapeeth</a></li>
                <li class="leaf"><a href="/en/standing-finance-committee" title="Standing Finance Committee">Standing
                    Finance Committee</a></li>
                <li class="leaf"><a href="/en/crav-gurus">CRAV Gurus</a></li>
                <li class="last leaf"><a href="/en/who-who">Who's Who</a></li>
              </ul>
            </li>
            <li class="expanded"><a href="http://#" title="" class="ext" target="_blank">Meet the Minister<span
                  class="ext"><span class="element-invisible"> (link is external)</span></span></a>
              <ul class="site-map-menu">
                <li class="first leaf"><a href="/en/hon%E2%80%99ble-cabinet-minister">Hon’ble Cabinet Minister</a></li>
                <li class="last leaf"><a href="/en/hon%E2%80%99ble-minister-state">Hon’ble Minister of State</a></li>
              </ul>
            </li>
            <li class="leaf"><a href="/en/Ayurveda-Training-Accreditation-Board-ATAB">Ayurveda Training Accreditation
                Board (ATAB)</a></li>
            <li class="leaf"><a href="/en/endorsement-overseas-ayurveda-professionals">Endorsement of overseas Ayurveda
                Professionals</a></li>
            <li class="expanded"><a href="/en/theses-submitted-rav-students" title="Activities">Activities</a>
              <ul class="site-map-menu">
                <li class="first leaf"><a href="/en/interactive-workshops-0" title="Interactive Workshops">Interactive
                    Workshops</a></li>
                <li class="leaf"><a href="/en/promotion-ayurvedic-aahar">Promotion of Ayurvedic Aahar</a></li>
                <li class="leaf"><a href="/en/gyanganga-knowledge-voyage-weekly-webinar-series">Gyanganga - Knowledge
                    Voyage - A weekly Webinar Series</a></li>
                <li class="leaf"><a href="/en/exploring-facts-covid-19">Exploring the Facts: Covid-19</a></li>
                <li class="leaf"><a href="/en/new-initiative" title="">New Initiative</a></li>
                <li class="leaf"><a href="/en/interactive-workshops" title="Conduction of Training Programs">Conduction
                    of Training Programs</a></li>
                <li class="leaf"><a href="/en/theses-submitted-rav-students"
                    title="Theses Submitted by RAV Students">Theses Submitted by RAV Students</a></li>
                <li class="leaf"><a href="/en/celebration-international-yoga-day-2021">Celebration of International Yoga
                    Day 2023</a></li>
                <li class="last leaf"><a href="/en/expert-talks-series-poshan-nutrition">Expert Talks Series on
                    Poshan-Nutrition</a></li>
              </ul>
            </li>
            <li class="expanded"><a href="/en/events-0" title="Events">Events</a>
              <ul class="site-map-menu">
                <li class="first leaf"><a href="/en/conferencesseminars" title="Seminars / Conferences">Seminars /
                    Conferences</a></li>
                <li class="leaf"><a href="/en/convocation" title="Convocation">Convocation</a></li>
                <li class="last leaf"><a href="/en/training-calendar">Training Calendar</a></li>
              </ul>
            </li>
            <li class="leaf"><a href="/en/awards" title="Awards">Awards</a></li>
            <li class="expanded"><a href="/en/gallery-category" title="Gallery">Gallery</a>
              <ul class="site-map-menu">
                <li class="first last leaf"><a href="/en/gallery-category" title="Photo Gallery Category">Photo
                    Gallery</a></li>
              </ul>
            </li>
            <li class="leaf"><a href="/en/annual-reports">Annual Reports</a></li>
            <li class="leaf"><a href="/en/e-newsletter">E-Newsletter</a></li>
            <li class="leaf"><a href="http://ravdelhi.nic.in/en/covid-19-helpline" title="">AYUSH Covid-19 Counselling
                Helpline</a></li>
            <li class="leaf"><a href="/en/alumni-corner">Alumni Corner</a></li>
            <li class="expanded"><a href="/en/rsbk-e-directory">RSBK E-Directory</a>
              <ul class="site-map-menu">
                <li class="first leaf"><a href="/en/rsbk-directory-institute-wise">RSBK Directory Institute Wise</a>
                </li>
                <li class="leaf"><a href="/en/rsbk-directory-qualification-wise">RSBK Directory Qualification Wise</a>
                </li>
                <li class="leaf"><a href="/en/rsbk-directory-state-wise">RSBK Directory State Wise</a></li>
                <li class="last leaf"><a href="/en/rsbk-directory-year-wise">RSBK Directory Year Wise</a></li>
              </ul>
            </li>
            <li class="last leaf"><a href="/en/contact-us" title="Contact us">Contact Us</a></li>
          </ul>

          <h2>
            Left Side Menu
          </h2>

          <ul class="site-map-menu">
            <li class="first leaf"><a href="/en/message-presidentgb" title="Message From President,G.B">Message From
                President,G.B</a></li>
            <li class="leaf"><a href="/en/cme-scheme" title="CME Scheme">CME Scheme</a></li>
            <li class="leaf"><a href="/en/guru-shishya-parampara" title="Courses Under Guru Shishya Parampara">Courses
                Under Guru Shishya Parampara</a></li>
            <li class="leaf"><a href="/en/tender" title="">Tenders</a></li>
            <li class="leaf"><a href="/en/vacancy" title="">Vacancy</a></li>
            <li class="leaf"><a href="/en/theses-submitted-rav-students" title="RAV Students">Thesis Submitted by RAV
                Students</a></li>
            <li class="leaf"><a href="/en/right-information" title="Right to Information Act (RTI)">Right to Information
                Act (RTI)</a></li>
            <li class="leaf"><a href="/en/admission-courses" title="Admission to Courses">Admission to Courses</a></li>
            <li class="last leaf"><a href="/en/publication-vidyapeeth" title="">Publication of Vidyapeeth</a></li>
          </ul>
          <h2>
            Footer Menu
          </h2>

          <ul class="site-map-menu">
            <li class="first leaf"><a href="/en/accessibility-help" title="Help">Help</a></li>
            <li class="leaf"><a href="/en/disclaimar" title="Disclaimar">Disclaimer</a></li>
            <li class="leaf"><a href="/en/feedback" title="Feedback">Feedback</a></li>
            <li class="leaf"><a href="/en/accessibility-statement" title="Accessibility Statement">Accessibility
                Statement</a></li>
            <li class="leaf"><a href="/en/sitemap" title="Sitemap" class="active">Sitemap</a></li>
            <li class="leaf"><a href="/en/archive" title="Archive">Archive</a></li>
            <li class="leaf"><a href="/en/website-policies" title="Website policies">Website policies</a></li>
            <li class="leaf"><a href="/en/terms-conditions" title="Terms &amp; Conditions">Terms &amp; Conditions</a>
            </li>
            <li class="last leaf"><a href="/en/related-links" title="Related Links">Related Links</a></li>
          </ul>
          <!--
            <ul>
                <li> <a href="" title="">Home</a></li>
                <li> <a href="" title="">About Us</a>
                <ul>
                    <li><a href="#" title="">About1</a></li>
                    <li><a href="#" title="">About2</a></li>
                </ul>
                </li>
                <li> <a href="#" title="">Alumni Corner</a></li>
                <li> <a href="#" title="">  RSBK E-Directory</a></li>
                <li> <a href="#" title="">Activities</a></li>
                <li> <a href="#" title="">Events</a></li>
                <li> <a href="#" title="">Importants</a></li>
                <li> <a href="#" title="">Media</a></li>
                <li> <a href="#" title="">Ayurveda Training</a></li>
                <li> <a href="#" title="">Overseas Ayurveda Professionals</a></li>

              </ul> -->
        </div>

      </div>
    </section>
@endsection