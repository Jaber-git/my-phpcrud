
<?php 

include_once 'class/components.php';
 


?>

<?php include 'header.php';


?>


<h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i>Product Store</h1>

<div class="d-flex justify-content-center">

 <?php if(isset($res)){
        
        foreach($res as $k => $v){  ?>
    <form action="" method="post" class="w-50" >

    
        <div class="pt-2">
        <div class="input-group mb-2">
             <div class="input-group-prepend">
                       <div class="input-group-text bg-warning"><i class='fas fa-id-badge'></i></div>
                </div>
             <input type="text" name="product_id" value=" <?php echo $v['id'] ;  ?> "  class="form-control"  >
               
             </div> 
        </div>

        <div class="pt-2">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                     <div class="input-group-text bg-warning"><i class='fas fa-shopping-basket'></i></div>
                </div>
                 <input type="text" name="product_name" value=" <?php echo $v['name'] ; ?> "   class="form-control" id="inlineFormInputGroup" >
            </div> 
        </div> 

        <div class="row pt-2">

            <div class="col">
               
            <div class="input-group mb-2">
                  <div class="input-group-prepend">
                       <div class="input-group-text bg-warning"><i class='fas fa-tags'></i></div>
                    </div>
                     <input type="text" name="product_cat" value=" <?php echo $v['cat']; ?> "  class="form-control" id="inlineFormInputGroup" >
            </div>

            </div>

            <div class="col">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                         <div class="input-group-text bg-warning"><i class='fas fa-dollar-sign'></i></div>
                    </div>
                        <input type="text" name="product_price" value=" <?php echo $v['price']; ?> " class="form-control" id="inlineFormInputGroup" >
                </div>
               
            </div>
        </div>
       
        <div class="d-flex justify-content-center">
                <?php buttonElement("btn-create","btn btn-success","<i class='fas fa-plus'></i>","create","data-toggle='tooltip' data-placement='bottom' title='Create'"); ?>
                <?php buttonElement("btn-read","btn btn-primary","<i class='fas fa-sync'></i>","read","data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
                <?php buttonElement("btn-update","btn btn-light border","<i class='fas fa-pen-alt'></i>","update","data-toggle='tooltip' data-placement='bottom' title='Update'"); ?>
                <?php buttonElement("btn-delete","btn btn-danger","<i class='fas fa-trash-alt'></i>","delete","data-toggle='tooltip' data-placement='bottom' title='Delete'"); ?>
                
        </div>
       
    </form>
   
    </div>

<?php } } else{ ?>
    


<form action="" method="post" class="w-50">

    <div class="pt-2">
    <div class="input-group mb-2">
         <div class="input-group-prepend">
                   <div class="input-group-text bg-warning"><i class='fas fa-id-badge'></i></div>
            </div>
         <input type="text" name='product_id'  placeholder="ID" class="form-control"  >
           
         </div> 
    </div>

    <div class="pt-2">
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                 <div class="input-group-text bg-warning"><i class='fas fa-shopping-basket'></i></div>
            </div>
             <input type="text" name="product_name"  autocomplete="off" placeholder="product name " class="form-control" id="inlineFormInputGroup" >
        </div> 
    </div> 

    <div class="row pt-2">

        <div class="col">
           
        <div class="input-group mb-2">
              <div class="input-group-prepend">
                   <div class="input-group-text bg-warning"><i class='fas fa-tags'></i></div>
                </div>
                 <input type="text" name="product_cat" autocomplete="off" placeholder="Category" class="form-control" id="inlineFormInputGroup" >
        </div>

        </div>

        <div class="col">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                     <div class="input-group-text bg-warning"><i class='fas fa-dollar-sign'></i></div>
                </div>
                    <input type='text' name='product_price'  autocomplete="off" placeholder='Price' class="form-control" id="inlineFormInputGroup" >
            </div>
           
        </div>
    </div>
 
    <div class="d-flex justify-content-center">
    
            <?php buttonElement("btn-create","btn btn-success","<i class='fas fa-plus'></i>","create","data-toggle='tooltip' data-placement='bottom' title='Create'"); ?>
            <?php buttonElement("btn-read","btn btn-primary","<i class='fas fa-sync'></i>","read","data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
            <?php buttonElement("btn-update","btn btn-light border","<i class='fas fa-pen-alt'></i>","update","data-toggle='tooltip' data-placement='bottom' title='Update'"); ?>
            <?php buttonElement("btn-delete","btn btn-danger","<i class='fas fa-trash-alt'></i>","delete","data-toggle='tooltip' data-placement='bottom' title='Delete'"); ?>
            
    </div>
   
</form>

</div>
<?php } ?>
                <!-- Bootstrap table  -->
                <div class="  py-4 table-data">
                    <table class=" table table-striped table-dark">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Book Name</th>
                                <th>Publisher</th>
                                <th>Book Price</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                        <?php


            if(isset($_POST['read'])){
                            

                            if(isset($result)){

                                while ($row = mysqli_fetch_assoc($result)){ ?>
                                <form action="" method="post">
                                    <tr>
                                        <td data-id="<?php echo $row['id']; ?>"><?php echo $row['id']; ?>
                                        <input type="hidden"  name='product_id' value="<?php echo $row['id'];?>">
                                        </td>
                                        <td data-id="<?php  echo $row['id']; ?>"><?php echo $row['name']; ?>
                                        
                                        </td>
                                        <td data-id="<?php  echo $row['id']; ?>"><?php  echo $row['cat']; ?>
                                         
                                        </td>
                                        <td data-id="<?php  echo $row['id']; ?>"><?php echo '$' . $row['price']; ?>
                                        
                                        </td>
                                        <td ><i class="fas fa-edit btnedit" data-id="<?php echo $row['id']; ?>">
                                        <input   type="submit" name="submit" value="edit">
                                        </i></td>
                                    </tr>
                                </form>
                                
                        <?php
                                }

                            }
                        }
                        ?>
                        </tbody>
                    </table>
                
       </div>
</main>

<?php include 'footer.php';?>
