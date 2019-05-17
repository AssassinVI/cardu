/*------------------------ 卡比較辨識 (新手快搜, 卡片比一比, 權益比一比) -----------------------------*/
if (location.hash=='#newHand' || location.hash=='#cardCompare' || location.hash=='#interest') {
  url_hash();

  $(window).bind('hashchange', function() { 
     url_hash();
  }); 
}

/*------------------------ 人氣排行 (新手快搜, 卡片比一比, 權益比一比) -----------------------------*/
if (location.hash=='#newCard' || location.hash=='#addCard' || location.hash=='#viewCard') {
     url_hash();

  $(window).bind('hashchange', function() { 
     url_hash();
  }); 
}


function url_hash() {
     $(location.hash+'_a').parents('.mouseHover_other_tab').find('.nav-link').removeClass('active show');
     $(location.hash+'_a').parents('.mouseHover_other_tab').find('.tab-pane').removeClass('active show');
     $(location.hash+'_a').parents('.mouseHover_other_tab').find('.nav-link').attr('aria-selected', 'false');
     $(location.hash+'_a').attr('aria-selected', 'true');
     $(location.hash+'_a').addClass('active show');
     $($(location.hash+'_a').attr('tab-target')).addClass('active show');
}





/*=================================================== 卡排行 ======================================================================*/

/*------------------------------- 卡排行個分類輪播 ------------------------------------*/
var slide_num=$(window).width()>420 ? 6:3;
var card_type_Swiper = new Swiper ('.card_type .swiper-container', {
    slidesPerView : slide_num,
    slidesPerGroup : slide_num,
    speed:750,
    // 如果需要前进后退按钮
    navigation: {
      nextEl: '.card_type .swiper-button-next',
      prevEl: '.card_type .swiper-button-prev',
    }
  });

//-- 目前輪播位置 --
$.each($('.card_type .swiper-container .swiper-slide'), function(index, val) {
  if ($(this).attr('class').indexOf('now')!=-1) {
    card_type_Swiper.slideTo(index, 700, false);
  }
});


var index=0;
$('.card_type .swiper-slide').mouseenter(function(event) {
    
   // ccard_rank_Swiper.autoplay.stop();

    //-- 舊icon還原 --
    if ($(this).attr('class').indexOf('now')==-1 && index!=0){
    var old_img_arr=$('.card_type .swiper-slide:nth-child('+index+')').find('img').attr('src').split('/');
    var old_img=old_img_arr[old_img_arr.length-1].split('.');
    var img_name_arr=old_img[0].split('_');
    old_img_arr[old_img_arr.length-1]=img_name_arr[0]+'_'+img_name_arr[1]+'.'+old_img[1];
    $('.card_type .swiper-slide:nth-child('+index+')').find('img').attr('src', old_img_arr.join('/'));
    $('.card_type .swiper-slide:nth-child('+index+')').removeClass('active');
    }
    
    //-- 新icon 換圖 --
    if ($(this).attr('class').indexOf('now')==-1){
    var img_arr=$(this).find('img').attr('src').split('/');
    var img=img_arr[img_arr.length-1].split('.');
    var new_img=img[0]+'_down';
    img_arr[img_arr.length-1]=new_img+'.'+img[1];
    $(this).find('img').attr('src', img_arr.join('/'));
    $(this).addClass('active');
  }

    //-- 切換信用卡 --

    if ($(this).attr('index')!=index) {
      // ccard_rank_Swiper.removeAllSlides();

      // $.ajax({
      //   url: '../ajax/rank_ajax.php',
      //   type: 'POST',
      //   dataType: 'json',
      //   data: {
      //     type:'slide_6_rank',
      //     ccs_cc_so_pk: $(this).attr('Tb_index')
      //   },
      //   success:function (data) {
      //     var x=1;
      //     $.each(data, function(index, val) {

      //       var txt='<div class="swiper-slide">'+
      //                          '<div class="w-h-100 hv-center">'+
      //                            '<a href="'+this['cc_url']+'" title="'+this['ccs_cc_cardname']+'">'+
      //                            '<span class="top_Medal">'+x+'</span><img src="../sys/img/'+this['cc_photo']+'" alt="'+this['ccs_cc_cardname']+'"><br>'+this['cc_shortname']+
      //                            '</a>'+
      //                          '</div>'+
      //                      '</div>';
      //       ccard_rank_Swiper.appendSlide(txt);
      //     x++;
      //     });
      //     ccard_rank_Swiper.autoplay.start();
      //   }
      // });
      
    }
    if ($(this).attr('class').indexOf('now')==-1){
      index=$(this).attr('index');
    }
});  


