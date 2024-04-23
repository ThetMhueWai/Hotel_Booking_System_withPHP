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
    }
    if(isset($_POST['btn_change']))
    {
        btnchange();
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Information</title>
    <link rel="stylesheet" href="../css/allstyles.css">
    <link rel="icon" href="../photo/icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    
  </head>

  <style>
    .content{
      margin-top: 16.5vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    body{
      background: url('../photo/CreateBG.jpg');
      background-size: cover;
    }
    .A1{
      background: rgb(0,0,0,0.5);
      padding-right: 50px;
      padding-left: 50px;
      border: 3px solid #fff;
      border-radius: 10px;
      box-shadow: 6px 2px 10px #000;
      cursor: pointer;
      box-shadow: 0 0 1px rgba(35, 0, 255, 0.712),
                      0 0 2px rgba(35, 0, 255, 0.712),
                      0 0 4px rgba(35, 0, 255, 0.712),
                      0 0 8px rgba(35, 0, 255, 0.712),
                      0 0 16px rgba(35, 0, 255, 0.712);
    }
    .A1 h1{
      color: #fff;
      padding: 20px;
      transition: 1s; 
      font-family: Cambria;
      text-shadow: 0 0 1px rgba(35, 0, 255, 0.712),
                      0 0 2px rgba(35, 0, 255, 0.712),
                      0 0 4px rgba(35, 0, 255, 0.712),
                      0 0 8px rgba(35, 0, 255, 0.712),
                      0 0 16px rgba(35, 0, 255, 0.712);
    }
    .A1 h1:hover{
      text-shadow: 0 0 1px rgba(255, 195, 0 , 0.712),
                      0 0 2px rgba(255, 195, 0 , 0.712),
                      0 0 4px rgba(255, 195, 0 , 0.712),
                      0 0 8px rgba(255, 195, 0 , 0.712),
                      0 0 16px rgba(255, 195, 0 , 0.712);
    }
    #A1{
      font-family: Cambria;
      color: #fff;
      font-size: 20px;
      cursor: pointer;
      text-shadow: 0 0 1px rgba(35, 0, 255, 0.712),
                      0 0 2px rgba(35, 0, 255, 0.712),
                      0 0 4px rgba(35, 0, 255, 0.712),
                      0 0 8px rgba(35, 0, 255, 0.712),
                      0 0 16px rgba(35, 0, 255, 0.712);
    }
    .A2{
      margin: 5vh 0vh;
    }
    #A2{
      color: #fff;
      width: 35vh;
      height: 4vh;
      background-color: rgb(0,0,0,0.5);
      border: 2px solid #fff;
      border-radius: 5px;
      font-family: Cambria;
      font-size: 19px;
      cursor: pointer;
      margin: 10px;
      text-align: center;
      transition: 1s;
      text-shadow: 0 0 1px rgba(35, 0, 255, 0.712),
                      0 0 2px rgba(35, 0, 255, 0.712),
                      0 0 4px rgba(35, 0, 255, 0.712),
                      0 0 8px rgba(35, 0, 255, 0.712),
                      0 0 16px rgba(35, 0, 255, 0.712);
      box-shadow: 0 0 1px rgba(35, 0, 255, 0.712),
                      0 0 2px rgba(35, 0, 255, 0.712),
                      0 0 4px rgba(35, 0, 255, 0.712),
                      0 0 8px rgba(35, 0, 255, 0.712),
                      0 0 16px rgba(35, 0, 255, 0.712);                
    }
    #A2:hover{
      box-shadow: 0 0 1px rgba(255, 195, 0 , 0.712),
                      0 0 2px rgba(255, 195, 0 , 0.712),
                      0 0 4px rgba(255, 195, 0 , 0.712),
                      0 0 8px rgba(255, 195, 0 , 0.712),
                      0 0 16px rgba(255, 195, 0 , 0.712);
    }
    ::placeholder {
      color: rgb(255,255,255, 0.77);
    }
    
    #A4{
      color: #fff;
      background-color: rgb(0,0,0,0.6);
      border: 2px solid #fff;
      font-size: 19px;
      cursor: pointer;
      transition: 1s; 
      font-family: Cambria;
      border-radius: 5px;
      margin: 10px;
      padding: 5px 30px 5px 30px;
      box-shadow: 0 0 1px rgba(35, 0, 255, 0.712),
                      0 0 2px rgba(35, 0, 255, 0.712),
                      0 0 4px rgba(35, 0, 255, 0.712),
                      0 0 8px rgba(35, 0, 255, 0.712),
                      0 0 16px rgba(35, 0, 255, 0.712);
      text-shadow: 0 0 1px rgba(35, 0, 255, 0.712),
                      0 0 2px rgba(35, 0, 255, 0.712),
                      0 0 4px rgba(35, 0, 255, 0.712),
                      0 0 8px rgba(35, 0, 255, 0.712),
                      0 0 16px rgba(35, 0, 255, 0.712);
    }
    #A4:hover{
      color: #fff;
      box-shadow: 0 0 1px rgba(255, 195, 0 , 0.712),
                      0 0 2px rgba(255, 195, 0 , 0.712),
                      0 0 4px rgba(255, 195, 0 , 0.712),
                      0 0 8px rgba(255, 195, 0 , 0.712),
                      0 0 16px rgba(255, 195, 0 , 0.712);
    }
    .A1 a{
      text-decoration: none;
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
        <h4 style="text-transform: capitalize;">Welcome <?php echo "$adminname"; ?></h4>
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
      <form class="A1" method="post">
        <h1 align="center"><i class="fas fa-info-circle"></i>&nbsp;&nbsp;Change Your Information</h1>
        <div align="center" class="A2">
          <label id="A1"><i class="fas fa-user-shield"></i> Name:</label>
          <input id="A2" type="text" name="newname" placeholder="<?php echo $adminname;?>">
        </div>
        
        
        <div align="center" class="A2">
          <label id="A1"><i class="fas fa-envelope"></i> Email:</label>
          <input id="A2" type="text" name="newemail" placeholder="<?php echo $email;?>">
        </div>
        
        <div align="center" class="A2">
          <label id="A1"><i class="fas fa-phone"></i> Phone:</label>
          <input id="A2" type="text" name="newphone" placeholder="<?php echo $phone;?>">
        </div>
        
        <div align="center" class="A2">
          <button id="A4" name="btn_change">Change</button>
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