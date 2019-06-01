<!--特別議題-->
<div class="col-md-12 col">

    <div class="cardshap green_tab mouseHover_other_tab">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item news_tab four_tab">
        <a class="nav-link active pl-30 py-2" id="special_1-tab" href="info_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=11" tab-target="#special_1" aria-selected="true">東京資訊</a>
      </li>
      <li class="nav-item news_tab four_tab">
        <a class="nav-link py-2" id="special_2-tab" href="view_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>" tab-target="#special_2" aria-selected="false">東京景點</a>
      </li>
      <li class="nav-item news_tab four_tab">
        <a class="nav-link py-2" id="special_3-tab" href="sky_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=11" tab-target="#special_3" aria-selected="false">飛往東京</a>
      </li>
      <li class="nav-item news_tab four_tab">
        <a class="nav-link py-2" id="special_4-tab" href="traffic_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=11" tab-target="#special_4" aria-selected="false">東京交通</a>
      </li>

    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

        <div class="row no-gutters hv-center">
            <img class="wx-100-ph" src="../../img/component/recomm_02_content_01_11.jpg" title="新聞">
        </div>
        <div class="travel_about pl-md-5 ml-md-1">
          <a><h6>東京，不管去幾次都不厭倦！</h6></a>
          <p>初訪東京，淺草雷門大大紅色燈籠是必拍景點，迪士尼好玩到夜深都不想離去，六本木<br>
             絢爛夜景美不勝收，也對新宿擁擠的電車人潮留下難忘的印象！
          <span><a href="info_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=11">more</a></span></p>

        </div>
       
      </div>
      <div class="tab-pane fade" id="special_2" role="tabpanel" aria-labelledby="special_2-tab">
         <div class="row no-gutters hv-center">


          <?php 
           require 'nt2019012216202539_map.php';
          ?>
          

        </div>
         <div class="row no-gutters travel_list">
             <div class="col-md-6 col-6">
              <a href="recommend_detail.php?tr_pk=<?php echo $_GET['tr_pk']; ?>&type=58&pk=11&idx=1">
                <h6><img src="../../img/component/icon/map-icon.png">超殺攻略！淺草晴空塔趴趴GO</h6>
              </a>
             </div>
              <div class="col-md-6 col-6">
              <a href="recommend_detail.php?tr_pk=<?php echo $_GET['tr_pk']; ?>&type=58&pk=11&idx=2">
                <h6><img src="../../img/component/icon/map-icon.png">就要醬玩！築地台場親子玩透透</h6>
              </a>
             </div>
          </div>
          <div class="row no-gutters travel_list">
             <div class="col-md-6 col-6">
              <a href="recommend_detail.php?tr_pk=<?php echo $_GET['tr_pk']; ?>&type=58&pk=11&idx=3">
                <h6><img src="../../img/component/icon/map-icon.png">悠閒散策！原宿澀谷新宿好好逛</h6>
              </a>
             </div>
              <div class="col-md-6 col-6">
              <a href="recommend_detail.php?tr_pk=<?php echo $_GET['tr_pk']; ?>&type=58&pk=11&idx=4">
                <h6><img src="../../img/component/icon/map-icon.png">漫迷必訪！走進宮崎駿奇幻世界</h6>
              </a>
             </div>
          </div>
       
      </div>
      <div class="tab-pane fade" id="special_3" role="tabpanel" aria-labelledby="special_3-tab">

       <div class="row no-gutters hv-center">
            <img class="wx-100-ph" src="../../img/component/recomm_02_content_03_11.jpg" title="新聞">
        </div>
         <div class="travel_about pl-md-5 ml-md-1">
          <a><h6>先搞定飛往東京機票</h6></a>
          <p>進入年底時刻，不少民眾向旅行業者購買行程,安排出國跨年活動。行政院消保...
          <span><a href="sky_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=11">more</a></span>
          </p>
        </div>
       
      </div>
      <div class="tab-pane fade" id="special_4" role="tabpanel" aria-labelledby="special_4-tab">

       <div class="row no-gutters hv-center">
            <img class="wx-100-ph" src="../../img/component/recomm_02_content_04_11.jpg" title="新聞">
        </div>
         <div class="travel_about pl-md-5 ml-md-1">
          <a><h6>旅行社代退訂爭議多　消保處提醒4點要</h6></a>
          <p>東京自由行第一件事就是先搞定「飛機」，飛往東京主要是兩大機場－成田機場及羽田機場<br>，現在多虧廉價航空興起，單程飛東京千元即可成行，前往東京真的沒那麼難，就從搞定你<br>的飛機票著手吧！
          <span><a href="traffic_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=11">more</a></span>
          </p>
        </div>
       
      </div>
    </div>
  </div>




</div>
<!--特別議題end -->