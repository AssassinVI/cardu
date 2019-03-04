/*------------------------ 卡排行(新手快搜) -----------------------------*/
var rank_arr=[];
$('.new_hand_search ul li a').click(function(event) {
  
  if ($(this).attr('class').indexOf('active')>-1) {
  	var rank_index=rank_arr.indexOf($(this).attr('rank'));
  	rank_arr.splice(rank_index,1);
  }
  else{
  	rank_arr.push($(this).attr('rank'));
  }
  
  $('.new_hand_search ul li a').removeClass('active');

  for (var i = 0; i < rank_arr.length; i++) {
  	$('.new_hand_search [rank="'+rank_arr[i]+'"]').addClass('active');
  }
});

/*------------------------ 卡排行(新手快搜) END -----------------------------*/







/*------------------------ 卡排行(權益比一比) -----------------------------*/
var rank_rights_arr=[];
$('.rights_search ul li a').click(function(event) {
  

  	if ($(this).attr('class').indexOf('active')>-1) {
  		var rank_index=rank_rights_arr.indexOf($(this).attr('rank'));
  		rank_rights_arr.splice(rank_index,1);
  	}
  	else{
  		rank_rights_arr.push($(this).attr('rank'));
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
/*------------------------ 卡排行(權益比一比) END -----------------------------*/






/*------------------------ 加入比較 -----------------------------*/
$('.add_contrast_card').click(function(event) {
  
  //-- 顯示卡片比一比 --
  if ($('.card_compare').css('display')=='none') {
    $('.card_compare').css('display','block');
  }

   var card_num=$('.contrast_card_div .card').length;
   if (card_num==3) {
     alert("卡片比較最多三張");
   }
   else{
    sessionStorage.setItem("contrast_card"+(card_num+1), "test1");
    var txt='<div class="card">'+
                 '<button class="del_card" type="button">Ｘ</button>'+
                 '<a href="#"><img class="w-100" src="../img/component/card3.png" alt=""></a>'+
               '</div>';
    $('.contrast_card_div').append(txt);
   }
});

//---------------------------------- 刪除卡 -------------------------------
$('.contrast_card_div').on('click', '.card .del_card', function(event) {
  var card_index=$(this).parent().index()+1;
  
  //-- 關閉卡片比一比 --
  if ($('.card_compare .card').length==1) {
    $('.card_compare').css('display','none');
  }

  sessionStorage.removeItem("contrast_card"+card_index);
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

/*------------------------ 加入比較 END -----------------------------*/