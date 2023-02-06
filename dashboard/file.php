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
    <title>Naijamechanic | An Online Platform For All Naija Mechanic</title>
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
                                <th>Id</th>
                                <th>IMAGE</th>
                                <th>CERTIFICATE OF PRACTISE</th>
                                
                                <!-- <th>UNIT</th> -->
                                <!-- <th>PAYMENT STATUS</th> -->
                                <!-- <th>OPTION</th> -->


                            </tr>
                        </thead>
                        <tbody id="data-list">
                            <?php
                                include './../database/connection.php';
                                $db_conn = new DBController();
                                if(isset($_GET['id'])){
                                    $id = $_GET['id'];
                                $pullInfo = $db_conn->conn->prepare('SELECT * FROM mechanic_document WHERE mechanic_id=:id');
                                $pullInfo->bindParam(':id',$id);
                                if($pullInfo->execute()){
                                    if ($pullInfo->rowCount()>0) 
                                    {
                                        while ($row = $pullInfo->fetch(PDO::FETCH_ASSOC))
                                        {
                                  
                                            $row['id'] = $row['id'];
                                            $row['image'] = $row['image'];
                                            
                                            $row['certificate'] = $row['certificate'];
                            ?>
                            <!-- @foreach (var item in Model.Data.OrderByDescending(a => a.Id))
                            { -->
                                <tr id="item">
                                    <td data-label="id"><?= $row['id']?></td>
                                    <td data-label="FirstName"><?= $row['image']?>
                                    <a id="view" href=""><img src="./Images/view.png" onclick="showImage()" class="view-btn" /></a>
                                </td>
                                    <td data-label="jobDescription"><?= $row['certificate']?>
                                    <a id="view" href=""><img src="./Images/view.png" onclick="showCert()" class="view-btn" /></a></td>
                            
                                   
                                   
                                </tr>
                              
                                <img src="./../file/images/<?php echo $row['image']?>" id="image"/>
                               
                            <?php
                                        }
                            }
                        }
}
                        ?>
                             <img src="./../file/cert/<?php echo $row['cert']?>" id="cert"/>
                                   
                        </tbody>
                    </table>
                  
                </div>
            </div>
        </div>
       
        <script>
              /* Access image by id and change
            the display property to block*/
            document.getElementById('image')
                    .style.display = 'none';
                    document.getElementById('cert')
                    .style.display = 'none';
            function showImage()
            {
               document.getElementById('image')
                    .style.display = "block";
                   
            }
            function showCert()
            {
               document.getElementById('cert')
                    .style.display = "block";
                   
            }
           
            // $(".select_status").on("click", function () {
            //     $(".artisan_status").toggleClass("active");
            // });
            // $(document).ready(function () {

            //     $('#tabl').DataTable();
            // })

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


