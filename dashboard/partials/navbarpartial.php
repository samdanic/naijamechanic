<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/root.css">
    <title>Document</title>
<body>
    
</body>
</html>

<div class="side-nav">
    <div class="side-nav-item white">
        <a class="logoContainer current-page" page="home" href="../">
            <img src="./../asset/logo.jpg" class="logo" />
        </a>
    </div>
    <div class="side-nav-item active-page" onclick="addActiveClass()">
        <img src="./Images/dashboard.png" class="nav-icon" />
        <a href="./index.php">Dashbaord</a>
        
    </div>
    <!-- <div class="side-nav-item"> <span class=""></span>
    <img src="./Images/customer.png" class="nav-icon" />
        <a href="">Profile</a>
    </div>
    -->
    <div class="side-nav-item">
        <img src="./Images/customer.png" class="nav-icon"  />
        <a href="./allmembers.php">Member</a>
      
    </div>
    <div class="side-nav-item">
        <img src="./Images/report.png"class="nav-icon"  />
        <a href="">Complaints</a>
    </div>
    <div class="side-nav-item">
        <img src="./Images/add-user.png" class=""class="nav-icon"  />
        <a href="./../index.php">Add Member</a>
        <!-- @Html.ActionLink("Add", "addartisans", "Dashboard") -->
    </div>
    <div class="side-nav-item">
        <img src="./Images/off.png" class=""class="nav-icon"  />
        <a href="./logout.php">Logout</a>
        <!-- @Html.ActionLink("Logout", "Logout", "Home") -->
    </div>

</div>
