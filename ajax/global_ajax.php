<?php 
require '../sys/core/inc/config.php';
require '../sys/core/inc/function.php';
require '../sys/core/inc/pdo_fun_calss.php';
//-- 前台特殊用 --
require '../share_area/func.php';

if ($_POST) {
 
 $pdo=new PDO_fun;
	
	switch ($_POST['type']) {

	//-------------------------- 立即辦卡+1 ---------------------------
	case 'apply_card':
     $pdo->select("UPDATE credit_cardrank SET ccs_cc_assigncount=ccs_cc_assigncount+1 WHERE ccs_cc_pk=:ccs_cc_pk AND ccs_cc_so_pk=:ccs_cc_so_pk", ['ccs_cc_pk'=>$_POST['cc_id'], 'ccs_cc_so_pk'=>$_POST['ccrank_type']]);
     
     $row_one_date=$pdo->select("SELECT COUNT(*) as total FROM credit_cardrank_count WHERE ccr_id=:ccr_id AND ccr_date=:ccr_date", ['ccr_id'=>$_POST['ccrank_type'], 'ccr_date'=>date('Y-m-d')], 'one');
     if ($row_one_date['total']>0) {
     	$pdo->select("UPDATE credit_cardrank_count SET assigncount=assigncount+1 WHERE ccr_id=:ccr_id AND ccr_date=:ccr_date", ['ccr_id'=>$_POST['ccrank_type'], 'ccr_date'=>date('Y-m-d')]);
     }
     else{
     	$param=[
          'Tb_index'=>'ccro'.date('YmdHis').rand(0,99),
          'ccr_id'=>$_POST['ccrank_type'],
          'ccr_date'=>date('Y-m-d'),
          'assigncount'=>1,
          'create_time'=>date('Y-m-d H:i:s')
     	];
     	$pdo->insert('credit_cardrank_count', $param);
     }
	break;




     //-------------------------- 集點商家 主分類 ------------------------------
     case 'sm_type':
      
      $row_sm_type=$pdo->select("SELECT Tb_index, st_name FROM store_type_main WHERE mt_id='st2019013117015133' ORDER BY OrderBy");
      foreach ($row_sm_type as $sm_type) {
        echo '<option value="'.$sm_type['Tb_index'].'">'.$sm_type['st_name'].'</option>';
      }
	break;




     //-------------------------- 集點商家 次分類 ------------------------------
     case 'ss_type':
      
      $row_sm_type=$pdo->select("SELECT Tb_index, st_name FROM store_type_second WHERE mt_id=:mt_id ORDER BY OrderBy", ['mt_id'=>$_POST['sm_type_id']]);
      foreach ($row_sm_type as $sm_type) {
        echo '<option value="'.$sm_type['Tb_index'].'">'.$sm_type['st_name'].'</option>';
      }
     break;




     //-------------------------- 集點商家 ------------------------------
     case 'store':
      
      $where=[];
      //-- 主分類 --
      if (!empty($_POST['sm_type_id'])) {
        $sm_type_sql=' AND st_main_type=:st_main_type ';
        $where['st_main_type']=$_POST['sm_type_id'];
      }
      else{
        $sm_type_sql='';  
      }
      
      //-- 次分類 --
      if (!empty($_POST['ss_type_id'])) {
        $ss_type_sql=' AND st_second_type=:st_second_type ';
        $where['st_second_type']=$_POST['ss_type_id'];
      }
      else{
        $ss_type_sql='';  
      }
      

      //----- 商店 -----
      $row_pay=$pdo->select("SELECT * 
                             FROM store 
                             where st_type='st2019013117015133' and OnLineOrNot=1 $sm_type_sql $ss_type_sql
                             order by st_name", $where);
      $row_pay_num=count($row_pay);
      for ($i=0; $i <$row_pay_num ; $i++) { 

          $row_pay_one=$row_pay[$j];

          $Tb_index=$row_pay[$i]['Tb_index'];
          $st_name=$row_pay[$i]['st_name'];
          $st_logo=$row_pay[$i]['st_logo'];
          $st_url=$row_pay[$i]['st_url'];

          echo "<div class='col-md-6 col-6 mb-3 ticketbg '>
                        <div class='cardshap move_3 hv-center'>

                         <div>
                          <a class='all_form' href='about2.php?".$Tb_index."' title='".$st_name."'>
                           <img src='../sys/img/".$st_logo."'>
                           <hr>
                           <h4>".$st_name."</h4>
                         </a>
                          <div class='card_btn  hv-center' style='display:none !important;'>
                          <a class='all_form' href='about2.php?".$Tb_index."' title='".$st_name."'>
                            <button type='button' class='btn warning-layered btnOver'>詳細介紹</button>
                          </a>
                          <a class='all_form' href='".$st_url."' title='".$st_name."'>
                            <button type='button' class='btn gray-layered btnOver'>前往官網</button>
                          </a>
                          </div>
                         </div>

                        </div>
                    </div>";
        
      

        //-- 手機廣告 --
        if (wp_is_mobile()) {
          if (($i+1)%4==0) {
            echo '
            <div class="col-md-12 row">
            <div class="col-md-6 mb-3 banner d-md-none d-sm-block ">
                <img src="https://placehold.it/900x300" alt="">
            </div>
            </div>';
          }
        }
        //-- 電腦廣告 --
        else{
          if (($i+1)%4==0 && (($i+1)/4)%2==1 ) {
            echo '<div class="col-md-12 mb-3 banner phone_hidden"><div class="test"><img src="https://placehold.it/750x100" alt="banner"></div></div>';
          }
          elseif(($i+1)%4==0 && (($i+1)/4)%2==0){
            echo '<div class="col-md-12 row phone_hidden">
                     <div class="col-md-6 mb-3 banner ">
                         <img src="https://placehold.it/365x100" alt="">
                     </div>
                     <div class="col-md-6 mb-3 banner">
                         <img src="https://placehold.it/365x100">
                     </div>
                 </div>';
          }
        }
      }
     break;


	default:
		# code...
	break;
  }
}
?>