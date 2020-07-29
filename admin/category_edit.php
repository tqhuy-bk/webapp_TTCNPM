<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
   include '../classes/category.php'
?>
<?php 
   $category = new category();
   if(!isset($_GET['catid']) || $_GET['catid'] ==NULL){
     echo  "<script> window.location='catlist.php' </script>";
   }
   else{
    $id = $_GET['catid'];
   }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $catName = $_POST['catName'];
      $check_update_cat= $category->update_category($catName, $id);
   } 
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit Category</h2>
               <span> <?php 
                   if(isset($check_update_cat)==true){
                      echo $check_update_cat; 
                   }
                ?></span>
                <?php 
                   $get_cate_name= $category->getcatbyId($id);
                   if($get_cate_name){
                      while($result = $get_cate_name->fetch_assoc()){
                 ?>
               <div class="block copyblock"> 
                 <form action="" method ="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name ="catName" value="<?php echo $result['catName'] ?>" placeholder="Edit Category Name..." class="medium" />
                            </td>
                        </tr>
						             <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php 
                      }
                     }
                    ?>
                </div>
            </div>
        </div>
   }
<?php include 'inc/footer.php';?>
