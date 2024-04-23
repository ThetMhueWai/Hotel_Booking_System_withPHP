<?php
function changepassword()
{
    global $connection;
    $npass = $_POST['npass'];
    date_default_timezone_set('Asia/Yangon');
    $udate = date('Y-m-d h:i:s A', time());
    $query = "update admin set password='$npass', updatedate='$udate'";
    $go_query = mysqli_query($connection, $query);
    if (!$go_query) {
        die("QUEYR FAILED" . mysqli_error($connection));
    } else {
        echo "<script>window.alert('Successfully Change Your Password')</script>";
        echo "<script>window.location.href='account.php'</script>";
    }
}

function admin_login()
{
    global $connection;
    $aname = $_POST['aname'];
    $apassword = $_POST['apass'];
    $query = "SELECT * FROM admin";
    $go_query = mysqli_query($connection, $query);

    while ($out = mysqli_fetch_array($go_query)) {
        $db_aname = $out['adminname'];
        $db_password = $out['password'];
        if ($db_aname == $aname && $db_password == $apassword) {
            header('location:dashboard.php');
        } else {
            echo "<script>window.alert('Invalid Admin Name and Password')</script>";
            echo "<script>window.location.href='index.php'</script>";
        }
    }
}

function forgetpassword()
{
    global $connection;
    $uname = $_POST['auname'];
    $query = "SELECT * FROM admin";
    $go_query = mysqli_query($connection, $query);
    while ($out = mysqli_fetch_array($go_query)) {
        $db_email = $out['email'];
        $db_phone = $out['phone'];
        if ($db_email == $uname || $db_phone == $uname) {
            header('location:forgetpassword.php');
        } else {
            echo "<script>window.alert('Invalid Email Address or Phone Number')</script>";
            echo "<script>window.location.href='index.php'</script>";
        }
    }
}
function updatepassword()
{
    global $connection;
    $adpass = $_POST['adpass'];
    date_default_timezone_set('Asia/Yangon');
    $udate = date('Y-m-d h:i:s A', time());
    $query = "update admin set password='$adpass', updatedate='$udate'";
    $go_query = mysqli_query($connection, $query);
    if (!$go_query) {
        die("QUEYR FAILED" . mysqli_error($connection));
    } else {
        echo "<script>window.alert('Successfully Change Your Password')</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
}
function btnchange()
{
    global $connection;
    $newname = $_POST['newname'];
    $newemail = $_POST['newemail'];
    $newphone = $_POST['newphone'];

    $query = "select * from admin";
    $go_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($go_query)) {
        $adminname = $row['adminname'];
        $email = $row['email'];
        $phone = $row['phone'];
    }
    if ($newname == '') {
        $newname = $adminname;
    }
    if ($newemail == '') {
        $newemail = $email;
    }
    if ($newphone == '') {
        $newphone = $phone;
    }
    date_default_timezone_set('Asia/Yangon');
    $udate = date('Y-m-d h:i:s A', time());
    $query = "update admin set adminname='$newname', email='$newemail', phone='$newphone', updatedate='$udate'";
    $go_query = mysqli_query($connection, $query);
    if (!$go_query) {
        die("QUEYR FAILED" . mysqli_error($connection));
    } else {
        echo "<script>window.alert('Successfully Change Your Information')</script>";
        echo "<script>window.location.href='account.php'</script>";
    }
}

