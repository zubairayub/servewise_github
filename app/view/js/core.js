
AOS.init();

    
    $(".nav-link").click(function(){
        $(this).toggleClass("nav-link2");
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

$(window).scroll(function(){ 
    let windowPosition = $(window).scrollTop();
    let sectionPosition = $('.section-market').position().top;
    if( windowPosition >= sectionPosition )
    {
        $('.section-market').addClass('scrollEffect1')
        $('.section-market').data('fade-up')
    }
    else{
        $('.section-market').removeClass('scrollEffect1')
    }
})


$(window).scroll(function(){
    let windowPosition = $(window).scrollTop();
    let sectionPosition = $('.section-market').position().top;
    if( windowPosition >= sectionPosition )
    {
        $('.section-Manage').addClass('scrollEffect2')
    }
    else{
        $('.section-Manage').removeClass('scrollEffect2')
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

$('.sub-menu ul').hide();
$(".sub-menu a").click(function () {
	$(this).parent(".sub-menu").children("ul").slideToggle("100");
	$(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
});

