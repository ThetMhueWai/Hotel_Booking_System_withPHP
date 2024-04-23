<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="../css/about.css">
    <link rel="icon" href="../photo/icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
  </head>
  <style type="text/css">
        /* WebKit and Opera browsers */
        @-webkit-keyframes spinner {
          from { -webkit-transform: rotateY(0deg);    }
          to   { -webkit-transform: rotateY(-360deg); }
        }
      
        /* all other browsers */
        @keyframes spinner {
          from {
            -moz-transform: rotateY(0deg);
            -ms-transform: rotateY(0deg);
            transform: rotateY(0deg);
          }
          to {
            -moz-transform: rotateY(-360deg);
            -ms-transform: rotateY(-360deg);
            transform: rotateY(-360deg);
          }
        }
      
      </style>
      <style type="text/css">

        #stage {
          margin: 1em auto;
          -webkit-perspective: 1200px;
          -moz-perspective: 1200px;
          -ms-perspective: 1200px;
          perspective: 1200px;
        }
      
      </style>
      <style type="text/css">

        #spinner {
          -webkit-animation-name: spinner;
          -webkit-animation-timing-function: linear;
          -webkit-animation-iteration-count: infinite;
          -webkit-animation-duration: 6s;
      
          animation-name: spinner;
          animation-timing-function: linear;
          animation-iteration-count: infinite;
          animation-duration: 5s;
      
          -webkit-transform-style: preserve-3d;
          -moz-transform-style: preserve-3d;
          -ms-transform-style: preserve-3d;
          transform-style: preserve-3d;
        }
      </style>

    <style type="text/css">
      body{
        background: #08001b;
      }
      #stage h1{
        color: #fff;
        font-family: 'Cabin', sans-serif;
        text-shadow: 0 0 1px rgba(78, 134, 255 , 0.712),
                      0 0 2px rgba(78, 134, 255 , 0.712),
                      0 0 4px rgba(78, 134, 255 , 0.712),
                      0 0 8px rgba(78, 134, 255 , 0.712);
      }
      #stage p{
        color: #fff;
        font-weight: bold;
        margin:7vh;
        text-align: justify;
        font-family: 'Cabin', sans-serif;
        text-shadow: 0 0 1px rgba(78, 134, 255 , 0.712),
                      0 0 2px rgba(78, 134, 255 , 0.712),
                      0 0 4px rgba(78, 134, 255 , 0.712),
                      0 0 8px rgba(78, 134, 255 , 0.712);
      }
      #stage #p2{
        color: #fff;
        font-weight: bold;
        margin:7vh;
        text-align: center;
        font-family: 'Cabin', sans-serif;
        text-shadow: 0 0 1px rgba(78, 134, 255 , 0.712),
                      0 0 2px rgba(78, 134, 255 , 0.712),
                      0 0 4px rgba(78, 134, 255 , 0.712),
                      0 0 8px rgba(78, 134, 255 , 0.712);
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
      <div class="right_area">
        <a href="#" class="logout_btn"></a>
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
        <h4>Welcome Admin</h4>
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
      <div id="stage" align="center">
        <img src="../photo/DELLUNALOGO.png" id="spinner" width="250px">
        <h1>Hotel Delluna Project</h1>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          This project wad created by KMD YUDE Students for final php project. It refers to 5 stars hotels in Myanmar. Last updated December 2020: 
          These Terms of Use apply to your use of Delluna’s Site and the services offered through it. Your use of the Site indicates your acceptance of 
          the Terms of Use, including the polices incorporated into them by reference. If you do not accept the Terms of Use, you must not use the Site 
          or the services. Through the Site, Delluna provides an online platform through which you can browse different types of lodging and temporary 
          accommodation, including but not necessarily limited to hotels, hostels, serviced apartments, B&Bs, rooms for rent, cottages, ryokans, etc. 
          (collectively, the “Accommodation(s)”) and request to make reservations with such Accommodations, including already making payment for such 
          reservations of Accommodations in advance with a credit card, debit card, e-wallet, or such other payment method to facilitate the processing 
          of such payment (“Payment Instrument”). By making a booking through the Site, you make an offer to book a reservation at the price listed for 
          such reservation and such other terms and conditions stated on the Site. This shall become a binding contract formed in Singapore pursuant to 
          the Terms of Use when accepted by the Accommodation and consequently Delluna. You will receive proof of the confirmed Accommodation booking via 
          an e-mail confirmation (with a voucher for prepaid Accommodations),which means the reservation has been confirmed by the Accommodation. 
          The “thank you page” means your reservation request has been received and is complete for final processing, no further action is required by you. 
          We reserve the right to reject bookings as set out below. For all questions about ZeroOne.com, the services or the Site, or if you wish to send 
          or serve any documents, correspondence, notices or other communications in respect of ZeroOne.com, the Site or otherwise, please contact Zero One 
          Company Pte. Ltd. directly.<p>
          <p id="p2">© 2020 All Rights Reserved | Delluna Hotel | Contact Us | Careers | Legal Notice | Zero One</p>
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