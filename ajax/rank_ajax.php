<?php 
require '../sys/core/inc/config.php';
require '../sys/core/inc/function.php';
require '../sys/core/inc/pdo_fun_calss.php';

if ($_POST) {
  
  $pdo=new PDO_fun;

  switch ($_POST['type']) {

  	//---------------------------------------------------------------- 卡排行卡片前六名輪播 -----------------------------------------------------------------------
  	case 'slide_6_rank':
  	  $row=$pdo->select("SELECT ccs_cc_cardname, ccs_cc_pk, ccs_cc_group_id 
  	                     FROM credit_cardrank 
  	                     WHERE ccs_cc_so_pk=:ccs_cc_so_pk 
  	                     ORDER BY ccs_order ASC LIMIT 0,6" ,['ccs_cc_so_pk'=>$_POST['ccs_cc_so_pk']]);
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
  	    $row[$i]['cc_photo']=$row_ccard['cc_photo'];

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
                                 ORDER BY cc_eq.number_data ".$eq_type." LIMIT ".$sr_num.",3", ['eq_id'=>$_POST['ci_pk01']]);
      
      $ci_pk01_arr=[];
      foreach ($row_eq_rank as $eq_rank_one) {
        //-- 卡名 --
        $card_name=$eq_rank_one['bi_shortname'].$eq_rank_one['cc_cardname'].$eq_rank_one['org_nickname'].$eq_rank_one['attr_name'];

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
       $ci_pk01_one= '
       <td class="ci_pk01">
         <div class="rank_care money_main">
          <a href="../cardNews/creditcard.php?cc_pk='.$eq_rank_one['Tb_index'].'&cc_group_id='.$eq_rank_one['cc_group_id'].'">
           <img class="rank_img" src="../sys/img/'.$eq_rank_one['cc_photo'].'" title="'.$eq_rank_one['sm_content'].'">
           <h5 class=" money_main text-center mb-0">'.$card_name.'</h5>
          </a>
         <div class="profit_btn  hv-center">
           '.$cc_doc.'
           <button type="button" class="btn gray-layered btnOver phone_hidden">加入比較</button>
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
        $card_name=$eq_rank_one['bi_shortname'].$eq_rank_one['cc_cardname'].$eq_rank_one['org_nickname'].$eq_rank_one['attr_name'];

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
       $ci_pk02_one= '
       <td class="ci_pk01">
         <div class="rank_care money_main">
          <a href="../cardNews/creditcard.php?cc_pk='.$eq_rank_one['Tb_index'].'&cc_group_id='.$eq_rank_one['cc_group_id'].'">
           <img class="rank_img" src="../sys/img/'.$eq_rank_one['cc_photo'].'" title="'.$eq_rank_one['sm_content'].'">
           <h5 class=" money_main text-center mb-0">'.$card_name.'</h5>
          </a>
         <div class="profit_btn  hv-center">
           '.$cc_doc.'
           <button type="button" class="btn gray-layered btnOver phone_hidden">加入比較</button>
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
        $card_name=$eq_rank_one['bi_shortname'].$eq_rank_one['cc_cardname'].$eq_rank_one['org_nickname'].$eq_rank_one['attr_name'];

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
       $ci_pk03_one= '
       <td class="ci_pk01">
         <div class="rank_care money_main">
          <a href="../cardNews/creditcard.php?cc_pk='.$eq_rank_one['Tb_index'].'&cc_group_id='.$eq_rank_one['cc_group_id'].'">
           <img class="rank_img" src="../sys/img/'.$eq_rank_one['cc_photo'].'" title="'.$eq_rank_one['sm_content'].'">
           <h5 class=" money_main text-center mb-0">'.$card_name.'</h5>
          </a>
         <div class="profit_btn  hv-center">
           '.$cc_doc.'
           <button type="button" class="btn gray-layered btnOver phone_hidden">加入比較</button>
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

    


   //-- 選擇卡群組，撈卡等(卡片比一比) --
   case 'ccard_orglevel':
       $row=$pdo->select("SELECT Tb_index, cc_group_id, org_nickname, attr_name 
                          FROM cc_detail 
                          WHERE cc_group_id=:cc_group_id", ['cc_group_id'=>$_POST['cc_group_id']]);
       echo json_encode($row); 
   break;




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