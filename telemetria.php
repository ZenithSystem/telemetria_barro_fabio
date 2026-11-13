
<?php 

    //Parte Backend
    //Esercizio telemetria Barro Fabio 5BT-i 


    //contaPacchettiPersi accetta un array di interi e restituiscee un numero intero.
    function contaPacchettiPersi($ping_grezzi)
    {
        $pacchetti_persi = 0;


        //O(n)
        foreach($ping_grezzi as $ping)
        {
            if($ping == -1)
            {
                $pacchetti_persi++;
            }
        }

        return $pacchetti_persi;
    }


    //pacchettiValidi accetta una array di interi e restituisce un array di interi.
    function pacchettiValidi($ping_grezzi)
    {
        $ping_validi = [];

        //O(n)
        foreach($ping_grezzi as $ping)
        {
            if($ping > 0)
            {
                $ping_validi[] = $ping;
            }
        }


        return $ping_validi;
    }

    //calcolaTempoMedio accetta un array di interi e restituisce un double (2 decimali).
    function calcolaTempoMedio($ping_validi)
    {
        $somma   = 0;
        $counter = 0;
        $media   = 0;


        /*
        
            se io ho O(n) che e' il foreach e O(n) che e' literazione di count (funzione) quello che ho 
            e' un somma dei due O() -> il caso peggiore e' n.

            dal punto di vista del server non e' la stessa cosa perche itera due volte rallentando il server.

        */

        foreach($ping_validi as $ping)
        {
            $somma += $ping;
            $counter++;

            $media = $somma / $counter;


        }
        
        return round($media, 2);
    }


    //calcolaMinMax accetta un array di interi e due interi per riferimento, non restituisce nulla.
    function calcolaMinMax($ping_validi, &$min, &$max)
    {
        $min = $ping_validi[0];
        $max = $ping_validi[0];

        foreach($ping_validi as $ping)
        {
            if($ping > $max) $max = $ping;

            if($ping < $min) $min = $ping;
        }
    }






    //Facendo due funzioni e iterando, andiamo a sovraccaricare il server.

    $ping_grezzi = [45, 120, -1, 32, 210, 85, -1, 18, 95, 310, 45, 60, -1, 150, 28, 240, 18, 72];

    array_push($ping_grezzi, 55, 190, 12);

    $ping_validi = pacchettiValidi($ping_grezzi);
    $tempo_medio = calcolaTempoMedio($ping_validi);

    $ping_massimo = 0;
    $ping_minimo = 0;

    $pacchetti_persi = contaPacchettiPersi($ping_grezzi);


    calcolaMinMax($ping_validi, $ping_minimo, $ping_massimo); 


  

?>


<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Telemetria </title>
</head>
<body>
    <ul>
        <li> Totale rivelazioni: <?php echo(count($ping_grezzi));  ?> </li>
        <li> Pacchetti validi:   <?php echo(count($ping_validi));  ?> </li>
        <li> Pacchetti persi:    <?php echo($pacchetti_persi);     ?> </li>
        <li> Media               <?php echo($tempo_medio);         ?> </li>
        <li> Minimo:             <?php echo($ping_minimo);         ?> </li>
        <li> Massimo:            <?php echo($ping_massimo);        ?> </li>
    </ul>

    <table>
        <thead>
            <tr>
                <th> #          </th>
                <th> Ping (ms)  </th>
                <th> Stato      </th>
            </tr>
        </thead>

        <tbody>
            <?php for($i = 0; $i < count($ping_validi); $i++):  ?>
                <tr>
                    <td> <?php echo($i + 1) ?> </td>
                    <td> <?php echo($ping_validi[$i]); ?> </td>
                    <td> <?php echo($ping_validi[$i] >= 150 ? "CRITICO" : "NORMALE"); ?> </td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>

</body>
</html>

