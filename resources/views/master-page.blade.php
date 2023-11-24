@extends('layout.master')
@section('title')
    {{ __('RAV') }}
@endsection
@section('content')
 <section class="breadcrumb">
    <div class="page-breadcrumb">
      <div class="breadcrumb-img">
        <img src="{{ asset('assets/images/bredcrumb.jpg') }}" alt="" />
      </div>
      <div class="breadcrumb-title">
        <h3 class="title">Our Objective</h3>
      </div>
    </div>
  </section>
  <div class="main-body">
    <div class="container breadcrumbs-link">
      <div class="breadcrumbs-link-text">
        <ul>
          <li>
            <a class="active" href="" tabindex="0"> Home </a>
          </li>
          <li>{{ $title_name }}</li>
        </ul>
      </div>
    </div>
    <section class="master bg-grey">
      <div class="container">
        <div class="news-tab common-tab side-tab1">
          <div class="row">
            <div class="col-lg-3 col-md-3">
              <ul class="nav nav-tabs" id="newsTab" role="tablist">
                <h3 class="heading-txt-styl" >About Us</h3>
                <li class="nav-item" role="presentation">
                  <a href="./our-objective.html" class="nav-link active">Our Objective</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a href="./citizens-charter.html" class="nav-link ">Citizens Charter</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a href="./fellows-vidyapeeth-1.html" class="nav-link">Fellows of Vidyapeeth</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a href="./governing-body.html" class="nav-link">Governing Body</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a href="./publication-vidyapeeth.html" class="nav-link">Publication of Vidyapeeth</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a href="./standing-finance-committee.html" class="nav-link">Standing Finance Committee</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a href="./crav-gurus.html" class="nav-link">CRAV Gurus</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a href="./who-who.html" class="nav-link">Who's Who</a>
                </li>

              </ul>
              <ul class="nav-qm nav-tabs mt-3" id="newsTab" role="tablist">
                <h3 class=" quick-menu-head-stl text-center mt-1" >Quick Menu</h3>
                <li class="nav-item nav-item-qm d-flex align-items-center" role="presentation">
                  <i class="fa fa-chevron-right" aria-hidden="true"></i>                 <a title="link" href="../pages/message-presidentgb.html" class="nav-link">Message From President, G.B</a>
                </li>
                <li class="nav-item nav-item-qm d-flex align-items-center" role="presentation">
                  <i class="fa fa-chevron-right" aria-hidden="true"></i>
                  <a title="link" href="../pages/cme-scheme.html" class="nav-link">CME Scheme</a>
                </li>
                <li class="nav-item nav-item-qm d-flex align-items-center" role="presentation">
                  <i class="fa fa-chevron-right" aria-hidden="true"></i>
                  <a title="link" href="../pages/guru-shishya-parampara.html" class="nav-link "> Courses Under Guru Shishya Parampara</a>
                </li>
                <li class="nav-item nav-item-qm d-flex align-items-center" role="presentation">
                  <i class="fa fa-chevron-right" aria-hidden="true"></i>
                  <a title="link" href="../pages/tender.html" class="nav-link"> Tenders</a>
                </li>
                <li class="nav-item nav-item-qm d-flex align-items-center" role="presentation">
                  <i class="fa fa-chevron-right" aria-hidden="true"></i>
                  <a title="link" href="../pages/vacancy.html" class="nav-link"> Vacancy</a>
                </li>
                <li class="nav-item nav-item-qm d-flex align-items-center" role="presentation">
                  <i class="fa fa-chevron-right" aria-hidden="true"></i>
                  <a title="link" href="../pages/thesis-submit-rav-student.html" class="nav-link"> Thesis Submitted by RAV Studnts</a>
                </li>
                <li class="nav-item nav-item-qm d-flex align-items-center" role="presentation">
                  <i class="fa fa-chevron-right" aria-hidden="true"></i>
                  <a title="link" href="../pages/right-information.html" class="nav-link"> Right to Information Act(RTI)</a>
                </li>
                <li class="nav-item nav-item-qm d-flex align-items-center" role="presentation">
                  <i class="fa fa-chevron-right" aria-hidden="true"></i>
                  <a title="link" href="../pages/admission-courses.html" class="nav-link"> Admission to courses</a>
                </li>
                <li class="nav-item nav-item-qm d-flex align-items-center" role="presentation">
                  <i class="fa fa-chevron-right" aria-hidden="true"></i>
                  <a title="link" href="../pages/publication-of-vidyapeeth.html" class="nav-link"> Publication of vidyapeeth</a>
                </li>


              </ul>
            </div>
            <div class="col-md-8 col-lg-8 ">
              <div class="about">
                <h1>
                  Our Objective
                </h1>

                <table title="Our Objective">
                  <tbody>
                    <tr>
                      <th>S.No</th>
                      <th>Title</th>
                    </tr>
                    <tr>
                      <td>1.</td>
                      <td>To promote the knowledge of Ayurveda.</td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>To formulate schemes for continuing education and conducting examinations for the purpose in
                        various disciplines of Ayurveda.</td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>To institute due recognition to successful candidates.</td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>To recognize and encourage merit in various branches of Ayurveda.</td>
                    </tr>
                    <tr>
                      <td>5.</td>
                      <td>To undertake academic work in Ayurveda of National &amp; International importance.</td>
                    </tr>
                    <tr>
                      <td>6.</td>
                      <td>To organize workshops and seminars in various branches of Ayurveda.</td>
                    </tr>
                    <tr>
                      <td>7.</td>
                      <td>To maintain liaison with professional associations, Societies, Colleges and Universities for
                        raising standards of Ayurvedic Education.</td>
                    </tr>
                    <tr>
                      <td>8.</td>
                      <td>To secure and manage funds and endowments for the promotion of Ayurveda and implementation of
                        continuing education in Ayurveda.</td>
                    </tr>
                    <tr>
                      <td>9.</td>
                      <td>To conduct experiments of new methods of Ayurvedic education in order to arrive at
                        satisfactory standards of education.</td>
                    </tr>
                    <tr>
                      <td>10.</td>
                      <td>To institute professorships, other faculty position fellowships, research cadre positions and
                        scholarships etc. for realizing the objectives of the Vidyapeeth.&nbsp;</td>
                    </tr>
                  </tbody>
                </table>

                <h2>VISION OF THE RAV
                </h2>
                <p class="desc">
                  Vision, mission long term design: be a global Centre of excellence for exploration and dissemination of the knowledge of traditional as well as emerging Ayurvedic clinical practices for safe and effective treatment in lifestyle and chronic diseases
                </p>
                <h2>MISSION OF THE RAV</h2>
                <p class="desc">
                  To established RAV as a formally recognized Institute for carrying out the training and research in traditional and emerging Ayurvedic clinical practice.
                </p>

              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection