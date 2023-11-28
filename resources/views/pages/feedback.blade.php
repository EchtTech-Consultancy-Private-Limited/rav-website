@extends('layout.master')
@section('title')
    {{ __('Contact Us') }}
@endsection
@section('content')
<section class="breadcrumb">
    <div class="page-breadcrumb">
      <div class="breadcrumb-img">
        <img src="{{asset('assets/images/bredcrumb.jpg') }}" alt="" />
      </div>
      <div class="breadcrumb-title">
        <h3 class="title">Feedback</h3>
      </div>
    </div>
  </section>
  <div class="main-body">
    <div class="container breadcrumbs-link">
      <div class="breadcrumbs-link-text">
        <ul>
          <li>
            <a class="active" title ="link" href="" tabindex="0"> Home </a>
          </li>
          <li>Feedback</li>
        </ul>
      </div>
    </div>
    <section class="master bg-grey">
        <div class="container">
            <div class="news-tab common-tab side-tab1">
                <div class="row">
                  <div class="col-lg-3 col-md-3">
                    <ul class="nav nav-tabs" id="newsTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a title ="link" href="#" class="nav-link" >Contact Us</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a title ="link" href="#" class="nav-link active">Feedback</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a title ="link" href="#" class="nav-link "> Terms and Conditions</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a title ="link" href="#" class="nav-link"> Site Map</a>
                        </li>


                    </ul>
                  </div>
                  <div class="col ">
                    <div class="about" id="about">

                          <div class="contact-form">
                            <h1>
                                Feedback
                              </h1>
                            <div class="map">
                              <form action="">
                                <div class="row">
                                  <div class="col-lg-6 col-md-6">
                                    <div class="master-input">
                                      <input type="text" placeholder="First Name">
                                    </div>
                                    <span class="error"></span>
                                  </div>
                                  <div class="col-lg-6 col-md-6">
                                    <div class="master-input">
                                      <input type="text" placeholder="Email">
                                    </div>
                                    <span class="error"></span>
                                  </div>
                                  <div class="col-lg-6 col-md-6">
                                    <div class="master-input">
                                      <input type="text" placeholder="Phone No ">
                                    </div>
                                    <span class="error"></span>
                                  </div>
                                  <div class="col-lg-6 col-md-6">
                                    <div class="master-input">
                                     <select name="feedback-topic" id="feedback-topic">
                                        <option value="--Select--">Content Issues</option>
                                        <option value="--Select--">Design Issues</option>
                                        <option value="--Select--">Server Issues</option>

                                     </select>
                                    </div>
                                    <span class="error"></span>
                                  </div>
                                  <div class="col-lg-12 col-md-12">
                                    <div class="master-input">
                                      <input type="text" placeholder="Address">
                                    </div>
                                    <span class="error"></span>
                                  </div>

                                  <div class="col-lg-12 col-md-12">
                                    <div class="master-input">
                                      <textarea name="message" id="message" cols="30" rows="6" placeholder="Type your message...."></textarea>
                                    </div>
                                    <span class="error"></span>
                                  </div>

                                  <div class="col-lg-6 col-md-6">
                                    <div class="row">
                                      <div class="col-lg-8 mobile-width-80">
                                        <div class="master-input">
                                          <img src="./assets/images/captcha.png" alt="captcha" title="captcha">
                                        </div>
                                      </div>
                                      <div class="col">
                                        <div class="master-input">

                                          <a><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                        </div>
                                      </div>
                                    </div>


                                  </div>

                                  <div class="col-lg-6 col-md-6">
                                    <div class="master-input">
                                      <input type="text" placeholder="Enter Captcha">
                                    </div>
                                    <span class="error"></span>
                                  </div>
                                  <button class="button mx-auto mt-3">Submit</button>
                        </div>

                              </form>
                            </div>
                          </div>

                    </div>

                  </div>
                </div>
              </div>
        </div>
    </section>
@endsection