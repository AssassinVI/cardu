$(document).ready(function() {
  if ($('#ckeditor').length>0) {
      CKEDITOR.replace('ckeditor',{filebrowserUploadUrl:'../../js/plugins/ckeditor/php/upload.php',filebrowserImageUploadUrl : '../../js/plugins/ckeditor/php/upload_img.php', height:600});
  }

  //-- 日期 --
  if ($('.datepicker').length>0) {
    $('.datepicker').datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        dayNamesMin :["日","一","二","三","四","五","六"],
        dayNames :["日","一","二","三","四","五","六"],
        monthNamesShort  :["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"]
    });
  }


  //-- 期間日期 --
  if ($('.datepicker_range').length>0) {
    
    var from= $('.datepicker_range.from' ).datepicker({
              dateFormat: "yy-mm-dd",
              yearRange: "-10:+10",
              changeMonth: true,
              changeYear: true,
              dayNamesMin :["日","一","二","三","四","五","六"],
              dayNames :["日","一","二","三","四","五","六"],
              monthNamesShort  :["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"]
            })
            .on( "change", function() {
              to.datepicker( "option", "minDate", $(this).val());
            });

   var to= $('.datepicker_range.to').datepicker({
            dateFormat: "yy-mm-dd",
            yearRange: "-10:+10",
            changeMonth: true,
            changeYear: true,
            dayNamesMin :["日","一","二","三","四","五","六"],
            dayNames :["日","一","二","三","四","五","六"],
            monthNamesShort  :["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"]
          })
          .on( "change", function() {
            from.datepicker( "option", "maxDate", $(this).val());
          });

    if ($('.datepicker_range.form' ).val()!='') {
      to.datepicker( "option", "minDate", $('.datepicker_range.from' ).val());
      $('.datepicker_range.from' ).val();
    }

    if ($('.datepicker_range.to' ).val()!='') {
      from.datepicker( "option", "maxDate", $('.datepicker_range.to' ).val());
      $('.datepicker_range.to' ).val();
    }

  }


  if ($('.close_fancybox').length>0) {
    $('.close_fancybox').click(function(event) {
      parent.jQuery.fancybox.getInstance().close();
    });
  }


});


	/* ==================== 基本AJAX 新增，修改，刪除 ======================= */
	function ajax_in(url, data, alert_txt ,replace, callback='no') {
		$.ajax({
			url: url,
			type: 'POST',
			data: data,
			success:function () {
        if (alert_txt!='no') { alert(alert_txt); }
				if (replace!='no') { location.replace(replace); }
        if (callback!='no') { callback }
			}
		});
	}

	/* ===================== AJAX檔案上傳 ======================== */
	function ajax_file(url, file_id, show_id) {

		$.ajaxFileUpload({
              url: url,
              secureuri: false, //是否需要安全協議
              fileElementId: file_id, //上傳input元件ID
              dataType: 'json',
              success: function (data, status) {  //服务器成功响应处理函数

                  alert('檔案儲存');
              }
		});
	}


 /* ========================== 預覽影片方法 ============================= */
 function video_load(controller,html_id) {

            var file=controller.files[0];
             if (file==null) {
                $(html_id).html('');
             }
             else{
                var fileReader= new FileReader();
                fileReader.readAsDataURL(file);
                fileReader.onload = function(event){
               // $(html_id).attr('src', this.result);
                $(html_id).html(' <video controls src="'+this.result+'"></video>');
             }
            };
          }


 /* ========================== 預覽圖片方法 ============================= */
 function file_viewer_load_new(controller,html_id) {
            $(html_id).html('');
            var file=controller.files;
            for (var i = 0; i < file.length; i++) {

             if (file[i]==null) {

                 $(html_id).html('');
             }
             else{
                
                var file_name=controller.value.split('\\');
                var type=file_name[2].split('.');
                var re = /(\.pdf|\.jpg|\.jpeg|\.bmp|\.gif|\.png)$/i;
                
                if (re.exec(file_name[2])) {

                     var fileReader= new FileReader();
                     fileReader.readAsDataURL(file[i]);
                     fileReader.onload = function(event){

                     //$(html_id).attr('src', this.result);
                     var result=this.result;

                      var html_txt='<div id="img_div" >';
                      html_txt=html_txt+'  <img id="one_img" src="'+result+'" alt="請上傳代表圖檔">';
                      html_txt=html_txt+'</div>';

                   $(html_id).append(html_txt);
                  }
                    
                  }else{
                    alert('請上傳圖片檔');
                    controller.value='';
                  }
            }
          }
}

 /* ========================== 預覽檔案方法 ============================= */
 function file_load_new(controller,html_id) {
            $(html_id).html('');
            var file=controller.files;
            for (var i = 0; i < file.length; i++) {

             if (file[i]==null) {

                 $(html_id).html('');
             }
             else{
                var fileReader= new FileReader();
                fileReader.readAsDataURL(file[i]);
                fileReader.onload = function(event){

                //$(html_id).attr('src', this.result);
                var file_name=controller.value.split('\\');
                var type=file_name[2].split('.');
                var re = /(\.jpg|\.jpeg|\.bmp|\.gif|\.png)$/i;

                if (re.exec(file_name[2])) {
                    var result=this.result;
                  }else{
                    var result='../../img/other_file_img/file.svg';
                  }

           var html_txt='<div id="img_div" >';
           html_txt=html_txt+'  <img id="one_img" src="'+result+'" alt="請上傳代表圖檔">';
           html_txt=html_txt+'</div>';

              $(html_id).append(html_txt);
             }
            }
          }
}

