<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';
 require '../../core/inc/pdo_fun_calss.php';

 if ($_POST && $_POST['type']=='news_extend') {
    $pdo=new PDO_fun;
 	$news_arr=explode(',', $_POST['news_arr']);
 	$news_arr_sql='';
 	$x=0;
    foreach ($news_arr as $news_one) {
       //$news_arr_sql.="'".$news_one."',";

        
        if (strpos($news_one, '_ex')===FALSE) {
              $row[$x]=$pdo->select("SELECT n.nt_name, a.at_name, n.ns_ftitle, n.ns_viewcount, n.ns_vfdate, n.mt_id, n.ns_nt_pk, n.Tb_index, n.area_id
                           FROM NewsAndType as n 
                           LEFT JOIN appArea as a ON a.Tb_index=n.area_id
                           WHERE n.Tb_index =:Tb_index ", ['Tb_index'=>$news_one], 'one');
              $at_name=empty($row[$x]['at_name']) ? '新聞':$row[$x]['at_name'];
              $url='newsView_windows.php?Tb_index='.$row[$x]['Tb_index'];
              $row[$x]['main_type']=$at_name.'-'.$row[$x]['nt_name'];
              $row[$x]['url']=$url;
        }
        else{
            $row[$x]=$pdo->select("SELECT Tb_index, ne_ns_pk_ext_ftitle, ne_ns_pk_ext_url FROM news_extends_custom WHERE Tb_index=:Tb_index", ['Tb_index'=>$news_one], 'one');
            $row[$x]['main_type']='自訂';
            $row[$x]['url']=$row[$x]['ne_ns_pk_ext_url'];
            $row[$x]['ns_ftitle']=$row[$x]['ne_ns_pk_ext_ftitle'];
            $row[$x]['ns_viewcount']='';
            $row[$x]['ns_vfdate']='';
        }
      
       
      $x++;
    }

    echo json_encode($row);
 }
?>