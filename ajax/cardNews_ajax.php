<?php 
require '../sys/core/inc/config.php';
require '../sys/core/inc/function.php';
require '../sys/core/inc/pdo_fun_calss.php';
//-- 前台特殊用 --
require '../share_area/func.php';

if ($_POST) {
  
  $pdo=new PDO_fun;

  switch ($_POST['type']) {

  	//---------------------------------------------------------------- 信用卡前六名輪播 -----------------------------------------------------------------------
  	case 'slide_6_card':


  	  $row=$pdo->select("SELECT cc_group_id
  	                     FROM credit_card
  	                     WHERE cc_fun_id LIKE :cc_fun_id AND cc_group_state IN (0,3)
                         GROUP BY cc_group_id
                         ORDER BY cc_publish DESC
  	                     LIMIT 0,6" ,['cc_fun_id'=>'%'.$_POST['cc_fun_id'].'%']);
      $row_num=count($row);
      for ($i=0; $i <$row_num ; $i++) { 

        $row_card_group=$pdo->select("SELECT cc.cc_group_id, cc.cc_photo, 
                                             ccd.cc_cardname, ccd.bi_shortname, ccd.org_nickname, ccd.attr_name
                                      FROM credit_card as cc
                                      INNER JOIN card_level as level ON level.Tb_index=cc.cc_cardlevel 
                                      INNER JOIN cc_detail as ccd ON ccd.Tb_index=cc.Tb_index
                                      WHERE cc.cc_group_id=:cc_group_id 
                                      ORDER BY level.OrderBy ASC
                                      LIMIT 0,1", ['cc_group_id'=>$row[$i]['cc_group_id']], 'one');
      

  	    $row[$i]['cc_photo']=empty($row_card_group['cc_photo']) ? 'CardSample.png':$row_card_group['cc_photo'];

        //-- 完整卡名(卡組) --
        $row[$i]['cc_cardname_all']=$row_card_group['bi_shortname'].$row_card_group['cc_cardname'];

  	    $row[$i]['cc_cardname']=wp_is_mobile() ? mb_substr($row_card_group['bi_shortname'].$row_card_group['cc_cardname'], 0, 10) : mb_substr($row_card_group['bi_shortname'].$row_card_group['cc_cardname'], 0, 14);
        
        //-- 卡連結 --
  	    $row[$i]['cc_url']='../card/type.php?gid='.$row_card_group['cc_group_id'];

      }
      echo json_encode($row);
  	break;
    //---------------------------------------------------------------- 信用卡前六名輪播 END -----------------------------------------------------------------------


    //---------------------------------------------------------------- 卡總覽(顯示更多卡片)-信用卡 -----------------------------------------------------------------------
    case 'rank_more_card_browse':

     //-- 目前排行數 --
     $sr_num=empty($_POST['sr_num']) ? 0 : (int)$_POST['sr_num'];
     //-- 要加的數量 --
     $sr_num_plus=empty($_POST['sr_num_plus']) ? 10 : (int)$_POST['sr_num_plus'];

    
     $where=['cc_bi_pk'=>$_POST['bank_id']];
     if (!empty($_POST['func_id'])) {
       $where_sql="cc.cc_fun_id LIKE :cc_fun_id";
       $where['cc_fun_id']='%'.$_POST['func_id'].'%';
     }
     else{
       $where_sql="cc.cc_pref_id LIKE :cc_pref_id";
       $where['cc_pref_id']='%'.$_POST['pref_id'].'%';
     }

     $row_card_list=$pdo->select("SELECT cc.cc_bi_pk,
                                        cc.Tb_index, cc.cc_group_id, cc.cc_photo, cc.cc_cardname, cc.cc_stop_publish, cc.cc_stop_card,
                                        cc.cc_cardorg, org.org_image, org.org_nickname, 
                                        level.attr_name
                                  FROM credit_card as cc 
                                  INNER JOIN card_org as org ON org.Tb_index=cc.cc_cardorg
                                  INNER JOIN card_level as level ON level.Tb_index=cc.cc_cardlevel
                                  WHERE cc.cc_group_state!=1 AND cc.cc_group_state!=2 AND cc.cc_bi_pk=:cc_bi_pk AND $where_sql 
                                  ORDER BY cc.cc_publish DESC, cc.cc_group_id DESC, level.OrderBy ASC", $where);

    //-- 卡群組陣列 --
    $card_group_arr=[];
    foreach ($row_card_list as $card_list) {
      $card_group_arr[$card_list['cc_group_id']][]=$card_list;
    }

    $x=1;
    foreach ($card_group_arr as $card_group) {
      
      if ($x>$sr_num && $x<=($sr_num+$sr_num_plus)) {
        
         //-- 卡組織陣列 --
         $card_org_arr=[];
         foreach ($card_group as $card_group_one) {
           $card_org_arr[$card_group_one['cc_cardorg']][]=$card_group_one;
         }
         $c_org_txt='';
         foreach ($card_org_arr as $card_org) {
           
           //-- 卡等 --
           $c_level_txt='';
           foreach ($card_org as $card_org_one) {
            if ($card_org_one['cc_stop_publish']==0 && $card_org_one['cc_stop_card']==0){
             $c_level_txt.='<a href="creditcard.php?cc_pk='.$card_org_one['Tb_index'].'&cc_group_id='.$card_org_one['cc_group_id'].'">'.$card_org_one['attr_name'].'</a>、';
            }
           }
           $c_level_txt=mb_substr($c_level_txt, 0,-1,'utf-8');
           
           if (!empty($c_level_txt)) {
             $c_org_txt.='
               <div class="py-2 row no-gutters">
                <div class="col-md-2 col-4">
                 <a href="bank_list.php?order=cc_'.$card_org[0]['org_nickname'].'"><img src="../sys/img/'.$card_org[0]['org_image'].'" title="'.$card_org[0]['org_nickname'].'"></a>
                </div>
                <div class="col-md-10 col-8">
                 '.$c_level_txt.'
                </div>
               </div>';
           }
         }
         //-- 卡組織陣列 END --

        //-- 卡片圖 --
        $cc_photo=empty($card_group[0]['cc_photo']) ? 'CardSample.png':$card_group[0]['cc_photo'];

        $c_group_txt='
        <div class="row cards_div bankbg_list">
          <div class="col-md-5 col-6 hv-center" title="'.$card_group[0]['cc_cardname'].'">
              <a class="bank_all_small_img card_name text-center" href="type.php?bi_pk01='.$_POST['bank_id'].'&gid='.$card_group[0]['cc_group_id'].'">
               <img src="../sys/img/'.$cc_photo.'" ><br>'.$card_group[0]['cc_cardname'].'
              </a>
          </div>
          <div class="col-md-7 col-6 h-center col0 all_color mb-md-4">
           <div class="w-100 text-md-center" >
           '.$c_org_txt.'
           </div>
          </div> 
        </div>';

        echo $c_group_txt;
      }
      $x++;
    }

    break;
    //---------------------------------------------------------------- 卡總覽(顯示更多卡片)-信用卡 END -----------------------------------------------------------------------


    //---------------------------------------------------------------- 卡總覽(顯示更多卡片)-金融卡 -----------------------------------------------------------------------
    case 'rank_more_dcard_browse':

     //-- 目前排行數 --
     $sr_num=empty($_POST['sr_num']) ? 0 : (int)$_POST['sr_num'];
     //-- 要加的數量 --
     $sr_num_plus=empty($_POST['sr_num_plus']) ? 10 : (int)$_POST['sr_num_plus'];

    
     $where=['dc_bi_pk'=>$_POST['bank_id']];
     if (!empty($_POST['func_id'])) {
       $where_sql="dc.dc_fun_id LIKE :dc_fun_id";
       $where['dc_fun_id']='%'.$_POST['func_id'].'%';
     }
     else{
       $where_sql="dc.dc_pref_id LIKE :dc_pref_id";
       $where['dc_pref_id']='%'.$_POST['pref_id'].'%';
     }

     $row_card_list=$pdo->select("SELECT dc.dc_bi_pk,
                                        dc.Tb_index, dc.dc_group_id, dc.dc_photo, dc.dc_cardname, dc.dc_stop_publish, dc.dc_stop_card,
                                        dc.dc_debitorg, org.org_image, org.org_nickname, 
                                        level.attr_name
                                  FROM debit_card as dc 
                                  INNER JOIN card_org as org ON org.Tb_index=dc.dc_debitorg
                                  INNER JOIN card_level as level ON level.Tb_index=dc.dc_debitlevel
                                  WHERE dc.dc_group_state=0 AND dc.dc_bi_pk=:dc_bi_pk AND $where_sql 
                                  ORDER BY dc.dc_publish DESC, dc.dc_group_id DESC, level.OrderBy ASC", $where);

    //-- 卡群組陣列 --
    $card_group_arr=[];
    foreach ($row_card_list as $card_list) {
      $card_group_arr[$card_list['dc_group_id']][]=$card_list;
    }

    $x=1;
    foreach ($card_group_arr as $card_group) {
      
      if ($x>$sr_num && $x<=($sr_num+$sr_num_plus)) {
        
         //-- 卡組織陣列 --
         $card_org_arr=[];
         foreach ($card_group as $card_group_one) {
           $card_org_arr[$card_group_one['dc_debitorg']][]=$card_group_one;
         }
         $c_org_txt='';
         foreach ($card_org_arr as $card_org) {
           
           if ($card_org[0]['cc_stop_publish']==0 && $card_org[0]['cc_stop_card']==0){
             $c_org_txt.='
                 <a class="mr-2" href="bank_list.php?order=dc_'.$card_org[0]['org_nickname'].'"><img src="../sys/img/'.$card_org[0]['org_image'].'" title="'.$card_org[0]['org_nickname'].'"></a>
               ';
           }
         }
         //-- 卡組織陣列 END --

        //-- 卡片圖 --
        $dc_photo=empty($card_group[0]['dc_photo']) ? 'CardSample.png':$card_group[0]['dc_photo'];

        $c_group_txt='
        <div class="row cards_div bankbg_list">
          <div class="col-md-5 col-6 hv-center" title="'.$card_group[0]['dc_cardname'].'">
              <a class="bank_all_small_img card_name text-center" href="type.php?bi_pk01='.$_POST['bank_id'].'&gid='.$card_group[0]['dc_group_id'].'">
               <img src="../sys/img/'.$dc_photo.'" ><br>'.$card_group[0]['dc_cardname'].'
              </a>
          </div>
          <div class="col-md-7 col-6 h-center col0 all_color mb-md-4">
           <div class="w-100" >
           '.$c_org_txt.'
           </div>
          </div> 
        </div>';

        echo $c_group_txt;
      }
      $x++;
    }

    break;
    //---------------------------------------------------------------- 卡總覽(顯示更多卡片)-金融卡 END -----------------------------------------------------------------------





    //---------------------------------------------------------------- 線上辦卡 -----------------------------------------------------------------------
    case 'online':
      $bank_row=$pdo->select("SELECT * FROM bank_info WHERE Tb_index=:Tb_index", ['Tb_index'=>$_POST['Tb_index']], 'one');

      //-- 立即辦卡-檔案 --
      if ($bank_row['bd_src']=='1') {
        $path='../other_file/'.$bank_row['bd_path'];
      }
      //-- 立即辦卡-連結 --
      elseif($bank_row['bd_src']=='2'){
        $path=$bank_row['bd_url'];
      }

      //-- 地址 --
      $bank_adds=explode(',', $bank_row['bi_addr']);
      $bank_adds=$bank_adds[0].$bank_adds[1];


      $row_bk_card=$pdo->select("SELECT cc_group_id, cc_cardname, cc_photo, cc_doc_path, cc_doc_url
                                 FROM credit_card 
                                 WHERE cc_bi_pk=:cc_bi_pk AND (cc_doc_path!='' OR cc_doc_url!='') 
                                 GROUP BY cc_group_id
                                 ORDER BY cc_publish ASC", ['cc_bi_pk'=>$_POST['Tb_index']]);
      $bk_card_txt='';
      foreach ($row_bk_card as $bk_card) {

       //-- 卡片圖 --
       $cc_photo=empty($bk_card['cc_photo']) ? 'CardSample.png':$bk_card['cc_photo'];
       $doc=empty($bk_card['cc_doc_url']) ? '/sys/other_file/'.$bk_card['cc_doc_path'] : $bk_card['cc_doc_url'];

        $bk_card_txt.= '
        <div class="pb-3 col-md-4 text-center">
          <a class="bank_all_img" href="type.php?bi_pk01='.$_POST['Tb_index'].'&gid='.$bk_card['cc_group_id'].'"><img src="../sys/img/'.$cc_photo.'" ></a>
          <h6><a class="card_name" href="type.php?bi_pk01='.$_POST['Tb_index'].'&gid='.$bk_card['cc_group_id'].'">'.$bk_card['cc_cardname'].'</a></h6>
          <a target="_blank" class="btn mt-2 online_btn warning-layered btnOver" href="'.$doc.'">立即辦卡</a>
        </div>';
      }


      echo '<div id="'.$bank_row['Tb_index'].'" class="bank_div">
              <div id="bank_detial" class="pt-3 detail_title">
              <div class="col-md-12">
                <div class="row onlinebg cardshap">
                  
                 <div class="col-5 col hv-center">
                  <div class="text-center">
                  <img src="../sys/img/'.$bank_row['bi_logo'].'" title="'.$bank_row['bi_shortname'].'">
                  <h6>銀行代碼：'.$bank_row['bi_code'].'</h6>
                  <a target="_blank" class="applycard_btn warning-layered btnOver" href="'.$path.'">立即辦卡</a>
                  </div>
                 </div>
                 
                 <div class="col-7 col">
                 <h4>'.$bank_row['bi_fullname'].'(簡稱'.$bank_row['bi_shortname'].')</h4>
                 <hr>
                 <p>總行電話：'.$bank_row['bi_tel'].' <br>           
                    信用卡服務專線：'.$bank_row['bi_tel_card'].'<br>
                    總行地址：'.$bank_adds.'<br>
                    銀行網址：<a target="_blank" href="'.$bank_row['bi_bank_url'].'">'.$bank_row['bi_bank_url'].'</a>
                  </p>
                 </div>
                 
               </div> 
              </div> 
             </div>

             <div id="bank_card" class="row no-gutters mx-2 py-3">    
                   <div class="col-md-12 row"> 
                      '.$bk_card_txt.'
                   </div>
             </div>
           </div>';

      
      // echo json_encode($bank_row);

    break;
    //---------------------------------------------------------------- 線上辦卡 END -----------------------------------------------------------------------

  	default:
  	  echo "error";
  	break;
  }

  $pdo->close();
}
?>