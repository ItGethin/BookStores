

//回到顶部

	$(function(){
		$(window).scroll(function(){
			// console.log($(window).scrollTop());
			if($(window).scrollTop()>400){
				$(".goTop").fadeIn();
			}else{
				$(".goTop").fadeOut();
			}
		});


		$(".goTop").on("click",function(){

			$("body").animate({scrollTop:0},500);
			 // $('body,html').animate({scrollTop:0},500);
		});
	});



	// 增加 与 减少
	$(function() {
		// console.log(11);
		var num = $('#num');
		
		var count = parseInt($(num).val());
		// console.log(count);
		$('.less').click(function() {

			count--;
			if(count<1) {
				count=1;
			}
			$(num).val(count);

		});
		$('.add').click(function() {
			// console.log(count);
			count++;
			$(num).val(count);
		});
	});