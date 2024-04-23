<?php
    function create_accu()
    {
        global $connection;
        global $user_name;
        global $password;
        global $email;
        global $phone;
        global $address;
        global $profile;
        date_default_timezone_set('Asia/Yangon');
        $rdate= date('Y-m-d h:i:s A', time () );
        $query="select * from users where username='$user_name' and password='$password'";
        $user_query=mysqli_query($connection,$query);
        // $count=mysqli_num_rows($user_query);
        // if($count>0)
        // {
        //     echo "<script>window.alert('already exists')</script>"; 
        // }
        $query1="select * from users";
        $go_query=mysqli_query($connection,$query1);
        while($row=mysqli_fetch_array($go_query))
        {
            $dbusername=$row['username'];
            $dbemail=$row['email'];
            $dbphone=$row['phone'];
        }
        if($user_name==$dbusername) {
            echo"<script>window.alert('This username is already exists!!!')</script>";
            echo "<script>window.location.href='index.php'</script>";
        }
        elseif($email==$dbemail) {
            echo"<script>window.alert('This email is already exists!!!')</script>";
            echo "<script>window.location.href='index.php'</script>";
        }
        elseif($phone==$dbphone) {
            echo"<script>window.alert('This phone is already exists!!!')</script>";
            echo "<script>window.location.href='index.php'</script>";
        }
        else
        {
            $query="insert into users(username,password,email,phone,address,role,profile_image,register_date)";
            $query.="values('$user_name','$password','$email','$phone','$address','user','$profile','$rdate')";
            $go_query=mysqli_query($connection,$query);
            if(!$go_query)
            { 
                die("QUERY FAILED".mysqli_error($connection)); 
            }
            else
            {
                move_uploaded_file($_FILES['profileImage']['tmp_name'],'userphoto/'.$profile);
            }
            echo"<script>window.alert('You successfully created an account')</script>";
            echo "<script>window.location.href='index.php'</script>";
        }
    }


    function add_feedback(){
        global $connection;   
        $text = $_POST['desc'];
        $uname=$_POST['uname'];
        if ($text=="") {
            echo "<script>window.alert('Enter Feedback')</script>";
            header("location:index.php");  
        }
        elseif($text!=""){
            $query="select * from feedback where text='$text'";   
            $ch_query=mysqli_query($connection,$query);   
            $count=mysqli_num_rows($ch_query);    
            if($count>0)
            {      
                echo "<script>window.alert('already exists')</script>";   
                header("location:index.php");     
            }
            else  
            {   
                $query="insert into feedback(username,text)";   
                $query.="values('$uname','$text')";
                $go_query=mysqli_query($connection,$query);   
                if(!$go_query)
                {    
                    die("QUERY FAILED".mysqli_error($connection));    
                }    
                else
                { 
                    echo "<script>window.alert('successfully inserted')</script>";
                    header("location:index.php");    
                }  
            }    
        }   
    }


    function update_user(){
        global $connection;
        $user_id=$_GET['id'];
        $photo = $_FILES["ppphoto"]["name"];
        $user_name=$_POST['username'];
        $email=$_POST['email'];
        $pass=$_POST['password'];
        $phone=$_POST['phonenumber'];
        $address=$_POST['address'];

        $query="update users set username='$user_name',userid='$user_id',";  
        $query.="profile_image='$photo',email='$email', password='$pass',phone='$phone',address='$address' where userid='$user_id'";               
        $go_query=mysqli_query($connection,$query);  
        if(!$go_query)
        {   
            die("QUERY FAILED".mysqli_error($connection));   
        }
        else
        {   
            move_uploaded_file($_FILES['ppphoto']['tmp_name'],'userphoto/'.$photo);   
        }   
        header("location:index.php");  
    }
