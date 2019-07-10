<?php 
 require '../share_area/conn.php';

 //-- 判斷登入會員 --
 check_member();
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title>卡優新聞網-會員中心 > 電子報</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     require '../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="卡優新聞網-會員中心 > 電子報" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網-會員中心 > 電子報" />
    <meta property="og:description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" />
    <meta property="og:url" content="<?php echo $FB_URL;?>" />
    <!-- <meta property="og:see_also" content="https://www.cardu.com.tw" /> -->
      
      
    <?php 
     //-- 共用CSS --
     require '../share_area/share_css.php';
    ?>



  </head>
  <body class="member_body">

    <div class="container">

        <?php 
         //-- 共用Header --
         if (wp_is_mobile()) {
          require '../share_area/phone/header.php';
         }
         else{
          require '../share_area/header.php';
         }
        ?>
        
        <!-- 麵包屑 -->
        <div class="row ">
          <div class="col-12">
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="member.php">會員中心</a> / <a href="javascript:;">電子報管理</a></p>
          </div>
        </div>
 
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">


                
                <div class="row">

                    <div class="col-md-12 col pb-3 detail_content">
                    <div class="cardshap primary_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link py-2 flex-x-center active show" id="goodMember-tab" href="javascript:;" tab-target="#goodMember" aria-selected="true">訂閱取消電子報</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade active show" id="goodMember" role="tabpanel" aria-labelledby="goodMember-tab">


                            
                              <div class="px-md-2 member_info">

                                 
                                 <div>
                                   <h5>訂閱電子報：</h5>
                                   <ul>
                                     <li> <label><input type="radio" name="ud_epaper" value="Y"> 訂閱，當有最新的訊息、優惠、促銷或贈品索取時請通知我。</label></li>
                                     <li><label><input type="radio" name="ud_epaper" value="N"> 取消，您將無法在收到最新的訊息、優惠、促銷及贈品索取。</label></li>
                                   </ul>
                                 </div>

                                
                                 
                              </div>
                            
                           
                          </div>
                          
                        </div>
                      </div>
                    
                  </div>


                    
                   

                    
                  
                    
                    

                   

                    

                   




                </div>
            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
           <?php require 'right_area_div.php'; ?>
            <!--版面右側end-->
        </div>
        <!--版面end-->
        
        
        
        
        
    </div><!-- container end-->


    <?php 
         //-- 共用js --
         require '../share_area/share_js.php';
        ?>

    <script type="text/javascript">
      $(document).ready(function() {
        
        $.ajax({
           url: '../ajax/member_ajax.php',
           type: 'POST',
           data: {
            type: 'check_epaper'
           },
           success:function (data) {
             
             if (data!='') {
              $('[name="ud_epaper"][value="'+data+'"]').prop('checked', true);
             }
           }
         });




        //-- 訂閱或取消電子報 --
        $('[name="ud_epaper"]').click(function(event) {
          
          var _this=$(this);

            $.ajax({
              url: '../ajax/member_ajax.php',
              type: 'POST',
              data: {
                type: 'set_epaper',
                ud_epaper: $(this).val()
              },
              success:function (data) {
                if (data!='') {
                  if (_this.val()=='Y') {
                    alert('已幫您訂閱電子報');
                  }
                  else if(_this.val()=='N'){
                    alert('已幫您取消訂閱電子報');
                  }
                }
                else{
                  alert('請先登入會員');
                  _this.prop('checked', false);
                }
              }
            });
          
          
        });
          
      });
    </script>

  </body>
</html>