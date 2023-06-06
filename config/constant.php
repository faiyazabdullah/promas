<?php


session_start();

//define('SITEURL', 'http://localhost/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'cafeteria');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database Connection
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //Selecting Database

$currentDateTime = date("Y-m-d H:i");



function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
//CRUD - create , read, update, delete

class FoodItem{
    private $id;
    private $name;
    private $price;
    private $stock;
    private $type;
    function __construct($row){
        //$sql = "SELECT * FROM `food_items`";
        $this->id = $row['id'];
        $this->name = $row['name'];
        $this->price = $row['price'];
        $this->stock = $row['stock'];
        $this->type = $row['food_type_id'];
    }

    public static function read($conn){
        $sql = "SELECT * FROM `food_items`";
        $res = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($res)){
            $food = new FoodItem($row);
            $food->print();
        }


    }

    function print(){
        
        echo
        "<h2 class='food'>$this->name</h2>
        <p>$this->price</p>";
        

    }
    
    function create(){
    
    }
    
    function update(){
    
    }
    
    function delete($id){
        $sql =  "DELETE FROM food_items WHERE `food_items`.`id` = $id";
    }
}



?>