//!--->Create Room Types
function createroom()
{
    global $connection;
    global $msg;
    $rt_name = $_POST['roomname'];
    if ($rt_name == "") {
        echo "<script>window.alert('Enter Roomtype name')</script>";
    } elseif ($rt_name != "") {
        $query = "select * from roomtype where roomtypename='$rt_name'";
        $ch_query = mysqli_query($connection, $query);
        $count = mysqli_num_rows($ch_query);
        if ($count > 0) {
            echo "<script>window.alert('This room type is already exists)</script>";
        } else {
            $query = "insert into roomtype (roomtypename) values ('$rt_name')";
            $go_query = mysqli_query($connection, $query);
            if (!$go_query) {
                die("QUERY FAILED" . mysqli_error($connection));
            } else {
                echo "<script>window.alert('Successfully creared room type')</script>";
            }
        }
    }
}
function del_room()
{
    global $connection;
    $roomt_id = $_GET['rt_id'];
    $query = "delete from roomtype where roomtypeid='$roomt_id'";
    $go_query = mysqli_query($connection, $query);
    header("location:createroomtype.php");
}
function update_room()
{
    global $connection;
    $room_name = $_POST['newroomtypename'];
    $roomt_id = $_GET['rt_id'];
    date_default_timezone_set('Asia/Yangon');
    $udate = date('Y-m-d h:i:s A', time());
    $query = "update roomtype set roomtypename='$room_name', update_date='$udate' where roomtypeid='$roomt_id'";
    $go_query = mysqli_query($connection, $query);
    if (!$go_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
    header("location:createroomtype.php");
}

//--->Create Ballroom Type
function createbroom()
{
    global $connection;
    global $msg;
    $brt_name = $_POST['broomname'];
    if ($brt_name == "") {
        echo "<script>window.alert('Enter Ballroom Type name')</script>";
    } elseif ($brt_name != "") {
        $query = "select * from ballroomtype where ballroomtypename='$brt_name'";
        $ch_query = mysqli_query($connection, $query);
        $count = mysqli_num_rows($ch_query);
        if ($count > 0) {
            echo "<script>window.alert('This ballroom type is already exists')</script>";
        } else {
            $query = "insert into ballroomtype (ballroomtypename) values ('$brt_name')";
            $go_query = mysqli_query($connection, $query);
            if (!$go_query) {
                die("QUERY FAILED" . mysqli_error($connection));
            } else {
                echo "<script>window.alert('Successfully inserted ballroom type')</script>";
            }
        }
    }
}
function del_broom()
{
    global $connection;
    $broomt_id = $_GET['brt_id'];
    $query = "delete from ballroomtype where ballroomtypeid='$broomt_id'";
    $go_query = mysqli_query($connection, $query);
    header("location:createballroomtype.php");
}
function update_broom()
{
    global $connection;
    $nbroom_name = $_POST['newbroomtypename'];
    $broomt_id = $_GET['brt_id'];
    date_default_timezone_set('Asia/Yangon');
    $udate = date('Y-m-d h:i:s A', time());
    $query = "update ballroomtype set ballroomtypename='$nbroom_name', update_date='$udate' where ballroomtypeid='$broomt_id'";
    $go_query = mysqli_query($connection, $query);
    if (!$go_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
    header("location:createballroomtype.php");
}

//---> Insert Room
function insert()
{
    global $connection;
    $rtname = $_POST['roomtype'];
    $price = $_POST['price'];
    $decoration = $_POST['desc'];
    $decoration2 = $_POST['deco2'];
    date_default_timezone_set('Asia/Yangon');
    $createdate = date('Y-m-d h:i:s A', time());
    $photo = $_FILES['photo']['name'];
    $photo1 = $_FILES['photo1']['name'];
    $photo2 = $_FILES['photo2']['name'];
    $photo3 = $_FILES['photo3']['name'];
    if ($price == "") {
        echo "<script>window.alert('Enter room price')</script>";
        echo "<script>window.location.href='insertroom.php'</script>";
    } else if ($decoration == "") {
        echo "<script>window.alert('Enter room decoration')</script>";
        echo "<script>window.location.href='insertroom.php'</script>";
    } else if ($photo == "") {
        echo "<script>window.alert('Insert room image')</script>";
        echo "<script>window.location.href='insertroom.php'</script>";
    } else if ($photo1 == "") {
        echo "<script>window.alert('Insert room image')</script>";
        echo "<script>window.location.href='insertroom.php'</script>";
    } else if ($photo2 == "") {
        echo "<script>window.alert('Insert room image')</script>";
        echo "<script>window.location.href='insertroom.php'</script>";
    } else if ($photo3 == "") {
        echo "<script>window.alert('Insert room image')</script>";
        echo "<script>window.location.href='insertroom.php'</script>";
    } else {
        $query = "insert into room (decoration,decoration1,roomtype,price,createrdate,image,image1,image2,image3) values ('$decoration','$decoration2','$rtname','$price','$createdate','$photo','$photo1','$photo2','$photo3')";
        $go_query = mysqli_query($connection, $query);
        if (!$go_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        } else {
            move_uploaded_file($_FILES['photo']['tmp_name'], '../roomphoto/' . $photo);
            move_uploaded_file($_FILES['photo1']['tmp_name'], '../roomphoto/' . $photo1);
            move_uploaded_file($_FILES['photo2']['tmp_name'], '../roomphoto/' . $photo2);
            move_uploaded_file($_FILES['photo3']['tmp_name'], '../roomphoto/' . $photo3);
            echo "<script>window.alert('Successfully insert room')</script>";
            echo "<script>window.location.href='insertroom.php'</script>";
        }
    }
}

//--->Insert Ballroom
function insertballroom()
{
    global $connection;
    $bname = $_POST['bname'];
    $rtname = $_POST['roomtype'];
    $price = $_POST['price'];
    $limit = $_POST['limit'];
    $decoration = $_POST['desc'];
    $decoration2 = $_POST['deco2'];
    date_default_timezone_set('Asia/Yangon');
    $createdatet = date('Y-m-d h:i:s A', time());
    $photo = $_FILES['photo']['name'];
    $photo1 = $_FILES['photo1']['name'];
    $photo2 = $_FILES['photo2']['name'];
    $photo3 = $_FILES['photo3']['name'];
    if ($price == "") {
        echo "<script>window.alert('Enter room price')</script>";
        echo "<script>window.location.href='insertroom.php'</script>";
    } else if ($decoration == "") {
        echo "<script>window.alert('Enter room decoration')</script>";
        echo "<script>window.location.href='insertroom.php'</script>";
    } else if ($photo == "") {
        echo "<script>window.alert('Insert room image')</script>";
        echo "<script>window.location.href='insertroom.php'</script>";
    } else if ($photo1 == "") {
        echo "<script>window.alert('Insert room image')</script>";
        echo "<script>window.location.href='insertroom.php'</script>";
    } else if ($photo2 == "") {
        echo "<script>window.alert('Insert room image')</script>";
        echo "<script>window.location.href='insertroom.php'</script>";
    } else if ($photo3 == "") {
        echo "<script>window.alert('Insert room image')</script>";
        echo "<script>window.location.href='insertroom.php'</script>";
    } else if ($limit == "") {
        echo "<script>window.alert('Enter limit people')</script>";
        echo "<script>window.location.href='insertroom.php'</script>";
    } else if (is_numeric($limit) == false) {
        echo "<script>window.alert('Limit person is numeric')</script>";
        echo "<script>window.location.href='insertroom.php'</script>";
    } else {
        $query = "insert into ballroom (ballroomname,decoration,ballroomtype,price,createbdate,bimage,limit_person,decoration2,bimage1,bimage2,bimage3) values ('$bname','$decoration','$rtname','$price','$createdatet','$photo','$limit','$decoration2','$photo1','$photo2','$photo3')";
        $go_query = mysqli_query($connection, $query);
        if (!$go_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        } else {
            move_uploaded_file($_FILES['photo']['tmp_name'], '../roomphoto/' . $photo);
            move_uploaded_file($_FILES['photo1']['tmp_name'], '../roomphoto/' . $photo1);
            move_uploaded_file($_FILES['photo2']['tmp_name'], '../roomphoto/' . $photo2);
            move_uploaded_file($_FILES['photo3']['tmp_name'], '../roomphoto/' . $photo3);
            echo "<script>window.alert('Successfully insert ballroom')</script>";
            echo "<script>window.location.href='insertballroom.php'</script>";
        }
    }
}

if (function_exists("delete_rooms") == FALSE) {
    function delete_rooms()
    {
        global $connection;
        $r_id = $_GET['r_id'];
        $query = "DELETE FROM room WHERE roomid='$r_id'";
        $go_query = mysqli_query($connection, $query);
        echo "<script>window.location.href='roomlists.php'</script>";
    }
}

if (function_exists("delete_ballrooms") == FALSE) {
    function delete_ballrooms()
    {
        global $connection;
        $br_id = $_GET['br_id'];
        $query = "DELETE FROM ballroom WHERE ballroomid='$br_id'";
        $go_query = mysqli_query($connection, $query);
        echo "<script>window.location.href='ballroomlists.php'</script>";
    }
}

function roomup()
{
    global $connection;
    $query = "select * from room,roomtype";
    $go_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($go_query)) {
        $roomtype_id = $row['roomtype'];
        $db_price = $row['price'];
        $db_deco1 = $row['decoration1'];
        $db_deco2 = $row['decoration'];
        $db_photo = $row['image'];
        $db_photo1 = $row['image1'];
        $db_photo2 = $row['image2'];
        $db_photo3 = $row['image3'];
    }

    global $connection;
    $roomid = $_GET['r_id'];
    $roomtypeid = $_POST['room_type'];
    $price = $_POST['price'];
    $deco1 = $_POST['deco2'];
    $deco2 = $_POST['desc'];
    $photo = $_FILES['photo']['name'];
    $photo1 = $_FILES['photo1']['name'];
    $photo2 = $_FILES['photo2']['name'];
    $photo3 = $_FILES['photo3']['name'];


    if ($roomtypeid == "") {
        $roomtypeid = $roomtype_id;
    }
    if ($price == "") {
        $price = $price;
    }
    if ($deco1 == "") {
        $deco1 = $db_deco1;
    }
    if ($deco2 == "") {
        $deco2 = $db_deco2;
    }
    if ($photo == "") {
        $photo = $db_photo;
    }
    if ($photo1 == "") {
        $photo1 = $db_photo1;
    }
    if ($photo2 == "") {
        $photo2 = $db_photo2;
    }
    if ($photo3 == "") {
        $photo3 = $db_photo3;
    }
    date_default_timezone_set('Asia/Yangon');
    $update = date('Y-m-d h:i:s A', time());
    $query = "update room set roomid='$roomid',image='$photo',image1='$photo1',image2='$photo2',image3='$photo3',updaterdate='$update',";
    $query .= "roomtype='$roomtypeid',price='$price',decoration='$deco2',decoration1='$deco1' where roomid='$roomid'";

    $go_query = mysqli_query($connection, $query);
    if (!$go_query) {
        die("QUEYR FAILED" . mysqli_error($connection));
    } else {
        move_uploaded_file($_FILES['photo']['tmp_name'], '../roomphoto/' . $photo);
        move_uploaded_file($_FILES['photo1']['tmp_name'], '../roomphoto/' . $photo1);
        move_uploaded_file($_FILES['photo2']['tmp_name'], '../roomphoto/' . $photo2);
        move_uploaded_file($_FILES['photo3']['tmp_name'], '../roomphoto/' . $photo3);
    }
    echo "<script>window.alert('Successfully update room')</script>";
    echo "<script>window.location.href='roomlists.php'</script>";
}


function uballroom()
{
    global $connection;
    $query = "select * from ballroom,ballroomtype";
    $go_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($go_query)) {
        $broomtype_id = $row['ballroomtype'];
        $db_price = $row['price'];
        $db_deco1 = $row['decoration2'];
        $db_deco2 = $row['decoration'];
        $db_limit = $row['limit_person'];
        $db_photo = $row['bimage'];
        $db_photo1 = $row['bimage1'];
        $db_photo2 = $row['bimage2'];
        $db_photo3 = $row['bimage3'];
    }

    global $connection;
    $broomid = $_GET['br_id'];
    $roomtypeid = $_POST['broomtype'];
    $price = $_POST['price'];
    $limit = $_POST['limit'];
    $deco1 = $_POST['deco2'];
    $deco2 = $_POST['desc'];
    $photo = $_FILES['photo']['name'];
    $photo1 = $_FILES['photo1']['name'];
    $photo2 = $_FILES['photo2']['name'];
    $photo3 = $_FILES['photo3']['name'];


    if ($roomtypeid == "") {
        $roomtypeid = $roomtype_id;
    }
    if ($price == "") {
        $price = $price;
    }
    if ($limit == "") {
        $limit = $db_limit;
    }
    if ($deco1 == "") {
        $deco1 = $db_deco2;
    }
    if ($deco2 == "") {
        $deco2 = $db_deco1;
    }
    if ($photo == "") {
        $photo = $db_photo;
    }
    if ($photo1 == "") {
        $photo1 = $db_photo1;
    }
    if ($photo2 == "") {
        $photo2 = $db_photo2;
    }
    if ($photo3 == "") {
        $photo3 = $db_photo3;
    }
    date_default_timezone_set('Asia/Yangon');
    $update = date('Y-m-d h:i:s A', time());
    $query = "update ballroom set ballroomid='$broomid',bimage='$photo',bimage1='$photo1',bimage2='$photo2',bimage3='$photo3',updatebdate='$update',";
    $query .= "ballroomtype='$roomtypeid',limit_person='$limit',price='$price',decoration='$deco1',decoration2='$deco2' where ballroomid='$broomid'";

    $go_query = mysqli_query($connection, $query);
    if (!$go_query) {
        die("QUEYR FAILED" . mysqli_error($connection));
    } else {
        move_uploaded_file($_FILES['photo']['tmp_name'], '../roomphoto/' . $photo);
        move_uploaded_file($_FILES['photo1']['tmp_name'], '../roomphoto/' . $photo1);
        move_uploaded_file($_FILES['photo2']['tmp_name'], '../roomphoto/' . $photo2);
        move_uploaded_file($_FILES['photo3']['tmp_name'], '../roomphoto/' . $photo3);
    }
    echo "<script>window.alert('Successfully update ballroom')</script>";
    echo "<script>window.location.href='ballroomlists.php'</script>";
}
function banuser()
{
    global $connection;
    $usid = $_GET['u_id'];
    $query = "delete from users where userid='$usid'";
    $go_query = mysqli_query($connection, $query);
    header("location:manageuser.php");
}

