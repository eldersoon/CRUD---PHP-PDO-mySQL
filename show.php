<?php
    function __autoload($class){
        include_once($class.'.php');
    }
    $obj = new crud;

    if(isset($_REQUEST['del_id'])){
        extract($_REQUEST);
        $obj->deleteData('test',$_REQUEST['del_id']);
    }
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
    <a href="insert.php">INSERT</a>
    <table border="1">
        <tr>
            <th>$id</th>
            <th>name</th>
            <th>email</th>
            <th>actions</th>
        </tr>
<?php
if(count((array) $obj->showData('test')) > 0){
    foreach($obj->showData('test') as $value){  
        extract($value);
        echo <<<show
            <tr>
                <td>$id</td>
                <td>$name</td>
                <td>$email</td>
                <td>
                    <a href="update.php?id=$id">Edit</a>
                    <a href="show.php?del_id=$id">Delete</a>
                </td>
            </tr>
show;
    }
}
?>
    </table>
</body>
</html>