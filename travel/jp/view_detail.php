<?php 
 require '../../share_area/conn.php';

 //-- 判斷單元 --
 $row_nt=$pdo->select("SELECT nt_name, Tb_index, unit_id
                       FROM news_type 
                       WHERE Tb_index=:Tb_index", ['Tb_index'=>$_GET['tr_pk']], 'one');

 $title_name='卡優新聞網-日本嬉遊趣 > '.$row_nt['nt_name'].'景點';
 $crumbs_name='<a href="about.php?tr_pk='.$row_nt['Tb_index'].'">'.$row_nt['nt_name'].'</a> / <a href="javascript:;">'.$row_nt['nt_name'].'景點</a>';
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title><?php echo $title_name; ?></title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     require '../../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="<?php echo $title_name; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="<?php echo $title_name; ?>" />
    <meta property="og:description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" />
    <meta property="og:url" content="<?php echo $FB_URL; ?>" />
    <!-- <meta property="og:see_also" content="https://www.cardu.com.tw" /> -->
      
      
    <?php 
     //-- 共用CSS --
     require '../../share_area/share_css.php';
    ?>



  </head>
  <body class="travel_body">

    <div class="container">

        <?php 
         //-- 共用Header --
         if (wp_is_mobile()) {
          require '../../share_area/phone/header.php';
         }
         else{
          require '../../share_area/header.php';
         }
        ?>
        
        <!-- 麵包屑 -->
        <div class="row ">
          <div class="col-12">
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="/travel/index.php">優旅行</a> / <a href="index.php">日本嬉遊趣</a> / <?php echo $crumbs_name; ?></p>
          </div>
        </div>
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">


                
                <div class="row">

                 
                    <!--特別議題-->
                    <div class="col-md-12 col">

                      <div class="cardshap green_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link py-2 active show" id="special_2-tab" href="javascript:;" tab-target="#special_2" aria-selected="false">東京景點</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                         
                          <div class="tab-pane fade active show" id="special_2" role="tabpanel" aria-labelledby="special_2-tab">
                             <div class="row no-gutters hv-center">

                              <?php 
                               require $row_nt['Tb_index'].'_map.php';
                              ?>

                            </div>
                                                       
                          </div>
                        </div>
                      </div>

                    </div>
                    <!--特別議題end -->
                    <!--東京精選end -->
                     
                      <!--東京旅行分享-->
                    <div class="col-md-12 col">

                        <div class="cardshap green_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active  pl-30 py-2" id="title_1-tab" data-toggle="tab" href="#title_1" role="tab" aria-controls="title_1" aria-selected="true">建議行程</a>
                          </li>
                          
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="title_1" role="tabpanel" aria-labelledby="title_1-tab">

                            <?php 
                             switch ($_GET['tr_pk']) {
                               //-- 東京 --
                               case 'nt2019012216202539':
                                 $travel_about_url=[
                                  'recommend_detail.php?tr_pk=nt2019012216202539&type=58&pk=11&idx=1',
                                  'recommend_detail.php?tr_pk=nt2019012216202539&type=58&pk=11&idx=2',
                                  'recommend_detail.php?tr_pk=nt2019012216202539&type=58&pk=11&idx=3',
                                  'recommend_detail.php?tr_pk=nt2019012216202539&type=58&pk=11&idx=4'
                                 ];
                                 $travel_about_img=[
                                  'data/11_map_detail/images/main1-img.jpg',
                                  'data/11_map_detail/images/main2-img.jpg',
                                  'data/11_map_detail/images/main3-img.jpg',
                                  'data/11_map_detail/images/main4-img.jpg'
                                 ];
                                 $travel_about_title=[
                                  '超殺攻略！淺草晴空塔趴趴GO',
                                  '就要醬玩！築地台場親子玩透透',
                                  '悠閒散策！原宿澀谷新宿好好逛',
                                  '漫迷必訪！走進宮崎駿奇幻世界'
                                 ];
                               break;
                               //-- 關西 --
                               case 'nt2019012216211277':
                                 $travel_about_url=[
                                  'recommend_detail.php?tr_pk=nt2019012216202539&type=58&pk=12&idx=1',
                                  'recommend_detail.php?tr_pk=nt2019012216202539&type=58&pk=12&idx=2',
                                  'recommend_detail.php?tr_pk=nt2019012216202539&type=58&pk=12&idx=3',
                                  'recommend_detail.php?tr_pk=nt2019012216202539&type=58&pk=12&idx=4'
                                 ];
                                 $travel_about_img=[
                                  'data/12_map_detail/images/main1-img.jpg',
                                  'data/12_map_detail/images/main2-img.jpg',
                                  'data/12_map_detail/images/main3-img.jpg',
                                  'data/12_map_detail/images/main4-img.jpg'
                                 ];
                                 $travel_about_title=[
                                  '穿上和服走訪京都清水寺祇園行',
                                  '搭小火車去旅行！京都嵐山漫遊',
                                  '不可錯過！大阪購物美食好好買',
                                  '超夯景點！神戶異國美食趴趴走'
                                 ];
                               break;
                               //-- 北海道 --
                               case 'nt2019012216212384':
                                 $travel_about_url=[
                                  'recommend_detail.php?tr_pk=nt2019012216202539&type=58&pk=13&idx=1',
                                  'recommend_detail.php?tr_pk=nt2019012216202539&type=58&pk=13&idx=2',
                                  'recommend_detail.php?tr_pk=nt2019012216202539&type=58&pk=13&idx=3',
                                  'recommend_detail.php?tr_pk=nt2019012216202539&type=58&pk=13&idx=4'
                                 ];
                                 $travel_about_img=[
                                  'data/13_map_detail/images/main1-img.jpg',
                                  'data/13_map_detail/images/main2-img.jpg',
                                  'data/13_map_detail/images/main3-img.jpg',
                                  'data/13_map_detail/images/main4-img.jpg'
                                 ];
                                 $travel_about_title=[
                                  '夏日美景！富良野美瑛慢活賞花',
                                  '走訪小樽～漫步在北國小鎮風情',
                                  '釧路散策！搭火車走訪濕原秘境',
                                  '戰嚴冬！搭流冰慢車號欣賞流冰'
                                 ];
                               break;
                               //-- 東北 --
                               case 'nt2019012216213186':
                                 $travel_about_url=[
                                  'recommend_detail.php?tr_pk=nt2019012216202539&type=58&pk=14&idx=1',
                                  'recommend_detail.php?tr_pk=nt2019012216202539&type=58&pk=14&idx=2',
                                  'recommend_detail.php?tr_pk=nt2019012216202539&type=58&pk=14&idx=3',
                                  'recommend_detail.php?tr_pk=nt2019012216202539&type=58&pk=14&idx=4'
                                 ];
                                 $travel_about_img=[
                                  'data/14_map_detail/images/main1-img.jpg',
                                  'data/14_map_detail/images/main2-img.jpg',
                                  'data/14_map_detail/images/main3-img.jpg',
                                  'data/14_map_detail/images/main4-img.jpg'
                                 ];
                                 $travel_about_title=[
                                  '青森絕景～十和田感受繽紛秋色',
                                  '福島漫遊～拜訪古城泡湯又暖心',
                                  '走訪仙台～品美食欣賞奧之細道',
                                  '秋田散策～陸奧小京都角館即行'
                                 ];
                               break;
                               //-- 九州 --
                               case 'nt2019012216214163':
                                 $travel_about_url=[
                                  'recommend_detail.php?tr_pk=nt2019012216202539&type=58&pk=15&idx=1',
                                  'recommend_detail.php?tr_pk=nt2019012216202539&type=58&pk=15&idx=2',
                                  'recommend_detail.php?tr_pk=nt2019012216202539&type=58&pk=15&idx=3',
                                  'recommend_detail.php?tr_pk=nt2019012216202539&type=58&pk=15&idx=4'
                                 ];
                                 $travel_about_img=[
                                  'data/15_map_detail/images/main1-img.jpg',
                                  'data/15_map_detail/images/main2-img.jpg',
                                  'data/15_map_detail/images/main3-img.jpg',
                                  'data/15_map_detail/images/main4-img.jpg'
                                 ];
                                 $travel_about_title=[
                                  '壯闊絕景！熊本火之國自然巡禮',
                                  '盡情享受！漫遊福岡好吃又好玩',
                                  '溫泉大不同！由布院別府泡湯旅',
                                  '異國風情！長崎白天夜晚超迷人'
                                 ];
                               break;
                               //-- 沖繩 --
                               case 'nt2019012216220552':
                                 $travel_about_url=[
                                  'recommend_detail.php?tr_pk=nt2019012216202539&type=58&pk=16&idx=1',
                                  'recommend_detail.php?tr_pk=nt2019012216202539&type=58&pk=16&idx=2',
                                  'recommend_detail.php?tr_pk=nt2019012216202539&type=58&pk=16&idx=3',
                                  'recommend_detail.php?tr_pk=nt2019012216202539&type=58&pk=16&idx=4'
                                 ];
                                 $travel_about_img=[
                                  'data/16_map_detail/images/main1-img.jpg',
                                  'data/16_map_detail/images/main2-img.jpg',
                                  'data/16_map_detail/images/main3-img.jpg',
                                  'data/16_map_detail/images/main4-img.jpg'
                                 ];
                                 $travel_about_title=[
                                  '人氣行程～沖繩親子就醬玩透透',
                                  '壯闊美景～沖繩放空浮潛賞夕照',
                                  '尋古探幽～走訪沖繩世界遺產行',
                                  '血拼攻略！美國村國際村趴趴走'
                                 ];
                               break;
                               
                               default:
                                 # code...
                                 break;
                             }
                            ?>

                            <div class="row no-gutters travel_about text-center">

                              <?php 
                               $travel_count=count($travel_about_title);
                               for ($i=0; $i <$travel_count ; $i++) { 
                                 
                                 echo '
                                 <div class="col-md-6">
                                   <a href="'.$travel_about_url[$i].'">
                                       <div class="img_div wx-100-ph" title="'.$travel_about_title[$i].'" style="background-image: url('.$travel_about_img[$i].');">
                                       </div>
                                        <h6><img src="../../img/component/icon/map-icon.png">'.$travel_about_title[$i].'</h6>
                                   </a>
                                </div>';
                               }
                              ?>
                               
                            </div>
                           
                          </div>
                         
                         
                        </div>
                      </div>
                    </div>
                    <!--東京旅行分享end -->

                   <!--延伸閱讀-->
                   <div class="col-md-12 col">

                       <div class="cardshap green_tab ">
                       <ul class="nav nav-tabs" id="myTab" role="tablist">
                         <li class="nav-item news_tab">
                           <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">延伸閱讀</a>
                         </li>
                       </ul>
                       <div class="tab-content" id="myTabContent">
                         <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

                           <?php 

                            //-- 延伸閱讀 --
                            $row_news_con=$pdo->select("SELECT Tb_index, mt_id, ns_nt_pk, ns_ftitle, ns_msghtml, ns_photo_1, area_id
                                                        FROM NewsAndType 
                                                        WHERE (ns_nt_pk =:ns_nt_pk OR ns_nt_ot_pk LIKE :ns_nt_ot_pk) AND ns_verify=3 AND StartDate<=:StartDate AND EndDate>=:EndDate AND OnLineOrNot=1
                                                        ORDER BY ns_vfdate DESC LIMIT 0,6", 
                                                        ['ns_nt_pk'=>$_GET['tr_pk'], 'ns_nt_ot_pk'=>'%'.$_GET['tr_pk'].'%', 'StartDate'=>date('Y-m-d'),'EndDate'=>date('Y-m-d')]);

                            $slide_txt='';

                            for ($i=0; $i <2 ; $i++) { 
                                     
                                     $news_txt='';

                                     for ($j=0; $j <3 ; $j++) { 
                                       $index=($i*3)+$j;
                                       $ns_ftitle=mb_substr($row_news_con[$index]['ns_ftitle'], 0,14, 'utf-8');
                                       $ns_msghtml=mb_substr(strip_tags( $row_news_con[$index]['ns_msghtml']), 0,25, 'utf-8');

                                       //-------------- 網址判斷 ------------------
                                       $news_url=news_url($row_news_con[$index]['mt_id'], $row_news_con[$index]['Tb_index'], $row_news_con[$index]['ns_nt_pk'], $row_news_con[$index]['area_id']);
                                       
                                       $news_txt.='
                                       <div class="col-md-4 cards-3 col-12">
                                          <a href="'.$news_url.'" title="'.$row_news_con[$index]['ns_ftitle'].'">
                                              <div class="img_div w-100-ph"  style="background-image: url(/sys/img/'.$row_news_con[$index]['ns_photo_1'].');">
                                              </div>
                                              <h6 class="mt-2">'.$ns_ftitle.'</h6>
                                              <p class="px-3">'.$ns_msghtml.'</p>
                                          </a>
                                       </div>';
                                     }

                                     $slide_txt.='
                                     <div class="swiper-slide">
                                     <div class="row no-gutters travel_text">
                                       '.$news_txt.'
                                     </div>
                                   </div>';
                            }

                            $content_txt='<div class="tab-pane fade show '.$active.'" id="card_'.$x.'" role="tabpanel" aria-labelledby="card_'.$x.'-tab">
                                            <div class="swiper-container sub_slide">
                                               <div class="swiper-wrapper">
                                               '.$slide_txt.'
                                               </div>

                                               <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                                               <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                                            </div>
                                           </div>';
                             echo $content_txt;
                           ?>
                          
                         </div>
                        
                       </div>
                     </div>
                   </div>
                   <!--延伸閱讀end -->

                   
                   
                   <!--廣告-->
                   <div class="col-md-12 row phone_hidden">
                       <div class="col-md-6 col hv-center">
                           <img src="http://placehold.it/365x100" alt="">
                       </div>
                       <div class="col-md-6 col hv-center">
                           <img src="http://placehold.it/365x100">
                       </div>
                   </div>
                   <!--廣告end-->
                   <!--手機板廣告-->
                  <div class="col-md-12 row">
                      <div class="col-md-6 col banner d-md-none d-sm-block ">
                          <img src="http://placehold.it/365x100" alt="">
                      </div>
                  </div>
                  <!--廣告end-->

                   
                   

                   <!--網友留言-->
                   <div class="col-md-12 col">

                       <div class="cardshap green_tab ">
                       <ul class="nav nav-tabs" id="myTab" role="tablist">
                         <li class="nav-item news_tab">
                           <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">網友留言</a>
                         </li>
                       </ul>
                       <div class="tab-content" id="myTabContent">
                         <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

                           <p>您尚未登入，請先<a href="#">登入會員</a></p>
                          
                         </div>
                        
                       </div>
                     </div>
                   </div>
                   <!--網友留言end -->


                   <!--Facebook留言-->
                    <div class="col-md-12 col">

                        <div class="cardshap green_tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link active pl-30 py-2" id="special_1-tab" data-toggle="tab" href="#special_1" role="tab" aria-controls="special_1" aria-selected="true">Facebook留言</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

                            <div class="fb-comments" data-width="100%" data-href="<?php echo $FB_URL; ?>" data-numposts="5"></div>
                           
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--Facebook留言end -->






                   
                    
                    
                   
                    
                   
                

                   
                  



                   

                    <div class="col-12 py-5">
                      
                    </div>

                   




                </div>
            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
            <?php 
            require '../right_area_div_jp.php';
             ?>
            <!--版面右側end-->
             <!--廣告-->
                    <div class="col-md-12 row phone_hidden">
                        <div class="col-md-6 col hv-center">
                            <img src="http://placehold.it/468x60" alt="">
                        </div>
                        <div class="col-md-6 col hv-center">
                            <img src="http://placehold.it/468x60">
                        </div>
                    </div>
             <!--廣告end-->
        </div>
        <!--版面end-->
        
        
        
        
        
    </div><!-- container end-->

   <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v3.2&appId=319016928941764&autoLogAppEvents=1';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

     <?php 
     //-- 共用js --
     require '../../share_area/share_js.php';
    ?>

  </body>
</html>