function confirm_room()
{
    global $connection;
    $rbid = $_GET['rbid'];
    date_default_timezone_set('Asia/Yangon');
    $cfdate = date('Y-m-d h:i:s A', time());
    $query = "update roombooking set confirm_date='$cfdate',status=1 where roombookid='$rbid'";
    $go_query = mysqli_query($connection, $query);
    echo "<script>window.location.href='roombooking.php'</script>";
}

function delete_book()
{
    global $connection;
    $rbid = $_GET['rbid'];
    $query = "DELETE FROM roombooking WHERE roombookid='$rbid'";
    $go_query = mysqli_query($connection, $query);
    echo "<script>window.location.href='roombooking.php'</script>";
}

function confirm_ballroom()
{
    global $connection;
    $bbid = $_GET['bbid'];
    date_default_timezone_set('Asia/Yangon');
    $cfdate = date('Y-m-d h:i:s A', time());
    $query = "update ballroombooking set confirm_date='$cfdate',status=1 where bbookid='$bbid'";
    $go_query = mysqli_query($connection, $query);
    echo "<script>window.location.href='ballroombookings.php'</script>";
}

function delete_ballroom()
{
    global $connection;
    $bbid = $_GET['bbid'];
    $query = "DELETE FROM ballroombooking WHERE bbookid='$bbid'";
    $go_query = mysqli_query($connection, $query);
    echo "<script>window.location.href='ballroombookings.php'</script>";
}

