<?php

class Player implements JsonSerializable{
    private $name;
    private $mainRoster;

    public function __construct($name, $mainRoster) {
        $this->name = $name;
        $this->mainRoster = $mainRoster;
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
