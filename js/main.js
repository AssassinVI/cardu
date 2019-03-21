$(document).ready(function() {

            //--- 工具提示框 ---
            $('[data-toggle="tooltip"]').tooltip();

            $('#new_card').collapse();





            //-- 卷軸監控回調 --
            var scroll_x=0;
            $(window).bind('scroll resize', function() {
              var top=$(this).scrollTop();

              //-- TOP出現 --
              if (top>50){
                TweenMax.to($('.top_div'), 0.3, { bottom:'4%' , opacity:1, display:'block'});
              }
              else{
                TweenMax.to($('.top_div'), 0.3, { bottom:'-1%' , opacity:0, display:'none'});
              }
              
              //-- MENU跟隨畫面 --
              if ($(window).width()>768) {
                //-- 被景色 --
                var body_css=$('body').attr('class');

                if (top>0) {
                  if(scroll_x==0){
                    $('.header_div').addClass('fixed');  
                    $('.container').css('margin-top', '207px');
                    /*--- menu 使用背景色 ---*/
                     $('.header_div').addClass(body_css);
                    TweenMax.fromTo($('.header_div.fixed'), 0, { top: '-100px'},{ top: '0px'});
                    TweenMax.fromTo($('#index_head_left div img'), 0.3, { width: '226px'},{ width: '135px'});
                    scroll_x++;
                  }
                }
                else{
                  $('.header_div').removeClass('fixed');
                  $('.container').css('margin-top', '0px');
                  /*--- menu 使用背景色 ---*/
                   $('.header_div').removeClass(body_css);
                  TweenMax.fromTo($('#index_head_left div img'), 0.3, { width: '135px'},{ width: '226px'});
                  scroll_x=0;
                }
              }

              //-- 左右浮動廣告 --
              if (top>0) {
                $('.right-ad').css('top', top-197);
                $('.left-ad').css('top', top-197);
              }
              else{
                $('.right-ad').css('top', 10);
                $('.left-ad').css('top', 10);
              }
            });
            //-- 卷軸監控回調 END --




            //-- TOP Btn --
            $('.top_div a').click(function(event) {
               $('html,body').animate({
                scrollTop:0
               },1000);
            });






            //-- 判斷目前頁面，並對MENU反白 --
            var now_url=location.href;
            $('#menu ul li').removeClass('active');

            if (now_url.indexOf("news")>0) {
              $('#menu>ul>li:nth-child(1)').addClass('active');
              $('#menu>ul>li:nth-child(1)>a').css('color', '#223a8f');
            }
            if (now_url.indexOf("cardNews")>0) {
              $('#menu>ul>li:nth-child(3)').addClass('active');
              $('#menu>ul>li:nth-child(3)>a').css('color', '#223a8f');
            }
            if (now_url.indexOf("pay")>0) {
              $('#menu>ul>li:nth-child(4)').addClass('active');
              $('#menu>ul>li:nth-child(4)>a').css('color', '#223a8f');
            }
            if (now_url.indexOf("ticket")>0) {
              $('#menu>ul>li:nth-child(5)').addClass('active');
              $('#menu>ul>li:nth-child(5)>a').css('color', '#223a8f');
            }
            if (now_url.indexOf("point")>0) {
              $('#menu>ul>li:nth-child(6)').addClass('active');
              $('#menu>ul>li:nth-child(6)>a').css('color', '#223a8f');
            }
            if (now_url.indexOf("travel")>0) {
              $('#menu>ul>li:nth-child(7)').addClass('active');
              $('#menu>ul>li:nth-child(7)>a').css('color', '#223a8f');
            }






            //-- 展開搜尋欄 --
            $('#searchBtn').click(function(event) {
               $(".search_box").slideToggle('200');
            });
            //-- 關閉搜尋欄 --
            $('.search_box .close_btn').click(function(event) {
               $(".search_box").slideUp('200');
            });







            //----------------- 信用卡 ICON MouseOver/MouseOut ------------------------
            //-MouseOver-
            $('.ccard_icon_js').mouseenter(function(event) {
              var src_url=$(this).find('img').attr('src').split('/');
              var src=src_url[src_url.length-1].split('.');
                  src[0]=src[0]+'_down';

                  src_url[src_url.length-1]=src.join('.');


              $(this).find('img').attr('src', src_url.join('/'));
            });

            //-MouseOut-
            $('.ccard_icon_js').mouseleave(function(event) {
               var src_url=$(this).find('img').attr('src').split('/');
               var src=src_url[src_url.length-1].split('.');
               var src_old=src[0].split('_');
                   src[0]=src_old[0];

                   src_url[src_url.length-1]=src.join('.');


               $(this).find('img').attr('src', src_url.join('/'));

            });


            //----------------- 信用卡 ICON MouseOver END ------------------------



            

            //-- 首頁油價資訊切換 --
            var oil_x=1;
            var oil_total= $('#iOil>.row').length;
            var oil_timeOut=setInterval(function () {
              $('#iOil .row').removeClass('show');
              if (oil_x<oil_total) {
                $('#iOil .row:nth-child('+(oil_x+1)+')').addClass('show');
                TweenMax.fromTo($('#iOil .row:nth-child('+(oil_x+1)+')'), 0.5, { transform: 'rotateX(90deg)'},{ transform: 'rotateX(0deg)'});
                oil_x++;
              }
              else{
                $('#iOil .row:nth-child(1)').addClass('show');
                TweenMax.fromTo($('#iOil .row:nth-child(1)'), 0.5, { transform: 'rotateX(90deg)'},{ transform: 'rotateX(0deg)'});
                oil_x=1;
              }
            },5000);
            //-- 首頁油價資訊切換 END --







            /*-- Menu --*/
            $('#menu > ul> li').mouseenter(function(event) {
              if ($(this).find('.dropDown_menu').length>0) {
                $(this).children('a').css({
                  'background-image': 'url(/img/component/menuOverBr.png)',
                  'color':'#1d368c'
                });
                $(this).find('.dropDown_menu').css('display', 'block');
              }
            });

            $('#menu > ul> li').mouseleave(function(event) {
              if ($(this).find('.dropDown_menu').length>0) {
                $(this).children('a').css({
                  'background-image': 'none',
                  'color':'#fff'
                });
                $(this).find('.dropDown_menu').css('display', 'none');
              }
            });








            /*--- 切換 TAB ----*/
            $('.nav-tabs .nav-link').click(function(event) {
               // alert($(this).attr('aria-selected'));
               if($(this).attr('aria-selected')=='false'){

                 $.each($(this).parent().parent().find('.nav-link'), function(index, val) {

                     if($(this).attr('aria-selected')=='false'){
                       var this_bgm=$(this).find('.icon').css('background-image').split('/');
                       this_bgm[5]='icon';
                       $(this).find('.icon').css('background-image', this_bgm.join('/'));
                     }
                     else{
                       var this_bgm=$(this).find('.icon').css('background-image').split('/');
                       this_bgm[5]='icon_down';
                       $(this).find('.icon').css('background-image', this_bgm.join('/'));
                     }
                 });
               }
            });








            /*-- 滑鼠經過 MENU 單元提示 --*/
            $('#menu .dropDown_menu .row>div').mouseenter(function(event) {
               TweenMax.to($(this).find('h4'), 0.2, { "border-bottom": "3px solid #334896"});
            });

            $('#menu .dropDown_menu .row>div').mouseleave(function(event) {
               TweenMax.to($(this).find('h4'), 0.2, { "border-bottom": "1px solid #ccc"});
            });
            /*-- 滑鼠經過 MENU 單元提示 END --*/








            
            /*-- 新聞專題 --*/
             var news_Swiper = new Swiper ('.news_slide .swiper-container', {
                speed:750,
                loop:true,
                autoplay: {
                    disableOnInteraction:false,
                    delay: 5000
                },
                // 如果需要前进后退按钮
                navigation: {
                  nextEl: '.news_slide .swiper-button-next',
                  prevEl: '.news_slide .swiper-button-prev',
                },
                // 如果需要分页器
                    pagination: {
                      el: '.news_slide .swiper-pagination',
                      clickable :true
                 },
                 on:{
                       init: function(){
                         swiperAnimateCache(this); //隐藏动画元素 
                         swiperAnimate(this); //初始化完成开始动画
                       }, 
                       slideChangeTransitionEnd: function(){ 
                         swiperAnimate(this); //每个slide切换结束时也运行当前slide动画
                         //this.slides.eq(this.activeIndex).find('.ani').removeClass('ani'); 动画只展现一次，去除ani类名
                       } 
                    }
              });  

             $('.news_slide').mouseenter(function(event) {
              $(".news_slide .swiper-button-prev").css('left', '0%');
              $(".news_slide .swiper-button-next").css('right', '0%');
               news_Swiper.autoplay.stop();
             });

             $('.news_slide').mouseleave(function(event) {

              $(".news_slide .swiper-button-prev").css('left', '-7%');
              $(".news_slide .swiper-button-next").css('right', '-7%');
               news_Swiper.autoplay.start();
             });
             /*-- 新聞專題 END --*/











             /*-- 多專題-輪播 --*/
             var card_news_Swiper1 = new Swiper ('#iNewsR01 .swiper-container', {
                speed:750,
                loop:true,
                autoplay: {
                    disableOnInteraction:false,
                    delay: 5000
                },
                // 如果需要前进后退按钮
                navigation: {
                  nextEl: '#iNewsR01 .swiper-button-next',
                  prevEl: '#iNewsR01 .swiper-button-prev',
                },
                 on:{
                       init: function(){
                         swiperAnimateCache(this); //隐藏动画元素 
                         swiperAnimate(this); //初始化完成开始动画
                       }, 
                       slideChangeTransitionEnd: function(){ 
                         swiperAnimate(this); //每个slide切换结束时也运行当前slide动画
                         //this.slides.eq(this.activeIndex).find('.ani').removeClass('ani'); 动画只展现一次，去除ani类名
                       } 
                    }
              });

             var card_news_Swiper2 = new Swiper ('#iNewsR02 .swiper-container', {
                speed:750,
                loop:true,
                autoplay: {
                    disableOnInteraction:false,
                    delay: 5000
                },
                // 如果需要前进后退按钮
                navigation: {
                  nextEl: '#iNewsR02 .swiper-button-next',
                  prevEl: '#iNewsR02 .swiper-button-prev',
                },
                 on:{
                       init: function(){
                         swiperAnimateCache(this); //隐藏动画元素 
                         swiperAnimate(this); //初始化完成开始动画
                       }, 
                       slideChangeTransitionEnd: function(){ 
                         swiperAnimate(this); //每个slide切换结束时也运行当前slide动画
                         //this.slides.eq(this.activeIndex).find('.ani').removeClass('ani'); 动画只展现一次，去除ani类名
                       } 
                    }
              });

              $('#iNewsR01').mouseenter(function(event) {
                $(this).find('.swiper-button-prev').css('left', '0%');
                $(this).find('.swiper-button-next').css('right', '0%');
                card_news_Swiper1.autoplay.stop();
                
              });

              $('#iNewsR01').mouseleave(function(event) {
                $(this).find('.swiper-button-prev').css('left', '-12%');
                $(this).find('.swiper-button-next').css('right', '-12%');
                card_news_Swiper1.autoplay.start();
              });

              $('#iNewsR02').mouseenter(function(event) {
                $(this).find('.swiper-button-prev').css('left', '0%');
                $(this).find('.swiper-button-next').css('right', '0%');
                card_news_Swiper2.autoplay.stop();
                
              });

              $('#iNewsR02').mouseleave(function(event) {
                $(this).find('.swiper-button-prev').css('left', '-12%');
                $(this).find('.swiper-button-next').css('right', '-12%');
                card_news_Swiper2.autoplay.start();
              });
             /*-- 多專題-輪播 END --*/










            
            
            /*-- 卡排行 --*/
            var card_rank_Swiper = new Swiper ('.card_rank .swiper-container', {
                slidesPerView : 6,
                slidesPerGroup : 6,
                speed:750,
                // 如果需要前进后退按钮
                navigation: {
                  nextEl: '.card_rank .swiper-button-next',
                  prevEl: '.card_rank .swiper-button-prev',
                }
              });   

            var ccard_Swiper = new Swiper ('.ccard .swiper-container', {
                slidesPerView : 3,
                slidesPerGroup : 3,
                loop:true,
                speed:750,
                autoplay: {
                    delay: 5000
                },
                // 如果需要前进后退按钮
                navigation: {
                  nextEl: '.ccard .swiper-button-next',
                  prevEl: '.ccard .swiper-button-prev',
                }
              });   
            
            var index=1;
            $('.card_rank .swiper-slide').mouseenter(function(event) {
               
                var old_img_arr=$('.card_rank .swiper-slide:nth-child('+index+')').find('img').attr('src').split('/');
                old_img_arr[3]='icon';
                $('.card_rank .swiper-slide:nth-child('+index+')').find('img').attr('src', old_img_arr.join('/'));
                $('.card_rank .swiper-slide').removeClass('active');

                var img_arr=$(this).find('img').attr('src').split('/');
                img_arr[3]='icon_down';
                $(this).find('img').attr('src', img_arr.join('/'));
                $(this).addClass('active');

                //-- 切換信用卡 --
                if ($(this).attr('index')!=index) {
                  ccard_Swiper.removeAllSlides();
                  
                  for ( var i = 4; i <= 6; i++) {
                   var txt='<div class="swiper-slide">'+
                                        '<div class="w-h-100 hv-center">'+
                                          '<a href="#" title="台新銀行比漾聯名卡"><span class="top_Medal">'+i+'</span><img src="/img/component/card1.png" alt="台新銀行比漾聯名卡"><br>台新銀行比漾聯名卡</a>'+
                                        '</div>'+
                                    '</div>';
                    ccard_Swiper.appendSlide(txt);
                  }

                  for ( var i = 1; i <= 3; i++) {
                   var txt='<div class="swiper-slide">'+
                                        '<div class="w-h-100 hv-center">'+
                                          '<a href="#" title="台新銀行比漾聯名卡"><span class="top_Medal">'+i+'</span><img src="/img/component/card1.png" alt="台新銀行比漾聯名卡"><br>台新銀行比漾聯名卡</a>'+
                                        '</div>'+
                                    '</div>';
                    ccard_Swiper.appendSlide(txt);
                  }
                }

                index=$(this).attr('index');
            });
            /*--- 卡排行 END ---*/













            /*-- 卡總覽 --*/
            var card_all_Swiper = new Swiper ('.card_all .swiper-container', {
                slidesPerView : 6,
                slidesPerGroup : 6,
                speed:750,
                // 如果需要前进后退按钮
                navigation: {
                  nextEl: '.card_all .swiper-button-next',
                  prevEl: '.card_all .swiper-button-prev',
                }
              });   

            var ccard_Swiper = new Swiper ('.ccard .swiper-container', {
                slidesPerView : 3,
                slidesPerGroup : 3,
                loop:true,
                speed:750,
                autoplay: {
                    delay: 5000
                },
                // 如果需要前进后退按钮
                navigation: {
                  nextEl: '.ccard .swiper-button-next',
                  prevEl: '.ccard .swiper-button-prev',
                }
              });   
            
            var index=1;
            $('.card_all .swiper-slide').mouseenter(function(event) {
               
                var old_img_arr=$('.card_all .swiper-slide:nth-child('+index+')').find('img').attr('src').split('/');
                old_img_arr[3]='icon';
                $('.card_all .swiper-slide:nth-child('+index+')').find('img').attr('src', old_img_arr.join('/'));
                $('.card_all .swiper-slide').removeClass('active');

                var img_arr=$(this).find('img').attr('src').split('/');
                img_arr[3]='icon_down';
                $(this).find('img').attr('src', img_arr.join('/'));
                $(this).addClass('active');

                //-- 切換信用卡 --
                if ($(this).attr('index')!=index) {
                  ccard_Swiper.removeAllSlides();
                  
                  for ( var i = 4; i <= 6; i++) {
                   var txt='<div class="swiper-slide">'+
                                        '<div class="w-h-100 hv-center">'+
                                          '<a href="#" title="台新銀行比漾聯名卡"><img src="/img/component/card1.png" alt="台新銀行比漾聯名卡"><br>台新銀行比漾聯名卡</a>'+
                                        '</div>'+
                                    '</div>';
                    ccard_Swiper.appendSlide(txt);
                  }

                  for ( var i = 1; i <= 3; i++) {
                   var txt='<div class="swiper-slide">'+
                                        '<div class="w-h-100 hv-center">'+
                                          '<a href="#" title="台新銀行比漾聯名卡"><img src="/img/component/card1.png" alt="台新銀行比漾聯名卡"><br>台新銀行比漾聯名卡</a>'+
                                        '</div>'+
                                    '</div>';
                    ccard_Swiper.appendSlide(txt);
                  }
                }

                index=$(this).attr('index');
            });
            /*--- 卡總覽 END ---*/















            /*--------- 一大三小新聞專題 -----------*/
            var pagination_Swiper = new Swiper ('.slide_pagination .swiper-container', {
               direction : 'vertical',
               simulateTouch : false,//禁止鼠标模拟
               slidesPerView : 3,
               speed:750,
               loop:true,
               // 如果需要前进后退按钮
               navigation: {
                 nextEl: '.slide_pagination .swiper-button-next',
                 prevEl: '.slide_pagination .swiper-button-prev',
               }

             });

            var myCarousel_Swiper = new Swiper ('.myCarousel .news_live .swiper-container', {
               speed:750,
               simulateTouch : false,//禁止鼠标模拟
               loop:true,
               autoplay: {
                   disableOnInteraction:false,
                   delay: 5000
               },
               on: {
                   slideChangeTransitionStart: function(){
                     pagination_Swiper.slideTo(this.activeIndex+1, 750, false);
                     //console.log(this.activeIndex+1);//切换结束时，告诉我现在是第几个slide
                   },
               }
               // 如果需要前进后退按钮
               // navigation: {
               //   nextEl: '.myCarousel .swiper-button-next',
               //   prevEl: '.myCarousel .swiper-button-prev',
               // },
               
             }); 

            $('.myCarousel').mouseenter(function(event) {
              myCarousel_Swiper.autoplay.stop();
              //pagination_Swiper.autoplay.stop();
            });

            $('.myCarousel').mouseleave(function(event) {
              myCarousel_Swiper.autoplay.start();
              //pagination_Swiper.autoplay.start();
            });

            // $('.slide_pagination .swiper-button-prev').click(function(event) {
            //   myCarousel_Swiper.slidePrev();
            // });
            // $('.slide_pagination .swiper-button-next').click(function(event) {
            //   myCarousel_Swiper.slideNext();
            // });

            $('.slide_pagination .swiper-slide a').click(function(event) {
              var index=parseInt($(this).parent().attr('pagination-index'));
              myCarousel_Swiper.slideTo(index, 750, false);
            });
            /*--------- 一大三小新聞專題 END -----------*/















            /*------------------------ 熱門情報 輪播 --------------------------*/

            var news_Swiper = new Swiper ('.HotNews_slide.swiper-container', {
               speed:1000,
               loop:true,
               autoplay: {
                   disableOnInteraction:false,
                   delay: 5000
               },
               // 如果需要前进后退按钮
               navigation: {
                 nextEl: '.HotNews_slide .swiper-button-next',
                 prevEl: '.HotNews_slide .swiper-button-prev',
               }
              
              
             });  

            $('.HotNews_slide').mouseenter(function(event) {

             $(".HotNews_slide .swiper-button-prev").css('left', '0%');
             $(".HotNews_slide .swiper-button-next").css('right', '0%');
              news_Swiper.autoplay.stop();
            });

            $('.HotNews_slide').mouseleave(function(event) {

             $(".HotNews_slide .swiper-button-prev").css('left', '-15%');
             $(".HotNews_slide .swiper-button-next").css('right', '-15%');
              news_Swiper.autoplay.start();
            });

            /*------------------------ 熱門情報 輪播 END --------------------------*/













            /*--------- 分享 Bar 下拉 --------- */
            $('#arrow_btn').click(function(event) {

              var more_search_height=parseInt($('.more_search').css('height').slice(0, -2));
              if (more_search_height<=0) {
                TweenMax.to($('.more_search'), 0.3, { "height": "152px"});
              }
              else{
                TweenMax.to($('.more_search'), 0.3, { "height": "0px"});
              }
            });







            /*-- tab 切換功能 (首頁卡情報...) --*/
            $('.tab_list_div .tab_menu .menu a').mouseenter(function(event) {
              var tab_num= $(this).attr('tab-link');
              var tab_parent= $(this).parents('.tab_list_div');

              if (tab_num!=tab_parent.find('.content_tab .show').attr('tab')) {
                 TweenMax.fromTo(tab_parent.find('.content_tab [tab="'+tab_num+'"]'), 0.3, { opacity: '0'},{ opacity: '1'});
                 tab_parent.find('.tab_menu .menu a').removeClass('ms_enter');
                 $(this).addClass('ms_enter');                
              }

              tab_parent.find('.content_tab .row').removeClass('show');
              tab_parent.find('.content_tab [tab="'+tab_num+'"]').addClass('show');
              
            });









            /*-- 滑鼠經過切換Tab (右邊有LOGO的Tab) --*/
            $('.mouseHover_tab .nav-link').mouseenter(function(event) {
               $(this).parents('.mouseHover_tab').find('.nav-link').removeClass('active show');
               $(this).parents('.mouseHover_tab').find('.tab-pane').removeClass('active show');
               $(this).parents('.mouseHover_tab').find('.nav-link').attr('aria-selected', 'false');
               $(this).attr('aria-selected', 'true');
               $(this).addClass('active show');
               $($(this).attr('tab-target')).addClass('active show');

               if($(this).attr('aria-selected')=='true'){

                 $.each($(this).parent().parent().find('.nav-link'), function(index, val) {

                     if($(this).attr('aria-selected')=='true'){
                       var this_bgm=$(this).find('.icon').css('background-image').split('/');
                       this_bgm[5]='icon';
                       $(this).find('.icon').css('background-image', this_bgm.join('/'));

                     }
                     else{
                       var this_bgm=$(this).find('.icon').css('background-image').split('/');
                       this_bgm[5]='icon_down';
                       $(this).find('.icon').css('background-image', this_bgm.join('/'));
                     }
                 });
               }
            });

            /*-- 滑鼠經過切換Tab (右邊無LOGO的Tab) --*/
            $('.mouseHover_other_tab>ul>li>.nav-link').mouseenter(function(event) {
               $(this).parents('.mouseHover_other_tab').find('.nav-link').removeClass('active show');
               $(this).parents('.mouseHover_other_tab').find('.tab-pane').removeClass('active show');
               $(this).parents('.mouseHover_other_tab').find('.nav-link').attr('aria-selected', 'false');
               $(this).attr('aria-selected', 'true');
               $(this).addClass('active show');
               $($(this).attr('tab-target')).addClass('active show');

               //-- 例外 --
               $('.exception .nav-link').addClass('active show');
               $('.exception .tab-pane').addClass('active show');

               /*--- 右邊DIV跟隨功能(給予) ---*/
               get_right_div();

            });

            /*-- 滑鼠經過切換Tab (右邊無LOGO的Tab) --*/
            $('.mouseHover_other_tab2 .nav-link').mouseenter(function(event) {
               $(this).parents('.mouseHover_other_tab2').find('.nav-link').removeClass('active show');
               $(this).parents('.mouseHover_other_tab2').find('.tab-ones').removeClass('active show');
               $(this).parents('.mouseHover_other_tab2').find('.nav-link').attr('aria-selected', 'false');
               $(this).attr('aria-selected', 'true');
               $(this).addClass('active show');
               $($(this).attr('tab-target')).addClass('active show');

               /*--- 右邊DIV跟隨功能(給予) ---*/
               get_right_div();

            });










            /*-- 卡情報-單卡-百葉窗 --*/
            $('.imp_int .card-header .angle_down').click(function(event) {
              
              //-- 展開 --
              if ($(this).find('i').attr('class')=='fa fa-angle-down') {
                $('.imp_int .card-header .angle_down i').removeClass('fa-angle-down');
                $('.imp_int .card-header .angle_down i').removeClass('fa-angle-up');
                $('.imp_int .card-header .angle_down i').addClass('fa-angle-down');
                $(this).find('i').removeClass('fa-angle-down');
                $(this).find('i').addClass('fa-angle-up');
              }
              //-- 收合 --
              else{
                $(this).find('i').removeClass('fa-angle-up');
                $(this).find('i').addClass('fa-angle-down');
              }
            });








            /*-- 卡情報-線上辦卡 --*/

            $('.online_list li a').click(function(event) {
              if ($('.bank_div').attr('id')!=$(this).attr('bank_id')) {
                $('.online_list li a').removeClass('active');
                $(this).addClass('active');
                $.ajax({
                  url: '../cardNews/online_ajax.php',
                  type: 'POST',
                  dataType: 'json',
                  data: {
                    type:'online',
                    Tb_index: $(this).attr('bank_id')
                  },
                  success:function (data) {
                    
                    $('.bank_div').attr('id', data[0]['Tb_index']);
                    
                    //-- 立即辦卡-檔案 --
                    if (data[0]['bd_src']=='1') {
                      var path='../other_file/'+data[0]['bd_path'];
                    }
                    //-- 立即辦卡-連結 --
                    else if(data[0]['bd_src']=='2'){
                      var path=data[0]['bd_url'];
                    }

                    var bank_adds=data[0]['bi_addr'].split(',');
                        bank_adds=bank_adds[0]+bank_adds[1];

                    var txt='<div class="col-md-12">'+
                            '<div class="row onlinebg cardshap">'+
                              
                             '<div class="col-5 col hv-center">'+
                             '<div class="text-center">'+
                              '<img src="../sys/img/'+data[0]['bi_logo']+'" title="'+data[0]['bi_shortname']+'">'+
                              '<h6>銀行代碼：'+data[0]['bi_code']+'</h6>'+
                              '<a target="_blank" class="applycard_btn warning-layered btnOver" href="'+path+'">立即辦卡</a>'+
                              '</div>'+
                             '</div>'+
                             
                             '<div class="col-7 col">'+
                             '<h4>'+data[0]['bi_fullname']+'(簡稱'+data[0]['bi_shortname']+')</h4>'+
                             '<hr>'+
                             '<p>總行電話：'+data[0]['bi_tel']+' <br>'+           
                                '信用卡服務專線：'+data[0]['bi_tel_card']+'<br>'+
                                '總行地址：'+bank_adds+'<br>'+
                                '銀行網址：<a href="'+data[0]['bi_bank_url']+'">'+data[0]['bi_bank_url']+'</a>'+
                              '</p>'+
                             '</div>'+
                             
                           '</div>'+
                          '</div> ';
                    $('#bank_detial').html(txt);
                  }
                });
              }
            });
            /*-- 卡情報-線上辦卡 END --*/










          /*--------------------------------------------- 內頁轉寄、回報錯誤 fancybox ---------------------------------------------*/
          
          $('.close_fancybox').click(function(event) {
            parent.jQuery.fancybox.close();
          });
           
          /*--------------------------------------------- 內頁轉寄、回報錯誤 fancybox END ---------------------------------------------*/








          /*--------------------------------------------- 優旅行 日本嬉遊去 景點 ---------------------------------------------*/

          $('.map>div>div').mouseenter(function(event) {
            $(this).find('div').css('display', 'block');
          });

          $('.map>div>div').mouseleave(function(event) {
            $(this).find('div').css('display', 'none');
          });

          /*--------------------------------------------- 優旅行 日本嬉遊去 景點 END ---------------------------------------------*/








          /*---------------------------------------- 右邊DIV跟隨功能 -----------------------------------------*/
            if($(window).width()>768){

            //-- 右邊div頂部位置 --
            var right_div_top=$('.index-content-right').offset().top;
            //-- 前一個畫面位置 --
            var before_scrollTop=$(window).scrollTop();
            
            var x=1;

            //-- 卷軸監控 --
            $(window).bind('scroll resize', function() {

              //-- 目前畫面位置 --
              var after_scrollTop=$(window).scrollTop();
              //-- 判斷上下滑 --
              var delta = after_scrollTop - before_scrollTop;
              var scroll= delta>0 ? 'down':'top';
              //-- 畫面底部位置 --
              var view_bottom= after_scrollTop+$(this).height();
              //-- 右邊div底部位置 --
              var right_div_bottom=$('.index-content-right').offset().top + $('.index-content-right>.row').height();
              //-- 左邊div寬度 --
              var left_div_width=$('.index-content-left').width();


              // console.log('目前底高:'+view_bottom);
              // console.log('右div底高:'+right_div_bottom);
              // console.log($('.index-content-right').offset().top);

              // 網站抬頭高度：235px
              // 網站下滑後抬頭高度：87px

              if (after_scrollTop>=(235-87)) {

                //-- 向下 --
                if (scroll=='down') {

                  //-- 畫面底的高度大於右邊div --
                  if (view_bottom>=right_div_bottom) {

                    $('.index-content-right.move').css({
                      'position': 'fixed',
                      'margin-left': left_div_width+'px',
                      'transform': 'translate3d(0px, 0px, 0px)' ,
                      'bottom': '0px'
                    });
                    x=0;
                  }
                  else{

                    if (x<1) {
                      $('.index-content-right.move').css({
                       'position': 'absolute',
                       'margin-left': left_div_width+'px',
                       'transform': 'translate3d(0px, '+($('.index-content-right').offset().top-235)+'px, 0px)' ,
                       'top': 'auto',
                       'bottom': 'auto'
                      }); 
                      x++;
                    }
                  }
                }
                //-- 向上 --
                else{

                  //-- 畫面頂的高度小於右邊div --
                  if (after_scrollTop<=$('.index-content-right').offset().top-87) {

                    $('.index-content-right.move').css({
                      'position': 'fixed',
                      'margin-left': left_div_width+'px',
                      'transform': 'translate3d(0px, 0px, 0px)',
                      'top': '87px'
                    });

                    x=0;
                  }
                  else{

                    if (x<1) {
                      $('.index-content-right.move').css({
                       'position': 'absolute',
                       'margin-left': left_div_width+'px',
                       'transform': 'translate3d(0px, '+($('.index-content-right').offset().top-235)+'px, 0px)' ,
                       'top': 'auto',
                       'bottom': 'auto'
                      }); 

                      x++;
                    }
                  }
                }

              }
              else{

                $('.index-content-right.move').css({
                 'position': 'absolute',
                 'margin-left': left_div_width+'px',
                 'transform': 'translate3d(0px, 0px, 0px)',
                 'top': 'auto'
                }); 

              }

               before_scrollTop=after_scrollTop;
            });
           }
            /*---------------------------------------------------- 右邊DIV跟隨功能 END ------------------------------------------*/









            //--------------------------------------------------- 手機JS ----------------------------------------------------
            //--------------------------------------------------- 手機JS ----------------------------------------------------
            //--------------------------------------------------- 手機JS ----------------------------------------------------
            if ($(window).width()<=768) {

              //-- tag menu --
              var mySwiper = new Swiper ('#menu_bar.swiper-container', {
                 slidesPerView : 'auto',
                 freeMode : true,
              });  

               //-- Menu ---
              $('#menu').click(function(event) {
                TweenMax.to("#menu_list", 0.4, { left: '0%'});
              });

              $('.close_btn').click(function(event) {
                 TweenMax.to("#menu_list", 0.4, { left: '-100%'});
              });

              //-- search --
              $('.search_a').click(function(event) {
                 if ($('#search_bar').css('top')!='90px') {
                  TweenMax.to("#search_bar", 0.4, { top: '90px'});
                 }
                 else{
                  TweenMax.to("#search_bar", 0.4, { top: '0px'});
                 }
              });

              $('#search_bar .close_btn').click(function(event) {
                 TweenMax.to("#search_bar", 0.4, { top: '0px'});
              });
            }
            //--------------------------------------------------- 手機JS ----------------------------------------------------
            //--------------------------------------------------- 手機JS ----------------------------------------------------
            //--------------------------------------------------- 手機JS ----------------------------------------------------

            
        });


