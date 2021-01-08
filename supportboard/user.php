  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>                                                                                             

<link rel='stylesheet' href="http://localhost/supportboard/css/style.css">
</head>

<!------ Include the above in your HEAD tag ---------->

<div class="container">
	<div class="row">
	 <div class="wrapper">
            <div class="contact-form-page">
			<form action="user_action.php" method="post" id="closeForm">
				<div class="form-head">
					<div class="header-btn">
						<a class="top-btn" name='close' href="#"><i class="fa fa-times"></i></a>
					</div>
				</div>
			</form>
            <h1>Please fill the form - I will response as fast as I can!</h1>
            <form action="user_action.php" method="post" id="chatForm">
                <div class="form-group">
                    <label for="exampleInputText">First Name</label>
                    <input type="text" name="f_name" class="form-control"  required="required">
                </div>
                <div class="form-group">
                    <label for="exampleInputText">Last Name</label>
                    <input type="text" name="l_name" class="form-control"  required="required">
					<input type="hidden" name="user_type" value="user">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" required="required">
                </div>
                <div class="form-group">
                    <label for="exampleInputMessage">Message</label>
                    <textarea class="form-control chat_box" rows="3"  name="message" required="required"></textarea>
                </div>
                <button type="submit" class="submit-buttom" >Send</button>
            </form>
			<div class="form-group chat_box">
				<textarea class="form-control response" rows="6" readonly="readonly"></textarea>
			</div>
			<form action="user_action" method='post' id="msgBox">
			<div class="form-group chat_box">
				<input type="text" class="form-control text" name='messages'>
			</div>
			<div class="form-group chat_box">
				<input type="submit" class="submit-button">
			</div>
			</form>
            </div>
            <a class="buttom-btn" href="#"><i class="fa fa-check"></i></a>
        </div>

	</div>
</div>
<script>
      $(function () {
		$('#msgBox').hide();
        $('#chatForm').on('submit', function (e) {
			msg = $('.text').val();
          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'user_action.php',
            data: $('form').serialize(),
            success: function () {
              alert('form was submitted');
			  
			  $('#msgBox').show();
			  $('#chatForm').hide();
			  $('.response').append(msg);
            }
          });

        });
		$('.top-btn').on('click', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'user_action.php',
            data: $('form').serialize(),
            success: function () {
              alert('chat was closed');
            }
          });

        });
		$('#msgBox').on('submit', function (e) {
			msg = $('.text').val();
          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'user_action.php',
            data: $('form').serialize(),
            success: function () {
              $('.response').append(msg+'<br />');
            }
          });

        });
      });
</script>
<script>
$( document ).ready(function() {
	$(".buttom-btn").click(function(){
		$(".top-btn").addClass('top-btn-show');
		$(".contact-form-page").addClass('show-profile');
		$(this).addClass('buttom-btn-hide')
	});

	$(".top-btn").click(function(){
		$(".buttom-btn").removeClass('buttom-btn-hide');
		$(".contact-form-page").removeClass('show-profile');
	});
});
</script>