$('.card_type .swiper-slide').mouseleave(function(event){
   
   //-- 舊icon還原 --
   if ($(this).attr('class').indexOf('now')==-1) {
    var old_img_arr=$('.card_type .swiper-slide:nth-child('+index+')').find('img').attr('src').split('/');
    var old_img=old_img_arr[old_img_arr.length-1].split('.');
    var img_name_arr=old_img[0].split('_');
    old_img_arr[old_img_arr.length-1]=img_name_arr[0]+'_'+img_name_arr[1]+'.'+old_img[1];
    $('.card_type .swiper-slide:nth-child('+index+')').find('img').attr('src', old_img_arr.join('/'));
    $('.card_type .swiper-slide:nth-child('+index+')').removeClass('active');
   }
    
});
/*------------------------------- 卡排行個分類輪播 END ------------------------------------*/







/*------------------------------- 卡排行 切換有門檻  ------------------------------------*/
$('.mouseHover_rank').mouseenter(function(event) {
  var _this=$(this);
  if ($(this).attr('ajax')=='no') {

    //-- 卡排行title --
    $.ajax({
      url: '../ajax/rank_ajax.php',
      type: 'POST',
      dataType: 'json',
      data: {
        type: 'rank_type',
        rank_type_id: $(this).attr('rank_type')
      },
      success:function (data) {

        var cc_so_type_01_cname='<a class="rank_order sp active" href="javascript:;" rank_type_id="'+data['Tb_index']+'" order="ccs_order">'+data['cc_so_type_01_cname']+'</a>';
        var cc_so_type_02_cname=data['cc_so_type_02_order']=='1' ? '<a class="rank_order sp" href="javascript:;" rank_type_id="'+data['Tb_index']+'" order="ccs_order2">'+data['cc_so_type_02_cname']+'</a>' : data['cc_so_type_02_cname'];
        var cc_so_type_03_cname=data['cc_so_type_03_order']=='1' ? '<a class="rank_order sp" href="javascript:;" rank_type_id="'+data['Tb_index']+'" order="ccs_order3">'+data['cc_so_type_03_cname']+'</a>' : data['cc_so_type_03_cname'];
        var txt='<div class="col-md-1 text-center"></div>'+
                 '<div class="phone_hidden text-center">卡片名稱</div>'+
                 '<div class="col-md col-4 text-center">'+cc_so_type_01_cname+'</div>'+
                 '<div class="col-md col-4 text-center">'+cc_so_type_02_cname+'</div>'+
                 '<div class="col-md col-4 text-center">'+cc_so_type_03_cname+'</div>';

        $(_this.attr('tab-target')).find('.rank_card_title').html(txt);
      }
    });

    //-- 卡排行資訊 --
    $.ajax({
      url: '../ajax/rank_ajax.php',
      type: 'POST',
      data: {
        type: 'card_rank_txt', 
        rank_type_id: $(this).attr('rank_type')
      },
      success:function (data) {
        $(_this.attr('tab-target')).find('.imp_int').append(data);
      }
    });
        
    $(this).attr('ajax','yes');
  }
});

/*------------------------------- 卡排行 切換有門檻 END ------------------------------------*/






//--------------------------------- 顯示更多卡片(卡排行) ------------------------------------

