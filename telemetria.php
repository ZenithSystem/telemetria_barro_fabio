

<?php 

    //Esercizio telemetria Barro Fabio 5BT-i 

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

    <table border="1">
        <tr>
            <th> Ping Grezzi Initiali </th>
            <td>
                <ul>
                    <?php foreach($ping_grezzi as $ping): ?>
                        <li>
                            <?php echo($ping); ?>
                        </li>
                    <?php endforeach; ?>        
                </ul>
            </td>
        </tr>

        <?php array_push($ping_grezzi, 55, 190, 12); ?>

        <tr>
            <th> Ping Grezzi Aggiornati </th>
            <td>
                <ul>
                    <?php foreach($ping_grezzi as $ping): ?>
                        <li>
                            <?php echo($ping); ?>
                        </li>
                    <?php endforeach; ?>        
                </ul>
            </td>
        </tr>
    </table>

    <?php foreach($ping_grezzi as $ping): ?>

        <?php if($ping == -1): ?>
           
            <?php $pacchetti_persi++; ?>
        
            <?php elseif($ping > 0): ?>
            
            <?php $ping_validi[] = $ping; ?>
        
        <?php endif; ?>
    
    <?php endforeach; ?>

    <?php foreach($ping_validi as $ping): ?>
        
        <?php $somma_ping += $ping; ?>
    
    <?php endforeach; ?>

    <?php $tempo_medio = round($somma_ping / count($ping_validi), 2); ?>

    <?php foreach($ping_validi as $ping): ?>
        
        <?php if($ping > $ping_massimo): ?>
            
            <?php $ping_massimo = $ping; ?>
        
        <?php endif; ?>
    
    <?php endforeach; ?>

    <table border="1">
        <tr>
            <th> Somma dei ping </th>
            <td> <?php echo($somma_ping); ?> </td>
        </tr>
        <tr>
            <th> Tempo medio di esecuzione </th>
            <td> <?php echo($tempo_medio); ?> </td>
        </tr>
        <tr>
            <th> Ping massimo</th>
            <td> <?php echo($ping_massimo); ?> </td>
        </tr>
    </table>

</body>
</html>
