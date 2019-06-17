$(document).ready(function() {

            $('#new_card').collapse();


            
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

               x++;
            });


            //-- tag menu --
            var mySwiper = new Swiper ('#menu_bar.swiper-container', {
               slidesPerView : 'auto',
               freeMode : true,
            }); 




            //-- 人氣排行 tag --
            var mySwiper1 = new Swiper ('.favorite_card .swiper-tag', {
               slidesPerView : 'auto',
               freeMode : true,
            });  

            //-- 人氣排行 card --
            var mySwiper2 = new Swiper ('.favorite_card .swiper-card', {
               speed:750,
               slidesPerView : 2,
               slidesPerGroup : 2,
               loop:true,
               // loopAdditionalSlides : 6,
               autoplay: {
                   delay: 5000
               },
               // 如果需要前进后退按钮
               navigation: {
                 nextEl: '.favorite_card .content_tab .swiper-button-next',
                 prevEl: '.favorite_card .content_tab .swiper-button-prev',
               }
            }); 


            //--------------- 隨機 ------------------
            var rand_num=getRandom(1,3);
            var rand_DOM=$('.favorite_card .tab_menu .swiper-slide:nth-child('+rand_num+') a');
            var rand_tap= $('.favorite_card .tab_menu .swiper-slide:nth-child('+rand_num+') a').attr('tap');

            $('.favorite_card .tab_menu .swiper-slide:nth-child('+rand_num+') a').addClass('active');
            //-- 新卡人氣 --
            if (rand_tap=='pop_card') {
              rand_DOM.parents('.favorite_card').find('.tab_link').attr('href', 'rank/newcard.php');
            //-- 辦卡人氣 --
            }else if(rand_tap=='add_card'){
              rand_DOM.parents('.favorite_card').find('.tab_link').attr('href', 'rank/apply.php');
            }
            //-- 點閱人氣 --
            else{
              rand_DOM.parents('.favorite_card').find('.tab_link').attr('href', 'rank/click.php');
            }

            $.ajax({
                url: '../../ajax/index_ajax.php',
                type: 'POST',
                data: {
                  type: 'favorite_card_ph',
                  tap:rand_tap
                },
                success:function (data) {
                  mySwiper2.removeAllSlides();
                  mySwiper2.appendSlide(data);
                  mySwiper2.update();
                  mySwiper2.slideToLoop(0, 750, false);
                  mySwiper2.autoplay.start();
                }
              });

            
            $('.favorite_card .tab_menu .swiper-slide a').click(function(event) {
              
              //-- 新卡人氣 --
              if ($(this).attr('tap')=='pop_card') {
                $(this).parents('.favorite_card').find('.tab_link').attr('href', 'rank/newcard.php');
              //-- 辦卡人氣 --
              }else if($(this).attr('tap')=='add_card'){
                $(this).parents('.favorite_card').find('.tab_link').attr('href', 'rank/apply.php');
              }
              //-- 點閱人氣 --
              else{
                $(this).parents('.favorite_card').find('.tab_link').attr('href', 'rank/click.php');
              }

              $('.favorite_card .tab_menu .swiper-slide a').removeClass('active');
              $(this).addClass('active');
              $.ajax({
                url: '../../ajax/index_ajax.php',
                type: 'POST',
                data: {
                  type: 'favorite_card_ph',
                  tap:$(this).attr('tap')
                },
                success:function (data) {
                  mySwiper2.removeAllSlides();
                  mySwiper2.appendSlide(data);
                  mySwiper2.update();
                  mySwiper2.slideToLoop(0, 750, false);
                  mySwiper2.autoplay.start();
                }
              });
              
            });
            //-- 人氣排行 card END --



            //-- 優行動Pay & 優集點 無法顯示 頁籤 --
             var x=1;
            $.each($('.phone_pay.swiper-container'), function(index, val) {
               $(this).addClass('slide'+x);
               window['phone_pay'+x] = new Swiper ($(this), {
                  // 如果需要分页器
                  loop:true,
                  autoplay: {
                      delay: 5000
                  },
                  pagination: {
                    el: '.slide'+x+' + .phone_pay.swiper-pagination',
                    clickable: true
                  }
                });  

               x++;
            });
  


             //-- 新聞 --
             var news_Swiper = new Swiper ('.news_slide .swiper-container', {
                speed:750,
                loop:true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction:false
                },
                // 如果需要分页器
                    pagination: {
                      el: '.news_slide .swiper-pagination',
                      clickable :true
                 },
                 // 如果需要前进后退按钮
                 navigation: {
                   nextEl: '.news_slide .swiper-button-next',
                   prevEl: '.news_slide .swiper-button-prev',
                 }
              });  
             
             /*-- 多專題-輪播 --*/
             var other_Swiper = new Swiper ('.other_slide .swiper-container', {
                speed:750,
                loop:true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction:false
                },
                navigation: {
                   nextEl: '.other_slide .swiper-button-next',
                   prevEl: '.other_slide .swiper-button-prev',
                 }
              });  
             /*-- 多專題-輪播 END --*/


             /*-- 不自動-輪播 --*/
             var no_auto_Swiper = new Swiper ('.no_auto_slide .swiper-container', {
                speed:750,
                loop:true,
                navigation: {
                   nextEl: '.no_auto_slide .swiper-button-next',
                   prevEl: '.no_auto_slide .swiper-button-prev',
                 }
              }); 
              /*-- 不自動-輪播 END --*/

            var card_rank_Swiper = new Swiper ('.card_rank .swiper-container', {
                slidesPerView : 3,
                slidesPerGroup : 3,
                speed:750,
                // 如果需要前进后退按钮
                navigation: {
                  nextEl: '.card_rank .swiper-button-next',
                  prevEl: '.card_rank .swiper-button-prev',
                }
              }); 



            var ccard_Swiper = new Swiper (' .ccard_rank .swiper-container', {
                slidesPerView : 2,
                slidesPerGroup : 2,
                speed:750,
                loop:true,
                autoplay: {
                    delay: 5000
                },
                // 如果需要前进后退按钮
                navigation: {
                  nextEl: ' .ccard_rank .swiper-button-next',
                  prevEl: ' .ccard_rank .swiper-button-prev',
                }
              });   


            var index=$('[name="rand_num"]').val()==undefined ? 1: $('[name="rand_num"]').val();

            //-- 目前輪播位置 --
            card_rank_Swiper.slideTo((index-1), 750, false);  

            ccard_Swiper.removeAllSlides();

            $.ajax({
              url: '../../ajax/rank_ajax.php',
              type: 'POST',
              dataType: 'json',
              data: {
                type:'slide_6_rank',
                ccs_cc_so_pk:  $('.card_rank .swiper-container .swiper-slide:nth-child('+index+')').attr('Tb_index')
              },
              success:function (data) {
                var x=1;
                $.each(data, function(index, val) {

                  var txt='<div class="swiper-slide">'+
                                     '<div class="w-h-100 hv-center">'+
                                       '<a href="'+this['cc_url']+'" title="'+this['ccs_cc_cardname']+'">'+
                                       '<span class="top_Medal">'+x+'</span><img src="/sys/img/'+this['cc_photo']+'" alt="'+this['ccs_cc_cardname']+'"><br>'+this['cc_shortname']+
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


            /*--- 卡排行 ---*/
            $('.card_rank .swiper-slide').mouseenter(function(event) {
                
                ccard_Swiper.autoplay.stop();

                //-- 舊icon還原 --
                var old_img_arr=$('.card_rank .swiper-slide:nth-child('+index+')').find('img').attr('src').split('/');
                var old_img=old_img_arr[old_img_arr.length-1].split('.');
                var img_name_arr=old_img[0].split('_');
                old_img_arr[old_img_arr.length-1]=img_name_arr[0]+'_'+img_name_arr[1]+'.'+old_img[1];
                $('.card_rank .swiper-slide:nth-child('+index+')').find('img').attr('src', old_img_arr.join('/'));
                $('.card_rank .swiper-slide').removeClass('active');
                
                //-- 新icon 換圖 --
                var img_arr=$(this).find('img').attr('src').split('/');
                var img=img_arr[img_arr.length-1].split('.');
                var new_img=img[0]+'_down';
                img_arr[img_arr.length-1]=new_img+'.'+img[1];
                $(this).find('img').attr('src', img_arr.join('/'));
                $(this).addClass('active');

                //-- 切換信用卡 --

                if ($(this).attr('index')!=index) {
                  ccard_Swiper.removeAllSlides();

                  $.ajax({
                    url: '../ajax/rank_ajax.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                      type:'slide_6_rank',
                      ccs_cc_so_pk: $(this).attr('Tb_index')
                    },
                    success:function (data) {
                      var x=1;
                      $.each(data, function(index, val) {

                        var txt='<div class="swiper-slide">'+
                                           '<div class="w-h-100 hv-center">'+
                                             '<a href="'+this['cc_url']+'" title="'+this['ccs_cc_cardname']+'">'+
                                             '<span class="top_Medal">'+x+'</span><img src="../sys/img/'+this['cc_photo']+'" alt="'+this['ccs_cc_cardname']+'"><br>'+this['cc_shortname']+
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

                index=$(this).attr('index');
            });

            $('.ccard').mouseenter(function(event) {
              ccard_Swiper.autoplay.stop();
            });

            $('.ccard').mouseleave(function(event){
              ccard_Swiper.autoplay.start();
            });

            

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


            
        });




    //-- 卷軸監控回調 --
    var scroll_x=0;
    $(window).bind('scroll resize', function() {
      var top=$(this).scrollTop();

      //-- TOP出現 --
      if (top>50){
        TweenMax.to($('.top_div'), 0.3, { bottom:'14%' , opacity:1, display:'block'});
      }
      else{
        TweenMax.to($('.top_div'), 0.3, { bottom:'-1%' , opacity:0, display:'none'});
      }
      
    });
    //-- 卷軸監控回調 END --


    //-- TOP Btn --
    $('.top_div a').click(function(event) {
       $('html,body').animate({
        scrollTop:0
       },1000);
    });



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
    /*---------------- 信用卡快搜 END ----------------------*/



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