/*--- 網站LOAD完後-動作 ---*/
$(window).on('load', function(event) {

/*--- 右邊DIV跟隨功能(給予) ---*/
get_right_div();


});




/*==================== 右邊DIV跟隨功能(給予) ===========================*/
function get_right_div() {
  //-- 畫面高 --
var window_height=$(window).height();
//-- 左DIV高 --
var left_div_height=$('.index-content-left .row').height();
//-- 右DIV高 --
var right_div_height=$('.index-content-right .row').height();
//-- 左邊div寬度 --
var left_div_width=$('.index-content-left').width();


if (left_div_height>window_height && left_div_height>right_div_height) {
  $('.index-content-right').addClass('move');
  $('.index-content-right.move').css('margin-left', left_div_width+'px');

}
else{
  
  $('.index-content-right').attr('style', '');

if ($('.index-content-right').attr('style')!=undefined) {

  if($('.index-content-right').attr('style').indexOf('absolute')!=-1) {
    $('.index-content-right').removeClass('move');
  }
  else{
    $('.index-content-right').removeClass('move');
    $('.index-content-right').css('margin-left', '0px');
  }

}
  
 }
}

/*==================== 右邊DIV跟隨功能(給予) END ===========================*/




/*--- checkout 功能  ---*/
// =============================== 檢查input ====================================
function check_input(id,txt) {

         if($(id).length>0){
           
           //-- 核取方塊、選取方塊 --
           if ($(id).attr('type')=='radio' || $(id).attr('type')=='checkbox') {
             
             if($(id+':checked').val()==undefined){
              $(id).css('borderColor', 'red');
               return txt;
            }else{
               $(id).css('borderColor', 'rgba(0,0,0,0.1)');
               return "";
            }
           }

           else{
             if ($(id).val()=='') {
               $(id).css('borderColor', 'red');
               return txt;
            }else{
               $(id).css('borderColor', 'rgba(0,0,0,0.1)');
               return "";
            }
           }

         }
         else{
          return txt;
         }
          
  }
/*--- checkout 功能 END ---*/