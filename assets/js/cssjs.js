$(document).ready(function(){
    let atab = $('.about h1');
    atab.each( function() {
        let atabContent = $(this).text().trim();
        console.log(atabContent)
     let checkAtabContent = `Ayurveda Training Accreditation Board (ATAB)`
        if(atabContent == checkAtabContent){
          $(this).addClass('width-80');
        }
    });
    // let tables = $('table');
  
    // console.log(tables);
    // tables.each(function() {
    //     let tableWidth = $(this).width(); // Use outerWidth() instead of width()
    //     let tableParentWidth = $(this).parent().width(); // Use width() instead of innerWidth()
    //     console.log(tableWidth, tableParentWidth, "table width");
    //     if(tableWidth >= tableParentWidth){
    //         $(this).css('display', 'block');
    //     } else {
    //         $(this).css('display', 'table');
    //         $(this).css('width', '100%');
    //     }
    // }); // Iterate over each <table>

    let tables = $('table');

tables.each(function() {

    let tableWidth = $(this).width(); // Use outerWidth() instead of width()
    let tableParentWidth = $(this).parent().width(); // Use width() instead of innerWidth()

    if (tableWidth >= tableParentWidth) {
        $(this).css('display', 'block');
    } else {
        $(this).css('display', 'table');
        $(this).css('width', '100%');
    }
});




    // sociol icon offset
    // window.onscroll = function() {
    //     let sociolIcon = $('.sticky-i');
    //     let offsetTop = window.pageYOffset;
    //     // console.log(offsetTop);
    //     if (offsetTop > 250) {
    //         sociolIcon.css('display', 'block');
    //     } else {
    //         sociolIcon.css('display', 'none');
    //     }
    // };
    
    // myFunction()

    $("#activitySlider .owl-nav").removeAttr('disabled');

   
});

// sitcky header




let img = $('img')
img.each(function(){
    let titleContent = $(this)
    let title = titleContent.attr('title')
    if(title!==undefined){
        let word = title.split(' ');
        let capitalizeWord = word.map(function(item){
            return item.charAt(0).toUpperCase() + item.slice(1)
        })
        let capitalizedTitle = capitalizeWord.join(' ');
        titleContent.attr('title', capitalizedTitle);
    }
    // let word = title.split(' ');
    // console.log(word)
})

let accessbility = $(".header-top-content .header-top-right .acees-style1 button.dropdown-toggle");
accessbility.on('focus', function(){
    accessbility.click();
})

$(document).ready(function(){
    $("select#language-eng").on("focus", function(){
        $(this).click();
        console.log("select clicked");
    });

    var selectBox = $("#language-eng");

    // Attach a focus event handler to the <select> element
    selectBox.on("focus", function() {
        // Trigger a click event when the <select> element receives focus
        $(this).open();
        // alert("clicked")
    });


 
    let offcanvasli = $("#offcanvasli");
    let offcanvasRight = $('#offcanvasRight');
    
    $("[data-bs-target='#offcanvasRight']").one('focus', function () {
        $("[data-bs-target='#offcanvasRight']").click();
    });
    
    
    $("#offcanvasli").on('focus', function () {
        // Delay removing focus from [data-bs-target='#offcanvasRight'] to ensure focus is not immediately reassigne
            $("[data-bs-target='#offcanvasRight']").blur();
        $('.rotate-icon').click();
     

    });
    
  
    
let th = $('th');
th.each((a, item) => {
    let dateArr = $(item).text().toLowerCase().split(' ');
    let containsDate = dateArr.includes('date');
    if (containsDate) {
        let index = $(item).index() + 1; // Index of corresponding td in the same row
        $(`td:nth-child(${index})`).css('white-space', 'nowrap');
    }
});
});

let secondlayerSidebar = $('li.accordion.accordion-flush.position-relative.sl-accordion');
let activeAccordion = $('.accordion-collapse.collapse');

secondlayerSidebar.each(function(){
    let item = $(this);
  let activeChildAccordion = item.children().children()
    item.click(function(){
        if (item.hasClass("qm-active")) {
            activeChildAccordion.each(function(){
                console.log($(this))
                item.removeClass('qm-active');
                if($(this).hasClass('.show')){
                    alert("working fine")
                }
            }, 1000)
        } 
    })
})


let ayushAhar = $('.poshakAhaar .card p');
ayushAhar.each(function(){
    let item = $(this);
    let text = item.text().toLowerCase();

    item.text(text)
})

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
let lang = $('.language').val();
if(lang == 'hi'){
    $('.sticky-icon a').css('width', "155px")
}else{
    $('.sticky-icon a').css('width', "160px")
}
