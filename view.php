<?php
if(isset($_GET['viewproperty']))
            {
                $viewprop=mysqli_query($dbc,"SELECT * FROM tbl_property WHERE login_id={$_SESSION['lid']}");
                if(mysqli_num_rows($viewprop)>0){
                    $row=mysqli_fetch_array($viewprop);
                    /* include('viewOwnprop.php'); */
                    
                        $numOfCols = 6;
                        $rowCount = 0;
                        $bootstrapColWidth = 12 / $numOfCols;
                        if($rowCount % $numOfCols == 0) { ?> <div class="row"> <?php } 
                                $rowCount++;   
                                $query=mysqli_query($dbc,"SELECT p.*,p_img.* FROM tbl_property p 
                                inner join tbl_pro_image p_img ON p_img.pro_id=p.pro_id AND p.p_status=1 AND p.login_id={$_SESSION['lid']} GROUP BY p_img.pro_id");
                                if(mysqli_num_rows($query)>0)
                                {
                                while($result=mysqli_fetch_assoc($query))
                                {
                                ?>
                                <div class="col-md-<?php echo $bootstrapColWidth; ?> mx-3">
                                    <div class="card" style="width: 18rem;max-height: 100%;">
                                        <div class="card-body">
                                            <a href="admin_index.php?houseid=<?=$result['pro_id'];?>">
                                                <img class="card-img-top" src="../upload_image/<?php echo $result['pro_image_name'];?>" alt="card image cap" width="100px" height="200px">
                                            </a>

                                            
                                            <?php if(!empty($result['package_id'])){
                                                $select_pack=mysqli_query($dbc,"SELECT `package_name` FROM tbl_package WHERE `package_id`={$result['package_id']} ");
                                                $pack_title=mysqli_fetch_assoc($select_pack);
                                           
                                            ?>
                                            <b>Package Details: </b><a href="?houseid=<?=$result['package_id']; ?>" class="btn btn-success badge text-black"><?php echo $pack_title['package_name']?></a>
                                            <?php
                                             } 
                                            ?>
                                            <h2>HOUSE<?=$result['s_price'];?></h2>
                                            <?php if($result['p_status']==0){
                                                ?>
                                                <span class="badge btn bg-success text-dark">Approved</span>
                                            <?php }
                                            ?>
                                            <p class="card-text"><?=$result['pro_desc'];?></p>
                                            <p><a href="?houseid=<?=$result['pro_id']; ?>" class="btn btn-primary">Details</a></p>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            if($rowCount % $numOfCols == 0) { ?> </div> <?php } 
                            }

                }
                else
                {
                echo '<div class="h4">Your property approval is pending...!</div>'; 
                }
                
            }
            else
            {
            echo 'No Property added'; 
            }
           
        }
        ?>