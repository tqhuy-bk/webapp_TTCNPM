<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
   include '../classes/category.php'
?>
<?php 
   $category = new category();  
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $catName = $_POST['catName'];
      $check_insert_cat= $category->insert_category($catName);
   }
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
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
                                <input type="text" name ="catName" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						             <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>
