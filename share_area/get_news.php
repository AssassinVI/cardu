<?php 

//===================================
//function去除所有的空白
//===================================

function myTrim($str)
{
$search = array(" ","　","\n","\r","\t");
$replace = array("","","","","");
return str_replace($search, $replace, $str);
}


//＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
//回圈跑出資料 (((3+3資料格)))
//$Tb_index          分類id :例如～專題 或 特別議題 之類的
//$todayis           查詢日期:一般頁面預設是抓今天，記得要在頁面指定$todayis=date("Y-m-d");
//mt_id              主分類 :單元，例如新聞，或優情報 
//$y                 在此區下的頁籤序號:例如：專題＝1,卡訊=2,行動pay=3,是由系統回圈自動產生的，目前僅做為標示目前在第幾標籤用，尚無實質用途
//spacialornot       是否為特殊議題:如果是特別議題=1，就查ns_nt_sp_pk,否則就查一般分類編號ns_nt_pk
//＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
function getNews($Tb_index,$todayis,$mt_id,$activeornot,$y,$spacialornot,$mt_id_name='mt_id')
{ 
  if ($spacialornot==1){
    $getcolumn="ns_nt_sp_pk";

  }else{
    $getcolumn="ns_nt_pk";
  }

    //依主題取出對映的列表＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
    //1.設定主單元編號 及 文章編號
    //2.ns_verify=3 才能算上架中
    //3.需在公開時間之內
    //4.以審稿日期為主排序
    //＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
    $pdo=pdo_conn();
    $sql_part=$pdo->prepare("
      SELECT ns_ftitle,ns_photo_1,ns_msghtml,Tb_index FROM  appNews
      where $mt_id_name = '$mt_id' and $getcolumn='$Tb_index' 
      and  StartDate<='$todayis' and EndDate>='$todayis'
      and ns_verify=3
      order by ns_vfdate desc
      LIMIT 0, 6
   
      ");

    $sql_part->execute();




    //分批取出part1---------
    $i=1; while ($row_part=$sql_part->fetch(PDO::FETCH_ASSOC)) {

      $id=$row_part['Tb_index'];
      $ns_ftitle=$row_part['ns_ftitle'];
      $ns_msghtml=$row_part['ns_msghtml'];
      $ns_photo_1="../sys/img/".$row_part['ns_photo_1'];

      $part1.="
      <div class='col-4 cards-3'>
             <a href='detail.php?$id'>
             <div class='img_div' title='$ns_ftitle' style='background-image: url($ns_photo_1);'>
             </div>
             <p>$ns_ftitle</p>
         </a>
      </div>
      ";

    if ( $i==3 ) break;
    $i++; } //end part1

    //分批取出part2---------
    $i=1; while ($row_part=$sql_part->fetch(PDO::FETCH_ASSOC)) {

      $id=$row_part['Tb_index'];
      $ns_ftitle=$row_part['ns_ftitle'];
      $ns_msghtml=$row_part['ns_msghtml'];
      $ns_photo_1="../sys/img/".$row_part['ns_photo_1'];

      $part2.="
      <div class='col-4 cards-3'>
             <a href='detail.php?$id'>
             <div class='img_div' title='$ns_ftitle' style='background-image: url($ns_photo_1);'>
             </div>
             <p>$ns_ftitle</p>
         </a>
      </div>
      ";

      if ( $i==3 ) break;
    $i++; } //end part2


    return "<div class=\"tab-pane fade show $activeornot\" id=\"special_$Tb_index\" role=\"tabpanel\" aria-labelledby=\"special_$Tb_index-tab\">

      <div class=\"swiper-container sub_slide\">
              <div class=\"swiper-wrapper\">
                <div class=\"swiper-slide\" > 
                  <div class=\"row no-gutters\">

                    $part1
              

                </div>
              </div>

              <div class=\"swiper-slide\" > 
                  <div class=\"row no-gutters\">

                    $part2


                </div>
              </div>

            </div>
            <!-- 如果需要导航按钮 -->
            <div class=\"swiper-button-prev\"><i class=\" fa fa-angle-left\"></i></div>
            <div class=\"swiper-button-next\"><i class=\" fa fa-angle-right\"></i></div>
      </div>
      </div>";

$part1="";
$part2="";

$pdo=NULL;


}//end function:::::::::::::::::::::::::::::::::::
                          ?>