<?php
class DB{
   private $conn;

  private $res;

  private $flag=0;
//db connection
  public function newConnection($host,$user,$pw,$dbname){
        $this->conn=new mysqli($host,$user,$pw,$dbname);
   
        return $this->conn;
      }

/*************
 * Create*****
 *************/
// Insert data from fresh html form
  public function insertrecords($table ,$data){
         $fields=" ";
         $values=" ";
        
         foreach($data as $f=>$v){
           $fields.= "$f,"; //id,name,title,
           $values.=(is_numeric($v) && (intval($v)==$v)) ? $v."," : " '$v' ,";
            }
            $fields= substr( $fields,0,-1);
            $values=substr( $values,0,-1);
           $insert= "INSERT INTO $table ({$fields})  VALUES ({$values})";
            $this->executeQuery ( $insert );
             $this->flag=1;
             return true;
         
       }
/*************
 * read******
 *************/

//get all data i.e. Read
  public function getData(){

         $sql = "SELECT id, name, cat, price FROM products";

         $result= $this->executeQuery($sql);
        return  $result;
      }
 //get all data by id i.e. Read
    public function getDataById($id){

         $get = "SELECT id , name , cat , price FROM products" ;
    
         if($id != ""){
             $get .= " WHERE ".$id;
         }
        $result= $this->executeQuery($get);
        return  $result;
      }
/***********
 * update***
 ***********/

 //update existing data
    public function updateRecords( $table, $changes, $condition ) {
    	$update = " UPDATE " . $table . " SET ";
    	foreach( $changes as $field => $value )
            {
             
               $update .= "  $field  = '{$value}',";
            }
                  
    	// remove our trailing ,
    	$update = substr($update, 0, -1);
    	if( $condition != '' )	{
    		$update .= " WHERE " . $condition;
    	}
    	
    	$this->executeQuery( $update );
    	
    	return true;
    	
    }

  public function executeQuery( $queryStr )   {
        if ($this->conn->query( $queryStr ) == TRUE) {
          $this->res=$this->conn->query( $queryStr );
           // echo "<h6 class='success'>dynamically created query :{$queryStr}</h6>";
               echo "<h6 class='success'>Record Successfully Modified...!</h6>";
        }else{
          echo "<h6 class='success'>Error : {$queryStr} {$this->conn->error}</h6>"; 
        }
        return $this->res;
        }
/***********
 * delete***
 ***********/
//delete records

      public function deleteRecords( $table, $condition, $limit=NULL )  {
        $limit = ( $limit == NULl ) ? '' : ' LIMIT ' . $limit;
        $delete = "DELETE FROM {$table} WHERE {$condition} {$limit}";
        $this->executeQuery( $delete );
      }
    
       
     // messages
     // function TextNode($classname, $msg){
     //   $element = "<h6 class='$classname'>$msg</h6>";
     //  echo $element;
     //  }
      
  }
