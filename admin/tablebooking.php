<?php
  include ("connections.php");
  include ("function.php");

  $query="select * from admin";
	$go_query=mysqli_query($connection,$query);
  while($row=mysqli_fetch_array($go_query))
  {
    $adminname=$row['adminname'];
  }
  if(isset($_GET['action'])&&$_GET['action']=='confirm')
  {
    confirm_table();
  }
  if(isset($_GET['action'])&&$_GET['action']=='delete')
  {
    delete_table();
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Bookings</title>
    <link rel="stylesheet" href="../css/roombooking.css">
    <link rel="icon" href="../photo/Icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
  </head>
  <style>
    body{
      background: url("../photo/tbl.jpg");
      background-size: cover;
    }
    .content{
      margin-top: 15vh;
      margin-bottom: 7.5vh;
    }
    th{
      border: 2px solid #fff;
      padding: 1vh 5vh;
      background: rgb(0,0,0,0.7);
      color: #fff;
      font-size: 17px;
      text-shadow: 0 0 1px rgba(78, 134, 255 , 0.712),
                      0 0 2px rgba(78, 134, 255 , 0.712),
                      0 0 4px rgba(78, 134, 255 , 0.712),
                      0 0 8px rgba(78, 134, 255 , 0.712),
                      0 0 16px rgba(78, 134, 255 , 0.712);
      box-shadow: 0 0 1px rgba(78, 134, 255 , 0.712),
                      0 0 2px rgba(78, 134, 255 , 0.712),
                      0 0 4px rgba(78, 134, 255 , 0.712),
                      0 0 8px rgba(78, 134, 255 , 0.712),
                      0 0 16px rgba(78, 134, 255 , 0.712);
    }
    #th1{
      padding: 1vh 3vh;
      border: none;
      background: rgb(0,0,0,0);
      color: #fff;
      font-size: 17px;
      font-family: arial;
      text-shadow: 0 0 1px rgba(78, 134, 255 , 0.712),
                      0 0 2px rgba(78, 134, 255 , 0.712),
                      0 0 4px rgba(78, 134, 255 , 0.712),
                      0 0 8px rgba(78, 134, 255 , 0.712),
                      0 0 16px rgba(78, 134, 255 , 0.712);
      box-shadow: none;
    }
    td{
        border: 2px solid #fff;
        padding: 1vh 5vh;
        font-size: 16px;
        background: rgb(0,0,0,0.7);
        color: #fff;
        align-items: center;
        text-align: center;
        box-shadow: 0 0 1px rgba(78, 134, 255 , 0.712),
                      0 0 2px rgba(78, 134, 255 , 0.712),
                      0 0 4px rgba(78, 134, 255 , 0.712),
                      0 0 8px rgba(78, 134, 255 , 0.712),
                      0 0 16px rgba(78, 134, 255 , 0.712);
        text-shadow: 0 0 1px rgba(78, 134, 255 , 0.712),
                      0 0 2px rgba(78, 134, 255 , 0.712),
                      0 0 4px rgba(78, 134, 255 , 0.712),
                      0 0 8px rgba(78, 134, 255 , 0.712);
    }
    td img{
      display: flex;
    }
    td a{
        font-size: 17px;
        text-decoration: none;
        color: #fff;
        margin: 10px;
        transition: 1s;
        cursor: pointer;
        text-shadow: 0 0 1px rgba(78, 134, 255 , 0.712),
                      0 0 2px rgba(78, 134, 255 , 0.712),
                      0 0 4px rgba(78, 134, 255 , 0.712),
                      0 0 8px rgba(78, 134, 255 , 0.712),
                      0 0 16px rgba(78, 134, 255 , 0.712);
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
        <h4 style="text-transform: capitalize; text-align:center">Welcome Admin<br><?php echo "$adminname"; ?></h4>
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
        <table class="table table-hover" align="center">
            <tr>
                <th>Customer</th>
                <th>Booking Date</th>
                <th>Booking Time</th>
                <th>People</th>
                <th>Contact</th>
                <th>Confirm Date</th>
                <th>Process</th>
            </tr>

                <?php
                    if(isset($_GET['action'])&&$_GET['action']=='delete')
                    {
                      delete_rooms();
                    }

                    $query="select * from tablebooking";
                    $go_query=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_array($go_query))
                    {
                        $tbid=$row['tbookingid'];
                        $c_name=$row['username'];
                        $bdate=$row['tbookdate'];
                        $btime=$row['tbooktime'];
                        $people=$row['tbookperson'];
                        $ph=$row['phone'];
                        $status=$row['status'];
                        $cfdate=$row['confirm_date'];
                        
                        echo "<tr>";
                        echo "<td>{$c_name}</td>";
                        echo "<td>{$bdate}</td>";
                        echo "<td>{$btime}</td>";
                        echo "<td>{$people}</td>";
                        echo "<td>{$ph}</td>";
                        // echo "<td>{$cfdate}</td>";
                        if($status==1){
                          echo "<td>{$cfdate}</td>";
                        }
                        else{
                          echo "<td><a href='tablebooking.php?action=confirm&tbid={$tbid}'>Confirm</a></td>";
                        }
                        if($status!=1){
                          echo "<td>Pending</td>";
                        }
                        else{
                          echo "<td><a href='tablebooking.php?action=delete&tbid={$tbid}'><span class='fas fa-times-circle f1'></span></a></td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </table>
            <table align="center">
              <tr>
                <th id="th1">
                  Note: You can confirm to user when you click confirm.
                        Confirmation date and delete features are appeared.
                </th>
              </tr>
            </table>
      </div>
  </body>
</html>