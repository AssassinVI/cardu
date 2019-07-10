<?php 
 require '../share_area/conn.php';
 //-- 判斷登入會員 --
 check_member();
?>
<!DOCTYPE html>

<html lang="zh-Hant-TW">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />



    <title>卡優新聞網-會員中心</title>

    <meta name="keywords" content="信用卡,金融卡,悠遊卡,一卡通,icash,電子票證,現金回饋,紅利,信用卡比較,信用卡優惠,首刷禮,辦卡,新卡,卡訊,行動支付,小額消費,新聞,理財,消費,3C,旅遊,日本,住宿,美食,電影,交通,好康,加油,報稅"/>  
    <meta name="description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" /> 

    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <meta property="fb:admins" content="100000121777752" />
    <meta property="fb:admins" content="100008160723180" />
    <meta property="fb:app_id" content="616626501755047" />
    <meta property="og:site_name" content="卡優新聞網" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:title" content="卡優新聞網" />
    <meta property="og:description" content="卡優新聞網-最專業、最完整的信用卡、金融卡、電子票證等支付卡之新聞、資訊、優惠的情報平台，並報導財經、投資、購物、生活、旅遊、娛樂、電影、藝文、3C等相關新聞，提供消費者理財消費訊息、優惠好康、生活情報及社群討論資訊。" />
    <meta property="og:url" content="https://www.cardu.com.tw" />
    <meta property="og:see_also" content="https://www.cardu.com.tw" />
      
      
    <?php 
     //-- 共用CSS --
     require '../share_area/share_css.php';
    ?>

    <!-- 行事曆套件 -->
    <link rel="stylesheet" type="text/css" href="../vendor/fullcalendar/core/main.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/fullcalendar/daygrid/main.min.css">
    <style type="text/css">
      a.fc-more{ background-color: #ccc; padding: 5px; }
    </style>

  </head>
  <body class="member_body">

    <div class="show_title"></div>

    <div class="container">

        <?php 
         //-- 共用Header --
         if (wp_is_mobile()) {
          require '../share_area/phone/header.php';
         }
         else{
          require '../share_area/header.php';
         }
        ?>
        
        <!-- 麵包屑 -->
        <div class="row ">
          <div class="col-12">
            <p class="crumbs"><i class="fa fa-angle-right"></i> <a href="index.php">首頁</a> / <a href="javascript:;">會員中心</a>/ <a href="javascript:;">我的行事曆</a></p>
          </div>
        </div>
        
        
        <!--版面--->
        <div class="row">
            <!--版面左側-->
            <div class="index-content-left col0">


                
                <div class="row">

                    <div class="col-md-12 col pb-3 detail_content">
                    <div class="cardshap primary_tab mouseHover_other_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item news_tab">
                            <a class="nav-link py-2 flex-x-center active show" id="goodMember-tab" href="javascript:;" tab-target="#goodMember" aria-selected="true">我的行事曆</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade active show" id="goodMember" role="tabpanel" aria-labelledby="goodMember-tab">

                            <div id="calendar">
                              
                            </div>

                            
                          </div>
                        </div>
                      </div>
                    
                  </div>


                    
                   

                  <div class="test-google">
                    
                  </div>
                  
                    
                    

                   

                    

                   




                </div>
            </div>
            <!--版面左側end-->
            
            <!--版面右側-->
            <?php 
             require 'right_area_div.php';
            ?>
            <!--版面右側end-->
        </div>
        <!--版面end-->
        
        
        
        
        
    </div><!-- container end-->


    <?php 
      //-- 共用js --
      require '../share_area/share_js.php';
    ?>
     
    <!-- 行事曆套件 -->
    <script type="text/javascript" src="../vendor/fullcalendar/core/main.min.js"></script>
    <script type="text/javascript" src="../vendor/fullcalendar/daygrid/main.min.js"></script>
    <script type="text/javascript" src="../vendor/fullcalendar/google-calendar/main.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {

        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          plugins: [ 'dayGrid' ],
          header:{
            left:'',
            center: 'title',
            right:''
          },
          footer:{
            left: 'today',
            right:'prev,next,prevYear,nextYear'
          },
          locale:'zh-tw',
          buttonText:{
            today:'今天',
            prev:'上個月',
            next:'下個月',
            prevYear:'上一年',
            nextYear:'下一年'
          },
          events:{
            url:'mydate_ajax.php',
            textColor: '#fff',
          },
          eventLimit:true,
          views: {
              timeGrid: {
                eventLimit: 6 // adjust to 6 only for timeGridWeek/timeGridDay
              }
          },
          eventClick: function(calEvent, jsEvent, view){
            window.open(calEvent.event.url, '_blank');
            
            $('#calendar').on('click', '.fc-day-grid-event', function(event) {
              event.preventDefault();
            });
          },
          eventMouseEnter:function (calEvent, jsEvent, view) {
            // console.log(calEvent.jsEvent);
            $('.show_title').html(calEvent.event.title);
            $('.show_title').css('display', 'block');
            $('.show_title').css('top', calEvent.jsEvent.pageY+5);
            $('.show_title').css('left', calEvent.jsEvent.pageX+5);
          },
          eventMouseLeave:function (calEvent, jsEvent, view) {
            $('.show_title').css('display', 'none');
          }
        });

         calendar.render();


        // var calendarEl = document.getElementById('calendar');
        // var calendar = new FullCalendar.Calendar(calendarEl, {
        //     plugins: [ 'dayGrid', 'googleCalendar' ],
        //     googleCalendarApiKey: 'AIzaSyDRGAvOvV1LL9ohgNdTM4KXyQOaWm_bnk8',
        //     events: {
        //       googleCalendarId: '7vrqu787rmh2ujut1bpdfvqdjs@group.calendar.google.com'
        //     }
        // });

        // calendar.render();

      });



    </script>

  </body>
</html>