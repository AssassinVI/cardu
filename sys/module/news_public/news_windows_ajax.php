<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';
 require '../../core/inc/pdo_fun_calss.php';

  if ($_POST && isset($_POST['type'])) {

 	$pdo=new PDO_fun;
   
  //--------------------------------- 版區 -----------------------------------------
  if ($_POST['type']=='area') {
    $row_type=$pdo->select("SELECT * FROM news_type WHERE area_id=:area_id AND nt_sp=0 ORDER BY OrderBy ASC", ['area_id'=>$_POST['area_id']]);
    echo json_encode($row_type);
  }

  //------------------------------ 新聞搜尋 -----------------------------------------
  elseif($_POST['type']=='search'){

  	//-- 版區 --
  	$area_id=$_POST['area_id'];

    //-- 主分類(名稱) --
    $ns_nt_pk_arr=[];
    //-- 版區 主分類 --
    $area_ns_nt_pk=[];
    $ns_nt_pk=pdo_select("SELECT Tb_index, nt_name FROM news_type WHERE area_id = :area_id", ['area_id'=>$_POST['area_id']]);
    foreach ($ns_nt_pk as $ns_nt_pk_one) {
      $ns_nt_pk_arr[$ns_nt_pk_one['Tb_index']]=$ns_nt_pk_one['nt_name'];
      array_push($area_ns_nt_pk, '\''.$ns_nt_pk_one['Tb_index'].'\'');
    }

    //-- 分頁判斷數 --
    $num=$_POST['page_num'];
    //--- 頁數 ---
    $page=empty($_POST['page'])? 0:((int)$_POST['page']-1)*$num;

    //-- 關鍵字 --
      $keyWord_txt='';
      $keyWord=strpos($_POST['ns_keyWord'], ',')!=FALSE ? explode(',', $_POST['ns_keyWord']) : explode(' ', $_POST['ns_keyWord']);
      foreach ($keyWord as $keyWord_one) {
        $keyWord_txt.=" concat(ns_ftitle, ns_stitle, ns_msghtml, ns_label) LIKE '%".$keyWord_one."%' AND ";
      }

    $keyWord_txt=' AND ('.substr($keyWord_txt, 0,-4).') ';

    //-- 有選主分類 --
    if (!empty($_POST['ns_nt_pk'])) {

      $sql_query="SELECT n.ns_nt_pk, n.ns_ftitle, n.ns_viewcount, n.ns_date, n.ns_reporter, n.Tb_index, a.at_name, n.nt_name, n.ns_viewcount, n.ns_vfdate
                  FROM NewsAndType as n 
                  LEFT JOIN appArea as a ON a.Tb_index=n.area_id 
                  WHERE n.ns_nt_pk = :ns_nt_pk ".$keyWord_txt." AND n.ns_verify=3
                  ORDER BY n.ns_date DESC 
                  LIMIT ".$page.",".$num;
      
      $row=$pdo->select($sql_query, ['ns_nt_pk'=>$_POST['ns_nt_pk']]);
    }
    //-- 版區 全部主分類 --
    else{

      $area_ns_nt_pk=implode(',', $area_ns_nt_pk);

      $sql_query="SELECT n.ns_nt_pk, n.ns_ftitle, n.ns_viewcount, n.ns_date, n.ns_reporter, n.Tb_index, a.at_name, n.nt_name, n.ns_viewcount, n.ns_vfdate
                FROM NewsAndType as n 
                LEFT JOIN appArea as a ON a.Tb_index=n.area_id 
                WHERE n.ns_nt_pk IN (".$area_ns_nt_pk.") ".$keyWord_txt." AND n.ns_verify=3
                ORDER BY n.ns_date DESC 
                LIMIT ".$page.",".$num;

      $row=$pdo->select($sql_query);
    }
    
    
    //-- 主分類(轉中文) --
    $row_num=count($row);
    for ($i=0; $i <$row_num ; $i++) { 
      $row[$i]['ns_nt_pk']=$ns_nt_pk_arr[$row[$i]['ns_nt_pk']];
    }

    echo json_encode($row);
  }


  //------------------------------ 輸入標題網址 -----------------------------------------
  elseif($_POST['type']=='news_extends'){
    $Tb_index='news_ex'.date('YmdHis').rand(0,99);
    $param=[
      'Tb_index'=>$Tb_index,
      'ne_ns_pk_ext_ftitle'=>$_POST['ne_ns_pk_ext_ftitle'],
      'ne_ns_pk_ext_url'=>$_POST['ne_ns_pk_ext_url']
    ];
    $pdo->insert('news_extends_custom', $param);
    echo $Tb_index;
  }


  
  //------------------------------ 頁數 -----------------------------------------
  elseif($_POST['type']=='page'){

    //-- 分頁判斷數 --
    // $num=$_POST['page_num'];
    // //--- 頁數 ---
    // $page=empty($_POST['page'])? 0:((int)$_POST['page']-1)*$num;

    //-- 版區 --
  	$area_id=$_POST['area_id'];
    
    //-- 版區 主分類 --
    $area_ns_nt_pk=[];
  	$ns_nt_pk=pdo_select("SELECT Tb_index, nt_name FROM news_type WHERE area_id = :area_id", ['area_id'=>$_POST['area_id']]);
    foreach ($ns_nt_pk as $ns_nt_pk_one) {
      array_push($area_ns_nt_pk, '\''.$ns_nt_pk_one['Tb_index'].'\'');
    }

    //-- 關鍵字 --
      $keyWord_txt='';
      $keyWord=strpos($_POST['ns_keyWord'], ',')!=FALSE ? explode(',', $_POST['ns_keyWord']) : explode(' ', $_POST['ns_keyWord']);
      foreach ($keyWord as $keyWord_one) {
        $keyWord_txt.=" concat(ns_ftitle, ns_stitle, ns_msghtml, ns_label) LIKE '%".$keyWord_one."%' AND ";
      }

      $keyWord_txt=' AND ('.substr($keyWord_txt, 0,-4).') ';

    //-- 有選主分類 --
    if (!empty($_POST['ns_nt_pk'])){

     $sql_query="SELECT count(*) as total
                 FROM appNews 
                 WHERE ns_nt_pk = :ns_nt_pk ".$keyWord_txt;
     
     $row=$pdo->select($sql_query, ['ns_nt_pk'=>$_POST['ns_nt_pk']],'one');
    }
    //-- 版區 全部主分類 --
    else{

    $area_ns_nt_pk=implode(',', $area_ns_nt_pk);

    $sql_query="SELECT count(*) as total
                FROM appNews 
                WHERE ns_nt_pk IN (".$area_ns_nt_pk.") ".$keyWord_txt;
    
    $row=$pdo->select($sql_query, 'no','one');
    }


    echo $row['total'];
  }

 }
?>