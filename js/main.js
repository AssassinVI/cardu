//-- 廣告測試 --
var ary_cardu_ads = new Array();
        function add_cardu_ads(ad_url){
          ary_cardu_ads.push(ad_url);
        }
    
        if(ary_cardu_ads){
              $(document).ready(function() {
                for(i=0;i<ary_cardu_ads.length;i++){
                  var ad = document.createElement('script'); ad.type = 'text/javascript'; ad.async = true;
                  ad.src = ary_cardu_ads[i];
                  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ad, s);
                }
              });
            }




$(document).ready(function() {

            //--- 工具提示框 ---
            $('[data-toggle="tooltip"]').tooltip();
            //-- 百葉窗 --
            $('#new_card').collapse();

            //-- 首頁新卡訊 --
            $('#new_card .card .card-header').mouseenter(function(event) {
              $('#new_card '+$(this).find('button').attr('data-target')).collapse('show');
            });


           




            /*---------------- 信用卡快搜 ----------------------*/
            //-- 選擇銀行 --
            $('.c_search_bk').change(function(event) {

              //-- 選擇銀行，撈信用卡(ajax.js) --
              change_bk_cc('.c_search_bk', '.c_search_cc');
            });

            //-- 搜尋 --
            $('#c_search_btn').click(function(event) {

              var err_txt='';
              err_txt+=check_input('.c_search_bk','銀行、');
              err_txt+=check_input('.c_search_cc','信用卡、');

              if (err_txt!='') {
               err_txt=err_txt.slice(0,-1);
               alert("請選擇"+err_txt+"!!");
              }
              else{
                location.href='../card/type.php?bi_pk01='+$('.c_search_bk').val()+'&gid='+$('.c_search_cc').val();
              }
              
            });
            /*---------------------- 信用卡快搜 END ------------------------*/


            




            /*---------------- 權益快搜 ----------------------*/
            //-- 搜尋 --
            $('#int_search_btn').click(function(event) {

              var err_txt='';
              err_txt+=check_input('.int_search_item','比較條件');

              if (err_txt!='') {
               alert("請選擇"+err_txt+"!!");
              }
              else if($('.int_search_item:nth-child(1)').val()==$('.int_search_item:nth-child(2)').val()){
               alert("比較條件不可一樣，請重新選擇！");
              } 
              else{
                var href_txt='', x=1;
                $.each($('.int_search_item'), function(index, val) {
                  if ($(this).val()!='') {
                    href_txt+='ci_pk0'+x+'='+$(this).val()+'&';
                    x++;
                  }
                });
                href_txt=href_txt.slice(0,-1);
                location.href='../rank/profit_detail.php?'+href_txt;
              }
              
            });
            /*---------------- 權益快搜 END ------------------------*/



            //-- 卷軸監控回調 --
            var scroll_x=0;
            $(window).bind('scroll resize', function() {
              var top=$(this).scrollTop();

              //-- TOP出現 --
              if (top>50){
                if ($(window).width()>768) {
                  TweenMax.to($('.top_div'), 0.3, { bottom:'4%' , opacity:1, display:'block'});
                }
                else{
                  TweenMax.to($('.top_div'), 0.3, { bottom:'14%' , opacity:1, display:'block'});
                }
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
              if (top>0 && top<217) {
                $('.right-ad').css('top', 40);
                $('.left-ad').css('top', 40);
              }
              else if (top>217) {
                $('.right-ad').css('top', top-197);
                $('.left-ad').css('top', top-197);
              }
              else{
                $('.right-ad').css('top', 217);
                $('.left-ad').css('top', 217);
              }
            });
            //-- 卷軸監控回調 END --




            //-- TOP Btn --
            $('.top_div a').click(function(event) {
               $('html,body').animate({
                scrollTop:0
               },1000);
            });



            //---- 內頁訊息按鈕 ----
            $('.search_btn.message_btn').click(function(event) {
              $('html,body').animate({
                scrollTop: $('#message_area').offset().top-87
               },1000);
            });






            //-- 判斷目前頁面，並對MENU反白 --
            var now_url=location.href;
            $('#menu ul li').removeClass('active');

            if (now_url.indexOf("news/")>0) {
              $('#menu>ul>li:nth-child(1)').addClass('active');
              $('#menu>ul>li:nth-child(1)>a').css('color', '#223a8f');
            }
            else if (now_url.indexOf("rank/")>0) {
              $('#menu>ul>li:nth-child(2)').addClass('active');
              $('#menu>ul>li:nth-child(2)>a').css('color', '#223a8f');
            }
            else if (now_url.indexOf("card/")>0 || now_url.indexOf("message")>0) {
              $('#menu>ul>li:nth-child(3)').addClass('active');
              $('#menu>ul>li:nth-child(3)>a').css('color', '#223a8f');
            }
            else if (now_url.indexOf("pay/")>0) {
              $('#menu>ul>li:nth-child(4)').addClass('active');
              $('#menu>ul>li:nth-child(4)>a').css('color', '#223a8f');
            }
            else if (now_url.indexOf("ticket/")>0) {
              $('#menu>ul>li:nth-child(5)').addClass('active');
              $('#menu>ul>li:nth-child(5)>a').css('color', '#223a8f');
            }
            else if (now_url.indexOf("point/")>0) {
              $('#menu>ul>li:nth-child(6)').addClass('active');
              $('#menu>ul>li:nth-child(6)>a').css('color', '#223a8f');
            }
            else if (now_url.indexOf("travel/")>0) {
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







            //----------------- 信用卡、權益項目 ICON MouseOver/MouseOut ------------------------
            //-MouseOver-
            $('.ccard_icon_js').mouseenter(function(event) {
              if ($(this).attr('class').indexOf('active')==-1) {

                var src_url=$(this).find('img').attr('src').split('/');
                var src=src_url[src_url.length-1].split('.');
                    src[0]=src[0]+'_down';
                    src_url[src_url.length-1]=src.join('.');

                $(this).find('img').attr('src', src_url.join('/'));
              }
            });

            //-MouseOut-
            $('.ccard_icon_js').mouseleave(function(event) {
              if ($(this).attr('class').indexOf('active')==-1){
                var src_url=$(this).find('img').attr('src').split('/');
                var src=src_url[src_url.length-1].split('.');
                var src_old=src[0].split('_');
                    src[0]=src_old[0];
                    src_url[src_url.length-1]=src.join('.');


                $(this).find('img').attr('src', src_url.join('/'));
              }
            });


            //----------------- 信用卡、權益項目 ICON MouseOver END ------------------------






            

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
                    
                    if ($(this).find('.icon').length>0) {
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
            $.each($('.news_slide .swiper-container'), function(index, val) {
               
               $(this).addClass('index'+(index+1));
               window['news_slide'+(index+1)] = new Swiper ($(this), {
                  speed:750,
                  loop:true,
                  observer:true,
                  observeParents:true,
                  autoplay: {
                      disableOnInteraction:false,
                      delay: 5000
                  },

                  // 如果需要前进后退按钮
                  navigation: {
                    nextEl: '.news_slide .index'+(index+1)+' .swiper-button-next',
                    prevEl: '.news_slide .index'+(index+1)+' .swiper-button-prev',
                  },
                  // 如果需要分页器
                    pagination: {
                      el: '.news_slide .index'+(index+1)+' .swiper-pagination',
                      clickable :true
                 }
                });  

               slide_st_auto($(this), window['news_slide'+(index+1)]);
            });

             // var news_Swiper = new Swiper ('.news_slide .swiper-container', {
             //    speed:750,
             //    loop:true,
             //    autoplay: {
             //        disableOnInteraction:false,
             //        delay: 5000
             //    },
             //    // 如果需要前进后退按钮
             //    navigation: {
             //      nextEl: '.news_slide .swiper-button-next',
             //      prevEl: '.news_slide .swiper-button-prev',
             //    },
             //    // 如果需要分页器
             //        pagination: {
             //          el: '.news_slide .swiper-pagination',
             //          clickable :true
             //     }
             //  });  

             // slide_st_auto($('.news_slide'), news_Swiper);

             // $('.news_slide').mouseenter(function(event) {
             //  $(".news_slide .swiper-button-prev").css('left', '0%');
             //  $(".news_slide .swiper-button-next").css('right', '0%');
             //   news_Swiper.autoplay.stop();
             // });

             // $('.news_slide').mouseleave(function(event) {

             //  $(".news_slide .swiper-button-prev").css('left', '-7%');
             //  $(".news_slide .swiper-button-next").css('right', '-7%');
             //   news_Swiper.autoplay.start();
             // });
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
             slide_st_auto($('#iNewsR01'), card_news_Swiper1);

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
             slide_st_auto($('#iNewsR02'), card_news_Swiper2);

              // $('#iNewsR01').mouseenter(function(event) {
              //   $(this).find('.swiper-button-prev').css('left', '0%');
              //   $(this).find('.swiper-button-next').css('right', '0%');
              //   card_news_Swiper1.autoplay.stop();
                
              // });

              // $('#iNewsR01').mouseleave(function(event) {
              //   $(this).find('.swiper-button-prev').css('left', '-12%');
              //   $(this).find('.swiper-button-next').css('right', '-12%');
              //   card_news_Swiper1.autoplay.start();
              // });

              // $('#iNewsR02').mouseenter(function(event) {
              //   $(this).find('.swiper-button-prev').css('left', '0%');
              //   $(this).find('.swiper-button-next').css('right', '0%');
              //   card_news_Swiper2.autoplay.stop();
                
              // });

              // $('#iNewsR02').mouseleave(function(event) {
              //   $(this).find('.swiper-button-prev').css('left', '-12%');
              //   $(this).find('.swiper-button-next').css('right', '-12%');
              //   card_news_Swiper2.autoplay.start();
              // });
             /*-- 多專題-輪播 END --*/
            
             
            /*-- 卡排行 百葉窗 --*/
            $('.imp_int').on('click', '.card-header .angle_down', function(event) {
             
             var target_dom=$(this).attr('data-target');
             if ($(target_dom).attr('class').indexOf('collapsing')==-1){

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
             }
              
            });



            /*-- 卡排行版區 卡比較 --*/
            if ($('.swiper-container.searchRank_type').length>0){
              var srank_slidesPerView=$(window).width()>420 ? 3:1;
              var srank_slidesPerGroup=$(window).width()>420 ? 3:1;
              var srank_type_Swiper= new Swiper('.swiper-container.searchRank_type', {
                  slidesPerView : srank_slidesPerView,
                  slidesPerGroup : srank_slidesPerGroup,
                  speed:750,
                  autoplay: {
                      delay: 5000
                  },
                  // 如果需要前进后退按钮
                  navigation: {
                    nextEl: '.searchRank_type .swiper-button-next',
                    prevEl: '.searchRank_type .swiper-button-prev',
                  }
                 });
               
               //-- 隨機數 --
               var rand_index=getRandom(0,2);

               //-- 目前輪播位置 --
               srank_type_Swiper.slideTo(rand_index, 700, false);
            }
            






            /*-- 卡排行 卡總覽 用 輪播 --*/
            if ($('.ccard.slider .swiper-container').length>0){
              var cc_slidesPerView=$(window).width()>420 ? 3:2;
              var cc_slidesPerGroup=$(window).width()>420 ? 3:2;
              var ccard_Swiper = new Swiper ('.ccard.slider .swiper-container', {
                  slidesPerView : cc_slidesPerView,
                  slidesPerGroup : cc_slidesPerGroup,
                  speed:750,
                  loop:true,
                  // loopAdditionalSlides : 4,
                  autoplay: {
                      delay: 3000
                  },
                  // 如果需要前进后退按钮
                  navigation: {
                    nextEl: '.ccard.slider .swiper-button-next',
                    prevEl: '.ccard.slider .swiper-button-prev',
                  }
                }); 

              $('.ccard').mouseenter(function(event) {
                ccard_Swiper.autoplay.stop();
              });

              $('.ccard').mouseleave(function(event){
                ccard_Swiper.autoplay.start();
              });
            }
            


            
            
            /*-- 卡排行 --*/
            if ($('.card_rank .swiper-container').length>0) {

              var slide_num=$(window).width()>420 ? 6:3;
              var card_rank = new Swiper ('.card_rank .swiper-container', {
                  slidesPerView : slide_num,
                  slidesPerGroup : slide_num,
                  speed:750,
                  // 如果需要前进后退按钮
                  navigation: {
                    nextEl: '.card_rank .swiper-button-next',
                    prevEl: '.card_rank .swiper-button-prev',
                  }
                });   
              
              //-- 隨機數 --
              var index=$('[name="rand_num"]').val()==undefined ? 1: $('[name="rand_num"]').val();

              //-- 目前輪播位置 --
              card_rank.slideTo((index-1), 700, false);

              ccard_Swiper.removeAllSlides();

              $.ajax({
                url: '../ajax/rank_ajax.php',
                type: 'POST',
                dataType: 'json',
                data: {
                  type:'slide_6_rank',
                  ccs_cc_so_pk:  $('.card_rank .swiper-container .swiper-slide:nth-child('+index+')').attr('Tb_index')
                },
                success:function (data) {
                  var x=1;
                  $.each(data, function(index, val) {

                    var top_Medal=this['cc_so_show_order_icon']=='0' ? '' : '<span class="top_Medal">'+x+'</span>';

                    var txt='<div class="swiper-slide">'+
                                       '<div class="w-h-100 hv-center">'+
                                         '<a href="'+this['cc_url']+'" title="'+this['ccs_cc_cardname']+'">'+
                                         top_Medal+'<img src="../sys/img/'+this['cc_photo']+'" alt="'+this['ccs_cc_cardname']+'"><br>'+this['cc_shortname']+
                                         '</a>'+
                                       '</div>'+
                                   '</div>';
                    ccard_Swiper.appendSlide(txt);
                  x++;
                  });
                  ccard_Swiper.autoplay.start();
                  ccard_Swiper.slideToLoop(0, 750, false);
                }
              });


              var card_rank_time;
              $('.card_rank .swiper-slide').mouseenter(function(event) {
                
                var _this=$(this);
                //-- 延遲0.2S --
                card_rank_time=setTimeout(function () {
                  
                  ccard_Swiper.autoplay.stop();

                  //-- 舊icon還原 --
                  var old_img_arr=$('.card_rank .swiper-slide:nth-child('+index+')').find('img').attr('src').split('/');
                  var old_img=old_img_arr[old_img_arr.length-1].split('.');
                  var img_name_arr=old_img[0].split('_');
                  old_img_arr[old_img_arr.length-1]=img_name_arr[0]+'_'+img_name_arr[1]+'.'+old_img[1];
                  $('.card_rank .swiper-slide:nth-child('+index+')').find('img').attr('src', old_img_arr.join('/'));
                  $('.card_rank .swiper-slide').removeClass('active');
                  
                  //-- 新icon 換圖 --
                  var img_arr=_this.find('img').attr('src').split('/');
                  var img=img_arr[img_arr.length-1].split('.');
                  var new_img=img[0]+'_down';
                  img_arr[img_arr.length-1]=new_img+'.'+img[1];
                  _this.find('img').attr('src', img_arr.join('/'));
                  _this.addClass('active');

                  //-- 切換信用卡 --
                  if (_this.attr('index')!=index) {
                    ccard_Swiper.removeAllSlides();

                    $.ajax({
                      url: '../ajax/rank_ajax.php',
                      type: 'POST',
                      dataType: 'json',
                      data: {
                        type:'slide_6_rank',
                        ccs_cc_so_pk: _this.attr('Tb_index')
                      },
                      success:function (data) {
                        var x=1;
                        $.each(data, function(index, val) {

                          var top_Medal=this['cc_so_show_order_icon']=='0' ? '' : '<span class="top_Medal">'+x+'</span>';

                          var txt='<div class="swiper-slide">'+
                                             '<div class="w-h-100 hv-center">'+
                                               '<a href="'+this['cc_url']+'" title="'+this['ccs_cc_cardname']+'">'+
                                               top_Medal+'<img src="../sys/img/'+this['cc_photo']+'" alt="'+this['ccs_cc_cardname']+'"><br>'+this['cc_shortname']+
                                               '</a>'+
                                             '</div>'+
                                         '</div>';
                          ccard_Swiper.appendSlide(txt);
                        x++;
                        });
                        ccard_Swiper.autoplay.start();
                        ccard_Swiper.slideToLoop(0, 750, false);
                      }
                    });
                  }
                  index=_this.attr('index');

                  //-- 更改手機版More"顯示更多卡片" --
                  $('#rankcc_more_bot1').attr('href', 'cardrank.php?'+_this.attr('pk'));
                  
                },200);
                //-- 延遲0.2S END --
              });


              $('.card_rank .swiper-slide').mouseleave(function(event) {
                clearTimeout(card_rank_time);
              });

              
            }
            /*--- 卡排行 END ---*/













            /*-- 卡總覽 --*/
            if ($('.card_all .swiper-container').length>0) {
              
              var slide_num=$(window).width()>420 ? 6:3;
              var card_all_Swiper = new Swiper ('.card_all .swiper-container', {
                  slidesPerView : slide_num,
                  slidesPerGroup : slide_num,
                  speed:750,
                  // 如果需要前进后退按钮
                  navigation: {
                    nextEl: '.card_all .swiper-button-next',
                    prevEl: '.card_all .swiper-button-prev',
                  }
                });   

              // var ccard_Swiper = new Swiper ('.ccard .swiper-container', {
              //     slidesPerView : 3,
              //     slidesPerGroup : 3,
              //     loop:true,
              //     speed:750,
              //     autoplay: {
              //         delay: 5000
              //     },
              //     // 如果需要前进后退按钮
              //     navigation: {
              //       nextEl: '.ccard .swiper-button-next',
              //       prevEl: '.ccard .swiper-button-prev',
              //     }
              //   });   
              
              var index=$('[name="rand_num"]').val()==undefined ? 1: $('[name="rand_num"]').val();

              //-- 目前輪播位置 --
              card_all_Swiper.slideTo((index-1), 700, false);
              ccard_Swiper.removeAllSlides();
              $.ajax({
                      url: '../ajax/cardNews_ajax.php',
                      type: 'POST',
                      dataType: 'json',
                      data: {
                        type:'slide_6_card',
                        cc_fun_id: $('.card_all .swiper-container .swiper-slide:nth-child('+index+')').attr('fun_id')
                      },
                      success:function (data) {

                        var x=1;
                        $.each(data, function(index, val) {

                          var txt='<div class="swiper-slide">'+
                                             '<div class="w-h-100 hv-center">'+
                                               '<a href="'+this['cc_url']+'" title="'+this['cc_cardname_all']+'">'+
                                               '<img src="../sys/img/'+this['cc_photo']+'" alt="'+this['cc_cardname']+'"><br>'+this['cc_cardname']+
                                               '</a>'+
                                             '</div>'+
                                         '</div>';
                        ccard_Swiper.appendSlide(txt);
                        x++;
                        });
                        ccard_Swiper.autoplay.start();
                      }
              });

              //-- 顯示更多卡片按鈕 --
              if ($('#cc_more_btn2').length>0) {
                $('#cc_more_btn2').attr('href', 'card_browse.php?func='+$('.card_all .swiper-container .swiper-slide:nth-child('+index+')').attr('fun_id'));
              }
              

              var card_all_time;
              $('.card_all .swiper-slide').mouseenter(function(event) {
                  var _this=$(this);
                  //-- 延遲200 --
                  card_all_time=setTimeout(function () {
                    
                    //-- 舊icon還原 --
                    var old_img_arr=$('.card_all .swiper-slide:nth-child('+index+')').find('img').attr('src').split('/');
                    var old_img=old_img_arr[old_img_arr.length-1].split('.');
                    var img_name_arr=old_img[0].split('_');
                    old_img_arr[old_img_arr.length-1]=img_name_arr[0]+'.'+old_img[1];
                    $('.card_all .swiper-slide:nth-child('+index+')').find('img').attr('src', old_img_arr.join('/'));
                    $('.card_all .swiper-slide').removeClass('active');
                    
                    //-- 新icon 換圖 --
                    var img_arr=_this.find('img').attr('src').split('/');
                    var img=img_arr[img_arr.length-1].split('.');
                    var new_img=img[0]+'_down';
                    img_arr[img_arr.length-1]=new_img+'.'+img[1];
                    _this.find('img').attr('src', img_arr.join('/'));
                    _this.addClass('active');


                    //-- 切換信用卡 --
                    if (_this.attr('index')!=index) {
                      ccard_Swiper.removeAllSlides();

                      $.ajax({
                        url: '../ajax/cardNews_ajax.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                          type:'slide_6_card',
                          cc_fun_id: _this.attr('fun_id')
                        },
                        success:function (data) {

                          var x=1;
                          $.each(data, function(index, val) {

                            var txt='<div class="swiper-slide">'+
                                               '<div class="w-h-100 hv-center">'+
                                                 '<a href="'+this['cc_url']+'" title="'+this['cc_cardname_all']+'">'+
                                                 '<img src="../sys/img/'+this['cc_photo']+'" alt="'+this['cc_cardname']+'"><br>'+this['cc_cardname']+
                                                 '</a>'+
                                               '</div>'+
                                           '</div>';
                            ccard_Swiper.appendSlide(txt);
                          x++;
                          });
                          ccard_Swiper.autoplay.start();
                        }
                      });
                      
                      //-- 顯示更多卡片按鈕 --
                      $('#cc_more_btn2').attr('href', 'card_browse.php?func='+_this.attr('fun_id'));

                    }

                    index=_this.attr('index');

                  },200);
                  //-- 延遲200 END --
              });


              $('.card_all .swiper-slide').mouseleave(function(event) {
                clearTimeout(card_all_time);
              });

            }
            /*--- 卡總覽 END ---*/
 


            
            
            /*--- 卡總覽 內頁 ---*/
            if ($('.card_all_fun .swiper-container').length>0){
               var slide_num=$(window).width()>420 ? 8:4;
               var card_all_fun_Swiper = new Swiper ('.card_all_fun .swiper-container', {
                   slidesPerView : slide_num,
                   slidesPerGroup : slide_num,
                   observer:true,
                   observeParents:true,
                   speed:750,
                   // 如果需要前进后退按钮
                   navigation: {
                     nextEl: '.card_all_fun .swiper-button-next',
                     prevEl: '.card_all_fun .swiper-button-prev',
                   }
                 });  

               //-- 目前輪播位置 --
               $.each($('.card_all_fun .ccard_icon_js'), function(index, val) {
                  if ($(this).attr('class').indexOf('active')!=-1) {
                    card_all_fun_Swiper.slideTo((index), 700, false);
                  }
               });
               
            }
            /*--- 卡總覽 內頁 END ---*/




            /*--- 單卡 內頁 卡功能 ---*/
            if ($('.cc_fun .swiper-container').length>0) {
              var slide_num=$(window).width()>420 ? 6:5;
              var cc_fun_Swiper = new Swiper ('.cc_fun .swiper-container', {
                  slidesPerView : slide_num,
                  slidesPerGroup : slide_num,
                  observer:true,
                  observeParents:true,
                  speed:750,
                  // 如果需要前进后退按钮
                  navigation: {
                    nextEl: '.cc_fun .swiper-button-next',
                    prevEl: '.cc_fun .swiper-button-prev',
                  }
                });  
            }
            /*--- 單卡 內頁 卡功能 END ---*/


            /*--- 單卡 內頁 卡排行 ---*/
            if ($('.cc_rank .swiper-container').length>0) {
              var slide_num=$(window).width()>420 ? 2:2;
              var cc_rank_Swiper = new Swiper ('.cc_rank .swiper-container', {
                  slidesPerView : slide_num,
                  slidesPerGroup : slide_num,
                  observer:true,
                  observeParents:true,
                  speed:750,
                  // 如果需要前进后退按钮
                  navigation: {
                    nextEl: '.cc_rank .swiper-button-next',
                    prevEl: '.cc_rank .swiper-button-prev',
                  }
                });  
            }
            /*--- 單卡 內頁 卡排行 END ---*/

             















            /*--------- 一大三小新聞專題 -----------*/
            // var pagination_Swiper = new Swiper ('.slide_pagination .swiper-container', {
            //    direction : 'vertical',
            //    simulateTouch : false,//禁止鼠标模拟
            //    slidesPerView : 3,
            //    speed:750,
            //    loop:true,
            //    // 如果需要前进后退按钮
            //    navigation: {
            //      nextEl: '.slide_pagination .swiper-button-next',
            //      prevEl: '.slide_pagination .swiper-button-prev',
            //    }

            //  });

            // var myCarousel_Swiper = new Swiper ('.myCarousel .news_live .swiper-container', {
            //    speed:750,
            //    simulateTouch : false,//禁止鼠标模拟
            //    loop:true,
            //    autoplay: {
            //        disableOnInteraction:false,
            //        delay: 5000
            //    },
            //    on: {
            //        slideChangeTransitionStart: function(){
            //          pagination_Swiper.slideTo(this.activeIndex+1, 750, false);
            //          //console.log(this.activeIndex+1);//切换结束时，告诉我现在是第几个slide
            //        },
            //    }
            //    // 如果需要前进后退按钮
            //    // navigation: {
            //    //   nextEl: '.myCarousel .swiper-button-next',
            //    //   prevEl: '.myCarousel .swiper-button-prev',
            //    // },
               
            //  }); 

            // $('.myCarousel').mouseenter(function(event) {
            //   myCarousel_Swiper.autoplay.stop();
            //   //pagination_Swiper.autoplay.stop();
            // });

            // $('.myCarousel').mouseleave(function(event) {
            //   myCarousel_Swiper.autoplay.start();
            //   //pagination_Swiper.autoplay.start();
            // });

            // // $('.slide_pagination .swiper-button-prev').click(function(event) {
            // //   myCarousel_Swiper.slidePrev();
            // // });
            // // $('.slide_pagination .swiper-button-next').click(function(event) {
            // //   myCarousel_Swiper.slideNext();
            // // });

            // $('.slide_pagination .swiper-slide a').click(function(event) {
            //   var index=parseInt($(this).parent().attr('pagination-index'));
            //   myCarousel_Swiper.slideTo(index, 750, false);
            // });
            /*--------- 一大三小新聞專題 END -----------*/









            /*------------------------ 熱門情報 輪播 --------------------------*/
            hotNews_slide = new Swiper ('.HotNews_slide', {
                  speed:1000,
                  loop:true,
                  observer:true,
                  observeParents:true,
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

               slide_st_auto($('.HotNews_slide'), hotNews_slide);

            /*------------------------ 熱門情報 END --------------------------*/







            /*------------------------ 主題分類 六篇 輪播 --------------------------*/
             var x=1;
            $.each($('.sub_slide.swiper-container'), function(index, val) {
               
               window['sub_slide'+x] = new Swiper ($(this), {
                  speed:200,
                  loop:true,
                  observer:true,
                  observeParents:true,
                  autoplay: {
                      disableOnInteraction:false,
                      delay: 5000
                  },

                  // 如果需要前进后退按钮
                  navigation: {
                    nextEl: '.sub_slide .swiper-button-next',
                    prevEl: '.sub_slide .swiper-button-prev',
                  }
                });  

               slide_st_auto($(this), window['sub_slide'+x]);
               
               x++;
            });
            /*------------------------ 主題分類 六篇 輪播 END --------------------------*/







            /*------------------------ 主題分類 六篇 輪播 (電腦+手機) --------------------------*/
            var x=1;
            
            $.each($('.sub_slide2.swiper-container'), function(index, val) {
               
               var sub_slidesPerView=$(window).width()>420 ? 3:2;
               var sub_slidesPerGroup=$(window).width()>420 ? 3:1;
               window['sub_slide2_'+x] = new Swiper ($(this), {
                   slidesPerView : sub_slidesPerView,
                   slidesPerGroup : sub_slidesPerGroup,
                   speed:750,
                   loop:true,
                   autoplay: {
                       delay: 5000
                   },
                   // 如果需要前进后退按钮
                   navigation: {
                     nextEl: '.sub_slide2 .swiper-button-next',
                     prevEl: '.sub_slide2 .swiper-button-prev',
                   }
                 });  

                 slide_st_auto($(this), window['sub_slide2_'+x]);
                 window['sub_slide2_'+x].slideToLoop(0,700,false);

              x++;
            });
            
             /*------------------------ 主題分類 六篇 輪播 (電腦+手機) --------------------------*/









          

           /*---------------------------------- 卡總覽(顯示更多卡片) --------------------------------------------*/           
           
           $('.rank_more.card_more').click(function(event) {
             var _this=$(this);
             var show_num=$(this).attr('show_num');
             var card_browse_num=$(this).attr('now_num');
             var data={
               sr_num: card_browse_num,
               sr_num_plus : show_num,
               bank_id:_this.attr('bank_id')
             };
             
             //-- 判斷信用卡 OR 金融卡 --
             if (_this.attr('c_type')=='cc') {
               data['type']='rank_more_card_browse';
             }
             else{
               data['type']='rank_more_dcard_browse';
             }
             
             //-- 判斷功能卡 OR 權益優惠 --
             if (_this.attr('func_id')!=null) {
               data['func_id']=_this.attr('func_id');
             }
             else{
               data['pref_id']=_this.attr('pref_id');
             }

            
            $.ajax({
              url: '../ajax/cardNews_ajax.php',
              type: 'POST',
              data: data,
              success:function (data_txt) {

                //-- 判斷還有無資料 --
                if (data_txt=='') {
                  _this.css('display', 'none');
                }
                else{
                  _this.prev().append(data_txt);
                  _this.attr('now_num',parseInt(card_browse_num)+parseInt(show_num));
                }
              }
            });
           });

           /*---------------------------------- 卡總覽(顯示更多卡片) END --------------------------------------------*/











            /*--------- 分享 Bar 下拉 --------- */
            $('#arrow_btn').click(function(event) {

              var more_search_height=parseInt($('.more_search').css('height').slice(0, -2));
              if (more_search_height<=0) {
                TweenMax.to($('.more_search'), 0.3, { "height": "152px"});
                $('#arrow_btn i').removeClass('fa-angle-down');
                $('#arrow_btn i').addClass('fa-angle-up');
              }
              else{
                TweenMax.to($('.more_search'), 0.3, { "height": "0px"});
                $('#arrow_btn i').removeClass('fa-angle-up');
                $('#arrow_btn i').addClass('fa-angle-down');
              }
            });







            /*-- tab 切換功能 (首頁卡情報...) --*/
            var index_mouse_time;
            $('.tab_list_div .tab_menu .menu .newsType_a').mouseenter(function(event) {
              var _this=$(this);
              index_mouse_time=setTimeout(function () {

                var tab_num= _this.attr('tab-link');
                var tab_parent= _this.parents('.tab_list_div');
                
                //-- 判斷有無撈資料 --
                if (tab_parent.find('.news_list_div[tab="'+_this.attr('tab-link')+'"]').length<1) {
                  
                  var data={
                            type: 'news_tap_ch',
                            tab_link: _this.attr('tab-link')
                           };

                  if (_this.attr('nt_id')!=null) {
                    data['nt_id']=_this.attr('nt_id');
                  }
                  else{
                     data['un_id']=_this.attr('un_id');
                  }


                  $.ajax({
                    url: '../ajax/index_ajax.php',
                    type: 'POST',
                    data: data,
                    success:function (data) {
                      tab_parent.find('.content_tab').append(data);
                      add_sub_slide(tab_parent.find('.news_list_div[tab="'+_this.attr('tab-link')+'"] .sub_slide'));
                    }
                    
                  });
                }

                if (tab_num!=tab_parent.find('.content_tab .show').attr('tab')) {
                   TweenMax.fromTo(tab_parent.find('.content_tab [tab="'+tab_num+'"]'), 0.3, { opacity: '0'},{ opacity: '1'});
                   tab_parent.find('.tab_menu .menu .newsType_a').removeClass('ms_enter');
                   _this.addClass('ms_enter');

                }

                tab_parent.find('.content_tab .news_list_div').removeClass('show');
                tab_parent.find('.content_tab [tab="'+tab_num+'"]').addClass('show');

              },200);
            });

            $('.tab_list_div .tab_menu .menu .newsType_a').mouseleave(function(event) {
              clearTimeout(index_mouse_time);
            });
            /*-- tab 切換功能 (首頁卡情報...) END --*/






            /*-- tab 切換功能 (卡總覽-信用卡，卡總覽-金融卡) --*/
            var card_b_time;
            $('.tab_list_div .tab_menu .menu .card_browse').mouseenter(function(event) {
              var _this=$(this);
              card_b_time=setTimeout(function () {

                var tab_num= _this.attr('tab-link');
                var tab_parent= _this.parents('.tab_list_div');
                
                //-- 判斷有無撈資料 --
                if (tab_parent.find('.card_browse_list[tab="'+_this.attr('tab-link')+'"]').length<1) {
                  
                  var data={
                            type: 'news_tap_ch',
                            tab_link: _this.attr('tab-link')
                           };

                  if (_this.attr('nt_id')!=null) {
                    data['nt_id']=_this.attr('nt_id');
                  }
                  else{
                     data['un_id']=_this.attr('un_id');
                  }


                  // $.ajax({
                  //   url: '../ajax/index_ajax.php',
                  //   type: 'POST',
                  //   data: data,
                  //   success:function (data) {
                  //     tab_parent.find('.content_tab').append(data);
                  //     add_sub_slide(tab_parent.find('.news_list_div[tab="'+_this.attr('tab-link')+'"] .sub_slide'));
                  //   }
                  // });
                }


                if (tab_num!=tab_parent.find('.content_tab .show').attr('tab')) {
                   TweenMax.fromTo(tab_parent.find('.content_tab [tab="'+tab_num+'"]'), 0.3, { opacity: '0'},{ opacity: '1'});
                   tab_parent.find('.tab_menu .menu .card_browse').removeClass('ms_enter');
                   _this.addClass('ms_enter');                
                }

                tab_parent.find('.content_tab .news_list_div').removeClass('show');
                tab_parent.find('.content_tab [tab="'+tab_num+'"]').addClass('show');

              },200);
            });

            $('.tab_list_div .tab_menu .menu .card_browse').mouseleave(function(event) {
              clearTimeout(card_b_time);
            });
            /*-- tab 切換功能 (卡總覽-信用卡，卡總覽-金融卡) END --*/








            /*-- 滑鼠經過切換Tab (右邊有LOGO的Tab) --*/
            var mouse_time;
            $('.mouseHover_tab .nav-link').mouseenter(function(event) {
               var _this=$(this);
               mouse_time=setTimeout(function () {
                 _this.parents('.mouseHover_tab').find('.nav-link').removeClass('active show');
                 _this.parents('.mouseHover_tab').find('.tab-pane').removeClass('active show');
                 _this.parents('.mouseHover_tab').find('.nav-link').attr('aria-selected', 'false');
                 _this.attr('aria-selected', 'true');
                 _this.addClass('active show');
                 $(_this.attr('tab-target')).addClass('active show');

                 if(_this.attr('aria-selected')=='true'){

                   $.each(_this.parent().parent().find('.nav-link'), function(index, val) {

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
               },200);
               
            });
            $('.mouseHover_tab .nav-link').mouseleave(function(event) {
              clearTimeout(mouse_time);
            });


            /*-- 滑鼠經過切換Tab (右邊無LOGO的Tab) --*/
            var mouse_other_time;
            $('.mouseHover_other_tab>ul>li>.nav-link').mouseenter(function(event) {
              var _this=$(this);
              mouse_other_time=setTimeout(function () {
                _this.parents('.mouseHover_other_tab').find('.nav-link').removeClass('active show');
                _this.parents('.mouseHover_other_tab').find('.tab-pane').removeClass('active show');
                _this.parents('.mouseHover_other_tab').find('.nav-link').attr('aria-selected', 'false');
                _this.attr('aria-selected', 'true');
                _this.addClass('active show');
                $(_this.attr('tab-target')).addClass('active show');

                //-- 例外 --
                $('.exception .nav-link').addClass('active show');
                $('.exception .tab-pane').addClass('active show');

                /*--- 右邊DIV跟隨功能(給予) ---*/
                get_right_div();
                
                /*--- 更新slide ---*/
                if (_this.attr('slide_id')!=null) {
                  window[_this.attr('slide_id')].update();
                }
                

              },200);
               
            });
            $('.mouseHover_other_tab>ul>li>.nav-link').mouseleave(function(event) {
              clearTimeout(mouse_other_time);
            });


            /*-- 滑鼠經過切換Tab (右邊無LOGO的Tab) --*/
            var mouse_other_time2;
            $('.mouseHover_other_tab2 .nav-link').mouseenter(function(event) {
               var _this=$(this);
               mouse_other_time2=setTimeout(function () {
                 _this.parents('.mouseHover_other_tab2').find('.nav-link').removeClass('active show');
                 _this.parents('.mouseHover_other_tab2').find('.tab-ones').removeClass('active show');
                 _this.parents('.mouseHover_other_tab2').find('.nav-link').attr('aria-selected', 'false');
                 _this.attr('aria-selected', 'true');
                 _this.addClass('active show');
                 $(_this.attr('tab-target')).addClass('active show');

                 /*--- 右邊DIV跟隨功能(給予) ---*/
                 get_right_div();
               },200);
            });

            $('.mouseHover_other_tab2 .nav-link').mouseleave(function(event) {
              clearTimeout(mouse_other_time2);
            });





            /*-- 卡情報-單卡-訊息按鈕 --*/
            $('.cc_message_btn').click(function(event) {
              
              $('html,body').animate({
                scrollTop: $('#special_4-tab').offset().top-87
               },1000);

              $('.mouseHover_other_tab').find('.nav-link').removeClass('active show');
              $('.mouseHover_other_tab').find('.tab-pane').removeClass('active show');
              $('.mouseHover_other_tab').find('.nav-link').attr('aria-selected', 'false');
              $('#special_4-tab').attr('aria-selected', 'true');
              $('#special_4-tab').addClass('active show');
              $($('#special_4-tab').attr('tab-target')).addClass('active show');
            });


           

           /*-- 卡情報-單卡-卡組織 --*/
           if ($(window).width()<=768) {
            $('.oneCard_org>a').attr('href', 'javascript:;');
           }

           $('.oneCard_org').mouseenter(function(event) {
             $('.oneCard_org').removeClass('active');
             $(this).addClass('active');
           });

           $('.oneCard_org').parent().mouseleave(function(event) {
             $('.oneCard_org').removeClass('active');
             $('[now_card="active"]').addClass('active');
           });
            





            /*-- 卡情報-單卡-百葉窗 --*/

            $('.ccd_interest .angle_down').click(function(event) {
              var target_dom=$(this).attr('data-target');
              if ($(target_dom).attr('class').indexOf('collapsing')==-1) {

                if ($(this).find('i').attr('class')=='fa fa-angle-down') {
                  $(this).find('i').removeClass('fa-angle-down');
                  $(this).find('i').addClass('fa-angle-up');
                }
                else{
                  $(this).find('i').removeClass('fa-angle-up');
                  $(this).find('i').addClass('fa-angle-down');
                }
              }
              
              
            });

            // $('.imp_int').on('click', '.card-header .angle_down', function(event) {

            //   //-- 展開 --
            //   if ($(this).find('i').attr('class')=='fa fa-angle-down') {
            //     $('.imp_int .card-header .angle_down i').removeClass('fa-angle-down');
            //     $('.imp_int .card-header .angle_down i').removeClass('fa-angle-up');
            //     $('.imp_int .card-header .angle_down i').addClass('fa-angle-down');
            //     $(this).find('i').removeClass('fa-angle-down');
            //     $(this).find('i').addClass('fa-angle-up');
            //   }
            //   //-- 收合 --
            //   else{
            //     $(this).find('i').removeClass('fa-angle-up');
            //     $(this).find('i').addClass('fa-angle-down');
            //   }
              
            // });








            /*-- 卡情報-單卡-權益比一比 --*/
            //- 權益比一比 -
            $('#profit_compare').click(function(event) {
              if ($('[name="imp_check"]:checked').length<1) {
                alert('最少選擇一項權益');
              }
              else{
                var get_txt='';
                $.each($('[name="imp_check"]:checked'), function(index, val) {
                   get_txt+='ci_pk0'+(index+1)+'='+$(this).val()+'&';
                });
                get_txt=get_txt.slice(0,-1);
                
                location.href="/rank/profit_detail.php?"+get_txt;
              }
            });

            $('[name="imp_check"]').click(function(event) {
              if ($('[name="imp_check"]:checked').length>3) {
                alert('最多選擇三項權益');
                event.preventDefault();
              }
            });

            //- 清除 -
            $('#profit_clean').click(function(event) {
              $('[name="imp_check"]').prop('checked', false);
            });


            //- 全部權益-權益比一比 -
            $('#all_profit_compare').click(function(event) {
              if ($('[name="all_profit"]:checked').length<1) {
                alert('最少選擇一項權益');
              }
              else{
                var get_txt='';
                $.each($('[name="all_profit"]:checked'), function(index, val) {
                   get_txt+='ci_pk0'+(index+1)+'='+$(this).val()+'&';
                });

                get_txt=get_txt.slice(0,-1);
                
                location.href="/rank/profit_detail.php?"+get_txt;
              }
            });

            $('[name="all_profit"]').click(function(event) {
              if ($('[name="all_profit"]:checked').length>3) {
                alert('最多選擇三項權益');
                event.preventDefault();
              }
            });


            //- 全部權益-清除 -
            $('#all_profit_clean').click(function(event) {
              $('[name="all_profit"]').prop('checked', false);
            });







            /*-- 卡情報-線上辦卡 --*/

            $('.online_list li a').click(function(event) {
              if ($('.bank_div').attr('id')!=$(this).attr('bank_id')) {
                $('.online_list li a').removeClass('active');
                $(this).addClass('active');
                $.ajax({
                  url: '../ajax/cardNews_ajax.php',
                  type: 'POST',
                  data: {
                    type:'online',
                    Tb_index: $(this).attr('bank_id')
                  },
                  success:function (data) {
                    
                    $('.online_div').html(data);
                  }
                });
              }
            });
            /*-- 卡情報-線上辦卡 END --*/








            //--------------------------- 集點商店 分類切換 ---------------------------------
            if ($('.Darkbrown_tab .sm_type').length>0) {
              
              //-- 撈主分類 --
              $.ajax({
                url: '../ajax/global_ajax.php',
                type: 'POST',
                data: {
                  type: 'sm_type'
                },
                success:function (data) {
                  $('.Darkbrown_tab .sm_type').append(data);
                }
              });

              //-- 撈全部商店 --
              $.ajax({
                    url: '../ajax/global_ajax.php',
                    type: 'POST',
                    data: {
                    type: 'store',
                    sm_type_id: $(this).val()
                  },
                  success:function (data) {
                     $('.store_div').html(data);
                  }
                  });
              

              //-- 主分類切換 --
              $('.Darkbrown_tab .sm_type').change(function(event) {
                
                $.ajax({
                    url: '../ajax/global_ajax.php',
                    type: 'POST',
                    data: {
                    type: 'ss_type',
                    sm_type_id: $(this).val()
                  },
                  success:function (data) {
                    $('.Darkbrown_tab .ss_type').html('<option value="">-- 全部 --</option>');
                    $('.Darkbrown_tab .ss_type').append(data);
                  }
                  });

                $.ajax({
                    url: '../ajax/global_ajax.php',
                    type: 'POST',
                    data: {
                    type: 'store',
                    sm_type_id: $(this).val()
                  },
                  success:function (data) {
                     $('.store_div').html(data);
                  }
                  });
              });
              

              //-- 次分類切換 --
              $('.Darkbrown_tab .ss_type').change(function(event) {
                
                $.ajax({
                    url: '../ajax/global_ajax.php',
                    type: 'POST',
                    data: {
                    type: 'store',
                    sm_type_id: $('.Darkbrown_tab .sm_type').val(),
                    ss_type_id: $(this).val()
                  },
                  success:function (data) {
                     $('.store_div').html(data);
                  }
                  });
              });
              
            }










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



          /*--------------------------------------------- 會員 ---------------------------------------------*/

          //-- 生日日期 --
          if ($('.datepicker').length>0) {
            $('.datepicker').datepicker({
                dateFormat: "yy-mm-dd",
                yearRange: "-100:+0",
                maxDate:"0",
                changeMonth: true,
                changeYear: true,
                dayNamesMin :["日","一","二","三","四","五","六"],
                dayNames :["日","一","二","三","四","五","六"],
                monthNamesShort  :["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"]
            });
          }


          //-- 繳款期間日期 --
          if ($('.datepicker_range').length>0) {
            
            var from= $('.datepicker_range.from' ).datepicker({
                      dateFormat: "yy-mm-dd",
                      yearRange: "-10:+1",
                      changeMonth: true,
                      changeYear: true,
                      dayNamesMin :["日","一","二","三","四","五","六"],
                      dayNames :["日","一","二","三","四","五","六"],
                      monthNamesShort  :["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"]
                    })
                    .on( "change", function() {
                      to.datepicker( "option", "minDate", $(this).val());
                    });

           var to= $('.datepicker_range.to').datepicker({
                    dateFormat: "yy-mm-dd",
                    yearRange: "-10:+1",
                    changeMonth: true,
                    changeYear: true,
                    dayNamesMin :["日","一","二","三","四","五","六"],
                    dayNames :["日","一","二","三","四","五","六"],
                    monthNamesShort  :["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"]
                  })
                  .on( "change", function() {
                    from.datepicker( "option", "maxDate", $(this).val());
                  });

            if ($('.datepicker_range.form' ).val()!='') {
              to.datepicker( "option", "minDate", $('.datepicker_range.from' ).val());
              $('.datepicker_range.from' ).val();
            }

            if ($('.datepicker_range.to' ).val()!='') {
              from.datepicker( "option", "maxDate", $('.datepicker_range.to' ).val());
              $('.datepicker_range.to' ).val();
            }
          
          }
          

          //-- 地址 --
          if ($('#twzipcode').length>0){
            $('#twzipcode').twzipcode({
              'css': ['form-control mr-2', 'form-control mr-2', 'form-control']
            });
          }





          /*==================== 會員留言 ===========================*/

          if ($('.discuss_div').length>0) {
            //-- 讀取會員留言 --
            mem_discuss();
          }

          if ($('#leave_msg_btn').length>0) {
           
            $('#leave_msg_btn').click(function(event) {

              if ($('#leave_msg_txt').val()=='' || $('#leave_msg_txt').val().search(/^(?:[^\#|\$|\%|\^|\&|\*|\(|\)|\=|\+|\{|\}|\"|\'|\<|\>]+)$/)==-1) {
                alert("留言板欄位為空值或是帶有特殊符號");
                $('#leave_msg_txt').css('borderColor', 'red');
              }
              else if ($('#leave_msg_txt').val().length<15) {
                alert('請輸入15字以上留言');
              }
              else{
                $.ajax({
                  url: '../ajax/member_ajax.php',
                  type: 'POST',
                  data: {
                    type: 'discuss',
                    ds_type_pk: $('[name="ds_type_pk"]').val(),
                    ds_content: $('#leave_msg_txt').val()
                  },
                  success:function (data) {
                    alert('留言成功');
                    $('#leave_msg_txt').val('');
                    mem_discuss();
                  },
                  error: function (xhr) {
                    alert("錯誤提示： " + xhr.status + " " + xhr.statusText+" 請盡速與我們聯絡，我們將盡快處理");
                  }
                });
                
              }
            });
          }
          /*==================== 會員留言 END ===========================*/



          
          /*==================== 編輯會員留言 ===========================*/

          $('.discuss_div').on('click', '.d_mem_edit .edit', function(event) {
            var edit_p=$(this).parent().prev().find('p:nth-child(2)').html();
                edit_p=edit_p.replace('<br>','\r');
            $('.d_mem_edit').css('display', 'none');
            $(this).parent().css('display', 'block');
            $(this).parent().prev().find('p:nth-child(2)').remove();
            $(this).parent().prev().find('p:nth-child(1)').after('<textarea rows="5">'+edit_p+'</textarea>');
            $(this).parent().html('<a href="javascript:;" class="confirm_edit text-info" title="確定修改留言"><i class="fa fa-check"></i></a>｜'+
                                  '<a href="javascript:;" class="close_edit text-danger" title="取消修改留言"><i class=" fa fa-close"></i></a>');
            
          });

          /*==================== 編輯會員留言 END ===========================*/




          /*==================== 取消編輯會員留言 ===========================*/

          $('.discuss_div').on('click', '.d_mem_edit .close_edit', function(event) {
            var edit_p=$(this).parent().prev().find('textarea').val();
                edit_p=edit_p.replace('\n','<br>');
            $(this).parent().prev().find('textarea').remove();
            $(this).parent().prev().find('p:nth-child(1)').after('<p class="mb-0">'+edit_p+'</p>');
            $(this).parent().html('<a href="javascript:;" class="edit" title="編輯留言"><i class="fa fa-edit"></i></a>');
            $('.d_mem_edit').css('display', 'block');
          });

          /*==================== 取消編輯會員留言 END ===========================*/




          /*==================== 修改編輯會員留言 ===========================*/

          $('.discuss_div').on('click', '.d_mem_edit .confirm_edit ', function(event) {
            var _this=$(this);
            var ds_content_DOM=$(this).parent().prev().find('textarea');

            if (ds_content_DOM.val()=='' || ds_content_DOM.val().search(/^(?:[^\#|\$|\%|\^|\&|\*|\(|\)|\=|\+|\{|\}|\"|\'|\<|\>]+)$/)==-1) {
              alert("留言板欄位為空值或是帶有特殊符號");
              ds_content_DOM.css('borderColor', 'red');
            }
            else if (ds_content_DOM.val().length<15) {
              alert('請輸入15字以上留言');
            }
            else{
              $.ajax({
                url: '../ajax/member_ajax.php',
                type: 'POST',
                data: {
                  type: 'edit_discuss',
                  ds_pk: _this.parent().next().next().val(),
                  ds_content: ds_content_DOM.val()
                },
                success:function (data) {
                  alert('修改留言成功');
                  $('.d_mem_edit').css('display', 'block');
                  mem_discuss();
                },
                error: function (xhr) {
                  alert("錯誤提示： " + xhr.status + " " + xhr.statusText+" 請盡速與我們聯絡，我們將盡快處理");
                }
              });
            }
            
          });

          /*==================== 修改編輯會員留言 END ===========================*/




          /*==================== 回覆會員留言 ===========================*/

          $('.discuss_div').on('click', '.d_mem_edit .reply', function(event) {            
            var _this=$(this);
            $.ajax({
              url: '../ajax/member_ajax.php',
              type: 'POST',
              dataType: 'json',
              data: {
                type: 'reply_mem'
                
              },
              success:function (data) {
                 var reply_name=_this.parent().prev().find('.d_mem_name').html();
                 var ud_photo=data['ud_photo']=='' ? '../img/component/user.png':'../sys/img/'+data['ud_photo'];
                 var txt='<div class="mb-2 position-relative">'+
                            '<div class="d_mem_img mr-1">'+
                             '<img src="'+ud_photo+'">'+
                            '</div>'+
                            '<div class="d_mem_txt">'+
                              '<p class="mb-0">'+data['ud_nickname']+' 回覆給 '+reply_name+'</p>'+
                              '<textarea rows="5"></textarea>'+
                           '</div>'+
                           '<div class="d_mem_edit">'+
                              '<a href="javascript:;" class="confirm_reply text-info" title="確定回覆"><i class="fa fa-check"></i></a>｜'+
                              '<a href="javascript:;" class="close_reply text-danger" title="取消回覆"><i class=" fa fa-close"></i></a>'+
                            '</div>'+
                          '</div>';

                _this.parent().next().find('.edit_reply').html(txt);
              },
              error: function (xhr) {
                alert("錯誤提示： " + xhr.status + " " + xhr.statusText+" 請盡速與我們聯絡，我們將盡快處理");
              }
            });
            
            $('.d_mem_edit').css('display', 'none');
          });

          /*==================== 回覆會員留言 END ===========================*/






          /*==================== 引言回覆會員留言 ===========================*/

          $('.discuss_div').on('click', '.d_mem_edit .reply_q', function(event) {            
            var _this=$(this);
            $.ajax({
              url: '../ajax/member_ajax.php',
              type: 'POST',
              dataType: 'json',
              data: {
                type: 'reply_mem'
                
              },
              success:function (data) {
                 var to_name=_this.parent().prev().find('.d_mem_name').html();
                 var to_cotent=_this.parent().prev().find('p:nth-child(2)').html();
                     to_cotent=to_cotent.replace('<br>','\r');
                     to_cotent=to_cotent.length>15 ? to_cotent.slice(0, 15)+'...恕刪':to_cotent;
                 var ud_photo=data['ud_photo']=='' ? '../img/component/user.png':'../sys/img/'+data['ud_photo'];
                 var txt='<div class="mb-2 position-relative">'+
                            '<div class="d_mem_img mr-1">'+
                             '<img src="'+ud_photo+'">'+
                            '</div>'+
                            '<div class="d_mem_txt">'+
                              '<p class="mb-0">'+data['ud_nickname']+' 回覆給 '+to_name+'</p>'+
                              '<textarea rows="5">'+'---------------------------------------- \n ['+to_name+'寫道]'+to_cotent+' \n ----------------------------------------'+'</textarea>'+
                           '</div>'+
                           '<div class="d_mem_edit">'+
                              '<a href="javascript:;" class="confirm_reply text-info" title="確定回覆"><i class="fa fa-check"></i></a>｜'+
                              '<a href="javascript:;" class="close_reply text-danger" title="取消回覆"><i class=" fa fa-close"></i></a>'+
                            '</div>'+
                          '</div>';

                _this.parent().next().find('.edit_reply').html(txt);
              },
              error: function (xhr) {
                alert("錯誤提示： " + xhr.status + " " + xhr.statusText+" 請盡速與我們聯絡，我們將盡快處理");
              }
            });
            
            $('.d_mem_edit').css('display', 'none');
          });

          /*==================== 引言回覆會員留言 END ===========================*/



         

         /*==================== 確定編輯回覆留言 ===========================*/

         $('.discuss_div').on('click', '.d_mem_edit .confirm_reply ', function(event) {
           var _this=$(this);
           var ds_content_DOM=$(this).parent().prev().find('textarea');

           if (ds_content_DOM.val()=='' || ds_content_DOM.val().search(/^(?:[^\#|\$|\%|\^|\&|\*|\(|\)|\=|\+|\{|\}|\"|\'|\<|\>]+)$/)==-1) {
             alert("回覆留言板欄位為空值或是帶有特殊符號");
             ds_content_DOM.css('borderColor', 'red');
           }
           else if (ds_content_DOM.val().length<15) {
             alert('請輸入15字以上留言');
           }
           else{
             $.ajax({
               url: '../ajax/member_ajax.php',
               type: 'POST',
               data: {
                 type: 'reply_discuss',
                 ds_parent: _this.parents('.reply_txt').next().val(),
                 ds_type_pk:$('[name="ds_type_pk"]').val() ,
                 ds_content: ds_content_DOM.val()
               },
               success:function (data) {
                 alert('回覆留言成功');
                 mem_discuss();
               },
               error: function (xhr) {
                 alert("錯誤提示： " + xhr.status + " " + xhr.statusText+" 請盡速與我們聯絡，我們將盡快處理");
               }
             });
           }
           
         });

         /*==================== 確定編輯回覆留言 END ===========================*/





          /*==================== 取消編輯回覆留言 ===========================*/

          $('.discuss_div').on('click', '.d_mem_edit .close_reply', function(event) {
            $(this).parent().parent().html('');
            $('.d_mem_edit').css('display', 'block');
          });

          /*==================== 取消編輯回覆留言 END ===========================*/







          
          /*--------------------------------------------- 會員 END ---------------------------------------------*/




          /*---------------------------------------- 右邊DIV跟隨功能 -----------------------------------------*/
          //-- 畫面高 --
          var window_height=$(window).height();
          //-- 左DIV高 --
          var left_div_height=$('.index-content-left .row').height();
          //-- 右DIV高 --
          var right_div_height=$('.index-content-right .row').height();

            if($(window).width()>768 && left_div_height>window_height && left_div_height>right_div_height){

            //-- 右邊div頂部位置 --
            //var right_div_top=$('.index-content-right').offset().top;
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
              var menu_Swiper = new Swiper ('#menu_bar.swiper-container', {
                 slidesPerView : 'auto',
                 freeMode : true,
              });  


               /*--- 顯示目前版區(手機) ---*/
                var area_name=location.pathname.split('/');
                area_name=area_name[1];
                if (area_name=='message') {
                  $('#menu_bar [area_name="card"]').addClass('active');
                }else{
                  $('#menu_bar [area_name="'+area_name+'"]').addClass('active');
                }
                $.each($('#menu_bar .swiper-slide'), function(index, val) {
                   if ($(this).attr('class').indexOf('active')!=-1) {
                     menu_Swiper.slideTo(index, 700, false);
                   }
                });
                /*--- 顯示目前版區(手機) END ---*/


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



              /*------------------------ 主題分類 六篇 輪播 --------------------------*/
             var x=1;
            $.each($('.sub_ph_slide.swiper-container'), function(index, val) {
               
               window['sub_ph_slide'+x] = new Swiper ($(this), {
                  speed:750,
                  loop:true,
                  observer:true,
                  observeParents:true,
                  autoplay: {
                      disableOnInteraction:false,
                      delay: 5000
                  },

                  // 如果需要前进后退按钮
                  navigation: {
                    nextEl: '.sub_ph_slide .swiper-button-next',
                    prevEl: '.sub_ph_slide .swiper-button-prev',
                  }
                });  

               slide_st_auto($(this), window['sub_ph_slide'+x]);
               
               x++;
            });
            /*------------------------ 主題分類 六篇 輪播 END --------------------------*/
            }
            //--------------------------------------------------- 手機JS ----------------------------------------------------
            //--------------------------------------------------- 手機JS ----------------------------------------------------
            //--------------------------------------------------- 手機JS ----------------------------------------------------

            
        });




/*--------------------------------- 網站LOAD完後-動作 -----------------------------------------*/
$(window).on('load', function(event) {

/*--- 右邊DIV跟隨功能(給予) ---*/
get_right_div();

});
/*--------------------------------- 網站LOAD完後-動作 END -----------------------------------------*/








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








/*============================== 給予sub_slide ====================================*/
function add_sub_slide(DOM) {
  var DOM_num=$('.sub_slide.swiper-container').length;

  window['sub_slide'+(DOM_num+1)] = new Swiper (DOM, {
     speed:200,
     loop:true,
     observer:true,
     observeParents:true,
     autoplay: {
         disableOnInteraction:false,
         delay: 5000
     },

     // 如果需要前进后退按钮
     navigation: {
       nextEl: '.sub_slide .swiper-button-next',
       prevEl: '.sub_slide .swiper-button-prev',
     }
   });  

  slide_st_auto(DOM, window['sub_slide'+(DOM_num+1)]);
}





/*============================== 滑鼠經過暫停自動輪播 ====================================*/
function slide_st_auto(DOM, id) {
      
      DOM.mouseenter(function(event) {

       DOM.find(".swiper-button-prev").css('left', '0%');
       DOM.find(".swiper-button-next").css('right', '0%');
       id.autoplay.stop();
      });

       DOM.mouseleave(function(event) {

        DOM.find(".swiper-button-prev").css('left', '-15%');
        DOM.find(".swiper-button-next").css('right', '-15%');
        id.autoplay.start();
       });
}
/*============================== 滑鼠經過暫停自動輪播 END ====================================*/





//======================= 內文圖片 alt 轉圖說 加入fancybox ==========================
function img_txt(dom_id) {
   
    $.each($(dom_id), function(index, val) {

      //-- 手機板加入fancybox --
      if ($(window).width()<768) {
        var img_html='<a href="'+$(this).attr('src')+'" data-fancybox><i class="img_zoonOut fa fa-search"></i> <img src="'+$(this).attr('src')+'" alt="'+$(this).attr('alt')+'"></a>';
      }
      else{
        var img_html='<img src="'+$(this).attr('src')+'" alt="'+$(this).attr('alt')+'">';
      }
      
      //-- alt 轉圖說 --
      if ($(this).attr('alt')!="" && $(this).attr('alt')!=undefined) {
        $(this).parent().html('<div class="con_img">'+img_html+'<p>▲'+$(this).attr('alt')+'</p></div>'); 
      }
      else{
        $(this).parent().html(img_html); 
      }
    });
}




//======================= 內文圖片 設定圖寬+文繞圖 ==========================
function img_750_w(dom_id) {
  
  $.each($(dom_id), function(index, val) {
   
   //-- 電腦畫面 --
   if ($(window).width()>768) {
     if ($(this).width()<750) {
        $(this).parent().width($(this).width());
     }
     //-- 文繞圖 --
     if ($(this).width()<450 && $(window).width()>768) {
       $(this).parent().css('float', 'left');
       $(this).parent().css('margin-right', '1rem');
       $(this).parent().css('display', 'inline-block');
     }
   }
   //-- 手機畫面 --
   else{
     if ($(this).width()<$(window).width()) {
       $(this).parent().width($(this).width());
     }
     else{
       $(this).addClass('w-100');
     }
   }
    
  });
}





//======================= 內文圖片 廣告 ==========================
function html_ad() {

    //-- 手機 --
    if ($(window).width()<768) {
      var ad_txt='<a class="d-block my-3" href="#"><img class="w-100" src="http://placehold.it/900x300" alt=""></a>';
    }
    //-- 電腦 --
    else{
     var ad_txt='<a class="d-block my-3" href="#"><img class="w-100" src="http://placehold.it/750x100" alt=""></a>';
    }

    $.each($('.detail_content>p'), function(index, val) {
       
       if ($('.detail_content>p').length>=3 && index==2) {
        if ($(this).next().html().indexOf('img')!=-1) {
          $(this).next().after(ad_txt);
        }
        else{
          $(this).after(ad_txt);
        }
       }
    });
}



//======================= 內文 table ==========================
function html_table(dom_id) {
  if ($(dom_id).length>0) {
    $(dom_id).css('width', '740px');
    $(dom_id).wrap('<div class="table_div"></div>');
  }
}



//======================= 單卡網址 ==========================
function card_url(cc_pk, cc_group_id) {
  return '../card/creditcard.php?cc_pk='+cc_pk+'&cc_group_id='+cc_group_id;
}






//======================= 產生min到max之間的亂數 ==========================
function getRandom(min,max){
    return Math.floor(Math.random()*(max-min+1))+min;
};





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
             if ($(id).val()=='' || $(id).val().search(/^(?:[^\~|\!|\#|\$|\%|\^|\&|\*|\(|\)|\=|\+|\{|\}|\[|\]|\"|\'|\<|\>]+)$/)==-1) {
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


//-- 判斷Email --
function check_email(id) {
    if($(id).val().search(/^\w+(?:(?:-\w+)|(?:\.\w+))*\@\w+(?:(?:\.|-)\w+)*\.[A-Za-z]+$/)>-1){
        return false;
     }
     else{
        
        $(id).css('borderColor', 'red');
        return true;
     }
}


//-- 判斷會員帳號 --
function check_userid(id) {
    if($(id).val().search(/^[A-Za-z]{1}\w{5,11}$/)>-1){
        return false;
     }
     else{
        
        $(id).css('borderColor', 'red');
        return true;
     }
}


//-- 判斷會員密碼 --
function check_password(id) {
    if($(id).val().search(/^\w{4,}$/)>-1){
        return false;
     }
     else{
        
        $(id).css('borderColor', 'red');
        return true;
     }
}


//-- 判斷手機 --
function check_phone(id) {
    if($(id).val().search(/^[0,9]{2}[0-9]{8}$/)>-1){
        return false;
     }
     else{
        
        $(id).css('borderColor', 'red');
        return true;
     }
}


//-- 判斷特殊符號 --
  function check_word(id) {
     if($(id).val().search(/^(?:[^\~|\!|\#|\$|\%|\^|\&|\*|\(|\)|\=|\+|\{|\}|\[|\]|\"|\'|\<|\>]+)$/)==-1){
        $(id).css('borderColor', 'red');
        return true;
     }
     else{
        $(id).css('borderColor', 'rgba(0,0,0,0.1)');
       return false;
     }
  }