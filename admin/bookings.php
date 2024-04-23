<?php
  include ("connections.php");
  include ("function.php");

  $query="select * from admin";
	$go_query=mysqli_query($connection,$query);
  while($row=mysqli_fetch_array($go_query))
  {
    $adminname=$row['adminname'];
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings</title>
    <link rel="stylesheet" href="../css/fileslists.css">
    <link rel="icon" href="../photo/icon.png">
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
  </head>

  <style>
    body{
        background: #08001b;
    }
    .container{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        margin: 50px 0;
        cursor: pointer;
    }
    .container .card{
        position: relative;
        min-width: 320px;
        height: 440px;
        box-shadow: 0 0 1px rgba(173, 216, 230 , 0.712),
                      0 0 2px rgba(173, 216, 230 , 0.712),
                      0 0 4px rgba(173, 216, 230 , 0.712),
                      0 0 8px rgba(173, 216, 230 , 0.712),
                      0 0 16px rgba(173, 216, 230 , 0.712);
        border-radius: 15px;
        margin: 30px;
    }
    .container .card:hover{
        transition: 1s;
        box-shadow: 0 0 1px rgba(255, 255, 255, 0.1),
                      0 0 2px rgba(255, 255, 255, 0.1),
                      0 0 4px rgba(255, 255, 255, 0.1),
                      0 0 8px rgba(255, 255, 255, 0.1);
    }
    .container .card .box{
        position: absolute;
        top: 20px;
        left: 20px;
        right: 20px;
        bottom: 20px;
        background: #0c002b;
        border: 2px solid #0c002b;
        border-radius: 15px;
        box-shadow: 0 0 1px rgba(12, 0, 43, 0.712),
                      0 0 2px rgba(12, 0, 43, 0.712),
                      0 0 4px rgba(12, 0, 43, 0.712),
                      0 0 8px rgba(12, 0, 43, 0.712);
        transition: 0.5s;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
    }
    .container .card .box::before{
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 50%;
        height: 100%;
        background: rgba(255,255,255,0.1);
        pointer-events: none;
    }
    .container .card .box:hover{
        border: none;
        transform: translateY(-50px);
        box-shadow: 0 0 1px rgba(173, 216, 230 , 0.712),
                      0 0 2px rgba(173, 216, 230 , 0.712),
                      0 0 4px rgba(173, 216, 230 , 0.712),
                      0 0 8px rgba(173, 216, 230 , 0.712),
                      0 0 16px rgba(173, 216, 230 , 0.712);  
    }
    .container .card .box .content{
        padding: 20px;
        text-align: center; 
    }
    .container .card .box .content h2{
        position: absolute;
        top: -11.5vh;
        right: 1vh;
        font-family: 'Poppins', sans-serif;
        font-size: 5em;
        font-weight: 800;
        color: rgba(255,255,255,0.2);
    }
    .container .card .box .content h3{
        font-size: 1.8em;
        color: rgba(255,255,255,0.6);
        z-index: 1;
        transition: 0.5s;
    }
    .container .card .box .content p{
        font-size: 16px;
        font-weight: 300;
        color: rgba(255,255,255,0.6);
        z-index: 1;
        transition: 0.5s;
    }
    .container .card .box .content a{
        position: relative;
        display: inline-block;
        padding: 8px 20px;
        background: #FFF;
        margin-top: 15px;
        border-radius: 20px;
        text-decoration: none;
        font-weight: bold;
        color: #0c002b;
    }
    .container .card .box .content a:hover{
        transition: 1s;
        border: 2px solid #fff;
        background: #000;
        color: #fff;
    }
  </style>

  <body>

    <input type="checkbox" id="check">
    <!--header area start-->
    <header>
      <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
      </label>
      <div class="left_area">
        <h3>Hotel <span>Delluna</span></h3>
      </div>
      <div align="right_area">
        <a href="logout.php" class="logout_btn"><i class="fas fa-power-off"></i></a>
      </div>
    </header>
    <!--header area end-->
    <!--mobile navigation bar start-->
    <div class="mobile_nav">
      <div class="nav_bar">
        <img src="../photo/admin.png" class="mobile_profile_image" alt="">
        <i class="fa fa-bars nav_btn"></i>
      </div>
      <div class="mobile_nav_items">
        <a href="dashboard.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="insertfiles.php"><i class="fas fa-folder-plus"></i><span>Insert Files</span></a>
        <a href="fileslists.php"><i class="fas fa-table"></i><span>Files Lists</span></a>
        <a href="bookings.php"><i class="fas fa-list-alt"></i><span>Bookings</span></a>
        <a href="account.php"><i class="fas fa-user-cog"></i><span>Account Setting</span></a>
        <a href="manageuser.php"><i class="fas fa-users"></i><span>Users Management</span></a>
        <a href="about.php"><i class="fas fa-info-circle"></i><span>About Us</span></a>
      </div>
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    <div class="sidebar">
      <div class="profile_info">
        <img src="../photo/admin.png" class="profile_image" alt="">
        <h4 style="text-transform: capitalize; text-align:center">Welcome Admin,<br><?php echo "$adminname"; ?></h4>
      </div>
        <a href="dashboard.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="insertfiles.php"><i class="fas fa-folder-plus"></i><span>Insert Files</span></a>
        <a href="fileslists.php"><i class="fas fa-table"></i><span>Files Lists</span></a>
        <a href="bookings.php"><i class="fas fa-list-alt"></i><span>Bookings</span></a>
        <a href="account.php"><i class="fas fa-user-cog"></i><span>Account Setting</span></a>
        <a href="manageuser.php"><i class="fas fa-users"></i><span>Users Management</span></a>
        <a href="about.php"><i class="fas fa-info-circle"></i><span>About Us</span></a>
    </div>
    <!--sidebar end-->

    <div class="content1">
        <div class="container">
            <div class="card">
                <div class="box">
                    <div class="content">
                        <h2>
                          <?php
                            $total="select * from roombooking";
                            $get_total=mysqli_query($connection,$total);
                            $num=mysqli_num_rows($get_total);
                            if($num<10){
                                echo "0".$num; 
                            }
                            else{
                                echo $num; 
                            }
                          ?>
                        </h2>
                        <h3>Room</h3>
                        <p style="background: rgba(0,0,0,0)">At room booking, you can see the details of room bookings: pending and delete actions<br> are avalible.</p>
                        <a href="roombooking.php">Bookings</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="box">
                    <div class="content">
                        <h2>
                          <?php
                            $total="select * from ballroombooking";
                            $get_total=mysqli_query($connection,$total);
                            $num=mysqli_num_rows($get_total);
                            $num1=$num;

                            $total="select * from meetingbooking";
                            $get_total=mysqli_query($connection,$total);
                            $mnum=mysqli_num_rows($get_total);
                            $num2=$mnum;

                            $totalnum=$num1+$num2;
                            
                            if($totalnum<10){
                              echo "0".$totalnum; 
                            }
                            else{
                                echo $totalnum; 
                            }
                          ?>
                        </h2>
                        <h3>Ballroom</h3>
                        <p style="background: rgba(0,0,0,0)">At ballroom booking, you can see the details of ballroom bookings: pending and delete actions are avalible.</p>
                        <a href="ballroombookings.php">Bookings</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="box">
                    <div class="content">
                        <h2>
                          <?php
                            $total="select * from tablebooking";
                            $get_total=mysqli_query($connection,$total);
                            $num=mysqli_num_rows($get_total);
                            if($num<10){
                                echo "0".$num; 
                            }
                            else{
                                echo $num; 
                            }
                          ?>
                        </h2>
                        <h3>Table</h3>
                        <p style="background: rgba(0,0,0,0)">At table booking, you can see the details of table bookings: pending and delete actions<br> are avalible.</p>
                        <a href="tablebooking.php">Bookings</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });
    });
    </script>

  </body>
</html>