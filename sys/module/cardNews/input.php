<?php
 require '../../core/inc/config.php';
 require '../../core/inc/function.php';

 $pdo=pdo_conn();

//  $sql=$pdo->prepare("SELECT news.*, tar.label_arr, ba.bank_arr, oa.org_arr FROM 
// newsOLD AS news LEFT JOIN tag_arr AS tar ON news.ns_pk=tar.ntp_ns_pk 
// LEFT JOIN bank_arr AS ba ON news.ns_pk=ba.nb_ns_pk 
// LEFT JOIN org_arr AS oa ON news.ns_pk=oa.no_ns_pk 
// LIMIT 40000,5000");
//  $sql->execute();
 $num=1;
 while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
 	$Tb_index='news'.date('YmdHis').$num; 

 	switch ($row['ns_nt_pk']) {
 		case 4:
 			$ns_nt_pk='nt2018111912023989';
 			break;
 		case 5:
 			$ns_nt_pk='nt2018111914395217';
 			break;
 		case 6:
 			$ns_nt_pk='nt2018111914393966';
 			break;
 		case 7:
 			$ns_nt_pk='nt2018111914391882';
 			break;
 		case 8:
 			$ns_nt_pk='nt201811191439001';
 			break;
 		case 22:
 			$ns_nt_pk='nt2018111914403239';
 			break;
 		case 26:
 			$ns_nt_pk='nt2018111914392956';
 			break;
 		case 27:
 			$ns_nt_pk='nt2018111914401768';
 			break;
 		case 28:
 			$ns_nt_pk='nt2018111914402479';
 			break;
 		case 58:
 			$ns_nt_pk='nt2018111914391081';
 			break;
 		default:
 			$ns_nt_pk=$row['ns_nt_pk'];
 			break;
 	}


 	switch ($row['ns_nt_sp_pk']) {
 		case 54:
 			$ns_nt_sp_pk='nt2018111912315489';
 			break;
 		case 49:
 			$ns_nt_sp_pk='nt2018113011514970';
 			break;
 		case 44:
 			$ns_nt_sp_pk='nt201811301152446';
 			break;
 		case 31:
 			$ns_nt_sp_pk='nt201811301153190';
 			break;
 		case 56:
 			$ns_nt_sp_pk='nt2018113011545322';
 			break;
 		default:
 			$ns_nt_sp_pk=$row['ns_nt_sp_pk'];
 			break;
 	}
    $bank_arr=empty($row['bank_arr']) ? '':$row['bank_arr'];
    $org_arr=empty($row['org_arr']) ? '':$row['org_arr'];
    $label_arr=empty($row['label_arr']) ? '':$row['label_arr'];

 	$ns_photo_3=empty($row['ns_photo_3']) ? '':$row['ns_photo_3'];
 	$ns_alt_3=empty($row['ns_alt_3']) ? '':$row['ns_alt_3'];
 	$ns_vfman_1=empty($row['ns_vfman_1']) ? '':$row['ns_vfman_1'];
 	$ns_vfman_1_name=empty($row['ns_vfman_1_name']) ? '':$row['ns_vfman_1_name'];
 	$ns_vfman_2_name=empty($row['ns_vfman_2_name']) ? '':$row['ns_vfman_2_name'];
 	$ns_linetoday_date=empty($row['ns_linetoday_date']) ? '':$row['ns_linetoday_date'];

 	$param=  [        'Tb_index'=>$Tb_index,
 	                  'mt_id'=>'site2018111917514269',
			          'ns_nt_pk'=> $ns_nt_pk,
			          'ns_nt_sp_pk'=> $ns_nt_sp_pk,
			          'ns_bank'=>$bank_arr,
			          'ns_org'=>$org_arr,
			          'ns_ftitle'=>$row['ns_ftitle'],
			          'ns_stitle'=>$row['ns_stitle'],
			          'ns_msghtml'=>$row['ns_msghtml'],
			          'ns_photo_1'=>$row['ns_photo_1'],
			          'ns_alt_1'=>$row['ns_alt_1'],
			          'ns_photo_2'=>$row['ns_photo_2'],
			          'ns_alt_2'=>$row['ns_alt_2'],
			          'ns_photo_3'=>$ns_photo_3,
			          'ns_alt_3'=>$ns_alt_3,
			          'ns_viewcount'=>$row['ns_viewcount'],
			          'ns_mobvecount'=>$row['ns_mobvecount'],
			          'ns_proj_viewcount'=>$row['ns_proj_viewcount'],
			          'ns_reporter'=>$row['ns_reporter'],
			          'ns_reporter_type'=>$row['ns_reporter_type'],
			          'ns_kiman'=>$row['ns_kiman'],
			          'ns_vfman_1'=>$ns_vfman_1,
			          'ns_vfman_1_name'=>$ns_vfman_1_name,
			          'ns_vfman_2'=>$row['ns_vfman_2'],
			          'ns_vfman_2_name'=>$ns_vfman_2_name,
			          'ns_label'=>$label_arr,
			          'ns_cdate'=>$row['ns_cdate'],
			          'ns_date'=>$row['ns_date'],
			          'ns_vfdate'=>$row['ns_vfdate'],
			          'StartDate'=>$row['ns_pdate_b'],
			          'EndDate'=>$row['ns_pdate_e'],
			          'ns_rss_date'=>$row['ns_rss_date'],
			          'ns_linetoday_date'=>$ns_linetoday_date,
			          'ns_del_flag'=>$row['ns_del_flag'],
			          'ns_sort'=>$row['ns_sort'],
			          'ns_sort2'=>$row['ns_sort2'],
			          'ns_nt_pk_sort'=>$row['ns_nt_pk_sort'],
			          'ns_nt_sp_pk_sort'=>$row['ns_nt_sp_pk_sort'],
			          'ns_verify'=>$row['ns_verify']
			         ];
	pdo_insert('appNews', $param);

	 $num++;
 }




?>