/*  */
function save_img_btn(ajax_php, file_id) {
  ajax_file(ajax_php, file_id, '#one_img');
  //$('.img_check').css('display', 'block');
}

/* ======================== 重設表單 ========================== */
function clean_all() {
   if (confirm("是否要放棄??")) {
      window.history.back();
   }
}


/* ======================== 放棄返回 ========================== */
function getBack() {
  if (confirm("是否要放棄??")) {
     window.history.back();
  }
}



//======================= 內文圖片 alt 轉圖說 ==========================
function img_txt(dom_id) {

    $.each($(dom_id), function(index, val) {

      if ($(this).attr('alt')!="" && $(this).attr('alt')!=undefined) {
        $(this).parent().html('<div class="img_div"><img src="'+$(this).attr('src')+'"><p>▲'+$(this).attr('alt')+'</p></div>'); 
      }
    });
}





//============================= nl2br (易位符號轉<br>) ===================================
function nl2br( str ) {
return str.replace(/([^>])\n/g, '$1<br/>\n');
} 




    // =============================== 檢查input ====================================
function check_input(id,txt) {

         if($(id).length>0){
           
           //-- 核取方塊、選取方塊 --
           if ($(id).attr('type')=='radio' || $(id).attr('type')=='checkbox') {
             
             if($(id+':checked').val()==undefined){
              $(id).css('borderColor', 'red');
               return txt;
            }else{
               $(id).css('borderColor', 'rgba(0,0,0,0.1)');
               return "";
            }
           }

           else{
             if ($(id).val()=='') {
               $(id).css('borderColor', 'red');
               return txt;
            }else{
               $(id).css('borderColor', 'rgba(0,0,0,0.1)');
               return "";
            }
           }

         }
         else{
          return txt;
         }

          
  }
  
  //-- 判斷特殊符號 --
  function check_word(id) {
     if($(id).val().search(/^(?:[^\~|\!|\#|\$|\%|\^|\&|\*|\(|\)|\=|\+|\{|\}|\[|\]|\"|\'|\<|\>]+)$/)==-1){
        $(id).css('borderColor', 'red');
        return true;
     }
     else{
        $(id).css('borderColor', 'rgba(0,0,0,0.1)');
       return false;
     }
  }
  
  //-- 判斷Email --
  function check_email(id) {
    if($(id).val().search(/^\w+(?:(?:-\w+)|(?:\.\w+))*\@\w+(?:(?:\.|-)\w+)*\.[A-Za-z]+$/)>-1){
        $(id).css('borderColor', 'red');
        return true;
     }
     else{
        return false;
     }
  }



  //======================= 內文圖片 alt 轉圖說 加入fancybox ==========================
  function img_txt(dom_id) {
     
      $.each($(dom_id), function(index, val) {

        //-- 手機板加入fancybox --
        if ($(window).width()<768) {
          var img_html='<a href="'+$(this).attr('src')+'" data-fancybox><i class="img_zoonOut fa fa-search"></i> <img src="'+$(this).attr('src')+'" alt="'+$(this).attr('alt')+'"></a>';
        }
        else{
          var img_html='<img src="'+$(this).attr('src')+'" alt="'+$(this).attr('alt')+'">';
        }
        
        //-- alt 轉圖說 --
        if ($(this).attr('alt')!="" && $(this).attr('alt')!=undefined) {
          $(this).parent().html('<div class="con_img">'+img_html+'<p>▲'+$(this).attr('alt')+'</p></div>'); 
        }
        else{
          $(this).parent().html(img_html); 
        }
      });
  }




  //======================= 內文圖片 設定圖寬+文繞圖 ==========================
  function img_750_w(dom_id) {
    
    $.each($(dom_id), function(index, val) {
     
     //-- 電腦畫面 --
     if ($(window).width()>768) {
       if ($(this).width()<750) {
          $(this).parent().width($(this).width());
          $(this).parent().css({
           'margin-left': 'auto',
           'margin-right': 'auto'
          });
       }
       //-- 文繞圖 --
       if ($(this).width()<450 && $(window).width()>768) {
         $(this).parent().css('float', 'left');
         $(this).parent().css('margin-right', '1rem');
         $(this).parent().css('display', 'inline-block');
       }
     }
     //-- 手機畫面 --
     else{
       if ($(this).width()<$(window).width()) {
         $(this).parent().width($(this).width());
       }
       else{
         $(this).addClass('w-100');
       }
     }
      
    });
  }





  //======================= 內文圖片 廣告 ==========================
  function html_ad() {

      //-- 手機 --
      if ($(window).width()<768) {
        var ad_txt='<a class="d-block my-3" href="#"><img class="w-100" src="http://placehold.it/900x300" alt=""></a>';
      }
      //-- 電腦 --
      else{
       var ad_txt='<a class="d-block my-3" href="#"><img class="w-100" src="http://placehold.it/750x100" alt=""></a>';
      }

      $.each($('.detail_content>p'), function(index, val) {
         
         if ($('.detail_content>p').length>=3 && index==2) {
          if ($(this).next().html().indexOf('img')!=-1) {
            $(this).next().after(ad_txt);
          }
          else{
            $(this).after(ad_txt);
          }
         }
      });
  }



  //======================= 內文 table ==========================
  function html_table(dom_id) {
    if ($(dom_id).length>0) {
      $(dom_id).css('width', '740px');
      $(dom_id).wrap('<div class="table_div"></div>');
    }
  }