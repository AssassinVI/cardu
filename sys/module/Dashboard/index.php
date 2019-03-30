<?php include("../../core/page/header01.php");//載入頁面heaer01 ?>
<style type="text/css">
    .flot-chart{ height: 250px; }
    .m-b-xl{ margin: 0px; }
    .text-no{ color: #F44336; }
     .c3 svg{ font-size: 11px; }
    .c3-legend-item{ font-size: 13px; }
</style>
<?php include("../../core/page/header02.php");//載入頁面heaer02?>
<?php 
if ($_GET) {
	
	if ($_GET['type']=='contact_del') { //刪除訊息-聯絡
		$where=array('Tb_index'=>$_GET['Tb_index']);
		pdo_delete('appContacts', $where);
	}
    elseif ($_GET['type']=='con_process') { //訊息處理-聯絡
        $param=array("process"=>$_GET['process']);
        $where=array('Tb_index'=>$_GET['Tb_index']);
        pdo_update('appContacts', $param, $where);
    }
    elseif($_GET['type']=='service_del'){ //刪除訊息-維修
        $where=array('Tb_index'=>$_GET['Tb_index']);
        pdo_delete('appService', $where);
    }
    elseif($_GET['type']=='ser_process'){ //訊息處理-維修
        $param=array("is_deal"=>$_GET['process']);
        $where=array('Tb_index'=>$_GET['Tb_index']);
        pdo_update('appService', $param, $where);
    }
}

?>
<div class="wrapper wrapper-content animated fadeInRight">
  
</div>
        
<?php  include("../../core/page/footer01.php");//載入頁面heaer02?>
   <!-- Flot -->
    <script src="../../js/plugins/flot/jquery.flot.js"></script>
    <script src="../../js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="../../js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="../../js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="../../js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="../../js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="../../js/plugins/flot/jquery.flot.time.js"></script>



    <!-- Sparkline -->
    <script src="../../js/plugins/sparkline/jquery.sparkline.min.js"></script>



    <script>
        $(document).ready(function() {

          /*  var sparklineCharts = function(){
                $("#sparkline1").sparkline([34, 43, 43, 35, 44, 32, 44, 52], {
                    type: 'line',
                    width: '100%',
                    height: '50',
                    lineColor: '#1ab394',
                    fillColor: "transparent"
                });

                $("#sparkline2").sparkline([32, 11, 25, 37, 41, 32, 34, 42], {
                    type: 'line',
                    width: '100%',
                    height: '50',
                    lineColor: '#1ab394',
                    fillColor: "transparent"
                });

                $("#sparkline3").sparkline([34, 22, 24, 41, 10, 18, 16,8], {
                    type: 'line',
                    width: '100%',
                    height: '50',
                    lineColor: '#1C84C6',
                    fillColor: "transparent"
                });
            };

            var sparkResize;

            $(window).resize(function(e) {
                clearTimeout(sparkResize);
                sparkResize = setTimeout(sparklineCharts, 500);
            });

            sparklineCharts();*/

<?php 
  $pdo=pdo_conn();
  $sql=$pdo->prepare("SELECT * FROM OneDayChart ORDER BY ChartDate DESC LIMIT 0,30");
  $sql->execute();
?>

      //每日使用人數
      c3.generate({
                bindto: '#date_use',
                data:{
                   x:'x',
                   xFormat: '%Y%m%d',
                    columns: [

                    <?php 
                       
                       $date_txt="['x',";
                       $num_txt="['使用人數',";
                       $i=0;
                      while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {

                        $date=explode('-', $row['ChartDate']);
                        $day=$date[0].$date[1].$date[2];

                            $date_txt.="'".$day."',";
                            $num_txt.= $row['ChartNum'].",";
                        $i++;
                      }
                         $date_txt.="],";
                         $num_txt.= "],";
                        echo $date_txt;
                        echo $num_txt;
                      $pdo=NULL;
                      ?>
                       
                    ],
                    colors:{
                        data1: '#1ab394',
                        
                    },
                    type: 'line',
                    labels: true
                },
                axis:{
                   x:{
                     type:'timeseries',
                      tick:{
                          
                          count:4,
                          format: '%m-%d'
                      }
                   }
                }
            });



           /* var data1 = [
                [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,20],[11,10],[12,13],[13,4],[14,7],[15,8],[16,12]
            ];
            var data2 = [
                [0,0],[1,2],[2,7],[3,4],[4,11],[5,4],[6,2],[7,5],[8,11],[9,5],[10,4],[11,1],[12,5],[13,2],[14,5],[15,2],[16,0]
            ];
            $("#flot-dashboard5-chart").length && $.plot($("#flot-dashboard5-chart"), [
                        data1
                    ],
                    {
                        series: {
                            lines: {
                                show: false,
                                fill: false
                            },
                            splines: {
                                show: true,
                                tension: 0.4,
                                lineWidth: 1,
                                fill: 0.4
                            },
                            points: {
                                radius: 0,
                                show: true
                            },
                            shadowSize: 2
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,

                            borderWidth: 2,
                            color: 'transparent'
                        },
                        colors: ["#1ab394", "#1C84C6"],
                        xaxis:{
                        },
                        yaxis: {
                        },
                        tooltip: false
                    }
            );*/

        });
    </script>

<?php  include("../../core/page/footer02.php");//載入頁面heaer02?>

