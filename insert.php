<?php
    function __autoload($class){
        include_once($class.'.php');
    }
    $obj = new crud;

    if(isset($_REQUEST['insert'])){
        extract($_REQUEST);
        if($obj->insertData('test',$name, $email)){
            header('location:show.php');
        }
    }
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
<?php
    echo @<<<show
    <form action="insert.php" method="POST">
        NOME <input type="text" name="name">
        EMAIL <input type="email" name="email">
        <input type="submit" name="insert" value="Insert">
    </form>
show;
?>
</body>
</html>