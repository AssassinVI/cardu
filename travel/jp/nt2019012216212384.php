<!--特別議題-->
<div class="col-md-12 col">



    <div class="cardshap green_tab mouseHover_other_tab">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item news_tab four_tab">
        <a class="nav-link active pl-30 py-2" id="special_1-tab" href="info_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=13" tab-target="#special_1" aria-selected="true">北海道資訊</a>
      </li>
      <li class="nav-item news_tab four_tab">
        <a class="nav-link py-2" id="special_2-tab" href="view_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>" tab-target="#special_2" aria-selected="false">北海道景點</a>
      </li>
      <li class="nav-item news_tab four_tab">
        <a class="nav-link py-2" id="special_3-tab" href="sky_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=13" tab-target="#special_3" aria-selected="false">飛往北海道</a>
      </li>
      <li class="nav-item news_tab four_tab">
        <a class="nav-link py-2" id="special_4-tab" href="traffic_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=13" tab-target="#special_4" aria-selected="false">北海道交通</a>
      </li>

    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

        <div class="row no-gutters hv-center">
            <img class="wx-100-ph" src="../../img/component/travel/hokkaido/about_3/recomm_02_content_01_13.jpg" title="新聞">
        </div>
        <div class="travel_about pl-md-5 ml-md-1">
          <a><h6>愛上北海道的純粹自然，一窺北海道四季之美！</h6></a>
          <p>北海道是位於日本北端的一個島嶼，四面環海，土地遼闊，約占日本總面積的22%。北海道日與夜、四季之美，輕而易舉令人陷入永恆幸福中。<span>
          <a href="info_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=13">more</a></span></p>
        </div>
       
      </div>
      <div class="tab-pane fade" id="special_2" role="tabpanel" aria-labelledby="special_2-tab">
         <div class="row no-gutters hv-center">


          <?php require 'nt2019012216212384_map.php'; ?>
          
          

        </div>
         <div class="row no-gutters travel_list">
             <div class="col-md-6 col-6">
              <a href="recommend_detail.php?tr_pk=<?php echo $_GET['tr_pk']; ?>&type=58&pk=13&idx=1">
                <h6><img src="../../img/component/icon/map-icon.png">夏日美景！富良野美瑛慢活賞花</h6>
              </a>
             </div>
              <div class="col-md-6 col-6">
              <a href="recommend_detail.php?tr_pk=<?php echo $_GET['tr_pk']; ?>&type=58&pk=13&idx=2">
                <h6><img src="../../img/component/icon/map-icon.png">走訪小樽～漫步在北國小鎮風情</h6>
              </a>
             </div>
          </div>
          <div class="row no-gutters travel_list">
             <div class="col-md-6 col-6">
              <a href="recommend_detail.php?tr_pk=<?php echo $_GET['tr_pk']; ?>&type=58&pk=13&idx=3">
                <h6><img src="../../img/component/icon/map-icon.png">釧路散策！搭火車走訪濕原秘境</h6>
              </a>
             </div>
              <div class="col-md-6 col-6">
              <a href="recommend_detail.php?tr_pk=<?php echo $_GET['tr_pk']; ?>&type=58&pk=13&idx=4">
                <h6><img src="../../img/component/icon/map-icon.png">戰嚴冬！搭流冰慢車號欣賞流冰</h6>
              </a>
             </div>
          </div>
       
      </div>
      <div class="tab-pane fade" id="special_3" role="tabpanel" aria-labelledby="special_3-tab">

       <div class="row no-gutters hv-center">
            <img class="wx-100-ph" src="../../img/component/travel/hokkaido/about_3/recomm_02_content_03_13.jpg" title="新聞">
        </div>
         <div class="travel_about pl-md-5 ml-md-1">
          <a><h6>搞定飛往北海道機票</h6></a>
          <p>北海道自由行第一件該做的功課就是搞定「飛機」，飛往北海道機場選擇較多，有新千歲機場、函館機場及旭川機場，計劃你的北海道之行，就從搞定你的飛機票著手吧！<span><a href="sky_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=13">more</a></span></p>
        </div>
       
      </div>
      <div class="tab-pane fade" id="special_4" role="tabpanel" aria-labelledby="special_4-tab">

       <div class="row no-gutters hv-center">
            <img class="wx-100-ph" src="../../img/component/travel/hokkaido/about_3/recomm_02_content_04_13.jpg" title="新聞">
        </div>
         <div class="travel_about pl-md-5 ml-md-1">
          <a><h6>根據旅行目的地，選擇交通工具！</h6></a>
          <p>抵達機場後，根據你的旅行目的地，選擇想要搭乘的交通工具，不論您想要前往北海道任一景點，都可輕鬆到達！
          <span><a href="traffic_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=13">more</a></span>
          </p>
        </div>
       
      </div>
    </div>
  </div>


</div>
<!--特別議題end -->