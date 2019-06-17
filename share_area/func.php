<?php 
//===============================================================================================================
//=========================================== 前台功能(pc) ====================================================================
//===============================================================================================================
//@@@@@ (pc) @@@@@@@@@@
//----- 單卡網址
//----- 卡排行 比較文字判斷
//----- 判斷新聞連結
//----- 版區、次版區banner 四小三大輪播
//----- 各版區首頁-次版6篇文章
//----- 分頁
//----- MENU fun
//----- 新聞點閱
//----- 判斷手機AND平板
//----- 新聞次版區list
//----- 新聞內頁分享功能按鈕
//----- 去除空白
//@@@@@ (手機) @@@@@@@@@@
//----- 版區、次版區banner 輪播 (手機板)
//----- 首頁 卡情報、優票證、優旅行
//----- 首頁 優行動pay、優集點
//----- MENU fun ph
//----- 版區各分類3篇文章
//----- 版區各特別議題5篇文章
//----- 版區各刷卡整理||XX攻略5篇文章



//-- 單卡網址 --
function card_url($cc_pk, $cc_group_id)
{
  if (!empty($cc_pk)) {
    return '../card/creditcard.php?cc_pk='.$cc_pk.'&cc_group_id='.$cc_group_id;
  }
  else{
    return '../card/type.php?gid='.$cc_group_id;
  }
}

//-- 卡排行 比較文字判斷 --
function ccs_typename($ccs_typename_mem, $ccs_typename, $ccs_cc_pk2='')
{ 
  $ccs_typename_a_txt='';
  if (!empty($ccs_cc_pk2)) {
    $ccs_typename_a=preg_split('/\n/',$ccs_typename);
    $ccs_cc_pk2=explode(',', $ccs_cc_pk2);
    for ($i=0; $i <count($ccs_typename_a) ; $i++) {
    $cc_url2=mb_strpos($ccs_cc_pk2[$i], 'ccard')===false ? '../cardNews/type.php?gid='.$ccs_cc_pk2[$i] : '../cardNews/creditcard.php?cc_pk='.$ccs_cc_pk2[$i].'&cc_group_id=';
      $ccs_typename_a_txt.='<a href="'.$cc_url2.'">'.$ccs_typename_a[$i].'</a>';
    }
  }
    if (empty($ccs_typename_mem)) {
       if (mb_strlen($ccs_typename,'utf-8')>40) {
          $txt=empty($ccs_cc_pk2) ? mb_substr($ccs_typename, 0, 40, 'utf-8').'..' : '<div>'.$ccs_typename_a_txt.'</div>';
          return '<p class=" hv-center mb-0" data-toggle="tooltip" data-placement="bottom" title="'.$ccs_typename.'">'.$txt.'</p>';
       }
       else{
          $txt=empty($ccs_cc_pk2) ? $ccs_typename : '<div>'.$ccs_typename_a_txt.'</div>';
          return '<p class=" hv-center mb-0">'.$txt.'</p>';
       } 
      }
      else{
          $txt=empty($ccs_cc_pk2) ? $ccs_typename : '<div>'.$ccs_typename_a_txt.'</div>';
          return '<p class=" hv-center mb-0" data-toggle="tooltip" data-placement="bottom" title="'.$ccs_typename_mem.'">'.$ccs_typename.'</p>';
     }
  }



//-- 判斷新聞連結 --
function news_url($mt_id, $news_id, $news_type_id='', $news_area_id='')
{
  //-------------- 網址判斷 ------------------
  switch ($mt_id) {

    //== 新聞 ==
    case 'site2018111910430599':
      $news_url='https://'.$_SERVER['HTTP_HOST'].'/news/detail.php?'.$news_id;
    break;

    //== 卡情報 ==
    case 'site201901111555425':
      //- 新卡訊 -
      if ($news_type_id=='nt201902121004593') {
        $news_url='https://'.$_SERVER['HTTP_HOST'].'/card/new_card_detail.php?'.$news_id;
      }
      //- 權益變更 -
      elseif($news_type_id=='nt2019021210051224'){
        $news_url='https://'.$_SERVER['HTTP_HOST'].'/card/interests_card_detail.php?'.$news_id;
      }
      else{
        $news_url='https://'.$_SERVER['HTTP_HOST'].'/message/detail.php?'.$news_id;
      }
    break;

    //== 優情報 ==
    case 'site2019011116095854':
      //- 優行動pay -
      if ($news_area_id=='at2019011117341414') {
        $news_url='https://'.$_SERVER['HTTP_HOST'].'/mpay/detail.php?'.$news_id;
      }
      //- 優票證 -
      elseif($news_area_id=='at2019011117435970'){
        $news_url='https://'.$_SERVER['HTTP_HOST'].'/eticket/detail.php?'.$news_id;
      }
      //- 優集點 -
      elseif($news_area_id=='at2019011117443626'){
        $news_url='https://'.$_SERVER['HTTP_HOST'].'/epoint/detail.php?'.$news_id;
      }
      //- 優旅行 -
      elseif($news_area_id=='at2019011117461656'){
        $news_url='https://'.$_SERVER['HTTP_HOST'].'/travel/detail.php?'.$news_id;
      }
    break;
  }
  return $news_url;
}




//------------------------------------ 版區、次版區banner 四小三大輪播 ---------------------------------------
function slide_4s_3b($sql_carousel, $where_arr='no')
{
  $txt='
   <div class="col-md-12 col">
    
    <!-- 四小三大輪播 -->
    <div id="new_iNews" class="cardshap new_slide">
        <div class="swiper-container">
            <div class="swiper-wrapper">';
  

  //-- 廣告陣列 --
  for ($i=0; $i <6 ; $i++) { 
    $ad_arr[$i]=[
    'Tb_index'=>'ad123456',
    'ns_ftitle'=>'廣告',
    'ns_msghtml'=>'我是廣告',
    'ns_photo_1'=>'/img/component/photo2.jpg'
    ];
  }

  $carousel_pdo=new PDO_fun;
  
  //-- 撈卡情報 --
  $row_slide=$carousel_pdo->select($sql_carousel , $where_arr);
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
      $ns_msghtml=mb_substr(strip_tags(str_replace(["　",PHP_EOL], '', $slide_all_arr[$index]['ns_msghtml'])), 0,15,'utf-8');
      
      //-- 判斷網址 --
      $a_url=news_url($slide_all_arr[$index]['mt_id'], $slide_all_arr[$index]['Tb_index'], $slide_all_arr[$index]['ns_nt_pk'], $slide_all_arr[$index]['area_id']);
      //-- 判斷廣告圖片 --
      $ns_photo_1=$j%2==1 ? $slide_all_arr[$index]['ns_photo_1'] : '/sys/img/'.$slide_all_arr[$index]['ns_photo_1'];
      
      $slide_img.='
      <a href="'.$a_url.'" index_img="'.($j+1).'" title="'.$slide_all_arr[$index]['ns_ftitle'].'" class="img_div '.$active.'" style="background-image: url('.$ns_photo_1.');">
      </a>';
      $slide_list.='
       <a class="'.$active.'" href="'.$a_url.'" index="'.($j+1).'" title="'.$slide_all_arr[$index]['ns_ftitle'].'">
          <h4>'.$ns_ftitle.'</h4>
          <p>'.$ns_msghtml.'...</p>
        </a>';
    }

    $txt.='
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

  }

  $carousel_pdo=NULL;

  $txt.='</div>
            <!-- 如果需要分页器 -->
            <div class="swiper-pagination"></div>

        </div>
    </div>
    <!-- 四小三大輪播 END -->

</div>';

echo $txt;
}




//----------------------------------- 各版區首頁-次版6篇文章 --------------------------------------------

