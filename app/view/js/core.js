AOS.init();

    
    $(".nav-link").click(function(){
        $(this).toggleClass("nav-link2");
        $('.navbar').toggleClass("navbar-second");
    });


    $(".not-link").click(function(){
        $(this).toggleClass("not-link2");
    });

    $(".not-link").click(function(){
        $(".notification-menu").toggleClass("notification-menu-show");
    });
    $(".avt-wrapper").click(function(){
        $(".drop-down-menu").toggleClass("notification-menu-show");
    });
    

    


    function searchToggle(obj, evt){
        var container = $(obj).closest('.search-wrapper');
            if(!container.hasClass('active')){
                container.addClass('active');
                evt.preventDefault();
            }
            else if(container.hasClass('active') && $(obj).closest('.input-holder').length == 0){
                container.removeClass('active');
                // clear input
                container.find('.search-input').val('');
            }
    }

$(window).scroll(function(){
    let windowPosition = $(window).scrollTop();
    let sectionPosition = $('.section-sell').position().top;
    if( windowPosition >= sectionPosition )
    {
        $('.section-sell').addClass('scrollEffect')
    }
    else{
        $('.section-sell').removeClass('scrollEffect')
    }
})


var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}


function openCloseDropdown(event) {
	if (!event.target.matches('.dropdown-toggle')) {
		// 
		// Close dropdown when click out of dropdown menu
		// 
		closeAllDropdown()
	} else {
		var toggle = event.target.dataset.toggle
		var content = document.getElementById(toggle)
		if (content.classList.contains('dropdown-expand')) {
			closeAllDropdown()
		} else {
			closeAllDropdown()
			content.classList.add('dropdown-expand')
		}
	}
}

$

// $('.sub-menu ul').hide();
// $(".sub-menu a").click(function () {

//     $(this).parent(".sub-menu").children("ul").slideToggle("100");
// });


$(".sub-menu:nth-child(3)").children("ul").slideUp();
$(".sub-menu:nth-child(4)").children("ul").slideUp();
$(".sub-menu:nth-child(5)").children("ul").slideUp();
$(".sub-menu:nth-child(6)").children("ul").slideUp();
$(".sub-menu:nth-child(7)").children("ul").slideUp();
$(".sub-menu:nth-child(8)").children("ul").slideUp();
$(".sub-menu:nth-child(9)").children("ul").slideUp();
$(".sub-menu:nth-child(10)").children("ul").slideUp();
$(".sub-menu:nth-child(11)").children("ul").slideUp();
$(".sub-menu:nth-child(12)").children("ul").slideUp();
$(".sub-menu:nth-child(13)").children("ul").slideUp();
$(".sub-menu:nth-child(14)").children("ul").slideUp();

$( ".sub-menu:nth-child(3)" ).click(function() {
    $(".sub-menu:nth-child(3)").children("ul").slideToggle();  
    $(".sub-menu:nth-child(4)").children("ul").slideUp();
    $(".sub-menu:nth-child(5)").children("ul").slideUp();
    $(".sub-menu:nth-child(6)").children("ul").slideUp();
    $(".sub-menu:nth-child(7)").children("ul").slideUp();
    $(".sub-menu:nth-child(8)").children("ul").slideUp();
    $(".sub-menu:nth-child(9)").children("ul").slideUp();
    $(".sub-menu:nth-child(10)").children("ul").slideUp();
    $(".sub-menu:nth-child(11)").children("ul").slideUp();
    $(".sub-menu:nth-child(12)").children("ul").slideUp();
    $(".sub-menu:nth-child(13)").children("ul").slideUp();
    $(".sub-menu:nth-child(14)").children("ul").slideUp();
// active-class
    $(".sub-menu:nth-child(3)").children("a").toggleClass("active-sm");
    $(".sub-menu:nth-child(4)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(5)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(6)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(7)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(8)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(9)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(10)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(11)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(12)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(13)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(14)").children("a").removeClass("active-sm");

});

