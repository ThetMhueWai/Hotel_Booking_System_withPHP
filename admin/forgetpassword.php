<?php
include "connections.php";
include "function.php";
if (isset($_POST['updateadmin'])) {
  $password = $_POST['adpass'];
  $comfirm_password = $_POST['comfirm_password'];
  if ($password != $comfirm_password) {
    $errors['match_password'] = 'Passwords do not match';
  } else {
    updatepassword();
  }
}
?>

<html>

<head>
  <title>Forget Password</title>
  <link rel="icon" href="../photo/icon.png">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/v4-shims.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<style type="text/css">
  body {
    background: url(../photo/indexlg.jpg);
    align-items: center;
    justify-content: center;
    display: flex;
    font-family: Cambria;
    font-weight: bold;
  }

  .D1 {
    border: 3px solid #fff;
    background: rgb(0, 0, 0, 0.5);
    border-radius: 2vh;
    padding: 8vh 0vh;
    box-shadow: 0 0 1px rgba(106, 152, 251, 0.712),
      0 0 2px rgba(106, 152, 251, 0.712),
      0 0 4px rgba(106, 152, 251, 0.712),
      0 0 8px rgba(106, 152, 251, 0.712),
      0 0 16px rgba(106, 152, 251, 0.712);
  }

  #R1 {
    margin: 0;
    padding: 0;
    font-size: 50px;
    color: #fff;
    text-shadow: 0 0 1px rgba(106, 152, 251, 0.712),
      0 0 2px rgba(106, 152, 251, 0.712),
      0 0 4px rgba(106, 152, 251, 0.712),
      0 0 8px rgba(106, 152, 251, 0.712),
      0 0 16px rgba(106, 152, 251, 0.712);
  }

  hr {
    background-color: #fff;
    box-shadow: 0 0 1px rgba(106, 152, 251, 0.712),
      0 0 2px rgba(106, 152, 251, 0.712),
      0 0 4px rgba(106, 152, 251, 0.712),
      0 0 8px rgba(106, 152, 251, 0.712),
      0 0 16px rgba(106, 152, 251, 0.712);
  }

  #R2 {
    padding-top: 20px;
    color: #fff;
    text-shadow: 0 0 1px rgba(106, 152, 251, 0.712),
      0 0 2px rgba(106, 152, 251, 0.712),
      0 0 4px rgba(106, 152, 251, 0.712),
      0 0 8px rgba(106, 152, 251, 0.712),
      0 0 16px rgba(106, 152, 251, 0.712);
    text-align: center;
    font-size: 20px;
  }

  #R3 {
    background: rgb(0, 0, 0, 0.7);
    border: none;
    width: 50vh;
    text-shadow: 0 0 1px rgba(106, 152, 251, 0.712),
      0 0 2px rgba(106, 152, 251, 0.712),
      0 0 4px rgba(106, 152, 251, 0.712),
      0 0 8px rgba(106, 152, 251, 0.712);
    height: 8vh;
    border-radius: 7px;
    color: #fff;
    text-align: center;
    font-size: 17px;
    border: 3px solid #fff;
    box-shadow: 0 0 1px rgba(106, 152, 251, 0.712),
      0 0 2px rgba(106, 152, 251, 0.712),
      0 0 4px rgba(106, 152, 251, 0.712),
      0 0 8px rgba(106, 152, 251, 0.712),
      0 0 16px rgba(106, 152, 251, 0.712);
    cursor: pointer;
    font-family: Cambria;
  }

  #R3:hover {
    transition: 1s;
    box-shadow: 0 0 1px rgba(0, 115, 14, 0.712),
      0 0 2px rgba(0, 115, 14, 0.712),
      0 0 4px rgba(0, 115, 14, 0.712),
      0 0 8px rgba(0, 115, 14, 0.712),
      0 0 16px rgba(0, 115, 14, 0.712);
    text-shadow: 0 0 1px rgba(0, 115, 14, 0.712),
      0 0 2px rgba(0, 115, 14, 0.712),
      0 0 4px rgba(0, 115, 14, 0.712),
      0 0 8px rgba(0, 115, 14, 0.712),
      0 0 16px rgba(0, 115, 14, 0.712);
  }

  #M1 {
    background: rgba(0, 0, 0, 0.2);
    border: 3px solid #fff;
    border-radius: 10px;
    box-shadow: 0 0 1px rgba(106, 152, 251, 0.712),
      0 0 2px rgba(106, 152, 251, 0.712),
      0 0 4px rgba(106, 152, 251, 0.712),
      0 0 8px rgba(106, 152, 251, 0.712),
      0 0 16px rgba(106, 152, 251, 0.712);
  }

  #R5 {
    text-align: center;
    font-size: 25px;
    color: #fff;
    margin: 3vh 0vh 0vh 0vh;
    text-shadow: 0 0 1px rgba(106, 152, 251, 0.712),
      0 0 2px rgba(106, 152, 251, 0.712),
      0 0 4px rgba(106, 152, 251, 0.712),
      0 0 8px rgba(106, 152, 251, 0.712),
      0 0 16px rgba(106, 152, 251, 0.712);
  }

  #R6 {
    border: none;
    box-shadow: 0 0 1px rgba(106, 152, 251, 0.712),
      0 0 2px rgba(106, 152, 251, 0.712),
      0 0 4px rgba(106, 152, 251, 0.712),
      0 0 8px rgba(106, 152, 251, 0.712),
      0 0 16px rgba(106, 152, 251, 0.712);
    color: #fff;
    text-align: center;
    font-size: 20px;
    background: rgb(0, 0, 0, 0.4);
    width: 20vh;
    margin: 1vh 3vh 4vh 3vh;
    height: 6vh;
    border: 3px solid #fff;
    border-radius: 7px;
    transition: 1s;
  }

  #R6:hover {
    box-shadow: 0 0 1px rgba(0, 115, 14, 0.712),
      0 0 2px rgba(0, 115, 14, 0.712),
      0 0 4px rgba(0, 115, 14, 0.712),
      0 0 8px rgba(0, 115, 14, 0.712),
      0 0 16px rgba(0, 115, 14, 0.712);
    text-shadow: 0 0 1px rgba(0, 115, 14, 0.712),
      0 0 2px rgba(0, 115, 14, 0.712),
      0 0 4px rgba(0, 115, 14, 0.712),
      0 0 8px rgba(0, 115, 14, 0.712),
      0 0 16px rgba(0, 115, 14, 0.712);
  }

  #R4 {
    background: rgb(0, 0, 0, 0.7);
    border: none;
    width: 16vh;
    height: 7vh;
    border-radius: 7px;
    color: #fff;
    text-align: center;
    font-size: 17px;
    text-shadow: 0 0 1px rgba(106, 152, 251, 0.712),
      0 0 2px rgba(106, 152, 251, 0.712),
      0 0 4px rgba(106, 152, 251, 0.712),
      0 0 8px rgba(106, 152, 251, 0.712),
      0 0 16px rgba(106, 152, 251, 0.712);
    box-shadow: 0 0 1px rgba(106, 152, 251, 0.712),
      0 0 2px rgba(106, 152, 251, 0.712),
      0 0 4px rgba(106, 152, 251, 0.712),
      0 0 8px rgba(106, 152, 251, 0.712),
      0 0 16px rgba(106, 152, 251, 0.712);
    border: 3px solid #fff;
    cursor: pointer;
  }

  #R4:hover {
    transition: 1s;
    box-shadow: 0 0 1px rgba(0, 115, 14, 0.712),
      0 0 2px rgba(0, 115, 14, 0.712),
      0 0 4px rgba(0, 115, 14, 0.712),
      0 0 8px rgba(0, 115, 14, 0.712),
      0 0 16px rgba(0, 115, 14, 0.712);
    text-shadow: 0 0 1px rgba(0, 115, 14, 0.712),
      0 0 2px rgba(0, 115, 14, 0.712),
      0 0 4px rgba(0, 115, 14, 0.712),
      0 0 8px rgba(0, 115, 14, 0.712),
      0 0 16px rgba(0, 115, 14, 0.712);
  }

  #RR p {
    margin-top: 25vh;
    font-size: 30px;
    color: #fff;
    padding-left: 20vh;
    text-shadow: 0 0 1px rgba(0, 1, 97, 0.712),
      0 0 2px rgba(0, 1, 97, 0.712),
      0 0 4px rgba(0, 1, 97, 0.712),
      0 0 8px rgba(0, 1, 97, 0.712);
  }

  #RR label {
    font-size: 20px;
    color: #fff;
    padding-left: 20vh;
    text-shadow: 0 0 1px rgba(0, 1, 97, 0.712),
      0 0 2px rgba(0, 1, 97, 0.712),
      0 0 4px rgba(0, 1, 97, 0.712),
      0 0 8px rgba(0, 1, 97, 0.712);
  }

  ::-webkit-scrollbar {
    width: 0;
  }

  @-webkit-keyframes spincube {

    from,
    to {
      -webkit-transform: rotateX(0deg) rotateY(0deg) rotateZ(0deg);
    }

    16% {
      -webkit-transform: rotateY(-90deg);
    }

    33% {
      -webkit-transform: rotateY(-90deg) rotateZ(90deg);
    }

    50% {
      -webkit-transform: rotateY(-180deg) rotateZ(90deg);
    }

    66% {
      -webkit-transform: rotateY(-270deg) rotateX(90deg);
    }

    83% {
      -webkit-transform: rotateX(90deg);
    }
  }

  @keyframes spincube {

    from,
    to {
      -moz-transform: rotateX(0deg) rotateY(0deg) rotateZ(0deg);
      -ms-transform: rotateX(0deg) rotateY(0deg) rotateZ(0deg);
      transform: rotateX(0deg) rotateY(0deg) rotateZ(0deg);
    }

    16% {
      -moz-transform: rotateY(-90deg);
      -ms-transform: rotateY(-90deg);
      transform: rotateY(-90deg);
    }

    33% {
      -moz-transform: rotateY(-90deg) rotateZ(90deg);
      -ms-transform: rotateY(-90deg) rotateZ(90deg);
      transform: rotateY(-90deg) rotateZ(90deg);
    }

    50% {
      -moz-transform: rotateY(-180deg) rotateZ(90deg);
      -ms-transform: rotateY(-180deg) rotateZ(90deg);
      transform: rotateY(-180deg) rotateZ(90deg);
    }

    66% {
      -moz-transform: rotateY(-270deg) rotateX(90deg);
      -ms-transform: rotateY(-270deg) rotateX(90deg);
      transform: rotateY(-270deg) rotateX(90deg);
    }

    83% {
      -moz-transform: rotateX(90deg);
      -ms-transform: rotateX(90deg);
      transform: rotateX(90deg);
    }
  }

  .cubespinner {
    -webkit-animation-name: spincube;
    -webkit-animation-timing-function: ease-in-out;
    -webkit-animation-iteration-count: infinite;
    -webkit-animation-duration: 12s;

    animation-name: spincube;
    animation-timing-function: ease-in-out;
    animation-iteration-count: infinite;
    animation-duration: 12s;

    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    -ms-transform-style: preserve-3d;
    transform-style: preserve-3d;

    -webkit-transform-origin: 60px 60px 0;
    -moz-transform-origin: 60px 60px 0;
    -ms-transform-origin: 60px 60px 0;
    transform-origin: 60px 60px 0;
  }

  .RR1 {
    margin-top: 10vh;
  }

  .cubespinner div {
    position: absolute;
    width: 120px;
    height: 120px;
    border: 1px solid rgb(78, 134, 255, 0.3);
    background: rgba(106, 152, 251, 0.6);
    box-shadow: inset 0 0 20px rgba(0, 0, 0, 0.2);
    line-height: 120px;
    text-align: center;
    font-size: 100px;
  }

  .cubespinner .face1 {
    -webkit-transform: translateZ(60px);
    -moz-transform: translateZ(60px);
    -ms-transform: translateZ(60px);
    transform: translateZ(60px);
  }

  .cubespinner .face2 {
    -webkit-transform: rotateY(90deg) translateZ(60px);
    -moz-transform: rotateY(90deg) translateZ(60px);
    -ms-transform: rotateY(90deg) translateZ(60px);
    transform: rotateY(90deg) translateZ(60px);
  }

  .cubespinner .face3 {
    -webkit-transform: rotateY(90deg) rotateX(90deg) translateZ(60px);
    -moz-transform: rotateY(90deg) rotateX(90deg) translateZ(60px);
    -ms-transform: rotateY(90deg) rotateX(90deg) translateZ(60px);
    transform: rotateY(90deg) rotateX(90deg) translateZ(60px);
  }

  .cubespinner .face4 {
    -webkit-transform: rotateY(180deg) rotateZ(90deg) translateZ(60px);
    -moz-transform: rotateY(180deg) rotateZ(90deg) translateZ(60px);
    -ms-transform: rotateY(180deg) rotateZ(90deg) translateZ(60px);
    transform: rotateY(180deg) rotateZ(90deg) translateZ(60px);
  }

  .cubespinner .face5 {
    -webkit-transform: rotateY(-90deg) rotateZ(90deg) translateZ(60px);
    -moz-transform: rotateY(-90deg) rotateZ(90deg) translateZ(60px);
    -ms-transform: rotateY(-90deg) rotateZ(90deg) translateZ(60px);
    transform: rotateY(-90deg) rotateZ(90deg) translateZ(60px);
  }

  .cubespinner .face6 {
    -webkit-transform: rotateX(-90deg) translateZ(60px);
    -moz-transform: rotateX(-90deg) translateZ(60px);
    -ms-transform: rotateX(-90deg) translateZ(60px);
    transform: rotateX(-90deg) translateZ(60px);
  }
