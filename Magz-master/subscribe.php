<?php 
include 'config/config.php';
                        
                          if(isset($_POST['subscribe'])){ 
                          
                            //   $name = ($_POST['name']);
                              $email = ($_POST['email']);
                            //   $pwd = $_POST['pwd'];
                            //   $cpwd = $_POST['cpwd'];
                              $query = mysqli_query($connection, "INSERT INTO subscribers VALUES('','','$email','');");
                              if($query){
                                echo '<script>alert("Thanks for subscribing")</script>';
                             
                           
                              
                       
                          
                          }
                          
                          }


                         
                        
                        
                          ?>
                            
                        
                        