<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';
 require '../../core/inc/pdo_fun_calss.php';

 if ($_POST) {

 	$pdo=new PDO_fun;
    
  //----------------------------------------------------------------------- 撈卡排行 ----------------------------------------------------------------
  if ($_POST['type']=='show_rank') {
 	
 	//-- 判斷項目2、3是否排序 --
 	$check_order=pdo_select("SELECT cc_so_type_02_order, cc_so_type_03_order FROM credit_cardrank_type WHERE Tb_index=:Tb_index", ['Tb_index'=>$_POST['ccs_cc_so_pk']]);

 	//-- 判斷目前排序項目 --
 	switch ($_POST['rank_item']) {
 		case '1':
 		  $ccs_order='ccs_order';
 		break;
 		case '2':
 		  $ccs_order='ccs_order2';
 		break;
 		case '3':
 		  $ccs_order='ccs_order3';
 		break;
 	}

    $row=$pdo->select("SELECT * FROM credit_cardrank WHERE ccs_cc_so_pk=:ccs_cc_so_pk ORDER BY ".$ccs_order." ASC", ['ccs_cc_so_pk'=>$_POST['ccs_cc_so_pk']]);
    $row_num=count($row);
    for ($i=0; $i <$row_num ; $i++) { 
      $row[$i]['ccs_order2']=$check_order['cc_so_type_02_order']==0 ? '<span class="text-muted">不排序</span>':$row[$i]['ccs_order2'];
      $row[$i]['ccs_order3']=$check_order['cc_so_type_03_order']==0 ? '<span class="text-muted">不排序</span>':$row[$i]['ccs_order3'];
    }
    
    echo json_encode($row);
  }





  //------------------------------------------------------------------------ 撈卡排行分類 -------------------------------------------------------------------
  elseif($_POST['type']=='show_rank_type'){
    $row=$pdo->select("SELECT Tb_index, cc_so_cname, cc_so_type_01_cname, cc_so_type_02_cname, cc_so_type_03_cname, cc_so_type_02_order, cc_so_type_03_order 
    	               FROM credit_cardrank_type 
    	               WHERE Tb_index=:Tb_index", ['Tb_index'=>$_POST['Tb_index']],'one');
    echo json_encode($row);
  }





  //---------------------------------------------------------------- 更新排序 ---------------------------------------------------
  elseif($_POST['type']=='update_rank'){
    
     // -- 更新排序 --
    for ($i=0; $i <count($_POST['Tb_index']) ; $i++) { 

     switch ($_POST['rank_item']) {
     	case '1':
     	$data=["ccs_order"=>($i+1)];
     	break;
     	case '2':
     	$data=["ccs_order2"=>($i+1)];
     	break;
     	case '3':
     	$data=["ccs_order3"=>($i+1)];
     	break;
     }
      
      $where=["Tb_index"=>$_POST['Tb_index'][$i]];
      $pdo->update('credit_cardrank', $data, $where);
      
    }
  }



  //---------------------------------------------------------- 更新快速排序 -------------------------------------------------
  elseif($_POST['type']=='update_fast_rank'){

  	switch ($_POST['rank_item']) {
     	case '1':
     	$data1=["ccs_order"=>$_POST['rank_sort2']];
     	$data2=["ccs_order"=>$_POST['rank_sort1']];
     	break;
     	case '2':
     	$data1=["ccs_order2"=>$_POST['rank_sort2']];
     	$data2=["ccs_order2"=>$_POST['rank_sort1']];
     	break;
     	case '3':
     	$data1=["ccs_order3"=>$_POST['rank_sort2']];
     	$data2=["ccs_order3"=>$_POST['rank_sort1']];
     	break;
     }
    
    $where1=["Tb_index"=>$_POST['Tb_index1']];
    $pdo->update('credit_cardrank', $data1, $where1);

    $where2=["Tb_index"=>$_POST['Tb_index2']];
    $pdo->update('credit_cardrank', $data2, $where2);
  }



  //-------------------------------------------------- 刪除卡排行 ---------------------------------------------------
  elseif($_POST['type']=='del_rank'){
    $where=["Tb_index"=>$_POST['Tb_index']];
    $pdo->delete('credit_cardrank', $where);
  }

 }
?>