  <!-- contact us -->

    
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="js/pharmacy.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript" ></script>
  <script src="js/slick.min.js"></script>
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
  <?php
include '../../../../chat/index.php'; 
?>
  <script src="../assets/js/jquery.smartCart.js" type="text/javascript"></script>
  
  <script type="text/javascript">
  
        $(document).ready(function(){
        	
            // Initialize Smart Cart        
            $('#smartcart').smartCart();
        });

        //
         
// 
        window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    document.getElementById("myNav").style.background = "rgba(0,0,0,0.2)";
  } else {
    document.getElementById("myNav").style.background = "transparent";
  }
}    

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

    </script>
    