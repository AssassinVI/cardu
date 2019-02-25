<?php 
include("../../core/page/header01.php");//載入頁面heaer01
include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_POST) {
   // -- 更新排序 --
  for ($i=0; $i <count($_POST['OrderBy']) ; $i++) { 
    $data=["OrderBy"=>$_POST['OrderBy'][$i]];
    $where=["Tb_index"=>$_POST['Tb_index'][$i]];
    pdo_update('search_label', $data, $where);
  }
}

if ($_GET) {

   if (!empty($_GET['Tb_index'])) {//刪除

    $where=['Tb_index'=>$_GET['Tb_index']];
   	 pdo_delete('search_label', $where);
   }
   
   $pdo=pdo_conn();
   $sql=$pdo->prepare("SELECT * FROM search_label ORDER BY lb_num DESC, lb_name ASC LIMIT 0,100");
   $sql->execute( );
}

?>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="col-lg-12">
		<h2 class="text-primary"><?php echo $page_name['MT_Name']?> 列表</h2>
		<p>本頁面條列出標籤使用率前100的標籤，可使用查詢，尋找其他標籤</p>
	   <div class="new_div">

       <input type="text" name="lb_name">
	    <a id="add_btn" href="javascript:;"class="btn btn-default">
          <i class="fa fa-plus" aria-hidden="true"></i> 新增
        </a>
      
      <input type="text" name="lb_name">
        <a id="search_btn" href="javascript:;"class="btn btn-default">
          <i class="fa fa-plus" aria-hidden="true"></i> 查詢
        </a>
	  </div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>名稱</th>
								
								<th class="text-right">管理</th>

							</tr>
						</thead>
						<tbody class="label_tb">

						<?php $i=1; while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {?>
							<tr>
								<td><?php echo $i?></td>
								<td><?php echo $row['lb_name'] ?></td>
								<td class="text-right">
								  <a class="btn btn-rounded btn-warning btn-sm del_btn" href="javascript:;" ><i class="fa fa-trash" aria-hidden="true"></i>刪除</a>
								</td>
							</tr>
						<?php $i++; }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div><!-- /#page-content -->
<?php  include("../../core/page/footer01.php");//載入頁面footer01.php?>
<script type="text/javascript">
	$(document).ready(function() {
		$("#sort_btn").click(function(event) {
		        
        var arr_OrderBy=new Array();
        var arr_Tb_index=new Array();

          $(".sort_in").each(function(index, el) {
           
             	arr_OrderBy.push($(this).val());
                arr_Tb_index.push($(this).attr('Tb_index'));
          });

          var data={ 
                        OrderBy: arr_OrderBy,
                       Tb_index: arr_Tb_index 
                      };
             ajax_in('admin.php', data, 'no', 'no');

          alert('更新排序');
         location.replace('admin.php?MT_id=<?php echo $_GET['MT_id'];?>');
		});

   
   //-- 新增 ---
    $('#add_btn').click(function(event) {
    var _this=$(this);
    if ($(this).prev().val()!='') {
    	 $.ajax({
    			url: 'admin_ajax.php',
    			type: 'POST',
    			data: {
    				lb_name: $(this).prev().val()
    			},
    			success:function (data) {
    				
    			  if (data=='1') {
    	            var txt=' <tr>'+
    					'<td>new</td>'+
    					'<td>'+_this.prev().val()+'</td>'+
    					'<td class="text-right">'+
    						'<a class="btn btn-rounded btn-warning btn-sm del_btn" href="javascript:;" ><i class="fa fa-trash" aria-hidden="true"></i>刪除</a>'+
    					'</td>'+
    				  '</tr>';

    				   	$('.table tbody').append(txt);
                        _this.prev().val('');
    			  }
            //-- 重複 --
    			  else{
    			  	alert(data);
    			  }
    			}
    		});
    }
    else{
    	alert('請輸入標籤名稱');
    }    	 	
  });

   //---- 刪除 -----
   $('.label_tb').on('click', '.del_btn', function(event) {
     event.preventDefault();
     var _this=$(this);
     if (confirm('是否刪除'+$(this).parent().prev().html()+' ??')) {
      $.ajax({
        url: 'admin_ajax.php',
        type: 'POST',
        data: {
          del_name: $(this).parent().prev().html()
        },
        success:function (data) {
          _this.parent().parent().remove();
        }
      }); 
      
     }
   });


  
  //--- 搜尋 ---
  $('#search_btn').click(function(event) {

      if ($(this).prev().val()=='') {
        if (confirm('是否要搜尋全部資料?? (注意:資料量大)')) {
             $.ajax({
              url: 'admin_ajax.php',
              type: 'POST',
              dataType: 'json',
              data: {
                search_name: $(this).prev().val()
              },
              success: function (data) {

                $('.table tbody').html('');
                var x=1;
                $.each(data, function() {
                   var txt=' <tr>'+
                    '<td>'+x+'</td>'+
                    '<td>'+this['lb_name']+'</td>'+
                    '<td class="text-right">'+
                      '<a class="btn btn-rounded btn-warning btn-sm del_btn" href="javascript:;" ><i class="fa fa-trash" aria-hidden="true"></i>刪除</a>'+
                    '</td>'+
                    '</tr>';

                      $('.table tbody').append(txt);
                      x++;
                });
              }
             });
        }
      }
      else{
        $.ajax({
        url: 'admin_ajax.php',
        type: 'POST',
        dataType: 'json',
        data: {
          search_name: $(this).prev().val()
        },
        success: function (data) {

          $('.table tbody').html('');
          var x=1;
          $.each(data, function() {
             var txt=' <tr>'+
              '<td>'+x+'</td>'+
              '<td>'+this['lb_name']+'</td>'+
              '<td class="text-right">'+
                '<a class="btn btn-rounded btn-warning btn-sm del_btn" href="javascript:;" ><i class="fa fa-trash" aria-hidden="true"></i>刪除</a>'+
              '</td>'+
              '</tr>';

                $('.table tbody').append(txt);
                x++;
          });
        }
       });
      }
  	        
  	   
  });



	});
</script>
<?php  include("../../core/page/footer02.php");//載入頁面footer02.php?>
