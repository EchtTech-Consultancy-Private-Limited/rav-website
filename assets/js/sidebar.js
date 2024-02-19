

// sidebar js

$(document).ready(() => {
    $('.sl-accordion').click(() => {
    })
    $('#sidebarDropdown2').click(() => {
        console.log('hellow world')
        $('#sidebarDropdown2').css({
            'background-color': '#000'
        })
    })
  
  
  
  
    $(document).ready(function () {
      // let sl_accordion = $('.sl-accordion');
      // sl_accordion.click(function() {
      //    sl_accordion.removeClass('menu-accordion-click');
      //     $(this).addClass('menu-accordion-click');
      //     // alert('click');
      // });
      let fl_accordion = $('.fl-accordion');
      fl_accordion.click(function () {
          $(this).addClass('fl-accordion-active');
          // alert('click');
      });
      let fl_n_accordion = $('.fl-n-accordion');
      fl_n_accordion.click
    });
    
    let test2 = document.querySelectorAll('.accordion-collapse .accordion-body ul li ul li');
    test2.forEach((e) => {
        if (e.classList.contains('qm-active')) {
            let currentElementId = e.closest('.accordion').id;
            console.log('sal;dkfj', e.closest('.accordion'))
            let mainParent = e.closest('.accordion').parentElement.parentElement.parentElement.classList.add('show')
            console.log('mainparent', mainParent)
            let menu_active = document.getElementById(currentElementId).classList.add('menu-active')
            console.log('menu-active', menu_active)
            console.log(currentElementId);
            let accordion = e.closest('.accordion');
            let currentElement = document.getElementById(currentElementId);
            console.log(currentElement.firstElementChild.childNodes[3])
            let addClass = currentElement.firstElementChild.childNodes[3];
            console.log('fl', addClass);
            if (addClass) {
                addClass.classList.add('show');
            }
            let mainParentElement = currentElement.firstElementChild.childNodes[1].childNodes[1];
            console.log(mainParentElement)
            if (mainParentElement) {
                mainParentElement.classList.add('collapsed');
            }
        }
    });
    let test = document.querySelectorAll('.accordion-collapse .accordion-body ul li');
    test.forEach((e) => {
        if (e.classList.contains('qm-active')) {
            let currentElementId = e.closest('.accordion').id;
            let menu_active = document.getElementById(currentElementId).classList.add('menu-active')
            console.log(currentElementId);
            let accordion = e.closest('.accordion');
            let currentElement = document.getElementById(currentElementId);
            console.log(currentElement.firstElementChild.childNodes[3])
            let addClass = currentElement.firstElementChild.childNodes[3];
            if (addClass) {
                addClass.classList.add('show');
            }
            let mainParentElement = currentElement.firstElementChild.childNodes[1].childNodes[1];
            console.log(mainParentElement)
            if (mainParentElement) {
                mainParentElement.classList.add('collapsed');
            }
        }
    });
  
  
  
  })
  