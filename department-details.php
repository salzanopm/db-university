<?php
    require_once __DIR__ . '/database.php';
    require_once __DIR__ . '/Departments.php';
    $sql = $connection->prepare( 'SELECT * FROM departments WHERE id = ?');
    $sql->bind_param('d', $id);
    $id = $_GET['id'];
    $sql->execute();
    $result = $sql->get_result();

    // controllo che result sia atato creato
    if($result && $result->num_rows > 0) {
        $departments = [];
    while ($row = $result->fetch_assoc()) {
        $department=new Department();
        $department->id=$row['id'];
        $department->name=$row['name'];
        $department->email=$row['email'];
        $department->address=$row['address'];
        $departments[]=$department;
    }

    } elseif($result && $result->numm_rows==0) {
        echo 'Risultati non presenti per questa pagina';
    } else {
        echo 'Errore di query';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul> 
        <?php foreach($departments as $department) {?>
            <li>
                <?php echo $department->id?><?php echo $department->address ?>
            </li>
        <?php }?>
    </ul>
</body>
</html>