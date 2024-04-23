<?php
  include ("connections.php");
  include ("function.php");

  $query="select * from admin";
    $go_query=mysqli_query($connection,$query);
  while($row=mysqli_fetch_array($go_query))
  {
    $adminname=$row['adminname'];
  }
    
  if(isset($_POST['U1'])){
    roomup();
  }
?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta http-equiv="Content-Language" content="en-us">
    <meta charset="utf-8">
    <title>Edit Rooms</title>
    <link rel="stylesheet" href="../css/insertroom.css">
    <link rel="icon" href="../photo/Icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="../js/jquery.js"></script> 
    <script type="text/javascript" src="../js/bootstrap.js"></script> 
    <script type="text/javascript" src="../js/bootstrap-wysiwyg.js"></script> 
    <link href="../css/bootstrap-responsive.min.css" rel="stylesheet">

    <style>
      #editor {
        margin:5vh 10vh;
        max-height: 150px;
        font-size: 15px;
        height: 130px;
        background: rgb(0,0,0,0.4);
        border-collapse: separate; 
        border: 2px solid #fff; 
        border-radius: 5px;
        padding: 10px; 
        overflow: auto;
        outline: none;
        box-shadow: 0 0 1px rgba(106, 214, 241, 0.712),
                      0 0 2px rgba(106, 214, 241, 0.712),
                      0 0 4px rgba(106, 214, 241, 0.712),
                      0 0 8px rgba(106, 214, 241, 0.712);
        text-shadow: 0 0 1px rgba(106, 214, 241, 0.712),
                      0 0 2px rgba(106, 214, 241, 0.712),
                      0 0 4px rgba(106, 214, 241, 0.712),
                      0 0 8px rgba(106, 214, 241, 0.712);
        transition: 1s;
      }

      #editor:hover{
        box-shadow: 0 0 1px rgba(243, 255, 0, 0.712),
                      0 0 2px rgba(243, 255, 0, 0.712),
                      0 0 4px rgba(243, 255, 0, 0.712),
                      0 0 8px rgba(243, 255, 0, 0.712);
      }

      #voiceBtn {
        width: 20px;
        color: transparent;
        background-color: transparent;
        transform: scale(2.0, 2.0);
        -webkit-transform: scale(2.0, 2.0);
        -moz-transform: scale(2.0, 2.0);
        border: transparent;
        cursor: pointer;
        -webkit-box-shadow: none;
      }

      div[data-role="editor-toolbar"] {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      .dropdown-menu a {
        cursor: pointer;
      }

      .btn{
        text-decoration: none;
        border: 1px solid #fff;
        background: rgba(0,0,0,0.5);
        text-shadow: none;
        margin: 0;
        box-shadow: 0 0 1px rgba(106, 214, 241, 0.712),
                      0 0 2px rgba(106, 214, 241, 0.712),
                      0 0 4px rgba(106, 214, 241, 0.712),
                      0 0 8px rgba(106, 214, 241, 0.712);
      }

      .btn:hover{
        background: black;
        box-shadow: 0 0 1px rgba(243, 255, 0, 0.712),
                      0 0 2px rgba(243, 255, 0, 0.712),
                      0 0 4px rgba(243, 255, 0, 0.712),
                      0 0 8px rgba(243, 255, 0, 0.712);
      }

      body{
        background: url(../photo/RoomBg1.jpg);
        background-size: cover;
        text-decoration: none;
      }
      .sidebar a{
        text-decoration: none;
        color: #fff;
      }
      .sidebar,.left_area{
        font-size: 16px;
        font-family: "Roboto", Cambria;
        text-decoration: none;
      }

      .F1 h1{
        font-family: "Roboto", Cambria;
        font-size: 43px;
        padding: 4vh 1vh 2vh 1vh;
        color: #fff;
        text-shadow: 0 0 1px rgba(106, 214, 241, 0.712),
                  0 0 2px rgba(106, 214, 241, 0.712),
                  0 0 4px rgba(106, 214, 241, 0.712),
                  0 0 8px rgba(106, 214, 241, 0.712),
                  0 0 16px rgba(106, 214, 241, 0.712);
      }

      #L1{
        font-family: "Roboto", Cambria;
        font-size: 20px;
        padding-top: 4vh;
        text-shadow: 0 0 1px rgba(106, 214, 241, 0.712),
                  0 0 2px rgba(106, 214, 241, 0.712),
                  0 0 4px rgba(106, 214, 241, 0.712),
                  0 0 8px rgba(106, 214, 241, 0.712);
        }
        
      #FL1{
        font-family: "Roboto", Cambria;
        font-size: 20px;
        text-shadow: 0 0 1px rgba(106, 214, 241, 0.712),
                  0 0 2px rgba(106, 214, 241, 0.712),
                  0 0 4px rgba(106, 214, 241, 0.712),
                  0 0 8px rgba(106, 214, 241, 0.712);
      }

      #FL2{
        font-family: "Roboto", Cambria;
        text-decoration: none;
        color:#fff;
        padding: 2vh 1vh 3vh 1vh;
        text-shadow: 0 0 1px rgba(106, 214, 241, 0.712),
                      0 0 2px rgba(106, 214, 241, 0.712),
                      0 0 4px rgba(106, 214, 241, 0.712),
                      0 0 8px rgba(106, 214, 241, 0.712);
      }

      .F1{
        background: rgb(0,0,0,0.4);
        color: #fff;
        margin: 8vh 15vh;
        border: 2px solid #fff;
        border-radius: 10px;
        box-shadow: 0 0 1px rgba(106, 214, 241, 0.712),
                  0 0 2px rgba(106, 214, 241, 0.712),
                  0 0 4px rgba(106, 214, 241, 0.712),
                  0 0 8px rgba(106, 214, 241, 0.712);
      }

      #T1{
        background: rgb(0,0,0,0.4);
        font-size: 15px;
        color: #fff;
        text-align: center;
        border: 2px solid #fff;
        border-radius: 5px;
        box-shadow: 0 0 1px rgba(106, 214, 241, 0.712),
                  0 0 2px rgba(106, 214, 241, 0.712),
                  0 0 4px rgba(106, 214, 241, 0.712),
                  0 0 8px rgba(106, 214, 241, 0.712);
        transition: 1s;
      }

      .FL2{
        margin: 0vh 10vh 1vh 10vh;
        text-align: center;
        align-items: center;
      }

      #T3{
        font-family: "Roboto", Cambria;
        margin:0vh 10vh;
        max-height: 150px;
        font-size: 15px;
        height: 90px;
        width: 125vh;
        background: rgb(0,0,0,0.4);
        border-collapse: separate; 
        border: 2px solid #fff; 
        border-radius: 5px;
        padding: 10px; 
        overflow: auto;
        outline: none;
        resize:none;
        color: #fff;
        text-shadow: 0 0 1px rgba(106, 214, 241, 0.712),
                      0 0 2px rgba(106, 214, 241, 0.712),
                      0 0 4px rgba(106, 214, 241, 0.712),
                      0 0 8px rgba(106, 214, 241, 0.712);
        box-shadow: 0 0 1px rgba(106, 214, 241, 0.712),
                      0 0 2px rgba(106, 214, 241, 0.712),
                      0 0 4px rgba(106, 214, 241, 0.712),
                      0 0 8px rgba(106, 214, 241, 0.712);
        transition: 1s;
      }

      .F2 img{
          margin: 1.5vh 0vh 1vh 0vh;
          border: 2px solid #fff;
          border-radius: 5px;
          box-shadow: 0 0 1px rgba(106, 214, 241, 0.712),
                      0 0 2px rgba(106, 214, 241, 0.712),
                      0 0 4px rgba(106, 214, 241, 0.712),
                      0 0 8px rgba(106, 214, 241, 0.712);
      }

      #T1:hover{
        background: rgb(0,0,0,0.8);
        box-shadow: 0 0 1px rgba(243, 255, 0, 0.712),
                  0 0 2px rgba(243, 255, 0, 0.712),
                  0 0 4px rgba(243, 255, 0, 0.712),
                  0 0 8px rgba(243, 255, 0, 0.712);
      }

      #T3:hover{
        background: rgb(0,0,0,0.8);
        box-shadow: 0 0 1px rgba(243, 255, 0, 0.712),
                  0 0 2px rgba(243, 255, 0, 0.712),
                  0 0 4px rgba(243, 255, 0, 0.712),
                  0 0 8px rgba(243, 255, 0, 0.712);
      }

      .L1{
        margin: 0vh 57.5vh 1.5vh 57.5vh;
        padding: 5px 25px;
        border: 2px solid #fff;
        border-radius: 5px;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: bold;
        color: #fff;
        transition: 1s;
        font-size: 18px;
        background: rgb(0,0,0,0.6);
        cursor: pointer;
        box-shadow: 0 0 1px rgba(106, 214, 241, 0.712),
                  0 0 2px rgba(106, 214, 241, 0.712),
                  0 0 4px rgba(106, 214, 241, 0.712),
                  0 0 8px rgba(106, 214, 241, 0.712);
      }

      .L1:hover{
        background: rgb(0,0,0,0.8);
        color: #fff;
        box-shadow: 0 0 1px rgba(243, 255, 0, 0.712),
                  0 0 2px rgba(243, 255, 0, 0.712),
                  0 0 4px rgba(243, 255, 0, 0.712),
                  0 0 8px rgba(243, 255, 0, 0.712);
      }

      .L1.active{
        background: rgb(0,0,0,0.8);
        color: #fff;
        margin: 0vh 30vh 1.5vh 30vh;
      }

      #T3::placeholder {
      color: rgb(255,255,255)
        }

      .L1 span{
        font-weight: normal;
      }

      .B1{
        background: rgb(0,0,0,0.6);
        padding: 0.8vh 4vh;
        margin-bottom: 4vh;
        font-size: 18px;
        font-weight: bold;
        text-transform: uppercase;
        color: #fff;
        text-align: center;
        border: 2px solid #fff;
        border-radius: 5px;
        box-shadow: 0 0 1px rgba(106, 214, 241, 0.712),
                  0 0 2px rgba(106, 214, 241, 0.712),
                  0 0 4px rgba(106, 214, 241, 0.712),
                  0 0 8px rgba(106, 214, 241, 0.712);
        text-shadow: 0 0 1px rgba(106, 214, 241, 0.712),
                  0 0 2px rgba(106, 214, 241, 0.712),
                  0 0 4px rgba(106, 214, 241, 0.712),
                  0 0 8px rgba(106, 214, 241, 0.712);
        transition: 1s;
      }

      .B1:hover{
        background: rgb(0,0,0,0.9);
        text-shadow: 0 0 1px rgba(243, 255, 0, 0.712),
                  0 0 2px rgba(243, 255, 0, 0.712),
                  0 0 4px rgba(243, 255, 0, 0.712),
                  0 0 8px rgba(243, 255, 0, 0.712);
        box-shadow: 0 0 1px rgba(243, 255, 0, 0.712),
                  0 0 2px rgba(243, 255, 0, 0.712),
                  0 0 4px rgba(243, 255, 0, 0.712),
                  0 0 8px rgba(243, 255, 0, 0.712);
      }

      .FL2 img{
          margin: 3.5vh 9vh 0vh 9vh;
      }
    </style>

    <script src="../external/jquery.hotkeys.js"></script>
    <script src="../external/google-code-prettify/prettify.js"></script>
    <script src="../js/bootstrap-wysiwyg.js"></script>
    <script language="javascript">
      function loadVal(){
        desc = $("#editor").html();
        document.form1.desc.value = desc;
      }
    </script>
  </head>
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
    <div class="content" align="center">
    <?php
        if(isset($_GET['action'])&&$_GET['action']=='edit')
        {
	        $r_id=$_GET['r_id'];
            $query="select * from room,roomtype where roomid='$r_id'";
	        $go_query=mysqli_query($connection,$query);
            while($row=mysqli_fetch_array($go_query))
            {
                $roomid=$row['roomid'];
                $roomtype_id=$row['roomtype'];
                $price=$row['price'];
                $deco1=$row['decoration1'];
                $deco2=$row['decoration'];
                $photo=$row['image'];
                $photo1=$row['image1'];
                $photo2=$row['image2'];
                $photo3=$row['image3'];
	        }
        }
    ?>
      <form method="POST" name="form1" onsubmit="loadVal();" enctype="multipart/form-data">    
        <div class="F1">
          <h1 align="center">Edit Room</h1>
          <div align="center" class="F2">

            <label id="L1"><i class="fas fa-bed"></i>&nbsp;&nbsp;Room Type Name:</label>
            <select name="room_type" class="form-control" id="T1" style="font-family:Cambria;">
            <?php
                $query="select * from roomtype";
                $go_query=mysqli_query($connection,$query);
                while($row=mysqli_fetch_array($go_query))
                {
                    $roomtypeid=$row['roomtypeid'];
                    $roomtypename=$row['roomtypename'];
                    if($roomtype_id==$roomtypeid)
                    {
                        echo "<option value={$roomtypeid} selected>{$roomtypename}</option>";
                    }
                    else
                    {
                        echo "<option value={$roomtypeid}>{$roomtypename}</option>";
                    }
                }
            ?>
            </select>
          </div>

          <div align="center">
            <label id="L1"><i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;Price:</label>
            <input type="text" name="price" id="T1" style="font-family:Cambria;" value="<?php echo $price ?>" require="required">
          </div>

          <div align="center" class="F2">
            <label id="L1"><i class="far fa-image"></i>&nbsp;&nbsp;Insert Image:</label>
            <img src="../roomphoto/<?php echo $photo ?>" width="150"/>
            <input name="photo" type="file" id="file" hidden>
            <label class="L1" for="file" id="selector" style="font-family:Cambria;">Select File</label>
            <script src="../js/input.js"></script>
          </div>

          <div align="center">
            <label id="L1"><i class="fas fa-tasks"></i>&nbsp;&nbsp;Decoration:</label>
            <textarea name="deco2" id="T3" require="required" placeholder="Enter new decoration"></textarea>
          </div> 

          <div>
            <label id="L1"><i class="fas fa-sliders-h"></i>&nbsp;&nbsp;Additional Decoration:</label>
            <div id="alerts"></div>
              <div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
                <div class="btn-group">
                  <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fas fa-font"></i>&nbsp;<i class="fas fa-caret-down"></i></a>
                    <ul class="dropdown-menu">
                    </ul>
                </div>

                <div class="btn-group">
                  <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fas fa-text-height"></i>&nbsp;<i class="fas fa-caret-down"></i></a>
                    <ul class="dropdown-menu">
                    <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
                    <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
                    <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
                    </ul>
                </div>

                <div class="btn-group">
                  <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fas fa-bold"></i></a>
                  <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fas fa-italic"></i></a>
                  <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fas fa-strikethrough"></i></a>
                  <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fas fa-underline"></i></a>
                </div>

                <div class="btn-group">
                  <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fas fa-list-ul"></i></a>
                  <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fas fa-list-ol"></i></a>
                  <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fas fa-outdent"></i></a>
                  <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fas fa-indent"></i></a>
                </div>

                <div class="btn-group">
                  <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fas fa-align-left"></i></a>
                  <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fas fa-align-center"></i></a>
                  <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fas fa-align-right"></i></a>
                  <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fas fa-align-justify"></i></a>
                </div>

                <div class="btn-group">
                  <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fas fa-link"></i></a>
                  <div class="dropdown-menu input-append">
                    <input class="span2" placeholder="URL" type="text" data-edit="createLink"/>
                    <button class="btn" type="button">Add</button>
                  </div>
                  <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fas fa-cut"></i></i></a>
                </div>
                
                <div class="btn-group">
                  <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="far fa-image"></i></i></a>
                  <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
                </div>
                <div class="btn-group">
                  <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fas fa-undo-alt"></i></a>
                  <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fas fa-redo-alt"></i></a>
                </div>
                <input type="text" data-edit="inserttext" id="voiceBtn" x-webkit-speech="">
              </div>

              <div id="editor"></div>
              
              <textarea rows="2" name="desc" cols="20" style="display:none;"></textarea>

              <script>
                $(function(){
                  function initToolbarBootstrapBindings() {
                    var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 
                          'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
                          'Times New Roman', 'Verdana'],
                          fontTarget = $('[title=Font]').siblings('.dropdown-menu');
                    $.each(fonts, function (idx, fontName) {
                        fontTarget.append($('<li><a data-edit="fontName ' + fontName +'" style="font-family:\''+ fontName +'\'">'+fontName + '</a></li>'));
                    });
                    $('a[title]').tooltip({container:'body'});
                    $('.dropdown-menu input').click(function() {return false;})
                      .change(function () {$(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');})
                      .keydown('esc', function () {this.value='';$(this).change();});

                    $('[data-role=magic-overlay]').each(function () { 
                      var overlay = $(this), target = $(overlay.data('target')); 
                      overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
                    });
                    if ("onwebkitspeechchange"  in document.createElement("input")) {
                      var editorOffset = $('#editor').offset();
                      $('#voiceBtn').css('position','absolute').offset({top: editorOffset.top, left: editorOffset.left+$('#editor').innerWidth()-35});
                    } else {
                      $('#voiceBtn').hide();
                    }
                };
                function showErrorAlert (reason, detail) {
                  var msg='';
                  if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
                  else {
                    console.log("error uploading file", reason, detail);
                  }
                  $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
                  '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
                };
                  initToolbarBootstrapBindings();  
                $('#editor').wysiwyg({ fileUploadError: showErrorAlert} );
                  window.prettyPrint && prettyPrint();
                });
              </script> 

              <div align="center" class="F2">
                <label id="FL1"><i class="fas fa-link"></i>&nbsp;&nbsp;Attach More Images:</label>
                <div class="FL2">
                    <img src="../roomphoto/<?php echo $photo1 ?>" width="150"/>
                    <img src="../roomphoto/<?php echo $photo2 ?>" width="150"/>
                    <img src="../roomphoto/<?php echo $photo3 ?>" width="150"/><br>
                
                  <input id="FL2" name="photo1" type="file" require="required">
                  <input id="FL2" name="photo2" type="file" require="required">
                  <input id="FL2" name="photo3" type="file" require="required">
                </div>
              </div>

              <input type="submit" value="Update" name="U1" class="B1" style="font-family:Cambria;"></div> 
            </div>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>