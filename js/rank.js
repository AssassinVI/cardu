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