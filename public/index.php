<?php
/**
 * Created by PhpStorm.
 * User: mattcrl
 * Date: 06/06/18
 * Time: 14:11
 */

require('../src/TimeTravel.php');

// Je choisis les dates de début et date de fin
$start = new DateTimeImmutable('31-05-1985');
$end = new DateTime('31-06-1988 12:48:48');

// Fonction getTravelInfo pour calculer la différence de temps entre la date de début et celle de fin
$travel = new TimeTravel($start, $end);
echo $travel->getTravelInfo();


// Fonction findDate qui renvoi une date d'arrivée numberDays après ou avant la date de départ.
// Nombre positif pour un voyage dans le futur, nombre négatif pour voyage dans le passé
echo $travel->findDate(-1000000000);

// Fonction backToFutureStepByStep qui renvoi toutes les étapes du voyage pour "revenir dans le futur"
$step = 'P1M1WT24H';
$travel->backToFutureStepByStep($step);