function confirm_mroom()
{
    global $connection;
    $mbid = $_GET['mbid'];
    date_default_timezone_set('Asia/Yangon');
    $mcfdate = date('Y-m-d h:i:s A', time());
    $query = "update meetingbooking set mconfirm_date='$mcfdate',mstatus=1 where meetbookid='$mbid'";
    $go_query = mysqli_query($connection, $query);
    echo "<script>window.location.href='ballroombookings.php'</script>";
}

function delete_mroom()
{
    global $connection;
    $mbid = $_GET['mbid'];
    $query = "DELETE FROM meetingbooking WHERE meetbookid='$mbid'";
    $go_query = mysqli_query($connection, $query);
    echo "<script>window.location.href='ballroombookings.php'</script>";
}

function confirm_table()
{
    global $connection;
    $tbid = $_GET['tbid'];
    date_default_timezone_set('Asia/Yangon');
    $cfdate = date('Y-m-d h:i:s A', time());
    $query = "update tablebooking set confirm_date='$cfdate',status=1 where tbookingid='$tbid'";
    $go_query = mysqli_query($connection, $query);
    echo "<script>window.location.href='tablebooking.php'</script>";
}

function delete_table()
{
    global $connection;
    $tbid = $_GET['tbid'];
    $query = "DELETE FROM tablebooking WHERE tbookingid='$tbid'";
    $go_query = mysqli_query($connection, $query);
    echo "<script>window.location.href='tablebooking.php'</script>";
}
