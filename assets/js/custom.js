$(document).ready(function() {

  $('.dataTable').DataTable({
    dom: 'lBfrtip', // Add 'l' to include length menu before the buttons
    buttons: [ 'print' ],
    lengthMenu: [[5,10,25, 50, 75, -1], [5,10,25, 50, 75, "All"]],
   
});
$('#cmeScheme').DataTable({
      dom: 'lBfrtip', // Add 'l' to include length menu before the buttons
      // "pagingType": "full_numbers",
      buttons: [ 'print' ],
      lengthMenu: [[5,10,25, 50, 75, -1], [5,10,25, 50, 75, "All"]],
      
    });
    // $.fn.DataTable.ext.pager.numbers_length = 4;

  window.onload( function(){
    $('#cmeScheme')
  } );
  
  $('[title]').each(function(){
    var title = $(this).attr('title');
    var capitalizedTitle = title.charAt(0).toUpperCase() + title.slice(1);
    $(this).attr('title', capitalizedTitle);
});

});
$(document).ready(function () {
  function printCurrentDateTime() {
    var currentDate = new Date();
    const months = [
      "january", "february", "march", "april",
      "may", "june", "july", "august",
      "september", "october", "november", "december"
    ];
    

    var year = currentDate.getFullYear();
    var month = months[currentDate.getMonth()]; 
    var day = currentDate.getDate();
    var hours = currentDate.getHours();
    var minutes = currentDate.getMinutes();
    var seconds = currentDate.getSeconds();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    var formattedDateTime = `0${day} ${month} ${year} ${hours}:${minutes}:${seconds} ${ampm}`;
    let date = $('.dateTime');
    date.html(formattedDateTime);
  }
  printCurrentDateTime();
  setInterval(printCurrentDateTime, 1000);

  function printCurrentDate() {
    var currentDate = new Date();
    var year = currentDate.getFullYear();
    var month = currentDate.getMonth() + 1;
    var day = currentDate.getDate();
    var formattedDateTime = `0${day}-0${month}-${year}`;
    let date = $('.date');
    date.html(formattedDateTime);
  }

  printCurrentDate();
});


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
  loop: false,
  nav: true,
  dots: false,
  autoplay: true,
  margin: 30,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 2,
    },
    1000: {
      items: 2,
    }
  }
});

$('#photoGallerySlider').owlCarousel({
  loop: true,
  nav: false,
  dots: false,
  autoplay: false,
  margin: 10,
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
$('#videoGallerySlider').owlCarousel({
  loop: false,
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
  nav: true,
  dots: false,
  autoplay: true,
  navText: ["<i class='fa fa-angle-left' aria-hidden='true'></i>","<i class='fa fa-angle-right' aria-hidden='true'></i>"],
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
      nav: true,
      dots: false,
      navText: ["<i class='fa fa-angle-left' aria-hidden='true'></i>","<i class='fa fa-angle-right' aria-hidden='true'></i>"]

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
play2.addEventListener("click", function () {
  play2.style.display = "none";
  pause2.style.display = "block"
});

// enable dark mode and light mode


// Function to retrieve theme from cookies on page load
function getThemeFromCookies() {
  const cookies = document.cookie.split(';').map(cookie => cookie.trim());
  for (const cookie of cookies) {
    const [name, value] = cookie.split('=');
    if (name === 'theme') {
      return value; // Return the value of 'theme' cookie
    }
  }
  return null; // Return null if 'theme' cookie is not found
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
    $("p, h1, h2, h3, h4, h5, h6,.dropdown, button,.about-t,h2.title,.desc-text-title,.desc, .copyright-text, select").attr('tabindex' , '0');

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


var owl_3 = $("#photoGallerySlider");
$("#customNextBtn3").click(function () {
    owl_3.trigger("next.owl.carousel");
}),
    $("#customPreviousBtn3").click(function () {
        owl_3.trigger("prev.owl.carousel");
    }),
    $("#customPause3").click(function () {
        owl_3.trigger("stop.owl.autoplay");
    }),
    $("#customPlay3").click(function () {
        owl_3.trigger("play.owl.autoplay");
    });
owl_3 = $("#photoGallerySlider");
$("#customNextBtn3").click(function () {
    owl_3.trigger("next.owl.carousel");
}),
    $("#customPreviousBtn3").click(function () {
        owl_3.trigger("prev.owl.carousel");
    }),
    $("#customPause3").click(function () {
        owl_3.trigger("stop.owl.autoplay");
    }),
    $("#customPlay3").click(function () {
        owl_3.trigger("play.owl.autoplay");
    });
var pause3 = document.querySelector("#customPause3"),
    play3 = document.querySelector("#customPlay3");
pause3.addEventListener("click", function () {
    (play3.style.display = "block"), (pause3.style.display = "none");
}),
    play3.addEventListener("click", function () {
        (play3.style.display = "none"), (pause3.style.display = "block");
    });
var owl_4 = $("#videoGallerySlider");
$("#customNextBtn4").click(function () {
    owl_4.trigger("next.owl.carousel");
}),
    $("#customPreviousBtn4").click(function () {
        owl_4.trigger("prev.owl.carousel");
    }),
    $("#customPause4").click(function () {
        owl_4.trigger("stop.owl.autoplay");
    });


var owl_5 = $("#clientSlider");
$("#customNextBtn5").click(function () {
    owl_5.trigger("next.owl.carousel");
}),
    $("#customPreviousBtn5").click(function () {
        owl_5.trigger("prev.owl.carousel");
    }),
    $("#customPause5").click(function () {
        owl_5.trigger("stop.owl.autoplay");
    });

var pause5 = document.querySelector("#customPause5"),
    play5 = document.querySelector("#customPlay5");
pause5.addEventListener("click", function () {
    (play5.style.display = "block"), (pause5.style.display = "none");
}),
play5.addEventListener("click", function () {
  (play5.style.display = "none"), (pause5.style.display = "block");
})


$("#customPreviousBtn5").click(function () {
  owl_5.trigger("prev.owl.carousel");
}),
$("#customPause5").click(function () {
  owl_5.trigger("stop.owl.autoplay");
});