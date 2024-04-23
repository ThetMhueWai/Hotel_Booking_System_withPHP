<?php
include("connections.php");
include("function.php");

$query = "select * from admin";
$go_query = mysqli_query($connection, $query);
while ($row = mysqli_fetch_array($go_query)) {
  $adminname = $row['adminname'];
}

$getquery = "select * from users";
$perpage = 3;
$go_query = mysqli_query($connection, $getquery);
$num = mysqli_num_rows($go_query);
$num = ceil($num / $perpage);
$page = '';

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
  banuser();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users Management</title>
  <link rel="stylesheet" href="../css/manageuser.css">
  <link rel="icon" href="../photo/icon.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
</head>
<style>
  body {
    background: #08001b;
  }

  * {
    font-family: "Roboto", Cambria;
  }

  .D1 {
    border: 2px solid #fff;
  }

  .content {
    padding: 4vh;
    display: flex;
    justify-content: center;
    align-items: center;
    width: (100% - 250px);
    margin-top: 12vh;
    margin-left: 250px;
    transition: 0.5s;
  }

  .sidebar a:hover {
    text-decoration: none;
    color: #fff;
  }

  .c1 {
    margin-top: 5vh;
  }

  .sidebar h4 {
    font-family: "Roboto", Cambria;
    font-size: 18px;
  }

  .caption h3,
  #L1 {
    padding-top: 10px;
    font-weight: bold;
    font-family: "Roboto", Cambria;
    color: #fff;
    text-decoration: none;
    font-weight: none;
    text-shadow: 0 0 1px rgba(0, 50, 255, 0.712),
      0 0 2px rgba(0, 50, 255, 0.712),
      0 0 4px rgba(0, 50, 255, 0.712),
      0 0 8px rgba(0, 50, 255, 0.712),
      0 0 16px rgba(0, 50, 255, 0.712);
  }

  .c2 {
    background: rgb(12, 0, 214);
    background: linear-gradient(180deg, rgba(12, 0, 214, 1) 0%, rgba(4, 0, 90, 1) 0%, rgba(0, 0, 0, 1) 25%, rgba(3, 3, 44, 1) 85%, rgba(9, 9, 121, 1) 100%, rgba(0, 38, 45, 1) 100%);
    border: 2px solid #fff;
    margin: 0px 8px;
    padding: 5vh 5vh 3vh 5vh;
    transition: 1s;
    cursor: pointer;
    box-shadow: 0 0 1px rgba(0, 50, 255, 0.712),
      0 0 2px rgba(0, 50, 255, 0.712),
      0 0 4px rgba(0, 50, 255, 0.712),
      0 0 8px rgba(0, 50, 255, 0.712),
      0 0 16px rgba(0, 50, 255, 0.712);
  }

  .pager .a1 {
    background: rgb(0, 32, 255);
    background: radial-gradient(circle, rgba(0, 32, 255, 1) 0%, rgba(0, 0, 0, 1) 0%, rgba(0, 28, 255, 1) 100%);
    color: #fff;
    text-decoration: none;
    border: 2px solid #fff;
    padding: 5.5px 10.5px;
    border-radius: 30%;
    box-shadow: 0 0 1px rgba(0, 50, 255, 0.712),
      0 0 2px rgba(0, 50, 255, 0.712),
      0 0 4px rgba(0, 50, 255, 0.712),
      0 0 8px rgba(0, 50, 255, 0.712);
    text-shadow: 0 0 1px rgba(0, 50, 255, 0.712),
      0 0 2px rgba(0, 50, 255, 0.712),
      0 0 4px rgba(0, 50, 255, 0.712),
      0 0 8px rgba(0, 50, 255, 0.712);
  }

  .a1:hover {
    transition: 1s;
    background: rgba(61, 0, 0);
    color: #fff;
    text-shadow: 0 0 1px rgba(255, 0, 0, 0.712),
      0 0 2px rgba(255, 0, 0, 0.712),
      0 0 4px rgba(255, 0, 0, 0.712),
      0 0 8px rgba(255, 0, 0, 0.712);
    box-shadow: 0 0 1px rgba(255, 0, 0, 0.712),
      0 0 2px rgba(255, 0, 0, 0.712),
      0 0 4px rgba(255, 0, 0, 0.712),
      0 0 8px rgba(255, 0, 0, 0.712);
  }

  #img1 {
    width: 150px;
    height: 150px;
    border: 2px solid #fff;
    border-radius: 10px;
    margin-bottom: 10px;
    box-shadow: 0 0 1px rgba(0, 50, 255, 0.712),
      0 0 2px rgba(0, 50, 255, 0.712),
      0 0 4px rgba(0, 50, 255, 0.712),
      0 0 8px rgba(0, 50, 255, 0.712),
      0 0 16px rgba(0, 50, 255, 0.712);
  }

  .b1 {
    margin-top: 3.5vh;
    margin-bottom: 2vh;
    background: rgb(0, 0, 0, 0);
    border: 2px solid #fff;
    border-radius: 5px;
    font-weight: bold;
    box-shadow: 0 0 1px rgba(0, 50, 255, 0.712),
      0 0 2px rgba(0, 50, 255, 0.712),
      0 0 4px rgba(0, 50, 255, 0.712),
      0 0 8px rgba(0, 50, 255, 0.712),
      0 0 8px rgba(0, 50, 255, 0.712);
    letter-spacing: 3px;
  }

  .b1:hover {
    background: rgb(12, 0, 214);
    background: linear-gradient(180deg, rgba(12, 0, 214, 1) 0%, rgba(255, 0, 0, 1) 0%, rgba(89, 7, 7, 1) 0%, rgba(0, 0, 0, 1) 54%, rgba(90, 0, 0, 1) 100%, rgba(255, 0, 0, 1) 100%, rgba(0, 0, 0, 1) 100%);
    border: 2px solid #fff;
    border-radius: 5px;
    transition: 1s;
    box-shadow: 0 0 1px rgba(255, 0, 0, 0.712),
      0 0 2px rgba(255, 0, 0, 0.712),
      0 0 4px rgba(255, 0, 0, 0.712),
      0 0 8px rgba(255, 0, 0, 0.712);

  }