//-- 通用 --
var sr_rank_num=10, order='ccs_order';
//-- 現金回饋(有門檻用) --
var sr_rank_sp_num=10, order_sp='ccs_order';


$('.card_rank_div').on('click', '.rank_more.card_rank', function(event) {
  var _this=$(this);
  var show_num=$(this).attr('show_num');
  var rank_num=$(this).attr('class').indexOf('sp')!=-1 ? sr_rank_sp_num:sr_rank_num;
  var this_order=$(this).attr('class').indexOf('sp')!=-1 ? order_sp:order;
  var data={
    type: 'card_rank_txt', 
    sr_rank_num: rank_num,
    sr_num_plus:show_num,
    order:this_order,
    rank_type_id: $(this).attr('rank_type_id')
  }

  
  $.ajax({
    url: '../ajax/rank_ajax.php',
    type: 'POST',
    data: data,
    success:function (data_txt) {

      //-- 判斷還有無資料 --
      if (data_txt=='') {
        _this.css('display', 'none');
      }
      else{
        _this.prev().append(data_txt);
        if (_this.attr('class').indexOf('sp')!=-1) {
          sr_rank_sp_num=sr_rank_sp_num+parseInt(show_num);
        }
        else{
          sr_rank_num=sr_rank_num+parseInt(show_num);
        }
      }
    }
  });
});
//--------------------------------- 顯示更多卡片(卡排行) END ---------------------------


//--------------------------------- 切換排序(卡排行) ----------------------------------
$('.card_rank_div').on('click', '.rank_order', function(event) {
  
  $(this).parents('.tab-pane').find('.rank_order').removeClass('active');
  $(this).addClass('active');
  $(this).parents('.tab-pane').find('.rank_more').css('display', 'block');
  $(this).parent().parent().next().html('');

  var _this=$(this);
  var show_num=$(this).parents('.tab-pane').find('.rank_more').attr('show_num');
  if ($(this).attr('class').indexOf('sp')!=-1) {
    sr_rank_sp_num=0;
    order_sp=$(this).attr('order');
  }
  else{
    sr_rank_num=0;
    order=$(this).attr('order');
  }
  var rank_num=$(this).attr('class').indexOf('sp')!=-1 ? sr_rank_sp_num:sr_rank_num;

  var data={
    type: 'card_rank_txt', 
    sr_rank_num: rank_num,
    sr_num_plus:show_num,
    order:$(this).attr('order'),
    rank_type_id: $(this).attr('rank_type_id')
  }

  
  $.ajax({
    url: '../ajax/rank_ajax.php',
    type: 'POST',
    data: data,
    success:function (data_txt) {

      _this.parent().parent().next().append(data_txt);
      if (_this.attr('class').indexOf('sp')!=-1) {
        sr_rank_sp_num=sr_rank_sp_num+parseInt(show_num);
      }
      else{
        sr_rank_num=sr_rank_num+parseInt(show_num);
      }
    }
  });
});
//---------------------------------- 切換排序(卡排行) END ----------------------------------


/*=================================================== 卡排行 END ======================================================================*/






/*------------------------ 卡排行(新手快搜) -----------------------------*/
var rank_arr=sessionStorage.getItem('rank_arr')==null ? [] : sessionStorage.getItem('rank_arr').split(',');
$('.new_hand_search ul li a').click(function(event) {
  
  //-- 清除 --
  if ($(this).attr('class').indexOf('active')>-1) {
  	var rank_index=rank_arr.indexOf($(this).attr('rank'));
  	rank_arr.splice(rank_index,1);
  }
  //-- 加入 --
  else{
  	rank_arr.push($(this).attr('rank'));
  }
  
  $('.new_hand_search ul li a').removeClass('active');
  
  for (var i = 0; i < rank_arr.length; i++) {
  	$('.new_hand_search [rank="'+rank_arr[i]+'"]').addClass('active');
  }

});

