<?php
include "../../core/inc/config.php"; //載入基本設定
include "../../core/inc/function.php"; //載入基本function
require '../../core/inc/pdo_fun_calss.php'; //新PDO
include "../../core/inc/security.php"; //載入安全設定
require '../../../share_area/func.php';
?>
<?php
//-- 新 PDO --
$NewPdo=new PDO_fun;

$company = pdo_select("SELECT * FROM company_base WHERE webLang='tw'", 'no');

//-- 父層 ID --
$parent_id=pdo_select("SELECT parent_id FROM maintable WHERE Tb_index=:Tb_index", ['Tb_index'=>$_GET['MT_id']]);
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="pragma" content="no-cache">

    <title><?php echo $company['name'] ?> | ADMIN</title>
     <link rel="shortcut icon" href="/newsite/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="../../css/animate.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../css/news_style.css">
     <link href="../../css/msism.css" rel="stylesheet">
     <!-- C3 Chart -->
     <link rel="stylesheet" type="text/css" href="../../css/plugins/c3/c3.min.css">

     <!-- DataTables -->
     <link rel="stylesheet" type="text/css" href="../../css/jquery.dataTables.css">

     <!-- FancyBox -->
     <link rel="stylesheet" type="text/css" href="../../js/plugins/fancyBox/jquery.fancybox.min.css">

     <style type="text/css">
        body, .panel-default>.panel-heading, .form-control, .single-line{ color: #000; font-size: 15px;}
        body, html, h1, h2, h3, h4, h5, p, span, a, div{ font-family: Microsoft JhengHei; }
        a:hover{ text-decoration: underline; }
        .btn-link{ padding: 5px; color: blue; }
        .btn-link:hover{ color: #000; border: 1px solid; }
        .label{ color: #000; font-weight: 500; font-size: 13px;}

        .nowrap{white-space: nowrap;}

        .tool-width{ width: 20px; }

        .dis-none{display: none;}

        .title_w{ width: 405px; }
        .imgTxt_w{ width: 780px; }
        
        .px-1{ padding-left: 20px; padding-right: 20px; }
        .px-2{ padding-left: 40px; padding-right: 40px; }
         
         .fancybox-slide--iframe{ padding:0 44px 0; }
         .fancybox-slide--iframe .fancybox-content { width  : 800px; max-width  : 80%; height : 95%;margin: 0;}

 
         #table_id_example tbody tr:hover, table.dataTable.display tbody tr:hover > .sorting_1, table.dataTable.order-column.hover tbody tr:hover > .sorting_1{ background-color: #ccc; }
         #table_id_example tbody tr:hover, table.dataTable.display tbody tr:hover > .sorting_2, table.dataTable.order-column.hover tbody tr:hover > .sorting_2{ background-color: #ccc; }

         table.dataTable tbody th, table.dataTable tbody td{ padding: 8px 5px; }


        
        .active_lang{ padding: 6px 20px; margin: 2px; font-size: 14px; background: #1690d8; color: #fff;}
        #cLogo{ color: #0e9aef; margin-bottom: 2rem;}
         body.skin-1{ background: #1e2c42; }
         .skin-1 .nav > li > a{ color: #e1e1e1; }
         .skin-1 .nav-header{ background-size: cover; }
         .skin-1 .nav > li.active{ background: #0f547d; }
         .navbar-default .landing_link a, .navbar-default .special_link a{ background: #1587cc; }
         .navbar-default .landing_link a:hover, .navbar-default .special_link a:hover, .navbar-default .special_link a:focus{ background: #1590d8 !important; }
        .close_btn{ position: absolute; bottom: 0px; right: 15px; border: 0px; }
         .new_div{ position: absolute; right: 0px; bottom: 0px; }
         .twzipcode{ display: inline-block; }
         .twzipcode input, .twzipcode select ,.adds{ font-size: 14px; padding: 5px; border: 1px solid #d6d6d6; }
         .adds{ width: 300px; }
             #one_img{ height: 110px; border:1px solid #d6d6d6; padding: 3px;}
             #one_del_img, #one_del_img_hover, .one_del_img, #one_del_file,.one_del_file,#one_del_video{ position: absolute; border: 0px; background-color: #ff243b; color: #fff; box-shadow: 1px 1px 2px rgba(0,0,0,0.5);}
         .img_check{ position: absolute; top: 40px; left: 75px; background: rgba(26,179,148,1); padding: 7px 10px; border-radius: 50px; font-size: 15px; color: #ffffff; display:none; }
         .sort_in{ padding: 3px 5px; width: 40px; border-radius: 3px; border: 1px solid #b6b6b6; }
         #img_div{ float: left; }
         #img_div p, .file_div p ,#video_div p{ margin: 0px; padding: 3px; text-align: center; background: #d6d6d6; }
         .old_img_div{ display: inline-block; text-align: center; border: 1px solid #cfcfcf; padding-bottom: 5px; }
         .old_img_div p{ background-color: #b8b8b8; color: #fff; font-size: 15px; }
         .checkbox{ width: 16px; height: 16px; }
         .file_div{ display: inline-block; overflow: hidden; height: 150px; }

         .page{ font-size: 18px; text-align: center; padding: 10px 0px;}
         .page span{ padding: 2px 8px; margin-left: 3px; background: #009587; color: #fff; }
         .page a{ padding: 2px 8px; color: #009688; margin-left: 3px; border: 1px solid #e1e1e1; }

         .panel_tool_div{ display: inline-block; float: right; }
         .panel_tool_div button, .panel_tool_div a, 
         .panel_tool_div button:hover, .panel_tool_div a:hover, 
         .panel_tool_div button:focus, .panel_tool_div a:focus{ color: #000; }
         .overflow-body{ overflow: auto; height: 75vh;  }

         /* -- DataTable --*/
         /*-- 讀取動畫 --*/
         .ns_loading{
           display: none;
           position: absolute;
           width: 100%;
           height: 100%;
           top: 0;
           left: 0;
           display: flex;
           justify-content: center;
           align-items: center;
           font-size: 25px;
           text-align: center;
         }


         /*-- 信用卡功能 (checkbox) --*/
         .card_func{ position: relative; margin: 5px;}
         .card_func input{ position: absolute; margin:0; top:0; right: 0; width: 15px; height: 15px; }

         /*-- 信用卡優惠 (checkbox) --*/
         .card_pref{ margin: 5px; padding: 3px; border: 1px solid #ccc; border-radius: 5px; }

         /*-- 信用卡權益 --*/
         #eq_list div{ border-bottom: 1px solid #ccc; }
         #eq_list div a{display: inline-block; padding:8px 0; font-size: 15px; }
         #interest_div, .schedule_div{ display: none; }
     </style>