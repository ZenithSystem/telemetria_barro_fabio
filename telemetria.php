
<?php 

    $ping_grezzi = [45, 120, -1, 32, 210, 85, -1, 18, 95, 310, 45, 60, -1, 150, 28, 240, 18, 72];

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> telemetria </title>
</head>
<body>

    <h1> esercizio telemetria </h1>

    <ul>
    
        <?php foreach($ping_grezzi as $ping): ?>
            <li>
                <?php echo($ping) ?>
            </li>
        <?php endforeach; ?>
        
    </ul>
    
</body>
</html>