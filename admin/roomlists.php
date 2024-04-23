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
    <link rel="stylesheet" href="../css/roomlists.css">
    <link rel="icon" href="../photo/Icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
  </head>
  <style>
    body{
      background: url("../photo/RoomBG.jpg");
      background-size: cover;
    }
    .content{
      margin-top: 15vh;
      margin-bottom: 7.5vh;
    }
    th{
      border: 2px solid #fff;
      padding: 1vh 1vh;
      background: rgb(0,0,0,0.7);
      color: #fff;
      font-size: 17px;
      text-shadow: 0 0 1px rgba(255, 134, 248 , 0.712),
                      0 0 2px rgba(255, 134, 248 , 0.712),
                      0 0 4px rgba(255, 134, 248 , 0.712),
                      0 0 8px rgba(255, 134, 248 , 0.712),
                      0 0 16px rgba(255, 134, 248 , 0.712);
      box-shadow: 0 0 1px rgba(255, 134, 248 , 0.712),
                      0 0 2px rgba(255, 134, 248 , 0.712),
                      0 0 4px rgba(255, 134, 248 , 0.712),
                      0 0 8px rgba(255, 134, 248 , 0.712),
                      0 0 16px rgba(255, 134, 248 , 0.712);
    }
    td{
      border: 2px solid #fff;
      padding: 1vh 3vh;
      font-size: 16px;
      background: rgb(0,0,0,0.7);
      color: #fff;
      align-items: center;
      text-align: center;
      text-shadow: 0 0 1px rgba(236, 149, 231 , 0.712),
                      0 0 2px rgba(236, 149, 231 , 0.712),
                      0 0 4px rgba(236, 149, 231 , 0.712),
                      0 0 8px rgba(236, 149, 231 , 0.712),
                      0 0 16px rgba(236, 149, 231 , 0.712);
      box-shadow: 0 0 1px rgba(236, 149, 231 , 0.712),
                      0 0 2px rgba(236, 149, 231 , 0.712),
                      0 0 4px rgba(236, 149, 231 , 0.712),
                      0 0 8px rgba(236, 149, 231 , 0.712),
                      0 0 16px rgba(236, 149, 231 , 0.712);
    }
    td img{
      display: flex;
    }
    td a{
        font-size: 20px;
        text-decoration: none;
        color: #fff;
        margin: 10px;
        transition: 1s;
        cursor: pointer;
        text-shadow: 0 0 1px rgba(0, 182, 255, 0.712),
                      0 0 2px rgba(0, 182, 255, 0.712),
                      0 0 4px rgba(0, 182, 255, 0.712),
                      0 0 8px rgba(0, 182, 255, 0.712);
    }
    a .f1:hover{
        transition: 1s;
        cursor: pointer;
        font-size: 20px;
        text-decoration: none;
        color: #fff;
        text-shadow: 0 0 1px rgba(255, 69, 0 , 0.712),
                      0 0 2px rgba(255, 69, 0 , 0.712),
                      0 0 4px rgba(255, 69, 0 , 0.712),
                      0 0 8px rgba(255, 69, 0 , 0.712),
                      0 0 8px rgba(255, 69, 0 , 0.712);
    }
    a .f2:hover{
        transition: 1s;
        cursor: pointer;
        font-size: 20px;
        text-decoration: none;
        color: #fff;
        text-shadow: 0 0 1px rgba(0, 27, 255 , 0.712),
                      0 0 2px rgba(0, 27, 255 , 0.712),
                      0 0 4px rgba(0, 27, 255 , 0.712),
                      0 0 8px rgba(0, 27, 255 , 0.712),
                      0 0 8px rgba(0, 27, 255 , 0.712);
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
    <table class="table table-hover" align="center">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Decoration</th>
                    <th>Create Date</th>
                    <th>Update Date</th>
                    <th>Action</th>
                </tr>

                <?php
                    if(isset($_GET['action'])&&$_GET['action']=='delete')
                    {
                      delete_rooms();
                    }

                    $query="select room.*,roomtype.* from room,roomtype where room.roomtype=roomtype.roomtypeid order by roomid desc";
                    $go_query=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_array($go_query))
                    {
                        $r_id=$row['roomid'];
                        $rt_name=$row['roomtypename'];
                        $price=$row['price'];
                        $decs1=$row['decoration'];
                        $decs2=$row['decoration1'];
                        $decs=$decs2.$decs1;
                        $cdate=$row['createrdate'];
                        $udate=$row['updaterdate'];
                        $photo=$row['image'];
                        
                        echo "<tr>";
                        echo "<td><img src='../roomphoto/{$photo}' width='150' height='100'></td>";
                        echo "<td>{$rt_name}</td>";
                        echo "<td>{$price}</td>";
                        echo "<td>{$decs}</td>";
                        echo "<td>{$cdate}</td>";
                        echo "<td>{$udate}</td>";
                        echo "<td><a href='roomlists.php?action=delete&r_id={$r_id}'><span class='fas fa-times-circle f1'></span></a> &nbsp;
                            <a href='roomedit.php?action=edit&r_id={$r_id}'><i class='fas fa-edit f2'></i></a>
                            </td>";
                        echo "</tr>";
                    }
                ?>
            </table>
    </div>
  </body>
</html>