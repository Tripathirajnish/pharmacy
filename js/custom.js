$(document).ready(function(){

var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".submit").click(function(){
	return false;
})
$("#edit_bank").click(function(){
	$(".remove-disable").removeAttr('disabled');
	$('.hide_account').hide();
	$('.show_account').show();
	$("#send_otp").show();
});

$('#send_otp').click(function(){
	var phone = $('#phone').val();
	var old_account_match = $('#old_account_match').val();
	var old_account = $('#old_account').val();
	var new_account = $('#new_account').val();
	var confirm_account = $('#confirm_account').val();
	console.log('old_account_match' + old_account_match);
	console.log('old_account' + old_account);
	if(old_account_match != old_account){
		alert('Old account number not mathed');
		return false;
	} 
	if(new_account != confirm_account){
		alert('Confirm account number not mathed');
		return false;
	}
	$.ajax({
		url : base_url+'member/OtpController',
		type: 'POST',
		data:{send:phone},
		success:function(result) {
			if(result == 'success'){
				$('#myModal').show();
			} else{
				alert('Error');
			}
		}
	});
});
$('#submit_account').click(function(){
	var account_number = $('#account_number').val();
	var confirm_account = $('#confirm_account').val();
	if(account_number != confirm_account){
		alert('Account Number not matched.');
		return false;
	}
});
//alert(base_url);
 $("#otp_verify").click(function(){
	var otp_input = $('#otp_input').val();
	if(otp_input == ''){
		alert('Please enter otp');
		return false;
	}
	$.ajax({
		url : base_url+'member/OtpController/verifyOtp',
		type: 'POST',
		data:{otp:otp_input},
		success:function(result) {
			console.log(result);
			if(result == 'success'){
				$('#update_account').trigger('click');
			} else{
				alert('Error');
			}
		}
	});
 });
	
});
