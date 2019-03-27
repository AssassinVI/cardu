<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';
 require '../../core/inc/pdo_fun_calss.php';

 if ($_POST) {

 	$pdo=new PDO_fun;



 	//-- 選取權益項目資訊 --
 	if($_POST['type']=='ch_eq'){
       
       //-- 權益項目 --
      $row_eq=$pdo->select("SELECT Tb_index, eq_name, eq_type, eq_txt FROM card_eq_item WHERE Tb_index=:Tb_index", ['Tb_index'=>$_POST['eq_id']], 'one');      
      echo json_encode($row_eq);
 	}
  

  //-- 選取權益項目資訊 (信用卡權益資料) --
  elseif($_POST['type']=='ch_eq_content'){
      
      //-- 信用卡權益項目 --
      $row_card_eq=$pdo->select("SELECT * FROM credit_card_eq WHERE card_id=:card_id AND eq_id=:eq_id", ['card_id'=>$_POST['card_id'], 'eq_id'=>$_POST['eq_id']] );
      echo json_encode($row_card_eq);
  }

  
  //-- 新增、更新信用卡權益項目資料 --
  elseif($_POST['type']=='int_up_eq'){
    
    $row_card_eq=$pdo->select("SELECT COUNT(*) as totle FROM credit_card_eq WHERE card_id=:card_id AND eq_id=:eq_id", ['card_id'=>$_POST['card_id'], 'eq_id'=>$_POST['eq_id']], 'one' );
    
    //--新增--
    if ($row_card_eq['totle']==0) {

      $Tb_index='ceq'.date('YmdHis').rand(0,99);
      $EndDate=empty($_POST['EndDate']) ? '2100-12-31':$_POST['EndDate'];
      $param=[
       'Tb_index'=>$Tb_index,
       'card_id'=>$_POST['card_id'],
       'bank_id'=>$_POST['bank_id'],
       'eq_id'=>$_POST['eq_id'],
       'number_data'=>$_POST['number_data'],
       'content'=>$_POST['content'],
       'sm_content'=>$_POST['sm_content'],
       'note'=>$_POST['note'],
       'kiman'=>$_SESSION['admin_name'],
       'cdata'=>date('Y-m-d'),
       'StartDate'=>$_POST['StartDate'],
       'EndDate'=>$EndDate

      ];
      $pdo->insert('credit_card_eq', $param);
      echo $Tb_index;
    }

    //-- 修改 --
    else{
      
      $param=[
       'number_data'=>$_POST['number_data'],
       'content'=>$_POST['content'],
       'sm_content'=>$_POST['sm_content'],
       'note'=>$_POST['note'],
       'StartDate'=>$_POST['StartDate'],
       'EndDate'=>$_POST['EndDate']
      ];

      $where=['Tb_index'=>$_POST['Tb_index']];
      $pdo->update('credit_card_eq', $param, $where);
      echo $_POST['Tb_index'];
    }
  }


  //-- 新增、更新信用卡權益項目資料 (排程) --
  elseif($_POST['type']=='int_up_eq_schedule'){
    
    $row_card_eq=$pdo->select("SELECT Tb_index, COUNT(*) as totle FROM credit_card_eq WHERE card_id=:card_id AND eq_id=:eq_id", ['card_id'=>$_POST['card_id'], 'eq_id'=>$_POST['eq_id']], 'one' );
    
    //--新增--
    if ($row_card_eq['totle']==1) {

      $Tb_index='ceq'.date('YmdHis').rand(0,99);
      $EndDate=empty($_POST['EndDate']) ? '2100-12-31':$_POST['EndDate'];
      $param=[
       'Tb_index'=>$Tb_index,
       'card_id'=>$_POST['card_id'],
       'bank_id'=>$_POST['bank_id'],
       'eq_id'=>$_POST['eq_id'],
       'number_data'=>$_POST['number_data'],
       'content'=>$_POST['content'],
       'sm_content'=>$_POST['sm_content'],
       'note'=>$_POST['note'],
       'kiman'=>$_SESSION['admin_name'],
       'cdata'=>date('Y-m-d'),
       'StartDate'=>$_POST['StartDate'],
       'EndDate'=>$EndDate

      ];
      $pdo->insert('credit_card_eq', $param);
      
      $pdo->update('credit_card_eq', ['EndDate'=>date('Y-m-d',strtotime($_POST['StartDate']))], ['Tb_index'=>$row_card_eq['Tb_index']]);
      echo $Tb_index;
    }

    //-- 修改 --
    elseif ($row_card_eq['totle']==2){
      
      $param=[
       'number_data'=>$_POST['number_data'],
       'content'=>$_POST['content'],
       'sm_content'=>$_POST['sm_content'],
       'note'=>$_POST['note'],
       'StartDate'=>$_POST['StartDate'],
       'EndDate'=>$_POST['EndDate']
      ];

      $where=['Tb_index'=>$_POST['Tb_index']];
      $pdo->update('credit_card_eq', $param, $where);

      $pdo->update('credit_card_eq', ['EndDate'=>date('Y-m-d',strtotime($_POST['StartDate']))], ['Tb_index'=>$row_card_eq['Tb_index']]);
      echo $_POST['Tb_index'];
    }
  }

 	

 	
 }
?>