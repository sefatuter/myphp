<?php
class Agent {
    private $name;
    public function __construct($name) {
        $this->name = $name;
    }

    public function identify() {
        echo "🕵️ Agent Identified: {$this->name}<br>";
    }
}
