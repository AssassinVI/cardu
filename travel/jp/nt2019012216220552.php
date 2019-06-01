<!--特別議題-->
<div class="col-md-12 col">



    <div class="cardshap green_tab mouseHover_other_tab">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item news_tab four_tab">
        <a class="nav-link active pl-30 py-2" id="special_1-tab" href="info_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=16" tab-target="#special_1" aria-selected="true">沖繩資訊</a>
      </li>
      <li class="nav-item news_tab four_tab">
        <a class="nav-link py-2" id="special_2-tab" href="view_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>" tab-target="#special_2" aria-selected="false">沖繩景點</a>
      </li>
      <li class="nav-item news_tab four_tab">
        <a class="nav-link py-2" id="special_3-tab" href="sky_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=16" tab-target="#special_3" aria-selected="false">飛往沖繩</a>
      </li>
      <li class="nav-item news_tab four_tab">
        <a class="nav-link py-2" id="special_4-tab" href="traffic_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=16" tab-target="#special_4" aria-selected="false">沖繩交通</a>
      </li>

    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">

        <div class="row no-gutters hv-center">
            <img class="wx-100-ph" src="../../img/component/travel/okinnawa/recomm_02_content_01_16.jpg" title="新聞">
        </div>
        <div class="travel_about pl-md-5 ml-md-1">
          <a><h6>不到2小時就可到達的度假天堂－沖繩</h6></a>
          <p>沖繩有著燦爛的陽光，蔚藍的大海、白色的沙灘，也是日本最熱門的度假勝地。從台灣出發不到2小時，就可抵達碧海藍天的度假天堂！
          <span><a href="info_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=16">more</a></span></p>
        </div>
       
      </div>
      <div class="tab-pane fade" id="special_2" role="tabpanel" aria-labelledby="special_2-tab">
         <div class="row no-gutters hv-center">



          <?php require 'nt2019012216220552_map.php'; ?>
          
          

        </div>
         <div class="row no-gutters travel_list">
             <div class="col-md-6 col-6">
              <a href="recommend_detail.php?tr_pk=<?php echo $_GET['tr_pk']; ?>&type=58&pk=16&idx=1">
                <h6><img src="../../img/component/icon/map-icon.png">人氣行程～沖繩親子就醬玩透透</h6>
              </a>
             </div>
              <div class="col-md-6 col-6">
              <a href="recommend_detail.php?tr_pk=<?php echo $_GET['tr_pk']; ?>&type=58&pk=16&idx=2">
                <h6><img src="../../img/component/icon/map-icon.png">壯闊美景～沖繩放空浮潛賞夕照</h6>
              </a>
             </div>
          </div>
          <div class="row no-gutters travel_list">
             <div class="col-md-6 col-6">
              <a href="recommend_detail.php?tr_pk=<?php echo $_GET['tr_pk']; ?>&type=58&pk=16&idx=3">
                <h6><img src="../../img/component/icon/map-icon.png">尋古探幽～走訪沖繩世界遺產行</h6>
              </a>
             </div>
              <div class="col-md-6 col-6">
              <a href="recommend_detail.php?tr_pk=<?php echo $_GET['tr_pk']; ?>&type=58&pk=16&idx=4">
                <h6><img src="../../img/component/icon/map-icon.png">血拼攻略！美國村國際村趴趴走</h6>
              </a>
             </div>
          </div>
       
      </div>
      <div class="tab-pane fade" id="special_3" role="tabpanel" aria-labelledby="special_3-tab">

       <div class="row no-gutters hv-center">
            <img class="wx-100-ph" src="../../img/component/travel/okinnawa/recomm_02_content_03_16.jpg" title="新聞">
        </div>
         <div class="travel_about pl-md-5 ml-md-1">
          <a><h6>搞定飛往沖繩機票</h6></a>
          <p>不論您想要前往沖繩那個景點，搭乘前往那霸機場的飛機就對了！想要擁抱碧海藍天，就從搞定你的飛機票著手吧！<span>
            <a href="sky_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=16">more</a></span></p>
        </div>
       
      </div>
      <div class="tab-pane fade" id="special_4" role="tabpanel" aria-labelledby="special_4-tab">

       <div class="row no-gutters hv-center">
            <img class="wx-100-ph" src="../../img/component/travel/okinnawa/recomm_02_content_04_16.jpg" title="新聞">
        </div>
         <div class="travel_about pl-md-5 ml-md-1">
          <a><h6>根據旅行目的地，選擇交通工具！</h6></a>
          <p>抵達機場後，根據你的旅行目的地，選擇想要搭乘的交通工具，不論您想要前往沖繩任何一個景點，都可輕鬆到達！
          <span><a href="traffic_detail.php?tr_pk=<?php echo $_GET['tr_pk'];?>&type=58&pk=16">more</a></span>
          </p>
        </div>
       
      </div>
    </div>
  </div>


</div>
<!--特別議題end -->