<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
   include '../classes/category.php'
?>
<?php 
   $category = new category();  
   
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit Category</h2>
               <span> <?php 
                   if(isset($check_insert_cat)==true){
                      echo $check_insert_cat; 
                   }
                ?></span>
               <div class="block copyblock"> 
                 <form action="catadd.php" method ="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name ="catName" placeholder="Edit Category Name..." class="medium" />
                            </td>
                        </tr>
						             <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Edit" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>