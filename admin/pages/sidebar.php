<ul class="side-nav">

                        <li class="side-nav-title side-nav-item">Navigation</li>

                        
                        <li class="side-nav-item">
                                <a  href="index.php" class="side-nav-link"
                       class="waves-effect"><i class="uil-home-alt"></i> <span> Dashboard </span> </a>
                        </li>
                          
                      
                       
                        
                        <li class="side-nav-item">
                                <a  href="profile.php?user_id=<?php echo $user_obj ->getID();?>" class="side-nav-link"
                       class="waves-effect"><i class="mdi mdi-account-circle me-1"></i> <span>Profile</span> </a>
                        </li>
                          
                      <?php 
                      $role = $user_obj->getrole();
                      if($role === 'Admin'):
                        ?>
                        <li class="side-nav-item">
                                <a  href="add_category.php?user_id=<?php echo $user_obj ->getID();?>" class="side-nav-link"
                       class="waves-effect"><i class="uil-suitcase"></i> <span>Category</span> </a>
                        </li>
                        <?php endif; ?>
                        <li class="side-nav-item">
                                <a  href="category.php?user_id=<?php echo $user_obj ->getID();?>" class="side-nav-link"
                       class="waves-effect"><i class="uil-folder"></i> <span>Edit Category</span> </a>
                        </li>
                          
                       
                        <li class="side-nav-item">
                                <a  href="add_news.php?user_id=<?php echo $user_obj ->getID();?>" class="side-nav-link"
                       class="waves-effect"><i class="uil-globe"></i> <span>Add News</span> </a>
                        </li>
                     
                          
                        <?php
                        $role = $user_obj->getrole();
                        if($role === 'Admin'):
                                ?>
                        <li class="side-nav-item">
                                <a  href="addusers.php?user_id=<?php echo $user_obj ->getID();?>" class="side-nav-link"
                       class="waves-effect"><i class="mdi mdi-account-circle me-1"></i> <span>Add User</span> </a>
                        </li>
                        <?php endif; ?>

                        <li class="side-nav-item">
                        <a  href="comments.php?user_id=<?php echo $user_obj ->getID();?>" class="side-nav-link"
                       class="waves-effect"><i class="fa fa-comment"></i> <span></span> 
                                <?php
                                $sql = mysqli_query($connection, "SELECT * FROM comments WHERE status ='unapproved' LIMIT 20");
                                 $num = mysqli_num_rows($sql);
                                if($num > 0){
                                        echo "<span> Comments <span class='badge badge-danger'>$num</span><sup>new</sup> </span>";
                                }else{
                                        echo "<span>Comments</span>";
                                }
                                ?>
                               </a>
                        </li>
                        <li class="side-nav-item">
                                <a  href="managepost.php?user_id=<?php echo $user_obj ->getID();?>" class="side-nav-link"
                       class="waves-effect"><i class="fa fa-edit"></i> <span>Manage Post</span> </a>
                        </li>
                          
                      
                       
                        
                        <!-- <li class="side-nav-item">
                                <a  href="profile.php?user_id=<?php echo $user_obj ->getID();?>" class="side-nav-link"
                       class="waves-effect"><i class="uil-home-alt"></i> <span> Dashboard </span> </a>
                        </li> -->
                          
                      
                       

                       
                     
                        

                       


                      


                        
                    </ul>

                    <!-- Help Box -->
                                   <!-- end Help Box -->
  