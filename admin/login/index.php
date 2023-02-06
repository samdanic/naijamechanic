
<!DOCTYPE html>

<html>
<head>
    <?php include '../../dashboard/partials/metapartial.php'?>
    <title>Login To Register a Mechanic</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" defer>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <link rel="stylesheet" href="./../../styles/index.css"/>
    <link rel="stylesheet" href="./../../styles/modal.css"/>
<link rel="stylesheet" href="./../../dashboard/css/bootstrap.css">
<link rel="stylesheet" href="./../../dashboard/css/login.css">
<link rel="stylesheet" href="./../../dashboard/css/root.css">
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
                </div>
            <form class="login-form" id="loginForm" method="POST"  novalidate="novalidate">
                <span style="color:red"></span>

                <div class="input-div">
                    <label>Access Code</label>
                    <input placeholder="Access Code" type="text" name="access" id="access" value="" class="input" />
                    <span class="error-text access"></span>
                  
                </div>
                <div class="input-div">
                    <label>Email</label>
                    <input placeholder="Email" type="text" name="email" id="email" value="" class="input" />
                    <span class="error-text email"></span>
                  
                </div>
                
                <div class="input-div">
                    <label>Password</label>
                    <input placeholder="Password" type="password" name="password" id="password" class="input" />
                    <span class="error-text password"></span>
                   
                </div>
                <div class="member-btn">
                <button class="member-add login-btn" onclick="becomeAMember(event)">Submit</button>
            </div>
                <!-- <button class="login-btn">SUBMIT</button> -->
            </form>
        </div>
    </div>
    <script src="./../js/login.js"></script>
</body>
</html>
