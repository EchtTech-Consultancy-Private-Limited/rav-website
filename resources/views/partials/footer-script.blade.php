
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.marquee.js')}}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/aos.js') }}"></script>
<script src="{{ asset('assets/js/darkMode.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/js/sidebar.js') }}"></script>
<script src="{{ asset('assets/js/cssjs.js') }}"></script>


<script src="{{ asset('assets/js/photo-gallery.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script type="text/javascript" charset="utf8" src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" charset="utf8" src="{{ asset('assets/js/dataTables.buttons.min.js') }}"></script>
<script type="text/javascript" charset="utf8" src="{{ asset('assets/js/buttons.print.min.js') }}"></script>


<script>
  $("#search_key").on("keyup", function() {
    $("#searchValidationErrorLabel").hide();

  });

    const counters = document.querySelectorAll('.counterNumber');
    const speed = 200;

    counters.forEach( counter => {
       const animate = () => {
          const value = +counter.getAttribute('counter');
          const data = +counter.innerText;

          const time = value / speed;
         if(data < value) {
              counter.innerText = Math.ceil(data + time);
              setTimeout(animate, 1);
            }else{
              counter.innerText = value;
            }
       }

       animate();
    });

  $(document).ready(function(){
    $(".latest_news_marquee").marquee({
    speed: 5e3,
    gap: 5,
    delayBeforeStart: 0,
    direction: "left",
    duplicated: !0,
    pauseOnHover: !0,
  } );
})
</script>