$( ".sub-menu:nth-child(4)" ).click(function() {
    $(".sub-menu:nth-child(3)").children("ul").slideUp();
    $(".sub-menu:nth-child(4)").children("ul").slideToggle();
    $(".sub-menu:nth-child(5)").children("ul").slideUp();
    $(".sub-menu:nth-child(6)").children("ul").slideUp();
    $(".sub-menu:nth-child(7)").children("ul").slideUp();
    $(".sub-menu:nth-child(8)").children("ul").slideUp();
    $(".sub-menu:nth-child(9)").children("ul").slideUp();
    $(".sub-menu:nth-child(10)").children("ul").slideUp();
    $(".sub-menu:nth-child(11)").children("ul").slideUp();
    $(".sub-menu:nth-child(12)").children("ul").slideUp();
    $(".sub-menu:nth-child(13)").children("ul").slideUp();
    $(".sub-menu:nth-child(14)").children("ul").slideUp();
    // active-class
    $(".sub-menu:nth-child(3)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(4)").children("a").toggleClass("active-sm");
    $(".sub-menu:nth-child(5)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(6)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(7)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(8)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(9)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(10)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(11)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(12)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(13)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(14)").children("a").removeClass("active-sm");

});

$( ".sub-menu:nth-child(5)" ).click(function() {
    $(".sub-menu:nth-child(3)").children("ul").slideUp();
    $(".sub-menu:nth-child(4)").children("ul").slideUp();
    $(".sub-menu:nth-child(5)").children("ul").slideToggle();
    $(".sub-menu:nth-child(6)").children("ul").slideUp();
    $(".sub-menu:nth-child(7)").children("ul").slideUp();
    $(".sub-menu:nth-child(8)").children("ul").slideUp();
    $(".sub-menu:nth-child(9)").children("ul").slideUp();
    $(".sub-menu:nth-child(10)").children("ul").slideUp();
    $(".sub-menu:nth-child(11)").children("ul").slideUp();
    $(".sub-menu:nth-child(12)").children("ul").slideUp();
    $(".sub-menu:nth-child(13)").children("ul").slideUp();
    $(".sub-menu:nth-child(14)").children("ul").slideUp();
    // active-class
    $(".sub-menu:nth-child(3)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(4)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(5)").children("a").toggleClass("active-sm");
    $(".sub-menu:nth-child(6)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(7)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(8)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(9)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(10)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(11)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(12)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(13)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(14)").children("a").removeClass("active-sm");
});

$( ".sub-menu:nth-child(6)" ).click(function() {
    $(".sub-menu:nth-child(3)").children("ul").slideUp();
    $(".sub-menu:nth-child(4)").children("ul").slideUp();
    $(".sub-menu:nth-child(5)").children("ul").slideUp();
    $(".sub-menu:nth-child(6)").children("ul").slideToggle();
    $(".sub-menu:nth-child(7)").children("ul").slideUp();
    $(".sub-menu:nth-child(8)").children("ul").slideUp();
    $(".sub-menu:nth-child(9)").children("ul").slideUp();
    $(".sub-menu:nth-child(10)").children("ul").slideUp();
    $(".sub-menu:nth-child(11)").children("ul").slideUp();
    $(".sub-menu:nth-child(12)").children("ul").slideUp();
    $(".sub-menu:nth-child(13)").children("ul").slideUp();
    $(".sub-menu:nth-child(14)").children("ul").slideUp();
    // active-class
    $(".sub-menu:nth-child(3)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(4)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(5)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(6)").children("a").toggleClass("active-sm");
    $(".sub-menu:nth-child(7)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(8)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(9)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(10)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(11)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(12)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(13)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(14)").children("a").removeClass("active-sm");
    
});

$( ".sub-menu:nth-child(7)" ).click(function() {
    $(".sub-menu:nth-child(3)").children("ul").slideUp();
    $(".sub-menu:nth-child(4)").children("ul").slideUp();
    $(".sub-menu:nth-child(5)").children("ul").slideUp();
    $(".sub-menu:nth-child(6)").children("ul").slideUp();
    $(".sub-menu:nth-child(7)").children("ul").slideToggle();
    $(".sub-menu:nth-child(8)").children("ul").slideUp();
    $(".sub-menu:nth-child(9)").children("ul").slideUp();
    $(".sub-menu:nth-child(10)").children("ul").slideUp();
    $(".sub-menu:nth-child(11)").children("ul").slideUp();
    $(".sub-menu:nth-child(12)").children("ul").slideUp();
    $(".sub-menu:nth-child(13)").children("ul").slideUp();
    $(".sub-menu:nth-child(14)").children("ul").slideUp();
    // active-class
    $(".sub-menu:nth-child(3)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(4)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(5)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(6)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(7)").children("a").toggleClass("active-sm");
    $(".sub-menu:nth-child(8)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(9)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(10)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(11)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(12)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(13)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(14)").children("a").removeClass("active-sm");

});

