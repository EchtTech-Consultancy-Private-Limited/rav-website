$('#heroSlider').owlCarousel({
  loop: true,
  nav: true,
  dots: true,
  items: 1,
  margin: 0,
  autoplay: false
});

$('#latest-news-slider').owlCarousel({
  loop: true,
  nav: true,
  dots: false,
  items: 1,
  margin: 0,
  autoplay: true,
  autoplayTimeout: 3000
});

$('#heroSlider-hindi').owlCarousel({
  loop: true,
  nav: true,
  dots: true,
  items: 1,
  margin: 0,
  autoplay: false
});

$('#latest-news-slider-hindi').owlCarousel({
  loop: true,
  nav: true,
  dots: false,
  items: 1,
  margin: 0,
  autoplay: true,
  autoplayTimeout: 3000
});
$('#activitySlider-hindi').owlCarousel({
  loop: true,
  nav: true,
  dots: false,
  autoplay: false,
  margin: 30,
  responsive: {
    0: {
      items: 1,
      nav: false,
    },
    600: {
      items: 2,
      nav: false,
    },
    1000: {
      items: 2
    }
  }
});
$('#clientSlider-hindi').owlCarousel({
  loop: true,
  nav: false,
  dots: false,
  autoplay: true,
  margin: 15,
  responsive: {
    0: {
      items: 2,
      nav: false,
      dots: false,
    },
    600: {
      items: 2,
      nav: false,
      dots: false,
    },
    1000: {
      items: 6,
      nav: false,
      dots: false,

    }
  }
});



$('#activitySlider').owlCarousel({
  loop: true,
  nav: true,
  dots: false,
  autoplay: false,
  margin: 30,
  responsive: {
    0: {
      items: 1,
      nav: false,
    },
    600: {
      items: 2,
      nav: false,
    },
    1000: {
      items: 2
    }
  }
});

$('#cravSlider').owlCarousel({
  loop: true,
  nav: true,
  dots: false,
  autoplay: false,
  margin: 30,
  responsive: {
    0: {
      items: 1,
      nav: false,
    },
    600: {
      items: 2,
      nav: false,
    },
    1000: {
      items: 2
    }
  }
});

$('#clientSlider').owlCarousel({
  loop: true,
  nav: false,
  dots: false,
  autoplay: true,
  margin: 15,
  responsive: {
    0: {
      items: 2,
      nav: false,
      dots: false,
    },
    600: {
      items: 2,
      nav: false,
      dots: false,
    },
    1000: {
      items: 6,
      nav: false,
      dots: false,

    }
  }
});

$('#eventSlider').owlCarousel({
  loop: true,
  nav: true,
  dots: false,
  items: 1,
  navText:["<i class='fa fa-angle-left' aria-hidden='true'></i>","<i class='fa fa-angle-right' aria-hidden='true'></i>"],
});

$('#eventSlider-hindi').owlCarousel({
  loop: true,
  nav: true,
  dots: false,
  items: 1,
});

$('#master-slider1').owlCarousel({
  loop: true,
  nav: false,
  dots: false,
  autoplay: true,
  margin: 15,
  responsive: {
    0: {
      items: 4,
      nav: false,
      dots: false,
    },
    600: {
      items: 2,
      nav: false,
      dots: false,
    },
    1000: {
      items: 6,
      nav: false,
      dots: false,

    }
  }
});
$('#master-slider1-hindi').owlCarousel({
  loop: true,
  nav: false,
  dots: false,
  autoplay: true,
  margin: 15,
  responsive: {
    0: {
      items: 4,
      nav: false,
      dots: false,
    },
    600: {
      items: 2,
      nav: false,
      dots: false,
    },
    1000: {
      items: 6,
      nav: false,
      dots: false,

    }
  }
});


// magnific pop up
$(document).ready(function () {
  $(".gallery .images__link").magnificPopup({
    type: "image",
    gallery: {
      enabled: true,
      tCounter: "%curr% of %total%"
    },
    removalDelay: 300,
    mainClass: "mfp-fade"
  });

  // Modify checked preview
  $(".gallery .preview__link").on("click", function () {
    $(".gallery .preview__link").removeClass("checked");
    $(this).addClass("checked");
  });

})




// play pause button in hero slider


var owl_1 = $('#heroSlider');
$('#customNextBtn').click(function () {
  owl_1.trigger('next.owl.carousel', 2000);
});
$('#customPreviousBtn').click(function () {
  owl_1.trigger('prev.owl.carousel', 2000);
});
$('#customPause').click(function () {
  owl_1.trigger('stop.owl.autoplay', 2000);
});
$('#customPlay').click(function () {
  owl_1.trigger('play.owl.autoplay', 2000);
});



var pause1 = document.querySelector("#customPause");
var play1 = document.querySelector("#customPlay");
console.log(play1)
pause1.addEventListener("click", function () {
  play1.style.display = "block";
  pause1.style.display = "none"
  console.log("hello world")
});
//console.log("hellow world")
play1.addEventListener("click", function () {
  play1.style.display = "none";
  pause1.style.display = "block"
});



// latest slider slider

var owl_2 = $('#latest-news-slider');
$('#customNextBtn1').click(function () {
  owl_2.trigger('next.owl.carousel', 2000);
});
$('#customPreviousBtn1').click(function () {
  owl_2.trigger('prev.owl.carousel', 2000);
});
$('#customPause1').click(function () {
  owl_2.trigger('stop.owl.autoplay', 2000);
});
$('#customPlay1').click(function () {
  owl_2.trigger('play.owl.autoplay', 2000);
});



