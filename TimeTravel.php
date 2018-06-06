<?php


class TimeTravel
{
    private $start;

    private $end;

    /**
     * @return DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param mixed $start
     * @return TimeTravel
     */
    public function setStart($start)
    {
        $this->start = $start;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param mixed $end
     * @return TimeTravel
     */
    public function setEnd($end)
    {
        $this->end = $end;
        return $this;
    }

    public function __construct(DateTime $start, DateTime $end)
    {
        $this->start = $start;
        $this->end = $end;
    }


    /**
     * @return string
     */
    public function getTravelInfo()
    {
        $diff = $this->getStart()->diff($this->getEnd());

        return $diff->format('Il y a %Y années, %m mois, %d jours, %h heures, %i minutes et %s secondes entre les deux dates.' . '<br>');
    }

    /**
     * Enter a number of days, positive to travel in the future, negative to travel in the past
     * @param int $numberDays
     * @return string
     * @throws Exception
     */
    public function findDate(int $numberDays)
    {
        if($numberDays >= 0) {
            $interval = new DateInterval('P' . $numberDays . 'D');
            $findDate = $this->getStart()->add($interval);
        } else {
            $numberDays = -$numberDays;
            $interval = new DateInterval('P' . $numberDays . 'D');
            $findDate = $this->getStart()->sub($interval);
        }
        return 'Doc a été retrouvé, nous sommes le ' . $findDate->format('d/m/Y') . '<br/>';
    }

    /**
     * @param $step
     * @return DatePeriod
     * @throws Exception
     */
    public function backToFutureStepByStep($step)
    {
        $intervals = new DateInterval($step);
        $period = new DatePeriod($this->getStart(), $intervals, $this->getEnd());


        foreach ($period as $oneStep) {
            echo $oneStep->format('M j Y A H:i') . '<br/>';
        }

        // $period : Tableau de N objet Datetime
        return $period;
    }
}


// Je choisis les dates de début et date de fin
$start = new DateTime('31-05-1985 10:02:59');
$end = new DateTime('31-06-1988 12:48:48');

// Fonction getTravelInfo pour calculer la différence de temps entre la date de début et celle de fin
$travel = new TimeTravel($start, $end);
echo $travel->getTravelInfo();

// Fonction findDate qui renvoi une date d'arrivée numberDays après ou avant la date de départ.
// Nombre positif pour un voyage dans le futur, nombre négatif pour voyage dans le passé
echo $travel->findDate(-11574);

// Fonction backToFutureStepByStep qui renvoi toutes les étapes du voyage pour "revenir dans le futur"
$step = 'P1M1WT24H';
$travel->backToFutureStepByStep($step);