function index_sec_area($nt_query, $nt_where_arr='no', $list_dir, $color_tab='blue_tab', $tab_class='', $is_sp='no')
{
    $pdo=new PDO_fun;

    $row_news_type=$pdo->select($nt_query, $nt_where_arr);
    //-- rand亂數 --
    $rand_num=rand(1,count($row_news_type));
    //-- 識別號(亂數) --
    $tab_id=rand(0,999999);
    //-- tab html --
    $list_txt='';
    //-- 內容html --
    $content_txt='';
    $x=1;
    foreach ($row_news_type as $news_type) {
    $active=$x==$rand_num ? 'active':'';
    
    $pk=empty($news_type['pk']) ? $news_type['Tb_index']:$news_type['pk'];
    $pk_name=$list_dir=='news' ? 'nt_pk':'mt_pk';

     //-- tab --
     $list_url=$is_sp=='no' ? '/'.$list_dir.'/list.php?'.$pk_name.'='.$pk : '/'.$list_dir.'/list.php?'.$pk_name.'='.$pk.'&sp=1';
     $list_txt.= '
      <li class="nav-item news_tab '.$tab_class.'">
        <a class="nav-link '.$active.' pl-30 py-2" id="special'.$tab_id.'_'.$x.'-tab"  href="'.$list_url.'" tab-target="#special'.$tab_id.'_'.$x.'" aria-selected="true">'.$news_type['nt_name'].'</a>
      </li>';


     //-- 內容 --
     //-- 特別議題 --
     if ($is_sp=='sp') {
       $row_news_con=$pdo->select("SELECT Tb_index, ns_ftitle, ns_photo_1 ,ns_cdate, area_id, mt_id, ns_nt_pk
                                           FROM NewsAndType 
                                           WHERE (ns_nt_sp_pk=:ns_nt_sp_pk OR ns_nt_ot_pk LIKE :ns_nt_ot_pk) AND ns_verify=3 AND StartDate<=:StartDate AND EndDate>=:EndDate
                                           ORDER BY ns_vfdate DESC LIMIT 0,6", 
                                           ['ns_nt_sp_pk'=>$news_type['Tb_index'], 'ns_nt_ot_pk'=>'%'.$news_type['Tb_index'].'%', 'StartDate'=>date('Y-m-d'),'EndDate'=>date('Y-m-d')]);
     }
     //-- 一般 --
     else{
      $row_news_con=$pdo->select("SELECT Tb_index, ns_ftitle, ns_photo_1 ,ns_cdate, area_id, mt_id, ns_nt_pk
                                    FROM NewsAndType 
                                    WHERE (ns_nt_pk=:ns_nt_pk OR ns_nt_ot_pk LIKE :ns_nt_ot_pk) AND ns_verify=3 AND StartDate<=:StartDate AND EndDate>=:EndDate
                                    ORDER BY ns_vfdate DESC LIMIT 0,6", 
                                    ['ns_nt_pk'=>$news_type['Tb_index'], 'ns_nt_ot_pk'=>'%'.$news_type['Tb_index'].'%', 'StartDate'=>date('Y-m-d'),'EndDate'=>date('Y-m-d')]);
     }
     
     $slide_txt='';

     for ($i=0; $i <2 ; $i++) { 
              
              $news_txt='';

              for ($j=0; $j <3 ; $j++) { 
                $index=($i*3)+$j;
                //-------------- 網址判斷 ------------------
                $news_url=news_url($row_news_con[$index]['mt_id'], $row_news_con[$index]['Tb_index'], $row_news_con[$index]['ns_nt_pk'], $row_news_con[$index]['area_id']);
                $ns_ftitle=mb_substr($row_news_con[$index]['ns_ftitle'], 0,14, 'utf-8');
                $news_txt.='
                <div class="col-4 cards-3">
                  <a href="'.$news_url.'" title="'.$row_news_con[$index]['ns_ftitle'].'">
                   <div class="img_div"  style="background-image: url(../sys/img/'.$row_news_con[$index]['ns_photo_1'].');">
                   </div>
                    <p>'.$ns_ftitle.'</p>
                  </a>
                </div>';
              }

              $slide_txt.='
              <div class="swiper-slide">
              <div class="row no-gutters">
                '.$news_txt.'
              </div>
            </div>';
     }

     $content_txt.='<div class="tab-pane fade show '.$active.'" id="special'.$tab_id.'_'.$x.'" role="tabpanel" aria-labelledby="special'.$tab_id.'_'.$x.'-tab">
                     <div class="swiper-container sub_slide">
                        <div class="swiper-wrapper">
                        '.$slide_txt.'
                        </div>

                        <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                        <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                     </div>
                    </div>';

     $x++;
   }

   if (!empty(count($row_news_type))) {
     
     echo '
    <div class="col-md-12 col">
    <div class="cardshap '.$color_tab.' mouseHover_other_tab">
      <ul class="nav nav-tabs" id="myTab" role="tablist">

        '.$list_txt.'
       
      </ul>
      <div class="tab-content" id="myTabContent">

        '.$content_txt.'

      </div>
    </div>
  </div>';
   }

   $pdo=NULL;
}

//----------------------------------- 各版區首頁-次版6篇文章 END --------------------------------------------




//------------------------------------ 分頁 ---------------------------------------
function paging($total_page, $page)
{ 
  $get_url='?';
  foreach ($_GET as $key => $value) {
    if ($key!='PageNo') {
      $get_url.=$key.'='.$value.'&';
    }
  }
  $now_URL=$_GET ? 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].$get_url : 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?';
  $option='';

  for ($i=1; $i <=$total_page ; $i++) { 
    if ($i==$page) {
      $option.='<option selected value="'.$now_URL.'PageNo='.$i.'">第'.$i.'頁</option>';
    }
    else{
      $option.='<option value="'.$now_URL.'PageNo='.$i.'">第'.$i.'頁</option>';
    }
  }

  $prev_page=empty($page) || $page==1 ? '' : '<a href="'.$now_URL.'PageNo='.((int)$page-1).'"><i class="fa fa-angle-left"></i>上一頁</a>';
  $next_page=$page==$total_page ? '' : '<a href="'.$now_URL.'PageNo='.((int)$page+1).'">下一頁 <i class="fa fa-angle-right"></i></a>';
   echo '
   <div class="col-12 page">
    <span>第'.$page.'頁( 共'.$total_page.'頁 )</span>
    '.$prev_page.'
    <select onchange="location = this.options[this.selectedIndex].value;">
      '.$option.'
    </select>
    '.$next_page.'
  </div>';
}




