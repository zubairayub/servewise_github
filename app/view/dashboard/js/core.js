

(function ($) {
	$.fn.countTo = function (options) {
		options = options || {};
		
		return $(this).each(function () {
			// set options for current element
			var settings = $.extend({}, $.fn.countTo.defaults, {
				from:            $(this).data('from'),
				to:              $(this).data('to'),
				speed:           $(this).data('speed'),
				refreshInterval: $(this).data('refresh-interval'),
				decimals:        $(this).data('decimals')
			}, options);
			
			// how many times to update the value, and how much to increment the value on each update
			var loops = Math.ceil(settings.speed / settings.refreshInterval),
				increment = (settings.to - settings.from) / loops;
			
			// references & variables that will change with each update
			var self = this,
				$self = $(this),
				loopCount = 0,
				value = settings.from,
				data = $self.data('countTo') || {};
			
			$self.data('countTo', data);
			
			// if an existing interval can be found, clear it first
			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);
			
			// initialize the element with the starting value
			render(value);
			
			function updateTimer() {
				value += increment;
				loopCount++;
				
				render(value);
				
				if (typeof(settings.onUpdate) == 'function') {
					settings.onUpdate.call(self, value);
				}
				
				if (loopCount >= loops) {
					// remove the interval
					$self.removeData('countTo');
					clearInterval(data.interval);
					value = settings.to;
					
					if (typeof(settings.onComplete) == 'function') {
						settings.onComplete.call(self, value);
					}
				}
			}
			
			function render(value) {
				var formattedValue = settings.formatter.call(self, value, settings);
				$self.html(formattedValue);
			}
		});
	};
	
	$.fn.countTo.defaults = {
		from: 0,               // the number the element should start at
		to: 0,                 // the number the element should end at
		speed: 1000,           // how long it should take to count between the target numbers
		refreshInterval: 100,  // how often the element should be updated
		decimals: 0,           // the number of decimal places to show
		formatter: formatter,  // handler for formatting the value before rendering
		onUpdate: null,        // callback method for every time the element is updated
		onComplete: null       // callback method for when the element finishes updating
	};
	
	function formatter(value, settings) {
		return value.toFixed(settings.decimals);
	}
}(jQuery));

jQuery(function ($) {
  // custom formatting example
  $('.count-number').data('countToOptions', {
	formatter: function (value, options) {
	  return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
	}
  });
  
  // start all the timers
  $('.timer').each(count);  
  
  function count(options) {
	var $this = $(this);
	options = $.extend({}, options || {}, $this.data('countToOptions') || {});
	$this.countTo(options);
  }
});

// counter-end
  



const inputs = document.querySelectorAll(".input");

function addClass() {
  let parent = this.parentNode.parentNode;
  parent.classList.add("focus");
}

function removeClass() {
  let parent = this.parentNode.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

inputs.forEach((input) => {
  input.addEventListener("focus", addClass);
  input.addEventListener("blur", removeClass);
});                      
   





$('#confirmPassword').on('keyup', function () {

// //strong password
 var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
 var inputtxt = $('#password').val() ;
 if(inputtxt.match(passw)) 
 { 
 //alert('Correct, try another...');
//return true;
 if ($('#password').val() == $('#confirmPassword').val()) {
	  $('#message').html('Matching').css('color', 'green');
	} else 
	  $('#message').html('Not Matching').css('color', 'red');

 }
 else
 { 
//alert('Wrong...!');
// //return false;
   $('#message').html('Weak Password').css('color', 'red');

}


	
  });
const primaryColor = '#4834d4'
const warningColor = '#f0932b'
const successColor = '#6ab04c'
const dangerColor = '#eb4d4b'

const themeCookieName = 'theme'
const themeDark = 'dark'
const themeLight = 'light'

const body = document.getElementsByTagName('body')[0]

function setCookie(cname, cvalue, exdays) {
  var d = new Date()
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000))
  var expires = "expires="+d.toUTCString()
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/"
};

function getCookie(cname) {
  var name = cname + "="
  var ca = document.cookie.split(';')
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1)
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length)
    }
  }
  return ""
};

loadTheme()

function loadTheme() {
	var theme = getCookie(themeCookieName)
	body.classList.add(theme === "" ? themeLight : theme)
}

function switchTheme() {
	if (body.classList.contains(themeLight)) {
		body.classList.remove(themeLight)
		body.classList.add(themeDark)
		setCookie(themeCookieName, themeDark)
	} else {
		body.classList.remove(themeDark)
		body.classList.add(themeLight)
		setCookie(themeCookieName, themeLight)
	}
};

function collapseSidebar() {
	body.classList.toggle('sidebar-expand')
};

window.onclick = function(event) {
	openCloseDropdown(event)
};

function closeAllDropdown() {
	var dropdowns = document.getElementsByClassName('dropdown-expand')
	for (var i = 0; i < dropdowns.length; i++) {
		dropdowns[i].classList.remove('dropdown-expand')
	}
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

// function readURL(input) {
// 	if (input.files && input.files[0]) {
// 		var reader = new FileReader();

// 		reader.onload = function (e) {
// 			$('#blah')
// 				.attr('src', e.target.result);
// 		};

// 		reader.readAsDataURL(input.files[0]);
// 	}

// };



// var ctx = document.getElementById('myChart')
// ctx.height = 500
// ctx.width = 500
// var data = {
// 	labels: ['January', 'February', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
// 	datasets: [{
// 		fill: false,
// 		label: 'Completed',
// 		borderColor: successColor,
// 		data: [120, 115, 130, 100, 123, 88, 99, 66, 120, 52, 59],
// 		borderWidth: 2,
// 		lineTension: 0,
// 	}, {
// 		fill: false,
// 		label: 'Issues',
// 		borderColor: dangerColor,
// 		data: [66, 44, 12, 48, 99, 56, 78, 23, 100, 22, 47],
// 		borderWidth: 2,
// 		lineTension: 0,
// 	}]
// }

// var lineChart = new Chart(ctx, {
// 	type: 'line',
// 	data: data,
// 	options: {
// 		maintainAspectRatio: false,
// 		bezierCurve: false,
// 	}
// })

// var ProductImgGrid = document.getElementById("ProductImgGrid");
// var SmallImgGrid = document.getElementsByClassName("small-grid")

// SmallImgGrid[0].onclick = function(){
// 	ProductImgGrid.src = SmallImgGrid[0].src;
// }
// SmallImgGrid[1].onclick = function(){
// 	ProductImgGrid.src = SmallImgGrid[1].src;
// }
// SmallImgGrid[2].onclick = function(){
// 	ProductImgGrid.src = SmallImgGrid[2].src;
// }
// SmallImgGrid[3].onclick = function(){
// 	ProductImgGrid.src = SmallImgGrid[3].src;
// }

function readURL(input) {
	console.log(input.files);
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#blah')
				.attr('src', e.target.result);
		};

		reader.readAsDataURL(input.files[0]);
	}
	if (input.files && input.files[1]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#klah')
				.attr('src', e.target.result);
		};

		reader.readAsDataURL(input.files[1]);
	}
	if (input.files && input.files[2]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#plah')
				.attr('src', e.target.result);
		};

		reader.readAsDataURL(input.files[2]);
	}

};