//-- 開始找卡 --
$('#easy_rank').click(function(event) {
  if (rank_arr[0]!=undefined) {
    sessionStorage.setItem("rank_arr", rank_arr.join(','));
    
    var func_id_arr=[], pref_id_arr=[];
    for (var i = 0; i < rank_arr.length; i++) {
      if (rank_arr[i].indexOf('fun')!=-1) {
        func_id_arr.push(rank_arr[i]);
      }
      else{
        pref_id_arr.push(rank_arr[i]);
      }
    }

    location.href=encodeURI('search_detail.php?pref_id='+pref_id_arr.join(',')+'&fun_id='+func_id_arr.join(','));
  }else{
    alert('至少選擇一種搜尋條件');
  }
  
});


//-- 重選 --
$('.reset_div #reset_new_btn').click(function(event) {
  if (sessionStorage.getItem('rank_arr')!=null) {
    rank_arr=[];
    sessionStorage.removeItem('rank_arr');
    $('.new_hand_search ul li a').removeClass('active');
  }
  else if(rank_arr[0]!=undefined){
    rank_arr=[];
    $('.new_hand_search ul li a').removeClass('active');
  }
  else{
    alert('您尚未選擇搜尋條件');
  }
});


//-- 顯示更多卡片(新手快搜) --
var new_sr_num=9;
$('.rank_more.new_hand').click(function(event) {
  var _this=$(this);
  var show_num=$(this).attr('show_num');
  var x=0;

  var get=location.search;
      get=get.substr(1);
      get=get.split('&');
  var pref_id_arr=get[0].split('=');
      pref_id_arr=pref_id_arr[1];
  var fun_id_arr=get[1].split('=');
      fun_id_arr=fun_id_arr[1];
  
  var data={
    type: 'rank_more_new_hand', 
    sr_num: new_sr_num,
    sr_num_plus : show_num,
    pref_id : pref_id_arr,
    fun_id : fun_id_arr
  }

  //console.log(data);

  $.ajax({
    url: '../ajax/rank_ajax.php',
    type: 'POST',
    data: data,
    success:function (data_txt) {

      //-- 判斷還有無資料 --
      if (data_txt=='') {
        $('.rank_more.new_hand').css('display', 'none');
      }
      else{
        $('.tab-content .new_hand_card').append(data_txt);
        new_sr_num=new_sr_num+parseInt(show_num);
      }
    }
  });
});

/*------------------------ 卡排行(新手快搜) END -----------------------------*/







/*------------------------ 卡排行(權益比一比) -----------------------------*/
var rank_rights_arr=[];
var rank_rights_txt_arr=[];
$('.rights_search ul li a').click(function(event) {
  
    //-- 清除 --
  	if ($(this).attr('class').indexOf('active')>-1) {
  		var rank_index=rank_rights_arr.indexOf($(this).attr('rank'));
  		rank_rights_arr.splice(rank_index,1);

      var rank_txt_index=rank_rights_txt_arr.indexOf($(this).html());
      rank_rights_txt_arr.splice(rank_txt_index,1);
  	}
    //-- 加入 --
  	else{

      if (rank_rights_arr.length<3) {
        rank_rights_arr.push($(this).attr('rank'));
        rank_rights_txt_arr.push($(this).html());
      }
      else{
        alert('您已經選擇三項權益');
      }
  	}
  	
  	$('.rights_search ul li a').removeClass('active');
  	$('.rights_checked ul').html('');

  	for (var i = 0; i < rank_rights_arr.length; i++) {
  		$('.rights_search [rank="'+rank_rights_arr[i]+'"]').addClass('active');
     
  		var rights_txt='<li>'+
                          '<div class="row no-gutters">'+
                            '<div class="col-3"><h2 class="hv-center">'+(i+1)+'</h2></div>'+
                            '<div class="col-9 text-center"><span class="check_eq">'+rank_rights_txt_arr[i]+'</span></div>'+
                          '</div>'+
                        '</li>';

        $('.rights_checked ul').append(rights_txt);
  	}
});

