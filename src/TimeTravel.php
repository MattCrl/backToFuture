<?php


class TimeTravel
{
    private $start;

    private $end;

    /**
     * @return DateTimeImmutable
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

    public function __construct(DateTimeImmutable $start, DateTime $end)
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
    public function findDate(int $nbSeconds)
    {
        if($nbSeconds >= 0) {
            $interval = DateInterval::createFromDateString($nbSeconds . 'seconds');
            $findDate = $this->getStart()->add($interval);
        } else {
            $nbSeconds = -$nbSeconds;
            $interval = DateInterval::createFromDateString($nbSeconds . 'seconds');
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

