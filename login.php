<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/madhu/form/includes/classes/user.class.php');

$login = false;

if(isset($_GET['uname']) && isset($_GET['phone']) && isset($_GET['email']) && isset($_GET['password'])){
    $uname= $_GET['uname'];
    $password = $_GET['password'];
    $error= User::insert_user($uname,$phone,$email,$password);
    $login = true;
  
}
?>
<html>

<head>
    <title>Form</title>

    <style>
    body {
        margin: 100px 550px 10px 550px;
        background-color: #87F0FF;
    }

    input {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        border: 1px solid;
        border-radius: 4px;
        box-sizing: border-box;
        font-style: italic;
    }


    input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    .body{
        border-radius: 10px;
        background-color: #f2f2f2;
        padding: 20px;
        margin: 5px 5px 5px 5px;
    }

    h3 {
        margin: -3px;
        font-style:oblique;
    }
    label{
        font-size: large;
        font-style: italic;
    }

    </style>
</head>

<body>

    <div class="body">
        <center>
            <h3>Login</h3>
        </center>
        <form action="" method='get'>
            
            <div class="div1">
                <div class="label"><label>Username</label></div>
                <div class="input"><input type="text" name='uname' placeholder='username' required></div>
            </div>
            <div class="div1">
                <div class="label"><label>Password</label></div>
                <div class="input"><input type="password" name='password' placeholder='password' required></div>
            </div>
            
            <input type="submit" value="Submit">
        </form>

    </div>


</body>

</html>