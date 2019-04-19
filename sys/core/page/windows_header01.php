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
    body, .panel-default>.panel-heading{ color: #000; }
    body, html, h1, h2, h3, h4, h5, p, span, a, div{ font-family: Microsoft JhengHei; }
    .btn-link:hover{ color: #000; border: 1px solid; }
    .nowrap{white-space: nowrap;}
    #page-wrapper{ margin:0; }

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