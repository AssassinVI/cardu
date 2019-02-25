<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';
 require '../../core/inc/pdo_fun_calss.php';

  if ($_POST) {

 	$pdo=new PDO_fun;
   

    //-- 搜尋 --
 	if (isset($_POST['st_name'])) {


 		//-- 商店類別 --
 		$st_type_arr=[];
 		$st_type_row=pdo_select('SELECT Tb_index, st_name FROM store_type', 'no');
 		foreach ($st_type_row as $st_type_one) {
 			$st_type_arr[$st_type_one['Tb_index']]=$st_type_one['st_name'];
 		}

 		//-- 主分類 --
 		$st_main_type_arr=[];
 		$st_main_type_row=pdo_select('SELECT Tb_index, st_name FROM store_type_main', 'no');
 		foreach ($st_main_type_row as $st_main_type_one) {
 			$st_main_type_arr[$st_main_type_one['Tb_index']]=$st_main_type_one['st_name'];
 		}

 		//-- 次分類 --
 		$st_second_type_arr=[];
 		$st_second_type_row=pdo_select('SELECT Tb_index, st_name FROM store_type_second', 'no');
 		foreach ($st_second_type_row as $st_second_type_one) {
 			$st_second_type_arr[$st_second_type_one['Tb_index']]=$st_second_type_one['st_name'];
 		}

 		//-- 關鍵字 --
 		  $keyWord_txt='';
 		  $keyWord=strpos($_POST['st_keyWord'], ',')!=FALSE ? explode(',', $_POST['st_keyWord']) : explode(' ', $_POST['st_keyWord']);
 		  foreach ($keyWord as $keyWord_one) {
 		  	$keyWord_txt.=" concat(st_nickname,st_url,st_phone,st_ser_phone,st_adds,st_label,st_intro) LIKE '%".$keyWord_one."%' AND ";
 		  }

 		  $keyWord_txt=' AND ('.substr($keyWord_txt, 0,-4).') ';

 		   //-- 分頁判斷數 --
 		   $num=$_POST['page_num'];
 		   //--- 頁數 ---
 		   $page=empty($_POST['page'])? 0:((int)$_POST['page']-1)*$num;

 		   $where=[
 		   	'st_type'=>'%'.$_POST['st_type'].'%', 
 		   	'st_main_type'=>'%'.$_POST['st_main_type'].'%', 
 		   	'st_second_type'=>'%'.$_POST['st_second_type'].'%', 
 		   	'st_name'=>'%'.$_POST['st_name'].'%'
 		   ];

 		   //----------- 撈分頁數 -----------------
 		   if (isset($_POST['type']) && $_POST['type']=='page') {

 		   	 $row_search=$pdo->select("SELECT COUNT(*) as num
 		   	                   FROM store
 		   	                   WHERE st_type LIKE :st_type AND 
 		   	                         st_main_type LIKE :st_main_type AND 
 		   	                         st_second_type LIKE :st_second_type AND 
 		   	                         st_name LIKE :st_name
 		   	                         ".$keyWord_txt." ORDER BY OrderBy ASC, StartDate DESC " , $where,'one');
 		   	  echo $row_search['num'];
 		   }

 		   //----------- 撈資料 -----------------
 		   else{

 		   	 $row_search=$pdo->select("SELECT * 
 		   	 	                   FROM store
 		   	 	                   WHERE st_type LIKE :st_type AND 
 		   	 	                         st_main_type LIKE :st_main_type AND 
 		   	 	                         st_second_type LIKE :st_second_type AND 
 		   	 	                         st_name LIKE :st_name
 		   	 	                         ".$keyWord_txt." ORDER BY OrderBy ASC, StartDate DESC LIMIT ".$page.",".$num , $where);
 		   	 $row_search_num=count($row_search);
 		     for ($i=0; $i < $row_search_num ; $i++) { 
 		   	 $row_search[$i]['st_type']=$st_type_arr[$row_search[$i]['st_type']];
 		   	 $row_search[$i]['st_main_type']=empty($st_main_type_arr[$row_search[$i]['st_main_type']]) ? '': $st_main_type_arr[$row_search[$i]['st_main_type']];
 		   	 $row_search[$i]['st_second_type']=empty($st_second_type_arr[$row_search[$i]['st_second_type']]) ? '': $st_second_type_arr[$row_search[$i]['st_second_type']] ;
 		   	 $row_search[$i]['OnLineOrNot']=empty($row_search[$i]['OnLineOrNot']) ? '關閉':'啟用';
 		     }

             echo json_encode($row_search);
 		   }

 	}

 	//-- 選擇商店類別 --
 	elseif (isset($_POST['st_type'])) {
       
       //-- 集點店家 其他 --
 	   if ($_POST['st_type']=='st2019013117015133' || $_POST['st_type']=='st201901311701582') {
 	    	$row_st_main_type= $pdo->select("SELECT Tb_index, st_name FROM store_type_main WHERE mt_id=:mt_id ORDER BY OrderBy ASC", ['mt_id'=>$_POST['st_type']]);
 		    echo json_encode($row_st_main_type);
 	   }
 	   else{
           $row_st_type= $pdo->select("SELECT Tb_index, st_name FROM store WHERE st_type=:st_type ORDER BY OrderBy ASC", ['st_type'=>$_POST['st_type']]);
           echo json_encode($row_st_type);
 	   }
 		
 	}
    
    //-- 選擇主分類 --
 	elseif(isset($_POST['st_main_type'])){
          	$row_st_second_type= $pdo->select("SELECT Tb_index, st_name FROM store_type_second WHERE mt_id=:mt_id ORDER BY OrderBy ASC", ['mt_id'=>$_POST['st_main_type']]);
      	    echo json_encode($row_st_second_type);
 	}

 	//-- 選擇次分類 --
 	elseif(isset($_POST['st_second_type'])){
            $row_st_name= $pdo->select("SELECT Tb_index, st_name FROM store WHERE st_second_type=:st_second_type ORDER BY OrderBy ASC", ['st_second_type'=>$_POST['st_second_type']]);
      	    echo json_encode($row_st_name);
 	}


 	
 }
?>