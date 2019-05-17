<?php 
 require '../../share_area/conn.php';
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title>卡優新聞網-優旅行</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <meta property="fb:admins" content="100000121777752" />
    <meta property="fb:admins" content="100008160723180" />
    <meta property="fb:app_id" content="616626501755047" />
    <meta property="og:site_name" content="卡優新聞網" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網" />
    <meta property="og:description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" />
    <meta property="og:url" content="https://www.cardu.com.tw" />
    <meta property="og:see_also" content="https://www.cardu.com.tw" />
      
      
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
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="index.php">首頁</a> / <a href="travel.php">優旅行</a> / <a href="javascript:;">日本嬉遊去</a></p>
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
                            <a class="nav-link py-2 active show" id="special_2-tab" href="javascript:;" tab-target="#special_2" aria-selected="false">北海道景點</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                         
                          <div class="tab-pane fade active show" id="special_2" role="tabpanel" aria-labelledby="special_2-tab">
                             <div class="row no-gutters hv-center">
                              <div class="map">
                                <div class="row no-gutters hv-center">
                                    <img class="photo" src="../../img/component/travel/hokkaido/about_3/map-bg.jpg" title="新聞">


                                    <div class="Abashiri phone_hidden"><!--網走-->
                                    <a data-fancybox data-src="#Abashiri_detail" href="javascript:;"><img src="../../img/component/travel/hokkaido/01.png" width="48" height="38" ></a>
                                    <div class="Abashiri-01"><a data-fancybox data-src="#Abashiri_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/hokkaido/01-1.png" width="180" height="120"></a></div>

                                    </div><!--網走結束-->


                                    <div class="Kitami phone_hidden"><!--北見狐狸村-->
                                    <a data-fancybox data-src="#Kitami_detail" href="javascript:;"><img src="../../img/component/travel/hokkaido/02.png" width="94" height="30"></a>
                                    <div class="Kitami-01"><a data-fancybox data-src="#Kitami_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/hokkaido/02-1.png" width="180" height="120"></a></div>
                                    </div><!--北見狐狸村結束-->


                                    <div class="Sounkyo phone_hidden"><!--層雲峽-->
                                    <a data-fancybox data-src="#Sounkyo_detail" href="javascript:;"><img src="../../img/component/travel/hokkaido/03.png" width="68" height="30"></a>
                                    <div class="Sounkyo-01"><a data-fancybox data-src="#Sounkyo_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/hokkaido/03-1.png" width="180" height="120"></a></div>
                                    </div><!--層雲峽結束-->


                                    <div class="Shikisai phone_hidden"><!--四季彩之丘-->
                                    <a data-fancybox data-src="#Shikisai_detail" href="javascript:;"><img src="../../img/component/travel/hokkaido/04.png" width="94" height="30"></a>
                                    <div class="Shikisai-01"><a data-fancybox data-src="#Shikisai_detail" href="javascript:;" style="cursor:pointer;"  target="_blank"><img src="../../img/component/travel/hokkaido/04-1.png" width="180" height="120"></a></div>
                                    </div><!--四季彩之丘結束-->


                                    <div class="Akan phone_hidden"><!--阿寒湖-->
                                    <a data-fancybox data-src="#Akan_detail" href="javascript:;"><img src="../../img/component/travel/hokkaido/05.png" width="68" height="28"></a>
                                    <div class="Akan-01"><a data-fancybox data-src="#Akan_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/hokkaido/05-1.png" width="180" height="120"></a></div>
                                    </div><!--阿寒湖結束-->

                                    <div class="Kushiro phone_hidden"><!--釧路濕原-->
                                    <a data-fancybox data-src="#Kushiro_detail" href="javascript:;"><img src="../../img/component/travel/hokkaido/06.png" width="72" height="28"></a>
                                    <div class="Kushiro-01"><a data-fancybox data-src="#Kushiro_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/hokkaido/06-1.png" width="180" height="120"></a></div>
                                    </div><!--釧路濕原結束-->

                                    <div class="Church phone_hidden"><!--水之教堂-->
                                    <a data-fancybox data-src="#Church_detail" href="javascript:;"><img src="../../img/component/travel/hokkaido/07.png" width="71" height="30"></a>
                                    <div class="Church-01"><a data-fancybox data-src="#Church_detail" href="javascript:;" style="cursor:pointer;"  target="_blank"><img src="../../img/component/travel/hokkaido/07-1.png" width="180" height="120"></a></div>
                                    </div><!--水之教堂結束-->


                                    <div class="tokachi phone_hidden"><!--十勝が丘公園-->
                                    <a data-fancybox data-src="#tokachi_detail" href="javascript:;"><img src="../../img/component/travel/hokkaido/08.png" width="104" height="30"></a>
                                    <div class="tokachi-01"><a data-fancybox data-src="#tokachi_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src='../../img/component/travel/hokkaido/08-1.png' width="180" height="120"></a></div>
                                    </div><!--十勝が丘公園結束-->

                                    <div class="Farm phone_hidden"><!--富田農場-->
                                    <a data-fancybox data-src="#Farm_detail" href="javascript:;"><img src="../../img/component/travel/hokkaido/09.png" width="71" height="30"></a>
                                    <div class="Farm-01"><a data-fancybox data-src="#Farm_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/hokkaido/09-1.png" width="180" height="120"></a></div>
                                    </div><!--富田農場結束-->

                                    <div class="Noboribetsu phone_hidden"><!--登別地獄谷-->
                                    <a data-fancybox data-src="#Noboribetsu_detail" href="javascript:;"><img src="../../img/component/travel/hokkaido/10.png" width="89" height="30"></a>
                                    <div class="Noboribetsu-01"><a data-fancybox data-src="#Noboribetsu_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/hokkaido/10-1.png" width="180" height="120"></a></div>
                                    </div><!--登別地獄谷結束-->

                                    <div class="Otaru phone_hidden"><!--小樽運河-->
                                    <a data-fancybox data-src="#Otaru_detail" href="javascript:;"><img src="../../img/component/travel/hokkaido/11.png" width="69" height="33"></a>
                                    <div class="Otaru-01"><a data-fancybox data-src="#Otaru_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/hokkaido/11-1.png" width="180" height="120"></a></div>
                                    </div><!--小樽運河結束-->

                                    <div class="Hokkaido phone_hidden"><!--北海道大學-->
                                    <a data-fancybox data-src="#Hokkaido_detail" href="javascript:;"><img src="../../img/component/travel/hokkaido/12.png" width="87" height="30"></a>
                                    <div class="Hokkaido-01"><a data-fancybox data-src="#Hokkaido_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/hokkaido/12-1.png" width="180" height="120"></a></div>
                                    </div><!--北海道大學結束-->

                                    <div class="Lake phone_hidden"><!--洞爺湖-->
                                    <a data-fancybox data-src="#Lake_detail" href="javascript:;"><img src="../../img/component/travel/hokkaido/13.png" width="68" height="30"></a>
                                    <div class="Lake-01"><a data-fancybox data-src="#Lake_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/hokkaido/13-1.png" width="180" height="120"></a></div>
                                    </div><!--洞爺湖結束-->

                                    <div class="Bear phone_hidden"><!--熊牧場-->
                                    <a data-fancybox data-src="#Bear_detail" href="javascript:;"><img src="../../img/component/travel/hokkaido/14.png" width="68" height="30"></a>
                                    <div class="Bear-01"><a data-fancybox data-src="#Bear_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/hokkaido/14-1.png" width="180" height="120"></a></div>
                                    </div><!--熊牧場結束-->

                                    <div class="Hakodate phone_hidden"><!--函館-->
                                    <a data-fancybox data-src="#Hakodate_detail" href="javascript:;"><img src="../../img/component/travel/hokkaido/15.png" width="50" height="40"></a>
                                    <div class="Hakodate-01"><a data-fancybox data-src="#Hakodate_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/hokkaido/15-1.png" width="180" height="120"></a></div>
                                    </div><!--函館結束-->

                                    <div class="NCA phone_hidden"><!--新千歲機場-->
                                    <img src="../../img/component/travel/hokkaido/16.png" width="69" height="22">
                                    </div><!--新千歲機場結束-->

                                    <div class="HA phone_hidden"><!--函館機場-->
                                    <img src="../../img/component/travel/hokkaido/17.png" width="69" height="22">
                                    </div><!--新千歲機場結束-->

                                    <div class="AA phone_hidden"><!--旭川機場-->
                                    <img src="../../img/component/travel/hokkaido/18.png" width="69" height="22">
                                    </div><!--旭川機場結束-->
                                    
                                </div>
                              </div>
                              
                              

                            </div>
                            
                             
                           
                          </div>
                        
                          
                        </div>
                      </div>




                     <!-- 旅遊景點說明 -->
                     <div class="fancybox-div">
                       
                       <!--網走-->
                       <div id="Abashiri_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/hokkaido/detail/08_Big.jpg"><br>
                           <span>圖/卡優新聞網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">網走</h3>
                           <p>
                             網走是北海道東北部鄂霍次克沿岸最大的城鎮，發展得益於水産業和觀光業。在這裏不僅終年可以品嘗到時鮮海味，自然環境也很優美，原始花園、湖泊和流冰都是北海道有代表性的風景，流冰每年 1 月下旬前後到達網走。遊人乘坐流冰觀光破冰船從稚內港出發，可以欣賞到搖搖晃晃卻美麗無比的藍色流冰。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--網走 END-->


                       <!--北見狐狸村-->
                       <div id="Kitami_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/hokkaido/detail/09_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">北見狐狸村</h3>
                           <p>
                             除了有著名的北狐外，更有大名鼎鼎的銀狐。這裡的狐狸是人工飼養的，但是以野放方式，在牧場內可以仔細觀察牠們的自然生態與族群生活。可在園內與可愛的狐狸合影並購買當地紀念品。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--北見狐狸村 END-->


                       <!--層雲峽-->
                       <div id="Sounkyo_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/hokkaido/detail/10_Big.jpg"><br>
                           <span>圖/卡優新聞網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">層雲峽</h3>
                           <p>
                             層雲峽是日本北海道上川町的一座峽谷，位於大雪山國立公園境內，為石狩川沿岸一段約24公里長的斷崖峭壁。是大雪山主要的觀光景點。峽谷旁有層雲峽溫泉，是北海道規模較大的溫泉街之一，除了溫泉之外，層雲峽還有流星瀑布、銀河瀑布等景點。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--層雲峽 END-->


                       <!--四季彩之丘-->
                       <div id="Shikisai_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/hokkaido/detail/11_Big.jpg"><br>
                           <span>圖/卡優新聞網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">四季彩之丘</h3>
                           <p>
                             「廣景花田 四季彩之丘」、「丘陵之郷 美瑛」有著占地7公頃的廣闊花田。春至秋季，有十多種花草綻放，花卉盛開美不勝收。冬天可以乘坐雪上摩托等，可盡情享受雪國冬季的各種戶外活動。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--四季彩之丘 END-->
                       
                       <!--阿寒湖-->
                       <div id="Akan_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/hokkaido/detail/13_Big.jpg"><br>
                           <span>圖/卡優新聞網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">阿寒湖</h3>
                           <p>
                             位於北海道東部，為阿寒國立公園的一部分，是雄阿寒岳火山爆發而形成的堰塞湖。 阿寒湖風景秀麗，夏、秋兩季節可搭乘觀光汽船，瀏覽湖光山色，冬季可在結冰的湖面上，從事冰上活動，在湖的南岸有阿寒湖溫泉，為道東著名的旅遊勝地。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--阿寒湖 END-->
                      
                       <!--釧路濕原-->
                       <div id="Kushiro_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/hokkaido/detail/15_Big.jpg"><br>
                           <span>圖/卡優新聞網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">釧路濕原</h3>
                           <p>
                             釧路濕原國立公園為日本北海道道東的國立公園，面積19357公頃。於1987年7月31日成為國立公園，為日本第28個國立公園。 釧路濕原是日本最大的濕原，在1967年已被列為自然保護區，1980年列入濕地公約國際重要濕地名錄。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--釧路濕原 END-->

                       <!--水之教堂-->
                       <div id="Church_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/hokkaido/detail/12_Big.jpg"><br>
                           <span>圖/卡優新聞網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">水之教堂</h3>
                           <p>
                             世界級的建築師安藤忠雄先生藉由「從大自然中切割出的空間」重新定義「神聖空間」的概念。透過建築物與「水、光、綠、風」等自然界要素相銜接，逐漸地淨化身心，澄靜思緒。讓結婚新人以至前來見證的來賓們也抱著同樣的心情觀禮，這就是水之教堂。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--水之教堂 END-->
                       

                       <!--十勝が丘公園-->
                       <div id="tokachi_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/hokkaido/detail/14_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">十勝が丘公園</h3>
                           <p>
                             十勝が丘公園不但有著廣大青翠的綠地，還有許多豐富多元的遊憩設施及多功能廣場，中心廣場上的音更花鐘更是公園裡的一大特色。近十勝川溫泉街,園內有免費足湯,可體驗世界少有的且日本唯一的十勝川「植物性褐碳溫泉」。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--十勝が丘公園 END-->

                       <!--富田農場-->
                       <div id="Farm_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/hokkaido/detail/06_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">富田農場</h3>
                           <p>
                             富田農場是位於日本北海道空知郡中富良野町北星地區一個種植花卉的農場，以大面積的薰衣草花田聞名，也種其他花卉，如罌粟花、菊花等。近年農場更成為旅遊熱點，是旅遊北海道人士必到之處。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--富田農場 END-->

                         
                       <!--登別地獄谷-->
                       <div id="Noboribetsu_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/hokkaido/detail/07_Big.jpg"><br>
                           <span>圖/卡優新聞網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">登別地獄谷</h3>
                           <p>
                             地獄谷是位日本北海道登別市的一個火山口遺跡，鄰近洞爺湖，大約在一萬年前形成，有直徑大約450米的地方依然在噴白煙，而且寸草不生，又有強烈硫磺味，由於就像在地獄之中，因而得名。地獄谷提供多達11種不同礦物質的泉水給附近的有名的登別溫泉，早在百多年前已有人懂得在地獄谷開採泉水。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--登別地獄谷 END-->
                       
                       <!--小樽運河-->
                       <div id="Otaru_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/hokkaido/detail/09_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">小樽運河</h3>
                           <p>
                             小樽運河是日本北海道小樽市的一處地標，運河沿岸排列著一排紅磚倉庫，是小樽市作作為日本北海道金融、經濟中心的象徵，甚至被人稱爲「北方的華爾街」 北海道的小樽市靠海，景色迷人，加上小樽市內有很多很有特色的歷史建築， 還有必定到訪的小樽運河、小樽堺町通り商店街 。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--小樽運河 END-->
                       
                       <!--北海道大學-->
                       <div id="Hokkaido_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/hokkaido/detail/02_Big.jpg"><br>
                           <span>圖/卡優新聞網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">北海道大學</h3>
                           <p>
                             北海道大學校園中的歐風建築，宛如漫步於歐洲，春天可以賞櫻，夏天有翠綠的林蔭大道，秋天為賞楓及賞銀杏的知名勝地，冬天被白雪覆蓋，校原一片銀白美景，不但可欣賞四季美景，還可以品嘗到平價的校園美食。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--北海道大學 END-->

                       <!--洞爺湖-->
                       <div id="Lake_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/hokkaido/detail/01_Big.jpg"><br>
                           <span>圖/卡優新聞網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">洞爺湖</h3>
                           <p>
                             洞爺湖位於北海道西南部，屬於支笏洞爺國立公園。20 世紀初葉火山爆發頻繁，陷沒後形成了這座湖泊，被選入日本地質公園和世界地質公園。湖面在冬天也不會凍結，是日本最北端的不凍湖，一年四季蕩漾著清麗的湖水。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--洞爺湖 END-->
                        

                       <!--熊牧場-->
                       <div id="Bear_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/hokkaido/detail/04_Big.jpg"><br>
                           <span>圖/熊牧場官網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">熊牧場</h3>
                           <p>
                             為了保護瀕臨滅絕的北海道棕熊，1958年加森藤雄在四方嶺山上規劃了一塊原始保育林放養棕熊。後來這塊保育林就變成現在的熊牧場。登別熊牧場飼養約140隻全日本最大的陸地動物-蝦夷棕熊。這裡有世界上唯一的棕熊博物館，供遊客觀察棕熊的生態。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--熊牧場 END-->

                       <!--函館-->
                       <div id="Hakodate_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/hokkaido/detail/05_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">函館</h3>
                           <p>
                             函館夜景被形容為如散落的珠寶箱，與香港的百萬夜景齊名，由函館山山頂遙望，函館市區、港灣、津輕海峽的美景，瑰麗炫爛，萬家燈火在腳下閃耀，海面映著街燈，光影隨著波浪，如萬道金蛇翻騰。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--函館 END-->  
                        



                     </div>
                     <!-- 旅遊景點說明 END -->




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

                            <div class="row no-gutters travel_about text-center">
                                <div class="col-md-6">
                                   <a href="#">
                                       <div class="img_div wx-100-ph" title="新聞" style="background-image: url(../../img/component/photo1.jpg);">
                                       </div>
                                        <h6><img src="../../img/component/icon/map-icon.png">超殺攻略！淺草晴空塔趴趴GO</h6>
                                   </a>
                                   
                                </div>
                                <div class="col-md-6">
                                   <a href="#">
                                       <div class="img_div wx-100-ph" title="新聞" style="background-image: url(../../img/component/photo1.jpg);">
                                       </div>
                                       <h6><img src="../../img/component/icon/map-icon.png">超殺攻略！淺草晴空塔趴趴GO</h6>
                                   </a>
                                    
                                </div>
                                
                            </div>
                            <div class="row no-gutters travel_about text-center">
                                <div class="col-md-6">
                                   <a href="#">
                                       <div class="img_div wx-100-ph" title="新聞" style="background-image: url(../../img/component/photo1.jpg);">
                                       </div>
                                        <h6><img src="../../img/component/icon/map-icon.png">超殺攻略！淺草晴空塔趴趴GO</h6>
                                   </a>
                                   
                                </div>
                                <div class="col-md-6">
                                   <a href="#">
                                       <div class="img_div wx-100-ph" title="新聞" style="background-image: url(../../img/component/photo1.jpg);">
                                       </div>
                                        <h6><img src="../../img/component/icon/map-icon.png">超殺攻略！淺草晴空塔趴趴GO</h6>
                                    
                                </div>
                                
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

                           <div class="row no-gutters">
                               <div class="col-md-4 cards-3 py-2">
                                  <a href="#">
                                      <div class="img_div w-100-ph" title="新聞" style="background-image: url(../../img/component/photo1.jpg);">
                                      </div>
                                      <p>遊日血拚大回饋，信用卡大調查</p>
                                  </a>
                               </div>
                               <div class="col-md-4 cards-3 py-2">
                                  <a href="#">
                                      <div class="img_div w-100-ph" title="新聞" style="background-image: url(../../img/component/photo1.jpg);">
                                      </div>
                                      <p>遊日血拚大回饋，信用卡大調查</p>
                                  </a>
                               </div>
                               <div class="col-md-4 cards-3 py-2">
                                  <a href="#">
                                      <div class="img_div w-100-ph" title="新聞" style="background-image: url(../../img/component/photo1.jpg);">
                                      </div>
                                      <p>遊日血拚大回饋，信用卡大調查</p>
                                  </a>
                               </div>
                               
                           </div>
                          
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

                            <div class="fb-comments" data-width="100%" data-href="http://srl.tw/cardu/news_detail.html" data-numposts="5"></div>
                           
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
            <div class="index-content-right col0">
                
                <div class="row">
                   <div class="col-md-12 col">
                           <div class="cardshap hotCard tab_one green_tab">
                               <div class="title_tab hole">
                                   <h4>熱門情報</h4>
                                   <span>謹慎理財 信用至上</span>
                               </div>
                               <div class="content_tab">
                                    <!-- 熱門情報輪播 -->
                           <div class="swiper-container HotNews_slide">
                               <div class="swiper-wrapper">

                                   <div class="swiper-slide" > 
                                     <div class="row no-gutters">
                                       <div class="col-5">
                                         <a class="img_a" href="#">
                                           <div class="img_div w-h-100" title="新聞" style="background-image: url(../../img/component/photo1.jpg);"></div>
                                         </a>
                                       </div>
                                       <div class="col-7">
                                        <a href="#">
                                          <h4>匯豐現金回饋玉璽卡</h4>
                                        </a>
                                         <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                       </div>
                                     </div>

                                     <div class="row no-gutters">
                                       <div class="col-5">
                                        <a class="img_a" href="#">
                                         <div class="img_div w-h-100" title="新聞" style="background-image: url(../../img/component/photo1.jpg);"></div>
                                        </a>
                                       </div>
                                       <div class="col-7">
                                        <a href="#">
                                         <h4>匯豐現金回饋玉璽卡</h4>
                                        </a>
                                         <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                       </div>
                                     </div>

                                     <div class="row no-gutters">
                                       <div  class="col-5">
                                        <a class="img_a" href="#">
                                          <div class="img_div w-h-100" title="新聞" style="background-image: url(../../img/component/photo1.jpg);"></div>
                                        </a>
                                       </div>
                                       <div class="col-7">
                                        <a href="#">
                                          <h4>匯豐現金回饋玉璽卡</h4>
                                        </a>
                                         <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                       </div>
                                     </div>
                                   </div>

                                   <div class="swiper-slide" > 
                                     <div class="row no-gutters">
                                       <div class="col-5">
                                         <a class="img_a" href="#">
                                           <div class="img_div w-h-100" title="新聞" style="background-image: url(../../img/component/photo1.jpg);"></div>
                                         </a>
                                       </div>
                                       <div class="col-7">
                                        <a href="#">
                                          <h4>匯豐現金回饋玉璽卡</h4>
                                        </a>
                                         <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                       </div>
                                     </div>

                                     <div class="row no-gutters">
                                       <div class="col-5">
                                        <a class="img_a" href="#">
                                         <div class="img_div w-h-100" title="新聞" style="background-image: url(../../img/component/photo1.jpg);"></div>
                                        </a>
                                       </div>
                                       <div class="col-7">
                                        <a href="#">
                                         <h4>匯豐現金回饋玉璽卡</h4>
                                        </a>
                                         <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                       </div>
                                     </div>

                                     <div class="row no-gutters">
                                       <div  class="col-5">
                                        <a class="img_a" href="#">
                                          <div class="img_div w-h-100" title="新聞" style="background-image: url(../../img/component/photo1.jpg);"></div>
                                        </a>
                                       </div>
                                       <div class="col-7">
                                        <a href="#">
                                          <h4>匯豐現金回饋玉璽卡</h4>
                                        </a>
                                         <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                       </div>
                                     </div>
                                   </div>

                                   <div class="swiper-slide" > 
                                     <div class="row no-gutters">
                                       <div class="col-5">
                                         <a class="img_a" href="#">
                                           <div class="img_div w-h-100" title="新聞" style="background-image: url(../../img/component/photo1.jpg);"></div>
                                         </a>
                                       </div>
                                       <div class="col-7">
                                        <a href="#">
                                          <h4>匯豐現金回饋玉璽卡</h4>
                                        </a>
                                         <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                       </div>
                                     </div>

                                     <div class="row no-gutters">
                                       <div class="col-5">
                                        <a class="img_a" href="#">
                                         <div class="img_div w-h-100" title="新聞" style="background-image: url(../../img/component/photo1.jpg);"></div>
                                        </a>
                                       </div>
                                       <div class="col-7">
                                        <a href="#">
                                         <h4>匯豐現金回饋玉璽卡</h4>
                                        </a>
                                         <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                       </div>
                                     </div>

                                     <div class="row no-gutters">
                                       <div  class="col-5">
                                        <a class="img_a" href="#">
                                          <div class="img_div w-h-100" title="新聞" style="background-image: url(../../img/component/photo1.jpg);"></div>
                                        </a>
                                       </div>
                                       <div class="col-7">
                                        <a href="#">
                                          <h4>匯豐現金回饋玉璽卡</h4>
                                        </a>
                                         <p>國內消費享1.22% <br> 國內消費享2.22%</p>
                                       </div>
                                     </div>
                                   </div>
                               </div>
                               
                               <!-- 如果需要导航按钮 -->
                               <div class="swiper-button-prev"><i class=" fa fa-angle-left"></i></div>
                               <div class="swiper-button-next"><i class=" fa fa-angle-right"></i></div>
                               
                           </div>
                           <!-- 熱門情報輪播 END -->
                               </div>
                           </div>
                       </div>

                      <div class="col-md-12 col">
                      <div class="green_tab">
                       <form class="row search_from">
                        <input type="text" class="journey_search" value="請輸入優旅行要查詢的字串">  
                        <button>搜尋</button>
                       </form>
                      </div>  
                     </div>  

                    <div class="col-md-12 col">
                       <div class="cardshap hotCard tab_one green_tab">
                           <div class="title_tab hole">
                               <h4>區域分類</h4>
                              
                           </div>
                           <div class="content_tab">
                             <div class="journey_icon">
                               <div class="row no-gutters">
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/about.php"> <i class="fa fa-arrow-circle-right mr-2"></i>東京篇</a>
                                 </div>
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/about_4.php"><i class="fa fa-arrow-circle-right mr-2"></i>東北篇</a>
                                 </div>
                               </div>
                               <hr>
                                <div class="row no-gutters">
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/about_2.php"><i class="fa fa-arrow-circle-right mr-2"></i>關西篇</a>
                                 </div>
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/about_5.php"><i class="fa fa-arrow-circle-right mr-2"></i>九州篇</a>
                                 </div>
                               </div>
                               <hr>
                                <div class="row no-gutters">
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/about_3.php"><i class="fa fa-arrow-circle-right mr-2"></i>北海道篇</a>
                                 </div>
                                 <div class="col-6">
                                  <a href="http://cardu.srl.tw/travel/jp/about_6.php"><i class="fa fa-arrow-circle-right mr-2"></i>沖繩篇</a>
                                 </div>
                               </div>
                             </div>

                           </div>
                       </div>
                    </div>
                    <!-- 廣告 -->
                       <div class="col-md-12 col">
                           <img src="http://placehold.it/300x250" alt="">
                       </div>
                    
                     <!-- 辦卡推薦 -->
                      <div class="col-md-12 col">
                      <div class="cardshap hotCard tab_one green_tab">
                          <div class="title_tab hole">
                              <h4>辦卡推薦 </h4>
                          </div>
                          <div class="content_tab">
                              <div class="row no-gutters">
                                <div class="col-5">
                                 <a class="img_a" href="#">
                                   <div class="img_div w-h-100" title="新聞" style="background-image: url(../../img/component/photo1.jpg);"></div>
                                   
                                 </a>
                                 <span>謹慎理財 信用至上</span>
                                </div>
                                <div class="col-7">
                                 <a href="#">
                                   <h4>匯豐現金回饋玉璽卡</h4>
                                 </a>
                                  <p><b>★</b>國內現金回饋1.22%<br><b> ★</b>國外現金回饋2.22%<br><b>★</b>高額旅遊平安險<br><b>★</b>華航機票優惠</p>
                                </div>
                              </div>

                              <div class="row no-gutters">
                                <div class="col-5">
                                 <a class="img_a" href="#">
                                   <div class="img_div w-h-100" title="新聞" style="background-image: url(../../img/component/photo1.jpg);"></div>

                                 </a> 
                                 <span>謹慎理財 信用至上</span>
                                </div>
                                <div class="col-7">
                                 <a href="#">
                                   <h4>匯豐現金回饋玉璽卡</h4>
                                 </a>
                                   <p><b>★</b>國內現金回饋1.22%<br><b> ★</b>國外現金回饋2.22%<br><b>★</b>高額旅遊平安險<br><b>★</b>華航機票優惠</p>
                                </div>
                              </div>

                          </div>
                      </div>
                   </div>
                   <!--辦卡推薦end-->
                   <!-- 廣告 -->
                       <div class="col-md-12 col">
                           <img src="http://placehold.it/300x250" alt="">
                       </div>
                   <!-- 廣告end-->
                   <div class="col-md-12 col">
                      <div class="cardshap tab_one green_tab">
                          <div class="title_tab hole">
                              <h4>熱門旅行</h4>
                          </div>
                          <div class="content_tab">
                              <ul class="tab_list cardu_li">
                               <li><a href="">想辦卡看這篇　新戶辦卡懶人包</a></li>
                               <li><a href="">想辦卡看這篇　新戶辦卡懶人包</a></li>
                               <li><a href="">想辦卡看這篇　新戶辦卡懶人包</a></li>
                               <li><a href="">想辦卡看這篇　新戶辦卡懶人包</a></li>
                           </ul>
                          </div>
                      </div>
                   </div>
                   <!-- 廣告 -->
                       <div class="col-md-12 col">
                           <img src="http://placehold.it/300x250" alt="">
                       </div>
                   <!-- 廣告end-->
                   <!-- 廣告 -->
                       <div class="col-md-12 col">
                           <img src="http://placehold.it/300x250" alt="">
                       </div>
                   <!-- 廣告end-->

                    

                  

                    
                    <?php 
                     //-- 共用Footer --
                     if (wp_is_mobile()) {
                        require '../../share_area/phone/footer.php';
                     }
                     else{
                       require '../../share_area/footer.php';
                      }
                    ?>
                    

                </div>
            </div>
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