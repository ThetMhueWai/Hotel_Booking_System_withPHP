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

    if(isset($_POST['create_room']))
    {
        createroom(); 
    }
    if (isset ($_POST['update_room']))
    {
        update_room();
    }
    if(isset($_GET['action']) && $_GET['action']=='delete')
    {
        del_room();
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Room Type</title>
    <link rel="stylesheet" href="../css/create.css">
    <link rel="icon" href="../photo/icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    
  </head>

  <style>
    .content{
      margin-top: 10.5vh;
      margin-bottom: 5.25vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    body{
      background: url('../photo/RoomTypeBG3.jpg');
      background-size: cover;
      font-family: Cambria;
    }

    .A1{
      background: rgb(0,0,0,0.5);
      padding-right: 20vh;
      padding-left: 20vh;
      border: 3px solid #fff;
      border-radius: 10px;
      box-shadow: 6px 2px 10px #000;
      cursor: pointer;
      margin: 5vh;
      box-shadow: 0 0 1px rgba(0, 182, 255, 0.712),
                0 0 2px rgba(0, 182, 255, 0.712),
                0 0 4px rgba(0, 182, 255, 0.712),
                0 0 8px rgba(0, 182, 255, 0.712),
                0 0 16px rgba(0, 182, 255, 0.712);
    }
    .A1 h1{
      color: #fff;
      padding: 20px;
      transition: 1s; 
      font-family: Cambria;
      text-align: center;
      text-shadow: 0 0 1px rgba(0, 182, 255, 0.712),
                  0 0 2px rgba(0, 182, 255, 0.712),
                  0 0 4px rgba(0, 182, 255, 0.712),
                  0 0 8px rgba(0, 182, 255, 0.712),
                  0 0 16px rgba(0, 182, 255, 0.712);
    }
    .A1 h1:hover{
      color: #fff;
      text-shadow: 0 0 1px rgba(255, 69, 0 , 0.712),
                      0 0 2px rgba(255, 69, 0 , 0.712),
                      0 0 4px rgba(255, 69, 0 , 0.712),
                      0 0 8px rgba(255, 69, 0 , 0.712),
                      0 0 16px rgba(255, 69, 0 , 0.712);
    }

    #A1{
        margin: 1vh;
        font-family: Cambria;
        color: #fff;
        font-size: 20px;
        cursor: pointer;
        text-shadow: 0 0 1px rgba(0, 182, 255, 0.712),
                      0 0 2px rgba(0, 182, 255, 0.712),
                      0 0 4px rgba(0, 182, 255, 0.712),
                      0 0 8px rgba(0, 182, 255, 0.712),
                      0 0 16px rgba(0, 182, 255, 0.712);
    }
    #A2{
        color: #fff;
        width: 35vh;
        height: 5vh;
        background-color: rgb(0,0,0,0.5);
        border: 2px solid #fff;
        border-radius: 5px;
        font-family: Cambria;
        font-size: 18px;
        cursor: pointer;
        text-align: center;
        transition: 1s;
        text-shadow: 0 0 1px rgba(0, 182, 255, 0.712),
                      0 0 2px rgba(0, 182, 255, 0.712),
                      0 0 4px rgba(0, 182, 255, 0.712),
                      0 0 8px rgba(0, 182, 255, 0.712),
                      0 0 16px rgba(0, 182, 255, 0.712);
        box-shadow: 0 0 1px rgba(0, 182, 255, 0.712),
                      0 0 2px rgba(0, 182, 255, 0.712),
                      0 0 4px rgba(0, 182, 255, 0.712),
                      0 0 8px rgba(0, 182, 255, 0.712),
                      0 0 16px rgba(0, 182, 255, 0.712);
    }
    #A3{
        font-family: Cambria;
        text-align:center;
        color: #fff;
        background-color: rgb(0,0,0,0.35);
        border: none;
        font-size: 20px;
        border: 2px solid #fff;
        border-radius: 5px;
        cursor: pointer;
        transition: 1s;
        margin: 5vh;
        padding: 5px 30px 5px 30px; 
        text-shadow: 0 0 1px rgba(0, 182, 255, 0.712),
                      0 0 2px rgba(0, 182, 255, 0.712),
                      0 0 4px rgba(0, 182, 255, 0.712),
                      0 0 8px rgba(0, 182, 255, 0.712),
                      0 0 16px rgba(0, 182, 255, 0.712);
        box-shadow: 0 0 1px rgba(0, 182, 255, 0.712),
                      0 0 2px rgba(0, 182, 255, 0.712),
                      0 0 4px rgba(0, 182, 255, 0.712),
                      0 0 8px rgba(0, 182, 255, 0.712),
                      0 0 16px rgba(0, 182, 255, 0.712);
    }
    ::placeholder {
      color: rgb(255,255,255,0.85)
    }
    .A1 h2{
      font-size: 20px;
      color: #fff;
      transition: 1s; 
      font-family: Cambria;
      text-align: center;
      padding-top:5vh;
      text-shadow: 0 0 1px rgba(255, 69, 0 , 0.712),
                      0 0 2px rgba(255, 69, 0 , 0.712),
                      0 0 4px rgba(255, 69, 0 , 0.712),
                      0 0 8px rgba(255, 69, 0 , 0.712),
                      0 0 16px rgba(255, 69, 0 , 0.712);
    }
    .A1 h2:hover{
      text-shadow: 0 0 1px rgba(0, 27, 255 , 0.712),
                      0 0 2px rgba(0, 27, 255 , 0.712),
                      0 0 4px rgba(0, 27, 255 , 0.712),
                      0 0 8px rgba(0, 27, 255 , 0.712),
                      0 0 16px rgba(0, 27, 255 , 0.712);
    }
    #A2:hover{
      background: rgb(0,0,0,0.65);
      text-shadow: 0 0 1px rgba(255, 69, 0 , 0.712),
                      0 0 2px rgba(255, 69, 0 , 0.712),
                      0 0 4px rgba(255, 69, 0 , 0.712),
                      0 0 8px rgba(255, 69, 0 , 0.712),
                      0 0 16px rgba(255, 69, 0 , 0.712);
      box-shadow: 0 0 1px rgba(255, 69, 0 , 0.712),
                      0 0 2px rgba(255, 69, 0 , 0.712),
                      0 0 4px rgba(255, 69, 0 , 0.712),
                      0 0 8px rgba(255, 69, 0 , 0.712),
                      0 0 16px rgba(255, 69, 0 , 0.712);
      transition: 1s; 
    }
    #A3:hover{
      background: rgb(0,0,0,0.65);
      text-shadow: 0 0 1px rgba(255, 69, 0 , 0.712),
                      0 0 2px rgba(255, 69, 0 , 0.712),
                      0 0 4px rgba(255, 69, 0 , 0.712),
                      0 0 8px rgba(255, 69, 0 , 0.712),
                      0 0 16px rgba(255, 69, 0 , 0.712);
      box-shadow: 0 0 1px rgba(255, 69, 0 , 0.712),
                      0 0 2px rgba(255, 69, 0 , 0.712),
                      0 0 4px rgba(255, 69, 0 , 0.712),
                      0 0 8px rgba(255, 69, 0 , 0.712),
                      0 0 16px rgba(255, 69, 0 , 0.712);
      transition: 1s; 
    }
    #A4{
      color: #fff;
      background-color: rgb(0,0,0,0);
      border: none;
      font-size: 19px;
      cursor: pointer;
      transition: 1s; 
    }
    #A4:hover{
      color: #fff;
      background-color: rgb(0,0,0,0);
      border: none;
      font-size: 19px;
      cursor: pointer;
      transition: 1s; 
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
    }
    th{
        border: 2px solid #fff;
        font-size: 20px;
        text-shadow: 0 0 1px rgba(0, 182, 255, 0.712),
                      0 0 2px rgba(0, 182, 255, 0.712),
                      0 0 4px rgba(0, 182, 255, 0.712),
                      0 0 8px rgba(0, 182, 255, 0.712);
        box-shadow: 0 0 1px rgba(0, 182, 255, 0.712),
                      0 0 2px rgba(0, 182, 255, 0.712),
                      0 0 4px rgba(0, 182, 255, 0.712),
                      0 0 8px rgba(0, 182, 255, 0.712);
        color: #fff;
        background: rgb(0,0,0,0.8);
        padding: 1vh 7vh 1vh 7vh;
        margin: 0;
        transition: 1s;
        cursor: pointer;
    }
    
    td{
        border: 2px solid #fff;
        font-size: 20px;
        color: #fff;
        background: rgb(0,0,0,0.7);
        padding: 1vh 7vh 1vh 7vh;
        margin: 0;
        transition: 1s;
        cursor: pointer;
        text-align: center;
        text-shadow: 0 0 1px rgba(0, 182, 255, 0.712),
                      0 0 2px rgba(0, 182, 255, 0.712),
                      0 0 4px rgba(0, 182, 255, 0.712),
                      0 0 8px rgba(0, 182, 255, 0.712);
        box-shadow: 0 0 1px rgba(0, 182, 255, 0.712),
                      0 0 2px rgba(0, 182, 255, 0.712),
                      0 0 4px rgba(0, 182, 255, 0.712),
                      0 0 8px rgba(0, 182, 255, 0.712);
    }
    th:hover{
        border: 2px solid #fff;
        font-size: 20px;
        color: #fff;
        padding: 1vh 7vh 1vh 7vh;
        margin: 0;
        text-shadow: 0 0 1px rgba(255, 69, 0 , 0.712),
                      0 0 2px rgba(255, 69, 0 , 0.712),
                      0 0 4px rgba(255, 69, 0 , 0.712),
                      0 0 8px rgba(255, 69, 0 , 0.712),
                      0 0 8px rgba(255, 69, 0 , 0.712);
      box-shadow: 0 0 1px rgba(255, 69, 0 , 0.712),
                      0 0 2px rgba(255, 69, 0 , 0.712),
                      0 0 4px rgba(255, 69, 0 , 0.712),
                      0 0 8px rgba(255, 69, 0 , 0.712),
                      0 0 8px rgba(255, 69, 0 , 0.712);
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
        <div>
            <form method="post" class="A1">
                <h1>Create Room Type</h1>
                <div align="center">
                    <label id="A1"><span class='fas fa-pencil-alt'></span>&nbsp;Room Type Name:</label>
                    <input id="A2" type="text" name="roomname" placeholder="Enter Room Type Name">
                </div>
                <div align="center">
                    <button id="A3" type="submit" name="create_room">
                        Create Room Type
                    </button>
                </div>
            </form>
            
            <?php
                if(isset($_GET['action']) && $_GET['action']=='edit')
                {
                    $roomt_id=$_GET['rt_id'];
                    $query="select * from roomtype where roomtypeid='$roomt_id'";
                    $go_query=mysqli_query($connection,$query);
                    while($out=mysqli_fetch_array($go_query))
                    {
                        $roomtypename=$out['roomtypename'];
                        ?>
                        <form method="post" class="A1">
                          <div>
                              <a href="createroomtype.php"><h2><i class="far fa-times-circle"></i></h2></a>
                          </div>
                          <h1>Change Room Type</h1>
                            <div align="center">
                                <label id="A1"><i class="fas fa-sync-alt"></i>&nbsp;Change Room Type Name: </label>
                                <input id="A2" type="text" name="newroomtypename" class="form-control" value="<?php echo $roomtypename?>" >
                            </div>
                            <div align="center">
                                <button id="A3" type="submit" name="update_room" class="btn btn-primary">Change Room Type</button>
                            </div>
                        </form>
                        <?php 
                    }
                }
            ?>

            </table>
            <table class="table table-hover" align="center">
                  
                <tr>
                    <th>Room Type Name</th>
                    <th>Create Date</th>
                    <th>Update Date</th>
                    <th>Action</th>
                </tr>

                <?php
                    $query="select * from roomtype";
                    $go_query=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_array($go_query))
                    {
                        $roomt_id=$row['roomtypeid'];
                        $roomtypename=$row['roomtypename'];
                        $cdate=$row['create_date'];
                        $update=$row['update_date'];

                        echo "<tr>";
                        echo "<td>{$roomtypename}</td>";
                        echo "<td>{$cdate}</td>";
                        echo "<td>{$update}</td>";
                        echo "<td><a href='createroomtype.php?action=delete&rt_id={$roomt_id}'><span class='fas fa-times-circle f1'></span></a> &nbsp;
                            <a href='createroomtype.php?action=edit&rt_id={$roomt_id}'><i class='fas fa-edit f2'></i></a>
                            </td>";
                        echo "</tr>"; 
                        
                    } 
                ?>
            </table>
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