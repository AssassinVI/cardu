<?php 
 require '../../share_area/conn.php';
 require 'config.php';
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title>卡優新聞網-日本嬉遊趣</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <?php 
     require '../../share_area/fb_config.php';
    ?>
    <meta property="og:site_name" content="卡優新聞網-日本嬉遊趣" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網-日本嬉遊趣" />
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
          <div class="col-md-12 col">
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="/index.php">首頁</a> / <a href="../index.php">優旅行</a> / <a href="javascript:;">日本嬉遊趣
            </a></p>
          </div>
        </div>
        
        
        <!--版面--->
        <div class="row">
         <!--版面中間--->
            <div class="col-md-12 col0">
                    <div class="">
                        <div class="row no-gutters">    
                        <div class="col-md-12 row">
                        <div class="col-md-4 col">
                           <div class="cardshap japan_list">
                          <a href="about.php?tr_pk=nt2019012216202539" >
                            <div class="img_div" style="background-image: url(../../img/component/travel/York.jpg);">
                             <big>東京</big>           
                            </div>
                          </a>
                              <div class="row no-gutters text-center pt-2">
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?tr_pk=nt2019012216202539&type=58&pk=11&idx=1" >
                                    <span><img src="/img/component/icon/map-icon.png">淺草晴空塔趴趴GO</span>
                                  </a>
                                 </div>
                                  <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?tr_pk=nt2019012216202539&type=58&pk=11&idx=2" >
                                    <span><img src="/img/component/icon/map-icon.png">築地台場親子玩透透</span>
                                  </a>
                                 </div>
                              </div>

                               <div class="row no-gutters text-center pb-2">
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?tr_pk=nt2019012216202539&type=58&pk=11&idx=3" >
                                   <span><img src="/img/component/icon/map-icon.png">原宿澀谷新宿好好逛</span>
                                  </a>
                                 </div>
                                  <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?tr_pk=nt2019012216202539&type=58&pk=11&idx=4" >
                                   <span><img src="/img/component/icon/map-icon.png">走進宮崎駿奇幻世界</span>
                                  </a>
                                 </div>
                              </div>
                        </div>
                         </div>
                        <div class="col-md-4 col">
                           <div class="cardshap japan_list">
                          <a href="about.php?tr_pk=nt2019012216211277" >
                            <div class="img_div" style="background-image: url(../../img/component/travel/kansai.jpg);">
                             <big>關西</big>           
                            </div>
                          </a>
                              <div class="row no-gutters text-center pt-2">
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?tr_pk=nt2019012216211277&type=58&pk=12&idx=1" >
                                    <span><img src="/img/component/icon/map-icon.png">走訪清水寺祇園之行</span>
                                  </a>
                                 </div>
                                  <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?tr_pk=nt2019012216211277&type=58&pk=12&idx=2" >
                                    <span><img src="/img/component/icon/map-icon.png">搭小火車京都嵐山行</span>
                                  </a>
                                 </div>
                              </div>

                               <div class="row no-gutters text-center pb-2">
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?tr_pk=nt2019012216211277&type=58&pk=12&idx=3" >
                                   <span><img src="/img/component/icon/map-icon.png">大阪購物美食好好買</span>
                                  </a>
                                 </div>
                                  <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?tr_pk=nt2019012216211277&type=58&pk=12&idx=4" >
                                   <span><img src="/img/component/icon/map-icon.png">神戶異國美食趴趴走</span>
                                  </a>
                                 </div>
                              </div>
                        </div>
                         </div>
                        <div class="col-md-4 col">
                           <div class="cardshap japan_list">
                          <a href="about.php?tr_pk=nt2019012216212384" >
                            <div class="img_div" style="background-image: url(../../img/component/travel/hokkaido.jpg);">
                             <big>北海道</big>           
                            </div>
                          </a>
                              <div class="row no-gutters text-center pt-2">
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?tr_pk=nt2019012216212384&type=58&pk=13&idx=1" >
                                    <span><img src="/img/component/icon/map-icon.png">富良野美瑛慢活賞花</span>
                                  </a>
                                 </div>
                                  <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?tr_pk=nt2019012216212384&type=58&pk=13&idx=2" >
                                    <span><img src="/img/component/icon/map-icon.png">漫步小樽北國風情趣</span>
                                  </a>
                                 </div>
                              </div>

                               <div class="row no-gutters text-center pb-2">
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?tr_pk=nt2019012216212384&type=58&pk=13&idx=3" >
                                   <span><img src="/img/component/icon/map-icon.png">搭火車走訪濕原秘境</span>
                                  </a>
                                 </div>
                                  <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?tr_pk=nt2019012216212384&type=58&pk=13&idx=4" >
                                   <span><img src="/img/component/icon/map-icon.png">戰嚴冬搭車欣賞流冰</span>
                                  </a>
                                 </div>
                              </div>
                        </div>
                         </div>
                        </div>
                        </div>
                         <div class="row no-gutters">    
                        <div class="col-md-12 row">
                        <div class="col-md-4 col">
                           <div class="cardshap japan_list">
                          <a href="about.php?tr_pk=nt2019012216213186" >
                            <div class="img_div" style="background-image: url(../../img/component/travel/tour.jpg);">
                             <big>東北</big>           
                            </div>
                          </a>
                              <div class="row no-gutters text-center pt-2">
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?tr_pk=nt2019012216213186&type=58&pk=14&idx=1" >
                                    <span><img src="/img/component/icon/map-icon.png">十和田感受繽紛秋色</span>
                                  </a>
                                 </div>
                                  <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?tr_pk=nt2019012216213186&type=58&pk=14&idx=2" >
                                    <span><img src="/img/component/icon/map-icon.png">拜訪古城泡湯又暖心</span>
                                  </a>
                                 </div>
                              </div>

                               <div class="row no-gutters text-center pb-2">
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?tr_pk=nt2019012216213186&type=58&pk=14&idx=3" >
                                   <span><img src="/img/component/icon/map-icon.png">品美食欣賞奧之細道</span>
                                  </a>
                                 </div>
                                  <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?tr_pk=nt2019012216213186&type=58&pk=14&idx=4" >
                                   <span><img src="/img/component/icon/map-icon.png">陸奧小京都角館即行</span>
                                  </a>
                                 </div>
                              </div>
                        </div>
                         </div>
                        <div class="col-md-4 col">
                           <div class="cardshap japan_list">
                          <a href="about.php?tr_pk=nt2019012216214163" >
                            <div class="img_div" style="background-image: url(../../img/component/travel/kyushu.jpg);">
                             <big>九州</big>           
                            </div>
                          </a>
                              <div class="row no-gutters text-center pt-2">
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?tr_pk=nt2019012216214163&type=58&pk=15&idx=1" >
                                    <span><img src="/img/component/icon/map-icon.png">熊本火之國自然巡禮</span>
                                  </a>
                                 </div>
                                  <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?tr_pk=nt2019012216214163&type=58&pk=15&idx=2" >
                                    <span><img src="/img/component/icon/map-icon.png">漫遊福岡好吃又好玩</span>
                                  </a>
                                 </div>
                              </div>

                               <div class="row no-gutters text-center pb-2">
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?tr_pk=nt2019012216214163&type=58&pk=15&idx=3" >
                                   <span><img src="/img/component/icon/map-icon.png">由布院別府泡湯之旅</span>
                                  </a>
                                 </div>
                                  <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?tr_pk=nt2019012216214163&type=58&pk=15&idx=4" >
                                   <span><img src="/img/component/icon/map-icon.png">長崎白天夜晚超迷人</span>
                                  </a>
                                 </div>
                              </div>
                        </div>
                         </div>
                       <div class="col-md-4 col">
                           <div class="cardshap japan_list">
                          <a href="about.php?tr_pk=nt2019012216220552" >
                            <div class="img_div" style="background-image: url(../../img/component/travel/okinnawa.jpg);">
                             <big>冲繩</big>           
                            </div>
                          </a>
                              <div class="row no-gutters text-center pt-2">
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?tr_pk=nt2019012216220552&type=58&pk=16&idx=1" >
                                    <span><img src="/img/component/icon/map-icon.png">沖繩親子就醬玩透透</span>
                                  </a>
                                 </div>
                                  <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?tr_pk=nt2019012216220552&type=58&pk=16&idx=2" >
                                    <span><img src="/img/component/icon/map-icon.png">沖繩放空浮潛賞夕照</span>
                                  </a>
                                 </div>
                              </div>

                               <div class="row no-gutters text-center pb-2">
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?tr_pk=nt2019012216220552&type=58&pk=16&idx=3" >
                                   <span><img src="/img/component/icon/map-icon.png">走訪沖繩世界遺產行</span>
                                  </a>
                                 </div>
                                  <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/recommend_detail.php?tr_pk=nt2019012216220552&type=58&pk=16&idx=4" >
                                   <span><img src="/img/component/icon/map-icon.png">美國村國際通趴趴走</span>
                                  </a>
                                 </div>
                              </div>
                        </div>
                         </div>
                        </div>
                        </div>
                    </div>
                  </div>
             <!--版面中間end--->
            <!--版面左側-->
            <div class="index-content-left col0">


                
                <div class="row">

                

                 <?php 
                  //-- 日本嬉遊趣單元 --
                  $ns_nt_ot_pk_query="";
                  $row_newsType=$pdo->select("SELECT Tb_index FROM news_type WHERE unit_id='un2019011717573494'");
                  foreach ($row_newsType as $newsType) {
                   $ns_nt_ot_pk_query.=" ns_nt_ot_pk LIKE '%".$newsType['Tb_index']."%' OR ";
                  }
                  $ns_nt_ot_pk_query=substr($ns_nt_ot_pk_query, 0,-3);



                   //-- 分頁判斷數 --
                   $num=9;
                   //--- 分頁起頭數 ---
                   $now_page_num=empty($_GET['PageNo'])? 0:((int)$_GET['PageNo']-1)*$num;
                   //-- 目前分頁 --
                   $page=empty($_GET['PageNo']) ? 1:$_GET['PageNo'];


                   //-- 總頁數 --
                   $row_list_total=$pdo->select("SELECT count(*) as total
                                           FROM NewsAndType
                                           WHERE (unit_id='un2019011717573494' OR $ns_nt_ot_pk_query) AND ns_verify=3 AND StartDate<=:StartDate AND EndDate>=:EndDate AND OnLineOrNot=1"
                                           , ['pk'=>$_GET['mt_pk'], 'StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')], 'one');
                   $total_page=ceil(((int)$row_list_total['total'])/$num);


                   $row_list=$pdo->select("SELECT Tb_index, ns_nt_pk, ns_ftitle, ns_msghtml, ns_photo_1, mt_id, area_id, activity_s_date, activity_e_date, ns_bank, ns_store
                                          FROM NewsAndType
                                          WHERE (unit_id='un2019011717573494' OR $ns_nt_ot_pk_query) AND ns_verify=3 AND StartDate<=:StartDate AND EndDate>=:EndDate AND OnLineOrNot=1
                                          ORDER BY ns_vfdate DESC LIMIT $now_page_num, $num", ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);
                  $row_list_num=count($row_list);
                  $count_i=ceil($row_list_num/3);

                  for ($i=0; $i <$count_i ; $i++) { 
                    
                    echo '<div class="col-md-12 col">
                           <div class="cardshap redius_bg">';

                    for ($j=$i*3; $j <($i+1)*3 ; $j++) {
                     
                     if ($j<$row_list_num) {

                       $row_list_one=$row_list[$j];
                       

                       //-- 關聯銀行 --
                       if (!empty($row_list_one['ns_bank']) && (empty($row_list_one['ns_store']) || $row_list_one['ns_store']=='no')) {
                         
                         $bank_arr=explode(',', $row_list_one['ns_bank']);
                         
                         if (count($bank_arr)==1) {
                           $row_bank=$pdo->select("SELECT bi_shortname FROM bank_info WHERE Tb_index=:Tb_index", ['Tb_index'=>$bank_arr[0]], 'one');
                           $related_txt='<small>('.$row_bank['bi_shortname'].')</small>';
                         }else{
                           $related_txt='';
                         }
                       }
                       //-- 關聯商店 --
                       elseif(empty($row_list_one['ns_bank']) && !empty($row_list_one['ns_store']) && $row_list_one['ns_store']!='no'){

                         $store_arr=explode(',', $row_list_one['ns_store']);
                         
                         if (count($store_arr)==1) {
                           $row_store=$pdo->select("SELECT st_nickname FROM store WHERE Tb_index=:Tb_index", ['Tb_index'=>$store_arr[0]], 'one');
                           $related_txt='<small>('.$row_store['st_nickname'].')</small>';
                         }else{
                           $related_txt='';
                         }
                       }
                       else{
                         $related_txt='';
                       }

                       //-- 活動時間 --
                       if ($row_list_one['activity_e_date']!='0000-00-00') {
                         $activity_s_date=$row_list_one['activity_s_date']!='0000-00-00' ? $row_list_one['activity_s_date']:'即日起';
                         $activity_date='<span class="mb-1">活動日期：'.$activity_s_date.'~'.$row_list_one['activity_e_date'].'</span>';
                       }
                       else{
                         $activity_date='';
                       }
                       


                       $ns_ftitle=mb_substr($row_list_one['ns_ftitle'], 0,20,'utf-8');
                       $ns_msghtml=mb_substr(strip_tags($row_list_one['ns_msghtml']), 0,55,'utf-8');
                       $url=news_url($row_list_one['mt_id'], $row_list_one['Tb_index'], $row_list_one['ns_nt_pk'], $row_list_one['area_id']);
                       $fb_url=urlencode($url);
                       echo '
                       <div class="row no-gutters py-md-3 mx-md-4 news_list">
                        <div class="col-md-4 col-6 py-2 pl-2">
                          <a class="img_div news_list_img" href="'.$url.'" title="'.$row_list_one['ns_ftitle'].'" style="background-image: url('.$img_url.$row_list_one['ns_photo_1'].');"></a>
                        </div>
                        <div class="col-md-8 col-6 pl-md-4 pl-0 py-2 news_list_txt">
                         <div>
                           <a href="'.$url.'" title="'.$row_list_one['ns_ftitle'].'">
                            <h3>'.$ns_ftitle.'</h3>
                           </a>
                           '.$related_txt.'
                         </div>
                          '.$activity_date.'
                          <p class="phone_hidden">'.$ns_msghtml.'...</p>
                          
                          <div class="fb_search_btn">
                            <iframe src="https://www.facebook.com/plugins/like.php?href='.$fb_url.'&width=119&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260" width="119" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                          </div>
                        </div>
                       </div>';
                     }
                    }

                    echo '</div>
                        </div>';


                   //-- 廣告 --
                   if (wp_is_mobile()) {
                     if ($i!=3) {
                       echo '
                       <div class="col-md-12 row">
                       <div class="col-md-6 col banner d-md-none d-sm-block ">
                           <img src="https://placehold.it/365x100" alt="">
                       </div>
                       </div>';
                     }
                   }
                   else{
                     if ($i%2==0) {
                       echo '<div class="col-md-12 col banner phone_hidden"><div class="test"><img src="https://placehold.it/750x100" alt="banner"></div></div>';
                     }
                     else{
                       echo '<div class="col-md-12 row phone_hidden">
                                <div class="col-md-6 col banner ">
                                    <img src="https://placehold.it/365x100" alt="">
                                </div>
                                <div class="col-md-6 col banner">
                                    <img src="https://placehold.it/365x100">
                                </div>
                            </div>';
                     }
                   }
                  }
                 ?>
                   

                    <?php 
                     //-- 分頁 --
                     paging($total_page, $page);
                    ?>

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


     <?php 
     //-- 共用js --
     require '../../share_area/share_js.php';
    ?>

  </body>
</html>