//------------------------------------ MENU fun ---------------------------------------
function menu_newsType($area_id, $col, $url_dir)
{ 
  $pdo=new PDO_fun;
  $row_newsType=$pdo->select("SELECT nt.Tb_index, nt.nt_name, nt.pk, nt.unit_id, un.un_name, nt.OrderBy, nt.nt_sp
                              FROM news_type as nt 
                              INNER JOIN appUnit as un ON un.Tb_index=nt.unit_id
                              WHERE nt.area_id='$area_id' AND nt.nt_sp=1 AND nt.nt_sp_idx=1 AND nt.OnLineOrNot=1 
                              AND nt.nt_sp_begin_date<=:nt_sp_begin_date AND nt.nt_sp_end_date>= :nt_sp_end_date

                              UNION

                              SELECT nt.Tb_index, nt.nt_name, nt.pk, nt.unit_id, un.un_name, nt.OrderBy, nt.nt_sp
                              FROM news_type as nt 
                              INNER JOIN appUnit as un ON un.Tb_index=nt.unit_id
                              WHERE nt.area_id='$area_id' AND nt.nt_sp=0 AND nt.OnLineOrNot=1 
                              ORDER BY OrderBy ASC ", ['nt_sp_begin_date'=>date('Y-m-d'), 'nt_sp_end_date'=>date('Y-m-d')]);

  $unit_arr=[];
  foreach ($row_newsType as $newsType) {
    $unit_arr[$newsType['unit_id']][]=$newsType;
  }

  foreach ($unit_arr as $key => $value) {

    $count_type=count($value);
    $count_i=$count_type>4 ? 2:1;
    $count_j=$count_type>4 ? ceil($count_type/2) : $count_type;
    $type_ul='';
    for ($i=0; $i <$count_i ; $i++) { 
      
      $type_li='';

      for ($j=0; $j <$count_j ; $j++) { 
        $index=($i*$count_j)+$j;
        $mt_pk=$value[$index]['pk']==0 ? $value[$index]['Tb_index'] : $value[$index]['pk'];
        //-- 特別議題
        if ($value[$index]['nt_sp']==1) {
          $type_li.='<li><a href="/'.$url_dir.'/list.php?mt_pk='.$mt_pk.'&sp=1">'.$value[$index]['nt_name'].'</a></li>';
        }
        else{
          $type_li.='<li><a href="/'.$url_dir.'/list.php?mt_pk='.$mt_pk.'">'.$value[$index]['nt_name'].'</a></li>';
        }
        
      }

      $type_ul.='<ul class="ul-2-part">'.$type_li.'</ul>';
    }
    
    $unit_txt='<div class="'.$col.'">
                 <h4>'.$value[0]['un_name'].'</h4>
                 '.$type_ul.'
               </div>';
    echo $unit_txt;
    $pdo=NULL;
  }
}





//--------------------------------------- 新聞點閱 -------------------------------------------
function news_click_total($news_id)
{ 
  $pdo=new PDO_fun;
  
  //-- 判斷手機或電腦 --
  if (is_mobile()) {
    $pdo->select("UPDATE appNews SET ns_mobvecount=ns_mobvecount+1 WHERE Tb_index=:Tb_index", ['Tb_index'=>$news_id]);
  }
  else{
    $pdo->select("UPDATE appNews SET ns_viewcount=ns_viewcount+1 WHERE Tb_index=:Tb_index", ['Tb_index'=>$news_id]);
  }

 //-- 判斷是否為特別議題 --
 $sp_news_num=$pdo->select("SELECT COUNT(*) as total FROM appNews WHERE Tb_index=:Tb_index AND ns_nt_sp_pk!=''", ['Tb_index'=>$news_id], 'one');
 if ($sp_news_num['total']>0) {
   $pdo->select("UPDATE appNews SET ns_proj_viewcount=ns_proj_viewcount+1 WHERE Tb_index=:Tb_index", ['Tb_index'=>$news_id]);
 }
  
 //-- 判斷有無 文章 --
 $news_num=$pdo->select("SELECT COUNT(*) as total FROM appNews WHERE Tb_index=:Tb_index ", ['Tb_index'=>$news_id], 'one');
 if ($news_num['total']>0) {
   
   //-- 判斷今日點閱數 --
   $today_c_num=$pdo->select("SELECT COUNT(*) as total 
                              FROM news_click_total 
                              WHERE ack_type_pk=:ack_type_pk AND ack_click_date=:ack_click_date", 
                              ['ack_type_pk'=>$news_id, 'ack_click_date'=>date('Y-m-d')], 'one');
   
   //-- 新增 --
   if ($today_c_num['total']<1) {
     $param=[
       'Tb_index'=>'nc'.date('YmdHis').rand(0,99),
       'ack_type_pk'=>$news_id,
       'ack_click_date'=>date('Y-m-d'),
       'ack_click_total'=>1,
       'ack_create_time'=>date('Y-m-d H:i:s'),
       'ack_update_time'=>date('Y-m-d H:i:s')
     ];
     $pdo->insert('news_click_total', $param);
   }
   //-- +1 --
   else{
     $pdo->select("UPDATE news_click_total 
                   SET ack_click_total=ack_click_total+1, ack_update_time=:ack_update_time
                   WHERE ack_type_pk=:ack_type_pk AND ack_click_date=:ack_click_date", 
                   ['ack_type_pk'=>$news_id, 'ack_update_time'=>date('Y-m-d H:i:s'), 'ack_click_date'=>date('Y-m-d')]);
   }
 }

  
  $pdo=NULL;
}




//--------------------------------------- 卡好康點閱 -------------------------------------------
function message_click_total($news_id)
{ 
  $pdo=new PDO_fun;
  
  //-- 判斷手機或電腦 --
  if (is_mobile()) {
    $pdo->select("UPDATE appNews SET ns_mobvecount=ns_mobvecount+1 WHERE Tb_index=:Tb_index", ['Tb_index'=>$news_id]);
  }
  else{
    $pdo->select("UPDATE appNews SET ns_viewcount=ns_viewcount+1 WHERE Tb_index=:Tb_index", ['Tb_index'=>$news_id]);
  }

 //-- 判斷是否為特別議題 --
 $sp_news_num=$pdo->select("SELECT COUNT(*) as total FROM appNews WHERE Tb_index=:Tb_index AND ns_nt_sp_pk!=''", ['Tb_index'=>$news_id], 'one');
 if ($sp_news_num['total']>0) {
   $pdo->select("UPDATE appNews SET ns_proj_viewcount=ns_proj_viewcount+1 WHERE Tb_index=:Tb_index", ['Tb_index'=>$news_id]);
 }
  
 
  //-- 判斷今日點閱數 --
  $today_c_num=$pdo->select("SELECT COUNT(*) as total 
                             FROM message_click_total 
                             WHERE ack_type_pk=:ack_type_pk AND ack_click_date=:ack_click_date", 
                             ['ack_type_pk'=>$news_id, 'ack_click_date'=>date('Y-m-d')], 'one');
  
  //-- 新增 --
  if ($today_c_num['total']<1) {
    $param=[
      'Tb_index'=>'nc'.date('YmdHis').rand(0,99),
      'ack_type_pk'=>$news_id,
      'ack_click_date'=>date('Y-m-d'),
      'ack_click_total'=>1,
      'ack_create_time'=>date('Y-m-d H:i:s'),
      'ack_update_time'=>date('Y-m-d H:i:s')
    ];
    $pdo->insert('message_click_total', $param);
  }
  //-- +1 --
  else{
    $pdo->select("UPDATE message_click_total 
                  SET ack_click_total=ack_click_total+1, ack_update_time=:ack_update_time
                  WHERE ack_type_pk=:ack_type_pk AND ack_click_date=:ack_click_date", 
                  ['ack_type_pk'=>$news_id, 'ack_update_time'=>date('Y-m-d H:i:s'), 'ack_click_date'=>date('Y-m-d')]);
  }
  $pdo=NULL;
}




//---------------------------------------- 判斷手機AND平板 --------------------------------------------
function is_mobile() {
  static $is_mobile = null;
 
  if ( isset( $is_mobile ) ) {
    return $is_mobile;
  }
 
  if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
    $is_mobile = false;
  } elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false // many mobile devices (all iPhone, iPad, etc.)
    || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
    || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
    || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
    || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
    || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false
    || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false ) {
      $is_mobile = true;
  } else {
    $is_mobile = false;
  }
 
  return $is_mobile;
}



