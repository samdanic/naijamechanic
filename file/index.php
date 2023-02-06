
<!DOCTYPE html>

<html>
<head>
    <?php include './../dashboard/partials/metapartial.php'?>
    <title>Login To Register a Mechanic</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" defer>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <link rel="stylesheet" href="./../styles/index.css"/>
    <link rel="stylesheet" href="./../styles/modal.css"/>
<link rel="stylesheet" href="./../dashboard/css/bootstrap.css">
<link rel="stylesheet" href="./../dashboard/css/login.css">
<link rel="stylesheet" href="./../dashboard/css/root.css">
<!-- <link rel="stylesheet" href="./../root.php"> -->
</head>
<body>
    <div class="spacer">
        <a class="logoContainer current-page" page="home" href="../">
            <!-- <img src="@Url.Content("~/Images/quickfixnewgreen.png")" class="green-logo" /> -->
        </a>
        <div class="underline"></div>
        <div class="form-container">
        <div class="messages ">
                    <div class="message container-wrapper   ">
                        <div class="warning">
                            <p class="alert alert-warning" id="warning_alert" role="alert">

                            </p>
                            <img src="./../assets/cross.png" alt="close-icon" class="cross" onclick="closeMessage(event)" />
                        </div>
                    </div>
                    <div id="cons"></div>
                </div>
            <form class="login-form" id="loginForm" method="POST"  novalidate="novalidate"id="loginForm"onsubmit="return false">
                <span style="color:red"></span>

                <div class="input-div">
                    <label>Phone No</label>
                    <input placeholder="phone no" type="text" name="mobile" id="mobile" value="" class="input" />
                    <span class="error-text mobile"></span>
                  
                </div>
                <div class="input-div">
                    <label>Image Upload</label>
                    <input type="file" name="pic" id="pic">
                    <span class="error-text pic"></span>
                  
                </div>
                
                <div class="input-div">
                    <label>Certificate Upload</label>
                   <input type="file" name="cert" id="cert">
                    <span class="error-text cert"></span>
                   
                </div>
                <div class="member-btn">
                <button class="member-add login-btn" onclick="uploadImage()">Submit</button>
            </div>
                <!-- <button class="login-btn">SUBMIT</button> -->
            </form>
        </div>
    </div>
    <script src="./js/upload.js"></script>
</body>
</html>
