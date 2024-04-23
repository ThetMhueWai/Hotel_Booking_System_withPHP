<?php
  include ("connections.php");
  include ("function.php");

  $query="select * from admin";
	$go_query=mysqli_query($connection,$query);
  while($row=mysqli_fetch_array($go_query))
  {
    $adminname=$row['adminname'];
    $email=$row['email'];
    $phone=$row['phone'];
    $cdate=$row['updatedate'];
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Setting</title>
    <link rel="stylesheet" href="../css/allstyles.css">
    <link rel="icon" href="../photo/icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    
  </head>

  <style>
    .content{
      margin-top: 21vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    body{
      background: url('../photo/AdminBG1.jpg');
      background-size: cover;
    }
    .A1{
      background: rgb(0,0,0,0.6);
      font-size: 22px;
      padding-right: 50px;
      padding-left: 50px;
      border: 3px solid #fff;
      border-radius: 10px;
      box-shadow: 0 0 1px rgba(188, 218, 0 , 0.712),
                      0 0 2px rgba(188, 218, 0 , 0.712),
                      0 0 4px rgba(188, 218, 0 , 0.712),
                      0 0 8px rgba(188, 218, 0 , 0.712),
                      0 0 16px rgba(188, 218, 0 , 0.712);
      cursor: pointer;
    }
    .A1 h1{
      color: #fff;
      padding: 20px;
      transition: 1s; 
      font-family: Cambria;
      text-shadow: 0 0 1px rgba(188, 218, 0 , 0.712),
                      0 0 2px rgba(188, 218, 0 , 0.712),
                      0 0 4px rgba(188, 218, 0 , 0.712),
                      0 0 8px rgba(188, 218, 0 , 0.712),
                      0 0 16px rgba(188, 218, 0 , 0.712);
      transition: 1s;
    }
    .A1 h1:hover{
      text-shadow: 0 0 1px rgba(157, 145, 255 , 0.712),
                      0 0 2px rgba(157, 145, 255 , 0.712),
                      0 0 4px rgba(157, 145, 255 , 0.712),
                      0 0 8px rgba(157, 145, 255 , 0.712),
                      0 0 16px rgba(157, 145, 255 , 0.712);
    }
    #A1{
      font-family: Cambria;
      color: #fff;
      font-size: 20px;
      cursor: pointer;
      transition: 1s;
      text-shadow: 0 0 1px rgba(188, 218, 0 , 0.712),
                      0 0 2px rgba(188, 218, 0 , 0.712),
                      0 0 4px rgba(188, 218, 0 , 0.712),
                      0 0 8px rgba(188, 218, 0 , 0.712),
                      0 0 16px rgba(188, 218, 0 , 0.712);
    }
    #A1:hover{
      text-shadow: 0 0 1px rgba(157, 145, 255 , 0.712),
                      0 0 2px rgba(157, 145, 255 , 0.712),
                      0 0 4px rgba(157, 145, 255 , 0.712),
                      0 0 8px rgba(157, 145, 255 , 0.712),
                      0 0 16px rgba(157, 145, 255 , 0.712);
    }
    #A2{
      color: #fff;
      width: 35vh;
      height: 4vh;
      background-color: rgb(0,0,0,0);
      border: none;
      font-family: Cambria;
      font-size: 19px;
      cursor: pointer;
      transition: 1s;
      text-shadow: 0 0 1px rgba(188, 218, 0 , 0.712),
                      0 0 2px rgba(188, 218, 0 , 0.712),
                      0 0 4px rgba(188, 218, 0 , 0.712),
                      0 0 8px rgba(188, 218, 0 , 0.712),
                      0 0 16px rgba(188, 218, 0 , 0.712);
    }
    #A2:hover{
      text-shadow: 0 0 1px rgba(157, 145, 255 , 0.712),
                      0 0 2px rgba(157, 145, 255 , 0.712),
                      0 0 4px rgba(157, 145, 255 , 0.712),
                      0 0 8px rgba(157, 145, 255 , 0.712),
                      0 0 16px rgba(157, 145, 255 , 0.712);
    }
    #A3{
      color: #fff;
      background-color: rgb(0,0,0,0);
      border: none;
      font-size: 17px;
      cursor: pointer;
      transition: 1s; 
      text-shadow: 0 0 1px rgba(188, 218, 0 , 0.712),
                      0 0 2px rgba(188, 218, 0 , 0.712),
                      0 0 4px rgba(188, 218, 0 , 0.712),
                      0 0 8px rgba(188, 218, 0 , 0.712),
                      0 0 16px rgba(188, 218, 0 , 0.712);
    }
    #A3:hover{
      background-color: rgb(0,0,0,0);
      border: none;
      font-size: 17px;
      cursor: pointer;
      text-shadow: 0 0 1px rgba(157, 145, 255 , 0.712),
                      0 0 2px rgba(157, 145, 255 , 0.712),
                      0 0 4px rgba(157, 145, 255 , 0.712),
                      0 0 8px rgba(157, 145, 255 , 0.712),
                      0 0 16px rgba(157, 145, 255 , 0.712);
    }
    #A4{
      color: #fff;
      background-color: rgb(0,0,0,0);
      border: none;
      font-size: 20px;
      cursor: pointer;
      transition: 1s; 
      text-shadow: 0 0 1px rgba(188, 218, 0 , 0.712),
                      0 0 2px rgba(188, 218, 0 , 0.712),
                      0 0 4px rgba(188, 218, 0 , 0.712),
                      0 0 8px rgba(188, 218, 0 , 0.712),
                      0 0 16px rgba(188, 218, 0 , 0.712);
    }
    #A4:hover{
      background-color: rgb(0,0,0,0);
      border: none;
      cursor: pointer;
      transition: 1s; 
      text-shadow: 0 0 1px rgba(157, 145, 255 , 0.712),
                      0 0 2px rgba(157, 145, 255 , 0.712),
                      0 0 4px rgba(157, 145, 255 , 0.712),
                      0 0 8px rgba(157, 145, 255 , 0.712),
                      0 0 16px rgba(157, 145, 255 , 0.712);
    }
    .A1 a{
      text-decoration: none;
    }

    #F1{
      margin:30px;
    }

    #F2{
      color: #fff;
      font-family: Cambria;
      background-color: rgb(0,0,0,0);
      border: none;
      font-size: 19px;
      cursor: pointer;
      transition: 1s;
      text-align: center;
      text-shadow: 0 0 1px rgba(188, 218, 0 , 0.712),
                      0 0 2px rgba(188, 218, 0 , 0.712),
                      0 0 4px rgba(188, 218, 0 , 0.712),
                      0 0 8px rgba(188, 218, 0 , 0.712),
                      0 0 16px rgba(188, 218, 0 , 0.712);
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

    <div class="content">
      <form class="A1">
        <h1 align="center"><i class="fas fa-cogs"></i> Account Setting</h1>
        <div align="center" class="A2">
          <label id="A1"><i class="fas fa-user-shield"></i> Name:</label>
          <input id="A2" type="text" readonly value="<?php echo $adminname;?>">
          <a href="changeinfo.php"><i class="fas fa-edit" id="A3"></i></a>
        </div>
        <hr>
        
        <div align="center">
          <label id="A1"><i class="fas fa-envelope"></i> Email:</label>
          <input id="A2" type="text" readonly value="<?php echo $email;?>">
          <a href="changeinfo.php"><i class="fas fa-edit" id="A3"></i></a>
        </div>
        <hr>
        <div align="center">
          <label id="A1"><i class="fas fa-phone"></i> Phone:</label>
          <input id="A2" type="text" readonly value="<?php echo $phone;?>">
          <a href="changeinfo.php"><i class="fas fa-edit" id="A3"></i></a>
        </div>
        <hr>
        <div align="center">
          <a href="changepassword.php"><label id="A4">Change Password!</label></a>
        </div>
        <div align="center" id="F1">
          <marquee><lable id="F2">Your Password Last Changed On <?php echo $cdate; ?></lable></marquee>
        </div>
      </form>
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