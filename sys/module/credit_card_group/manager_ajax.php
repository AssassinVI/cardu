<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';
 require '../../core/inc/pdo_fun_calss.php';

 if ($_POST) {

 	$pdo=new PDO_fun;
    
  //-- 卡組織 --
  $org=$pdo->select("SELECT Tb_index, org_nickname, org_image FROM card_org WHERE mt_id='site2018110611172385' ORDER BY OrderBy ASC");

  //-- 卡等 --
  $level_name=[];
  $level=$pdo->select("SELECT Tb_index, attr_name FROM card_level ORDER BY OrderBy ASC");
  foreach ($level as $level_one) {
    $level_name[$level_one['Tb_index']]=$level_one['attr_name'];
  }
  
  //-- 撈取組織 --
  foreach ($org as $org_one) {

  //-- 撈取勾選組織的卡等 --
   $cc_cardlevel=[];
   //- 卡片狀態 -
   $cc_status_name=[];
   $cc_stop_publish=[];
   $cc_stop_card=[];

     $row_orglevel=$pdo->select("SELECT cc.cc_cardorg, cc.cc_cardlevel, cc.cc_status_name, cc.cc_stop_publish, cc.cc_stop_card 
                                    FROM credit_card as cc
                                    INNER JOIN card_level as cl ON cl.Tb_index=cc.cc_cardlevel 
                                    WHERE cc.cc_group_id=:cc_group_id AND cc.cc_cardorg=:cc_cardorg
                                    ORDER BY cl.OrderBy", 
                                    ['cc_group_id'=>$_POST['cc_group_id'], 'cc_cardorg'=>$org_one['Tb_index']]);
     $row_orglevel_num=count($row_orglevel);

    foreach ($row_orglevel as $row_orglevel_one) {
      $cc_cardorg=$row_orglevel_one['cc_cardorg'];
      array_push($cc_cardlevel, $row_orglevel_one['cc_cardlevel']);
      array_push($cc_status_name, $row_orglevel_one['cc_status_name']);
      array_push($cc_stop_publish, $row_orglevel_one['cc_stop_publish']);
      array_push($cc_stop_card, $row_orglevel_one['cc_stop_card']);
    }
  //-- 撈取勾選組織的卡等 END --
                   
                   $check_org=$cc_cardorg==$org_one['Tb_index'] ? 'checked':'';

                   echo '<tr class="card_level">';
                   echo '<td><label><input type="checkbox" '.$check_org.' disabled name="cc_cardorg[]" value="'.$org_one['Tb_index'].'" > '.$org_one['org_nickname'].'</label></td>';
   

                   //-- 撈取卡等 --
                   $card_level=$pdo->select("SELECT ol.level_id 
                                                FROM org_level as ol
                                                INNER JOIN card_level as cl ON cl.Tb_index=ol.level_id 
                                                WHERE ol.org_id=:org_id
                                                ORDER BY cl.OrderBy", ['org_id'=>$org_one['Tb_index']]);
                   $x=0;
                   foreach ($card_level as $card_level_one) {

                    if ($cc_cardorg==$org_one['Tb_index'] && in_array($card_level_one['level_id'], $cc_cardlevel)) {
                      
                      //-- 停發/停卡字 --
                      if ($cc_stop_publish[$x]=='1' && $cc_stop_card[$x]=='0') {
                        $cc_status=1;
                      }
                      else if($cc_stop_publish[$x]=='0' && $cc_stop_card[$x]=='1'){
                        $cc_status=2;
                      }
                      else{
                        $cc_status=0;
                      }

                      $cc_status_txt=empty($cc_status_name[$x]) ? '':'('.$cc_status_name[$x].')';
                      $cc_status_color=empty($cc_status_name[$x]) ? '':'text-danger';

                      echo '<td>
                             <label class="'.$cc_status_color.'">
                               <input type="checkbox" checked disabled name="cc_card_orglevel[]" value="'.$org_one['Tb_index'].','.$card_level_one['level_id'].'"> 
                               <input type="hidden" name="cc_card_status[]" value="'.$cc_status.'">
                               <span class="cc_name">'.$level_name[$card_level_one['level_id']].'</span><span class="cc_status">'.$cc_status_txt.'<span>
                             </label>
                            </td>';
                      $x++;
                    }
                    else{
                      echo '<td><label><input type="checkbox" disabled name="cc_card_orglevel[]" value="'.$org_one['Tb_index'].','.$card_level_one['level_id'].'"> <span>'.$level_name[$card_level_one['level_id']].'</span></label></td>';
                    }
                   }

     echo '</tr>';     
                       
   }
 	

 	
 }
?>