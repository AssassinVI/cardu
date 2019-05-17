$(document).ready(function() {
	/*-- 新輪播 --*/
	 var new_Swiper = new Swiper ('.new_slide .swiper-container', {
	    speed:1000,
	    allowTouchMove: false,
	    // autoplay: {
	    //     disableOnInteraction:false,
	    //     delay: 5000
	    // },
	    // 如果需要前进后退按钮
	    // navigation: {
	    //   nextEl: '.new_slide .swiper-button-next',
	    //   prevEl: '.new_slide .swiper-button-prev',
	    // },
	    // 如果需要分页器
	        pagination: {
	          el: '.new_slide .swiper-pagination',
	          clickable :true
	     },
	     on:{
	           slideChangeTransitionEnd: function(){ 
	             
	           } 
	        }
	  });  


    
    //-- 四小篇輪播 --
    if ($('.new_slide .swiper-container').length>0) {
     var slide_index=1;
     var t=setInterval(function () {
    	if (slide_index==4) {
    	  var new_slide_index=new_Swiper.activeIndex==2 ? 0:new_Swiper.activeIndex+1;
          new_Swiper.slideTo(new_slide_index, 750, false);
    	}
    	slide_index=slide_index==4 ? 1:slide_index+1;
    	fore_slide(slide_index);
     }, 5000);
    }

    //-- 四小篇切換 --
     //- list -
	 $('.slide_list a').mouseenter(function(event) {
	 	$('.slide_list a').removeClass('active');
	 	$(this).addClass('active');
	 	$('.slide_img a').removeClass('active');
	 	$('.slide_img [index_img="'+$(this).attr('index')+'"]').addClass('active');
	 	slide_index=parseInt($(this).attr('index')) ;
	 	clearInterval(t);
	 });

	 $('.slide_list a').mouseleave(function(event){
          t=setInterval(function () {
          	if (slide_index==4) {
          	  var new_slide_index=new_Swiper.activeIndex==2 ? 0:new_Swiper.activeIndex+1;
          	  new_Swiper.slideTo(new_slide_index, 750, false);
          	}
          	slide_index=slide_index==4 ? 1:slide_index+1;
           	fore_slide(slide_index);
           }, 5000);
	 });

	 //- 圖片 -
	 $('.slide_img a').mouseenter(function(event) {
	 	clearInterval(t);
	 });

	 $('.slide_img a').mouseleave(function(event) {
	 	t=setInterval(function () {
          	if (slide_index==4) {
          	  var new_slide_index=new_Swiper.activeIndex==2 ? 0:new_Swiper.activeIndex+1;
          	  new_Swiper.slideTo(new_slide_index, 750, false);
          	}
          	slide_index=slide_index==4 ? 1:slide_index+1;
           	fore_slide(slide_index);
           }, 5000);
	 });

	 $('.slide_list a').click(function(event) {
	 	location.href=$(this).attr('href');
	 });

	 $('.slide_img a').click(function(event) {
	 	location.href=$(this).attr('href');
	 });


	 //-- 大輪播切換 --
	 $('.new_slide .swiper-pagination-bullet').click(function(event) {
	 	slide_index=1;
	 	fore_slide(slide_index);

	 });

	 /*-- 新輪播 END --*/
});

//-- 四小篇輪播FUN --
function fore_slide(slide_index) {
      	$('.slide_list a').removeClass('active');
  	 	$('.slide_list [index="'+slide_index+'"]').addClass('active');
  	 	$('.slide_img a').removeClass('active');
  	 	$('.slide_img [index_img="'+slide_index+'"]').addClass('active');
  	 	TweenMax.fromTo($('.slide_img [index_img="'+slide_index+'"]'), 0.8, { opacity: '0'},{ opacity: '1', ease:Power3.easeOut});
}