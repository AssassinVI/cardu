<?php 
include("../../core/page/header01.php");//載入頁面heaer01
include("../../core/page/header02.php");//載入頁面heaer02
?>
<?php

 $pdo=pdo_conn();
  if ($_POST) { //新增、修改
    
     if (empty($_POST['Tb_index'])) {

       $param=array("Tb_index"=>'admin'.date('YmdHis').rand(0,99), 
                   "admin_per"=>$_POST['admin_per'], 
                    "admin_id"=>$_POST['admin_id'], 
                   "admin_pwd"=>aes_encrypt($aes_key, $_POST['admin_pwd']), 
                  "build_time"=>date('Y-m-d H:i:s'), 
                        "name"=>$_POST['name'], 
                        "email"=>$_POST['email'], 
                      "is_use"=>$_POST['is_use']=='1' ? '1':'0' );

       pdo_insert('sysAdmin', $param);//新增方法

     }
     else{

      if (empty($_POST['admin_pwd'])) {
       $param=array( "admin_per"=>$_POST['admin_per'], 
                    "admin_id"=>$_POST['admin_id'], 
                  "build_time"=>date('Y-m-d H:i:s'), 
                        "name"=>$_POST['name'], 
                       "email"=>$_POST['email'],  
                      "is_use"=>$_POST['is_use'] 
                  );
        $where=array('Tb_index'=>$_POST['Tb_index']);

        pdo_update('sysAdmin', $param, $where);//更新方法
      }
      else{
        $param=array( "admin_per"=>$_POST['admin_per'], 
                    "admin_id"=>$_POST['admin_id'], 
                   "admin_pwd"=>aes_encrypt($aes_key, $_POST['admin_pwd']), 
                  "build_time"=>date('Y-m-d H:i:s'), 
                        "name"=>$_POST['name'], 
                       "email"=>$_POST['email'], 
                      "is_use"=>$_POST['is_use'] 
                  );
       $where=array('Tb_index'=>$_POST['Tb_index']);

       pdo_update('sysAdmin', $param, $where);//更新方法
      }

     

     }
  }
  elseif ($_GET) {
    
    $Tb_index=$_GET['Tb_index'];
    
    $sql=$pdo->prepare("SELECT * FROM sysAdmin WHERE Tb_index=:Tb_index");
    $sql->execute(array(":Tb_index"=>$Tb_index));
    $row=$sql->fetch(PDO::FETCH_ASSOC);
    $zipcode=substr($row['adds'], 0,3);
    $adds=explode(',', $row['adds']);
  }
?>


