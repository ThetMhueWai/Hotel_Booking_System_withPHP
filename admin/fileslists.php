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
    <title>Files Lists</title>
    <link rel="stylesheet" href="../css/fileslists.css">
    <link rel="icon" href="../photo/icon.png">
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
  </head>

  <style>
    body{
        background: #08001b;
    }
    .content{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .content1{
        padding: 4vh;
        display: flex;
        justify-content: center;
        align-items: center;
        width: (100% - 250px);
        margin-top: 12vh;
        margin-left: 250px;
        transition: 0.5s;
    }

    .container{
        font-family: "Roboto", Cambria;
        width: 1100px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    }

    .container .card{
        font-family: "Roboto", Cambria;
        position: relative;
        width: 300px;
        height: 400px;
        background: #0c002b;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 10vh;
        text-shadow: 0 0 1px rgba(0, 10, 127 , 0.712),
                      0 0 2px rgba(0, 10, 127 , 0.712),
                      0 0 4px rgba(0, 10, 127 , 0.712),
                      0 0 8px rgba(0, 10, 127 , 0.712);
        box-shadow: 0 0 1px rgba(173, 216, 230 , 0.712),
                      0 0 2px rgba(173, 216, 230 , 0.712),
                      0 0 4px rgba(173, 216, 230 , 0.712),
                      0 0 8px rgba(173, 216, 230 , 0.712),
                      0 0 16px rgba(173, 216, 230 , 0.712);
        overflow: hidden;
    }

    .container .card:hover{
        box-shadow: none;
        border: none;
    }

    .container .card::before{
        content: '';
        position: absolute;
        top: 2px;
        left: 2px;
        bottom: 2px;
        width: 50%;
        background: rgba(255,255,255,0.1);
        pointer-events: none;
    }

    .container .card .content{
        padding: 30px;
        text-align: center;
    }

    .container .card .content h2{
        position: absolute;
        font-family: 'Poppins', sans-serif;
        right: 20px;
        font-size: 4em;
        font-weight: 800;
        color: rgb(255,255,255);
        z-index: 1;
        opacity: 0.05;
        transition: 0.5s;
        text-shadow: 0 0 1px rgba(0, 10, 127 , 0.712),
                      0 0 2px rgba(0, 10, 127 , 0.712),
                      0 0 4px rgba(0, 10, 127 , 0.712),
                      0 0 8px rgba(0, 10, 127 , 0.712),
                      0 0 16px rgba(0, 10, 127 , 0.712);
    }

    .container .card:hover .content h2{
        opacity: 1;
        transform: translateY(-130px);
    }

    .container .card .content h3{
        position: relative;
        font-size: 1.5em;
        color: #fff;
        z-index: 2;
        opacity: 0.7;
        letter-spacing: 1px;
        transition: 0.5s;
    }

    .container .card .content p{
        position: relative;
        background: (0,0,0,0);
        font-size: 1em;
        color: #fff;
        z-index: 2;
        opacity: 0.5;
        font-weight: 300;
        transition: 0.5s;
    }

    .container .card:hover .content h3,
    .container .card:hover .content p{
        opacity: 1;
    }

    .container .card .content a{
        display: inline-block;
        margin-top: 15px;
        padding: 8px 15px;
        background: #fff;
        color: #0c002b;
        text-decoration: none;
        text-transform: uppercase;
        font-weight: 600;
        border-radius: 2px;
        text-shadow: none;
    }

    .container .card span{
        transition: 0.5s;
        opacity: 0;
    }

    .container .card:hover span{
        opacity: 1;
    }

    .container:hover .card{
        opacity:0.2;
    }

    .container .card:hover{
        opacity: 1;
    }

    .container .card span:nth-child(1){
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: linear-gradient(to right, transparent, #1779ff);
        animation: animate1 2s linear infinite;
    }

    @keyframes animate1{
        0%{
            transform: translateX(-100%);
        }
        100%{
            transform: translateX(100%);
        }
    }

    .container .card span:nth-child(2){
        position: absolute;
        top: 0;
        right: 0;
        width: 3px;
        height: 100%;
        background: linear-gradient(to bottom, transparent, #1779ff);
        animation: animate2 2s linear infinite;
        animation-delay: 1s;
    }

    @keyframes animate2{
        0%{
            transform: translateY(-100%);
        }
        100%{
            transform: translateY(100%);
        }
    }

    .container .card span:nth-child(3){
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: linear-gradient(to left, transparent, #1779ff);
        animation: animate3 2s linear infinite;
    }

    @keyframes animate3{
        0%{
            transform: translateX(100%);
        }
        100%{
            transform: translateX(-100%);
        }
    }

    .container .card span:nth-child(4){
        position: absolute;
        top: 0;
        left: 0;
        width: 3px;
        height: 100%;
        background: linear-gradient(to top, transparent, #1779ff);
        animation: animate4 2s linear infinite;
        animation-delay: 1s;
    }

    @keyframes animate4{
        0%{
            transform: translateY(100%);
        }
        100%{
            transform: translateY(-100%);
        }
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
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <div class="content">
                <h2>
                    <?php
                        $total="select * from room";
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
                <h3>Room Lists</h3>
                <p style="background: rgb(0,0,0,0);">At rommlists, you can see<br> the details of roomlists: edit and delete features are avalible.</p>
                <a href="roomlists.php">Room Lists</a>
            </div>
        </div>
            <div class="card">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <div class="content">
                    <h2>
                        <?php
                            $total="select * from ballroom";
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
                    <h3>Ballroom Lists</h3>
                    <p style="background: rgb(0,0,0,0);">At ballrommlists, you can see the details of ballroomlists: edit and delete features are avalible.</p>
                    <a href="ballroomlists.php">Ballroom Lists</a>
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