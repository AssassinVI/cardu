<!--特別議題-->
<div class="col-md-12 col">


    <div class="cardshap green_tab mouseHover_other_tab">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item news_tab four_tab">
        <a class="nav-link active pl-30 py-2" id="special_1-tab" href="info_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=12" tab-target="#special_1" aria-selected="true">關西資訊</a>
      </li>
      <li class="nav-item news_tab four_tab">
        <a class="nav-link py-2" id="special_2-tab" href="view_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>" tab-target="#special_2" aria-selected="false">關西景點</a>
      </li>
      <li class="nav-item news_tab four_tab">
        <a class="nav-link py-2" id="special_3-tab" href="sky_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=12" tab-target="#special_3" aria-selected="false">飛往關西</a>
      </li>
      <li class="nav-item news_tab four_tab">
        <a class="nav-link py-2" id="special_4-tab" href="traffic_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=12" tab-target="#special_4" aria-selected="false">關西交通</a>
      </li>

    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

        <div class="row no-gutters hv-center">
            <img class="wx-100-ph" src="../../img/component/travel/kansai/about_2/recomm_02_content_01_12.jpg" title="新聞">
        </div>
        <div class="travel_about pl-md-5 ml-md-1">
          <a><h6>一年四季都值得去的關西</h6></a>
          <p>關西有著千變萬化的地區風情，像是可以感受傳統日本優雅風情的京都，商業繁榮人潮聚集<br>
            的大阪，異國風情濃厚的神戶，以及有著可愛小鹿的古都奈良，一年四季不管何時來造訪，<br>都能夠感受獨特的關西魅力！<span>
          <a href="info_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=12">more</a></span></p>
        </div>
       
      </div>
      <div class="tab-pane fade" id="special_2" role="tabpanel" aria-labelledby="special_2-tab">
         <div class="row no-gutters hv-center">


          <?php 
           require 'nt2019012216211277_map.php';
          ?>
          
          

        </div>
         <div class="row no-gutters travel_list">
             <div class="col-md-6 col-6">
              <a href="recommend_detail.php?tr_pk=<?php echo $_GET['tr_pk']; ?>&type=58&pk=12&idx=1">
                <h6><img src="../../img/component/icon/map-icon.png">穿上和服走訪京都清水寺祇園行</h6>
              </a>
             </div>
              <div class="col-md-6 col-6">
              <a href="recommend_detail.php?tr_pk=<?php echo $_GET['tr_pk']; ?>&type=58&pk=12&idx=2">
                <h6><img src="../../img/component/icon/map-icon.png">搭小火車去旅行！京都嵐山漫遊</h6>
              </a>
             </div>
          </div>
          <div class="row no-gutters travel_list">
             <div class="col-md-6 col-6">
              <a href="recommend_detail.php?tr_pk=<?php echo $_GET['tr_pk']; ?>&type=58&pk=12&idx=3">
                <h6><img src="../../img/component/icon/map-icon.png">不可錯過！大阪購物美食好好買</h6>
              </a>
             </div>
              <div class="col-md-6 col-6">
              <a href="recommend_detail.php?tr_pk=<?php echo $_GET['tr_pk']; ?>&type=58&pk=12&idx=4">
                <h6><img src="../../img/component/icon/map-icon.png">超夯景點！神戶異國美食趴趴走</h6>
              </a>
             </div>
          </div>
       
      </div>
      <div class="tab-pane fade" id="special_3" role="tabpanel" aria-labelledby="special_3-tab">

       <div class="row no-gutters hv-center">
            <img class="wx-100-ph" src="../../img/component/travel/kansai/about_2/recomm_02_content_03_12.jpg" title="新聞">
        </div>
         <div class="travel_about pl-md-5 ml-md-1">
          <a><h6>搞定飛往關西機票</h6></a>
          <p>不管您想要前往大阪、京都或奈良，皆要搭乘往關西國際機場的飛機，關西國際機場位於大阪，只要3小時即可到達！飛往關西還等什麼？就從搞定你的飛機票著手吧！<span><a href="sky_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=12">more</a></span></p>
        </div>
       
      </div>
      <div class="tab-pane fade" id="special_4" role="tabpanel" aria-labelledby="special_4-tab">

       <div class="row no-gutters hv-center">
            <img class="wx-100-ph" src="../../img/component/travel/kansai/about_2/recomm_02_content_04_12.jpg" title="新聞">
        </div>
         <div class="travel_about pl-md-5 ml-md-1">
          <a><h6>根據旅行目的地，選擇交通工具！</h6></a>
          <p>抵達關西國際機場後，根據你的旅行目的地，選擇想要搭乘的交通工具，不論您想要前往大阪、京都、奈良等，都可輕鬆到達！
          <span><a href="traffic_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=12">more</a></span>
          </p>
        </div>
       
      </div>
    </div>
  </div>


</div>
<!--特別議題end -->