//---------------------------------------------------- 新聞次版區list ----------------------------------------------------
function news_list( $PageNo, $ns_nt_pk, $sp='')
{
   $pdo=new PDO_fun;


   //-- 目前所在次版區 --
   $this_nt_query=strlen($ns_nt_pk)>2 ? 'Tb_index=:Tb_index':'pk=:Tb_index';
   $row_now_nt=$pdo->select("SELECT mt_id, area_id FROM news_type WHERE $this_nt_query", ['Tb_index'=>$ns_nt_pk], 'one');


   //-- 分頁判斷數 --
   $num=12;
   //--- 分頁起頭數 ---
   $now_page_num=empty($PageNo)? 0:((int)$PageNo-1)*$num;
   //-- 目前分頁 --
   $page=empty($PageNo) ? 1:$PageNo;


   //-- 判斷是否為特殊議題 --
   $nt_pk_sql= !empty($sp) ? "ns_nt_sp_pk=:ns_nt_pk" : "ns_nt_pk=:ns_nt_pk";

   //-- 總頁數 --
   $row_list_total=$pdo->select("SELECT count(*) as total
                                 FROM NewsAndType
                                 WHERE ns_verify=3 and OnLineOrNot=1 and  StartDate<=:StartDate and EndDate>=:EndDate and ($nt_pk_sql OR ns_nt_ot_pk LIKE :ns_nt_ot_pk)"
                                 , ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d'), 'ns_nt_pk'=>$ns_nt_pk, 'ns_nt_ot_pk'=>'%'.$ns_nt_pk.'%'], 'one');
   $total_page=ceil(((int)$row_list_total['total'])/$num);


   $row_list=$pdo->select("SELECT Tb_index, ns_nt_pk, ns_ftitle, ns_msghtml, ns_photo_1, mt_id, area_id, StartDate, activity_s_date, activity_e_date, ns_store
                           FROM NewsAndType
                           WHERE ns_verify=3 and OnLineOrNot=1 and  StartDate<=:StartDate and EndDate>=:EndDate and ($nt_pk_sql OR ns_nt_ot_pk LIKE :ns_nt_ot_pk)
                           ORDER BY ns_vfdate DESC LIMIT $now_page_num, $num", ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d'), 'ns_nt_pk'=>$ns_nt_pk, 'ns_nt_ot_pk'=>'%'.$ns_nt_pk.'%']);
  $row_list_num=count($row_list);
  $count_i=ceil($row_list_num/3);

  for ($i=0; $i <$count_i ; $i++) { 
    
    echo '<div class="col-md-12 col">
           <div class="cardshap redius_bg">';

    for ($j=$i*3; $j <($i+1)*3 ; $j++) {
     
     if ($j<$row_list_num) {

       $row_list_one=$row_list[$j];


       switch ($row_now_nt['mt_id']) {
         //-- 新聞 --
         case 'site2018111910445721':
           $news_small_txt='<small class="px-md-4 pb-md-0 px-0 pb-2">('.$row_list_one['StartDate'].')</small>';
           $cs_small_txt='';
           $ns_ftitle=mb_substr($row_list_one['ns_ftitle'], 0,20,'utf-8');
         break;

         //-- 卡情報 --
         case 'site2019011115561564':
           //-- 關聯銀行 --
           $row_back=$pdo->select("SELECT abc.bank_id, bk.bi_shortname
                                   FROM appNews_bank_card as abc
                                   INNER JOIN bank_info as bk ON bk.Tb_index=abc.bank_id
                                   WHERE news_id=:news_id
                                   GROUP BY abc.bank_id", ['news_id'=>$row_list_one['Tb_index']]);
           
           $back_num=count($row_back);
           $cs_small_txt=$back_num==1 ? '<small class="cs_small"><a href="/card/bank_detail.php?bi_pk='.$row_back[0]['bank_id'].'">('.$row_back[0]['bi_shortname'].')</a></small>' : '';
           $news_small_txt='';
           $ns_ftitle=$back_num==1 ? mb_substr($row_list_one['ns_ftitle'], 0,15,'utf-8') : $row_list_one['ns_ftitle'];
         break;

         //-- 優情報 --
         case 'site2019011116103929':
           //-- 關聯商店 --
           $ns_store_arr=explode(',', $row_list_one['ns_store']);
           $ns_store_txt='';
           foreach ($ns_store_arr as $ns_store) {
             $ns_store_txt.="'".$ns_store."',";
           }
           $ns_store_txt=substr($ns_store_txt, 0,-1);
           $row_store=$pdo->select("SELECT Tb_index, st_nickname
                                   FROM store
                                   WHERE Tb_index IN ($ns_store_txt)", 'no');
           $store_num=count($row_store);
           $cs_small_txt=$store_num==1 ? '<small class="cs_small"><a href="/mpay/about.php?'.$row_store[0]['Tb_index'].'">('.$row_store[0]['st_nickname'].')</a></small>' : '';
           $news_small_txt='';
           $ns_ftitle=$store_num==1 ? mb_substr($row_list_one['ns_ftitle'], 0,15,'utf-8') : $row_list_one['ns_ftitle'];
         break;
         default:
           $small_txt='';
         break;
       }
       

       //-- 活動時間 --
       if ($row_list_one['activity_e_date']!='0000-00-00') {
         $activity_s_date=$row_list_one['activity_s_date']!='0000-00-00' ? $row_list_one['activity_s_date']:'即日起';
         $activity_date='<span class="mb-1">活動日期：'.$activity_s_date.'~'.$row_list_one['activity_e_date'].'</span>';
       }
       else{
         $activity_date='';
       }

       

       
       $ns_msghtml=mb_substr(strip_tags($row_list_one['ns_msghtml']), 0,50,'utf-8');
       $url=news_url($row_list_one['mt_id'], $row_list_one['Tb_index'], $row_list_one['ns_nt_pk'], $row_list_one['area_id']);
       $fb_url=urlencode($url);
  

       //-- 圖文廣告(手機) --
       if (wp_is_mobile() && $j==0){
         echo '
         <div class="row no-gutters py-md-3 mx-md-4 news_list">
          <div class="col-md-4 col-6 py-2 pl-2">
            <a class="img_div news_list_img" href="#" style="background-image: url(http://placehold.it/150x100);"></a>
          </div>
          <div class="col-md-8 col-6 pl-md-4 pl-0 py-2 news_list_txt">
           <div class="mb-2">
             <a href="#" title="廣告">
              <h3>我是圖文廣告</h3>
             </a>
           </div>
            <p>我是圖文廣告...</p>
          </div>
         </div>';
       }
       //-- 圖文廣告(手機) END --
       
       //-- LIST --
       echo '
       <div class="row no-gutters py-md-3 mx-md-4 news_list">
        <div class="col-md-4 col-6 py-2 pl-2">
          <a target="_blank" class="img_div news_list_img" title="'.$row_list_one['ns_ftitle'].'" href="'.$url.'" style="background-image: url(/sys/img/'.$row_list_one['ns_photo_1'].');"></a>
        </div>
        <div class="col-md-8 col-6 pl-md-4 pl-0 py-2 news_list_txt">
         <div class="mb-2">
           
            <h3>
              <a target="_blank" href="'.$url.'" title="'.$row_list_one['ns_ftitle'].'">'.$ns_ftitle.'</a> '.$cs_small_txt.'
            </h3>
           
           
         </div>
          '.$activity_date.'
          <p class="phone_hidden">'.$ns_msghtml.'...</p>
          
          <div class="fb_search_btn">
            '.$news_small_txt.'
            <iframe src="https://www.facebook.com/plugins/like.php?href='.$fb_url.'&width=119&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=616626501755047" width="119" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
          </div>
        </div>
       </div>';
       //-- LIST END --
     }
    }

    echo '</div>
        </div>';


   //-- 手機廣告 --
   if (wp_is_mobile()) {
     if ($i!=3 && $i!=$count_i) {
       echo '
       <div class="col-md-12 row">
       <div class="col-md-6 col banner d-md-none d-sm-block ">
           <img src="https://placehold.it/900x300" alt="">
       </div>
       </div>';
     }
   }
   //-- 電腦廣告 --
   else{
     if ($i%2==0) {
       echo '<div class="col-md-12 col banner phone_hidden"><div class="test"><img src="https://placehold.it/750x100" alt="banner"></div></div>';
     }
     else{
       echo '<div class="col-md-12 row phone_hidden">
                <div class="col-md-6 col banner ">
                    <img src="https://placehold.it/365x100" alt="">
                </div>
                <div class="col-md-6 col banner">
                    <img src="https://placehold.it/365x100">
                </div>
            </div>';
     }
   }
  }

  //-- 分頁 --
  paging($total_page, $page);

  $pdo=NULL;
}
//---------------------------------------------------- 新聞次版區list END ----------------------------------------------------







//---------------------------------------------------- 新聞內頁分享功能按鈕 ----------------------------------------------------

function news_share_btn($FB_URL, $QUERY_STRING)
{
  echo '  
   <div class="search_div hv-center">
    <div class="fb-like mr-2" data-href="'.$FB_URL.'" data-layout="box_count" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>
     <!-- FB分享 -->
     <a class="search_btn" href="javascript:;" onclick="window.open(\'https://www.facebook.com/dialog/feed?app_id=319016928941764&display=popup&link='.$FB_URL.'&redirect_uri=https://www.facebook.com/\', \'FB分享\', config=\'height=600,width=800\');"><img src="../img/component/search/fb.png" alt="" title="分享">
     </a>

     <!-- LINE分享 -->
     <a class="search_btn" href="javascript:;" onclick="window.open(\'https://social-plugins.line.me/lineit/share?url='.$FB_URL.'\', \'LINE分享\', config=\'height=600,width=800\');"><img src="../img/component/search/line.png" alt="" title="Line">
     </a>

     <!-- 訊息 -->
     <a class="search_btn message_btn" href="javascript:;"><img src="../img/component/search/message.png" alt="" title="訊息"></a>

     <!-- 更多 -->
     <a id="arrow_btn" class="search_btn phone_hidden" href="javascript:;" title="更多"><i class="fa fa-angle-down"></i></a>

   </div>
   <div class="more_search ">
     <!-- 列印 -->
     <a target="_blank " href="../share_area/print.php?'.$QUERY_STRING.'"><img src="../img/component/search/print.png" alt="" title="列印"></a>
     <!-- 收藏 -->
     <a href="javascript:;" data-fancybox data-src="#member_div"><img src="../img/component/search/work.png" alt="" title="收藏"></a>
     <!-- 信箱 -->
     <a href="javascript:;" data-fancybox data-modal="true" data-type="iframe" data-src="../share_area/send_mail.php?'.$QUERY_STRING.'"><img src="../img/component/search/mail.png" alt="" title="信箱"></a>
     <!-- 回報 -->
     <a href="javascript:;" data-fancybox data-modal="true" data-type="iframe" data-src="../share_area/send_error.php"><img src="../img/component/search/mood.png" alt="" title="回報"></a>
   </div>
  ';
}

//---------------------------------------------------- 新聞內頁分享功能按鈕 END ----------------------------------------------------




//---------------------------------------------------- 去除空白 ----------------------------------------------------

function myTrim($str)
{
$search = array(" ","　","\n","\r","\t");
$replace = array("","","","","");
return str_replace($search, $replace, $str);
}

//---------------------------------------------------- 去除空白 END ----------------------------------------------------




//===============================================================================================================
//=========================================== 前台功能(pc) END ====================================================================
//===============================================================================================================






//===============================================================================================================
//=========================================== 前台功能(手機) ====================================================================
//===============================================================================================================



//------------------------------------ 版區、次版區banner 輪播 (手機板) ---------------------------------------
function slide_ph($sql_carousel, $where_arr='no')
{
  $pdo=new PDO_fun;
  $row_slide=$pdo->select($sql_carousel, $where_arr);
  $x=1;
  $slide_txt='';
  foreach ($row_slide as $row_slide_one) {
   
    $url=news_url($row_slide_one['mt_id'], $row_slide_one['Tb_index'], $row_slide_one['ns_nt_pk'], $row_slide_one['area_id']);
    $ns_ftitle=mb_strlen($row_slide_one['ns_ftitle'],'utf-8')>15 ? mb_substr($row_slide_one['ns_ftitle'], 0,15,'utf-8').'...' : $row_slide_one['ns_ftitle'];
    $slide_txt.='<div class="swiper-slide img_div" pagination-index="1" style="background-image: url(/sys/img/'.$row_slide_one['ns_photo_1'].');"> 
                 <a href="'.$url.'" title="'.$row_slide_one['ns_ftitle'].'">
                     <div class="word shadow_text" >'.$ns_ftitle.'</div>
                 </a>
               </div>';
    
    //-- 廣告 --
    if ($x%2==0) {
      $slide_txt.='<div class="swiper-slide img_div" pagination-index="1" style="background-image: url(/img/component/slide_photo1.jpg);"> 
                   <a href="#" title="廣告">
                       <div class="word shadow_text" >我是廣告</div>
                   </a>
                 </div>';
    }

  $x++;
  }

  $txt='<div class="myCarousel d-md-none d-sm-block">
                          <div id="iNews" class="news_slide cardshap">
                            <div class=" swiper-container">
                                <div class="swiper-wrapper">
                                    '.$slide_txt.'
                                </div>

                                 <div class="swiper-pagination"></div> 

                                <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                                <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                            </div>
                          </div>
                      </div>';
  echo $txt;
  $pdo=NULL;
}



//------------------------------------ 首頁 卡情報、優票證、優旅行 ---------------------------------------
function index_html_fun1($silde_unit_id, $article_unit_id)
{
  $pdo=new PDO_fun;
  //-- 5篇大輪播 --
  $row_cardNews=$pdo->select("SELECT Tb_index, ns_nt_pk, mt_id, area_id, ns_photo_1, ns_ftitle 
                              FROM NewsAndType 
                              WHERE unit_id='$silde_unit_id' AND ns_verify=3 
                              AND  StartDate<=:StartDate AND EndDate>=:EndDate
                              ORDER BY ns_vfdate DESC LIMIT 0,5",
                              ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);  
  $slide_one='';  
  foreach ($row_cardNews as $row_cardNews_one) {

    $url=news_url($row_cardNews_one['mt_id'], $row_cardNews_one['Tb_index'], $row_cardNews_one['ns_nt_pk'], $row_cardNews_one['area_id']);
    $ns_ftitle=mb_substr($row_cardNews_one['ns_ftitle'], 0,15,'utf-8').'...';

    $slide_one.= '
    <div class="swiper-slide">
    <a class="img_div" href="'.$url.'" style="background-image: url(sys/img/'.$row_cardNews_one['ns_photo_1'].');">
     <p>'.$ns_ftitle.'</p>
    </a>
    </div>';
  }

  $slide='<div class="col-12 big_tab no_auto_slide">
              <div class="swiper-container">
                  <div class="swiper-wrapper">
                  '.$slide_one.'
                  </div>
                  <!-- 如果需要导航按钮 -->
                  <div class="swiper-button-prev"><i class=" fa fa-angle-left"></i></div>
                  <div class="swiper-button-next"><i class=" fa fa-angle-right"></i></div>
              </div>
          </div>';


  //-- 兩小篇 --
  $row_cardNews=$pdo->select("SELECT Tb_index, ns_nt_pk, mt_id, area_id, ns_photo_1, ns_ftitle 
                              FROM NewsAndType 
                              WHERE unit_id='$article_unit_id' AND ns_verify=3 
                              AND  StartDate<=:StartDate AND EndDate>=:EndDate
                              ORDER BY ns_vfdate DESC LIMIT 0,2",
                              ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);    
  $article_one='';
  foreach ($row_cardNews as $row_cardNews_one) {

    $url=news_url($row_cardNews_one['mt_id'], $row_cardNews_one['Tb_index'], $row_cardNews_one['ns_nt_pk'], $row_cardNews_one['area_id']);
    $ns_ftitle=mb_substr($row_cardNews_one['ns_ftitle'], 0,10,'utf-8').'...';

    $article_one.= '
    <div class="col-6 ">
    <div class="tab_one">
      <a class="img_div" href="'.$url.'" style="background-image: url(sys/img/'.$row_cardNews_one['ns_photo_1'].');">
      </a>
      <p>'.$ns_ftitle.'</p>
     </div>
    </div>';
  }
  $article='<div class="col-12">
               <div class="row no-gutters small_tab">
               '.$article_one.'
               </div>
            </div>';

  echo $slide.$article;
  $pdo=NULL;
}


//------------------------------------ 首頁 優行動pay、優集點 ---------------------------------------
function index_html_fun2($area_id){
  $pdo=new PDO_fun;
  $row_un=$pdo->select("SELECT Tb_index, mt_id, ns_nt_pk, ns_ftitle, ns_photo_1, area_id
               FROM NewsAndType
               WHERE area_id='$area_id' AND ns_verify=3 AND StartDate<=:StartDate AND EndDate>=:EndDate
               ORDER BY ns_vfdate DESC LIMIT 0,9", 
               ['StartDate'=>date('Y-m-d'),'EndDate'=>date('Y-m-d')]);

  $row_un_num=count($row_un);
  $slide_txt='';
  for ($i=0; $i <3 ; $i++) { 
    
    $row_txt='';
    for ($j=0; $j <3 ; $j++) { 
      $index=($i*3)+$j;
      $url=news_url($row_un[$index]['mt_id'], $row_un[$index]['Tb_index'], $row_un[$index]['ns_nt_pk'], $row_un[$index]['area_id']);
      //$ns_ftitle=mb_substr($row_un[$index]['ns_ftitle'], 0,25,'utf-8').'...';
      $row_txt.='
      <div class="row no-gutters">
       <div class="col-5">
         <a class="img_div d-block" href="'.$url.'" style="background-image:url(sys/img/'.$row_un[$index]['ns_photo_1'].');">
           
         </a>
       </div>
       <div class="col-7 page_txt ">
         <a href="'.$url.'">
           <p>'.$row_un[$index]['ns_ftitle'].'</p>
         </a>
       </div>
     </div>';
    }

    $slide_txt.='
    <div class="swiper-slide">
     '.$row_txt.'
   </div>';
  }

  $txt='<div class="page-3 phone_pay swiper-container">
          <div class="swiper-wrapper">
          '.$slide_txt.'
          </div>
        </div>
        <!-- 如果需要分页器 -->
        <div class="page-3 phone_pay swiper-pagination"></div>';
  echo $txt;
  $pdo=NULL;
}




//------------------------------------ MENU fun ph ---------------------------------------
function menu_newsType_ph($area_id, $url_dir)
{ 
  $pdo=new PDO_fun;
  $row_newsType=$pdo->select("SELECT nt.Tb_index, nt.nt_name, nt.pk, nt.unit_id, un.un_name, nt.OrderBy, nt.nt_sp
                              FROM news_type as nt 
                              INNER JOIN appUnit as un ON un.Tb_index=nt.unit_id
                              WHERE nt.area_id='$area_id' AND nt.nt_sp=1 AND nt.nt_sp_idx=1 AND nt.OnLineOrNot=1 
                              AND nt.nt_sp_begin_date<=:nt_sp_begin_date AND nt.nt_sp_end_date>= :nt_sp_end_date

                              UNION

                              SELECT nt.Tb_index, nt.nt_name, nt.pk, nt.unit_id, un.un_name, nt.OrderBy, nt.nt_sp
                              FROM news_type as nt 
                              INNER JOIN appUnit as un ON un.Tb_index=nt.unit_id
                              WHERE nt.area_id='$area_id' AND nt.nt_sp=0 AND nt.OnLineOrNot=1 
                              ORDER BY OrderBy ASC",  ['nt_sp_begin_date'=>date('Y-m-d'), 'nt_sp_end_date'=>date('Y-m-d')]);

  $unit_arr=[];
  foreach ($row_newsType as $newsType) {
    $unit_arr[$newsType['unit_id']][]=$newsType;
  }

  foreach ($unit_arr as $key => $value) {

    $count_type=count($value);
    $type_li='';
    for ($i=0; $i <$count_type; $i++) { 
      
      $mt_pk=$value[$i]['pk']==0 ? $value[$i]['Tb_index'] : $value[$i]['pk'];

      //-- 特別議題
      if ($value[$i]['nt_sp']==1){
        $type_li.='<div class="col-6"><a href="/'.$url_dir.'/list.php?mt_pk='.$mt_pk.'&sp=1">'.$value[$i]['nt_name'].'</a></div>';
      }
      else{
        $type_li.='<div class="col-6"><a href="/'.$url_dir.'/list.php?mt_pk='.$mt_pk.'">'.$value[$i]['nt_name'].'</a></div>';
      }
      
    }
    
    $unit_txt='
    <h4>'.$value[0]['un_name'].'</h4>
    <div class="row no-gutters">
      '.$type_li.'
    </div>';

    echo $unit_txt;
    $pdo=NULL;
  }
}




//------------------------------------ 版區各分類3篇文章 ---------------------------------------
function area_nt_list_ph($unit_id, $url_dir, $color_tab)
{
  $pdo=new PDO_fun;
   //-- 新聞類別 --
   $row_nt=$pdo->select("SELECT Tb_index, pk, nt_name
                         FROM news_type 
                         WHERE unit_id=:unit_id AND OnLineOrNot=1 AND nt_sp=0
                         ORDER BY OrderBy", 
                         ['unit_id'=>$unit_id]);
   $x=1;
   foreach ($row_nt as $row_nt_one) {

     //-- 各類別新聞 --
     $row_n_list=$pdo->select("SELECT Tb_index, ns_nt_pk, ns_ftitle, ns_msghtml, ns_photo_1, mt_id, area_id, ns_store
                             FROM NewsAndType
                             WHERE ns_verify=3 AND OnLineOrNot=1 AND  StartDate<=:StartDate AND EndDate>=:EndDate AND (ns_nt_pk=:ns_nt_pk OR ns_nt_ot_pk LIKE :ns_nt_ot_pk)
                             ORDER BY ns_vfdate DESC LIMIT 0,3", 
                             ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d'), 'ns_nt_pk'=>$row_nt_one['Tb_index'], 'ns_nt_ot_pk'=>'%'.$row_nt_one['Tb_index'].'%']);
     $n_txt='';
     foreach ($row_n_list as $n_list) {


      switch ($n_list['mt_id']) {
            //-- 新聞 --
            case 'site2018111910430599':
              $news_small_txt='<p class="px-md-4 pb-md-0 px-0 pb-2">('.$n_list['StartDate'].')</p>';
              $cs_small_txt='';
            break;

            //-- 卡情報 --
            case 'site201901111555425':
              //-- 關聯銀行 --
              $row_back=$pdo->select("SELECT abc.bank_id, bk.bi_shortname
                                      FROM appNews_bank_card as abc
                                      INNER JOIN bank_info as bk ON bk.Tb_index=abc.bank_id
                                      WHERE news_id=:news_id
                                      GROUP BY abc.bank_id", ['news_id'=>$n_list['Tb_index']]);
              
              $back_num=count($row_back);
              $cs_small_txt=$back_num==1 ? '<p class="cs_small"><a href="/card/bank_detail.php?bi_pk='.$row_back[0]['bank_id'].'">('.$row_back[0]['bi_shortname'].')</a></p>' : '';
              $news_small_txt='';
            break;

            //-- 優情報 --
            case 'site2019011116095854':
              //-- 關聯商店 --
              $ns_store_arr=explode(',', $n_list['ns_store']);
              $ns_store_txt='';
              foreach ($ns_store_arr as $ns_store) {
                $ns_store_txt.="'".$ns_store."',";
              }
              $ns_store_txt=substr($ns_store_txt, 0,-1);
              $row_store=$pdo->select("SELECT Tb_index, st_nickname
                                      FROM store
                                      WHERE Tb_index IN ($ns_store_txt)", 'no');
              $store_num=count($row_store);
              $cs_small_txt=$store_num==1 ? '<p class="cs_small"><a href="/mpay/about.php?'.$row_store[0]['Tb_index'].'">('.$row_store[0]['st_nickname'].')</a></p>' : '';
              $news_small_txt='';
            break;
            default:
              $small_txt='';
            break;
          }

      //$ns_ftitle=mb_substr($n_list['ns_ftitle'], 0,15,'utf-8');
      $url=news_url($n_list['mt_id'], $n_list['Tb_index'], $n_list['ns_nt_pk'], $n_list['area_id']);
       
       $n_txt.='
       <div class="row no-gutters py-md-3 mx-md-4 news_list">
        <div class="col-md-4 col-6 py-1">
          <a class="img_div news_list_img" href="'.$url.'" style="background-image: url(../sys/img/'.$n_list['ns_photo_1'].');"></a>
        </div>
        <div class="col-md-8 col-6 pl-md-4 pl-0 py-1 news_list_txt">
          <h3>
            <a href="'.$url.'">'.trim($n_list['ns_ftitle']).'</a> '.$cs_small_txt.'
          </h3>
        </div>
      </div>';
     } 
     
     //-- 次版區連結 --
     $mt_pk=$row_nt_one['pk']==0 ? $row_nt_one['Tb_index'] : $row_nt_one['pk'];
     $get_name=$url_dir=='news' ? 'nt_pk' : 'mt_pk';
     $nt_url='/'.$url_dir.'/list.php?'.$get_name.'='.$mt_pk; 

     echo '
    <div class="col-md-12 col">
     <div class="cardshap '.$color_tab.' ">

      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item news_tab">
          <a class="nav-link active pl-30 py-2" id="special_1-tab"  href="'.$nt_url.'">'.$row_nt_one['nt_name'].'</a>
          <a class="top_link" href="'.$nt_url.'"></a>
        </li>
      </ul>

      <div class="tab-content p-2" id="myTabContent">
        <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">
        '.$n_txt.'
        </div>                  
      </div>
    </div>
  </div>';

  //--廣告 --
  if ($x%2==0) {
    echo '
    <div class="col-md-12 row">
      <div class="col-md-6 col banner">
        <a href="#">
         <img class="w-100" src="http://placehold.it/900x300" alt="">
        </a>
      </div>
    </div>';
  }

  $x++;
  }
  $pdo=NULL;
}





//------------------------------------ 版區各特別議題5篇文章  ---------------------------------------
function area_nt_sp_list_ph($area_id, $url_dir, $color_tab)
{
  $pdo=new PDO_fun;
    //-- 新聞類別 --
   $row_nt=$pdo->select("SELECT Tb_index, pk, nt_name
                         FROM news_type 
                         WHERE area_id=:area_id AND OnLineOrNot=1 AND nt_sp=1 AND nt_sp_begin_date<=:nt_sp_begin_date AND nt_sp_end_date>=:nt_sp_end_date
                         ORDER BY OrderBy", 
                         ['area_id'=>$area_id, 'nt_sp_begin_date'=>date('Y-m-d'), 'nt_sp_end_date'=>date('Y-m-d')]);
   $x=1;
   foreach ($row_nt as $row_nt_one){


      //-- 各類別新聞 --
      $row_n_list=$pdo->select("SELECT Tb_index, ns_nt_pk, ns_ftitle, ns_msghtml, ns_photo_1, mt_id, area_id, ns_store
                              FROM NewsAndType
                              WHERE ns_verify=3 AND OnLineOrNot=1 AND  StartDate<=:StartDate AND EndDate>=:EndDate AND (ns_nt_sp_pk=:ns_nt_pk OR ns_nt_ot_pk LIKE :ns_nt_ot_pk)
                              ORDER BY ns_vfdate DESC LIMIT 0,5", 
                              ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d'), 'ns_nt_pk'=>$row_nt_one['Tb_index'], 'ns_nt_ot_pk'=>'%'.$row_nt_one['Tb_index'].'%']);
      $y=1;
      $n_list_count=count($row_n_list);
      $slide_txt='';
      $two_txt='';
      foreach ($row_n_list as $n_list){
        
        
        $ns_ftitle1=mb_strlen($n_list['ns_ftitle'],'utf-8')>15 ? mb_substr($n_list['ns_ftitle'], 0,15,'utf-8').'...' : $n_list['ns_ftitle'];
        $ns_ftitle2=mb_substr($n_list['ns_ftitle'], 0,10,'utf-8');
        $url=news_url($n_list['mt_id'], $n_list['Tb_index'], $n_list['ns_nt_pk'], $n_list['area_id']);
        
        //-- 前X篇 --
        if ($y<=(int)$n_list_count-2) {
         $slide_txt .='<div class="swiper-slide" > 
                           <a href="'.$url.'" class="img_div" style="background-image: url(../sys/img/'.$n_list['ns_photo_1'].');">
                               <p>'.$ns_ftitle1.'</p>
                           </a>
                      </div>';
        }

        //-- 後兩篇 --
        if ($y>(int)$n_list_count-2 && $x==1) {
          $two_txt.='
              <div class="col-md-4 cards-3 col-6">
                 <a href="'.$url.'">
                     <div class="img_div" style="background-image: url(../sys/img/'.$n_list['ns_photo_1'].');">
                     </div>
                     <p>'.$ns_ftitle2.'</p>
                 </a>
              </div>';
            
        }
        elseif($y>(int)$n_list_count-2 && $x!=1){

          switch ($n_list['mt_id']) {
            //-- 新聞 --
            case 'site2018111910430599':
              $news_small_txt='<p class="px-md-4 pb-md-0 px-0 pb-2">('.$n_list['StartDate'].')</p>';
              $cs_small_txt='';
            break;

            //-- 卡情報 --
            case 'site201901111555425':
              //-- 關聯銀行 --
              $row_back=$pdo->select("SELECT abc.bank_id, bk.bi_shortname
                                      FROM appNews_bank_card as abc
                                      INNER JOIN bank_info as bk ON bk.Tb_index=abc.bank_id
                                      WHERE news_id=:news_id
                                      GROUP BY abc.bank_id", ['news_id'=>$n_list['Tb_index']]);
              
              $back_num=count($row_back);
              $cs_small_txt=$back_num==1 ? '<p class="cs_small"><a href="/card/bank_detail.php?bi_pk='.$row_back[0]['bank_id'].'">('.$row_back[0]['bi_shortname'].')</a></p>' : '';
              $news_small_txt='';
            break;

            //-- 優情報 --
            case 'site2019011116095854':
              //-- 關聯商店 --
              $ns_store_arr=explode(',', $n_list['ns_store']);
              $ns_store_txt='';
              foreach ($ns_store_arr as $ns_store) {
                $ns_store_txt.="'".$ns_store."',";
              }
              $ns_store_txt=substr($ns_store_txt, 0,-1);
              $row_store=$pdo->select("SELECT Tb_index, st_nickname
                                      FROM store
                                      WHERE Tb_index IN ($ns_store_txt)", 'no');
              $store_num=count($row_store);
              $cs_small_txt=$store_num==1 ? '<p class="cs_small"><a href="/mpay/about.php?'.$row_store[0]['Tb_index'].'">('.$row_store[0]['st_nickname'].')</a></p>' : '';
              $news_small_txt='';
            break;
            default:
              $small_txt='';
            break;
          }

          $two_txt.='
             <div class="row no-gutters py-md-3 mx-md-4 news_list">
                <div class="col-md-4 col-5 py-2">
                  <a class="img_div news_list_img" href="'.$url.'"  style="background-image: url(../sys/img/'.$n_list['ns_photo_1'].');"></a>
                </div>
                <div class="col-md-8 col-7 pl-4 py-2 news_list_txt">
                  <h3>
                    <a href="'.$url.'">'.$n_list['ns_ftitle'].'</a> '.$cs_small_txt.'
                  </h3>
                  
                </div>
            </div>';
        }



       $y++;
      }

      //-- 次版區連結 --
      $mt_pk=$row_nt_one['pk']==0 ? $row_nt_one['Tb_index'] : $row_nt_one['pk'];
      $get_name=$url_dir=='news' ? 'nt_pk' : 'mt_pk';
      $nt_url='/'.$url_dir.'/list.php?'.$get_name.'='.$mt_pk.'&sp=1'; 

      echo '
  <div class="col-md-12 col">
    <div class="cardshap '.$color_tab.' mouseHover_other_tab">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item news_tab">
          <a class="nav-link active py-2" id="special_1-tab" href="'.$nt_url.'" >'.$row_nt_one['nt_name'].'</a>
          <a class="top_link" href="'.$nt_url.'"></a>
        </li>
      </ul>

      <div class="tab-content p-2" id="myTabContent">
        <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">
          <div class="row no-gutters">

             <div class="col-12 bigcard py-md-2 mb-2">
                <!-- 手機用分類輪播 -->
                <div class="sub_ph_slide swiper-container">
                    <div class="swiper-wrapper">
                        '.$slide_txt.'
                    </div>

                    <div class="swiper-pagination"></div>
                    
                    <div class="swiper-button-prev"><i class=" fa fa-angle-left"></i></div>
                    <div class="swiper-button-next"><i class=" fa fa-angle-right"></i></div>
                </div>
                <!-- 手機用分類輪播 END -->
             </div>

              '.$two_txt.'

          </div>
        </div>
      </div>
    </div>
  </div>';


  //--廣告 --
  if ($x%2==0) {
    echo '
    <div class="col-md-12 row">
      <div class="col-md-6 col banner">
        <a href="#">
         <img class="w-100" src="http://placehold.it/900x300" alt="">
        </a>
      </div>
    </div>';
  }

  $x++;
  }
  $pdo=NULL;
}



//------------------------------------ 版區各刷卡整理||XX攻略5篇文章  ---------------------------------------
function area_nt2_list_ph($unit_id, $url_dir, $color_tab)
{
  $pdo=new PDO_fun;
    //-- 新聞類別 --
   $row_nt=$pdo->select("SELECT Tb_index, pk, nt_name
                         FROM news_type 
                         WHERE unit_id=:unit_id AND OnLineOrNot=1 AND nt_sp=0 
                         ORDER BY OrderBy", 
                         ['unit_id'=>$unit_id]);
   $x=1;
   foreach ($row_nt as $row_nt_one){


      //-- 各類別新聞 --
      $row_n_list=$pdo->select("SELECT Tb_index, ns_nt_pk, ns_ftitle, ns_msghtml, ns_photo_1, mt_id, area_id, ns_store
                              FROM NewsAndType
                              WHERE ns_verify=3 AND OnLineOrNot=1 AND  StartDate<=:StartDate AND EndDate>=:EndDate AND (ns_nt_pk=:ns_nt_pk OR ns_nt_ot_pk LIKE :ns_nt_ot_pk)
                              ORDER BY ns_vfdate DESC LIMIT 0,5", 
                              ['StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d'), 'ns_nt_pk'=>$row_nt_one['Tb_index'], 'ns_nt_ot_pk'=>'%'.$row_nt_one['Tb_index'].'%']);
      $y=1;
      $n_list_count=count($row_n_list);
      $slide_txt='';
      $two_txt='';
      foreach ($row_n_list as $n_list){

        $ns_ftitle=mb_strlen($n_list['ns_ftitle'],'utf-8')>15 ? mb_substr($n_list['ns_ftitle'], 0,15,'utf-8').'...' : $n_list['ns_ftitle'];
        $url=news_url($n_list['mt_id'], $n_list['Tb_index'], $n_list['ns_nt_pk'], $n_list['area_id']);
        
        //-- 前X篇 --
        if ($y<=(int)$n_list_count-2) {
         $slide_txt .='<div class="swiper-slide" > 
                           <a href="'.$url.'" class="img_div" style="background-image: url(../sys/img/'.$n_list['ns_photo_1'].');">
                               <p>'.$ns_ftitle.'</p>
                           </a>
                      </div>';
        }

        //-- 後兩篇 --
        if ($y>(int)$n_list_count-2 && $x==0) {
          $two_txt.='
              <div class="col-md-4 cards-3 col-6">
                 <a href="'.$url.'">
                     <div class="img_div" style="background-image: url(../sys/img/'.$n_list['ns_photo_1'].');">
                     </div>
                     <p>'.$ns_ftitle.'</p>
                 </a>
              </div>';
            
        }
        elseif($y>(int)$n_list_count-2 && $x>0){

         switch ($n_list['mt_id']) {
           //-- 新聞 --
           case 'site2018111910430599':
             $news_small_txt='<small class="px-md-4 pb-md-0 px-0 pb-2">('.$n_list['StartDate'].')</small>';
             $cs_small_txt='';
           break;

           //-- 卡情報 --
           case 'site201901111555425':
             //-- 關聯銀行 --
             $row_back=$pdo->select("SELECT abc.bank_id, bk.bi_shortname
                                     FROM appNews_bank_card as abc
                                     INNER JOIN bank_info as bk ON bk.Tb_index=abc.bank_id
                                     WHERE news_id=:news_id
                                     GROUP BY abc.bank_id", ['news_id'=>$n_list['Tb_index']]);
             
             $back_num=count($row_back);
             $cs_small_txt=$back_num==1 ? '<p class="cs_small"><a href="/card/bank_detail.php?bi_pk='.$row_back[0]['bank_id'].'">('.$row_back[0]['bi_shortname'].')</a></p>' : '';
             $news_small_txt='';
           break;

           //-- 優情報 --
           case 'site2019011116095854':
             //-- 關聯商店 --
             $ns_store_arr=explode(',', $n_list['ns_store']);
             $ns_store_txt='';
             foreach ($ns_store_arr as $ns_store) {
               $ns_store_txt.="'".$ns_store."',";
             }
             $ns_store_txt=substr($ns_store_txt, 0,-1);
             $row_store=$pdo->select("SELECT Tb_index, st_nickname
                                     FROM store
                                     WHERE Tb_index IN ($ns_store_txt)", 'no');
             $store_num=count($row_store);
             $cs_small_txt=$store_num==1 ? '<p class="cs_small"><a href="/mpay/about.php?'.$row_store[0]['Tb_index'].'">('.$row_store[0]['st_nickname'].')</a></p>' : '';
             $news_small_txt='';
           break;
           default:
             $small_txt='';
           break;
         }


          $two_txt.='
             <div class="row no-gutters py-md-3 mx-md-4 news_list">
                <div class="col-md-4 col-5 py-2">
                  <a class="img_div news_list_img" href="'.$url.'"  style="background-image: url(../sys/img/'.$n_list['ns_photo_1'].');"></a>
                </div>
                <div class="col-md-8 col-7 pl-4 py-2 news_list_txt">
                  <h3>
                    <a href="'.$url.'">'.$n_list['ns_ftitle'].'</a> '.$cs_small_txt.'
                  </h3>
                </div>
            </div>';
        }

       $y++;
      }

      //-- 次版區連結 --
      $mt_pk=$row_nt_one['pk']==0 ? $row_nt_one['Tb_index'] : $row_nt_one['pk'];
      $get_name=$url_dir=='news' ? 'nt_pk' : 'mt_pk';
      $nt_url='/'.$url_dir.'/list.php?'.$get_name.'='.$mt_pk; 

      echo '
  <div class="col-md-12 col">
    <div class="cardshap '.$color_tab.' mouseHover_other_tab">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item news_tab">
          <a class="nav-link active py-2" id="special_1-tab" href="'.$nt_url.'" >'.$row_nt_one['nt_name'].'</a>
          <a class="top_link" href="'.$nt_url.'"></a>
        </li>
      </ul>

      <div class="tab-content p-2" id="myTabContent">
        <div class="tab-pane fade show active" id="special_1" role="tabpanel" aria-labelledby="special_1-tab">
          <div class="row no-gutters">

             <div class="col-12 bigcard py-md-2 mb-2">
                <!-- 手機用分類輪播 -->
                <div class="sub_ph_slide swiper-container">
                    <div class="swiper-wrapper">
                        '.$slide_txt.'
                    </div>

                    <div class="swiper-pagination"></div>
                    
                    <div class="swiper-button-prev"><i class=" fa fa-angle-left"></i></div>
                    <div class="swiper-button-next"><i class=" fa fa-angle-right"></i></div>
                </div>
                <!-- 手機用分類輪播 END -->
             </div>

              '.$two_txt.'

          </div>
        </div>
      </div>
    </div>
  </div>';


  //--廣告 --
  if ($x%2==0) {
    echo '
    <div class="col-md-12 row">
      <div class="col-md-6 col banner">
        <a href="#">
         <img class="w-100" src="http://placehold.it/900x300" alt="">
        </a>
      </div>
    </div>';
  }

  $x++;
  }
  $pdo=NULL;
}



//===============================================================================================================
//=========================================== 前台功能(手機) END ====================================================================
//===============================================================================================================
?>