$( ".sub-menu:nth-child(8)" ).click(function() {
    $(".sub-menu:nth-child(3)").children("ul").slideUp();
    $(".sub-menu:nth-child(4)").children("ul").slideUp();
    $(".sub-menu:nth-child(5)").children("ul").slideUp();
    $(".sub-menu:nth-child(6)").children("ul").slideUp();
    $(".sub-menu:nth-child(7)").children("ul").slideUp();
    $(".sub-menu:nth-child(8)").children("ul").slideToggle();
    $(".sub-menu:nth-child(9)").children("ul").slideUp();
    $(".sub-menu:nth-child(10)").children("ul").slideUp();
    $(".sub-menu:nth-child(11)").children("ul").slideUp();
    $(".sub-menu:nth-child(12)").children("ul").slideUp();
    $(".sub-menu:nth-child(13)").children("ul").slideUp();
    $(".sub-menu:nth-child(14)").children("ul").slideUp();
    // active-class
    $(".sub-menu:nth-child(3)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(4)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(5)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(6)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(7)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(8)").children("a").toggleClass("active-sm");
    $(".sub-menu:nth-child(9)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(10)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(11)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(12)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(13)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(14)").children("a").removeClass("active-sm");

});

$( ".sub-menu:nth-child(9)" ).click(function() {
    $(".sub-menu:nth-child(3)").children("ul").slideUp();
    $(".sub-menu:nth-child(4)").children("ul").slideUp();
    $(".sub-menu:nth-child(5)").children("ul").slideUp();
    $(".sub-menu:nth-child(6)").children("ul").slideUp();
    $(".sub-menu:nth-child(7)").children("ul").slideUp();
    $(".sub-menu:nth-child(8)").children("ul").slideUp();
    $(".sub-menu:nth-child(9)").children("ul").slideToggle();
    $(".sub-menu:nth-child(10)").children("ul").slideUp();
    $(".sub-menu:nth-child(11)").children("ul").slideUp();
    $(".sub-menu:nth-child(12)").children("ul").slideUp();
    $(".sub-menu:nth-child(13)").children("ul").slideUp();
    $(".sub-menu:nth-child(14)").children("ul").slideUp();
    // active-class
    $(".sub-menu:nth-child(3)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(4)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(5)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(6)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(7)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(8)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(9)").children("a").toggleClass("active-sm");
    $(".sub-menu:nth-child(10)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(11)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(12)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(13)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(14)").children("a").removeClass("active-sm");

});

$( ".sub-menu:nth-child(10)" ).click(function() {
    $(".sub-menu:nth-child(3)").children("ul").slideUp();
    $(".sub-menu:nth-child(4)").children("ul").slideUp();
    $(".sub-menu:nth-child(5)").children("ul").slideUp();
    $(".sub-menu:nth-child(6)").children("ul").slideUp();
    $(".sub-menu:nth-child(7)").children("ul").slideUp();
    $(".sub-menu:nth-child(8)").children("ul").slideUp();
    $(".sub-menu:nth-child(9)").children("ul").slideUp();
    $(".sub-menu:nth-child(10)").children("ul").slideToggle();
    $(".sub-menu:nth-child(11)").children("ul").slideUp();
    $(".sub-menu:nth-child(12)").children("ul").slideUp();
    $(".sub-menu:nth-child(13)").children("ul").slideUp();
    $(".sub-menu:nth-child(14)").children("ul").slideUp();
    // active-class
    $(".sub-menu:nth-child(3)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(4)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(5)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(6)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(7)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(8)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(9)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(10)").children("a").toggleClass("active-sm");
    $(".sub-menu:nth-child(11)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(12)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(13)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(14)").children("a").removeClass("active-sm");

});

