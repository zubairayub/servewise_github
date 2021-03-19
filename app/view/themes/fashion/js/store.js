$(".next-trigger").click(function() {
    let _next = $(".next");
    let _active = $(".active");
    let _coming = $(".coming").first();
    let _last = $(".last");
    _next.removeClass("next");
    _next.addClass("active");
    _active.removeClass("active");
  _active.addClass("last");
    
    _coming.removeClass("coming");
    _coming.addClass("next");
    _last.removeClass("last");
    _last.addClass("going");
  })
  
  $(".last-trigger").click(function() {
    let _going = $(".going").first();
    let _next = $(".next");
    let _active = $(".active");
    let _coming = $(".coming").first();
    let _last = $(".last");
    _next.removeClass("next");
    _next.addClass("coming");
    _active.removeClass("active");
  _active.addClass("next");
    _last.removeClass("last");
    _last.addClass("active");
    _going.removeClass("going");
    _going.addClass("last");
  });

  
  document.addEventListener("DOMContentLoaded", function(event) {


    const cartButtons = document.querySelectorAll('.cart-button');
    
    cartButtons.forEach(button => {
    
    button.addEventListener('click',cartClick);
    
    });
    
    function cartClick(){
    let button =this;
    button.classList.add('clicked');
    }
    
    
    
    });
    

  AOS.init();
 