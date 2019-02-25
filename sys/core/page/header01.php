<?php
include "../../core/inc/config.php"; //載入基本設定
include "../../core/inc/function.php"; //載入基本function
require '../../core/inc/pdo_fun_calss.php'; //新PDO
include "../../core/inc/security.php"; //載入安全設定
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

    <title><?php echo $company['name'] ?> | ADMIN</title>
     <link rel="shortcut icon" href="/newsite/favicon.ico" />

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
       body, html, h1, h2, h3, h4, h5, p, span, a, div{ font-family: Microsoft JhengHei; }
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
            #one_img{ width: 150px; border:1px solid #d6d6d6; padding: 3px;}
            #one_del_img, .one_del_img,#one_del_file,.one_del_file,#one_del_video{ position: absolute; border: 0px; background-color: #ff243b; color: #fff; box-shadow: 1px 1px 2px rgba(0,0,0,0.5);}
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
     </style>