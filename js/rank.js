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
  sessionStorage.setItem("rank_arr", rank_arr.join(','));
  location.href='search_detail.php';
});

/*------------------------ 卡排行(新手快搜) END -----------------------------*/







/*------------------------ 卡排行(權益比一比) -----------------------------*/
var rank_rights_arr=[];
$('.rights_search ul li a').click(function(event) {
  
    //-- 清除 --
  	if ($(this).attr('class').indexOf('active')>-1) {
  		var rank_index=rank_rights_arr.indexOf($(this).attr('rank'));
  		rank_rights_arr.splice(rank_index,1);
  	}
    //-- 加入 --
  	else{

      if (rank_rights_arr.length<3) {
        rank_rights_arr.push($(this).attr('rank'));
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
                            '<div class="col-9"><span><img src="../img/component/debitcard1.png">'+rank_rights_arr[i]+'</span></div>'+
                          '</div>'+
                        '</li>';

        $('.rights_checked ul').append(rights_txt);
  	}
});

//-- 開始找卡 --
$('#profit_rank').click(function(event) {
  sessionStorage.setItem("profit_rank_arr", rank_rights_arr.join(','));
  location.href='profit_detail.php';
});
/*------------------------ 卡排行(權益比一比) END -----------------------------*/






/*------------------------ 卡片比一比 (右邊DIV) -----------------------------*/
//------------------------ 加入比較 -----------------------
$('.add_contrast_card').click(function(event) {
  
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
                 '<a href="/cardNews/creditcard.php"><img class="w-100" src="'+$(this).attr('card_img')+'" alt=""></a>'+
               '</div>';
    
    //- 存入Session -
    if (sessionStorage.getItem("contrast_card")==null) {
      sessionStorage.setItem("contrast_card", $(this).attr('card_id'));
      sessionStorage.setItem("contrast_card_img", $(this).attr('card_img'));
      $('.contrast_card_div').append(txt);
    }else{
      
      if (sessionStorage.getItem("contrast_card").indexOf($(this).attr('card_id'))==-1) {
        sessionStorage.setItem("contrast_card", sessionStorage.getItem("contrast_card")+','+$(this).attr('card_id'));
        sessionStorage.setItem("contrast_card_img", sessionStorage.getItem("contrast_card_img")+','+$(this).attr('card_img'));
        $('.contrast_card_div').append(txt);
      }
      else{
        alert("您已經選過此卡!");
      }
    }
    console.log(sessionStorage.getItem("contrast_card"));
    console.log(sessionStorage.getItem("contrast_card_img"));
   }
});


//---------------------------------- 刪除卡 -------------------------------
$('.contrast_card_div').on('click', '.card .del_card', function(event) {
  
  //-- 關閉卡片比一比 --
  if ($('.card_compare .card').length==1) {
    $('.card_compare').css('display','none');
  }

  var contrast_card_arr=sessionStorage.getItem("contrast_card").split(',');
  var contrast_card_img_arr=sessionStorage.getItem("contrast_card_img").split(',');
  //-找出index-
  var del_index=contrast_card_arr.indexOf($(this).attr('card_id'));

  contrast_card_arr.splice(del_index, 1);
  contrast_card_img_arr.splice(del_index, 1);
  sessionStorage.setItem("contrast_card" ,contrast_card_arr.join(','));
  sessionStorage.setItem("contrast_card_img" ,contrast_card_img_arr.join(','));
  $(this).parent().remove();
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
});



//-------------------------------- 讀取卡片比較 ---------------------------------------
$(window).on('load', function(event) {
  
  if (sessionStorage.getItem("contrast_card")!=null){

    var card_arr=sessionStorage.getItem("contrast_card").split(',');
    var card_img_arr=sessionStorage.getItem("contrast_card_img").split(',');

    //-- 顯示卡片比一比 --
    $('.card_compare').css('display','block');
    
    for (var i = 0; i < card_arr.length; i++) {
      var txt='<div class="card">'+
                 '<button class="del_card" card_id="'+card_arr[i]+'" type="button">Ｘ</button>'+
                 '<a href="/cardNews/creditcard.php"><img class="w-100" src="'+card_img_arr[i]+'" alt=""></a>'+
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








/*------------------------------ 卡片比一比凍結 --------------------------------*/
$(window).bind('scroll resize', function(){
  var top=$(this).scrollTop();
  
  if (top>215) {
    TweenMax.to($('.rank_boot_title'), 0, { y:(top-215)});
  }
  else{
    TweenMax.to($('.rank_boot_title'), 0, { y:0});
  }

  
  
});
/*------------------------------ 卡片比一比凍結 END --------------------------------*/