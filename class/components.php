<?php

include 'db-crud.php';

$db=new DB();

$db->newConnection("localhost","root","", "mvc");

// create or insert fresh data
    if(isset($_POST['create']) ){

    $id=$_POST['product_id'];
    $name=$_POST['product_name'];
    $cat=$_POST['product_cat'];
    $price=$_POST['product_price'];

   if(isset($_POST['create']) && !empty($id) && !empty($name) && !empty($cat) && !empty($price)){
  
 $data=array(
     'id' =>  $id,
     'name' => $name,
     'cat' => $cat,
     'price' =>$price
  );
  if(isset($data)){
      $insert= $db->insertrecords('products',$data);  
      }  
  }
}

//read data, fetching from db,ok
  if(isset($_POST['read']) ){
    $result=$db->getData();
    }
//read data into first form
  if(isset($_POST['submit'])){

    $id=$_POST['product_id'];
    $cond="id=$id";
    $res=$db->getDataById($cond);
  
 
   }
//update data
    if(isset($_POST['update']) ){
    $id=$_POST['product_id'];
    $name=$_POST['product_name'];
    $cat=$_POST['product_cat'];
    $price=$_POST['product_price'];

    if(isset($_POST['update']) && !empty($id) && !empty($name) && !empty($cat) && !empty($price)){
      
       $cond="id=$id";

        $dataChanges=array(
            'id'=>$id,
            'name'=> $name,
            'cat'=> $cat,
            'price'=>$price
        );
        $db->updateRecords( "products",  $dataChanges, $cond ) ;
        
       }
    }
    
 //delete records
  if(isset($_POST['delete']) ){
    $id=$_POST['product_id'];
    $name=$_POST['product_name'];
    $cat=$_POST['product_cat'];
    $price=$_POST['product_price'];

    if( !empty($id) && !empty($name) && !empty($cat) && !empty($price)){
     
       $cond="id=$id";
       $dataChanges=array(
            'id'=>$id,
            'name'=> $name,
            'cat'=> $cat,
            'price'=>$price
        );
   $db->deleteRecords( 'products', $cond);

    }
}



// dynamically creating Button element
function buttonElement($btnid, $styleclass, $text, $name, $attr){
    $btn = "
    <button name='$name' '$attr' class='$styleclass' id='$btnid'>$text</button>
    ";
    echo $btn;
    }
?>
