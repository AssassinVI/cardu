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
                            <a class="nav-link py-2 active show" id="special_2-tab" href="javascript:;" tab-target="#special_2" aria-selected="false">關西景點</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                         
                          <div class="tab-pane fade active show" id="special_2" role="tabpanel" aria-labelledby="special_2-tab">
                             <div class="row no-gutters hv-center">
                              <div class="map">
                                <div class="row no-gutters hv-center">
                                    <img class="photo" src="../../img/component/travel/kansai/about_2/map-bg.jpg" title="新聞">

                                    <div class="Lanshan phone_hidden"><!--嵐山-->
                                    <a data-fancybox data-src="#Lanshan_detail" href="javascript:;"><img src="../../img/component/travel/kansai/01.png" width="55" height="28" ></a>
                                    <div class="Lanshan-01"><a data-fancybox data-src="#UENO_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/kansai/01-1.png" width="180" height="120"></a></div>

                                    </div><!--嵐山結束-->

                                    <div class="GPT phone_hidden"><!--金閣寺-->
                                    <a data-fancybox data-src="#GPT_detail" href="javascript:;"><img src="../../img/component/travel/kansai/02.png" width="55" height="28" ></a>
                                    <div class="GPT-01"><a data-fancybox data-src="#GPT_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/kansai/02-1.png" width="180" height="120"></a></div>

                                    </div><!--金閣寺結束-->

                                    <div class="Heian phone_hidden"><!--平安神宮-->
                                    <a data-fancybox data-src="#Heian_detail" href="javascript:;"><img src="../../img/component/travel/kansai/03.png" width="71" height="28"></a>
                                    <div class="Heian-01"><a data-fancybox data-src="#Heian_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/kansai/03-1.png" width="180" height="120"></a></div>
                                    </div><!--平安神宮結束-->

                                    <div class="Gion phone_hidden"><!--祇園-->
                                    <a data-fancybox data-src="#Gion_detail" href="javascript:;"><img src="../../img/component/travel/kansai/04.png" width="59" height="28"></a>
                                    <div class="Gion-01"><a data-fancybox data-src="#Gion_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/kansai/04-1.png" width="180" height="120"></a></div>
                                    </div><!--祇園結束-->

                                    <div class="Shijo phone_hidden"><!--四条河原町-->
                                    <a data-fancybox data-src="#Shijo_detail" href="javascript:;"><img src="../../img/component/travel/kansai/05.png" width="83" height="28">
                                    </a>
                                    <div class="Shijo-01"><a data-fancybox data-src="#Shijo_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/kansai/05-1.png" width="180" height="120"></a></div>
                                    </div><!--四条河原町結束-->

                                    <div class="Kiyomizu phone_hidden"><!--清水寺-->
                                    <a data-fancybox data-src="#Kiyomizu_detail" href="javascript:;"><img src="../../img/component/travel/kansai/06.png" width="75" height="28"></a>
                                    <div class="Kiyomizu-01"><a data-fancybox data-src="#Kiyomizu_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/kansai/06-1.png" width="180" height="120"></a></div>
                                    </div><!--清水寺結束-->

                                    <div class="Fushimi phone_hidden"><!--伏見稻荷大社-->
                                    <a data-fancybox data-src="#Fushimi_detail" href="javascript:;"><img src="../../img/component/travel/kansai/07.png" width="107" height="28"></a>
                                    <div class="Fushimi-01"><a data-fancybox data-src="#Fushimi_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/kansai/07-1.png" width="180" height="120"></a></div>
                                    </div><!--伏見稻荷大社結束-->

                                    <div class="Todaiji phone_hidden"><!--東大寺-->
                                    <a data-fancybox data-src="#Todaiji_detail" href="javascript:;"><img src="../../img/component/travel/kansai/08.png" height="39"></a>
                                    <div class="Todaiji-01"><a data-fancybox data-src="#Todaiji_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/kansai/08-1.png" width="180" height="120"></a></div>
                                    </div><!--東大寺結束-->

                                    <div class="Shinsaibashi phone_hidden"><!--心齋橋-->
                                    <a data-fancybox data-src="#Shinsaibashi_detail" href="javascript:;"><img src="../../img/component/travel/kansai/09.png" width="72" height="31"></a>
                                    <div class="Shinsaibashi-01"><a data-fancybox data-src="#Shinsaibashi_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/kansai/09-1.png" width="180" height="120"></a></div>
                                    </div><!--心齋橋結束-->

                                    <div class="Osaka phone_hidden"><!--大阪城-->
                                    <a data-fancybox data-src="#Osaka_detail" href="javascript:;"><img src="../../img/component/travel/kansai/10.png" width="72" height="31"></a>
                                    <div class="Osaka-01"><a data-fancybox data-src="#Osaka_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/kansai/10-1.png" width="180" height="120"></a></div>
                                    </div><!--大阪城結束-->

                                    <div class="USJ phone_hidden"><!--環球影城-->
                                    <a data-fancybox data-src="#USJ_detail" href="javascript:;"><img src="../../img/component/travel/kansai/11.png" width="66" height="39"></a>
                                    <div class="USJ-01"><a data-fancybox data-src="#USJ_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/kansai/11-1.png" width="180" height="120"></a></div>
                                    </div><!--環球影城結束-->

                                    <div class="POK phone_hidden"><!--神戶港-->
                                    <a data-fancybox data-src="#POK_detail" href="javascript:;"><img src="../../img/component/travel/kansai/12.png" width="66" height="39"></a>
                                    <div class="POK-01"><a data-fancybox data-src="#POK_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/kansai/12-1.png" width="180" height="120"></a></div>
                                    </div><!--神戶港結束-->

                                    <div class="ASHK phone_hidden"><!--有馬溫泉-->
                                    <a data-fancybox data-src="#ASHK_detail" href="javascript:;"><img src="../../img/component/travel/kansai/13.png" width="66" height="39"></a>
                                    <div class="ASHK-01"><a data-fancybox data-src="#ASHK_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/kansai/13-1.png" width="180" height="120"></a></div>
                                    </div><!--有馬溫泉結束-->

                                    <div class="Kobe phone_hidden"><!--神戶北野-->
                                    <a data-fancybox data-src="#Kobe_detail" href="javascript:;"><img src="../../img/component/travel/kansai/14.png" width="66" height="39"></a>
                                    <div class="Kobe-01"><a data-fancybox data-src="#Kobe_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/kansai/14-1.png" width="180" height="120"></a></div>
                                    </div><!--神戶北野結束-->

                                    <div class="Himeji phone_hidden"><!--姬路城-->
                                    <a data-fancybox data-src="#Himeji_detail" href="javascript:;"><img src="../../img/component/travel/kansai/15.png" width="66" height="39"></a>
                                    <div class="Himeji-01"><a data-fancybox data-src="#Himeji_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/kansai/15-1.png" width="180" height="120"></a></div>
                                    </div><!--姬路城結束-->


                                    
                                    
                                </div>
                              </div>
                              
                              

                            </div>
                            
                             
                           
                          </div>
                        
                          
                        </div>
                      </div>




                     <!-- 旅遊景點說明--> 
                     <div class="fancybox-div">
                       
                       <!--嵐山-->
                       <div id="Lanshan_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/kansai/detail/06_Big.jpg"><br>
                           <span>圖/卡優新聞網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">嵐山</h3>
                           <p>
                             嵐山是日本京都府京都市的一個觀光地，以賞楓葉(秋季)和櫻花(春季)而知名。「嵐山」這地名原本是專指位於桂川右岸、屬於京都市西京區一部份的嵐山地區，而河對岸、屬於右京區的地區則名為嵯峨野，但近年來許多觀光導覽資料都概括性地，將以橫跨桂川的渡月橋為中心之河左右兩岸周邊地區，合稱為嵐山。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--嵐山 END-->


                       <!--金閣寺-->
                       <div id="GPT_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/kansai/detail/10_Big.jpg"><br>
                           <span>圖/卡優新聞網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">金閣寺</h3>
                           <p>
                             金閣寺又名鹿苑寺，是一座最早完成於1397年(應永四年)的日本佛寺，由於寺內核心建築「舍利殿」的外牆全是以金箔裝飾，所以又被暱稱為「金閣寺」。除了是知名的觀光旅遊景點之外，也被日本政府指定為國寶，並於1994年以「古都京都文化財」的一部份被聯合國教科文組織指定為世界文化遺產的重要歷史建築。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--金閣寺 END-->

                       <!--平安神宮-->
                       <div id="Heian_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/kansai/detail/11_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">平安神宮</h3>
                           <p>
                             為紀念平安建都1100年而創建的「平安神宮」，重現平安都城的建築，參訪遊客來到這裡，都能感受到浩大皇城的昔日威容。鮮豔紅色的殿宇映照著滿地白砂，十分風雅。日本明治及大正期的庭園傑作「神苑」，以櫻花絕景成為京都的賞櫻勝地。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--平安神宮 END-->

                       <!--祇園-->
                       <div id="Gion_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/kansai/detail/12_Big.jpg"><br>
                           <span>圖/卡優新聞網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">祇園</h3>
                           <p>
                             祇園是京都繁華區的代表地段，以觀賞舞妓或藝妓舞藝的「花街」聞名。「祇園」位於八坂神社前，以四條通為主要街道，自鴨川開始到東大路通及八坂神社，沿路可見御茶屋、日本料理店及酒吧，也有著名歌舞伎劇場「南座」。走在兩側裝設格子戶的古老木造建築巷道中，可體驗到古都昔時的風雅情調。由北部的新橋通至白川沿路的地區，被指定為「重要傳統建造物群保存地區」，南部包括花見小路的地區受京都市指定為「歷史景觀保全修景地區」，這兩個地區皆受政府保護，成為京都文化、觀光的名勝。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--祇園 END-->

                       <!--四条河原町-->
                       <div id="Shijo_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/kansai/detail/07_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">四条河原町</h3>
                           <p>
                             京都四条是京都市內最繁華的大街。河原町大街與四條大街相交叉的四條河原町十字路口一帶是京都最繁華的街道。也是京都的主要購物區，著名的阪急百貨店、高島屋百貨店等各大百貨商店、代表流行時尚的河原町OPA等各種時裝店、珠寶首飾店、工藝美術禮品店、銀行、酒店、電影院、咖啡店、電子遊藝廳等均集中在此。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--四条河原町 END-->

                       <!--清水寺-->
                       <div id="Kiyomizu_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/kansai/detail/13_Big.jpg"><br>
                           <span>圖/卡優新聞網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">清水寺</h3>
                           <p>
                             清水寺是一座位於日本京都府京都市東山區清水的寺院，於778年前後由延鎮上人起造。清水寺的山號為音羽山，主要供奉千手觀音，原本屬於法相宗這一宗派但目前已獨立，成為北法相宗的大本山。清水寺與金閣寺、嵐山天龍寺等同為京都境內最著名的名勝古蹟，一年四季前來朝拜的香客或來訪的觀光客是絡驛不絕。清水寺於1994年以身為古都京都的文化財之一部分，列名至世界文化遺產中。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--清水寺 END-->

                       <!--伏見稻荷大社-->
                       <div id="Fushimi_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/kansai/detail/14_Big.jpg"><br>
                           <span>圖/卡優新聞網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">伏見稻荷大社</h3>
                           <p>
                             伏見稻荷大社位於稻荷山的山麓，在傳統上整個稻荷山的範圍都被視為是神域的範圍。由於每年都有大量的香客前來神社祭拜求取農作豐收、生意興隆、交通安全，使得該神社成為京都地區香火最盛的神社之一。另外，起源於江戶時代的習俗，前來此地許願的人們往往會捐款在神社境內豎立一座鳥居來表達對神明的敬意，使得伏見稻荷大社的範圍內豎有數量驚人的大小鳥居，而以「千本鳥居」之名聞名日本全國及海外。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--伏見稻荷大社 END-->

                       <!--東大寺-->
                       <div id="Todaiji_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/kansai/detail/15_Big.jpg"><br>
                           <span>圖/卡優新聞網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">東大寺</h3>
                           <p>
                             東大寺位於日本奈良縣奈良市雜司町，是華嚴宗大本山，南都七大寺之一，距今約有一千二百餘年的歷史。1998年作為「古都奈良的文化財」的一部分被列為世界文化遺產。在東大寺也能看見鹿群的身影，也吸引不少遊客前來造訪。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--東大寺 END-->

                       <!--心齋橋結束-->
                       <div id="Shinsaibashi_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/kansai/detail/09_Big.jpg"><br>
                           <span>圖/卡優新聞網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">心齋橋結束</h3>
                           <p>
                             位於大阪的中央區，為大阪最著名的逛街區域，是百貨公司、商場、服飾店、美食咖啡廳等的集中地，讓人逛一整天都逛不膩的好去處，國人愛逛的知名藥妝店這裡也一應具全。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--心齋橋結束 END-->

                       <!--大阪橋-->
                       <div id="Osaka_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/kansai/detail/08_Big.jpg"><br>
                           <span>圖/卡優新聞網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">大阪橋</h3>
                           <p>
                             大阪城，位於日本大阪市中央區的大阪城公園內，為大阪名勝之一，和名古屋城、熊本城並列日本歷史上的三名城，別名「金城」或「錦城」。 在桃山時代是豐臣秀吉的居城。後來德川家康以兩次大坂之役消滅了豐臣家，此後大坂城成為德川幕府控制西日本大名的重要據點。1997年日本政府指定為登錄有形文化財。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--大阪橋 END-->

                       <!--環球影城-->
                       <div id="USJ_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/kansai/detail/05_Big.jpg"><br>
                           <span>圖/卡優新聞網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">環球影城</h3>
                           <p>
                             日本環球影城位於日本大阪市此花區，是世界4個環球影城主題公園之一，於2001年3月31日開幕。其設計與美國奧蘭多的環球影城相近，有部份機動遊戲相同。包括《侏羅紀公園》河流探險、《魔鬼终结者2:3-D》、《蜘蛛人》、《大白鯊》探險等。在主題公園內增加一個哈利波特園區，於2014年7月開幕。新園區內會有多個景點和遊戲，包括外觀完整重現的霍格華茲城堡、活米村。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--環球影城 END-->

                       <!--神戶港-->
                       <div id="POK_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/kansai/detail/04_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">神戶港</h3>
                           <p>
                             神戶港是日本兵庫縣神戶市的特定重要港灣。為日本主要的國際貿易港（五大港）之一，與大阪港同樣被指定成超級中樞港灣。在1868年1月1日時開港。現在也是日本三大旅客港之一。神戶港是重要的觀光港口，也是遊客到神戶必造訪地方之一。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--神戶港 END-->

                       <!--有馬溫泉-->
                       <div id="ASHK_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/kansai/detail/03_Big.jpg"><br>
                           <span>圖/樂天旅遊</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">有馬溫泉</h3>
                           <p>
                             有馬溫泉是兵庫縣神戶市北區的溫泉，被稱作關西的「奧座敷」。日本三古湯之一，枕草子的三名泉、江戶時代的溫泉番付中排名西大關。日本代表的名泉之一。鄰近瀨戶內海國立公園的區域。也是國人喜愛的熱門溫泉景點之一。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--有馬溫泉 END-->

                       <!--神戶北野-->
                       <div id="Kobe_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/kansai/detail/02_Big.jpg"><br>
                           <span>圖/卡優新聞網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">神戶北野</h3>
                           <p>
                             神戶除了有美麗的港口夜景、好吃的神戶牛之外，還有充滿異國風情的北野異人館，北野這個區域因為早期神戶港口與外國人交易往來的關係，擁有許多外國人住宅、領事館以及特色街景，而這些建築就被統稱「異人館」。甚至連這裡的星巴克都別有特色，也是國人造訪神戶必訪之地。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--神戶北野 END-->

                       <!--姬路城-->
                       <div id="Himeji_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/kansai/detail/01_Big.jpg"><br>
                           <span>圖/卡優新聞網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">姬路城</h3>
                           <p>
                             是一座位於日本兵庫縣姬路市的城堡，為該市主體象徵。由於其白色的外牆，也被稱為白鷺城。作為日本最具象徵意義，保留最為完整的城堡，姬路城既是日本政府指定的國寶及國家特別史跡，也是日本首批世界文化遺產之一。姬路城與熊本城、松本城合稱為日本三大名城；由於其保存度較完好（城內的天守為日本的12座現存天守之一），也被稱為「日本第一名城」。有很多時代劇和電影也在這裡進行拍攝，或以姬路城作為江戶城的象徵。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--姬路城 END-->

                       




                      
                        
                     


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