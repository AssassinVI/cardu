<!--特別議題-->
<div class="col-md-12 col">



    <div class="cardshap green_tab mouseHover_other_tab">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item news_tab four_tab">
        <a class="nav-link active pl-30 py-2" id="special_1-tab" href="info_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=15" tab-target="#special_1" aria-selected="true">九州資訊</a>
      </li>
      <li class="nav-item news_tab four_tab">
        <a class="nav-link py-2" id="special_2-tab" href="view_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>" tab-target="#special_2" aria-selected="false">九州景點</a>
      </li>
      <li class="nav-item news_tab four_tab">
        <a class="nav-link py-2" id="special_3-tab" href="sky_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=15" tab-target="#special_3" aria-selected="false">飛往九州</a>
      </li>
      <li class="nav-item news_tab four_tab">
        <a class="nav-link py-2" id="special_4-tab" href="traffic_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=15" tab-target="#special_4" aria-selected="false">九州交通</a>
      </li>

    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

        <div class="row no-gutters hv-center">
            <img class="wx-100-ph" src="../../img/component/travel/kyushu/recomm_02_content_01_15.jpg" title="新聞">
        </div>
        <div class="travel_about pl-md-5 ml-md-1">
          <a><h6>九州，截然不同的旅遊風情！</h6></a>
          <p>在九州可感受截然不同的旅遊風情，無論是熊本城下尋訪前人足跡、欣賞阿蘇火山壯闊絕景、在天然溫泉中放鬆身心或是品嚐九州7縣道地美食，在這集美景、溫泉、美食三大特色的九州，都可以感受到無窮魅力與驚喜。<span>
          <a href="info_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=15">more</a></span></p>
        </div>
       
      </div>
      <div class="tab-pane fade" id="special_2" role="tabpanel" aria-labelledby="special_2-tab">
         <div class="row no-gutters hv-center">

          

          <?php require 'nt2019012216214163_map.php'; ?>
          

        </div>
         <div class="row no-gutters travel_list">
             <div class="col-md-6 col-6">
              <a href="recommend_detail.php?tr_pk=<?php echo $_GET['tr_pk']; ?>&type=58&pk=15&idx=1">
                <h6><img src="../../img/component/icon/map-icon.png">壯闊絕景！熊本火之國自然巡禮</h6>
              </a>
             </div>
              <div class="col-md-6 col-6">
              <a href="recommend_detail.php?tr_pk=<?php echo $_GET['tr_pk']; ?>&type=58&pk=15&idx=2">
                <h6><img src="../../img/component/icon/map-icon.png">盡情享受！漫遊福岡好吃又好玩</h6>
              </a>
             </div>
          </div>
          <div class="row no-gutters travel_list">
             <div class="col-md-6 col-6">
              <a href="recommend_detail.php?tr_pk=<?php echo $_GET['tr_pk']; ?>&type=58&pk=15&idx=3">
                <h6><img src="../../img/component/icon/map-icon.png">溫泉大不同！由布院別府泡湯旅</h6>
              </a>
             </div>
              <div class="col-md-6 col-6">
              <a href="recommend_detail.php?tr_pk=<?php echo $_GET['tr_pk']; ?>&type=58&pk=15&idx=4">
                <h6><img src="../../img/component/icon/map-icon.png">異國風情！長崎白天夜晚超迷人</h6>
              </a>
             </div>
          </div>
       
      </div>
      <div class="tab-pane fade" id="special_3" role="tabpanel" aria-labelledby="special_3-tab">

       <div class="row no-gutters hv-center">
            <img class="wx-100-ph" src="../../img/component/travel/kyushu/recomm_02_content_03_15.jpg" title="新聞">
        </div>
         <div class="travel_about pl-md-5 ml-md-1">
          <a><h6>搞定飛往九州機票</h6></a>
          <p>不論您想要前往九州那個景點，搭乘前往九州各機場的飛機就對了！想要感受九州壯闊絕景及品嚐道地美食，就從搞定你的飛機票著手吧！<span>
            <a href="sky_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=15">more</a></span></p>
        </div>
       
      </div>
      <div class="tab-pane fade" id="special_4" role="tabpanel" aria-labelledby="special_4-tab">

       <div class="row no-gutters hv-center">
            <img class="wx-100-ph" src="../../img/component/travel/kyushu/recomm_02_content_04_15.jpg" title="新聞">
        </div>
         <div class="travel_about pl-md-5 ml-md-1">
          <a><h6>根據旅行目的地，選擇交通工具！</h6></a>
          <p>抵達機場後，根據你的旅行目的地，選擇想要搭乘的交通工具，不論您想要前往九州任何一個景點，都可輕鬆到達！
          <span><a href="traffic_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=15">more</a></span>
          </p>
        </div>
       
      </div>
    </div>
  </div>


</div>
<!--特別議題end -->