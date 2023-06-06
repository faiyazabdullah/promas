<?php include('partial/header.php');?>

<h1>blah blah</h1>

<?php 
FoodItem::read($conn);
?>

<?php include('partial/footer.php');?>