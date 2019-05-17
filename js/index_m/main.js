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
               loopAdditionalSlides : 4,
               autoplay: {
                   delay: 5000
               },
               // 如果需要前进后退按钮
               navigation: {
                 nextEl: '.favorite_card .content_tab .swiper-button-next',
                 prevEl: '.favorite_card .content_tab .swiper-button-prev',
               }
            }); 

            
            $('.favorite_card .tab_menu .swiper-slide a').click(function(event) {
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
                  mySwiper2.autoplay.start();
                }
              });
              
            });
            //-- 人氣排行 card END --



            //-- 優行動Pay --
            var mySwiper3 = new Swiper ('.phone_pay.swiper-container', {
               // 如果需要分页器
               loop:true,
               autoplay: {
                   delay: 5000
               },
               pagination: {
                 el: '.phone_pay.swiper-pagination',
                 clickable: true
               }
             }); 

             //-- 優集點 --
            var mySwiper4 = new Swiper ('.point.swiper-container', {
               // 如果需要分页器
               pagination: {
                 el: '.point.swiper-pagination',
                 clickable: true
               }
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
                 //    pagination: {
                 //      el: '.news_slide .swiper-pagination',
                 //      clickable :true
                 // },
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
                loopAdditionalSlides : 4,
                autoplay: {
                    delay: 5000
                },
                // 如果需要前进后退按钮
                navigation: {
                  nextEl: ' .ccard_rank .swiper-button-next',
                  prevEl: ' .ccard_rank .swiper-button-prev',
                }
              });   


            /*--- 卡排行 ---*/
            var index=1;
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