<?php
include "connections.php";
include "function.php";
if (isset($_POST['btnlogin'])) {
    admin_login();
}

if (isset($_POST['btnforget'])) {
    forgetpassword();
}
?>

<html>

<head>
    <title>Login</title>
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
        padding: 7vh 5vh;
        margin: 2vh 11vh 0vh 11vh;
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
        color: #fff;
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
        width: 45vh;
        text-shadow: 0 0 1px rgba(106, 152, 251, 0.712),
            0 0 2px rgba(106, 152, 251, 0.712),
            0 0 4px rgba(106, 152, 251, 0.712),
            0 0 8px rgba(106, 152, 251, 0.712);
        height: 6vh;
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

    #R4 {
        border: none;
        color: #fff;
        text-align: center;
        font-size: 20px;
        box-shadow: 0 0 1px rgba(106, 152, 251, 0.712),
            0 0 2px rgba(106, 152, 251, 0.712),
            0 0 4px rgba(106, 152, 251, 0.712),
            0 0 8px rgba(106, 152, 251, 0.712),
            0 0 16px rgba(106, 152, 251, 0.712);
        background: rgb(0, 0, 0, 0.3);
        width: 17vh;
        height: 6vh;
        margin-top: 5.5vh;
        border: 3px solid #fff;
        border-radius: 7px;
        transition: 1s;
        text-shadow: 0 0 1px rgba(106, 152, 251, 0.712),
            0 0 2px rgba(106, 152, 251, 0.712),
            0 0 4px rgba(106, 152, 251, 0.712),
            0 0 8px rgba(106, 152, 251, 0.712),
            0 0 16px rgba(106, 152, 251, 0.712);
    }

    #R4:hover {
        color: #fff;
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

    #R7 {
        background: rgb(0, 0, 0, 0.4);
        border: none;
        width: 60vh;
        height: 7vh;
        border-radius: 7px;
        color: #fff;
        text-align: center;
        margin: 4vh 0vh 4vh 0vh;
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

    #R7:hover {
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

    #R8 {
        border: none;
        padding-top: 1vh;
        color: #fff;
        text-shadow: 0 0 1px rgba(106, 152, 251, 0.712),
            0 0 2px rgba(106, 152, 251, 0.712),
            0 0 4px rgba(106, 152, 251, 0.712),
            0 0 8px rgba(106, 152, 251, 0.712),
            0 0 16px rgba(106, 152, 251, 0.712);
        text-align: center;
        font-size: 20px;
        margin-top: 10px;
        cursor: pointer;
        transition: 0.5s;
    }

    #R8:hover {
        border: none;
        color: #fff;
        text-shadow: 0 0 1px rgba(255, 0, 0, 0.712),
            0 0 2px rgba(255, 0, 0, 0.712),
            0 0 4px rgba(255, 0, 0, 0.712),
            0 0 8px rgba(255, 0, 0, 0.712),
            0 0 16px rgba(255, 0, 0, 0.712);
        text-align: center;
        font-size: 20px;
        margin-top: 10px;
        cursor: pointer;
    }

    #RR p {
        margin-top: 23vh;
        font-size: 30px;
        color: #fff;
        padding-right: 18vh;
        text-shadow: 0 0 1px rgba(0, 1, 97, 0.712),
            0 0 2px rgba(0, 1, 97, 0.712),
            0 0 4px rgba(0, 1, 97, 0.712),
            0 0 8px rgba(0, 1, 97, 0.712);
    }

    #RR label {
        font-size: 20px;
        color: #fff;
        padding-right: 18vh;
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
    <div class="container" align="center">
        <form class="form-horizontal" role="form" method="post" autocomplete="off">
            <div class="row">
                <div class="col-sm-6 RR1" align="center">
                    <div class="stage" style="width: 240px;">
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

                <div class="col-sm-6">
                    <div class="D1">
                        <div>
                            <label id="R1">LOGIN</label>
                            <hr width=90% style="background-color:#fff">
                        </div>

                        <div>
                            <label id="R2"><span class="fas fa-user-tie"></span> Admin Name:</label>
                            <input type="text" name="aname" id="R3" class="form-control" placeholder="Enter Your Name" id="R2">
                        </div>

                        <div>
                            <label id="R2"><span class="fas fa-key"></span> Password:</label>
                            <input type="password" name="apass" id="R3" class="form-control" placeholder="Enter Your Password" id="R2">
                        </div>

                        <div>
                            <button type="submit" id="R4" name="btnlogin">LOGIN</button>
                        </div>

                        <div>
                            <label id="R8" data-toggle="modal" data-target="#exampleModal">
                                Forget Password?
                            </label>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content" id="M1">
                                        <div class="modal-body">
                                            <form class="form-horizontal" role="form" method="post">
                                                <div class="col-sm-12" align="center">
                                                    <label id="R5"><span class="fas fa-user-circle"></span> Username:</label>
                                                    <input type="text" name="auname" id="R7" class="form-control" placeholder="Enter Email Address or Phone Number">
                                                    <button type="button" id="R6" data-dismiss="modal">Close</button>
                                                    <button type="submit" id="R6" name="btnforget">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <body>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</html>