</style>

<body>

  <input type="checkbox" id="check">
  <!--header area start-->
  <header id="header1">
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
  <!--mobile navigation bar end-->
  <!--sidebar start-->
  <div class="sidebar">
    <div class="profile_info">
      <img src="../photo/admin.png" class="profile_image" alt="">
      <h4 style="text-transform: capitalize; text-align:center;">Welcome Admin,<br><?php echo "$adminname"; ?></h4>
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
    <div class="container">
      <div class="row" align="center">
        <?php
        if (isset($_GET['page'])) {
          $page = $_GET['page'];
          $show_product = ($page * $perpage) - $perpage;
        }
        if (!isset($_GET['page'])) {
          $show_product = 0;
        }

        $query = "select * from users limit $show_product,$perpage";
        $go_query = mysqli_query($connection, $query);
        while ($out = mysqli_fetch_array($go_query)) {
          $userid = $out['userid'];
          $username = $out['username'];
          $phone = $out['phone'];
          $email = $out['email'];
          $rdate = $out['register_date'];
          $add = $out['address'];
          $photo = $out['profile_image'];

          $display = '<div class="col-sm-4 col-md-4 c1"><div class="thumbnail c2">';
          $display .= "<img id='img1' src='../userphoto/{$photo}'>";
          $display .= '<div class="caption">';
          $display .= "<h3>{$username}</h3>";
          $display .= "<label id='L1'>Phone : {$phone}</label><br>";
          $display .= "<label id='L1'>Register Time : {$rdate}</label><br>";
          $display .= "<a href='manageuser.php?action=delete&u_id={$userid}'><button class='btn btn-danger b1'>BAN THIS USER</button></a>";
          $display .= "</div></div></div>";
          echo $display;
        }
        ?>
      </div>
      <!---end row--->
      <hr />
      <div class="col-sm-12" align='center'>
        <ul class="pager">
          <?php
          for ($i = 1; $i <= $num; $i++) {
            if ($i == $page) {

              echo "&nbsp;<a class='a1' href='manageuser.php?page={$i}'
                  style='background:#09f;color:#fff;'>{$i}</a>&nbsp;";
            } else {
              echo "&nbsp;<a class='a1' href='manageuser.php?page={$i}'>{$i}</a>&nbsp;";
            }
          }
          ?>
        </ul>
      </div>
    </div>
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