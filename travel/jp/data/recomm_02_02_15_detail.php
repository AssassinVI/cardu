                <div id="artical">
                    <div id="building">
                        <a href="/">首頁</a>&gt;<a href="/bonus/bonus.php">優情報</a>&gt;<a href="/bonus/travel/jp/index.php">日本嬉遊趣</a>&gt;<a href="index.php">行程推薦</a>&gt;<a href="recommend2.php?type=<?=$type?>&pk=<?=$pk?>"><?=$city_name?></a>&gt;<?=$city_name?>景點
                    </div>
                    <div id="page">
                        <!--<div id="page_pic" style="padding-top:10px; padding-left:2px;">
                            <img src="data/images/recomm_02_content_02_<?//=$pk?>.jpg" width="600" alt=""/>
                            
                        </div>-->
                        <div style="margin-left:2px; margin-top:5px">
                            <? include_once("15_map/map.html"); ?>
                        </div>
                        <!--<h3 class="h3" style="padding-top:15px;">台場</h3>
                        <p style="line-height:10px">&nbsp;</p>
                        <p2 class="p2">台場極受外國觀光客喜愛，是近年來人氣直線上升的景點。緊鄰海邊的區域適合全家大小在此暢遊一整天。搭乘百合海鷗號、水上巴士等不同於一般的交通工具，享受東京灣海風的吹拂吧。在各式各樣的商業設施內盡情玩樂、享用美食及購物之後，再前往可欣賞夕陽或夜景的景點。若天氣良好，也推薦您到公園或沙灘上慢跑及散步。</p2>
                        <p style="line-height:10px">&nbsp;</p>
                        <div id="recommend_03">
                            <div id="lefta" style="padding-top:10px;">
                                <div id="leftpic" style="display:inline-block;">
                                    <a href="#"  title="漫步味蕾饗宴三天兩夜"><img src="../images/315x210.jpg" width="300" height="200"  alt=""/></a>
                                </div>
                                <div id="leftpic" style="padding-left:5px; display:inline-block;">
                                    <a href="#"  title="漫步味蕾饗宴三天兩夜"><img src="../images/315x210.jpg" width="300" height="200"  alt=""/></a>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
                
                <p style="line-height:10px">&nbsp;</p>
                <div id="recommend_title_02"></div>
                <div id="recommend_03">
                    <div id="lefta" style="padding-top:10px;">
                        <div id="leftpic" style="display:inline-block;">
                            <a href="<?= $recomm_03_url ?>?type=<?= $type ?>&pk=<?= $pk ?>&idx=1"  title="壯闊絕景！熊本火之國自然巡禮"><img src="data/<?= $pk ?>_map_detail/images/dt1-1.jpg" width="315" height="210"  alt=""/></a>
                            <div id="lefttext">
                                <p style="line-height:10px;">&nbsp;</p>
                                <div style="display:inline-block;"><img src="data/<?=$pk?>_map_detail/images/map-icon.png" /></div>&nbsp;
                                <div style="display:inline-block; vertical-align:top; padding-top:10px;"><h2 class="h2"><a href="<?= $recomm_03_url ?>?type=<?= $type ?>&pk=<?= $pk ?>&idx=1" title="壯闊絕景！熊本火之國自然巡禮">壯闊絕景！熊本火之國自然巡禮</a></h2></div>
                            </div>
                        </div>
                        <div id="leftpic" style="padding-left:5px; display:inline-block;">
                            <a href="<?= $recomm_03_url ?>?type=<?= $type ?>&pk=<?= $pk ?>&idx=2"  title="盡情享受！漫遊福岡好吃又好玩"><img src="data/<?= $pk ?>_map_detail/images/dt2-1.jpg" width="315" height="210"  alt=""/></a>
                            <div id="lefttext">
                                <p style="line-height:10px;">&nbsp;</p>
                                <div style="display:inline-block;"><img src="data/<?=$pk?>_map_detail/images/map-icon.png" /></div>&nbsp;
                                <div style="display:inline-block; vertical-align:top; padding-top:10px;"><h2 class="h2"><a href="<?= $recomm_03_url ?>?type=<?= $type ?>&pk=<?= $pk ?>&idx=2"  title="盡情享受！漫遊福岡好吃又好玩">盡情享受！漫遊福岡好吃又好玩</a></h2></div>
                            </div>
                        </div>
                    </div>
                    <div id="lefta" style="padding-top:10px;">
                        <div id="leftpic" style="display:inline-block;">
                            <a href="<?= $recomm_03_url ?>?type=<?= $type ?>&pk=<?= $pk ?>&idx=3"  title="溫泉大不同！由布院別府泡湯旅"><img src="data/<?= $pk ?>_map_detail/images/dt3-1.jpg" width="315" height="210"  alt=""/></a>
                            <div id="lefttext">
                                <p style="line-height:10px;">&nbsp;</p>
                                <div style="display:inline-block;"><img src="data/<?=$pk?>_map_detail/images/map-icon.png" /></div>&nbsp;
                                <div style="display:inline-block; vertical-align:top; padding-top:10px;"><h2 class="h2"><a href="<?= $recomm_03_url ?>?type=<?= $type ?>&pk=<?= $pk ?>&idx=3"  title="溫泉大不同！由布院別府泡湯旅">溫泉大不同！由布院別府泡湯旅</a></h2></div>
                            </div>
                        </div>
                        <div id="leftpic" style="padding-left:5px; display:inline-block;">
                            <a href="<?= $recomm_03_url ?>?type=<?= $type ?>&pk=<?= $pk ?>&idx=4"  title="異國風情！長崎白天夜晚超迷人"><img src="data/<?= $pk ?>_map_detail/images/dt4-1.jpg" width="315" height="210"  alt=""/></a>
                            <div id="lefttext">
                                <p style="line-height:10px;">&nbsp;</p>
                                <div style="display:inline-block;"><img src="data/<?=$pk?>_map_detail/images/map-icon.png" /></div>&nbsp;
                                <div style="display:inline-block; vertical-align:top; padding-top:10px;"<h2 class="h2"><a href="<?= $recomm_03_url ?>?type=<?= $type ?>&pk=<?= $pk ?>&idx=4"  title="異國風情！長崎白天夜晚超迷人">異國風情！長崎白天夜晚超迷人</a></h2></div>
                            </div>
                        </div>
                    </div>
                </div>
