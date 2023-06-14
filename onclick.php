<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Document</title>
</head>
<body>
    <form>
    <h1>INPUT FORM HEADING </h1>
    <label for='name'>ENTER YOUR NAME: </label>
    
    <input type='text' name='name' id='name'  required='true' placeholder='enter your name' ></input>
    <hr/>
    <label for='class1'>ENTER YOUR CLASS: </label>
    
    <input type='text' name='class1' id='class1' required='true' placeholder='enter your class' ></input>
    <hr/>
    <button type='submit' onclick='myFunc()' >SUBMIT</button>
</form>
<script>
    function myFunc(){
        var name = document.getElementById("name").value;
        var class1 =  document.getElementById("class1").value;

        alert(`name is ${name} class is ${class1} `);
    }
</script>
</body>
</html>