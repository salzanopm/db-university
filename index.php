<?php 
// importo la classe deartments
require_once __DIR__ . '/Departments.php';
// importo il database
require_once __DIR__ . '/database.php';
// preparo la query
$sql = 'SELECT * FROM departments';
$result = $connection->query($sql);

// controllo che result sia atato creato
if($result && $result->num_rows > 0) {
    $departments = [];
    while ($row = $result->fetch_assoc()) {
        $department=new Department();
        $department->id=$row['id'];
        $department->name=$row['name'];
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
                <a href="department-details.php?id=<?php echo $department->id?>"><?php echo $department->name ?></a>
            </li>
        <?php }?>
    </ul>
</body>
</html>