var pause2 = document.querySelector("#customPause1");
var play2 = document.querySelector("#customPlay1");
console.log(play2)
pause2.addEventListener("click", function () {
  play2.style.display = "block";
  pause2.style.display = "none"
  console.log("hello world")
});
console.log("hellow world")
play2.addEventListener("click", function () {
  play2.style.display = "none";
  pause2.style.display = "block"
});





// enable dark mode and light mode
function setTheme() {
  // var baseURL = $("meta[name='basepath']").attr('content');

  if (document.getElementById('mode').checked) {
    const linkElement = document.getElementById('theme-style');
    linkElement.href = './assets/css/dark-mode.css';
    // {{asset('assets/css/dark-mode.css')}}
    // Store the theme preference in local storage
    // localStorage.setItem('assets/css/dark-mode', theme);

    // Set the initial theme based on local storage or default to 'light'
    //   const initialTheme = localStorage.getItem('theme') || 'light';
    //   setTheme(initialTheme);

  }

  else {
    const linkElement = document.getElementById('theme-style');
    linkElement.href = `${'assets/css/style'}.css`;

    // Store the theme preference in local storage
    // localStorage.setItem('assets/css/style', theme);
  }

}

// enable dark mode and light mode for inner pages
function setinTheme() {

  if (document.getElementById('in-mode').checked) {
    const linkElement = document.getElementById('theme-style');
    linkElement.href = '../assets/css/dark-mode.css';
  }

  else {
    const linkElement = document.getElementById('theme-style');
    linkElement.href = `${'assets/css/style'}.css`;

    // Store the theme preference in local storage
    // localStorage.setItem('assets/css/style', theme);
  }

}



// ===================================================================================

// Font-Increment

function increaseFontSize() {
  const elements = document.querySelectorAll('p, h1, h2, h3, h4, h5, h6, a, li, button,.about-t,h2.title,.desc-text-title, .copyright-text, .title-white');

  elements.forEach((element) => {
    // Get the current font size and convert it to a number
    let currentFontSize = parseFloat(window.getComputedStyle(element).fontSize);

    // Check if the current font size is less than the maximum size (25px)
    if (currentFontSize < 17) {
      // Increase the font size by 1px
      currentFontSize += 1;
      // Set the new font size
      element.style.fontSize = currentFontSize + 'px';
    }
  });
}


function normaltext() {
  const elements = document.querySelectorAll('p, h1, h2, h3, h4, h5, h6, a, li,.desc, button,.about-t,h2.title,.desc-text-title, .copyright-text,.title-white');

  elements.forEach((element) => {
    // Check if the current font size is less than the maximum size (25px)
    element.style.fontSize = '';
  });
}


function decreaseFontSize() {
  const elements = document.querySelectorAll('p, h1, h2, h3, h4, h5, h6, a, li,.desc, button,.about-t,h2.title,.desc-text-title, .copyright-text');

  elements.forEach((element) => {
    // Get the current font size and convert it to a number
    let currentFontSize = parseFloat(window.getComputedStyle(element).fontSize);

    // Check if the current font size is less than the maximum size (25px)
    if (currentFontSize > 12) {
      // Increase the font size by 1px
      currentFontSize -= 2;
      // Set the new font size
      element.style.fontSize = currentFontSize + 'px';
    }
  });
}


//  Jquery Residing on Html Pages
$('#playButton').click(function () {
  $('#carouselExampleControls').carousel('cycle');
  console.log("play");
});
$('#pauseButton').click(function () {
  $('#carouselExampleControls').carousel('pause');
  console.log("pause");
});

// For Showing sidebar menu in mobile
$('.fa-bars-m').click(function () {
  $('#navbarContent').hide();
});

$('.rotate-icon').click(function () {
  $('#navbarContent').show();
});

AOS.init({
  disable: 'mobile'
});


function handleChange(e) {
  var val = $slt.val();

  // do nothing for defaultValue being selected
  if (val === defaultValue) {
    return;
  }
}


// LightBox Image Gallery Code
function openGallery(id) {
  closeAll();
  const gallery = document.getElementById('gallery-' + id);
  const card = document.getElementById('card-' + id);
  gallery.classList.add('Gallery--active');
  card.classList.add('Card--active');
}
function closeAll() {
  const galleryActv = document.querySelector('.Gallery--active');
  const cardActv = document.querySelector('.Card--active');
  if (galleryActv) {
    galleryActv.classList.remove('Gallery--active');
  }
  if (cardActv) {
    cardActv.classList.remove('Card--active');
  }
}

// var lightbox = GLightbox({

//   loop: true
// });



//language change
function setlang(value) {
  //alert(value)
  $.ajax({
    url: "set-language",
    data: { data: value },
    success: function (result) {
      location.reload();
    }
  });
}

// Tabindex js

$(document).ready(function(){
    $("p, h1, h2, h3, h4, h5, h6,.dropdown, button,.about-t,h2.title,.desc-text-title,.desc, .copyright-text").attr('tabindex' , '0');

    // $('.dropdown').on('focus',()=>{
    //     $('.dropdown').addClass('show-dropdown');
    //     $('.dropdown.show-dropdown > .dropdown-menu').css({'display':'block'})
    // });

//    $("li.nav-item").on('focus',()=>{
//     $('li.nav-item').removeClass('show-dropdown');
//     $(this).addClass('show-dropdown');

// });

let navItemList = $('.nav-item');

// Using jQuery.each()
$.each(navItemList, function(index, element) {
  $(element).on('focus', () => {
    $('.nav-item').not(element).removeClass('show-dropdown');;
    if ($(element).hasClass('nav-item') && $(element).hasClass('dropdown')) {
      $(element).addClass('show-dropdown');
      console.log('added class');
    }
  });
});







});
