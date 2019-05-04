<?php 
require '../sys/core/inc/config.php';
require '../sys/core/inc/function.php';
require '../sys/core/inc/pdo_fun_calss.php';

if ($_POST) {
  
  $pdo=new PDO_fun;

  switch ($_POST['type']) {

  	//---------------------------------------------------------------- 卡排行卡片前六名輪播 -----------------------------------------------------------------------
  	case 'slide_6_rank':
      
      //-- 判斷是否為現金回饋 --
      $rand_cc_so_pk=['r_type201904010959361', 'r_type201904010959362'];
      $ccs_cc_so_pk=$_POST['ccs_cc_so_pk']=='r_type201904010959361' ? $rand_cc_so_pk[rand(0,1)] : $_POST['ccs_cc_so_pk'];

  	  $row=$pdo->select("SELECT ccs_cc_cardname, ccs_cc_pk, ccs_cc_group_id 
  	                     FROM credit_cardrank 
  	                     WHERE ccs_cc_so_pk=:ccs_cc_so_pk 
  	                     ORDER BY ccs_order ASC LIMIT 0,6" ,['ccs_cc_so_pk'=>$ccs_cc_so_pk]);
      $row_num=count($row);
      for ($i=0; $i <$row_num ; $i++) { 
      	
      	//-- 單卡圖片 --
  	    if (!empty($row[$i]['ccs_cc_pk'])) {
  	       $row_ccard=$pdo->select("SELECT cc_photo FROM credit_card WHERE Tb_index=:Tb_index", ['Tb_index'=>$row[$i]['ccs_cc_pk']], 'one');
  	    }
  	    //-- 卡組圖片 --
  	    else{
  	       $row_ccard=$pdo->select("SELECT cc_photo FROM credit_card WHERE cc_group_id=:cc_group_id LIMIT 0,1", ['cc_group_id'=>$row[$i]['ccs_cc_group_id']], 'one');
  	    }
  	    $row[$i]['cc_photo']=empty($row_ccard['cc_photo']) ? 'CardSample.png':$row_ccard['cc_photo'];

        //-- 完整卡名 --
  	    $ccs_cc_cardname=explode(']', $row[$i]['ccs_cc_cardname']);
  	    $row[$i]['ccs_cc_cardname']=$ccs_cc_cardname[1];

  	    //-- 簡易卡名 --
  	    $ccs_cc_shortname=mb_strlen($ccs_cc_cardname[1],'utf-8')>10 ? mb_substr($ccs_cc_cardname[1], 0,10,'utf-8'):$ccs_cc_cardname[1];
  	    $row[$i]['cc_shortname']=$ccs_cc_shortname;
        
        //-- 卡連結 --
  	    $cc_url=!empty($row[$i]['ccs_cc_pk']) ? '../cardNews/creditcard.php?cc_pk='.$row[$i]['ccs_cc_pk'].'&cc_group_id='.$row[$i]['ccs_cc_group_id'] : '../cardNews/type.php?gid='.$row[$i]['ccs_cc_group_id'];
  	    $row[$i]['cc_url']=$cc_url;

      }
      echo json_encode($row);
  	break;
    //---------------------------------------------------------------- 卡排行卡片前六名輪播 END -----------------------------------------------------------------------

    




    //---------------------------------------------------------------- 卡排行title -----------------------------------------------------------------------
    case 'rank_type':
      $row_rank_type=$pdo->select("SELECT Tb_index, cc_so_type_01_cname, cc_so_type_02_cname, cc_so_type_03_cname, cc_so_type_02_order, cc_so_type_03_order 
                                   FROM credit_cardrank_type 
                                   WHERE Tb_index=:Tb_index", ['Tb_index'=>$_POST['rank_type_id']], 'one');
      echo json_encode($row_rank_type);
    break;
    //---------------------------------------------------------------- 卡排行title END -----------------------------------------------------------------------





    
    //---------------------------------------------------------------- 卡排行資訊 (現金回饋-有門檻) -----------------------------------------------------------------------
    case 'card_rank':
      $row_rank=$pdo->select("SELECT cc.Tb_index, cc.cc_group_id, cc.cc_photo, cc.cc_doc_url, cc.cc_doc_path, cc.cc_interest_desc, 
                                     ccr.ccs_cc_cardname2, ccr.ccs_cc_cardshrname, ccr.ccs_cc_cardurl, ccr.ccs_cc_pk2, 
                                     ccr.ccs_cc_cardname, ccr.ccs_typename_01, ccr.ccs_typename_02, ccr.ccs_typename_03, 
                                     ccr.ccs_typename_01_memo, ccr.ccs_typename_02_memo, ccr.ccs_typename_03_memo,
                                     ccrt.cc_so_type_01_cname, ccrt.cc_so_type_02_cname, ccrt.cc_so_type_03_cname
                              FROM credit_cardrank as ccr
                              INNER JOIN cc_detail as cc ON cc.Tb_index=ccr.ccs_cc_pk
                              INNER JOIN credit_cardrank_type as ccrt ON ccrt.Tb_index=ccr.ccs_cc_so_pk
                              WHERE ccr.ccs_cc_so_pk=:ccs_cc_so_pk 
                              ORDER BY ccr.ccs_order ASC LIMIT 0,10", ['ccs_cc_so_pk'=>$_POST['rank_type_id']]);
      echo json_encode($row_rank);
    break;
    //---------------------------------------------------------------- 卡排行資訊 (現金回饋-有門檻) END -----------------------------------------------------------------------






    //---------------------------------------------------------------- 卡排行資訊 TXT -----------------------------------------------------------------------
    case 'card_rank_txt':

    //-- 目前排行數 --
    $sr_rank_num=empty($_POST['sr_rank_num']) ? 0 : (int)$_POST['sr_rank_num'];
    //-- 要加的數量 --
    $sr_num_plus=empty($_POST['sr_num_plus']) ? 10 : (int)$_POST['sr_num_plus'];
    //-- 排序方式 --
    $order=empty($_POST['order']) ? 'ccs_order': $_POST['order'];


    //--  廣告 txt --
    $ad_txt= '       <div class="row no-gutters rank_ad">
                                 <div class="col-md-5 wx-100-ph hv-center">
                                  <div class="row">
                                    <div class="col-md-2 col-2 ">
                                     <img src="../img/component/hot.png">
                                    </div>
                                    <div class="col-md-10 col-10 hv-center pt-md-0 pt-4">
                                      <a class="popular_list_img" href="#">
                                       <img src="../img/component/card1.png" alt="" title="新聞">
                                      </a>
                                    </div>
                                  </div>
                                 </div>
                               <div class="col-md-7 wx-100-ph ad_rank rank_color">
                                 <div class="row no-gutters h-center">
                                  <div class="col-md-8 wx-100-ph card_list_txt rank_color">
                                    <h4>匯豐銀行 MasterCard 鈦金卡</h4>
                                    <ul>
                                      <li><b>●</b>國內現金回饋1.22%</li>
                                      <li><b>●</b>國外現金回饋2.22%</li>
                                      <li><button type="button" class="btn warning-layered btnOver">立即辦卡</button>　謹慎理財 信用至上</li>
                                    </ul>
                                  </div>
                                  <div class="col-md-4 wx-100-ph hv-center py-3 pl-4">
                                    <img src="../img/component/ad_sm2.png">
                                  </div>
                                 </div>
                               </div>
                              </div>';

      //-- 廣告 --
      if ($sr_rank_num==0) {
        echo $ad_txt;
      }


      $row_rank=$pdo->select("SELECT cc.Tb_index, cc.cc_group_id, cc.cc_photo, cc.cc_doc_url, cc.cc_doc_path, cc.cc_interest_desc, 
                                     ccr.ccs_cc_cardname2, ccr.ccs_cc_cardshrname, ccr.ccs_cc_cardurl, ccr.ccs_cc_pk2, 
                                     ccr.ccs_cc_cardname, ccr.ccs_typename_01, ccr.ccs_typename_02, ccr.ccs_typename_03, 
                                     ccr.ccs_typename_01_memo, ccr.ccs_typename_02_memo, ccr.ccs_typename_03_memo,
                                     ccrt.cc_so_type_01_cname, ccrt.cc_so_type_02_cname, ccrt.cc_so_type_03_cname
                              FROM credit_cardrank as ccr
                              LEFT JOIN cc_detail as cc ON cc.Tb_index=ccr.ccs_cc_pk
                              INNER JOIN credit_cardrank_type as ccrt ON ccrt.Tb_index=ccr.ccs_cc_so_pk
                              WHERE ccr.ccs_cc_so_pk=:ccs_cc_so_pk 
                              ORDER BY ccr.".$order." ASC LIMIT ".$sr_rank_num.",".$sr_num_plus ,['ccs_cc_so_pk'=>$_POST['rank_type_id']]);

                              $x=$sr_rank_num+1;
                              foreach ($row_rank as $row_rank_one) {
                                $card_name=empty($row_rank_one['ccs_cc_cardname2']) ? mb_substr($row_rank_one['ccs_cc_cardname'], 5,mb_strlen($row_rank_one['ccs_cc_cardname']),'utf-8') : $row_rank_one['ccs_cc_cardname2'] ;
                                //-- 單卡網址 (sys/core/inc/function.php) --
                                $card_url=empty($row_rank_one['ccs_cc_cardurl']) ? card_url($row_rank_one['Tb_index'], $row_rank_one['cc_group_id']) : $row_rank_one['ccs_cc_cardurl'];
                                //-- 卡片圖 --
                                $cc_photo=empty($row_rank_one['cc_photo']) ? 'CardSample.png':$row_rank_one['cc_photo'];
                                //-- 卡特色 --
                                $card_adv_txt1='';
                                $card_adv_txt2='';
                                $card_adv=preg_split('/\n/',$row_rank_one['cc_interest_desc']);
                                $y=1;
                                foreach ($card_adv as $card_adv_one) {
                                  if ($y%2==1) {
                                   $card_adv_txt1.='<li><b>●</b>'.mb_substr($card_adv_one, 0,15).'</li>';
                                  }
                                  else{
                                    $card_adv_txt2.='<li><b>●</b>'.mb_substr($card_adv_one, 0,15).'</li>';
                                  }
                                  $y++;
                                }
                                //-- 立即辦卡 --
                                if (!empty($row_rank_one['cc_doc_url'])) {
                                  $cc_doc='<a target="_blank" href="'.$row_rank_one['cc_doc_url'].'" class="btn warning-layered btnOver">立即辦卡</a>';
                                }
                                elseif(!empty($row_rank_one['cc_doc_path'])){
                                  $cc_doc='<a target="_blank" href="'.$row_rank_one['cc_doc_path'].'" class="btn warning-layered btnOver">立即辦卡</a>';
                                }
                                else{
                                  $cc_doc='';
                                }
                                
                                //-- 卡排行 比較文字判斷 ccs_typename() (sys/core/inc/function.php)--
                                 echo '
                              <div class="card rank_hot rank_second">
                                <div class="card-header money_header hv-center" id="imp_int1">
                                  <div class="row">
                                    <div class="col-md-1 ">
                                      <div class="hv-center wx-100-ph modal_prize">
                                        <span class="top_prize">'.$x.'</span>
                                     </div>
                                    </div>
                                    <div class="col-md-11 wx-100-ph">
                                      <div class="row">
                                        <div class="col-md-12">
                                         <a href="'.$card_url.'">
                                          <h5 class=" money_main mb-0">'.$card_name.'</h5>
                                         </a>
                                        </div>
                                    <div class="row w-h-100">
                                  
                                    <div class="col-md-4 hv-center wx-100-ph">
                                       <div class="rank_care ">
                                         <a href="'.$card_url.'">
                                          <img class="rank_img" src="../sys/img/'.$cc_photo.'" title="'.$card_name.'">
                                         </a>
                                      </div>
                                    </div>
                                     <div class="col-md hv-center phone_block">
                                      <strong>'.$row_rank_one['cc_so_type_01_cname'].'</strong>
                                      '.ccs_typename($row_rank_one['ccs_typename_01_memo'], $row_rank_one['ccs_typename_01']).'
                                     </div>
                                    <div class="col-md hv-center border-left border-right phone_block">
                                      <strong>'.$row_rank_one['cc_so_type_02_cname'].'</strong>
                                      '.ccs_typename($row_rank_one['ccs_typename_02_memo'], $row_rank_one['ccs_typename_02']).'
                                    </div>
                                    <div class="col-md hv-center phone_block">
                                      <strong>'.$row_rank_one['cc_so_type_03_cname'].'</strong>
                                      '.ccs_typename($row_rank_one['ccs_typename_03_memo'], $row_rank_one['ccs_typename_03'], $row_rank_one['ccs_cc_pk2']).'
                                    </div>

                                    <div class="col-md-12 row">
                                       <div class="col-md-4 hv-center wx-100-ph">
                                       <div class="profit_btn  hv-center my-2">
                                       '.$cc_doc.'
                                       <button type="button" card_id="'.$row_rank_one['Tb_index'].'" cc_group_id="'.$row_rank_one['cc_group_id'].'" card_name="'.$card_name.'" card_img="'.$cc_photo.'" class="btn gray-layered btnOver add_contrast_card phone_hidden">加入比較</button>
                                       </div>
                                       
                                      </div>
                                      <div class="col-md-8 hv-center">
                                        <p class="collapse_txt mb-0"> 謹慎理財 信用至上(✱本排行僅供參考)</p>
                                        <button class="btn btn-link angle_down money_button" type="button" data-toggle="collapse" data-target="#imp_int_txt'.$x.'" aria-expanded="true" aria-controls="imp_int_txt'.$x.'" title="更多資訊">
                                        <i class="fa fa-angle-down"></i>
                                      </button>
                                      </div>
                                     </div>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div id="imp_int_txt'.$x.'" class="collapse" aria-labelledby="imp_int1" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <div class="row no-gutters">
                                      <div class="col-md-4 hv-center">
                                        <h4><img src="https://www.cardu.com.tw/images/cardrank/tick.png">信用卡特色</h4>
                                      </div>
                                      <div class="col-md-8">
                                        <ul class="collapse_txt mb-0">
                                         '.$card_adv_txt1.'                                     
                                       </ul>
                                       <ul class="collapse_txt mb-0">
                                         '.$card_adv_txt2.'                                     
                                       </ul>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>';
                              
                              //-- 廣告 --
                              if ($x==3 || $x==6) {
                                echo $ad_txt;
                              }

                              $x++; }
    break;
    //---------------------------------------------------------------- 卡排行資訊 END -----------------------------------------------------------------------





    //----------------------------------------------------------------------------- 顯示更多卡片(權益比一比) ---------------------------------------------------------------------------
    case 'rank_more_eq':
      
      //-- 目前排行數 --
      $sr_num=$_POST['sr_num'];
      //-- 權益項目1 --
      $row_eq=$pdo->select("SELECT eq_type FROM card_eq_item WHERE Tb_index=:Tb_index", ['Tb_index'=>$_POST['ci_pk01']], 'one');
      $eq_type=$row_eq['eq_type']=='big' ? 'DESC':'ASC';
      $row_eq_rank=$pdo->select("SELECT  cc.Tb_index, cc.cc_group_id, cc.cc_photo, cc.cc_cardname, cc.bi_shortname, cc.org_nickname, cc.attr_name, cc.cc_doc_url, cc.cc_doc_path, cc_eq.sm_content
                                 FROM credit_card_eq as cc_eq
                                 INNER JOIN cc_detail as cc ON cc_eq.card_id=cc.Tb_index 
                                 WHERE cc_eq.eq_id=:eq_id
                                 ORDER BY cc_eq.number_data ".$eq_type." LIMIT ".$sr_num.",".$_POST['sr_num_plus'], ['eq_id'=>$_POST['ci_pk01']]);
      
      $ci_pk01_arr=[];
      foreach ($row_eq_rank as $eq_rank_one) {
        //-- 卡名 --
        $card_name=$eq_rank_one['bi_shortname'].'_'.$eq_rank_one['cc_cardname'].'_'.$eq_rank_one['org_nickname'].$eq_rank_one['attr_name'];

        //-- 立即辦卡 --
        if (!empty($eq_rank_one['cc_doc_url'])) {
          $cc_doc='<a target="_blank"  href="'.$eq_rank_one['cc_doc_url'].'" class="apply_card_btn btn warning-layered btnOver">立即辦卡</a>';
        }
        elseif(!empty($eq_rank_one['cc_doc_path'])){
          $cc_doc='<a target="_blank" href="'.$eq_rank_one['cc_doc_path'].'" class="apply_card_btn btn warning-layered btnOver">立即辦卡</a>';
        }
        else{
          $cc_doc='';
        }

        //-- 卡片圖 --
        $cc_photo=empty($eq_rank_one['cc_photo']) ? 'CardSample.png':$eq_rank_one['cc_photo'];

       $ci_pk01_one= '
       <td class="ci_pk01">
         <div class="rank_care money_main">
          <a href="../cardNews/creditcard.php?cc_pk='.$eq_rank_one['Tb_index'].'&cc_group_id='.$eq_rank_one['cc_group_id'].'">
           <img class="rank_img" src="../sys/img/'.$cc_photo.'" title="'.$eq_rank_one['sm_content'].'">
           <h5 class=" money_main text-center mb-0">'.$card_name.'</h5>
          </a>
         <div class="profit_btn  hv-center">
           '.$cc_doc.'
           <button type="button" card_id="'.$eq_rank_one['Tb_index'].'" cc_group_id="'.$eq_rank_one['cc_group_id'].'" card_name="'.$card_name.'" card_img="'.$cc_photo.'" class="btn gray-layered btnOver add_contrast_card phone_hidden">加入比較</button>
         </div>
        </div>
       </td>';
       array_push($ci_pk01_arr, $ci_pk01_one);
      }
      

      //-- 權益項目2 --
      if (!empty($_POST['ci_pk02'])) {

      $row_eq=$pdo->select("SELECT eq_type FROM card_eq_item WHERE Tb_index=:Tb_index", ['Tb_index'=>$_POST['ci_pk02']], 'one');
      $eq_type=$row_eq['eq_type']=='big' ? 'DESC':'ASC';
      $row_eq_rank=$pdo->select("SELECT  cc.Tb_index, cc.cc_group_id, cc.cc_photo, cc.cc_cardname, cc.bi_shortname, cc.org_nickname, cc.attr_name, cc.cc_doc_url, cc.cc_doc_path, cc_eq.sm_content
                                 FROM credit_card_eq as cc_eq
                                 INNER JOIN cc_detail as cc ON cc_eq.card_id=cc.Tb_index 
                                 WHERE cc_eq.eq_id=:eq_id
                                 ORDER BY cc_eq.number_data ".$eq_type." LIMIT ".$sr_num.",3", ['eq_id'=>$_POST['ci_pk02']]);
      
      $ci_pk02_arr=[];
      foreach ($row_eq_rank as $eq_rank_one) {
        //-- 卡名 --
        $card_name=$eq_rank_one['bi_shortname'].'_'.$eq_rank_one['cc_cardname'].'_'.$eq_rank_one['org_nickname'].$eq_rank_one['attr_name'];

        //-- 立即辦卡 --
        if (!empty($eq_rank_one['cc_doc_url'])) {
          $cc_doc='<a target="_blank"  href="'.$eq_rank_one['cc_doc_url'].'" class="apply_card_btn btn warning-layered btnOver">立即辦卡</a>';
        }
        elseif(!empty($eq_rank_one['cc_doc_path'])){
          $cc_doc='<a target="_blank" href="'.$eq_rank_one['cc_doc_path'].'" class="apply_card_btn btn warning-layered btnOver">立即辦卡</a>';
        }
        else{
          $cc_doc='';
        }
        //-- 卡片圖 --
        $cc_photo=empty($eq_rank_one['cc_photo']) ? 'CardSample.png':$eq_rank_one['cc_photo'];

       $ci_pk02_one= '
       <td class="ci_pk01">
         <div class="rank_care money_main">
          <a href="../cardNews/creditcard.php?cc_pk='.$eq_rank_one['Tb_index'].'&cc_group_id='.$eq_rank_one['cc_group_id'].'">
           <img class="rank_img" src="../sys/img/'.$cc_photo.'" title="'.$eq_rank_one['sm_content'].'">
           <h5 class=" money_main text-center mb-0">'.$card_name.'</h5>
          </a>
         <div class="profit_btn  hv-center">
           '.$cc_doc.'
           <button type="button" card_id="'.$eq_rank_one['Tb_index'].'" cc_group_id="'.$eq_rank_one['cc_group_id'].'" card_name="'.$card_name.'" card_img="'.$cc_photo.'" class="btn gray-layered btnOver add_contrast_card phone_hidden">加入比較</button>
         </div>
        </div>
       </td>';
       array_push($ci_pk02_arr, $ci_pk02_one);
      }
      }

      //-- 權益項目3 --
      if (!empty($_POST['ci_pk03'])) {

      $row_eq=$pdo->select("SELECT eq_type FROM card_eq_item WHERE Tb_index=:Tb_index", ['Tb_index'=>$_POST['ci_pk03']], 'one');
      $eq_type=$row_eq['eq_type']=='big' ? 'DESC':'ASC';
      $row_eq_rank=$pdo->select("SELECT  cc.Tb_index, cc.cc_group_id, cc.cc_photo, cc.cc_cardname, cc.bi_shortname, cc.org_nickname, cc.attr_name, cc.cc_doc_url, cc.cc_doc_path, cc_eq.sm_content
                                 FROM credit_card_eq as cc_eq
                                 INNER JOIN cc_detail as cc ON cc_eq.card_id=cc.Tb_index 
                                 WHERE cc_eq.eq_id=:eq_id
                                 ORDER BY cc_eq.number_data ".$eq_type." LIMIT ".$sr_num.",3", ['eq_id'=>$_POST['ci_pk03']]);
      $ci_pk03_arr=[];
      foreach ($row_eq_rank as $eq_rank_one) {
        //-- 卡名 --
        $card_name=$eq_rank_one['bi_shortname'].'_'.$eq_rank_one['cc_cardname'].'_'.$eq_rank_one['org_nickname'].$eq_rank_one['attr_name'];

        //-- 立即辦卡 --
        if (!empty($eq_rank_one['cc_doc_url'])) {
          $cc_doc='<a target="_blank"  href="'.$eq_rank_one['cc_doc_url'].'" class="apply_card_btn btn warning-layered btnOver">立即辦卡</a>';
        }
        elseif(!empty($eq_rank_one['cc_doc_path'])){
          $cc_doc='<a target="_blank" href="'.$eq_rank_one['cc_doc_path'].'" class="apply_card_btn btn warning-layered btnOver">立即辦卡</a>';
        }
        else{
          $cc_doc='';
        }
        //-- 卡片圖 --
        $cc_photo=empty($eq_rank_one['cc_photo']) ? 'CardSample.png':$eq_rank_one['cc_photo'];

       $ci_pk03_one= '
       <td class="ci_pk01">
         <div class="rank_care money_main">
          <a href="../cardNews/creditcard.php?cc_pk='.$eq_rank_one['Tb_index'].'&cc_group_id='.$eq_rank_one['cc_group_id'].'">
           <img class="rank_img" src="../sys/img/'.$cc_photo.'" title="'.$eq_rank_one['sm_content'].'">
           <h5 class=" money_main text-center mb-0">'.$card_name.'</h5>
          </a>
         <div class="profit_btn  hv-center">
           '.$cc_doc.'
           <button type="button" card_id="'.$eq_rank_one['Tb_index'].'" cc_group_id="'.$eq_rank_one['cc_group_id'].'" card_name="'.$card_name.'" card_img="'.$cc_photo.'" class="btn gray-layered btnOver add_contrast_card phone_hidden">加入比較</button>
         </div>
        </div>
       </td>';
       array_push($ci_pk03_arr, $ci_pk03_one);
       }
      }

      $ci_pk01_arr_num=count($ci_pk01_arr);
      for ($i=0; $i <$ci_pk01_arr_num ; $i++) { 
       
       $ci_pk01_txt=empty($ci_pk01_arr[$i]) ? '<td></td>':$ci_pk01_arr[$i];
       $ci_pk02_txt=empty($ci_pk02_arr[$i]) ? '<td></td>':$ci_pk02_arr[$i];
       $ci_pk03_txt=empty($ci_pk03_arr[$i]) ? '<td></td>':$ci_pk03_arr[$i];
       
      
       $top_prize=($i+$sr_num)<3 ? '<span class="top_prize"></span>':'';
        echo '
        <tr class="profit_bg">
          <td>
            <div class="hv-center profit_prize rank_hot">
            '.$top_prize.'
            <h1 class=" hv-center mb-0">'.($i+$sr_num+1).'</h1>
          </div>
          </td>
         '.$ci_pk01_txt.$ci_pk02_txt.$ci_pk03_txt.'
        </tr>';

        //-- 廣告 --
        if (($i+1)%3==0) {
          echo '
            <td colspan="4">
             <div class="test hv-center"><img src="http://placehold.it/750x150" alt="banner"></div>
            </td>';
        }
      }
      
     
    break;
    //----------------------------------------------------------------------------- 顯示更多卡片(權益比一比) END ---------------------------------------------------------------------------

    


   //------------------------------------------------------------------------------- 選擇卡群組，撈卡等(卡片比一比) -----------------------------------------------------------------------
   case 'ccard_orglevel':
       $row=$pdo->select("SELECT Tb_index, cc_group_id, org_nickname, attr_name 
                          FROM cc_detail 
                          WHERE cc_group_id=:cc_group_id", ['cc_group_id'=>$_POST['cc_group_id']]);
       echo json_encode($row); 
   break;
   //------------------------------------------------------------------------------- 選擇卡群組，撈卡等(卡片比一比) END -----------------------------------------------------------------------




    //----------------------------------------------------------------------------- 顯示卡片(卡片比一比) ---------------------------------------------------------------------------
    case 'show_cc':
      
      $row=$pdo->select("SELECT Tb_index, cc_group_id, cc_cardname, cc_photo, bi_shortname, org_nickname, attr_name
                         FROM cc_detail as cc
                         WHERE Tb_index=:Tb_index", ['Tb_index'=>$_POST['cc_id']], 'one');
    echo json_encode($row);
    break;
    //----------------------------------------------------------------------------- 顯示卡片(卡片比一比) END ---------------------------------------------------------------------------
  	
  	default:
  	  echo "error";
  	break;
  }

  $pdo->close();
}
?>