<?php
    include('admin/connections.php');
    include('function.php');
    if (isset($_POST['meeting_book'])) 
    {
        $date=$_POST['date'];
        $hour=$_POST['hour'];
        $username=$_POST['user_name'];
        $phone=$_POST['phone'];
        $person=$_POST['person'];
        $errors=array(
        'date'=>'',
        'hour'=>'',
        'user_name'=>'',
        'phone'=>'',
        'person'=>'');
        if($hour=='')
        { 
            $errors['hour']='Select hour could not be empty'; 
        }
        if($person=='') {
            $error['person']='How to many person could not be empty';
        }
        foreach($errors as $key=>$value)
        {
            if(empty($value))
            { 
                unset($errors[$key]);
            }
        }
        if(empty($errors))
        { 
            global $connection;
            $query="insert into meetingbooking(musername,mphone,mbookdate,mhour,mbookperson)";
            $query.="values('$username','$phone','$date','$hour','$person')";
            $go_query=mysqli_query($connection,$query);
            if(!$go_query)
            { 
                die("QUERY FAILED".mysqli_error($connection)); 
            }
            else
            {
                echo"<script>window.alert('You successfully Meeting Booking')</script>";
                echo "<script>window.location.href='index.php'</script>"; 
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meeting Room Booking</title>
</head>

<link rel="stylesheet" href="css/meetingbooking.css">
<!-- <link rel="stylesheet" href="ind.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js">
<body>
<?php
    $id = $_GET['id'];
    $result = mysqli_query($connection,"select * from users where userid=$id");
    $row = mysqli_fetch_assoc($result);
?>
    <section class = "banner">
        <div class="back">
            <a href="index.php">
                <img src="photo/neon back.png" alt="">
            </a>
        </div>
            <h2>BOOK YOUR MEETING ROOM NOW</h2>
            <div class = "card-container">
                <div class = "card-img">
                    <!-- image here -->
                </div>

                <div class = "card-content">
                    <h3>Booking</h3>
                    <form method="post" action="meetingbooking.php">
                        <div class = "form-row">
                            <input type="text" name="date" />
                            <select name ="hour">
                                <option value="hour-select">Select Hour</option>
                                <option value = "9: 00 to 12:00">9: 00 to 12:00</option>
                                <option value = "12: 00 to 3:00">12: 00 to 3:00</option>
                                <option value = "3: 00 to 6:00">3: 00 to 6:00</option>
                            </select>
                        </div>

                        <div class = "form-row">
                            <input type = "text" name="user_name" value="<?php echo $row['username']?>">
                            <input type = "text" name="phone" value="<?php echo $row['phone']?>">
                        </div>

                        <div class = "form-row">
                            <input type = "number" name="person" placeholder="How Many Persons" min = "1">
                            <input type = "submit" name="meeting_book" value = "Book Meeting Room">
                        </div>
                    </form>
                </div>
            </div>
    </section>
</body>
<!-- fontawsome -->
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
<script>
$(function() {
  $('input[name="date"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    // minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'),10)
  }, function(start, end, label) {
    var years = moment().diff(start, 'years');
    // alert("You are " + years + " years old!");
  });
});
</script>

</html>