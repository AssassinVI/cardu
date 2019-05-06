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
                            <a class="nav-link py-2 active show" id="special_2-tab" href="javascript:;" tab-target="#special_2" aria-selected="false">沖繩景點</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                         
                          <div class="tab-pane fade active show" id="special_2" role="tabpanel" aria-labelledby="special_2-tab">
                             <div class="row no-gutters hv-center">
                              <div class="map">
                                <div class="row no-gutters hv-center">
                                    <img class="photo" src="../../img/component/travel/okinnawa/map-bg.jpg" title="新聞">


                                    <div class="CA phone_hidden"><!--美麗海水族館-->
                                    <a data-fancybox data-src="#CA_detail" href="javascript:;"><img src="../../img/component/travel/okinnawa/01.png" width="89" height="31" ></a>
                                    <div class="CA-01"><a data-fancybox data-src="#CA_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/okinnawa/01-1.png" width="180" height="120"></a></div>

                                    </div><!--美麗海水族館結束-->


                                    <div class="Nakijin phone_hidden"><!--今歸仁城-->
                                    <a data-fancybox data-src="#Nakijin_detail" href="javascript:;"><img src="../../img/component/travel/okinnawa/02.png" width="71" height="31"></a>
                                    <div class="Nakijin-01"><a data-fancybox data-src="#Nakijin_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/okinnawa/02-1.png" width="180" height="120"></a></div>
                                    </div><!--今歸仁城結束-->


                                    <div class="AUI phone_hidden"><!--古宇利島-->
                                    <a data-fancybox data-src="#AUI_detail" href="javascript:;"><img src="../../img/component/travel/okinnawa/03.png" width="71" height="31"></a>
                                    <div class="AUI-01"><a data-fancybox data-src="#AUI_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/okinnawa/03-1.png" width="180" height="120"></a></div>
                                    </div><!--古宇利島結束-->


                                    <div class="Sea phone_hidden"><!--海中展望台-->
                                    <a data-fancybox data-src="#Sea_detail" href="javascript:;"><img src="../../img/component/travel/okinnawa/04.png" width="71" height="31"></a>
                                    <div class="Sea-01"><a data-fancybox data-src="#Sea_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/okinnawa/04-1.png" width="180" height="120"></a></div>
                                    </div><!--海中展望台結束-->


                                    <div class="Manzamoo phone_hidden"><!--萬座毛-->
                                    <a data-fancybox data-src="#Manzamoo_detail" href="javascript:;"><img src="../../img/component/travel/okinnawa/05.png" width="69" height="28"></a>
                                    <div class="Manzamoo-01"><a data-fancybox data-src="#Manzamoo_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/okinnawa/05-1.png" width="180" height="120"></a></div>
                                    </div><!--萬座毛結束-->

                                    <div class="Pink-Mermaid phone_hidden"><!--真榮田岬-->
                                    <a data-fancybox data-src="#Pink-Mermaid_detail" href="javascript:;"><img src="../../img/component/travel/okinnawa/06.png" width="69" height="28"></a>
                                    <div class="Pink-Mermaid-01"><a data-fancybox data-src="#Pink-Mermaid_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/okinnawa/06-1.png" width="180" height="120"></a></div>
                                    </div><!--真榮田岬結束-->

                                    <div class="Ryukyu phone_hidden"><!--琉球村-->
                                    <a data-fancybox data-src="#Ryukyu_detail" href="javascript:;"><img src="../../img/component/travel/okinnawa/07.png" width="73" height="30"></a>
                                    <div class="Ryukyu-01"><a data-fancybox data-src="#Ryukyu_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/okinnawa/07-1.png" width="180" height="120"></a></div>
                                    </div><!--琉球村結束-->


                                    <div class="Residual phone_hidden"><!--殘波岬-->
                                    <a data-fancybox data-src="#Residual_detail" href="javascript:;"><img src="../../img/component/travel/okinnawa/08.png" width="69" height="30"></a>
                                    <div class="Residual-01"><a data-fancybox data-src="#Residual_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src='../../img/component/travel/okinnawa/08-1.png' width="180" height="120"></a></div>
                                    </div><!--殘波岬結束-->

                                    <div class="Katsuren phone_hidden"><!--勝連城跡-->
                                    <a data-fancybox data-src="#Katsuren_detail" href="javascript:;"><img src="../../img/component/travel/okinnawa/09.png" width="74" height="30"></a>
                                    <div class="Katsuren-01"><a data-fancybox data-src="#Katsuren_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/okinnawa/09-1.png" width="180" height="120"></a></div>
                                    </div><!--勝連城跡結束-->

                                    <div class="American phone_hidden"><!--美國村-->
                                    <a data-fancybox data-src="#American_detail" href="javascript:;"><img src="../../img/component/travel/okinnawa/10.png" width="72" height="30"></a>
                                    <div class="American-01"><a data-fancybox data-src="#American_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/okinnawa/10-1.png" width="180" height="120"></a></div>
                                    </div><!--美國村結束-->
 
                                    <div class="urasoe-park phone_hidden"><!--浦添大公園-->
                                    <a data-fancybox data-src="#urasoe-park_detail" href="javascript:;"><img src="../../img/component/travel/okinnawa/11.png" width="66" height="35"></a>
                                    <div class="urasoe-park-01"><a data-fancybox data-src="#urasoe-park_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/okinnawa/11-1.png" width="180" height="120"></a></div>
                                    </div><!--浦添大公園結束-->

                                    <div class="Naminoue phone_hidden"><!--波上宮-->
                                    <a data-fancybox data-src="#Naminoue_detail" href="javascript:;"><img src="../../img/component/travel/okinnawa/12.png" width="49" height="33"></a>
                                    <div class="Naminoue-01"><a data-fancybox data-src="#Naminoue_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/okinnawa/12-1.png" width="180" height="120"></a></div>
                                    </div><!--波上宮結束-->

                                    <div class="Shuri phone_hidden"><!--首里城-->
                                    <a data-fancybox data-src="#Shuri_detail" href="javascript:;"><img src="../../img/component/travel/okinnawa/13.png" width="72" height="33"></a>
                                    <div class="Shuri-01"><a data-fancybox data-src="#Shuri_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/okinnawa/13-1.png" width="180" height="120"></a></div>
                                    </div><!--首里城結束-->

                                    <div class="Kokusai phone_hidden"><!--國際通-->
                                    <a data-fancybox data-src="#Kokusai_detail" href="javascript:;"><img src="../../img/component/travel/okinnawa/14.png" width="72" height="31"></a>
                                    <div class="Kokusai-01"><a data-fancybox data-src="#Kokusai_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/okinnawa/14-1.png" width="180" height="120"></a></div>
                                    </div><!--國際通結束-->

                                    <div class="Yuquan phone_hidden"><!--玉泉洞-->
                                    <a data-fancybox data-src="#Yuquan_detail" href="javascript:;"><img src="../../img/component/travel/okinnawa/15.png" width="72" height="31"></a>
                                    <div class="Yuquan-01"><a data-fancybox data-src="#Yuquan_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/okinnawa/15-1.png" width="180" height="120"></a></div>
                                    </div><!--玉泉洞結束-->


                                    
                                </div>
                              </div>
                              
                              
                              

                            </div>
                            
                             
                           
                          </div>
                        
                          
                        </div>
                      </div>




                      <!-- 旅遊景點說明 -->
                     <div class="fancybox-div">
                       
                       <!--沖繩美麗海水族館-->
                       <div id="CA_detail" style="width:800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/okinnawa/detail/01_Big .jpg"><br>
                           <span>圖/卡優新聞網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">沖繩美麗海水族館</h3>
                           <p>
                             位於日本沖繩縣國頭郡本部町的海洋博公園內，是沖繩的著名景點，該館以沖繩的海洋為展示概念，展出珊瑚礁、黑潮之海、深海等各式海洋生物，其中最著名的有世界第一尾成功長期飼養的鯨鯊及蝠魟。水族館旁亦設有海豚表演、海龜館、海牛館等主題館，是可以近距離感受海洋魅力的好去處。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--沖繩美麗海水族館 END-->


                       <!--今歸仁城-->
                       <div id="Nakijin_detail" style="width:800px">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/okinnawa/detail/03_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">今歸仁城</h3>
                           <p>
                             今歸仁城別名北山城，是位於沖繩縣今歸仁村的城堡遺跡。昔日琉球曾經分為北山、中山和南山三股勢力，今歸仁城為北山國王的居所。後因十八世紀薩摩籓侵略琉球緣故，將城堡給破壞，現在看見保存較好的部分只有城牆，為日本指定史跡之一。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--今歸仁城 END-->


                       <!--古宇利島-->
                       <div id="AUI_detail" style="width:800px">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/okinnawa/detail/02_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">古宇利島</h3>
                           <p>
                             古宇利島是位於沖繩本島北部屋我地島以北，屬今歸仁村的一座島嶼。以其美麗的海洋景觀和琉球人起源傳說(創世神阿摩美久祈求天帝所賜的一對男女)而聞名。面積3.13km，周長約8公里，外形幾乎為圓形，是一座隆起的珊瑚礁小島，島上大多數人從事農業，也有一些人從事漁業和服務業，主要農產品是甘蔗和紅芋，海膽也十分有名。。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--古宇利島 END-->


                       <!--海中展望台-->
                       <div id="Sea_detail" style="width:800px">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/okinnawa/detail/04_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">海中展望台</h3>
                           <p>
                             海中展望塔屹立在珊瑚礁叢生的大海中，以棧橋相連，距離海岸170米處。海上展望塔可眺望四周碧綠的大海，在步下50階的螺旋階梯後，共有24面360度的海中觀景窗，可觀賞深入水深4公尺下的沖繩美麗的珊瑚礁和各種熱帶魚。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--海中展望台 END-->
                       
                       <!--萬座毛-->
                       <div id="Manzamoo_detail" style="width:800px">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/okinnawa/detail/05_Big.jpg"><br>
                           <span>圖/易遊網提供</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">萬座毛</h3>
                           <p>
                             萬座毛是位於沖繩西海岸的觀光景點，特徵是在海岸的峭壁上，有著像大象鼻子形狀的海蝕地形，琉球王朝尚敬王曾造訪此地，並讚嘆為「萬人可坐的毛」故取其名(毛意謂草原之意)，自然生長的綠草披覆於高度約達20公尺的斷崖絕壁上，景色雄偉壯麗。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--萬座毛 END-->
                      
                       <!--真榮田岬-->
                       <div id="Pink-Mermaid_detail" style="width:800px">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/okinnawa/detail/06_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">真榮田岬</h3>
                           <p>
                             真榮田岬是由隆起的珊瑚礁形成陡峭的真榮田岬，呈現大自然的狀闊的美景。從真榮田岬上的觀景台眺望大海，壯觀無比，真榮田岬上有一條全長200米的步道，可下至海邊，也是觀賞熱帶魚及珊瑚礁的著名潛水點，真榮田岬有著全世界唯二的青之洞窟，也是浮潛必去朝聖的景點(全世界只有兩個地方有青之洞窟，一在義大利，另一個就是真榮田岬)。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--真榮田岬 END-->

                       <!--琉球村-->
                       <div id="Ryukyu_detail" style="width:800px">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/okinnawa/detail/07_Big.jpg"><br>
                           <span>圖/琉球村官網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">琉球村</h3>
                           <p>
                             「琉球村」是體驗型主題公園，凝聚了沖繩文化、藝能與自然景觀。穿過主要大門，彷彿來到另一個世界。100～200年的古民宅從沖繩各地遷移至此，座落於園內，成為古色古香的村落，也被指定為國家登記有形文化財的珍貴古民宅，在這裡還可欣賞村民們彈奏傳統樂器的音色，享受悠閒時光。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--琉球村 END-->
                       

                       <!--殘波岬-->
                       <div id="Residual_detail" style="width:800px">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/okinnawa/detail/08_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">殘波岬</h3>
                           <p>
                             連綿2公里長由珊瑚礁形成的30米高斷崖，是沖繩著名海景，一望無際的碧海藍天之間，聳立著沖繩本島最西端的白色燈塔，也是觀賞夕陽的熱門景點。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--殘波岬 END-->

                       <!--勝連城跡-->
                       <div id="Katsuren_detail" style="width:800px">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/okinnawa/detail/10_Big.jpg"><br>
                           <span>圖/勝連城跡官網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">勝連城跡</h3>
                           <p>
                             勝連城跡約建於13至14世紀之間，分為南城、內城、北城三個城郭。於1972年5月被指定為國家的歷史遺跡，2000年12月作為“琉球王國的首里城及相關遺產群”之一，與其他8個文化遺產一起正式列入世界遺產名錄下。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--勝連城跡 END-->

                         
                       <!--美國村-->
                       <div id="American_detail" style="width:800px">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/okinnawa/detail/09_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">美國村</h3>
                           <p>
                             美國村位於那霸市東北約20km處，該區是利用美軍駐日基地遺址所建設而成，洋溢著濃濃美式風情，村內充斥著美國村標誌，像大摩天輪、電影院、大型超市、大飯店、餐館、咖啡館等，深受年輕人的喜愛。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--美國村 END-->
                       
                       <!--浦添大公園-->
                       <div id="urasoe-park_detail" style="width:800px">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/okinnawa/detail/11_Big.jpg"><br>
                           <span>圖/浦添市網站</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">浦添大公園</h3>
                           <p>
                             浦添大公園離那霸市區只需約15分鐘車程，是一個位置優越的縣營綜合公園，佔地面積廣達37萬平方公尺。這座公園中最受歡迎的是遊樂廣場，其中全長90公尺以上的超長滾輪式溜滑梯，不僅是當地人親子假日的熱門據點，就連觀光客也常來遊玩，已成為口耳相傳的熱門親子景點。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--浦添大公園 END-->
                       
                       <!--波上宮-->
                       <div id="Naminoue_detail" style="width:800px">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/okinnawa/detail/12_Big.jpg"><br>
                           <span>圖/雄獅旅遊</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">波上宮</h3>
                           <p>
                             波上宮是位在日本沖繩縣那霸市的神社。為琉球八社之一，八社之最上位，為「沖繩總鎮守」。琉球王朝時代（1429年～1879年）它在王府特別重視的八大神社中地位最高，成為每年新年國王參拜的特殊神社。現在它也擁有沖繩第一的參拜人數，近年來有眾多外國遊客造訪，已成為沖繩具有代表性的人氣景點。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--波上宮 END-->

                       <!--首里城-->
                       <div id="Shuri_detail" style="width:800px">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/okinnawa/detail/15_Big.jpg"><br>
                           <span>圖/雄獅旅遊</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">首里城</h3>
                           <p>
                             首里城是位於琉球群島的沖繩島內南部，那霸市以東一座琉球式城堡，從15世紀至19世紀是琉球國的都城所在地和王宮。首里城一直是琉球王國的都城所在，也是琉球王國政治、經濟、文化和對外貿易的中心。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--首里城 END-->
                        

                       <!--國際通-->
                       <div id="Kokusai_detail" style="width:800px">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/okinnawa/detail/14_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">國際通</h3>
                           <p>
                             國際通是沖繩縣那霸市縣廳前交差點至安里三叉路之間的一段約1.6公里的大街。該大街是那霸市最繁華的商業街。國際通最早建成於1933年，是當時連接原那霸市中心至首里市的最短的路線，原名「新縣道」。1944年沖繩島戰役之後，美國佔領了琉球群島，將路更名為國際通。沖繩人也紛紛來到這裡經商，百貨、商場等拔地而起，國際通成為那霸最繁華的地段，被人稱為「奇跡的一英里」。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--國際通 END-->

                       <!--玉泉洞-->
                       <div id="Yuquan_detail" style="width:800px">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/okinnawa/detail/13_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">玉泉洞</h3>
                           <p>
                             玉泉洞和王國村位於沖繩世界中，沖繩世界是一個主題公園，玉泉洞為日本第二長鐘乳石洞，全長有5公里，但僅對外開放850公尺，但全程走完也需半小時；而琉球王國村呈現琉球王朝時代的街道風貌，可以親手嚐試製作琉球玻璃等傳統工藝，是沖繩最大型體驗琉球文化的主題園區。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--玉泉洞 END-->  
                        



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