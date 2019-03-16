                        <div id="gotop">^</div> <? //錨點 ?>
                        <p id="cd_class">
                            <span class="light level"><a href="#top01">機場至市區交通</a></span><span class="light level"><a href="#top02"><?= $city_name ?>交通路線圖</a></span><span class="light level"><a href="#top03"><?= $city_name ?>車票種類</a></span>
                        </p>
                        <h3 class="h3" style="padding-top:20px;"><a id="top01"><span style="font-size:larger">■</span>從新千歲機場至市區交通</a></h3>
                        <div id="page_pic" style="padding-top:20px;">
                            <img src="data/images/<?= $pk ?>_01-tables.jpg" alt=""/>
                            <div id="pic01_link01" style="position:absolute; top:250px; left:490px; width:100px; height:30px; cursor:pointer;"></div>
                            <div id="pic01_link02" style="position:absolute; top:300px; left:470px; width:120px; height:30px; cursor:pointer;"></div>
                        </div>
                        <h3 class="h3" style="padding-top:20px;">1.JR北海道</h3>
                        <div id="page_pic" style="padding-top:20px;">
                            <a href="http://www2.jrhokkaido.co.jp/global/airport/index_ch.html" target="_blank"><img src="data/images/<?= $pk ?>_01-pic.jpg" width="600" alt=""/></a>
                        </div>
                        <p style="margin-top:5px">圖片來源：<a href="http://www2.jrhokkaido.co.jp/global/airport/index_ch.html" target="_blank">JR北海道</a></p>
                        <h3 class="h3" style="padding-top:20px;">2.北海道中央巴士</h3>
                        <div id="page_pic" style="padding-top:20px;">
                            <a href="http://teikan.chuo-bus.co.jp/tw/" target="_blank"><img src="data/images/<?= $pk ?>_02-pic.jpg" width="600" alt=""/></a>
                        </div>
                        <p style="margin-top:5px">圖片來源：<a href="http://teikan.chuo-bus.co.jp/tw/" target="_blank">北海道中央巴士</a></p>
                        <h3 class="h3" style="padding-top:20px;"><a id="top02"><span style="font-size:larger">■</span>北海道交通路線圖</a></h3>
                        <div id="page_pic">
                            <a href="http://www.jrhokkaido.co.jp/network/img/routemap_j.pdf" style="cursor:pointer;" target="_blank"><img src="data/images/<?= $pk ?>_map01.jpg" width="600" alt=""/></a>
                        </div>                        
                        <p style="margin-top:5px">資料來源：<a href="http://www.jrhokkaido.co.jp/network/img/routemap_j.pdf" target="_blank">北海道交通路線圖</a></p>


                        <h3 class="h3" style="padding-top:20px;"><a id="top03"><span style="font-size:larger">■</span>北海道車票種類</a></h3>
                        <br>
                        <h2 class="h2">交通IC卡</h2>
                        <h2 class="h2" style="padding-top:20px;">Kitaca</h2>
                        <div style="margin-top:20px; font-size:15px; width:600px;">
                            <div style="width:250px; display:inline-block; vertical-align:top"><img src="data/images/<?= $pk ?>_03-pic.jpg" width="250" alt=""/></div>
                            <div style="width:300px; padding-left:30px; display:inline-block;"><p2 class="p2">Kitaca是一種IC晶片卡，您不需排隊等候買票，只要在驗票口持卡輕觸感應區即可進出。同時還統合有電子現金儲值卡的功能，方便您購物時利用。</p2></div>
                        </div>
                        <table width="600" style="margin-top:20px; font-size:15px;">
                        <tr>
                            <td width="100" align="left" valign="top">類別</td>
                            <td width="150" align="center">無記名 Kitaca</td>
                            <td width="150" align="center">記名 Kitaca</td>
                            <td width="200" align="center">Kitaca月票</td>
                        </tr>
                        <tr>
                            <td width="100" align="left" valign="top">售價</td>
                            <td width="300" colspan="2" align="left" valign="top">2,000日圓<br>
包含：1,500日圓（SF）＋押金500日圓<br>
(SF：為Stored Fare的簡寫，意指預先儲值的金額。)</td>
                            <td width="200" align="left" valign="top">月票金額＋押金500日圓※<br> (※新辦卡片時須支付)</td>
                        </tr>
                        <tr>
                            <td width="100" align="left" valign="top">販售卡別<br>
(成人/兒童)</td>
                            <td width="150" align="left" valign="top">成人/兒童<br>