$( ".sub-menu:nth-child(11)" ).click(function() {
    $(".sub-menu:nth-child(3)").children("ul").slideUp();
    $(".sub-menu:nth-child(4)").children("ul").slideUp();
    $(".sub-menu:nth-child(5)").children("ul").slideUp();
    $(".sub-menu:nth-child(6)").children("ul").slideUp();
    $(".sub-menu:nth-child(7)").children("ul").slideUp();
    $(".sub-menu:nth-child(8)").children("ul").slideUp();
    $(".sub-menu:nth-child(9)").children("ul").slideUp();
    $(".sub-menu:nth-child(10)").children("ul").slideUp();
    $(".sub-menu:nth-child(11)").children("ul").slideToggle();
    $(".sub-menu:nth-child(12)").children("ul").slideUp();
    $(".sub-menu:nth-child(13)").children("ul").slideUp();
    $(".sub-menu:nth-child(14)").children("ul").slideUp();
    // active-class
    $(".sub-menu:nth-child(3)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(4)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(5)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(6)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(7)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(8)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(9)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(10)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(11)").children("a").toggleClass("active-sm");
    $(".sub-menu:nth-child(12)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(13)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(14)").children("a").removeClass("active-sm");

});

$( ".sub-menu:nth-child(12)" ).click(function() {
    $(".sub-menu:nth-child(3)").children("ul").slideUp();
    $(".sub-menu:nth-child(4)").children("ul").slideUp();
    $(".sub-menu:nth-child(5)").children("ul").slideUp();
    $(".sub-menu:nth-child(6)").children("ul").slideUp();
    $(".sub-menu:nth-child(7)").children("ul").slideUp();
    $(".sub-menu:nth-child(8)").children("ul").slideUp();
    $(".sub-menu:nth-child(9)").children("ul").slideUp();
    $(".sub-menu:nth-child(10)").children("ul").slideUp();
    $(".sub-menu:nth-child(11)").children("ul").slideUp();
    $(".sub-menu:nth-child(12)").children("ul").slideToggle();
    $(".sub-menu:nth-child(13)").children("ul").slideUp();
    $(".sub-menu:nth-child(14)").children("ul").slideUp();
    // active-class
    $(".sub-menu:nth-child(3)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(4)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(5)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(6)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(7)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(8)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(9)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(10)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(11)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(12)").children("a").toggleClass("active-sm");
    $(".sub-menu:nth-child(13)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(14)").children("a").removeClass("active-sm");

});

$( ".sub-menu:nth-child(13)" ).click(function() {
    $(".sub-menu:nth-child(3)").children("ul").slideUp();
    $(".sub-menu:nth-child(4)").children("ul").slideUp();
    $(".sub-menu:nth-child(5)").children("ul").slideUp();
    $(".sub-menu:nth-child(6)").children("ul").slideUp();
    $(".sub-menu:nth-child(7)").children("ul").slideUp();
    $(".sub-menu:nth-child(8)").children("ul").slideUp();
    $(".sub-menu:nth-child(9)").children("ul").slideUp();
    $(".sub-menu:nth-child(10)").children("ul").slideUp();
    $(".sub-menu:nth-child(11)").children("ul").slideUp();
    $(".sub-menu:nth-child(12)").children("ul").slideUp();
    $(".sub-menu:nth-child(13)").children("ul").slideToggle();
    $(".sub-menu:nth-child(14)").children("ul").slideUp();
    // active-class
    $(".sub-menu:nth-child(3)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(4)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(5)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(6)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(7)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(8)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(9)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(10)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(11)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(12)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(13)").children("a").toggleClass("active-sm");
    $(".sub-menu:nth-child(14)").children("a").removeClass("active-sm");

});

$( ".sub-menu:nth-child(14)" ).click(function() {
    $(".sub-menu:nth-child(3)").children("ul").slideUp();
    $(".sub-menu:nth-child(4)").children("ul").slideUp();
    $(".sub-menu:nth-child(5)").children("ul").slideUp();
    $(".sub-menu:nth-child(6)").children("ul").slideUp();
    $(".sub-menu:nth-child(7)").children("ul").slideUp();
    $(".sub-menu:nth-child(8)").children("ul").slideUp();
    $(".sub-menu:nth-child(9)").children("ul").slideUp();
    $(".sub-menu:nth-child(10)").children("ul").slideUp();
    $(".sub-menu:nth-child(11)").children("ul").slideUp();
    $(".sub-menu:nth-child(12)").children("ul").slideUp();
    $(".sub-menu:nth-child(13)").children("ul").slideUp();
    $(".sub-menu:nth-child(14)").children("ul").slideToggle();
    // active-class
    $(".sub-menu:nth-child(3)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(4)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(5)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(6)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(7)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(8)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(9)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(10)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(11)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(12)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(13)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(14)").children("a").toggleClass("active-sm");

});
