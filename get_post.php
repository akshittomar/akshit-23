<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Document</title>
</head>
<body>
    <form action="http://localhost/akshit-23/get_post.php" method="post">
    <h1>INPUT FORM HEADING </h1>
    <label for='name'>ENTER YOUR NAME: </label>
    
    <input type='text' name='name' id='name2'  required='true' placeholder='enter your name' ></input>
    <hr/>
    <label for='class1'>ENTER YOUR CLASS: </label>
    
    <input type='text' name='class1' id='class2' required='true' placeholder='enter your class' ></input>
    <hr/>
    <button type='submit' >SUBMIT</button>
</form>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $name = $_POST['name'];
    $class1 = $_POST['class1'];
    echo "name is $name class is $class1 ";
}
?>
</body>
</html>



