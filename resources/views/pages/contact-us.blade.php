@extends('layout.master')
@section('title')
    {{ __('Contact Us') }}
@endsection
@section('content')
<section class="breadcrumb">
    <div class="page-breadcrumb">
      <div class="breadcrumb-img">
        <img src="./assets/images/bredcrumb.jpg" alt="" />
      </div>
      <div class="breadcrumb-title">
        <h3 class="title">Contact us</h3>
      </div>
    </div>
</section>
  <div class="main-body">
    <div class="container breadcrumbs-link">
      <div class="breadcrumbs-link-text">
        <ul>
          <li>
            <a class="active" href="{{ url('/') }}" tabindex="0"> Home </a>
          </li>
          <li>Contact us</li>
        </ul>
      </div>
    </div>
<section class="bg-grey" id="about">
  <div class="container ">
    <div class="main-title">
      <h2 class="heading-black heading-black-lg text-center pb-5">
        Rashtriya Ayurveda Vidyapeeth
      </h2>

    </div>
    <div class="contact">
      <div class="row">


        <div class="col-lg-4 col-md-6">

          <div class="contact-item">
            <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
            <div class="title">
              <h3 class="title">Address</h3>
              <p>RASHTRIYA AYURVEDA VIDYAPEETH

                (National Academy of Ayurveda)

                Dhanvantari Bhavan, Road No.66,

                Punjabi Bagh (West),

                NEW DELHI – 110 026.</p>
            </div>
          </div>

          <div class="contact-item">
            <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
            <div class="title">
              <h3 class="title">Call</h3>
              <p>Phone: 011-25229753; 25228548;</p>
              <p> Fax: 011-25229753</p>

            </div>
          </div>

          <div class="contact-item">
            <div class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
            <div class="title">
              <h3 class="title">Email</h3>
              <p>E-mail: ravidyapeethdelhi[at]gmail[dot]com</p>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-md-6">
          <div class="contact-map">
            <div class="map">
              <p>
                <iframe allowfullscreen="" height="385" loading="lazy" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d112061.96314109965!2d77.10116513484795!3d28.631669744951427!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d03986aaaaaab%3A0xe1fbe446251ca22!2sRashtriya%20Ayurveda%20Vidyapeeth!5e0!3m2!1sen!2sin!4v1636964983584!5m2!1sen!2sin" style="border:0;" width="100%"></iframe>
              </p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
@endsection