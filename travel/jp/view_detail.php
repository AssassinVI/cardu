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
                            <a class="nav-link py-2 active show" id="special_2-tab" href="javascript:;" tab-target="#special_2" aria-selected="false">東京景點</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                         
                          <div class="tab-pane fade active show" id="special_2" role="tabpanel" aria-labelledby="special_2-tab">
                             <div class="row no-gutters hv-center">
                              <div class="map">
                                <div class="row no-gutters hv-center">
                                    <img class="photo" src="../../img/component/map-bg0.jpg" title="新聞">


                                    <div class="UENO phone_hidden"><!--上野-->
                                    <a data-fancybox data-src="#UENO_detail" href="javascript:;"><img src="../../img/component/travel/York/01.png" width="50" height="50" ></a>
                                    <div class="UENO-01"><a data-fancybox data-src="#UENO_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/York/01-1.png" width="180" height="120"></a></div>
                                    </div><!--上野結束-->
                                    


                                    <div class="AKIBA phone_hidden"><!--秋葉原-->
                                    <a data-fancybox data-src="#AKIBA_detail" href="javascript:;"><img src="../../img/component/travel/York/02.png" width="50" height="50"></a>
                                    <div class="AKIBA-01"><a data-fancybox data-src="#AKIBA_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/York/02-1.png" width="180" height="120"></a></div>
                                    </div><!--秋葉原結束-->
                                  


                                    <div class="TOKYO phone_hidden"><!--東京-->
                                    <a data-fancybox data-src="#TOKYO_detail" href="javascript:;"><img src="../../img/component/travel/York/04.png" width="50" height="50"></a>
                                    <div class="TOKYO-01"><a data-fancybox data-src="#TOKYO_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/York/04-1.png" width="180" height="120"></a></div>
                                    </div><!--東京結束-->


                                    <div class="ASAKUSA phone_hidden"><!--淺草-->
                                    <a data-fancybox data-src="#ASAKUS_detail" href="javascript:;"><img src="../../img/component/travel/York/03.png" width="50" height="50"></a>
                                    <div class="ASAKUSA-01"><a data-fancybox data-src="#ASAKUS_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/York/03-1.png" width="180" height="120"></a></div>
                                    </div><!--淺草-->


                                    <div class="NIA phone_hidden"><!--成田機場-->
                                    <img src="../../img/component/travel/York/16.png" width="90" height="40">
                                    </div><!--成田機場結束-->

                                    <div class="GINZAA phone_hidden"><!--銀座-->
                                    <a data-fancybox data-src="#GINZAA_detail" href="javascript:;"><img src="../../img/component/travel/York/05.png" width="50" height="50"></a>
                                    <div class="GINZAA-01"><a data-fancybox data-src="#GINZAA_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/York/05-1.png" width="180" height="120"></a></div>
                                    </div><!--銀座結束-->
                                    

                                    <div class="TSUKIJI phone_hidden"><!--築地-->
                                    <a data-fancybox data-src="#TSUKIJI_detail" href="javascript:;"><img src="../../img/component/travel/York/06.png" width="50" height="50"></a>
                                    <div class="TSUKIJI-01"><a data-fancybox data-src="#TSUKIJI_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/York/06-1.png" width="180" height="120"></a></div>
                                    </div><!--築地結束-->
                                    

                                    <div class="ODAIBA phone_hidden"><!--台場-->
                                    <a data-fancybox data-src="#ODAIBA_detail" href="javascript:;"><img src="../../img/component/travel/York/07.png" width="50" height="50"></a>
                                    <div class="ODAIBA-01"><a data-fancybox data-src="#ODAIBA_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/York/07-1.png" width="180" height="120"></a></div>
                                    </div><!--台場結束-->
                                    

                                    <div class="KEIKYU phone_hidden"><!--羽田機場-->
                                    <img src="../../img/component/travel/York/17.png" width="90" height="40">
                                    </div><!--羽田機場結束-->
                                    

                                    <div class="SHINAGAWA phone_hidden"><!--品川-->
                                    <a data-fancybox data-src="#SHINAGAWA_detail" href="javascript:;"><img src="../../img/component/travel/York/08.png" width="50" height="50"></a>
                                    <div class="SHINAGAWA-01"><a data-fancybox data-src="#SHINAGAWA_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src='../../img/component/travel/York/08-1.png' width="180" height="120"></a></div>
                                    </div><!--品川結束-->
                                    

                                    <div class="DAIKANYAMA phone_hidden"><!--代官山-->
                                    <a data-fancybox data-src="#DAIKANYAMA_detail" href="javascript:;"><img src="../../img/component/travel/York/10.png" width="50" height="50"></a>
                                    <div class="DAIKANYAMA-01"><a data-fancybox data-src="#DAIKANYAMA_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/York/10-1.png" width="180" height="120"></a></div>
                                    </div><!--代官山結束-->
                                    

                                    <div class="TSUNAGU phone_hidden"><!--涉谷-->
                                    <a data-fancybox data-src="#TSUNAGU_detail" href="javascript:;"><img src="../../img/component/travel/York/11.png" width="50" height="50"></a>
                                    <div class="TSUNAGU-01"><a data-fancybox data-src="#TSUNAGU_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/York/11-1.png" width="180" height="120"></a></div>
                                    </div><!--涉谷結束-->
                                    

                                    <div class="ROPPONGI phone_hidden"><!--六本木-->
                                    <a data-fancybox data-src="#ROPPONGI_detail" href="javascript:;"><img src="../../img/component/travel/York/09.png" width="50" height="50"></a>
                                    <div class="ROPPONGI-01"><a data-fancybox data-src="#ROPPONGI_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/York/09-1.png" width="180" height="120"></a></div>
                                    </div><!--六本木結束-->
                                    

                                    <div class="HARAJUKU phone_hidden"><!--原宿-->
                                    <a data-fancybox data-src="#HARAJUKU_detail" href="javascript:;"><img src="../../img/component/travel/York/12.png" width="50" height="50"></a>
                                    <div class="HARAJUKU-01"><a data-fancybox data-src="#HARAJUKU_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/York/12-1.png" width="180" height="120"></a></div>
                                    </div><!--原宿結束-->
                                    

                                    <div class="SHINJUKU phone_hidden"><!--新宿-->
                                    <a data-fancybox data-src="#SHINJUKU_detail" href="javascript:;"><img src="../../img/component/travel/York/13.png" width="50" height="50"></a>
                                    <div class="SHINJUKU-01"><a data-fancybox data-src="#SHINJUKU_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/York/13-1.png" width="180" height="120"></a></div>
                                    </div><!--新宿結束-->
                                    

                                    <div class="KICHIJOJI phone_hidden"><!--吉祥寺-->
                                    <a data-fancybox data-src="#KICHIJOJI_detail" href="javascript:;"><img src="../../img/component/travel/York/14.png" width="50" height="50"></a>
                                    <div class="KICHIJOJI-01"><a data-fancybox data-src="#KICHIJOJI_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/York/14-1.png" width="180" height="120"></a></div>
                                    </div><!--吉祥寺結束-->
                                    

                                    <div class="IKEBUKURO phone_hidden"><!--池袋-->
                                    <a data-fancybox data-src="#IKEBUKURO_detail" href="javascript:;"><img src="../../img/component/travel/York/15.png" width="50" height="50"></a>
                                    <div class="IKEBUKURO-01"><a data-fancybox data-src="#IKEBUKURO_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/York/15-1.png" width="180" height="120"></a></div>
                                    </div><!--池袋結束-->
                                    
                                </div>
                              </div>
                              
                              

                            </div>
                            
                             
                           
                          </div>
                        
                          
                        </div>
                      </div>




                     <!-- 旅遊景點說明 -->
                     <div class="fancybox-div">
                       
                       <!--上野-->
                       <div id="UENO_detail" style="width: 800px;" >
                        <div class="row">
                          <div class="col-md-6">
                            <img class="w-100" src="../../img/component/travel/York/detail/01_Big.jpg"><br>
                            <span>圖/卡優新聞網</span>
                          </div>
                          <div class="col-md-6">
                            <h3 class="view_title">上野</h3>
                            <p>
                              上野有著多元的風貌，匯集學術藝文經典，也充斥東京庶民風情。上野在明治時代成為文明開發之地，像是上野公園、上野動物園、國立博物館、國立西洋美術館等文化設施相繼建成；另外在上野站及御徒町站之間的區域，有著名的商店街「阿美橫丁」，整條街販售各式平價商店、藥妝店、還有平價美食，想要大肆血拼購物撿便宜，阿美橫丁絶對是不能錯過的地方。
                            </p>
                          </div>
                        </div>
                       </div>
                       <!--上野 END-->


                       <!--秋葉原-->
                       <div id="AKIBA_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/York/detail/02_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">秋葉原</h3>
                           <p>
                             秋葉原為日本最大的電器商店街，也是日本動漫文化的發源地。走出秋葉原車站，沿途可見大大小小的電器賣場及動漫產品海報。在這裡你可買到最新型的3C及動漫產品，故吸引不少電器迷及動漫迷前來朝聖，而第一家的女僕咖啡廳也誕生於此，可說是御宅族文化的發源地。
                           </p>
                         </div>
                       </div>
                       </div>
                       <!--秋葉原 END-->


                       <!--東京-->
                       <div id="TOKYO_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/York/detail/04_Big.jpg"><br>
                           <span>圖/卡優新聞網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">東京</h3>
                           <p>
                             以東京車站為中心，到皇居外苑之間的區域稱為丸之內，是日本政治和金融中心。具有百年歷史的東京車站是此地地標，在2012年整修竣工後，吸引不少遊客前來感受百年風華之美，在此區著名景點還有皇居及皇居外苑，皇居為日本天皇居住之地，入內參觀需要申請，皇居外苑有廣闊的草地與松木林，此處也是著名的賞櫻景點。
                           </p>
                         </div>
                       </div>
                       </div>
                       <!--東京 END-->


                       <!--淺草-->
                       <div id="ASAKUS_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/York/detail/03_Big.jpg"><br>
                           <span>圖/卡優新聞網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">淺草</h3>
                           <p>
                             淺草保留舊東京氛圍的風情，是初次造訪東京必去之地。淺草作為下町風情為主的旅遊景點，每天來此造訪的遊客絡繹不絕，除了懸掛大紅燈籠的雷門及淺草寺外，還有經營廚房器具相關用品的合羽橋道具街等特色商店街，也是吸引不少人前來採購的好去處。
                           </p>
                         </div>
                       </div>
                       </div>
                       <!--淺草 END-->
                       
                       <!--銀座-->
                       <div id="GINZAA_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/York/detail/05_Big.jpg"><br>
                           <span>圖/卡優新聞網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">銀座</h3>
                           <p>
                             銀座以高級購物商店聞名，是東京最具代表性地區之一。銀座是高級商店街象徵，故不少時尚名店紛紛在此設點，成為聚集各種頂尖時尚品牌地方，也吸引不少觀光客前來朝聖，故從1970年起，銀座通開始實施星期六、日禁止車輛行駛，行人能夠在大街上自由走動的「步行街」制度。此制度持續至今，假日來到銀座大街上無需在意車輛或紅綠燈，可自由自在享受購物樂趣。
                           </p>
                         </div>
                       </div>
                       </div>
                       <!--銀座 END-->
                      
                       <!--築地-->
                       <div id="TSUKIJI_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/York/detail/06_Big.jpg"><br>
                           <span>圖/卡優新聞網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">築地</h3>
                           <p>
                             築地有著日本最大海鮮批發市場而聞名，又因地利之便有各式種類豐富的料理店，也使得築地市場成為饕客們必定造訪的熱門景點。築地市場又分為場內市場及場外市場，場內市場聚集海鮮批發商，漁貨拍賣也在此進行；而場外市場則是日本著名的食品街，在此可買到各式日本食材。由於原先場內市場已不敷使用，將於2016年11月搬遷到豐洲市場。
                           </p>
                         </div>
                       </div>
                       </div>
                       <!--築地 END-->

                       <!--台場-->
                       <div id="ODAIBA_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/York/detail/07_Big.jpg"><br>
                           <span>圖/卡優新聞網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">台場</h3>
                           <p>
                             緊臨東京灣的台場，是近年來人氣急劇上升的熱門景點。台場海濱公園有著東京唯一的沙灘，還能眺望著名的彩虹大橋、自由女神像、東京鐵塔等，不論白天或黑夜，都可在此欣賞到不同的美景。除此之外，大型購物商場及各項設施在此林立，可盡情購物、玩樂及享用美食，非常適合全家大小消磨一整天的好去處。
                           </p>
                         </div>
                       </div>
                       </div>
                       <!--台場 END-->
                       

                       <!--品川-->
                       <div id="SHINAGAWA_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/York/detail/08_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">品川</h3>
                           <p>
                             為羽田機場前往東京的交通樞紐，是近年來備受矚目的新興地區。由於地利之便，在品川車站附近有多間大型酒店，區內的酒店客房數量為日本全國第一，不少旅客會選擇在此住宿。
                           </p>
                         </div>
                       </div>
                       </div>
                       <!--品川 END-->

                       <!--代官山-->
                       <div id="DAIKANYAMA_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/York/detail/10_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">代官山</h3>
                           <p>
                             此區有著獨特優雅悠閒的氛圍，也是文青咖最愛的東京區域。此區高級住宅區林立，不少歐美品牌在此設點，也有不少特色小店及露天咖啡座，每家店都有著不同的風格，也吸引不少人前往感受自在悠閒的生活步調！
                           </p>
                         </div>
                         </div>
                       </div>
                       <!--代官山 END-->

                         
                       <!--涉谷-->
                       <div id="TSUNAGU_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/York/detail/11_Big.jpg"><br>
                           <span>圖/卡優新聞網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">涉谷</h3>
                           <p>
                             集合日本年輕人最前端流行資訊的城市，為日本流行與時尚重要發源地。澀谷不僅是東京通往首都圈東南郊區的重要轉運點，擁有多家連鎖百貨公司，為東急集團的大本營。澀谷站前的八公銅像是澀谷著名地標；而澀谷站前十字路口則是東京知名城市地景之一，一天約有50萬行人在此通行，在交通高峰期還可看到上千人同時穿越馬路的驚人景象。
                           </p>
                         </div>
                       </div>
                       </div>
                       <!--涉谷 END-->
                       
                       <!--六本木-->
                       <div id="ROPPONGI_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/York/detail/09_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">六本木</h3>
                           <p>
                             想感受東京夜生活，欣賞百萬夜景的絕佳之地。六本木酒吧及夜店林立，由於店家大都營業到清晨，故以不夜城而聞名，也成為外國人及年輕人聚集之地。在六本木之丘森大樓，有著360度環景觀景台，可遠眺東京鐵塔、晴空塔等知名地標，入夜後的璀璨夜景更是美不勝收，六本木夜景也成為網友大推必看熱門景點。
                           </p>
                         </div>
                         </div>
                       </div>
                       <!--六本木 END-->
                       
                       <!--原宿-->
                       <div id="HARAJUKU_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/York/detail/12_Big.jpg"><br>
                           <span>圖/卡優新聞網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">原宿</h3>
                           <p>
                             融合時尚品牌及平價個性名店，是年輕人最愛的逛街好去處。原宿範圍約為明治神宮、代代木公園、竹下通、表參道這一帶。在原宿好逛又好買，一不小心荷包就會大失血，若不想逛街還可以到明治神宮散步，一走進去即可感受寧靜的氛圍，和熱鬧的街區有著天壤之別。
                           </p>
                         </div>
                       </div>
                       </div>
                       <!--原宿 END-->

                       <!--新宿-->
                       <div id="SHINJUKU_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/York/detail/13_Big.jpg"><br>
                           <span>圖/卡優新聞網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">新宿</h3>
                           <p>
                             東京最具代表性的繁華區域，以新宿車站為中心，集結各類商業設施，也是流行資訊的發源地。新宿東側和西側、白晝和夜晚，街道氛圍迥然不同。西側為東京都廳、辦公大樓及飯店林立的商業區；東側有著以繁華熱鬧而聞名的歌舞伎町、伊勢丹等老牌百貨商場，日夜人潮絡繹不絕，是日本有名的不夜城。
                           </p>
                         </div>
                       </div>
                       </div>
                       <!--新宿 END-->
                        

                       <!--吉祥寺-->
                       <div id="KICHIJOJI_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/York/detail/14_Big.jpg"><br>
                           <span>圖/吉祥寺官網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">吉祥寺</h3>
                           <p>
                             悠閒的生活步調及建全的生活機能，成為東京票選最想讓人居住的地區。該區有著有許多個性商店、藥妝、雜貨及美食，不同於其它市中心擁擠密集，生活步調也較為悠閒，在這裡逛街可說是一種很放鬆的享受！
                           </p>
                         </div>
                       </div>
                       </div>
                       <!--吉祥寺 END-->

                       <!--池袋-->
                       <div id="IKEBUKURO_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/York/detail/15_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">池袋</h3>
                           <p>
                             以池袋站為中心，周遭彙集大型百貨公司、專賣店及各式餐飲店等，是東京數一數二的血拼好去處。池袋站與新宿、澀谷並列為山手線的三大副都心之一，是日本具代表性車站之一，池袋站每日使用乘客數約270萬人，僅次於新宿站，也成為日本第2大繁忙的鐵路車站。
                           </p>
                         </div>
                       </div>
                       </div>
                       <!--池袋 END-->  
                        



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