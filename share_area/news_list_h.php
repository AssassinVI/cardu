<?php 
                    //=================================================================
                    //取出資料，並處理分頁
                    //=================================================================
                      $total=$pdo->prepare($sql_temp); 
                      $total->execute();
                      $row_count = $total->fetchAll();
                      $no = count($row_count)-12; //減 12是為了扣掉上頭 12筆輪播資料

                      

                      $num=12; //每頁顯示條數 -------------------------------------------
                      $totalpage=ceil($no/$num);  //計算頁數 ---------------------------
                   

                      if(isset($_GET['PageNo']) && $_GET['PageNo']<=$totalpage){
                      //這裡做了一個判斷，若get到資料並且該資料小於總頁數情況下才付給當前頁引數，否則跳轉到第一頁 
                      $PageNo=intval($_GET['PageNo']); 
                      }else{ 
                      $PageNo=1; 
                      } 

                      $start = ($PageNo-1)*$num+12; //每一頁開始的資料序號-------------------//加 12是為了從第 12筆輪播資料

                      $sql_temp.=" LIMIT $start, $num";

                      $sql=$pdo->prepare($sql_temp);
                      $sql->execute();
                      $rows = $sql->fetchAll();

                     //echo $sql_temp;

                      $i=1;
                      foreach ($rows as $row) {
                        $id=$row['Tb_index'];
                        $ns_ftitle=$row['ns_ftitle'];
                        $ns_stitle=mb_substr(strip_tags($ns_ftitle),0, 15,"utf-8");
                        $ns_photo_1="../sys/img/".$row['ns_photo_1'];
                        $ns_msghtml=mb_substr(myTrim(strip_tags($row['ns_msghtml'])),0, 18,"utf-8");
                        $StartDate = $row['StartDate'];


                        //======================================================
                        //將資料結構暫存於陣列，之後再興框架 及 banner 結合
                        //======================================================
                        $Date[$i]="<div class='row no-gutters py-md-3 mx-md-4 py-2 news_list'>
                          <div class='col-md-4 col-5'>
                            <a class='img_div news_list_img' href='detail.php?$id' title='$ns_ftitle' style='background-image: url($ns_photo_1);'></a>
                          </div>
                          <div class='col-md-8 col-7 pl-4 py-1 news_list_txt'>
                            <a href='detail.php?$id' title='$ns_ftitle'>
                            <h3>$ns_ftitle <small class='phone_hidden'>($StartDate)</small></h3>
                            <p>$ns_msghtml...</p>
                            </a>
                            <div class='fb_search_btn'>
                              <iframe src='https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fcardu.srl.tw%2Fnews%2Fdetail.php%3F$id&width=90&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId=563666290458260' width='90' height='46' style='border:none;overflow:hidden' scrolling='no' frameborder='0' allowTransparency='true' allow='encrypted-media'></iframe>
                            </div>
                          </div>
                        </div>";
                        
                      $i++;}

                      $Date['header']="<div class='col-md-12 col'>
                      <div class='cardshap redius_bg'>";
                      $Date['fooder']="</div>
                      </div>";

                      $countArea = ceil($i/4); 
                      //echo $totalArea;


                    ?>