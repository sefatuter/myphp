<?php
class Mission {
    private $mission;
    public function __construct($mission) {
        $this->mission = $mission;
    }

    public function show() {
        echo "Mission is : {$this->mission}<br>";
    }
}
