$(document).ready(function(){
    let table = $('table');
  
   
    let tableWidth = table.width(); // Use width() instead of innerWidth()
    let tableParentWidth = table.parent().width(); // Use width() instead of innerWidth()
    
    if(tableWidth > tableParentWidth){
        table.css('display', 'block');
    } else {
        table.css('display', 'table');
    }

    // sociol icon offset
    window.onscroll = function() {
        let sociolIcon = $('.sticky-i');
        let offsetTop = window.pageYOffset;
        console.log(offsetTop);
        if (offsetTop > 250) {
            sociolIcon.css('display', 'block');
        } else {
            sociolIcon.css('display', 'none');
        }
    };
    
    // myFunction()
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