//-- 開始找卡 --
$('#profit_rank').click(function(event) {
  //sessionStorage.setItem("profit_rank_arr", rank_rights_arr.join(','));
  var get_txt='?';
  for (var i = 0; i < rank_rights_arr.length; i++) {
    get_txt+='ci_pk0'+(i+1)+'='+rank_rights_arr[i]+'&';
  }
  get_txt=get_txt.slice(0, -1);
  location.href='profit_detail.php'+get_txt;
});


//-- 重選 --
$('.reset_div #reset_profit_btn').click(function(event) {
  if (sessionStorage.getItem('profit_rank_arr')!=null) {
    rank_rights_arr=[];
    rank_rights_txt_arr=[];
    sessionStorage.removeItem('profit_rank_arr');
    $('.rights_search ul li a').removeClass('active');
    $('.rights_checked ul').html('');
  }
  else if(rank_rights_arr[0]!=undefined){
    rank_rights_arr=[];
    rank_rights_txt_arr=[];
    $('.rights_search ul li a').removeClass('active');
    $('.rights_checked ul').html('');
  }
  else{
    alert('您尚未選擇搜尋條件');
  }
});


//-- 內頁權益選擇 --
$('.change_eq_item').change(function(event) {

  var href='?';
  $.each($('.change_eq_item'), function(index, val) {
     href+='ci_pk0'+(index+1)+'='+$(this).val()+'&';
  });
  href=href.slice(0, -1);

  if ($('[name="ci_pk_all"]').val().indexOf($(this).val())==-1) {
    location.href=href;
  }
  else{
    alert('比較條件不可一樣，請重新選擇！');
  }
  
});


//-- 顯示更多卡片(權益比一比) --
var sr_num=6;
$('.rank_more.eq').click(function(event) {
  var _this=$(this);
  var show_num=$(this).attr('show_num');
  var x=0;
  
  var data={
    type: 'rank_more_eq', 
    sr_num: sr_num,
    sr_num_plus:_this.attr('show_num'),
    ci_pk01: $('.ci_pk01 .change_eq_item').val()
  }

  if ($('.ci_pk02 .change_eq_item').length>0) {
    data['ci_pk02']=$('.ci_pk02 .change_eq_item').val();
  }
  if ($('.ci_pk03 .change_eq_item').length>0) {
    data['ci_pk03']=$('.ci_pk03 .change_eq_item').val();
  }

  
  $.ajax({
    url: '../ajax/rank_ajax.php',
    type: 'POST',
    data: data,
    success:function (data_txt) {

      //-- 判斷還有無資料 --
      if (data_txt.indexOf('profit_bg')==-1) {
        $('.rank_more.eq').css('display', 'none');
      }
      else{
        $('.profit_detail tbody').append(data_txt);
        sr_num=sr_num+parseInt(_this.attr('show_num'));
      }
    }
  });
});
/*------------------------ 卡排行(權益比一比) END -----------------------------*/




/*------------------------ 卡片比一比 -----------------------------*/
//-- 選擇銀行 --
$('.c_compare_bk').change(function(event) {
  $(this).parent().next().next().next().attr('href', 'javascript:;');
  $(this).parent().next().next().next().html('<h1 class="hv-center">卡片一</h1>');
  //-- 選擇銀行，撈信用卡(ajax.js) --
  change_bk_cc('.c_compare_bk', '.show_cc_group');
});
//-- 選擇銀行 --
$('.c_compare_bk2').change(function(event) {
    $(this).parent().next().next().next().attr('href', 'javascript:;');
    $(this).parent().next().next().next().html('<h1 class="hv-center">卡片二</h1>');
  //-- 選擇銀行，撈信用卡(ajax.js) --
  change_bk_cc('.c_compare_bk2', '.show_cc_group2');
});
//-- 選擇銀行 --
$('.c_compare_bk3').change(function(event) {
    $(this).parent().next().next().next().attr('href', 'javascript:;');
    $(this).parent().next().next().next().html('<h1 class="hv-center">卡片三</h1>');
  //-- 選擇銀行，撈信用卡(ajax.js) --
  change_bk_cc('.c_compare_bk3', '.show_cc_group3');
});

