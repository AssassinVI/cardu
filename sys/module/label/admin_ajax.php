<?php
  require '../../core/inc/config.php';
  require '../../core/inc/function.php';
  if ($_POST) {

  	//-- 新增 --
  	if (!empty($_POST['lb_name'])) {
  		
  		$is_lb_mane= pdo_select("SELECT COUNT(*) as total FROM search_label WHERE lb_name=:lb_name", ['lb_name'=>$_POST['lb_name']]);

  		if ($is_lb_mane['total']<1) {
  			 
  			 $param=[
              'Tb_index'=>'label'.date('YmdHis').rand(0,99),
              'lb_name'=>$_POST['lb_name']
              ];
  			pdo_insert('search_label', $param);
  			echo "1";
  		}
  		else{
  			echo "您已重複加入";
  		}
  	}
    
    //-- 刪除 --
  	elseif(!empty($_POST['del_name'])){
      pdo_delete('search_label', ['lb_name'=>$_POST['del_name']]);
  	}

  	//-- 搜尋 --
  	elseif(isset($_POST['search_name'])){

  	  $pdo=pdo_conn();
  	  $sql=$pdo->prepare("SELECT lb_name FROM search_label WHERE lb_name LIKE :lb_name ORDER BY lb_name ASC");
      $sql->execute(['lb_name'=>'%'.$_POST['search_name'].'%']);
      $data=$sql->fetchAll(PDO::FETCH_ASSOC);
       echo json_encode($data);
  	}
  }
?>