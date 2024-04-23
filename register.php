<?php 
    include('admin/connections.php');
    include('function.php');
    
    if(isset($_POST['save_profile'])){
        $user_name=$_POST['username'];
        $password=$_POST['password'];
        $email=$_POST['email'];
        $phone=$_POST['phonenumber'];
        $address=$_POST['address'];
        $profile=$_FILES['profileImage']['name'];
        $errors=array(
        'username'=>'',
        'password'=>'',
        'confirmpassword'=>'',
        'match_password'=>'',
        'email'=>'',
        'phonenumber'=>'',
        'address'=>'' ,
        'profileImage'=>'');
        if($user_name=='')
        {
            echo "<script>window.alert('Username could not be empty!')</script>";
            echo "<script>window.location.href='register.php'</script>"; 
        }
        else
        { 
            if(strlen($user_name)<3)
            {
                echo "<script>window.alert('Username need to be longer!')</script>";
                echo "<script>window.location.href='register.php'</script>"; 
            } 
        }

        if($password=='')
        {
            echo "<script>window.alert('Password could not be empty!')</script>";
            echo "<script>window.location.href='register.php'</script>"; 
        }
        else
        { 
            if(strlen($password)<3)
            { 
                echo "<script>window.alert('Password need to be longer!')</script>";
                echo "<script>window.location.href='register.php'</script>"; 
            } 
        }

        if($email=='')
        {
            echo "<script>window.alert('Email could not be empty!')</script>";
            echo "<script>window.location.href='register.php'</script>"; 
        }

        if($phone=='')
        { 
            echo "<script>window.alert('Phone Number could not be empty!')</script>";
            echo "<script>window.location.href='register.php'</script>"; 
        }

        if($address=='')
        {
            echo "<script>window.alert('Address could not be empty!')</script>";
            echo "<script>window.location.href='register.php'</script>"; 
        }

        if($profile=='') {
            echo "<script>window.alert('Profile image could not be empty')</script>";
            echo "<script>window.location.href='register.php'</script>"; 
        }
        foreach($errors as $key=>$value)
        {
            if(empty($value))
            { 
                unset($errors[$key]);
            }
        }
        if($user_name!="" && $password!="" &&  $email!="" && $phone!="" && $address!="" && $profile!="")
        { 
            create_accu(); 
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image Preview and Upload PHP</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/userregister.css">
</head>
<body>

    <div class="back">
        <a href="index.php">
            <img src="photo/neon back.png" alt="">
        </a>
    </div>
    <div class="container">
        <div class="row">
            <div class=" col-md-4 form-div2">
            <!-- <a href="profiles.php">View all profiles</a> -->
            <form action="register.php" method="post" enctype="multipart/form-data">
                <h2 class="text-center mb-3 mt-3">Update profile</h2>
                <?php if (!empty($msg)): ?>
                    <div class="alert <?php echo $msg_class ?>" role="alert">
                        <?php echo $msg; ?>
                    </div>
                <?php endif; ?>
                <div class="form-group text-center" style="position: relative;" >
                    <span class="img-div">
                        <div class="text-center img-placeholder"  onClick="triggerClick()">
                            <h4>Upload image</h4>
                        </div>
                        <img src="photo/placeholder.png" onClick="triggerClick()" id="profileDisplay">
                    </span>
                    
                    <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
                </div>
            </div>
            <div class="col-md-4 form-div1">   
                    <div class="col">
                        <!-- User name -->
                        <input type="text" name="username" class="form-control mb-4" placeholder="User name">
                    </div>

                    <div class="col">
                        <!-- E-mail -->
                        <input type="email" name="email" class="form-control mb-4" placeholder="E-mail">
                    </div>

                    <div class="col">
                        <!-- Password -->
                        <input type="password" name="password" class="form-control mb-4" placeholder="Password">
                    </div>

                    <div class="col">
                        <!-- Phone number -->
                        <input type="text" name="phonenumber" class="form-control mb-4" placeholder="Phone number">
                    </div>

                    <div class="col">
                        <!-- Address -->
                        <div class="form-group">
                            <textarea type="text" class="form-control rounded-0" name="address" rows="3" placeholder="Address"></textarea>
                        </div>
                    </div>
                <div class="col">
                <div class="form-group">
                    <button type="submit" name="save_profile" class="btn-block">Save User</button>
                </div>
                </div>
            
        </form>
      </div>
    </div>
  </div>
</body>
</html>
<script src="js/register.js"></script>