(押金同價)</td>
                            <td width="150" align="left" valign="top">成人/兒童<br>
(同價)
</td>
                            <td width="200" align="left">只限成人</td>
                        </tr>
                        <tr>
                            <td width="100" align="left" valign="top">販售地點</td>
                            <td width="150" align="left" valign="top">同左及Kitaca售票機</td>
                            <td width="150" align="left" valign="top" colspan="2">Kitaca區間內各站的<br>
「 JR售票處（Midori-no-madoguchi）」<br>
(旅行中心等除外)</td>
                        </tr>
                        <tr>
                            <td width="100" align="left" valign="top">儲值金額上限</td>
                            <td width="150" align="left" valign="top" colspan="3">卡片內餘額上限為20,000日圓</td>
                        </tr>
                        <tr>
                            <td width="100" align="left" valign="top">退費</td>
                            <td width="150" align="left" valign="top" colspan="3">只須支付220日圓的手續費即可辦理。</td>
                        </tr>
                        <tr>
                            <td width="100" align="left" valign="top">遺失補發</td>
                            <td width="150" align="left" valign="top">不可</td>
                            <td width="150" align="left" valign="top" colspan="2">可<br>
(須支付1,010日圓（包含：手續費510日圓與押金500日圓）)</td>
                        </tr>
                        </table>
                        <p style="margin-top:5px"><a href="http://www2.jrhokkaido.co.jp/global/chinese/kitaca/p02.html" target="_blank">KITACA可使用適用範圍>></a></p>
                        
                        <br>  
                        <h2 class="h2">交通通票</h2>
                        <h2 class="h2" style="padding-top:20px;">1. 北海道鐵路周遊券 (Hokkaido Rail Pass)</h2>
                        <br>
                        <p2 class="p2"><span style="font-size:larger">■</span>適用對象：只限以「短期停留」身分入境之外國觀光客使用。<br>
<span style="font-size:larger">■</span>使用範圍：可以不限次數搭乘北海道內所有JR列車 (還可免費無限次數預約指定席)，以及部分JR巴士路線 (詳細可搭乘路線請參考<a href="http://www2.jrhokkaido.co.jp/global/chinese/railpass/rail.html" target="_blank"><span style="color:#069">官網</span></a>)，但搭乘寢台車、臥舖車和Twinkle Bus須另付追加費用。</p2>
                        <table width="600" style="margin-top:20px; font-size:15px;">
                        <tr>
                            <td width="150" align="center">Pass type</td>
                            <td width="150" align="center">Car type</td>
                            <td width="150" align="center">成人費用</td>
                            <td width="150" align="center">兒童費用(6-11歲)</td>
                        </tr>
                        <tr>
                            <td width="150" align="center">3日用</td>
                            <td width="150" align="center">普通車廂</td>
                            <td width="150" align="center">￥16,500</td>
                            <td width="150" align="center">￥8,250</td>
                        </tr>
                        <tr>
                            <td width="150" align="center">任選四日暢遊券</td>
                            <td width="150" align="center">普通車廂</td>
                            <td width="150" align="center">￥22,000</td>
                            <td width="150" align="center">￥11,000</td>
                        </tr>
                        <tr>
                            <td width="150" align="center">5日用</td>
                            <td width="150" align="center">普通車廂</td>
                            <td width="150" align="center">￥22,000</td>
                            <td width="150" align="center">￥11,000</td>
                        </tr>
                        <tr>
                            <td width="150" align="center">7日用</td>
                            <td width="150" align="center">普通車廂</td>
                            <td width="150" align="center">￥24,000</td>
                            <td width="150" align="center">￥12,000</td>
                        </tr>
                        </table>
                        <p style="margin-top:5px">詳細使用介紹>><a href="http://www2.jrhokkaido.co.jp/global/chinese/railpass/rail.html" target="_blank">北海道周遊券</a></p>
                        <h2 class="h2" style="padding-top:20px;">2. 北海道自由乘車券 (Hokkaido Round Tour Pass)</h2>
                        <br>
                        <p2 class="p2"><span style="font-size:larger">■</span>適用對象：持有票券者皆可使用。<br>
