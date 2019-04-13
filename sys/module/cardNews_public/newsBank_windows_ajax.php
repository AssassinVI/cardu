<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';
 require '../../core/inc/pdo_fun_calss.php';

if ($_POST && isset($_POST['type'])) {

 	$pdo=new PDO_fun;
   
  //-- 撈取已有信用卡、金融卡的銀行 --
  if ($_POST['type']=='bank') {
    if ($_POST['card_type']=='credit_card') {
      $row=$pdo->select("SELECT bk.Tb_index, bk.bi_shortname, bk.bi_code FROM credit_card as card INNER JOIN bank_info as bk ON card.cc_bi_pk=bk.Tb_index GROUP BY card.cc_bi_pk");
    }
    else{
      $row=$pdo->select("SELECT bk.Tb_index, bk.bi_shortname, bk.bi_code FROM debit_card as card INNER JOIN bank_info as bk ON card.dc_bi_pk=bk.Tb_index GROUP BY card.dc_bi_pk");
    }
    echo json_encode($row);
  }
  
  //-- 撈取所選銀行的信用卡 --
  elseif($_POST['type']=='card'){
     
     if ($_POST['card_type']=='credit_card') {
       $row=$pdo->select("
        SELECT card.Tb_index, card.cc_bi_pk as bank_id, card.cc_group_id as group_id, card.cc_cardorg as org_id, card.cc_cardlevel as level_id, card.cc_cardname, org.org_nickname, level.attr_name
        FROM credit_card as card 
        INNER JOIN card_org as org ON card.cc_cardorg=org.Tb_index 
        INNER JOIN card_level as level ON card.cc_cardlevel=level.Tb_index 
        WHERE card.cc_bi_pk=:cc_bi_pk AND card.cc_stop_publish=0 AND card.cc_stop_card=0 
        ", ['cc_bi_pk'=>$_POST['bank_id']]);

       foreach ($row as $row_one) {
         $row_group[$row_one['cc_cardname']][$row_one['org_nickname']][]=$row_one;
       }
     }
     else{

      $row=$pdo->select("
        SELECT card.Tb_index, card.dc_bi_pk as bank_id, card.dc_group_id as group_id, card.dc_debitorg as org_id, card.dc_debitlevel as level_id, card.dc_cardname, org.org_nickname, level.attr_name
        FROM debit_card as card 
        INNER JOIN card_org as org ON card.dc_debitorg=org.Tb_index 
        INNER JOIN card_level as level ON card.dc_debitlevel=level.Tb_index 
        WHERE card.dc_bi_pk=:cc_bi_pk AND card.dc_stop_publish=0 AND card.dc_stop_card=0
        ", ['cc_bi_pk'=>$_POST['bank_id']]);

      foreach ($row as $row_one) {
         $row_group[$row_one['dc_cardname']][$row_one['org_nickname']][]=$row_one;
       }
       
     }
     
     echo json_encode($row_group);
  }


  //-- 撈取所選銀行 --
  elseif($_POST['type']=='check_bank'){
    $row=$pdo->select("SELECT nbc.card_type, nbc.bank_id, bk.bi_shortname
                       FROM appNews_bank_card as nbc 
                       INNER JOIN bank_info as bk ON nbc.bank_id=bk.Tb_index
                       WHERE news_id=:news_id
                       GROUP BY nbc.bank_id", ['news_id'=>$_POST['news_id']]);

    echo json_encode($row);
  }
 }
?>