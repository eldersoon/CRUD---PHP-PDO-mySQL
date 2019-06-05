<?php
    function __autoload($class){
        include_once($class.'.php');
    }
    $obj = new crud;

    if(isset($_REQUEST['update'])){
        extract($_REQUEST);
        if($obj->updateData('test',$nome,$email,$id)){
            header('location:show.php');
        }
    }
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
<?php
extract($obj->getById('test',$_REQUEST['id']));
    echo @<<<show
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="$id">
        NOME <input type="text" name="name" value="$name">
        EMAIL <input type="email" name="email" value="$email">
        <input type="submit" name="update" value="Update">
    </form>
show;
?>
</body>
</html>