 <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="vendor/swiper/swiper.min.js"></script>
    <script type="text/javascript" src="vendor/swiper/swiper.animate1.0.3.min.js"></script>
    <!-- 超強動畫庫 -->
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
    <!-- 主要JS -->
    <script type="text/javascript" src="js/main.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
       
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
          slidesPerView : 2,
          speed:750,
          // 如果需要前进后退按钮
          navigation: {
            nextEl: '.favorite_card .content_tab .swiper-button-next',
            prevEl: '.favorite_card .content_tab .swiper-button-prev',
          }
       }); 

       //-- 優行動Pay --
       var mySwiper3 = new Swiper ('.phone_pay.swiper-container', {
          // 如果需要分页器
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
       
      });
    </script>