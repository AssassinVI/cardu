<?php include("../../core/page/windows_header01.php");//載入頁面heaer01 ?>
<?php include("../../core/page/windows_header02.php");//載入頁面heaer02?>
<?php 


  //-- 分頁判斷數 --
  $num=50;
  //--- 分頁起頭數 ---
  $now_page_num=empty($_GET['PageNo'])? 0:((int)$_GET['PageNo']-1)*$num;
  //-- 目前分頁 --
  $page=empty($_GET['PageNo']) ? 1:$_GET['PageNo'];

  $row_num=$NewPdo->select("SELECT COUNT(*) as total
  	                    FROM NewsAndType 
  	                    WHERE ns_nt_pk=:ns_nt_pk AND ns_verify=3 AND OnLineOrNot=1 AND  StartDate<=:StartDate AND EndDate>=:EndDate
  	                    ORDER BY ns_nt_pk_sort ASC, ns_vfdate DESC", ['ns_nt_pk'=>$_GET['ns_nt_pk'], 'StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')], 'one');
  $total_page=ceil(((int)$row_num['total'])/$num);

  $row=$NewPdo->select("SELECT nt_name, ns_ftitle, ns_viewcount, ns_mobvecount, ns_fbcount, ns_verify, StartDate, EndDate, 
                               ns_reporter, ns_vfman_2_name, ns_vfdate, ns_fwdate, ns_date, Tb_index, ns_nt_pk_sort
  	                    FROM NewsAndType 
  	                    WHERE ns_nt_pk=:ns_nt_pk AND ns_verify=3 AND OnLineOrNot=1 AND  StartDate<=:StartDate AND EndDate>=:EndDate
  	                    ORDER BY ns_nt_pk_sort ASC, ns_vfdate DESC
  	                    LIMIT $now_page_num, $num", ['ns_nt_pk'=>$_GET['ns_nt_pk'], 'StartDate'=>date('Y-m-d'), 'EndDate'=>date('Y-m-d')]);

  //-- 新聞狀態 --
  $ns_verify_arr=['ver_0'=>'草稿', 'ver_2'=>'審核中', 'ver_3'=>'已上架', 'ver_5'=>'退稿', 'ver_7'=>'下架'];
?>


<div class="wrapper wrapper-content animated fadeInRight">

	<div class="row">

        <div id="sort_div" class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>文章排序</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body">

					<div class="table-responsive ">
            <form id="sort_form" action="" method="POST">
						<table class="table no-margin table-hover">
							<thead>
								<tr>
									<th>主分類</th>
									<th style="width: 200px;">主標題</th>
									<th>點閱數(PC)</th>
									<th>點閱數(手機)</th>
									<th>FB按讚數</th>
									<th>新聞狀態</th>
									<th>上架期間</th>
									<th>記者/作者</th>
                                    <th>審核者</th>
                                    <th>審核時間</th>
                                    <th>完稿時間</th>
                                    <th>發佈日期</th>
                                    <th>排序</th>
								</tr>
							</thead>
							<tbody>

							  <?php 
                                foreach ($row as $row_one) {
                                  
                                  $S_E_Date=$row_one['StartDate'].' ~ '.$row_one['EndDate'];
                                  echo '  
                                  <tr>
                                  	<td>'.$row_one['nt_name'].'</td>
                                  	<td>'.$row_one['ns_ftitle'].'</td>
                                  	<td>'.$row_one['ns_viewcount'].'</td>
                                  	<td>'.$row_one['ns_mobvecount'].'</td>
                                  	<td>'.$row_one['ns_fbcount'].'</td>
                                  	<td>'.$ns_verify_arr['ver_'.$row_one['ns_verify']].'</td>
                                  	<td>'.$S_E_Date.'</td>
                                  	<td>'.$row_one['ns_reporter'].'</td>
                                  	<td>'.$row_one['ns_vfman_2_name'].'</td>
                                  	<td>'.$row_one['ns_vfdate'].'</td>
                                  	<td>'.$row_one['ns_fwdate'].'</td>
                                  	<td>'.$row_one['ns_date'].'</td>
                                  	<td>
                                      '.$row_one['ns_nt_pk_sort'].' <a class="fast_sort" href="javascript:;">快速排序</a>
                                      <input type="hidden" name="Tb_index[]" value="'.$row_one['Tb_index'].'" sort="'.$row_one['ns_nt_pk_sort'].'">
                                  	</td>
                                  </tr>';

                                }
							  ?>


							</tbody>
						</table>
            <input type="hidden" name="ns_nt_pk" value="<?php echo $_GET['ns_nt_pk'];?>">
          </form>
					</div>

					<div class="text-right">
							<label >
								到 
								<select class="page_select">
                                  <?php 
                                   for ($i=1; $i <=$total_page ; $i++) { 
                                    if (!empty($_GET['PageNo']) && $_GET['PageNo']==$i) {
                                      echo '<option selected value="'.$i.'">'.$i.'</option>';
                                    }
                                    else{
                                      echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                   	
                                   }
                                   ?>
							    </select>
							    頁
						   </label>
					</div>
					
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->
		</div>
		

		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<header>儲存您的資料</header>
				</div><!-- /.panel-heading -->
				<div class="panel-body text-center">
					<button type="button" id="submit_btn" class="btn btn-info btn-raised">確定</button>
					<button type="button" class="btn btn-default btn-flat" onclick="javascript:window.close();" >放棄</button>
					
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->
		</div>
	</div>

</div><!-- /#page-content -->

<?php  include("../../core/page/windows_footer01.php");//載入頁面footer02.php?>
<script type="text/javascript">
	$(document).ready(function() {
        
      
      //------------------------------- 拖曳更新排序 -------------------------
      $( ".table-responsive tbody" ).sortable({
               revert: 300,
               placeholder: "sortable_new_placeholder"
      });



      $('.page_select').change(function(event) {
        var search=location.search;

        if (search.indexOf('PageNo')!=-1) {
          search=search.split('&');
          search=search[0];
        }

        location.href='news_sort_windows.php'+search+'&PageNo='+$(this).val();
      });

      

      $('#submit_btn').click(function(event) {
        
        var Tb_index_arr=[];
        $.each($('[name="Tb_index[]"]'), function(index, val) {
           
           Tb_index_arr.push($(this).val());
        });

        $.ajax({
          url: 'news_sort_windows_ajax.php',
          type: 'POST',
          data: {
            type: 'sort',
            Tb_index:Tb_index_arr
          },
          success:function (data) {
           
            alert('拖拉排序已完成!!');
            location.reload();
            window.parent.opener.location.reload();
          }
        });
        
        
      });



      $('.fast_sort').click(function(event) {
        var new_sort;
        var title=$(this).parents('tr').find('td:nth-child(2)').html();
        var sort=$(this).next().attr('sort');
        if(new_sort=prompt(title+"\n原排序為"+sort+"\n新排序為：",sort))
        {
          
          //alert("你按下確認，輸入的字串為："+$('[name="Tb_index[]"][sort="'+new_sort+'"]').val());
          $.ajax({
            url: 'news_sort_windows_ajax.php',
            type: 'POST',
            data: {
              type: 'fast_sort',
              ch_Tb_index: $(this).next().val(),
              ns_nt_pk: $('[name="ns_nt_pk"]').val(),
              ch_sort: sort,
              ch_new_sort: new_sort
            },
            success:function (data) {
              location.reload();
              window.parent.opener.location.reload();
            }
          });
          
        } 
      });



      });
</script>
<?php  include("../../core/page/windows_footer02.php");//載入頁面footer02.php?>