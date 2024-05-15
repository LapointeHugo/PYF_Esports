<?php

class Team implements JsonSerializable{
    private $name;
    private $logo;
    private $players;

    public function __construct($name, $logo) {
        $this->name = $name;
        $this->logo = $logo;
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

    public function addPlayer($player) {
        $this->players[] = $player;
    }
}
