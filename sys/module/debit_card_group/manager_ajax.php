<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';
 require '../../core/inc/pdo_fun_calss.php';

 if ($_POST) {

 	$pdo=new PDO_fun;
    
  //-- 卡組織 --
  $org=$pdo->select("SELECT Tb_index, org_nickname, org_image FROM card_org WHERE mt_id='site2018120315164066' ORDER BY OrderBy ASC");

  //-- 卡等 --
  $level_name=[];
  $level=$pdo->select("SELECT Tb_index, attr_name FROM card_level ORDER BY OrderBy ASC");
  foreach ($level as $level_one) {
    $level_name[$level_one['Tb_index']]=$level_one['attr_name'];
  }
  
                       //-- 撈取組織 --
                       foreach ($org as $org_one) {
                                         
                                         //-- 撈取勾選組織的卡等 --
                         $dc_debitlevel=[];
                         //- 卡片狀態 -
                         $dc_status=[];
                         $dc_status_name=['', '停發', '停卡'];
                         $dc_stop_publish=[];
                         $dc_stop_card=[];
                                         $row_orglevel=$pdo->select("SELECT dc.dc_debitorg, dc.dc_debitlevel, dc.dc_status, dc.dc_stop_publish, dc.dc_stop_card 
                                                                        FROM debit_card as dc
                                                                        INNER JOIN card_level as cl ON cl.Tb_index=dc.dc_debitlevel 
                                                                        WHERE dc.dc_group_id=:dc_group_id AND dc.dc_debitorg=:dc_debitorg
                                                                        ORDER BY cl.OrderBy", 
                                                                        ['dc_group_id'=>$_POST['dc_group_id'], 'dc_debitorg'=>$org_one['Tb_index']]);
                                         $row_orglevel_num=count($row_orglevel);

                                         foreach ($row_orglevel as $row_orglevel_one) {
                                          $dc_debitorg=$row_orglevel_one['dc_debitorg'];
                                          array_push($dc_debitlevel, $row_orglevel_one['dc_debitlevel']);
                                          array_push($dc_status, $row_orglevel_one['dc_status']);
                                          array_push($dc_stop_publish, $row_orglevel_one['dc_stop_publish']);
                                          array_push($dc_stop_card, $row_orglevel_one['dc_stop_card']);
                                         }
                                         //-- 撈取勾選組織的卡等 END --
                                         
                                         $check_org=$dc_debitorg==$org_one['Tb_index'] ? 'checked':'';

                                         echo '<tr class="card_level">';
                                         echo '<td><label><input type="checkbox" '.$check_org.' disabled name="dc_debitorg[]" value="'.$org_one['Tb_index'].'" > '.$org_one['org_nickname'].'</label></td>';
                         

                                         //-- 撈取卡等 --
                                         $card_level=$pdo->select("SELECT ol.level_id 
                                                                      FROM org_level as ol
                                                                      INNER JOIN card_level as cl ON cl.Tb_index=ol.level_id 
                                                                      WHERE ol.org_id=:org_id
                                                                      ORDER BY cl.OrderBy", ['org_id'=>$org_one['Tb_index']]);
                                         $x=0;
                                         foreach ($card_level as $card_level_one) {

                                          if ($dc_debitorg==$org_one['Tb_index'] && in_array($card_level_one['level_id'], $dc_debitlevel)) {
                                            
                                            //-- 停發/停卡字 --
                                            if ($dc_stop_publish[$x]=='1' && $dc_stop_card[$x]=='0') {
                                              $dc_status_num=1;
                                            }
                                            else if($dc_stop_publish[$x]=='0' && $dc_stop_card[$x]=='1'){
                                              $dc_status_num=2;
                                            }
                                            else{
                                              $dc_status_num=0;
                                            }

                                            $dc_status_txt=empty($dc_status_name[$dc_status[$x]]) ? '':'('.$dc_status_name[$dc_status[$x]].')';
                                            $dc_status_color=empty($dc_status_name[$dc_status[$x]]) ? '':'text-danger';

                                            echo '<td>
                                                   <label class="'.$dc_status_color.'">
                                                     <input type="checkbox" checked disabled name="dc_card_orglevel[]" value="'.$org_one['Tb_index'].','.$card_level_one['level_id'].'"> 
                                                     <input type="hidden" name="dc_card_status[]" value="'.$dc_status_num.'">
                                                     <span class="dc_name">'.$level_name[$card_level_one['level_id']].'</span><span class="dc_status">'.$dc_status_txt.'<span>
                                                   </label>
                                                  </td>';
                                            $x++;
                                          }
                                          else{
                                            echo '<td><label><input type="checkbox" disabled name="dc_card_orglevel[]" value="'.$org_one['Tb_index'].','.$card_level_one['level_id'].'"> <span>'.$level_name[$card_level_one['level_id']].'</span></label></td>';
                                          }
                                         }

                        echo '</tr>';
                       }
 	

 	
 }
?>