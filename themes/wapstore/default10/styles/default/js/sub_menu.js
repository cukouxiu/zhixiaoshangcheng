// JavaScript Document
	
$(function(){
	//下拉菜单
	$(".menu").click(function(){
		$(".sub_menu_bg").slideDown();
		})
	$(".shrink").click(function(){
		$(".sub_menu_bg").slideUp();
		})
	//二级菜单
	$(".sub_menu li").click(function(){
		$(this).children(".sub_menu_list").slideToggle();
	}); 
	//显示（关闭）二维码等店铺信息
	$(".code").click(function(){
		$(".shop_info").show().animate({left:0});
		})
	$(".shop_info .back").click(function(){
		$(".shop_info").animate({left:"100%"});
		})
	//加入收藏
	//$(".fav").click(function(){
	//	$(".fav_msg").fadeIn(1000).delay(3000).fadeOut(1000);
	//	})
	})


<!--------取屏幕宽高--------------------->

	$(function(){
		public_search();
	});	
	
	$(window).resize(function(){
		public_search();
	});
	function public_search(){
		var zw = $('.logo').css('width');
		zw = zw.substring(0,zw.length-2);
		
		var w = document.documentElement.clientWidth-zw;
		
		$('.searchBar').css({'width':w+'px'});
	}
//返回顶部	
$(function(){
	$('.top').click(function(){$('html,body').animate({scrollTop: '0px'}, 800);});
	})
	