  <!-- contact us -->

    <!-- <section class="contactus" id="contactus">
        <div class="container">
            <div class="contact-content">
                <div class="contact-left-side" data-aos="zoom-in-right">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387190.2799160891!2d-74.25987584510595!3d40.69767006338158!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2s!4v1603793955455!5m2!1sen!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="contact-right-side" data-aos="zoom-in-left">
                    <div class="contact-heading">Contact Form</div>
                    <form action="sumit">
                        <input type="text" placeholder="First Name">
                        <br>
                        <input type="text" placeholder="Last Name">
                        <br>
                        <input type="email" placeholder="Your Email">
                        <br>
                        <input type="text" placeholder="Your Contact Number">
                        <br>
                        <textarea name="Messege" id="#" cols="30" rows="10" placeholder="Your Messege here"></textarea>
                        <br>
                        <button type="submit">SUBMIT<i class="fa fa-dropbox" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </section> -->
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript" ></script>
<script src="js/slick.min.js"></script>
<script src="js/supermarket.js"></script>

	
       <script src="../assets/js/jquery.smartCart.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
        	
    
   
            // Initialize Smart Cart        
            $('#smartcart').smartCart();
        
          

            
$('.sc-add-to-cart').on('click', function () {
        var cart = $('.fa-shopping-cart');
        var imgtodrag = $(this).parent('.item').parent('.items').eq(0);
      
        $(this).text('Added | Buy More');
       
   
        if (imgtodrag) {
            var imgclone = imgtodrag.clone()
                .offset({
                top: imgtodrag.offset().top,
                left: imgtodrag.offset().left
            })
                .css({
                'opacity': '1',
                    'position': 'absolute',
                    'height': '150px',
                    'width': '150px',
                    'z-index': '9999'
            })
                .appendTo($('body'))
                .animate({
                'top': cart.offset().top + 10,
                    'left': cart.offset().left + 10,
                    'width': 75,
                    'height': 75
            }, 1500, 'easeInOutExpo');
            
            setTimeout(function () {
                cart.effect("shake", {
                    times: 2
                }, 200);
            }, 1500);

            imgclone.animate({
                'width': 0,
                    'height': 0
            }, function () {
                $(this).detach()
            });
         
           
        }
    });    
        });
        
        


//window.onscroll = function() {myFunction()};

// // Get the header
// var header = document.getElementById("myNav");

// // Get the offset position of the navbar
// var sticky = header.offsetTop;

// // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
// function myFunction() {
//   if (window.pageYOffset > sticky) {
//     header.classList.add("sticky");
//   } else {
//     header.classList.remove("sticky");
//   }
// } 

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    document.getElementById("myNav").style.background = "rgba(0,0,0,0.2)";
  } else {
    document.getElementById("myNav").style.background = "transparent";
  }
};


    </script>
    