//-- 選擇卡群組--
$('.show_cc_group').change(function(event) {
    $(this).parent().next().next().attr('href', 'javascript:;');
    $(this).parent().next().next().html('<h1 class="hv-center">卡片一</h1>');
  change_ccgroup_cc('.show_cc_group', '.show_cc');
});
//-- 選擇卡群組--
$('.show_cc_group2').change(function(event) {
    $(this).parent().next().next().attr('href', 'javascript:;');
    $(this).parent().next().next().html('<h1 class="hv-center">卡片二</h1>');
  change_ccgroup_cc('.show_cc_group2', '.show_cc2');
});
//-- 選擇卡群組--
$('.show_cc_group3').change(function(event) {
    $(this).parent().next().next().attr('href', 'javascript:;');
    $(this).parent().next().next().html('<h1 class="hv-center">卡片三</h1>');
  change_ccgroup_cc('.show_cc_group3', '.show_cc3');
});

$('.show_cc').change(function(event) {
  //-- 選擇信用卡 顯示(卡片比一比)(ajax.js) --
  show_cc('一',$(this));
});

$('.show_cc2').change(function(event) {
  //-- 選擇信用卡 顯示(卡片比一比)(ajax.js) --
  show_cc('二',$(this));
});

$('.show_cc3').change(function(event) {
  //-- 選擇信用卡 顯示(卡片比一比)(ajax.js) --
  show_cc('三',$(this));
});


//-- 開始比較 --
$('#card_rank').click(function(event) {
  var show_card_arr=[];
  $.each($('[name="show_card_id"]'), function(index, val) {
     show_card_arr.push($(this).val());
  });
  
  //-- 判斷卡片數量 --
  switch($('[name="show_card_id"]').length){
    case 0:
      alert('請選擇兩張信用卡做比較');
    break;

    case 1:
      alert('請選擇兩張信用卡做比較');
    break;

    case 2:
      if (show_card_arr[0]==show_card_arr[1]) {
        alert('請選擇不同的卡片做比較');
      }
      else{
        location.href='../rank/compare_detail.php?cc_pk01='+show_card_arr[0]+'&cc_pk02='+show_card_arr[1];
      }
    break;

    case 3:
      if (show_card_arr[0]==show_card_arr[1] || show_card_arr[0]==show_card_arr[2] || show_card_arr[1]==show_card_arr[2]){
        alert('請選擇不同的卡片做比較');
      }
      else{
        location.href='../rank/compare_detail.php?cc_pk01='+show_card_arr[0]+'&cc_pk02='+show_card_arr[1]+'&cc_pk03='+show_card_arr[2];
      }
    break;
  }

  //location.href='compare_detail.php';
});

/*------------------------ 卡片比一比 END -----------------------------*/







