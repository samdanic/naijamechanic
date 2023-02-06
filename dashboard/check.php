<?php
                            include './../database.php';
                            $db_conn = new DBController();
                                $state = $_POST['state'];
                              
                                // StateCount($state);
                                // MoneyMakeByEachState($state1);
                                // function StateCount($state)
                                // {
                                    
                                    $pullInfo = $db_conn->conn->prepare('SELECT * FROM member_register WHERE state = :state');
                                    $pullInfo->bindParam(':state',$state);
                                    $pullInfo->execute();
                                    $count = $pullInfo->rowCount();
                                    $data["count"] = $count;
                                    echo json_encode($data);   
                                // }

                             
                               
                               
                               
                            
                                ?>