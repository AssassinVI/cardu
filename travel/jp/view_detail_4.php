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
                            <a class="nav-link py-2 active show" id="special_2-tab" href="javascript:;" tab-target="#special_2" aria-selected="false">東北景點</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                         
                          <div class="tab-pane fade active show" id="special_2" role="tabpanel" aria-labelledby="special_2-tab">
                             <div class="row no-gutters hv-center">
                              <div class="map">
                                <div class="row no-gutters hv-center">
                                    <img class="photo" src="../../img/component/travel/tour/map-bg.jpg" title="新聞">


                                    <div class="Hirosaki phone_hidden"><!--弘前城-->
                                    <a data-fancybox data-src="#Hirosaki_detail" href="javascript:;"><img src="../../img/component/travel/tour/01.png" width="67" height="30" ></a>
                                    <div class="Hirosaki-01"><a data-fancybox data-src="#Hirosaki_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/tour/01-1.png" width="180" height="120"></a></div>

                                    </div><!--弘前城結束-->


                                    <div class="Lake phone_hidden"><!--十和田湖-->
                                    <a data-fancybox data-src="#Lake_detail" href="javascript:;"><img src="../../img/component/travel/tour/02.png" width="66" height="33"></a>
                                    <div class="Lake-01"><a data-fancybox data-src="#Lake_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/tour/02-1.png" width="180" height="120"></a></div>
                                    </div><!--十和田湖結束-->


                                    <div class="Aomori phone_hidden"><!--奧入瀨溪-->
                                    <a data-fancybox data-src="#Aomori_detail" href="javascript:;"><img src="../../img/component/travel/tour/03.png" width="72" height="33"></a>
                                    <div class="Aomori-01"><a data-fancybox data-src="#Aomori_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/tour/03-1.png" width="180" height="120"></a></div>
                                    </div><!--奧入瀨溪結束-->


                                    <div class="Tazawa phone_hidden"><!--田澤湖-->
                                    <a data-fancybox data-src="#Tazawa_detail" href="javascript:;"><img src="../../img/component/travel/tour/04.png" width="64" height="31"></a>
                                    <div class="Tazawa-01"><a data-fancybox data-src="#Tazawa_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/tour/04-1.png" width="180" height="120"></a></div>
                                    </div><!--田澤湖結束-->


                                    <div class="Kakunodate phone_hidden"><!--角館-->
                                    <a data-fancybox data-src="#Kakunodate_detail" href="javascript:;"><img src="../../img/component/travel/tour/05.png" width="54" height="30"></a>
                                    <div class="Kakunodate-01"><a data-fancybox data-src="#Kakunodate_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/tour/05-1.png" width="180" height="120"></a></div>
                                    </div><!--角館結束-->

                                    <div class="Longquan phone_hidden"><!--龍泉洞-->
                                    <a data-fancybox data-src="#Longquan_detail" href="javascript:;"><img src="../../img/component/travel/tour/06.png" width="71" height="32"></a>
                                    <div class="Longquan-01"><a data-fancybox data-src="#Longquan_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/tour/06-1.png" width="180" height="120"></a></div>
                                    </div><!--龍泉洞結束-->

                                    <div class="Matsushima phone_hidden"><!--松島灣-->
                                    <a data-fancybox data-src="#Matsushima_detail" href="javascript:;"><img src="../../img/component/travel/tour/07.png" width="68" height="29"></a>
                                    <div class="Matsushima-01"><a data-fancybox data-src="#Matsushima_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/tour/07-1.png" width="180" height="120"></a></div>
                                    </div><!--松島灣結束-->


                                    <div class="Kisuke phone_hidden"><!--喜助牛舌店-->
                                    <a data-fancybox data-src="#Kisuke_detail" href="javascript:;"><img src="../../img/component/travel/tour/08.png" width="90" height="32"></a>
                                    <div class="Kisuke-01"><a data-fancybox data-src="#Kisuke_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src='../../img/component/travel/tour/08-1.png' width="180" height="120"></a></div>
                                    </div><!--喜助牛舌店結束-->

                                    <div class="Chusonji phone_hidden"><!--中尊寺-->
                                    <a data-fancybox data-src="#Chusonji_detail" href="javascript:;"><img src="../../img/component/travel/tour/09.png" width="69" height="32"></a>
                                    <div class="Chusonji-01"><a data-fancybox data-src="#Chusonji_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/tour/09-1.png" width="180" height="120"></a></div>
                                    </div><!--中尊寺結束-->

                                    <div class="Sendai phone_hidden"><!--仙台城跡-->
                                    <a data-fancybox data-src="#Sendai_detail" href="javascript:;"><img src="../../img/component/travel/tour/10.png" width="75" height="34"></a>
                                    <div class="Sendai-01"><a data-fancybox data-src="#Sendai_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/tour/10-1.png" width="180" height="120"></a></div>
                                    </div><!--仙台城跡結束-->

                                    <div class="Tendo phone_hidden"><!--天童公園-->
                                    <a data-fancybox data-src="#Tendo_detail" href="javascript:;"><img src="../../img/component/travel/tour/11.png" width="73" height="31"></a>
                                    <div class="Tendo-01"><a data-fancybox data-src="#Tendo_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/tour/11-1.png" width="180" height="120"></a></div>
                                    </div><!--天童公園結束-->

                                    <div class="Temple phone_hidden"><!--山寺-->
                                    <a data-fancybox data-src="#Temple_detail" href="javascript:;"><img src="../../img/component/travel/tour/12.png" width="53" height="31"></a>
                                    <div class="Temple-01"><a data-fancybox data-src="#Temple_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/tour/12-1.png" width="180" height="120"></a></div>
                                    </div><!--山寺結束-->

                                    <div class="Inawashiro phone_hidden"><!--豬苗代湖-->
                                    <a data-fancybox data-src="#Inawashiro_detail" href="javascript:;"><img src="../../img/component/travel/tour/13.png" width="71" height="33"></a>
                                    <div class="Inawashiro-01"><a data-fancybox data-src="#Inawashiro_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/tour/13-1.png" width="180" height="120"></a></div>
                                    </div><!--豬苗代湖結束-->

                                    <div class="Aizuwakamatsu phone_hidden"><!--會津若松城-->
                                    <a data-fancybox data-src="#Aizuwakamatsu_detail" href="javascript:;"><img src="../../img/component/travel/tour/14.png" width="88" height="32"></a>
                                    <div class="Aizuwakamatsu-01"><a data-fancybox data-src="#Aizuwakamatsu_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/tour/14-1.png" width="180" height="120"></a></div>
                                    </div><!--會津若松城結束-->

                                    <div class="BAO phone_hidden"><!--磐梯熱海溫泉-->
                                    <a data-fancybox data-src="#BAO_detail" href="javascript:;"><img src="../../img/component/travel/tour/15.png" width="99" height="32"></a>
                                    <div class="BAO-01"><a data-fancybox data-src="#BAO_detail" href="javascript:;" style="cursor:pointer;" target="_blank"><img src="../../img/component/travel/tour/15-1.png" width="180" height="120"></a></div>
                                    </div><!--磐梯熱海溫泉結束-->

                                </div>
                              </div>
                              
                              

                            </div>
                            
                             
                           
                          </div>
                        
                          
                        </div>
                      </div>




                     <!-- 旅遊景點說明 -->
                     <div class="fancybox-div">
                       
                       <!--弘前城-->
                       <div id="Hirosaki_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/tour/detail/01_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">弘前城</h3>
                           <p>
                             「弘前城」指的為天守閣以及弘前公園的部分。於西元1611年建築完成，當中的五層建築─天守閣於西元1627年遭雷擊燒毀，經重建後現為三層建築，目前作為展示歷史文物的「弘前城史料館」。此外，公園內種植著2600棵櫻花樹，為日本國內著名的賞櫻勝地。冬天則搭配雪燈籠祭展出雪燈籠與冰雕，呈現出別有風情的雪景面貌。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--弘前城 END-->


                       <!--十和田湖-->
                       <div id="Lake_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/tour/detail/02_Big.jpg"><br>
                           <span>圖/十和田湖國立公園協會</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">十和田湖</h3>
                           <p>
                             橫跨青森縣與秋田縣間的十和田湖，是約在2,000年前火山噴發後所形成，標高400公尺的二重火山湖。無論是春芽嫩綠或是秋染楓紅時分、白雪皚皚宛如仙境般的冬季，十和田湖隨著季節變化展現不同風貌，適合踏青的5月至6月，以及10月中至10月底最佳賞楓時期，秋季楓葉燒紅整個八甲田山區時，楓紅片片映照於湖面上形成的絕美的湖光倒影，一年可吸引350萬名旅客來此遊覽。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--十和田湖 END-->


                       <!--奧入瀨溪-->
                       <div id="Aomori_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/tour/detail/03_Big.jpg"><br>
                           <span>圖/十和田湖國立公園協會</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">奧入瀨溪</h3>
                           <p>
                             奧入瀨溪從十和田湖流出，從入口「子之口」到「燒山」源流部分就是奧入瀨溪流，長約 14 公里，沿途由茂密樹木及數十處大大小小的瀑布，隨著季節變化展現各式風情，無論春芽嫩綠或是秋染楓紅時分都別有風味。夏季為著名的人氣避暑勝地，秋季則是賞楓勝地。進入10月初開始逐漸染紅，最佳賞楓期為每年10月中至10月底。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--奧入瀨溪 END-->


                       <!--田澤湖-->
                       <div id="Tazawa_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/tour/detail/04_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">田澤湖</h3>
                           <p>
                             田澤湖是周長20公里的近圓形的破火山口湖，為秋田縣內唯一的天然大湖，以清澈的湖水為特徵，在陽光下閃著翡翠般的光澤。水深423.4米，為日本最深的湖泊，因為深度足夠，即使是寒冷的冬天，湖面也不會結冰。湖畔矗立著辰子銅像，另一邊還有瑞士村、田澤湖香草園等景點，遊客可以選擇搭乘「田澤湖一周線」觀光巴士，瀏覽完整的湖畔風光。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--田澤湖 END-->
                       
                       <!--角館-->
                       <div id="Kakunodate_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/tour/detail/05_Big.jpg"><br>
                           <span>圖/角館町觀光協會</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">角館</h3>
                           <p>
                             位於秋田縣東部，如今仍保留著江戶時代的建築與街景風貌，有「陸奧小京都」之稱。此區著名的「武家屋敷」為江戶時代武士們的住宅，沿著街道可以一一參觀不同武家的風貌。沿著檜木內川種植延綿2公里的櫻花，花季時伴隨著古色古香的建築綻放，秋天則換成楓紅，相當美麗。這裡亦有人力車與和服可以體驗，幸運的話還能遇上角館傳統祭典唷。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--角館 END-->
                      
                       <!--龍泉洞-->
                       <div id="Longquan_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/tour/detail/06_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">龍泉洞</h3>
                           <p>
                             日本三大鐘乳洞之一，於1967年發現，目前洞穴已知長度為3,600公尺，專家推測總長應該有約5,000公尺，現在公開的範圍為700公尺，全程走完約30分鐘。洞穴內一年四季溫度都維持10度左右，裡面除了豐富的石灰岩洞穴景觀，還有擁有五種蝙蝠的蝙蝠洞。最值得一看的是清澈的地底湖，其中第三地底湖深達98公尺的，透明的湖水呈現碧藍色，相當壯觀。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--龍泉洞 END-->

                       <!--松島灣-->
                       <div id="Matsushima_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/tour/detail/08_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">松島灣</h3>
                           <p>
                             松島灣內遍布大大小小共260餘個小島，幾乎每座島嶼上都長著黑松或紅松，故將此地稱做「松島」。這裡可以搭乘遊船巡覽松島灣的島嶼風光，並在船上體驗餵食海鷗；遇上牡蠣產季時，還可以在船上享用牡蠣大餐。除了牡蠣，松島盛產的星鰻亦相當美味，不妨至附近的餐館，來碗穴子(星鰻)蓋飯飽餐一頓，品嘗鮮甜肥美的鰻魚滋味。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--松島灣 END-->
                       

                       <!--喜助牛舌店-->
                       <div id="Kisuke_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/tour/detail/11_Big.jpg"><br>
                           <span>圖/宮城縣經濟工商觀光部</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">喜助牛舌店</h3>
                           <p>
                             創業於1975年的老字號牛舌店「喜助」，是日本人投票排名第一的牛舌料理店，在仙台市內已開了6家分店，每家都有不同的代表料理。招牌的燒烤牛舌，以古早製法─手工撒鹽醃漬製，引出牛舌本身的鮮甜；套餐搭配宮城自產的米飯，和清爽的牛骨湯，是來仙台一定要品嘗的美妙滋味。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--喜助牛舌店 END-->

                       <!--中尊寺-->
                       <div id="Chusonji_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/tour/detail/07_Big.jpg"><br>
                           <span>圖/中尊寺官網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">中尊寺</h3>
                           <p>
                             中尊寺是天台宗的東北總寺院，寺內保存有建於天治元年(西元1124年)的日本第一號國寶金色堂。金色堂的內外全部貼上金箔，並用鑲嵌金銀珠寶的漆泥金畫裝飾。平泉曾經是黃金的產地，在將近100年的時間裡一直作為日本地方城市的先驅，金色堂成爲平泉的黃金文化的繁榮象徵。寺內寶物館‧讚衡藏保存了多項國寶和重要文化財，是一座歷史藝術寶庫。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--中尊寺 END-->

                         
                       <!--仙台城跡-->
                       <div id="Sendai_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/tour/detail/10_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">仙台城跡</h3>
                           <p>
                             仙台城於1603年由仙台藩第一代藩主伊達政宗建造，之後270餘年成為了伊達氏的居城。居城歷經戰火後已經消失了，剩下大型石牆和重建的角樓等保留了當時的面貌，現在在本丸遺址上建造了護國神社，天守台矗立著伊達政宗騎馬雕像。仙台城位處丘陵地的高處，可以眺望仙台市區及太平洋。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--仙台城跡 END-->
                       
                       <!--天童公園-->
                       <div id="Tendo_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/tour/detail/09_Big.jpg"><br>
                           <span>圖/天童市官網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">天童公園</h3>
                           <p>
                             天童是將棋的故鄉，出產的將棋量占全日本95%。據傳江戶時代末期，武士生活清苦便做起了生產將棋的副業，變成了此地的「特產」。每天四月，在天童公園會舉行「真人版將棋」，由真人扮演棋子，相當有趣。這裡也出產溫泉，不想進旅館泡湯的旅客，也可以選擇戶外足湯，在公園附近的街道旁，分別設立三處免費足湯，走累了請務必來這裡泡泡腳唷。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--天童公園 END-->
                       
                       <!--山寺-->
                       <div id="Temple_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/tour/detail/12_Big.jpg"><br>
                           <span>圖/卡優新聞網</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">山寺</h3>
                           <p>
                             山寺全名是寶珠山立石寺，由慈覺大師於貞觀2年(西元860年)開闢為天臺宗的修行聖地。擁有經長年水蝕風化，奇岩林立、風化洞穴豐富的名勝風景。目前寺內占地約33萬坪，立於入口的根本中堂為日本最古老的佛堂，以櫸木建造而成。從山門到內院超過800級石階相連，建有仁王門、開山堂、納經堂、五大堂等歷史悠久的建築，構成一片靜寂的山寺景色。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--山寺 END-->

                       <!--豬苗代湖-->
                       <div id="Inawashiro_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/tour/detail/14_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">豬苗代湖</h3>
                           <p>
                             豬苗代湖是日本第四大淡水湖，因火山活動而形成，面積103.31平方公里，深93.5公尺。水質相當清澈透明，其清澈程度位居日本第三；天空倒映在水面上，像一面鏡子一樣，又有「天鏡湖」之稱，磐梯山依偎著湖畔，每個季節都有不同風貌。每年10月到隔年4月，會有許多天鵝、候鳥來此湖過境，遊客可以乘船遊湖或是租借腳踏車，欣賞湖畔風光。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--豬苗代湖 END-->
                        

                       <!--會津若松城-->
                       <div id="Aizuwakamatsu_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/tour/detail/13_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">會津若松城</h3>
                           <p>
                             建於西元1384年，擁有600多年的歷史，是日本東北地區首屈一指的名城，也是會津若松的象徵地標。最初的名稱為黑川城，後因白色的城郭堆疊，優雅的外觀猶如白鶴從空中飛落到地面，所以後來被稱為「鶴城」。從鶴城的望樓天守閣上，能夠眺望整個會津街景，視野相當遼闊。鶴城公園內種植1,000株櫻花，春天賞花，冬天賞雪，為當地市民常去的人氣景點。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--會津若松城 END-->

                       <!--磐梯熱海溫泉-->
                       <div id="BAO_detail" style="width: 800px;">
                        <div class="row">
                         <div class="col-md-6">
                           <img class="w-100" src="../../img/component/travel/tour/detail/15_Big.jpg"><br>
                           <span>圖/維基百科</span>
                         </div>
                         <div class="col-md-6">
                           <h3 class="view_title">磐梯熱海溫泉</h3>
                           <p>
                             磐梯熱海溫泉於800年前鎌倉時代發跡，是一處歷史悠久的溫泉地，自古便作為治病健體的著名溫泉而遠近聞名。相傳古代有一位叫荻姬的美人得了不治之病，在不動明王指示下尋得此湯，浸泡後疾病遂痊癒，因此又稱「荻姬之湯」或「美人湯」。溫泉泉質為鹼性單純泉，透明無色且無臭無味，目前共有16家風呂和2家共同浴場，提供不含住宿的泡湯服務。
                           </p>
                         </div>
                       </div>
                     </div>
                       <!--磐梯熱海溫泉 END-->  
                        



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