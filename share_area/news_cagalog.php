<?php 
//=============================================
//代入頁籤主單元mt_id以load出該單元頁籤
//代入內容主單元mt_id以避免錯誤
//代入要查詢的欄位queryfield
//代入標籤顏色blueGreen_tab or pink_tab...等等
//=============================================
//取出特別議題頁籤
//=============================================
  $sql_special=$pdo_OLD->prepare($sqltemp);
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
  $nt_pk = $row_special['pk'];

                     //跑回圈將每個tab中資料內容都load出＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
                      $sql_part=$pdo_OLD->prepare("
                      SELECT ns_ftitle,ns_photo_1,ns_msghtml,Tb_index FROM  appNews
                      where (ns_nt_pk='$Tb_index' OR ns_nt_ot_pk LIKE '%$Tb_index%')
                      and ns_verify=3 and OnLineOrNot=1
                      and  StartDate<='$todayis' and EndDate>='$todayis'
                      order by ns_vfdate desc
                      LIMIT 0, 6");
                  

                    $sql_part->execute();

                    //取出 6筆資料
                    $z=1; while ($row_part=$sql_part->fetch(PDO::FETCH_ASSOC)) {
                              //echo "中文：".$row_part['ns_ftitle'];
                              $id_arr[$z]=$row_part['Tb_index'];
                              $ns_ftitle_arr[$z]=$row_part['ns_ftitle'];
                              $ns_msghtml_arr[$z]=$row_part['ns_msghtml'];
                              $ns_photo_1_arr[$z]="../sys/img/".$row_part['ns_photo_1'];
                    $z++; } //end tab中內容


                    //內容區
                    //載入樣版，並將上述內容套入樣版（同樣內容，但不同樣式）
                    include('../share_area/'.$list_template);

                    //-- 廣告 --
                    if ($i%2==0 && $i!=$sql_special->rowCount()) {
                      
                      echo '
                      <div class="col-md-12 row">
                        <div class="col-md-6 col banner">
                            <img src="http://placehold.it/900x300" alt="">
                        </div>
                      </div>';
                    }
                    
                    
                    //清空暫存
                    $id_arr=null;
                    $ns_ftitle_arr=null;
                    $ns_msghtml_arr=null;
                    $ns_photo_1_arr=null;


$i++;}//end tab標籤來個回圈
$sqltemp=null?>