</style>

<body>
  <div class="container">

    <form method="post" enctype="multipart/form-data" id="R1">

      <div class="row" align="center">
        <div class="col-md-6 D1">
          <div>
            <h2>Change Your Password</h3>
              <hr width=80%>
              <label id="R2"><span class="fas fa-key"></span> Password:</label><br>
              <input type="password" name="adpass" id="R3" required="required" placeholder="Enter Your New Password">
          </div>

          <div>
            <label for="email" id="R2"><span class="fas fa-lock"></span> Confirm Password:</label>
            <input type="password" id="R3" name="comfirm_password" value="<?php echo isset($comfirm_password) ? $comfirm_password : '' ?>" class="form-control" placeholder="Re-Type Your New Password">
            <label id="R2">
              <?php
              echo isset($errors['match_password']) ? $errors['match_password'] : ''
              ?>
            </label>
          </div>

          <div>
            <button type="submit" name="updateadmin" id="R4">
              Change
            </button>
          </div>
        </div>
        <div class="col-sm-6 RR1" align="center">
          <div class="stage" style="width: 0px;">
            <div class="cubespinner">
              <div class="face1"><img src="../photo/DELLUNALOGO.png" width="120px"></div>
              <div class="face2"><img src="../photo/DELLUNALOGO.png" width="120px"></div>
              <div class="face3"><img src="../photo/DELLUNALOGO.png" width="120px"></div>
              <div class="face4"><img src="../photo/DELLUNALOGO.png" width="120px"></div>
              <div class="face5"><img src="../photo/DELLUNALOGO.png" width="120px"></div>
              <div class="face6"><img src="../photo/DELLUNALOGO.png" width="120px"></div>
            </div>
          </div>
          <div id="RR">
            <p>DELLUNA</p>
            <label>Welcome to Hotel Delluna Admin Panal</label>
          </div>
        </div>
      </div>
      </from>
  </div>
</body>

</html>