/*------------------------ 卡片比一比 (右邊DIV) -----------------------------*/
//------------------------ 加入比較 -----------------------
$('body').on('click', '.add_contrast_card', function(event) {

  //-- 顯示卡片比一比 --
  if ($('.card_compare').css('display')=='none') {
    $('.card_compare').css('display','block');
  }

   var card_num=$('.contrast_card_div .card').length;
   //-- 限制卡片張數 --
   if (card_num==3) {
     alert("卡片比較最多三張");
   }
   //-- 限制卡片張數 --
   else{

    var txt='<div class="card">'+
                 '<button class="del_card" card_id="'+$(this).attr('card_id')+'" type="button">Ｘ</button>'+
                 '<a target="_blank" title="'+$(this).attr('card_name')+'" href="/cardNews/creditcard.php?cc_pk='+$(this).attr('card_id')+'&cc_group_id='+$(this).attr('cc_group_id')+'"><img class="w-100" src="/sys/img/'+$(this).attr('card_img')+'"></a>'+
               '</div>';
    
    //- 存入Session -
    if (sessionStorage.getItem("contrast_card")==null) {
      sessionStorage.setItem("contrast_card", $(this).attr('card_id'));
      sessionStorage.setItem("contrast_card_group_id", $(this).attr('cc_group_id'));
      sessionStorage.setItem("contrast_card_name", $(this).attr('card_name'));
      sessionStorage.setItem("contrast_card_img", $(this).attr('card_img'));
      $('.contrast_card_div').append(txt);
    }else{
      
      if (sessionStorage.getItem("contrast_card").indexOf($(this).attr('card_id'))==-1) {
        sessionStorage.setItem("contrast_card", sessionStorage.getItem("contrast_card")+','+$(this).attr('card_id'));
        sessionStorage.setItem("contrast_card_group_id", sessionStorage.getItem("contrast_card_group_id")+','+$(this).attr('cc_group_id'));
        sessionStorage.setItem("contrast_card_name", sessionStorage.getItem("contrast_card_name")+','+$(this).attr('card_name'));
        sessionStorage.setItem("contrast_card_img", sessionStorage.getItem("contrast_card_img")+','+$(this).attr('card_img'));
        $('.contrast_card_div').append(txt);
      }
      else{
        alert("您已經選過此卡!");
      }
    }

   }
});




//---------------------------------- 刪除卡 -------------------------------
$('.contrast_card_div').on('click', '.card .del_card', function(event) {
  
  //-- 剩一張卡 --
  if ($('.card_compare .card').length==1) {
    $('.card_compare').css('display','none');
    $(this).parent().remove();
    sessionStorage.clear();
  }
  else{
    var contrast_card_arr=sessionStorage.getItem("contrast_card").split(',');
    var contrast_card_img_arr=sessionStorage.getItem("contrast_card_img").split(',');

    //-找出index-
    var del_index=contrast_card_arr.indexOf($(this).attr('card_id'));

    contrast_card_arr.splice(del_index, 1);
    contrast_card_img_arr.splice(del_index, 1);
    sessionStorage.setItem("contrast_card" ,contrast_card_arr.join(','));
    sessionStorage.setItem("contrast_card_img" ,contrast_card_img_arr.join(','));
    $(this).parent().remove();
  }
});


//---------------------------------- 直接關閉卡片比一比 --------------------------
$('.contrast_card_close').click(function(event) {
  if (confirm('是否要關閉卡片比一比??')) {
    $('.card_compare').css('display','none');
    $('.contrast_card_div').html('');
    sessionStorage.clear();
  }
});


//---------------------------------- 比較卡片 btn --------------------------
$('.contrast_card_submit').click(function(event) {
  var card_arr=sessionStorage.getItem("contrast_card").split(',');
  if (card_arr.length==1) {
    alert('您最少要選擇二張卡片!!');
    event.preventDefault();
  }
  else{
    var get_txt='?';
    $.each($(this).parent().prev().find('.del_card'), function(index, val) {
       get_txt+='cc_pk0'+(index+1)+'='+$(this).attr('card_id')+'&';
       
    });
    get_txt=get_txt.slice(0,-1);
    location.href='/rank/compare_detail.php'+get_txt;
  }
});



//-------------------------------- 讀取卡片比較 ---------------------------------------
$(window).on('load', function(event) {
  
  if (sessionStorage.getItem("contrast_card")!=null){

    var card_arr=sessionStorage.getItem("contrast_card").split(',');
    var card_group_id_arr=sessionStorage.getItem("contrast_card_group_id").split(',');
    var card_name_arr=sessionStorage.getItem("contrast_card_name").split(',');
    var card_img_arr=sessionStorage.getItem("contrast_card_img").split(',');

    //-- 顯示卡片比一比 --
    $('.card_compare').css('display','block');
    
    for (var i = 0; i < card_arr.length; i++) {
      var txt='<div class="card">'+
                 '<button class="del_card" card_id="'+card_arr[i]+'" type="button">Ｘ</button>'+
                 '<a target="_blank" title="'+card_name_arr[i]+'" href="/cardNews/creditcard.php?cc_pk='+card_arr[i]+'&cc_group_id='+card_group_id_arr[i]+'"><img class="w-100" src="/sys/img/'+card_img_arr[i]+'"></a>'+
               '</div>';
      $('.contrast_card_div').append(txt);
    }
  }
});


