
//-- 各版區首頁主題分類6篇文章 --
function subject_news(news_type_id, is_sp) {
  
  //-- 特別議題 --
  if (is_sp==1) {
    var data={
    	type: 'subject_news',
        ns_nt_sp_pk: news_type_id
    };	
  }
  //-- 一般主題 --
  else{
  	var data={
  		type: 'subject_news',
        ns_nt_pk: news_type_id
  	};
  }
  $.ajax({
  	url: '../ajax/news_ajax.php',
  	type: 'POST',
  	dataType: 'json',
  	data: data,
  	success:function (data) {
  		console.log(data);
  	}
  });
}




/*==================== 選擇銀行，撈信用卡 ===========================*/
function change_bk_cc(bk_DOM, cc_DOM) {
  $.ajax({
    url: '../ajax/right_div_ajax.php',
    type: 'POST',
    dataType: 'json',
    data: {
      type: 'ccard_group',
      cc_bi_pk:$(bk_DOM).val()
    },
    success:function (data) {
      
      $(cc_DOM).html('<option value="">--選擇信用卡--</option>');
      $.each(data, function(index, val) {
         $(cc_DOM).append('<option value="'+this['cc_group_id']+'">'+this['cc_cardname']+'</option>');
      });
    }
  });
}
/*==================== 選擇銀行，撈信用卡 END ===========================*/






/*==================== 選擇卡群組，撈信用卡(卡片比一比) ===========================*/
function change_ccgroup_cc(ccg_DOM, cc_DOM) {
  $.ajax({
    url: '../ajax/rank_ajax.php',
    type: 'POST',
    dataType: 'json',
    data: {
      type: 'ccard_orglevel',
      cc_group_id:$(ccg_DOM).val()
    },
    success:function (data) {
      $(cc_DOM).html('<option value="">--選擇卡等--</option>');
      $.each(data, function(index, val) {
         $(cc_DOM).append('<option value="'+this['Tb_index']+'">'+this['org_nickname']+this['attr_name']+'</option>');
      });
    }
  });
}
/*==================== 選擇卡群組，撈信用卡 END ===========================*/





/*==================== 選擇信用卡 顯示(卡片比一比) ===========================*/
function show_cc(card_num,cc_DOM) {
  $.ajax({
    url: '../ajax/rank_ajax.php',
    type: 'POST',
    dataType: 'json',
    data: {
      type: 'show_cc',
      cc_id: cc_DOM.val()
    },
    success:function (data) {

      if (data==false) {
        cc_DOM.parent().next().html('<h1 class="hv-center">卡片'+card_num+'</h1>');
      }
      else{
        var card_name=data['bi_shortname']+data['cc_cardname']+data['org_nickname']+data['attr_name'];
        var cc_photo=data['cc_photo']==null ? 'CardSample.png' : data['cc_photo'];
        
        cc_DOM.parent().next().html('<img src="../sys/img/'+cc_photo+'"><h4>'+card_name+'</h4><input type="hidden" name="show_card_id" value="'+data['Tb_index']+'">');
        cc_DOM.parent().next().attr('href', '../card/creditcard.php?cc_pk='+data['Tb_index']+'&cc_group_id='+data['cc_group_id']);
        cc_DOM.parent().next().attr('target','_blank');
      }
    }
  });
}
/*==================== 選擇信用卡 顯示 END ===========================*/



//===================== 立即辦卡 BTN ============================
function apply_card(cc_id,ccrank_type,url) {
  $.ajax({
    url: '../ajax/global_ajax.php',
    type: 'POST',
    data: {
      type: 'apply_card',
      ccrank_type:ccrank_type,
      cc_id: cc_id
    },
    success:function (data) {
      window.open(url, '_blank');
    }
  });
}
//===================== 立即辦卡 BTN END =========================



/*==================== 卡排行點閱數 OR 辦卡數 +1 ===========================*/
function cardRank_log(url, rank_id, log_type, target='') {
  $.ajax({
    url: '../ajax/rank_ajax.php',
    type: 'POST',
    data: {
      type: 'cardRank_log',
      rank_id: rank_id,
      log_type: log_type
    },
    success:function (data) {
      console.log(target);
      if (target=='_blank') {
        window.open(url, '_blank');
      }
      else{
        location.href=url;
      }
    }
  });
}
/*==================== 卡排行點閱數 OR 辦卡數 +1 END ===========================*/




/*==================== 新聞PC點閱數&手機點閱數& +1 ===========================*/
// function cardRank_log(url, rank_id, log_type, target='') {
//   $.ajax({
//     url: '../ajax/rank_ajax.php',
//     type: 'POST',
//     data: {
//       type: 'cardRank_log',
//       rank_id: rank_id,
//       log_type: log_type
//     },
//     success:function (data) {
//       if (target=='_blank') {
//         window.open(url, '_blank');
//       }
//       else{
//         location.href=url;
//       }
//     }
//   });
// }
/*==================== 卡排行點閱數 OR 辦卡數 +1 END ===========================*/