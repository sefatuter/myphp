<?php
class Spyy {
    private $spy;
    public function __construct($spy) {
        $this->spy = $spy;
    }

    public function spier() {
        echo "Spy is : {$this->spy}<br>";
    }
}
