<?php 
//=============================================
//代入頁籤主單元mt_id以load出該單元頁籤
//代入內容主單元mt_id以避免錯誤
//代入要查詢的欄位queryfield
//代入標籤顏色blueGreen_tab or pink_tab...等等
//=============================================
//取出特別議題頁籤
//=============================================

  $sql_special=$pdo_OLD->prepare("
    SELECT nt_name,Tb_index,pk FROM news_type
    where $queryfield='$tab_mtid' and nt_sp=1 
    and nt_sp_begin_date <= '$todayis' and nt_sp_end_date >= '$todayis' 
    and OnLineOrNot=1
    order by OrderBy  
    LIMIT 0, 2");
  $sql_special->execute();
  $row_specials = $sql_special->fetchAll();


  //tab標籤來個回圈＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
  $i=1;
  foreach ($row_specials as $row_special) {
    if($i==1){
        $activeornot="active";
      }else{
        $activeornot="";
      }
  $Tb_index = $row_special['Tb_index'];
  $nt_name = $row_special['nt_name'];
  $nt_pk = empty($row_special['pk']) ? $row_special['Tb_index'] : $row_special['pk'];

                     //跑回圈將每個tab中內容都load出＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
                      $sql_part=$pdo_OLD->prepare("
                      SELECT ns_ftitle,ns_photo_1,ns_msghtml,Tb_index FROM  appNews
                      where (ns_nt_sp_pk='$Tb_index' OR ns_nt_ot_pk LIKE '%$Tb_index%')
                      and ns_verify=3 and OnLineOrNot=1
                      and  StartDate<='$todayis' and EndDate>='$todayis'
                      order by ns_vfdate desc
                      LIMIT 0, 6");
                  

                    $sql_part->execute();

                    //取出 6筆資料
                    $z=1; while ($row_part=$sql_part->fetch(PDO::FETCH_ASSOC)) {
                              //echo "中文：".$row_part['ns_ftitle'];
                              $id_arr[$z]=$row_part['Tb_index'];
                              $ns_ftitle_arr[$z]=mb_substr($row_part['ns_ftitle'], 0,15,'utf-8') ;
                              $ns_msghtml_arr[$z]=$row_part['ns_msghtml'];
                              $ns_photo_1_arr[$z]="../sys/img/".$row_part['ns_photo_1'];
                    $z++; } //end tab中內容


                    //內容區
                    //載入樣版，並將上述內容套入樣版（同樣內容，但不同樣式）
                    if($i==2){
                      include('../share_area/news_area_type2.php');
                    }else{
                      include('../share_area/news_area_type1.php');
                    }

                    
                    //內容區end


$i++;}//end tab標籤來個回圈
$is_sp=NULL;
?>