/*------------------------ 卡片比一比 END -----------------------------*/
















/*------------------------------ 顯示更多卡片 --------------------------------*/
$('.rank_more').click(function(event) {
  var _this=$(this);
  var show_num=$(this).attr('show_num');
  var x=0;
  
  $.each($(this).parent().find('.d-none'), function(index, val) {
    
    //-- 判斷一次展開的數量 --
    if (x<show_num) {
      $(this).removeClass('d-none');
      x++;
    }
     
    //-- 無可展開，隱藏按鈕 --
    if ($(this).parent().find('.d-none').length<1) {
       _this.addClass('d-none');
     }
  });

});
/*------------------------------ 顯示更多卡片 END --------------------------------*/






//--------------------------------- 卷軸監控回調 -----------------------------

$(window).bind('scroll resize', function(){
  var top=$(this).scrollTop();
  
  /*-- 卡片比一比凍結 --*/
  if (top>215) {
    TweenMax.to($('.rank_boot_title'), 0, { y:(top-215)});
  }
  else{
    TweenMax.to($('.rank_boot_title'), 0, { y:0});
  }
  /*--卡片比一比凍結 END --*/

  /*-- 卡排行 --*/
  if (top>398-87) {
    TweenMax.to($('.rank_card_title'), 0, { y:(top-398+87 ), 'z-index':10, 'position':'relative'});
  }
  else{
    TweenMax.to($('.rank_card_title'), 0, { y:0});
  }
  /*--卡排行 END --*/

  
});
//-------------------------------- 卷軸監控回調 END ------------------------------




//----------------------------------- 判斷卡排行資訊 -------------------------------------------
function ccs_typename(ccs_typename_mem, ccs_typename, ccs_cc_pk2='')
{ 
  var ccs_typename_a_txt='';
  if (ccs_cc_pk2!='') {
    var ccs_typename_a=ccs_typename.split(/\n/);
    ccs_cc_pk2=ccs_cc_pk2.split(',');
    for (var i = 0; i < ccs_typename_a.length; i++) {
      var cc_url2=ccs_cc_pk2[i].indexOf('ccard')==-1 ? '../cardNews/type.php?gid='+ccs_cc_pk2[i] : '../cardNews/creditcard.php?cc_pk='+ccs_cc_pk2[i]+'&cc_group_id=';
      ccs_typename_a_txt+='<a href="'+cc_url2+'">'+ccs_typename_a[i]+'</a>';
    }
  }
  if (ccs_typename_mem=='') {
     if (ccs_typename.length>40) {
        var txt=ccs_cc_pk2=='' ? ccs_typename.slice(0,40)+'..' : '<div>'+ccs_typename_a_txt+'</div>';
        return '<p class=" hv-center mb-0" data-toggle="tooltip" data-placement="bottom" title="'+ccs_typename+'">'+txt+'</p>';
     }
     else{
        var txt=ccs_cc_pk2=='' ? ccs_typename : '<div>'+ccs_typename_a_txt+'</div>';
        return '<p class=" hv-center mb-0">'+txt+'</p>';
     } 
    }
    else{
        var txt=ccs_cc_pk2=='' ? ccs_typename : '<div>'+ccs_typename_a_txt+'</div>';
        return '<p class=" hv-center mb-0" data-toggle="tooltip" data-placement="bottom" title="'+ccs_typename_mem+'">'+ccs_typename+'</p>';
   }
}