document.addEventListener("DOMContentLoaded", function(event) {


  const cartButtons = document.querySelectorAll('.cart-button');
  
  cartButtons.forEach(button => {
  
  button.addEventListener('click',cartClick);
  
  });
  
  function cartClick(){
  let button =this;
  button.classList.toggle('clicked');
  }
  
  
  
  });

function updateSliderArrowsStatus(
    cardsContainer,
    containerWidth,
    cardCount,
    cardWidth
  ) {
    if (
      $(cardsContainer).scrollLeft() + containerWidth <
      cardCount * cardWidth + 15
    ) {
      $("#slide-right-container").addClass("active");
    } else {
      $("#slide-right-container").removeClass("active");
    }
    if ($(cardsContainer).scrollLeft() > 0) {
      $("#slide-left-container").addClass("active");
    } else {
      $("#slide-left-container").removeClass("active");
    }
  };
  $(function() {
    // Scroll products' slider left/right
    let div = $("#cards-container");
    let cardCount = $(div)
      .find(".cards")
      .children(".card").length;
    let speed = 1000;
    let containerWidth = $(".container").width();
    let cardWidth = 250;
  
    updateSliderArrowsStatus(div, containerWidth, cardCount, cardWidth);
  
    //Remove scrollbars
    $("#slide-right-container").click(function(e) {
      if ($(div).scrollLeft() + containerWidth < cardCount * cardWidth) {
        $(div).animate(
          {
            scrollLeft: $(div).scrollLeft() + cardWidth
          },
          {
            duration: speed,
            complete: function() {
              setTimeout(
                updateSliderArrowsStatus(
                  div,
                  containerWidth,
                  cardCount,
                  cardWidth
                ),
                1005
              );
            }
          }
        );
      }
      updateSliderArrowsStatus(div, containerWidth, cardCount, cardWidth);
    });
    $("#slide-left-container ,#slide-left-container1").click(function(e) {
      if ($(div).scrollLeft() + containerWidth > containerWidth) {
        $(div).animate(
          {
            scrollLeft: "-=" + cardWidth
          },
          {
            duration: speed,
            complete: function() {
              setTimeout(
                updateSliderArrowsStatus(
                  div,
                  containerWidth,
                  cardCount,
                  cardWidth
                ),
                1005
              );
            }
          }
        );
      }
      updateSliderArrowsStatus(div, containerWidth, cardCount, cardWidth);
    });
  
    // If resize action ocurred then update the container width value
    $(window).resize(function() {
      try {
        containerWidth = $("#cards-container").width();
        updateSliderArrowsStatus(div, containerWidth, cardCount, cardWidth);
      } catch (error) {
        console.log(
          `Error occured while trying to get updated slider container width: 
              ${error}`
        );
      }
    });
  });

 
    $(".default_option").click(function(){
      $(this).parent().toggleClass("active");
    })

    $(".select_ul li").click(function(){
      var currentele = $(this).html();
      $(".default_option li").html(currentele);
      $(this).parents(".select_wrap").removeClass("active");
    });
  
  

  
  
  window.onscroll = function() {scrollFunction()};
  
  function scrollFunction() {
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
      document.getElementById("myNav").style.background = "rgba(0,0,0,0.2)";
    } else {
      document.getElementById("myNav").style.background = "transparent";
    }
  };
  
  

  AOS.init();

  
