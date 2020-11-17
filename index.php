<?php 
    // MySQLi o PDO
    // connect to database
    $conn = mysqli_connect('localhost', 'sam', 'test1234', 'tutorial_php');

    // check connection
    if(!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    }

?>

<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php'); ?>

    <?php include('templates/footer.php'); ?>

    

</html>