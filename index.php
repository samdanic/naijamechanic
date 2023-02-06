<?php
session_start();
$email = $_SESSION['email'];
if (!$email||$email==null) {
   header("location: ./admin/login/");

}  
// session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="./favicon.ico" size="48x48"/>
    <link rel="icon" type="image/x-icon" href="./assets/favicon-16x16.png" size="16x16"/>
    <link rel="icon" type="image/x-icon" href="./assets/favicon-32x32.png" size="32x32"/>
    <link rel="icon" type="image/x-icon" href="./assets/favicon-32x32.png" size="32x32"/>
    <link rel="icon" type="image/x-icon" href="./assets/android-chrome-192x192.png" size="192x192"/>
    <link rel="icon" type="image/x-icon" href="./assets/android-chrome-512x512.png" size="512x512"/>
    <link rel="apple-touch-icon" type="image/x-icon" href="./assets/apple-touch-icon.png" size="192x192"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
    <meta name="description" content="Support FCCPC">
    <?php
    include('./shared/meta.php');
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" defer>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <link rel="stylesheet" href="./styles/footer.css"/>
    <link rel="stylesheet" href="./styles/header.css"/>
    <link rel="stylesheet" href="./styles/index.css"/>
    <link rel="stylesheet" href="./styles/modal.css"/>
    <title>Register For Patients' Bill of Rights | Support Federal Competition & Consumer Protection Commission | FCCPC Bill of Rights</title>
</head>
<?php
include("./root.php");
?>
    
<?php
include("./root.php");
?>

<body>


    <div class="modal">
        <div class="modal-body">
            <h3 class="ready">Message!</h3>
            <p class="modal-text">dvdvd</p>
            <button id="close" onclick="closeModal(event)">Close</button>
        </div>
    </div>
    <div class="center">
        <div class="header">
            <a class="logoContainer" style="margin-left:auto;margin-right:auto;display:block" href="" target="_blank">
                <img src="./asset/logo.jpg" class="logo" height="80px" width="40px" />
            </a>
        </div>
    </div>
    <div class="membersip">
        <div class="container">
            <div class="container-wrapper">
                        <a href="./dashboard" class="member-add">GO TO DASHBAORD</a>
            </div>
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
                            <img src="./assets/cross.png" alt="close-icon" class="cross" onclick="closeMessage(event)" />
                        </div>
                    </div>
                </div>
                <form autocomplete="on" method="POST" >
                    <div class="form-wrapper">
                        <div class="icons">
                            <label>First Name</label>
                        </div>
                        <input placeholder="First Name" name="firstname" type="text" class="form-input" id="firstname" autocomplete="off" required />
                        <span class="error-text firstname"></span>
                    </div>
                    <div class="form-wrapper">
                        <div class="icons">
                            <label>Lastname</label>
                        </div>
                        <input placeholder="Lastname" name="lastname" type="text" class="form-input" id="lastname" autocomplete="off" required />
                        <span class="error-text lastname"></span>
                    </div>
                  
                    <div class="form-wrapper">
                        <div class="icons">
                            <label>workshop</label>
                        </div>
                        <textarea placeholder="Address" name="workshop" type="address" class="form-input" id="workshop" autocomplete="off" required style="padding-left: .5em; padding-top: .5em"></textarea>
                        <span class="error-text workshop"></span>
                    </div>
                    <div class="address-wrapper">
                        <div class="form-wrapper">
                            <div class="icons">
                                <label>State</label>
                            </div>
                            <select name="state" id="state" required>
                                <option>Select state</option>
                            </select>
                            <span class="error-text state"></span>
                        </div>
                        <div class="form-wrapper">
                            <div class="icons">
                                <label>Local Government</label>
                            </div>
                            <select name="lga" id="lga" required>
                                <option>Select local government</option>
                            </select>
                            <span class="error-text lga"></span>
                        </div>
                        <div class="form-wrapper">
                            <div class="icons">
                                <label>Gender</label>
                            </div>
                            <select name="gender" id="gender" required>
                                <option>---</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>   
                            <span class="error-text gender"></span>
                        </div>
                    </div>
                    <div class="form-wrapper">
                        <div class="icons">
                            <label>Profession</label>
                        </div>
                        <input placeholder="Profession" name="profession" type="text" class="form-input" id="profession" autocomplete="off" required />
                        <span class="error-text profession"></span>
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
                            <label>Mobile</label>
                        </div>
                        <input placeholder="Mobile" name="mobile" type="tel" class="form-input" id="mobile" autocomplete="off" required />
                        <span class="error-text mobile"></span>
                      
                    </div>
                    <div class="form-wrapper">
                        <div class="icons">
                            <label>DOB</label>
                        </div>
                        <input placeholder="Mobile" name="dob" type="date" class="form-input" id="dob" autocomplete="off" required />
                        <span class="error-text dob"></span>
                      
                    </div>
                    
                    <div class="member-btn">
                <button class="member-add" onclick="becomeAMember(event)">SUBMIT</button>
               
            </div>
            </form>
        </div>
    </div>
    </div>
   
</div>
    <script src="./js/register.js"></script>
</body>

</html>