<span style="font-size:larger">■</span>使用範圍：普通車廂用：可以乘坐特急（北海道新幹線除外）列車的普通車廂指定席最多6次。<br>
<span style="font-size:larger">■</span>有效期限：使用開始日起7天之內。<br> 
4/27～5/6、8/11～8/20、12/28～1/6期間無法使用。無法利用的天數不能順延其有效期間。<br></p2>
                        <table width="300" style="margin-top:20px; font-size:15px;">
                        <tr>
                            <td width="150" align="center">車種</td>
                            <td width="150" align="center">費用</td>
                        </tr>
                        <tr>
                            <td width="150" align="center">普通車廂用</td>
                            <td width="150" align="center">￥26,230</td>
                        </tr>
                        </table>
                        <br>
                        <p2 class="p2"><span style="font-size:larger">※</span>搭乘特等車或B寢台(臥鋪)車時，須另付特急票、特等席票、寢台票等。搭乘 Home liner時，須另付乘車整理券費用。<br>
<span style="font-size:larger">※</span>以下的列車、巴士無法利用：<br>
<span style="font-size:larger">●</span>不能搭乘北海道新幹線的隼(Hayabusa)"號、疾風(Hayate)"號。<br>
<span style="font-size:larger">●</span>札幌～旭川、帶廣、紋別、襟裳、 廣尾間的都市間、臨時巴士路線及Kiroro渡假中心巴士線</p2>
                        <p style="margin-top:5px">詳細使用介紹>><a href="http://www2.jrhokkaido.co.jp/global/chinese/railpass/free.html" target="_blank">北海道自由乘車券</a></p>
                        <h2 class="h2" style="padding-top:20px;">3. 札幌-小樽 Welcom Pass</h2>
                        <br>
                        <p2 class="p2"><span style="font-size:larger">■</span>適用對象：外國旅行者為對象<br>
<span style="font-size:larger">■</span>使用範圍：可以在一天內自由乘坐札幌～小樽間的JR，和札幌市內地下鐵全線的特別乘車券。</p2>
                        <table width="600" style="margin-top:20px; font-size:15px;">
                        <tr>
                            <td width="200" align="center">種類及費用</td>
                            <td width="200" align="center">使用範圍</td>
                            <td width="200" align="center">有效期限</td>
                        </tr>
                        <tr>
                            <td width="200" align="center">￥1,700/人</td>
                            <td width="200" align="center">札幌市內～小樽之間的JR及札幌市營地下鐵全線</td>
                            <td width="200" align="center">使用日當天</td>
                        </tr>
                        </table>
                        <br>
                        <p style="margin-top:5px">詳細使用介紹>><a href="http://www2.jrhokkaido.co.jp/global/chinese/railpass/welcome.html" target="_blank">札幌-小樽 Welcom Pass</a></p>
                        <h2 class="h2" style="padding-top:20px;">4. 札幌地下鐵一日券</h2>
                        <div style="margin-top:20px; font-size:15px; width:600px;">
                            <div style="width:121px; display:inline-block; vertical-align:top"><img src="data/images/<?= $pk ?>_04-pic.jpg" width="121" alt=""/></div>
                            <div style="width:429px; padding-left:30px; display:inline-block;"><p2 class="p2"><span style="font-size:larger">■</span>適用對象：持券者皆可使用。<br>
<span style="font-size:larger">■</span>使用範圍：一天內可自由搭乘札幌市內的所有地鐵。<br>
<span style="font-size:larger">■</span>票價： ￥830 /大人，￥420/小孩。</p2>
<p style="margin-top:5px">詳細使用介紹>><a href="http://www.city.sapporo.jp/st/josyaken/card.html#subway_only" target="_blank">札幌地下鐵一日券</a></p></div>
                        </div>
                        <h2 class="h2" style="padding-top:20px;">5. 札幌假日限定地下鐵一日券</h2>
                        <div style="margin-top:20px; font-size:15px; width:600px;">
                            <div style="width:121px; display:inline-block; vertical-align:top"><img src="data/images/<?= $pk ?>_05-pic.jpg" width="121" alt=""/></div>
                            <div style="width:429px; padding-left:30px; display:inline-block;"><p2 class="p2"><span style="font-size:larger">■</span>適用對象：持券者皆可使用。<br>
<span style="font-size:larger">■</span>使用範圍：週六、週日和年終假期 (12/29 - 1/3) 所限定使用，一天內可自由搭乘札幌市內的所有地下鐵。<br>
<span style="font-size:larger">■</span>票價： ￥520 /大人，￥260/小孩</p2>
<p style="margin-top:5px">詳細使用介紹>><a href="http://www.city.sapporo.jp/st/josyaken/card.html#oneday" target="_blank">札幌假日限定地下鐵一日券</a></p></div>
                        </div>
                        <h2 class="h2" style="padding-top:20px;">6. 小樽市內一日乘車券</h2>
                        <div id="page_pic" style="padding-top:20px;">
                            <a href="http://www.chuo-bus.co.jp/main/feature/otaru/" target="_blank"><img src="data/images/<?= $pk ?>_06-pic.jpg" width="431" alt=""/></a>
                        </div>
                        <p2 class="p2"><span style="font-size:larger">■</span>適用對象：持券者皆可使用。<br>
