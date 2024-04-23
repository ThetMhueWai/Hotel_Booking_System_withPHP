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

    if(isset($_POST['create_broom']))
    {
        createbroom(); 
    }
    if (isset ($_POST['update_broom']))
    {
        update_broom();
    }
    if(isset($_GET['action']) && $_GET['action']=='delete')
    {
        del_broom();
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Ballroom Type</title>
    <link rel="stylesheet" href="../css/create.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="icon" href="../photo/icon.png" type="icon">
  </head>

  <style>
    .content{
      margin-top: 12.5vh;
      margin-bottom: 6.25vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    body{
      background: url('../photo/CBRoomBG1.png');
      background-size: cover;
    }
    .A1{
      background: rgb(0,0,0,0.75);
      padding-right: 20vh;
      padding-left: 20vh;
      border: 3px solid #fff;
      border-radius: 10px;
      box-shadow: 0 0 1px rgba(255,69,0, 0.712),
                      0 0 2px rgba(255,69,0, 0.712),
                      0 0 4px rgba(255,69,0, 0.712),
                      0 0 8px rgba(255,69,0, 0.712),
                      0 0 16px rgba(255,69,0, 0.712);
      cursor: pointer;
      margin: 5vh;
    }
    .A1 h1{
      color: #fff;
      transition: 1s; 
      font-family: Cambria;
      text-align: center;
      padding: 0px 19px 19px 19px;
      text-shadow: 0 0 1px rgba(255,69,0, 0.712),
                      0 0 2px rgba(255,69,0, 0.712),
                      0 0 4px rgba(255,69,0, 0.712),
                      0 0 8px rgba(255,69,0, 0.712),
                      0 0 16px rgba(255,69,0, 0.712);
    }
    .A1 h1:hover{
      text-shadow: 0 0 1px rgba(135,206,235 , 0.712),
                      0 0 2px rgba(135,206,235 , 0.712),
                      0 0 4px rgba(135,206,235 , 0.712),
                      0 0 8px rgba(135,206,235 , 0.712),
                      0 0 16px rgba(135,206,235 , 0.712);
    }
    .A1 h2{
      font-size: 20px;
      color: #fff;
      transition: 1s; 
      font-family: Cambria;
      text-align: center;
      padding-top:10px;
      text-shadow: 0 0 1px rgba(255,69,0, 0.712),
                      0 0 2px rgba(255,69,0, 0.712),
                      0 0 4px rgba(255,69,0, 0.712),
                      0 0 8px rgba(255,69,0, 0.712),
                      0 0 16px rgba(255,69,0, 0.712);
    }
    .A1 h2:hover{
      text-shadow: 0 0 1px rgba(0, 27, 255 , 0.712),
                      0 0 2px rgba(0, 27, 255 , 0.712),
                      0 0 4px rgba(0, 27, 255 , 0.712),
                      0 0 8px rgba(0, 27, 255 , 0.712),
                      0 0 16px rgba(0, 27, 255 , 0.712);
    }

    #A1{
        margin: 1vh;
        font-family: Cambria;
        color: #fff;
        text-shadow: 0 0 1px rgba(255,69,0, 0.712),
                      0 0 2px rgba(255,69,0, 0.712),
                      0 0 4px rgba(255,69,0, 0.712),
                      0 0 8px rgba(255,69,0, 0.712),
                      0 0 16px rgba(255,69,0, 0.712);
        font-size: 20px;
        cursor: pointer;
    }
    #A2{
        color: #fff;
        width: 35vh;
        height: 5vh;
        background-color: rgb(0,0,0,0.5);
        border: 2px solid #fff;
        text-shadow: 0 0 1px rgba(255,69,0, 0.712),
                      0 0 2px rgba(255,69,0, 0.712),
                      0 0 4px rgba(255,69,0, 0.712),
                      0 0 8px rgba(255,69,0, 0.712),
                      0 0 16px rgba(255,69,0, 0.712);
        box-shadow:0 0 1px rgba(255,69,0, 0.712),
                      0 0 2px rgba(255,69,0, 0.712),
                      0 0 4px rgba(255,69,0, 0.712),
                      0 0 8px rgba(255,69,0, 0.712),
                      0 0 16px rgba(255,69,0, 0.712);
        border-radius: 5px;
        font-family: Cambria;
        font-size: 18px;
        cursor: pointer;
        text-align: center;
        transition: 1s;
    }
    #A2:hover{
      text-shadow: 0 0 1px rgba(135,206,235 , 0.712),
                      0 0 2px rgba(135,206,235 , 0.712),
                      0 0 4px rgba(135,206,235 , 0.712),
                      0 0 8px rgba(135,206,235 , 0.712),
                      0 0 16px rgba(135,206,235 , 0.712);
      box-shadow: 0 0 1px rgba(135,206,235 , 0.712),
                      0 0 2px rgba(135,206,235 , 0.712),
                      0 0 4px rgba(135,206,235 , 0.712),
                      0 0 8px rgba(135,206,235 , 0.712),
                      0 0 16px rgba(135,206,235 , 0.712);
    }
    ::placeholder {
      color: rgb(255,255,255,0.85)
    }
    #A3{
        font-family: Cambria;
        text-align:center;
        color: #fff;
        background-color: rgb(0,0,0,0.5);
        border: none;
        font-size: 20px;
        border: 2px solid #fff;
        border-radius: 5px;
        cursor: pointer;
        transition: 1s;
        text-shadow: 0 0 1px rgba(255,69,0, 0.712),
                      0 0 2px rgba(255,69,0, 0.712),
                      0 0 4px rgba(255,69,0, 0.712),
                      0 0 8px rgba(255,69,0, 0.712),
                      0 0 16px rgba(255,69,0, 0.712);
        box-shadow: 0 0 1px rgba(255,69,0, 0.712),
                      0 0 2px rgba(255,69,0, 0.712),
                      0 0 4px rgba(255,69,0, 0.712),
                      0 0 8px rgba(255,69,0, 0.712),
                      0 0 16px rgba(255,69,0, 0.712);
        margin: 5vh;
        padding: 5px 30px 5px 30px; 
    }
    #A3:hover{
      text-shadow: 0 0 1px rgba(135,206,235 , 0.712),
                      0 0 2px rgba(135,206,235 , 0.712),
                      0 0 4px rgba(135,206,235 , 0.712),
                      0 0 8px rgba(135,206,235 , 0.712),
                      0 0 16px rgba(135,206,235 , 0.712);
      box-shadow:0 0 1px rgba(135,206,235 , 0.712),
                      0 0 2px rgba(135,206,235 , 0.712),
                      0 0 4px rgba(135,206,235 , 0.712),
                      0 0 8px rgba(135,206,235 , 0.712),
                      0 0 16px rgba(135,206,235 , 0.712);
    }
    #A4{
      color: #fff;
      background-color: rgb(0,0,0,0);
      border: none;
      font-size: 19px;
      cursor: pointer;
      transition: 1s; 
      text-shadow: 0 0 1px rgba(255,69,0, 0.712),
                      0 0 2px rgba(255,69,0, 0.712),
                      0 0 4px rgba(255,69,0, 0.712),
                      0 0 8px rgba(255,69,0, 0.712),
                      0 0 16px rgba(255,69,0, 0.712);
    }
    #A4:hover{
      color: #fff;
      background-color: rgb(0,0,0,0);
      border: none;
      font-size: 19px;
      cursor: pointer;
      transition: 1s; 
      text-shadow: 0 0 1px rgba(135,206,235 , 0.712),
                      0 0 2px rgba(135,206,235 , 0.712),
                      0 0 4px rgba(135,206,235 , 0.712),
                      0 0 8px rgba(135,206,235 , 0.712),
                      0 0 16px rgba(135,206,235 , 0.712);
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
        color: #fff;
        background: #1a1a1a;
        padding: 1vh 7vh 1vh 7vh;
        margin: 0;
        transition: 1s;
        box-shadow: 0 0 1px rgba(255,69,0, 0.712),
                      0 0 2px rgba(255,69,0, 0.712),
                      0 0 4px rgba(255,69,0, 0.712),
                      0 0 8px rgba(255,69,0, 0.712),
                      0 0 16px rgba(255,69,0, 0.712);
        text-shadow: 0 0 1px rgba(255,69,0, 0.712),
                      0 0 2px rgba(255,69,0, 0.712),
                      0 0 4px rgba(255,69,0, 0.712),
                      0 0 8px rgba(255,69,0, 0.712),
                      0 0 16px rgba(255,69,0, 0.712);
        cursor: pointer;
    }
    td{
        border: 2px solid #fff;
        font-size: 20px;
        color: pink;
        background-color: rgb(0,0,0,0.85);
        padding: 1vh 7vh 1vh 7vh;
        margin: 0;
        transition: 1s;
        cursor: pointer;
        text-align: center;
        box-shadow: 0 0 1px rgba(255,69,0, 0.712),
                      0 0 2px rgba(255,69,0, 0.712),
                      0 0 4px rgba(255,69,0, 0.712),
                      0 0 8px rgba(255,69,0, 0.712),
                      0 0 16px rgba(255,69,0, 0.712);
        text-shadow: 0 0 1px rgba(255,69,0, 0.712),
                      0 0 2px rgba(255,69,0, 0.712),
                      0 0 4px rgba(255,69,0, 0.712),
                      0 0 8px rgba(255,69,0, 0.712),
                      0 0 16px rgba(255,69,0, 0.712);
    }
    th:hover{
        border: 2px solid #fff;
        font-size: 20px;
        color: #fff;
        padding: 1vh 7vh 1vh 7vh;
        margin: 0;
        text-shadow: 0 0 1px rgba(135,206,235 , 0.712),
                      0 0 2px rgba(135,206,235 , 0.712),
                      0 0 4px rgba(135,206,235 , 0.712),
                      0 0 8px rgba(135,206,235 , 0.712),
                      0 0 16px rgba(135,206,235 , 0.712);
        box-shadow: 0 0 1px rgba(135,206,235 , 0.712),
                      0 0 2px rgba(135,206,235 , 0.712),
                      0 0 4px rgba(135,206,235 , 0.712),
                      0 0 8px rgba(135,206,235 , 0.712),
                      0 0 16px rgba(135,206,235 , 0.712);
    }
    td a{
        font-size: 20px;
        text-decoration: none;
        color: #fff;
        margin: 10px;
        transition: 1s;
        cursor: pointer;
        text-shadow: 0 0 1px rgba(255,223,0, 0.712),
                      0 0 2px rgba(255,223,0, 0.712),
                      0 0 4px rgba(255,223,0, 0.712),
                      0 0 8px rgba(255,223,0, 0.712);
    }
    a .f1:hover{
        transition: 0.5s;
        cursor: pointer;
        font-size: 20px;
        text-decoration: none;
        color: #fff;
        text-shadow: 0 0 1px rgba(255, 69, 0 , 0.712),
                      0 0 2px rgba(255, 69, 0 , 0.712),
                      0 0 4px rgba(255, 69, 0 , 0.712),
                      0 0 8px rgba(255, 69, 0 , 0.712),
                      0 0 16px rgba(255, 69, 0 , 0.712);
    }
    a .f2:hover{
        transition: 0.5s;
        cursor: pointer;
        font-size: 20px;
        text-decoration: none;
        color: #fff;
        text-shadow: 0 0 1px rgba(0, 27, 255 , 0.712),
                      0 0 2px rgba(0, 27, 255 , 0.712),
                      0 0 4px rgba(0, 27, 255 , 0.712),
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
                <h1>Create Ballroom Type</h1>
                <div align="center">
                    <label id="A1"><span class='fas fa-pencil-alt'></span>&nbsp;Ballroom Type Name:</label>
                    <input id="A2" type="text" name="broomname" placeholder="Enter Ballroom Type Name">
                </div>
                <div align="center">
                    <button id="A3" type="submit" name="create_broom">
                        Create Ballroom Type
                    </button>
                </div>
            </form>
            
            <?php
                if(isset($_GET['action']) && $_GET['action']=='edit')
                {
                    $broomt_id=$_GET['brt_id'];
                    $query="select * from ballroomtype where ballroomtypeid='$broomt_id'";
                    $go_query=mysqli_query($connection,$query);
                    while($out=mysqli_fetch_array($go_query))
                    {
                        $broomtypename=$out['ballroomtypename'];
                        ?>
                        <form method="post" class="A1">
                          <div>
                              <a href="createballroomtype.php"><h2><i class="far fa-times-circle"></i></h2></a>
                          </div>
                          <h1>Change Ballroom Type</h1>
                            
                            <div align="center">
                                <label id="A1">Change Ballroom Type Name: </label>
                                <input id="A2" type="text" name="newbroomtypename" class="form-control" value="<?php echo $broomtypename?>" >
                            </div>
                            <div align="center">
                                <button id="A3" type="submit" name="update_broom" class="btn btn-primary">Change Roomtype</button>
                            </div>
                        </form>
                        <?php 
                    }
                }
            ?>

            <table class="table table-hover" align="center">
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Create Date</th>
                    <th>Update Date</th>
                    <th>Action</th>
                </tr>

                <?php
                    $query="select * from ballroomtype";
                    $go_query=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_array($go_query))
                    {
                        $broomt_id=$row['ballroomtypeid'];
                        $roomtypename=$row['ballroomtypename'];
                        $cdate=$row['create_date'];
                        $update=$row['update_date'];
                        
                        echo "<tr>";
                        echo "<td>{$broomt_id}</td>";
                        echo "<td>{$roomtypename}</td>";
                        echo "<td>{$cdate}</td>";
                        echo "<td>{$update}</td>";
                        echo "<td><a href='createballroomtype.php?action=delete&brt_id={$broomt_id}'><span class='fas fa-times-circle f1'></span></a> &nbsp;
                            <a href='createballroomtype.php?action=edit&brt_id={$broomt_id}'><i class='fas fa-edit f2'></i></a>
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