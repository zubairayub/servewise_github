

AOS.init();

$(document).ready(function(){
    $(".default_option").click(function(){
      $(this).parent().toggleClass("active");
    })

    $(".select_ul li").click(function(){
      var currentele = $(this).html();
      $(".default_option li").html(currentele);
      $(this).parents(".select_wrap").removeClass("active");
    })
});

    
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

    $('#btnPrint').click(function(){
        $('#myFrame').printThis({
            debug: false,               // show the iframe for debugging
            importCSS: true,            // import parent page css
            importStyle: false,         // import style tags
            printContainer: true,       // print outer container/$.selector
            loadCSS: "http://localhost/servewsie_main/servewise_github/app/view/css/navigationpage.css",                // path to additional css file - use an array [] for multiple
            pageTitle: "",              // add title to print page
            removeInline: false,        // remove inline styles from print elements
            removeInlineSelector: "*",  // custom selectors to filter inline styles. removeInline must be true
            printDelay: 333,            // variable print delay
            header: null,               // prefix to html
            footer: "<p>Power By 'Nazreen Consulting'</p>",               // postfix to html
            base: false,                // preserve the BASE tag or accept a string for the URL
            formValues: true,           // preserve input/form values
            canvas: false,              // copy canvas content
            doctypeString: '...',       // enter a different doctype for older markup
            removeScripts: false,       // remove script tags from print content
            copyTagClasses: false,      // copy classes from the html & body tag
            beforePrintEvent: null,     // function for printEvent in iframe
            beforePrint: null,          // function called before iframe is filled
            afterPrint: null            // function called before iframe is removed
        });
    });
    
    function playAudio() {
        document.getElementById("audio").play();
    };
    

    


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
    };

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
};


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
};

$

// $('.sub-menu ul').hide();
// $(".sub-menu a").click(function () {

//     $(this).parent(".sub-menu").children("ul").slideToggle("100");
// });







// 
// 



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
$(".sub-menu:nth-child(15)").children("ul").slideUp();

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
    $(".sub-menu:nth-child(15)").children("ul").slideUp();
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
    $(".sub-menu:nth-child(15)").children("a").removeClass("active-sm");

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
    $(".sub-menu:nth-child(15)").children("ul").slideUp();
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
    $(".sub-menu:nth-child(15)").children("a").removeClass("active-sm");

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
    $(".sub-menu:nth-child(15)").children("ul").slideUp();
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
    $(".sub-menu:nth-child(15)").children("a").removeClass("active-sm");
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
    $(".sub-menu:nth-child(15)").children("ul").slideUp();
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
    $(".sub-menu:nth-child(15)").children("a").removeClass("active-sm");
    
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
    $(".sub-menu:nth-child(15)").children("ul").slideUp();
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
    $(".sub-menu:nth-child(15)").children("a").removeClass("active-sm");

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
    $(".sub-menu:nth-child(15)").children("ul").slideUp();
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
    $(".sub-menu:nth-child(15)").children("a").removeClass("active-sm");

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
    $(".sub-menu:nth-child(15)").children("ul").slideUp();
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
    $(".sub-menu:nth-child(15)").children("a").removeClass("active-sm");

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
    $(".sub-menu:nth-child(15)").children("ul").slideUp();
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
    $(".sub-menu:nth-child(15)").children("a").removeClass("active-sm");

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
    $(".sub-menu:nth-child(15)").children("ul").slideUp();
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
    $(".sub-menu:nth-child(15)").children("a").removeClass("active-sm");

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
    $(".sub-menu:nth-child(15)").children("ul").slideUp();
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
    $(".sub-menu:nth-child(15)").children("a").removeClass("active-sm");

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
    $(".sub-menu:nth-child(15)").children("ul").slideUp();
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
    $(".sub-menu:nth-child(15)").children("a").removeClass("active-sm");

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
    $(".sub-menu:nth-child(15)").children("ul").slideUp();
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
    $(".sub-menu:nth-child(15)").children("a").removeClass("active-sm");
});

$( ".sub-menu:nth-child(15)" ).click(function() {
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
    $(".sub-menu:nth-child(15)").children("ul").slideToggle();
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
    $(".sub-menu:nth-child(14)").children("a").removeClass("active-sm");
    $(".sub-menu:nth-child(15)").children("a").toggleClass("active-sm");
});


$(".section-upper-low").slideUp();

$(".edit-cust").click(function() {
    $(".section-upper-low").slideDown();
});

$(".btn-2").click(function() {
    $(".section-upper-low").slideUp();
});

$("#online-users-data").slideUp();
$("#main-chart-container").slideUp();

$( "#realtime-data" ).children('h3').click(function() {
    $("#online-users-data").slideToggle();
    $(".fa-angle-right").toggleClass("angle-active")
    $("#realtime-data").children('h3').toggleClass("realtime-data-2")
    $("#main-chart-container").slideUp();
    $(".session-selector").children('h3').removeClass("realtime-data-2")
    $(".fa-angle-double-right").removeClass("d-angle-active")
});

$( ".session-selector" ).children('h3').click(function() {
    $("#main-chart-container").slideToggle();
    $(".fa-angle-double-right").toggleClass("d-angle-active")
    $(".session-selector").children('h3').toggleClass("realtime-data-2")
    $("#online-users-data").slideUp();
    $(".fa-angle-right").removeClass("angle-active")
    $("#realtime-data").children('h3').removeClass("realtime-data-2")
});




