

<?php 

    $ping_grezzi = [45, 120, -1, 32, 210, 85, -1, 18, 95, 310, 45, 60, -1, 150, 28, 240, 18, 72];

    $ping_validi = [];
    $pacchetti_persi = 0;

    $somma_ping = 0;

    $tempo_medio = 0;
    $ping_massimo = 0;

    $ping_unici = [];

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
                <?php echo($ping); ?>
            </li>
        <?php endforeach; ?>        
    </ul>

    <?php array_push($ping_grezzi, 55, 190, 12); ?>

    <ul>
        <?php foreach($ping_grezzi as $ping): ?>
            <li>
                <?php echo($ping); ?>
            </li>
        <?php endforeach; ?>        
    </ul>

    <ul>
        <?php foreach($ping_grezzi as $ping): ?>
            <?php if($ping == -1): ?>
                <?php $pacchetti_persi++; ?>
            <?php elseif($ping > 0): ?>
                <?php $ping_validi[] = $ping; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>


    <?php foreach($ping_validi as $ping): ?>
        <?php $somma_ping += $ping; ?>
    <?php endforeach; ?>


    <?php $tempo_medio = round($somma_ping / count($ping_validi), 2); ?>

    <?php foreach($ping_validi as $ping): ?>
        <?php if($ping > $ping_massimo): ?>
            <?php $ping_massimo = $ping ?>
        <?php endif; ?>
    <?php endforeach; ?>

    



    <h2> somma dei ping </h2>
    <p> <?php echo($somma_ping); ?></p>

    <h2> tempo medio di esecuzione </h2>
    <p> <?php echo($tempo_medio); ?> </p>

    <h2> ping massimo </h2>
    <p> <?php echo($ping_massimo); ?> </p>




</body>
</html>
