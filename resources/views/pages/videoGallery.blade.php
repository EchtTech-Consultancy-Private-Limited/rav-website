@extends('layout.master')
@section('title')
{{ __('RAV') }}
@endsection
@section('content')

<section class="breadcrumb">
    {{-- banner start --}}
    @if (isset($organizedData['banner']) && $organizedData['banner'] != '')
    <div class="breadcrumb-img">
        <img src="{{ asset('resources/uploads/pagebanner/' . $organizedData['banner']->public_url) ?? '' }}"
            alt="{{ $organizedData['banner']->image_title ?? '' }}"
            title="{{ $organizedData['banner']->image_title ?? '' }}" />
    </div>
    @else
    <div class="breadcrumb-img">
        <img src="{{ asset('assets/images/bredcrumb.jpg') ?? '' }}" alt="" />
    </div>
    @endif
    {{-- banner end --}}
    <div class="breadcrumb-title">
        <h3 class="title">{{ $organizedData['metatag']->meta_title ?? '' }}</h3>
    </div>
    </div>
</section>
<div class="main-body">
    <div class="container breadcrumbs-link">
        <div class="breadcrumbs-link-text">
            <ul>
                <li>
                    <a class="active" href="" tabindex="0">
                        @if (Session::get('locale') == 'hi')
                        होम पेज
                        @else
                        Home
                        @endif
                    </a>
                </li>
                @if (isset($finalBred))
                <li><a>{{ ucfirst(strtolower($finalBred)) ?? '' }}</a></li>
                @endif
                @if (isset($lastBred))
                <li><a>{{ ucfirst(strtolower($lastBred)) ?? '' }}</a></li>
                @endif
                @if (isset($middelBred))
                <li><a>{{ ucfirst(strtolower($middelBred)) ?? '' }}</a></li>
                @endif
                <li>{{ $organizedData['metatag']->meta_title ?? '' }}</li>
            </ul>
        </div>
    </div>
    <section class="master bg-grey">
        <div class="container">
            <div class="news-tab common-tab side-tab1">
                <div class="row">

                    <div class="col-md-12 col-lg-12 ">
                        <div class="about">
                            <h1>
                                Video Gallery
                            </h1>

                            <div class="rs-blog main-home col-md-12">
                                <div class="container1 row">
                                    <div class="col-md-6 position-relative">
                                        <div class="mySlides" >
                                        <iframe width="100%" height="400" src="https://www.youtube.com/embed/kD67TY5m164?si=HydEEPYvinl2MGpM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                        </div>
                                      
                                        <div class="mySlides" >
                                        <iframe width="100%" height="400" src="https://www.youtube.com/embed/hUdu4xtHQa0?si=gecox5jv981uUfTY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                             
                                        </div>
                                        
                                        <div class="mySlides" >
                                        <iframe width="100%" height="400" src="https://www.youtube.com/embed/PenWqIMK9Bw?si=XWywagNv9kWuhZP3" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                        </div>
                                       
                                        
                                        <div class="mySlides" >
                                        <iframe width="100%" height="400" src="https://www.youtube.com/embed/ZaWAK6jFPms?si=7vmGDTqndXrKizpy" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                        </div>
                                       
                                        
                                      
                                        <a class="prev" onclick="plusSlides(-1)" tabindex="0">❮</a>
                                        <a class="next" onclick="plusSlides(1)" tabindex="0">❯</a>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-box-g">
                                            <div class="row ps-0">

                                                <div class="col-md-3 mb-2">
                                                    <img class="demo cursor fancybox-close active"
                                                        src="https://i.ytimg.com/vi/w56E4soUvsk/maxresdefault.jpg"
                                                        style="width:100%" onclick="currentSlide(1)" alt="">
                                                </div>

                                                <div class="col-md-3 mb-2">
                                                    <img class="demo cursor fancybox-close"
                                                        src="https://i.ytimg.com/vi/zDpwAV0fgx8/maxresdefault.jpg"
                                                        style="width:100%" onclick="currentSlide(2)" alt="">
                                                </div>

                                                <div class="col-md-3 mb-2">
                                                    <img class="demo cursor fancybox-close"
                                                        src="https://i.ytimg.com/vi/Dxr8yM4_WqE/maxresdefault.jpg"
                                                        style="width:100%" onclick="currentSlide(3)" alt="">
                                                </div>

                                                <div class="col-md-3 mb-2">
                                                    <img class="demo cursor fancybox-close"
                                                        src="https://i.ytimg.com/vi/35D6WiiIDfk/maxresdefault.jpg"
                                                        style="width:100%" onclick="currentSlide(4)" alt="">
                                                </div>

                                                <div class="col-md-3 mb-2">
                                                    <img class="demo cursor fancybox-close"
                                                        src="https://i.ytimg.com/vi/fIFck_O_91o/maxresdefault.jpg"
                                                        style="width:100%" onclick="currentSlide(5)" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("demo");
  let captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
@endsection