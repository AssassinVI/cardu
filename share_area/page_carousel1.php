 <div class="col-md-12 col">
    
    <!-- 四小三大輪播 -->
    <div id="new_iNews" class="cardshap new_slide">
        <div class="swiper-container">
            <div class="swiper-wrapper">

              
              <?php 
                //-- 廣告陣列 --
                for ($i=0; $i <6 ; $i++) { 
                  $ad_arr[$i]=[
                  'Tb_index'=>'ad123456',
                  'ns_ftitle'=>'廣告',
                  'ns_msghtml'=>'我是廣告',
                  'ns_photo_1'=>'../img/component/photo2.jpg'
                  ];
                }

                $carousel_pdo=new PDO_fun;
                
                //-- 撈卡情報 --
                $row_slide=$carousel_pdo->select($sql_carousel ,['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);
                $slide_all_arr=[];
                for ($i=0; $i <12 ; $i++) { 
                  //-- 文章 --
                  if ($i%2==0) {
                    $slide_all_arr[$i]=$row_slide[$i/2];
                  }
                  //-- ad --
                  else{
                    $slide_all_arr[$i]=$ad_arr[$i/2];
                  }
                }

                for ($i=0; $i <3 ; $i++) { 
                  $slide_img='';
                  $slide_list='';

                  for ($j=0; $j <4 ; $j++) { 

                    $active=$j==0 ? 'active':'';
                    $index=($i*4)+$j;
                    $ns_ftitle=mb_substr($slide_all_arr[$index]['ns_ftitle'], 0,15,'utf-8');
                    $ns_msghtml=mb_substr(strip_tags($slide_all_arr[$index]['ns_msghtml']), 0,15,'utf-8');
                    
                    //-- 判斷網址 --
                    $a_url=news_url($slide_all_arr[$index]['mt_id'], $slide_all_arr[$index]['Tb_index'], $slide_all_arr[$index]['ns_nt_pk'], $slide_all_arr[$index]['area_id']);
                    //-- 判斷廣告圖片 --
                    $ns_photo_1=$j%2==1 ? $slide_all_arr[$index]['ns_photo_1'] : '../sys/img/'.$slide_all_arr[$index]['ns_photo_1'];
                    
                    $slide_img.='
                    <a href="'.$a_url.'" index_img="'.($j+1).'" title="'.$slide_all_arr[$index]['ns_ftitle'].'" class="img_div '.$active.'" style="background-image: url('.$ns_photo_1.');">
                    </a>';
                    $slide_list.='
                     <a class="'.$active.'" href="'.$a_url.'" index="'.($j+1).'" title="'.$slide_all_arr[$index]['ns_ftitle'].'">
                        <h4>'.$ns_ftitle.'</h4>
                        <p>'.$ns_msghtml.'...</p>
                      </a>';
                  }

                  $txt='
                  <div class="swiper-slide" > 
                  <div class="slide_div">
                    <div class="slide_img">
                      '.$slide_img.'
                    </div>
                    <div class="slide_list">
                      '.$slide_list.'
                    </div>
                  </div>
                </div>';

                echo $txt;
                }

                $carousel_pdo=NULL;
              ?>

            </div>
            <!-- 如果需要分页器 -->
            <div class="swiper-pagination"></div>

        </div>
    </div>
    <!-- 四小三大輪播 END -->

</div>
