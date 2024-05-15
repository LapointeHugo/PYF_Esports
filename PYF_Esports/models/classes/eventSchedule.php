<?php

class EventSchedule implements JsonSerializable{
    private $date;
    private $time;
    private $team1;
    private $team2;
    private $roundType;

    public function __construct($date, $time, $team1, $team2, $roundType) {
        $this->date = $date;
        $this->time = $time;
        $this->team1 = $team1;
        $this->team2 = $team2;
        $this->roundType = $roundType;
    }

    public function jsonSerialize() {
        $vars = get_object_vars($this);

        foreach ($vars as $var => $value) {
            if ($value === null) {
                unset($vars[$var]);
            }
        }

        return $vars;
    }
}
