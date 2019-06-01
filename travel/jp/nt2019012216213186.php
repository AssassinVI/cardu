<!--特別議題-->
<div class="col-md-12 col">



    <div class="cardshap green_tab mouseHover_other_tab">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item news_tab four_tab">
        <a class="nav-link active pl-30 py-2" id="special_1-tab" href="info_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=14" tab-target="#special_1" aria-selected="true">東北資訊</a>
      </li>
      <li class="nav-item news_tab four_tab">
        <a class="nav-link py-2" id="special_2-tab" href="view_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>" tab-target="#special_2" aria-selected="false">東北景點</a>
      </li>
      <li class="nav-item news_tab four_tab">
        <a class="nav-link py-2" id="special_3-tab" href="sky_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=14" tab-target="#special_3" aria-selected="false">飛往東北</a>
      </li>
      <li class="nav-item news_tab four_tab">
        <a class="nav-link py-2" id="special_4-tab" href="traffic_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=14" tab-target="#special_4" aria-selected="false">東北交通</a>
      </li>

    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

        <div class="row no-gutters hv-center">
            <img class="wx-100-ph" src="../../img/component/travel/tour/recomm_02_content_01_14.jpg" title="新聞">
        </div>
        <div class="travel_about pl-md-5 ml-md-1">
          <a><h6>東北，遠離都市享受大自然的美好</h6></a>
          <p>厭倦都市繁華的面貌，不想跟成群觀光客人擠人？來趟東北之旅吧。這裡蘊藏著上等的溫泉，擁有原始而壯麗的大自然風貌，並伴隨純樸友善的日式人情味，去過一次就會著迷於此地的魅力。<span>
          <a href="info_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=14">more</a></span></p>
        </div>
       
      </div>
      <div class="tab-pane fade" id="special_2" role="tabpanel" aria-labelledby="special_2-tab">
         <div class="row no-gutters hv-center">


          <?php require 'nt2019012216213186_map.php'; ?>
          
          

        </div>
         <div class="row no-gutters travel_list">
             <div class="col-md-6 col-6">
              <a href="recommend_detail.php?tr_pk=<?php echo $_GET['tr_pk']; ?>&type=58&pk=14&idx=1">
                <h6><img src="../../img/component/icon/map-icon.png">青森絕景～十和田感受繽紛秋色</h6>
              </a>
             </div>
              <div class="col-md-6 col-6">
              <a href="recommend_detail.php?tr_pk=<?php echo $_GET['tr_pk']; ?>&type=58&pk=14&idx=2">
                <h6><img src="../../img/component/icon/map-icon.png">福島漫遊～拜訪古城泡湯又暖心</h6>
              </a>
             </div>
          </div>
          <div class="row no-gutters travel_list">
             <div class="col-md-6 col-6">
              <a href="recommend_detail.php?tr_pk=<?php echo $_GET['tr_pk']; ?>&type=58&pk=14&idx=3">
                <h6><img src="../../img/component/icon/map-icon.png">走訪仙台～品美食欣賞奧之細道</h6>
              </a>
             </div>
              <div class="col-md-6 col-6">
              <a href="recommend_detail.php?tr_pk=<?php echo $_GET['tr_pk']; ?>&type=58&pk=14&idx=4">
                <h6><img src="../../img/component/icon/map-icon.png">秋田散策～陸奧小京都角館即行</h6>
              </a>
             </div>
          </div>
       
      </div>
      <div class="tab-pane fade" id="special_3" role="tabpanel" aria-labelledby="special_3-tab">

       <div class="row no-gutters hv-center">
            <img class="wx-100-ph" src="../../img/component/travel/tour/recomm_02_content_03_14.jpg" title="新聞">
        </div>
         <div class="travel_about pl-md-5 ml-md-1">
          <a><h6>❤分享》尋訪日本10大奇幻自然現象</h6></a>
          <p>走訪日本這麼多次，還是有很多地方很多景色沒有看過，樂天旅遊整理出日本10大奇...
          <span><a href="sky_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=14">more</a></span>
          </p>
        </div>
       
      </div>
      <div class="tab-pane fade" id="special_4" role="tabpanel" aria-labelledby="special_4-tab">

       <div class="row no-gutters hv-center">
            <img class="wx-100-ph" src="../../img/component/travel/tour/recomm_02_content_04_14.jpg" title="新聞">
        </div>
         <div class="travel_about pl-md-5 ml-md-1">
          <a><h6>根據旅行目的地，選擇交通工具！</h6></a>
          <p>抵達機場後，根據你的旅行目的地，選擇想要搭乘的交通工具，不論您想要前往東北任何景點，都可輕鬆到達！
          <span><a href="traffic_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=14">more</a></span>
          </p>
        </div>
       
      </div>
    </div>
  </div>


</div>
<!--特別議題end -->