<div class="wrapper wrapper-content animated fadeInRight">
  <div class="col-lg-12">
    <h2 class="text-primary">管理者 編輯</h2>
  </div>
  <div class="row">
    <div class="col-lg-9">
      <div class="panel panel-default">
        <div class="panel-body">
          <form class="form-horizontal">
            <div class="form-group">
              <label class="col-md-1 control-label" for="admin_per">權限名稱</label>
              <div class="col-md-11">

                <?php 
                  $pre_admin=$row['admin_per']=='admin' ? 'checked' : '';
                  $pre_nomal=empty($row['admin_per']) || $row['admin_per']!='admin' ? 'checked' : '';
                ?>

                <label><input type="radio" name="admin_per" value="admin" <?php echo $pre_admin;?>> 系統管理員</label>｜
                <label><input type="radio" name="admin_per" value="nomal" <?php echo $pre_nomal;?>> 一般權限</label>

                <hr>

                <?php 
                    $sql_group=$pdo->prepare("SELECT Tb_index, Group_name FROM sysAdminGroup");
                    $sql_group->execute();
                    while ($row_group=$sql_group->fetch(PDO::FETCH_ASSOC)) {
                      $admin_per_arr=explode(',', $row['admin_per']);
                      $pre_group=in_array($row_group['Tb_index'], $admin_per_arr) ? 'checked' : '';
                      $pre_disabled=$row['admin_per']=='admin' ? 'disabled' : '';
                      echo '<label><input type="checkbox"  name="admin_per_arr" value="'.$row_group['Tb_index'].'" '.$pre_group.' '.$pre_disabled.'> '.$row_group['Group_name'].'</label>｜';
                      
                    }
                  ?>
                

                
              </div>
              
            </div>
            <div class="form-group">
              <label class="col-md-1 control-label" for="admin_id">帳號</label>
              <div class="col-md-2">
                <input type="text" class="form-control" id="admin_id" value="<?php echo $row['admin_id'];?>">
              </div>
              <label class="col-md-1 control-label" for="admin_pwd">更新密碼</label>
              <div class="col-md-2">
                <input type="password" class="form-control" id="admin_pwd" value="">
              </div>
            </div>
            <div class="form-group">
                <label class="col-md-1 control-label" for="name">姓名</label>
                 <div class="col-md-2">
                  <input type="text" class="form-control" id="name" value="<?php echo $row['name'];?>">
                 </div>
                <label class="col-md-1 control-label" for="email">電子信箱</label>
                 <div class="col-md-2">
                  <input type="text" class="form-control" id="email" value="<?php echo $row['email'];?>">
                 </div>
                <label class="col-md-1 control-label" for="is_use">狀態</label>
                 <div class="col-md-2">
                  <input type="checkbox" class="checkbox" id="is_use" 
                  <?php echo $check=!isset($row['is_use']) || $row['is_use']==1 ? 'checked' : ''; ?> value="1">
                 </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="col-lg-3">
      <div class="panel panel-default">
        <div class="panel-heading">
          <header>儲存您的資料</header>
        </div><!-- /.panel-heading -->
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12">
              <?php if (empty($_GET['Tb_index'])) { ?>
                    <button type="button" id="admin_btn" class="btn btn-info btn-block btn-raised">儲存</button>
              <?php  }else{?>
                    <button type="button" id="admin_btn_up" class="btn btn-info btn-block btn-raised">更新</button>
                    <input  type="hidden" id="Tb_index" value="<?php echo $row['Tb_index'];?>" >
              <?php  }?>
              </div>
          </div>
          
        </div><!-- /.panel-body -->
      </div><!-- /.panel -->
    </div>

  </div>
  
</div>
<!-- /#page-content -->
<?php  include("../../core/page/footer01.php");//載入頁面footer01.php?>
<script type="text/javascript">
  $(document).ready(function() {


    $('[name="admin_per"]').change(function(event) {
      if ($(this).val()=='admin') {
        $('[name="admin_per_arr"]').prop('checked', false);
        $('[name="admin_per_arr"]').prop('disabled', true);
      }
      else{
        $('[name="admin_per_arr"]').prop('disabled', false);
      }
    });

    $('.twzipcode').twzipcode({
    'zipcodeSel'  : '<?php echo $zipcode;?>' // 此參數會優先於 countySel, districtSel
    });

    /* -- 新增 -- */
    $("#admin_btn").click(function(event) {

      var admin_per_arr=[];

      if ($('[name="admin_per"]:checked').val()=='admin') {
        admin_per_arr=['admin'];
      }
      else{
        $.each($('[name="admin_per_arr"]:checked'), function() {
              admin_per_arr.push($(this).val());
        });
      }

      var data={
                 admin_per: admin_per_arr.join(','),
                    admin_id: $("#admin_id").val(),
                   admin_pwd: $("#admin_pwd").val(),
                        name: $("#name").val(),
                       email: $("#email").val(),
                      is_use: $(":checked#is_use").val()
               };
      ajax_in('manager.php', data, '新增管理者', 'admin.php');
    });

    /* -- 修改 -- */
    $("#admin_btn_up").click(function(event) {

      var admin_per_arr=[];
    
     if ($('[name="admin_per"]:checked').val()=='admin'){
       admin_per_arr=['admin'];
     }
     else{
       $.each($('[name="admin_per_arr"]:checked'), function() {
             admin_per_arr.push($(this).val());
       });
     }

      var data={
                    Tb_index: $("#Tb_index").val(),
                   admin_per: admin_per_arr.join(','),
                    admin_id: $("#admin_id").val(),
                   admin_pwd: $("#admin_pwd").val(),
                        name: $("#name").val(),
                       email: $("#email").val(),
                      is_use: $(":checked#is_use").val()
               };

      ajax_in('manager.php', data, '更新管理者', 'admin.php');
    });

  }); //JQUERY END
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>
