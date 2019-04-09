<?php include("../../core/page/windows_header01.php");//載入頁面heaer01 ?>
<style type="text/css">
 .search_div .panel-body{ height: 400px; overflow: auto; }  
</style>
<?php include("../../core/page/windows_header02.php");//載入頁面heaer02?>



<div class="wrapper wrapper-content animated fadeInRight">

	<div class="row">
		
  <div class="col-lg-4">
    <div class="panel panel-default search_div">
                 <div class="panel-heading">
                     已選擇的信用卡
                 </div>
                 <div class="panel-body">
                     <div class="table-responsive">
                                <table class="table no-margin table-hover">
                                  <thead>
                                    <tr>
                                      <th>信用卡名稱</th>
                                      <th>取消</th>
                                    </tr>
                                  </thead>
                                  <tbody class="card_tb">
                                    
                                  </tbody>
                                </table>
                              </div>

                 </div>
             </div>

             <div class="form-group">
               <div class="col-md-12 text-center">
                   <button type="button" id="check_card_more_btn" class="btn btn-success btn-raised">排序</button>
                   <button type="button" id="close_btn" class="btn btn-default btn-raised">取消</button>
               </div>
             </div>
  </div>


   
	
</div>
</div><!-- /#page-content -->
<?php  include("../../core/page/windows_footer01.php");//載入頁面footer02.php?>
<script type="text/javascript">
	$(document).ready(function() {

     //-- 撈取選取卡片 --
     if (sessionStorage.getItem('other_ccard_name')!=null) {

       var other_ccard_name=sessionStorage.getItem('other_ccard_name').split(/[\n]/);
       var other_ccard_id=sessionStorage.getItem('other_ccard_id').split(',');

       for (var i = 0; i < other_ccard_name.length; i++) {
         var txt='<tr>'+
                    '<td class="card_name">'+other_ccard_name[i]+'</td>'+
                    '<td><button type="button" class="btn btn-default del_card">取消</button></td>'+
                    '<input type="hidden" name="card_id" value="'+other_ccard_id[i]+'">'+
                  '</tr>';
         $('.card_tb').append(txt);

       }


      


      //-- 排序 --
      $('#check_card_more_btn').click(function(event) {
        
        var new_other_ccard_name=[];
        var new_other_ccard_id=[];
        $.each($('.card_tb tr'), function(index, val) {

          new_other_ccard_name.push($(this).find('.card_name').html().replace(/\r\n|\n/g,""));
          new_other_ccard_id.push($(this).find('[name="card_id"]').val());
        });


        new_other_ccard_name=new_other_ccard_name.join('\n');
        new_other_ccard_id=new_other_ccard_id.join(',');

        sessionStorage.setItem('other_ccard_name',  new_other_ccard_name);
        sessionStorage.setItem('other_ccard_id', new_other_ccard_id);

        $('[name="ccs_typename_03"]', parent.document).val(new_other_ccard_name);
        $('[name="ccs_cc_pk2"]', parent.document).val(new_other_ccard_id);

        parent.jQuery.fancybox.close(); 
      });





       //-- 取消信用卡 --
       $('.del_card').click(function(event) {
         
         other_ccard_name.splice($(this).parent().parent().index(),1);
         other_ccard_id.splice($(this).parent().parent().index(),1);
         sessionStorage.setItem('other_ccard_name', other_ccard_name.join('\n'));
         sessionStorage.setItem('other_ccard_id', other_ccard_id.join(','));

         $('[name="ccs_typename_03"]', parent.document).val(sessionStorage.getItem('other_ccard_name'));
         $('[name="ccs_cc_pk2"]', parent.document).val(sessionStorage.getItem('other_ccard_id'));

         if (sessionStorage.getItem('other_ccard_name')=='') {
           $('[name="ccs_typename_03"]', parent.document).prop('readonly', false);
         }
         $(this).parents('tr').remove();
         
       });
     }




     //-- 取消 --
     $('#close_btn').click(function(event) {
       parent.jQuery.fancybox.close(); 
     });


        //-- 拖曳更新排序 --
            $( ".table-responsive .table .card_tb" ).sortable({

                  revert: 300,
                  update: function( event, ui ) {
                    //$("#sort_btn").css('display', 'inline-block');
                  }
             });


  });


		
</script>
<?php  include("../../core/page/windows_footer02.php");//載入頁面footer02.php?>
