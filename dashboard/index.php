<?php
session_start();
$email = $_SESSION['email'];
if (!$email||$email==null) {
   header("location: ./../admin/login");
}  
?>



<!DOCTYPE html>

<html>
<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <?php include 'partials/metapartial.php'?>
    <title>Nata | An Online Platform For Connecting All Nigerians To various Artisans</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/root.css">
    
    <style>
        .artisan_status {
            width: 150px;
            border: none;
            padding: 0.4em 0em;
            padding-left: 0.4em;
            margin-bottom: 1em;
            outline: none;
            background-color: transparent;
            color: var(--theme-color);
            transition: all 500ms;
            top: 0px;
            transform: translateY(-200px);
        }

        .active {
            top: 20px;
            transform: translateY(0);
        }

        .artisan_status li {
            margin-bottom: .4em;
        }

            .artisan_status li a {
                color: var(--white-smoke);
                font-family: var(--Poppins);
            }

        .select_status {
            width: 150px;
            font-size: 1.3em;
            border: none;
            padding: 0.4em 0em;
            outline: none;
            background-color: transparent;
            color: var(--white-smoke);
            cursor: pointer;
        }
    </style>

    <body>
       
        <?php include 'partials/dashboardpartial.php';?>
        <div class="admin-dashboard">
            <?php include'partials/navbarpartial.php'?>
     

            <div class="table-container main-view">
                <div class="card">
                    <!-- <div class="options">
                        <div class="select_status">Select</div>
                        <ul class="artisan_status">
                            @foreach (Helper.EntityManagementFilterEnum filter in Enum.GetValues(typeof(Helper.EntityManagementFilterEnum)))
                            {
                                <li><a href="@Url.Action("Allartisans", "Dashboard", new { currentFilter = (int)filter })">@Helper.GetFilter(filter)</a></li>
                            }
                        </ul>
                    </div> -->
                    <table class="table display" id="tabl">
                        <thead>
                            <tr>
                                <th>FULLNAME</th>
                                <th>PHONE NO.</th>
                                <th>PROFESSION</th>
                                <th>WORKSHOP</th>
                                <th>STATE</th>
                                <th>LGA</th>
                                <th>OPTIONS></th>
                                <!-- <th>UNIT</th> -->
                                <!-- <th>PAYMENT STATUS</th> -->
                                <!-- <th>OPTION</th> -->


                            </tr>
                        </thead>
                        <tbody id="data-list">
                            <?php
                                include './../database/connection.php';
                                $db_conn = new DBController();
                                $pullInfo = $db_conn->conn->prepare('SELECT * FROM mechanic_register');
                                if($pullInfo->execute()){
                                    if ($pullInfo->rowCount()>0) 
                                    {
                                        while ($row = $pullInfo->fetch(PDO::FETCH_ASSOC))
                                        {
                                  
                                 
                                    
                                            $row['fullname'] = $row['fullname'];
                                            $row['id'] = $row['id'];
                                            $row['mobile'] = $row['mobile'];
                                            $row['workshop'] = $row['workshop'];
                                            $row['profession'] = $row['profession'];
                                            $row['state'] = $row['state'];
                                            $row['lga'] = $row['lga'];
                                            // $row['unit'] = $row['unit'];
                                            // $row['id'] = $row['id'];
                                            // $row['payment_check'] = $row['payment_check'];
                                            
                            
                                        
                                      
                                
                            ?>
                            <!-- @foreach (var item in Model.Data.OrderByDescending(a => a.Id))
                            { -->
                                <tr id="item">
                                    <td data-label="id"><?= $row['fullname']?></td>
                                    <td data-label="FirstName"><?= $row['mobile']?></td>
                                    <td data-label="jobDescription"><?= $row['workshop']?></td>
                                    <td data-label="nin"><?= $row['profession']?></td>
                                    <td data-label="nin"><?= $row['state']?></td>
                                    <td data-label="nin"><?= $row['lga']?></td>
                                    <td>
                                        <a id="view" href="file.php?id=<?php echo $row['id'] ?>"><img src="./Images/view.png" class="view-btn" /></a>
                                        
                                    </td>
                                    <!-- <td data-label="nin"><?= $row['payment_check']?></td> -->
                                    
                                   
                                </tr>
                            <?php
                                        }
                            }
                        }
                    
                        ?>
                            
                        </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
       
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js" integrity="sha512-CX7sDOp7UTAq+i1FYIlf9Uo27x4os+kGeoT7rgwvY+4dmjqV0IuE/Bl5hVsjnQPQiTOhAX1O2r2j5bjsFBvv/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="js/bootstrap.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/dashboard.js"></script>
                            
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

        <script>
            $(".select_status").on("click", function () {
                $(".artisan_status").toggleClass("active");
            });
            $(document).ready(function () {

                $('#tabl').DataTable();
            })

            //     $("#tabl .btn-unpublic-product").on("click", function () {
            //         console.log('hey');
            //         if (confirm("Are you sure you want to unpublic this Artisan?")) {
            //             $.ajax({

            //                 type: "POST",
            //                 url: "/Dashboard/UnPublicArtisan/" + $(this).attr("data-id"),
            //                 content: "application/json;charset=utf-8",
            //                 dataType: "json",
            //                 data: $(this.form).serialize(),
            //                 success: function () {
            //                     console.log("sammo");
            //                 }
            //             })
            //         };
            //     });
            //     ////////////////////////////////////////////////////////////////////////////////////////
            //     ////////////////////////////////////////////////////////////////////////////////////////
            //     //////////////////////PUBLIC///////////////////////////////////////////////////////////
            //     $("#tabl .btn-public-product").on("click", function () {
            //         console.log('hey');
            //         if (confirm("Are you sure you want to public  this Artisan?")) {
            //             $.ajax({

            //                 type: "POST",
            //                 url: "/Dashboard/PublicArtisan/" + $(this).attr("data-id"),
            //                 content: "application/json;charset=utf-8",
            //                 dataType: "json",
            //                 data: $(this.form).serialize(),
            //                 success: function () {
            //                     console.log("sammo");
            //                 }
            //             })
            //         };
            //     });


            // })

        </script> 

 


    </body>
</html>


