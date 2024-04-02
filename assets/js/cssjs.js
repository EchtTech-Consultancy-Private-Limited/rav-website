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
    if ($(this).hasClass('dataTable')) {
        return; 
    }

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
    window.onscroll = function() {
        let sociolIcon = $('.sticky-i');
        let offsetTop = window.pageYOffset;
        // console.log(offsetTop);
        if (offsetTop > 250) {
            sociolIcon.css('display', 'block');
        } else {
            sociolIcon.css('display', 'none');
        }
    };
    
    // myFunction()

    $("#activitySlider .owl-nav").removeAttr('disabled');

   
});

// sitcky header



// var header = document.getElementById("myHeader");
// console.log(header);
//   let   sticky = header.offsetTop;
//     console.log(sticky)
//     function myFunction() {
//     console.log(window.pageYOffset, 'pageYOffset')
//     window.pageYOffset > sticky
//         ? header.classList.add("sticky")
//         : header.classList.remove("sticky");
//         alert("workin fine");
// }

