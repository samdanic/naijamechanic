<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="./assets/favicon-16x16.jpg" size="16x16"/>
    <link rel="icon" type="image/x-icon" href="./assets/favicon-32x32.jpg" size="32x32"/>
    <link rel="icon" type="image/x-icon" href="./assets/favicon-32x32.jpg" size="32x32"/>
    <link rel="icon" type="image/x-icon" href="./assets/android-chrome-192x192.jpg" size="192x192"/>
    <link rel="icon" type="image/x-icon" href="./assets/android-chrome-512x512.jpg" size="512x512"/>
    <link rel="apple-touch-icon" type="image/x-icon" href="./assets/apple-touch-icon.jpeg" size="192x192"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
    <meta name="description" content="Support FCCPC">
    <?php
    include('./../shared/meta.php');
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" defer>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <link rel="stylesheet" href="./../styles/footer.css"/>
    <link rel="stylesheet" href="./../styles/header.css"/>
    <link rel="stylesheet" href="./../styles/index.css"/>
    <link rel="stylesheet" href="./../styles/modal.css"/>
    <title>NATA</title>
</head>
<?php
include("./../root.php");
?>

<body>
    <!-- <?php
    include(".../../shared/loader.php");
    ?> -->
    <div class="modal">
        <div class="modal-body">
            <h3 class="ready">Message!</h3>
            <p class="modal-text"></p>
            <button id="close" onclick="closeModal(event)">Close</button>
        </div>
    </div>
    <div class="center">
        <div class="header">
            <a class="logoContainer" href="https://www.fccpc.gov.ng/" target="_blank">
                <img src="./../assets/nata.jpeg" class="logo" />
            </a>
        </div>
    </div>
    <div class="membersip">
        <div class="container">
            <div class="container-wrapper">
                <div class="messages">
                    <div class="message">
                        <div class="warning">
                            <p class="alert alert-warning" id="warning_alert" role="alert">

                            </p>
                            <img src="./../assets/cross.png" alt="close-icon" class="cross" onclick="closeMessage(event)" />
                        </div>
                    </div>
                </div>
                <!-- <div class="text-center">  <h1 class=""style="color:#6495ED">NATA REGISTRATION PAGE </h1></div> -->
                <form autocomplete="on">
                    <div class="form-wrapper">
                        <div class="icons">
                            <label>Full Name</label>
                        </div>
                        <input placeholder="Full Name" name="fullname" type="text" class="form-input" id="fullname" autocomplete="off" required />
                        <span class="error-text fullname"></span>
                    </div>

                    <div class="form-wrapper">
                        <div class="icons">
                            <label>Association</label>
                        </div>
                        <input placeholder="Association" name="association" type="text" class="form-input" id="association" autocomplete="off" required />
                        <span class="error-text association"></span>
                    </div>

                    <div class="form-wrapper">
                        <div class="icons">
                            <label>Address</label>
                        </div>
                        <input placeholder="Address" name="address" type="text" class="form-input" id="address" autocomplete="off" required />
                        <span class="error-text address"></span>
                    </div>
                    <div class="form-wrapper">
                        <div class="icons">
                            <label>Phone No</label>
                        </div>
                        <input placeholder="Phone No" name="phone_no" type="number" class="form-input" id="phone_no" autocomplete="off" required style="padding-left: .5em; padding-top: .5em"/>
                        <span class="error-text phone_no"></span>
                    </div>
                   
                    <div class="form-wrapper">
                        <div class="icons">
                            <label>Email Address</label>
                        </div>
                        <input placeholder="Email Address" name="email" type="email" class="form-input" id="email" autocomplete="off" required />
                        <span class="error-text email"></span>
                    </div>
                    <div class="form-wrapper">
                        <div class="icons">
                            <label>Password</label>
                        </div>
                        <input placeholder="Password" name="password" type="password" class="form-input" id="password" autocomplete="off" required />
                        <span class="error-text password"></span>
                    </div>
                    <div class="form-wrapper">
                        <div class="icons">
                            <label>Confirm Password</label>
                        </div>
                        <input placeholder="Confirm Password" name="cpassword" type="password" class="form-input" id="cpassword" autocomplete="off" required />
                        <span class="error-text cpassword"></span>
                    </div>
                    
                    <div class="member-btn">
                <button class="member-add" onclick="becomeAMember(event)">Submit</button>
            </div>
            </div>
            </form>
        </div>  
    </div>
    </div>
    <script src="./js/index.js"></script>
</body>

</html>