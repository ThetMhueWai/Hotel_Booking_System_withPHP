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
    <title>Insert Files</title>
    <link rel="stylesheet" href="../css/insertfiles.css">
    <link rel="icon" href="../photo/icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
  </head>

  <style>
    .content{
      margin-top: 10.5vh;
      display: flex;
      align-items: center;
      justify-content: center;
      width: (100% - 250px);
      padding: 20px;
      margin-left: 250px;
      transition: 0.5s;
    }

    body{
      background: url('../photo/InsertBG3.jpg');
      background-size: cover;
      font-family: Cambria;
    }
    #S1{
      margin-top: 5vh;
      margin-left: 27vh;
      margin-right: 0vh;
    }
    #S2{
      margin-top: 5vh;
      margin-right: 27vh;
      margin-left: 0vh;
    }
    #H1{
      margin: 2vh 1vh 2vh 1vh;
      background: rgb(0,0,0,0.6);
      padding: 3vh 3vh 6vh 3vh;
      border-radius: 10px;
      border: 3px solid #fff;
      width: 50vh;
      text-align: center;
      z-index: -1;
      box-shadow: 0 0 1px rgba(255, 0, 247 , 0.712),
                      0 0 2px rgba(255, 0, 247 , 0.712),
                      0 0 4px rgba(255, 0, 247 , 0.712),
                      0 0 8px rgba(255, 0, 247 , 0.712),
                      0 0 16px rgba(255, 0, 247 , 0.712);
    }
    #R1{
        color: #fff; 
        cursor: pointer;
        transition: 1s;
        text-shadow: 0 0 1px rgba(255, 0, 247 , 0.712),
                      0 0 2px rgba(255, 0, 247 , 0.712),
                      0 0 4px rgba(255, 0, 247 , 0.712),
                      0 0 8px rgba(255, 0, 247 , 0.712),
                      0 0 16px rgba(255, 0, 247 , 0.712);
    }
    hr{
      box-shadow: 0 0 1px rgba(255, 0, 247 , 0.712),
                      0 0 2px rgba(255, 0, 247 , 0.712),
                      0 0 4px rgba(255, 0, 247 , 0.712),
                      0 0 8px rgba(255, 0, 247 , 0.712),
                      0 0 16px rgba(255, 0, 247 , 0.712);
    }
    #R1:hover{
      text-shadow: 0 0 1px rgba(255, 35, 0 , 0.712),
                      0 0 2px rgba(255, 35, 0 , 0.712),
                      0 0 4px rgba(255, 35, 0 , 0.712),
                      0 0 8px rgba(255, 35, 0 , 0.712),
                      0 0 16px rgba(255, 35, 0 , 0.712);
    }
    #R2{
        color: #fff;
        text-decoration: none;
        font-size: 20px;
        font-family: Cambria;
        transition: 1s;
        text-shadow: 0 0 1px rgba(255, 0, 247 , 0.712),
                      0 0 2px rgba(255, 0, 247 , 0.712),
                      0 0 4px rgba(255, 0, 247 , 0.712),
                      0 0 8px rgba(255, 0, 247 , 0.712),
                      0 0 16px rgba(255, 0, 247 , 0.712);
    }
    #R2:hover{
      text-shadow: 0 0 1px rgba(255, 35, 0 , 0.712),
                      0 0 2px rgba(255, 35, 0 , 0.712),
                      0 0 4px rgba(255, 35, 0 , 0.712),
                      0 0 8px rgba(255, 35, 0 , 0.712),
                      0 0 16px rgba(255, 35, 0 , 0.712);
    }
    #R2 img{
      position: absolute;
      z-index: 0;
      text-shadow: 0 0 1px rgba(255, 0, 247 , 0.712),
                      0 0 2px rgba(255, 0, 247 , 0.712),
                      0 0 4px rgba(255, 0, 247 , 0.712),
                      0 0 8px rgba(255, 0, 247 , 0.712),
                      0 0 16px rgba(255, 0, 247 , 0.712);
    }
    #R3{
      color: #fff;
      position: absolute;
      padding: 0.7vh 0.9vh;
    }
    #B1{
      background: rgb(0,0,0,0.6);
      padding: 2.3vh;
      font-family: Cambria;
      margin: 5vh 5vh 0vh 5vh;
      border-radius: 10px;
      border: 2px solid #fff;
      cursor: pointer;
      transition: 1s;
      box-shadow: 0 0 1px rgba(255, 0, 247 , 0.712),
                      0 0 2px rgba(255, 0, 247 , 0.712),
                      0 0 4px rgba(255, 0, 247 , 0.712),
                      0 0 8px rgba(255, 0, 247 , 0.712),
                      0 0 16px rgba(255, 0, 247 , 0.712);
    }
    #B1:hover{
      background: rgb(0,0,0,0.7);
      box-shadow: 0 0 1px rgba(255, 35, 0 , 0.712),
                      0 0 2px rgba(255, 35, 0 , 0.712),
                      0 0 4px rgba(255, 35, 0 , 0.712),
                      0 0 8px rgba(255, 35, 0 , 0.712),
                      0 0 16px rgba(255, 35, 0 , 0.712);
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
        <div class="container">  
            <section style="float:left" id="S1">                  
                <div id="H1">               
                        <h2 id="R1">
                            <i class="fas fa-bed"></i>&nbsp;&nbsp;
                            Manage Room<p>
                            <hr width=90%>
                        </h2>
                        
                        <div id="B1">
                          <a id="R2" href="createroomtype.php" class="btn btn-primary ">
                            <i class="fas fa-edit">&nbsp;&nbsp;Create Room Type</i>
                          </a>
                    </div>
                </div>  

                <div id="H1">             
                      <h2 id="R1">
                        <i class="fas fa-plus-square"></i>&nbsp;
                        Room<p>
                        <hr width=90%>
                      </h2>    
                      
                      <div id="B1">
                        <a id="R2" href="insertroom.php"><i class="fas fa-pen-nib"></i>&nbsp;&nbsp;Insert Room</a>
                      </div>
                </div>
                </section>
              
                <section style="float:right" id="S2">

                <div id="H1">                 
                        <h2 id="R1">
                          <i class="fas fa-door-open"></i></i>&nbsp;&nbsp;
                          Manange Ballroom<p>
                          <hr width=90%>
                        </h2>

                        <div id="B1">
                          <a id="R2" href="createballroomtype.php" class="btn btn-primary ">
                            <i class="fas fa-edit">&nbsp;&nbsp;Create Ballroom Type</i>
                          </a>
                        </div>
                </div>  

                <div id="H1" >               
                      <h2 id="R1">
                        <i class="fas fa-plus-square"></i>&nbsp;
                        Ballroom<p>
                        <hr>
                      </h2>  
                      
                      <div id="B1">
                        <a id="R2" href="insertballroom.php" class="btn btn-primary "><i class="fas fa-pen-nib"></i>&nbsp;&nbsp;Insert Ballroom</a>
                      </div>
                  </div>
  </section>
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