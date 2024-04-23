<?php
include("connections.php");
include("function.php");

$query = "select * from admin";
$go_query = mysqli_query($connection, $query);
while ($row = mysqli_fetch_array($go_query)) {
  $adminname = $row['adminname'];
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="../css/dashboard.css">
  <link rel="icon" href="../photo/icon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>

  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      background: #091921;
    }

    .content {
      margin-top: 25vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .clock {
      width: 350px;
      height: 350px;
      display: flex;
      justify-content: center;
      align-items: center;
      background: url(../photo/HC3.png);
      background-size: cover;
      border: 4px solid #091921;
      border-radius: 50%;
      box-shadow: 0 -15px 15px rgba(255, 255, 255, 0.05),
        inset 0 -15px 15px rgba(255, 255, 255, 0.05),
        0 15px 15px rgba(0, 0, 0, 0.3),
        inset 0 15px 15px rgba(0, 0, 0, 0.3);
    }

    .clock:before {
      content: '';
      position: absolute;
      width: 15px;
      height: 15px;
      background: #fff;
      border-radius: 50%;
      z-index: 10000;
    }

    .clock .hour,
    .clock .min,
    .clock .sec {
      position: absolute;
    }

    .clock .hour,
    .hr {
      width: 160px;
      height: 160px;
    }

    .clock .min,
    .mn {
      width: 190px;
      height: 190px;
    }

    .clock .sec,
    .sc {
      width: 230px;
      height: 230px;
    }

    .hr,
    .mn,
    .sc {
      display: flex;
      justify-content: center;
      /*align-items: center;*/
      position: absolute;
      border-radius: 50%;
    }

    .hr:before {
      content: '';
      position: absolute;
      width: 8px;
      height: 80px;
      background: #fff;
      border: 1px solid #6772F0;
      z-index: 10;
      border-radius: 6px 6px 0 0;
      box-shadow: 0 0 1px rgba(175, 0, 0, 0.712),
        0 0 2px rgba(175, 0, 0, 0.712),
        0 0 4px rgba(175, 0, 0, 0.712),
        0 0 8px rgba(175, 0, 0, 0.712),
        0 0 16px rgba(175, 0, 0, 0.712);
    }

    .mn:before {
      content: '';
      position: absolute;
      width: 6px;
      height: 90px;
      background: #fff;
      z-index: 11;
      border-radius: 6px 6px 0 0;
      border: 0.5px solid #6772F0;
      box-shadow: 0 0 1px rgba(175, 0, 0, 0.712),
        0 0 2px rgba(175, 0, 0, 0.712),
        0 0 4px rgba(175, 0, 0, 0.712),
        0 0 8px rgba(175, 0, 0, 0.712),
        0 0 16px rgba(175, 0, 0, 0.712);
    }

    .sc:before {
      content: '';
      position: absolute;
      width: 2px;
      height: 150px;
      background: #fff;
      z-index: 12;
      border-radius: 6px 6px 0 0;
      box-shadow: 0 0 1px rgba(103, 114, 240, 0.712),
        0 0 2px rgba(103, 114, 240, 0.712),
        0 0 4px rgba(103, 114, 240, 0.712),
        0 0 8px rgba(103, 114, 240, 0.712),
        0 0 16px rgba(103, 114, 240, 0.712);
    }
  </style>

</head>

<body>

  <input type="checkbox" id="check">
  <!--header area start-->
  <header>
    <label for="check">
      <i class="fas fa-bars" id="sidebar_btn"></i>
    </label>
    <div class="left_area" style="padding-left: 20px">
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
    <div class="clock">
      <div class="hour">
        <div class="hr" id="hr"></div>
      </div>
      <div class="min">
        <div class="mn" id="mn"></div>
      </div>
      <div class="sec">
        <div class="sc" id="sc"></div>
      </div>
    </div>
    <script>
      const deg = 6;
      const hr = document.querySelector('#hr');
      const mn = document.querySelector('#mn');
      const sc = document.querySelector('#sc');

      setInterval(() => {
        let day = new Date();
        let hh = day.getHours() * 30;
        let mm = day.getMinutes() * deg;
        let ss = day.getSeconds() * deg;

        hr.style.transform = `rotateZ(${(hh)+(mm/12)}deg)`;
        mn.style.transform = `rotateZ(${mm}deg)`;
        sc.style.transform = `rotateZ(${ss}deg)`;
      })
    </script>
  </div>

  <script type="text/javascript">
    $(document).ready(function() {
      $('.nav_btn').click(function() {
        $('.mobile_nav_items').toggleClass('active');
      });
    });
  </script>

</body>

</html>