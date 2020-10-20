<?php
    //ternary operators
    // $score = 50;
    // echo $score > 40 ? 'High score': 'Low score' ;
    // echo $_SERVER['SERVER_NAME'] . '<br/>';
    // echo $_SERVER['REQUEST_METHOD'] . '<br/>';
    // echo $_SERVER['SCRIPT_FILENAME'] . '<br/>';
    // echo $_SERVER['REQUEST_METHOD'] . '<br/>';
    // echo $_SERVER['PHP_SELF'] . '<br/>';

    // sessions
    if (isset($_POST['submit'])) {
        # code...
        session_start();
        $_SESSION['name'] = $_POST['name'];

        header('Location: index.php');
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
        <input type="text" name="name" id="">
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>