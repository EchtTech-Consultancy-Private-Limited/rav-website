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
   <div class="sticky-i d-non">
      <div class="sticky-icon">
         <a href="https://www.facebook.com/vidyapeeth.delhi"
            onclick="return confirm('This link will take you to an external web site.')" target="_blank" class="Facebook" title="Facebook"><i class="fa fa-facebook-f"> </i> Facebook </a>
         <a href="" class="Twitter"
            onclick="return confirm('This link will take you to an external web site.')" target="_blank" title="Twitter"><i class="fa fa-twitter" title="Twitter"> </i> Twitter </a>
         <a href=""
            onclick="return confirm('This link will take you to an external web site.')" class="Instagram" target="_blank" title="Instagram"><i class="fa fa-instagram"></i> Instagram </a>
         <a href="" class="Youtube"
            onclick="return confirm('This link will take you to an external web site.')" target="_blank" title="Linkedin"><i class="fa fa-linkedin"> </i> Linkedin </a>
      </div>
   </div>
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
