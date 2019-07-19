<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';
 require '../../core/inc/pdo_fun_calss.php';
 require '../../../share_area/func.php';

 if ($_POST) {
  
    $pdo=new PDO_fun;

    if ($_POST['type']=='fast_sort') {
    
    if ((int)$_POST['ch_sort']<(int)$_POST['ch_new_sort']) {
      $pdo->select('UPDATE appNews 
                    SET ns_nt_pk_sort=ns_nt_pk_sort-1 
                    WHERE ns_nt_pk=:ns_nt_pk AND ns_verify=3 AND ns_nt_pk_sort>:ch_sort AND ns_nt_pk_sort<=:ch_new_sort',
                    ['ns_nt_pk'=>$_POST['ns_nt_pk'], 'ch_sort'=>$_POST['ch_sort'], 'ch_new_sort'=>$_POST['ch_new_sort']]);
    }
    else{
      $pdo->select('UPDATE appNews 
                  SET ns_nt_pk_sort=ns_nt_pk_sort+1 
                  WHERE ns_nt_pk=:ns_nt_pk AND ns_verify=3 AND ns_nt_pk_sort<:ch_sort AND ns_nt_pk_sort>=:ch_new_sort',
                  ['ns_nt_pk'=>$_POST['ns_nt_pk'], 'ch_sort'=>$_POST['ch_sort'], 'ch_new_sort'=>$_POST['ch_new_sort']]);
    }
    

    $pdo->update('appNews', ['ns_nt_pk_sort'=>$_POST['ch_new_sort']], ['Tb_index'=>$_POST['ch_Tb_index']]);

    }
    elseif ($_POST['type']=='sort') {
      
      //-- 更新排序 --
      $Tb_index_count=count($_POST['Tb_index']);
      for ($i=0; $i <$Tb_index_count ; $i++) { 
        $param=[
         'ns_sort'=>($i+1),
         'ns_nt_pk_sort'=>($i+1)
        ];
        $pdo->update('appNews', $param, ['Tb_index'=>$_POST['Tb_index'][$i]]);
      }
    }

 }
?>