<span style="font-size:larger">■</span>使用範圍：小樽市內的路線巴士(均一區門內)為1日自由乘車，還附有市內觀光設施等的優惠資訊。<br>
<span style="font-size:larger">■</span>販售處：中央巴士小樽站前總站、小樽散策巴士車內、運河PLAZA<br>
<span style="font-size:larger">■</span>票價： ￥750 /大人，￥380/小孩<br>
</p2>
                        <p style="margin-top:5px">詳細使用介紹>><a href="http://www.chuo-bus.co.jp/main/feature/otaru/" target="_blank">小樽市內一日乘車券</a></p>
                        <h2 class="h2" style="padding-top:20px;">7. 函館「市電、巴士通用乘車券」</h2>
                        <div id="page_pic" style="padding-top:20px;">
                            <a href="http://www.city.hakodate.hokkaido.jp/docs/2014012100977/" target="_blank"><img src="data/images/<?= $pk ?>_07-pic.jpg" width="600" alt=""/></a>
                        </div>
                        <p2 class="p2"><span style="font-size:larger">■</span>票券介紹：介紹3種類的乘車券「市電一日卷」、「市電函館巴士通用一日券」及「市電函館巴士通用二日券」。可依照自己停留函館的時間來選擇票券，如果預計要在函館住一晚，很推薦大家購買「市電函館巴士通用二日券」。<br>
<span style="font-size:larger">■</span>販售處：函館車站內的「觀光案內所」或者車站外的「案內待合所」(觀光巴士4號乘車處)購得</p2>
                        <p style="margin-top:5px">詳細使用介紹>><a href="http://www.city.hakodate.hokkaido.jp/docs/2014012100977/" target="_blank">函館「市電、巴士通用乘車券」</a></p>
                        <h2 class="h2" style="padding-top:20px;">8. 北海道內巴士交通</h2>
                        <br>
                        <p2 class="p2">在北海道內有很多觀光景點是無法利用鐵路交通前往，搭乘都市既經濟又便捷，推薦給想要進行省錢之旅的人。除了固定的都市間的長途巴士之外，在各主要觀光景點都市更有配合觀光季節所運行的觀光巴士。<br>
<span style="font-size:larger">※</span>因季節不同巴士出發的時刻以及到達目的地所需時間會稍有變動，詳情請向各巴士公司查詢，或參考該公司網頁。</p2>
<p style="margin-top:5px"><a href="http://www.chuo-bus.co.jp/main/feature/otaru/" target="_blank">北海道中央巴士</a> TEL:011-231-0500</p>
<p style="margin-top:5px"><a href="http://www.hokto.co.jp/" target="_blank">北都交通巴士</a> TEL:011-377-3855</p>
                        <script type="text/javascript">

							/*$("#map01").fancybox({
								type: 'iframe',
                                centerOnScroll: true,
                                width: 1024,
                                height: 768,
                                margin: 20,
                                autoScale: true,
                                autoDimensions: true,
								autoSize: true,
								onUpdate    : function(){
                                    $.fancybox.resize();
                                    //$.fancybox.center();
                                }
                            });*/
							
							$("#map01").click(function(){
							    $.fancybox({
                                    width:1024,
                                    height:768,
                                    href:'http://www.jrhokkaido.co.jp/network/img/routemap_j.pdf#page=1&zoom=88',
                                    autoScale:false,
                                    type:'iframe'
                                });
								/*
								layer.open({
                                    type: 2,
                                    //skin: 'layui-layer-lan',
                                    title: '北海道交通路線圖',
                                    fix: false,
                                    shadeClose: false,
                                    maxmin: false,
                                    area: ['900px', '750px'],
                                    content: 'http://www.jrhokkaido.co.jp/network/img/routemap_j.pdf#page=1&zoom=80'
                                });
								*/
							});
							
							
							
							
							
							$("#pic01_link01").click(function(){
                                window.open("http://www2.jrhokkaido.co.jp/global/chinese/index.html", "_blank"); 
		                        return false;
                            });
							$("#pic01_link02").click(function(){
                                window.open("http://www.new-chitose-airport.jp/tw/access/bus/timebusc/", "_blank"); 
		                        return false;
                            });
						</script>
