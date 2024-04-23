<?php
  include ("connections.php");
  include ("function.php");

  $query="select * from admin";
	$go_query=mysqli_query($connection,$query);
  while($row=mysqli_fetch_array($go_query))
  {
    $adminname=$row['adminname'];
  }

  if(isset($_POST['changepassword']))
    {
        $query="select * from admin";
        $go_query=mysqli_query($connection,$query);
        while($row=mysqli_fetch_array($go_query))
        {
            $adpass=$row['password'];
        }
        $cpass=$_POST['cpass'];
        $npass=$_POST['npass'];
        $rnpass=$_POST['rnpass'];

        if($cpass!=$adpass){
            echo "<script>window.alert('Invalid Current Password')</script>";
        }
        else if($npass!=$rnpass)
        {
            $errors['match_password']='Password does not match'; 
        }
        else
        { 
            changepassword();
        }
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="../css/allstyles.css">
    <link rel="icon" href="../photo/icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    
  </head>

  <style>
    .content{
      margin-top: 12.5vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    body{
      background: url('../photo/CreateBG2.jpg');
      background-size: cover;
    }
    .A1{
      background: rgb(0,0,0,0.5);
      padding-right: 20vh;
      padding-left: 20vh;
      padding-bottom: 50px;
      border: 3px solid #fff;
      border-radius: 10px;
      box-shadow: 6px 2px 10px #000;
      cursor: pointer;
      box-shadow: 0 0 1px rgba(255, 54, 0 , 0.712),
                      0 0 2px rgba(255, 54, 0 , 0.712),
                      0 0 4px rgba(255, 54, 0 , 0.712),
                      0 0 8px rgba(255, 54, 0 , 0.712),
                      0 0 16px rgba(255, 54, 0 , 0.712);
    }
    .A1 h1{
      color: #fff;
      padding: 20px;
      transition: 1s; 
      font-family: Cambria;
      text-shadow: 0 0 1px rgba(255, 54, 0 , 0.712),
                      0 0 2px rgba(255, 54, 0 , 0.712),
                      0 0 4px rgba(255, 54, 0 , 0.712),
                      0 0 8px rgba(255, 54, 0 , 0.712),
                      0 0 16px rgba(255, 54, 0 , 0.712);
    }
    .A1 h1:hover{
      color: #fff;
      text-shadow: 0 0 1px rgba(175, 180, 255 , 0.712),
                      0 0 2px rgba(175, 180, 255 , 0.712),
                      0 0 4px rgba(175, 180, 255 , 0.712),
                      0 0 8px rgba(175, 180, 255 , 0.712),
                      0 0 16px rgba(175, 180, 255 , 0.712);
    }
    .A2{
      margin-top: 3vh;
    }
    #A1{
     
      font-family: Cambria;
      color: #fff;
      font-size: 22px;
      cursor: pointer;
      text-shadow: 0 0 1px rgba(255, 54, 0 , 0.712),
                      0 0 2px rgba(255, 54, 0 , 0.712),
                      0 0 4px rgba(255, 54, 0 , 0.712),
                      0 0 8px rgba(255, 54, 0 , 0.712),
                      0 0 16px rgba(255, 54, 0 , 0.712);
    }
    #A2{
      color: #fff;
      padding: 1.5vh 10vh;
      background-color: rgb(0,0,0,0.6);
      border: 1px solid #fff;
      font-family: Cambria;
      font-size: 17px;
      cursor: pointer;
      text-align: center;
      margin: 7px;
      border-radius: 4px;
      transition:1s;
      text-shadow: 0 0 1px rgba(255, 54, 0 , 0.712),
                      0 0 2px rgba(255, 54, 0 , 0.712),
                      0 0 4px rgba(255, 54, 0 , 0.712),
                      0 0 8px rgba(255, 54, 0 , 0.712),
                      0 0 16px rgba(255, 54, 0 , 0.712);
      box-shadow: 0 0 1px rgba(255, 54, 0 , 0.712),
                      0 0 2px rgba(255, 54, 0 , 0.712),
                      0 0 4px rgba(255, 54, 0 , 0.712),
                      0 0 8px rgba(255, 54, 0 , 0.712),
                      0 0 16px rgba(255, 54, 0 , 0.712);
    }
    #A2:hover{
      text-shadow: 0 0 1px rgba(175, 180, 255 , 0.712),
                    0 0 2px rgba(175, 180, 255 , 0.712),
                    0 0 4px rgba(175, 180, 255 , 0.712),
                    0 0 8px rgba(175, 180, 255 , 0.712),
                    0 0 16px rgba(175, 180, 255 , 0.712);
      box-shadow: 0 0 1px rgba(175, 180, 255 , 0.712),
                    0 0 2px rgba(175, 180, 255 , 0.712),
                    0 0 4px rgba(175, 180, 255 , 0.712),
                    0 0 8px rgba(175, 180, 255 , 0.712),
                    0 0 16px rgba(175, 180, 255 , 0.712);
    }
    ::placeholder {
      color: rgb(255,255,255, 0.77)
    }
    hr{
      margin: 3vh 0vh;
      box-shadow: 0 0 1px rgba(255, 54, 0 , 0.712),
                      0 0 2px rgba(255, 54, 0 , 0.712),
                      0 0 4px rgba(255, 54, 0 , 0.712),
                      0 0 8px rgba(255, 54, 0 , 0.712),
                      0 0 16px rgba(255, 54, 0 , 0.712);
    }
    #A3{
      color: #fff;
      background-color: rgb(0,0,0,0);
      border: none;
      font-size: 17px;
      cursor: pointer;
      transition: 1s;
      box-shadow: 0 0 1px rgba(255, 54, 0 , 0.712),
                      0 0 2px rgba(255, 54, 0 , 0.712),
                      0 0 4px rgba(255, 54, 0 , 0.712),
                      0 0 8px rgba(255, 54, 0 , 0.712),
                      0 0 16px rgba(255, 54, 0 , 0.712); 
    }
    #A3:hover{
      color: red;
      background-color: rgb(0,0,0,0);
      border: none;
      font-size: 17px;
      cursor: pointer;
    }
    .A1 a{
      text-decoration: none;
    }
    #A5{
        color: #fff;
        padding: 1vh 15vh;
        background-color: rgb(0,0,0,0.6);
        border: 1px solid pink;
        font-family: Cambria;
        font-size: 20px;
        cursor: pointer;
        text-align: center;
        margin-top: 15px;
        border-radius: 4px;
        transition: 1s;
        box-shadow: 0 0 1px rgba(255, 54, 0 , 0.712),
                      0 0 2px rgba(255, 54, 0 , 0.712),
                      0 0 4px rgba(255, 54, 0 , 0.712),
                      0 0 8px rgba(255, 54, 0 , 0.712),
                      0 0 16px rgba(255, 54, 0 , 0.712); 
        text-shadow: 0 0 1px rgba(255, 54, 0 , 0.712),
                      0 0 2px rgba(255, 54, 0 , 0.712),
                      0 0 4px rgba(255, 54, 0 , 0.712),
                      0 0 8px rgba(255, 54, 0 , 0.712),
                      0 0 16px rgba(255, 54, 0 , 0.712); 
    }
    #A5:hover{
      background-color: rgba(0,0,0);
      border: 1px solid pink;
      font-family: Cambria;
      font-size: 20px;
      cursor: pointer;
      text-align: center;
      margin-top: 15px;
      border-radius: 4px;
      text-shadow: 0 0 1px rgba(175, 180, 255 , 0.712),
                    0 0 2px rgba(175, 180, 255 , 0.712),
                    0 0 4px rgba(175, 180, 255 , 0.712),
                    0 0 8px rgba(175, 180, 255 , 0.712),
                    0 0 16px rgba(175, 180, 255 , 0.712);
      box-shadow: 0 0 1px rgba(175, 180, 255 , 0.712),
                    0 0 2px rgba(175, 180, 255 , 0.712),
                    0 0 4px rgba(175, 180, 255 , 0.712),
                    0 0 8px rgba(175, 180, 255 , 0.712),
                    0 0 16px rgba(175, 180, 255 , 0.712);
    }

    ::-webkit-scrollbar{
      width: 0;
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
        <h4 style="text-transform: capitalize; text-align:center"">Welcome <?php echo "$adminname"; ?></h4>
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
      <form class="A1" method="post" enctype="multipart/form-data">
        <h1 align="center"><i class="fas fa-tools"></i> Change Password</h1>
        <div align="center" class="A2">
          <label id="A1"><i class="fas fa-key"></i> Current Password:</label><br>
          <input id="A2" name="cpass" type="text" placeholder="Enter Your Current Password">
        </div>
        <div align="center" class="A2">
            <label id="A1"><i class="fas fa-cog"></i> New Password:</label><br>
            <input id="A2" name="npass" type="text" placeholder="Enter Your New Password">
        </div>
        <div align="center" class="A2">
            <label id="A1"><i class="fas fa-wrench"></i> Re-type Password:</label><br>
            <input id="A2" name="rnpass" type="text" placeholder="Re-type Your New Password">
            <label id="A6"><br>
            <?php 
                echo isset($errors['match_password']) ? $errors['match_password']:'' 
            ?>
            </label>
        </div>
        <div align="center" class="A2">
            <button id="A5" name="changepassword">Change</button>
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