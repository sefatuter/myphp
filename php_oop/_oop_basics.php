<?php

// CLASS AND CONSTRUCTOR
class Agent {
    public $codename;

    // Constructor gets called on object creation
    public function __construct($name) {
        $this->codename = $name;
    }

    public function identify() {
        echo "🕶️ Agent: {$this->codename}<br>";
    }

    public function hello() {
        echo "Hello Agent.";
    }
}

$agent = new Agent("Sefa");
$agent->identify(); // 🕶️ Agent: Sefa
$agent->hello();
echo "<br>";

// Challenge
class Mission {
    public $name;
    private $code;
    protected $status;

    public function __construct($name, $code, $status) {
        $this->name = $name;
        $this->code = $code;
        $this->status = $status;
    }

    public function display(){
       echo "<br>Mission : ". $this->name . "<br>Code : " . $this->code . "<br>Status : " . $this->status . "<br>"; 
    }

}

$mission = new Mission("Blackstar", "XZ-900", "classified");


$mission->display();

echo $mission->name . "<br>";
// echo $mission->code; 
// echo $mission->status; Fatal error: Uncaught Error: Cannot access protected property 


// PHP Visibility Modifiers

// Modifier	    Access Level	                    Used For
// public	    Anywhere (default)	                Open access
// private	    Only within the same class	        🔒 Internal-only logic or sensitive data
// protected	Inside this class and subclasses    👪 Inheritance-safe (OOP family access)


// ENCAPSULATION

class Spy {
    private $alias;

    public function setAlias($alias) {
        if (strlen($alias) >= 3) {
            $this->alias = $alias;
        } else {
            echo "❌ Alias too short!";
        }
    }

    public function getAlias() {
        return $this->alias;
    }
}
echo "<br>";

$spy = new Spy();
$spy->setAlias("nicea");

echo "🧑‍✈️ Alias: " . $spy->getAlias() . "<br>";
// echo $spy->alias; // Without getter it's not gonna work: private property

//challenge

class Intel {
    private $code, $target;

    public function setIntel($code, $target) {
        if (strlen($code) == 6 && !empty($target)) {
            $this->code = $code;
            $this->target = $target;
        } else {
            echo "<br> Error setting.<br>";
        }
    }

    public function getIntel() {
        $msg = "<br>📡 Code: " . $this->code  . " | 🎯 Target: " . $this->target . "<br>";
        echo $msg;
    }
}

$intel = new Intel();
$intel->setIntel("ABC123", "RedZone");

$intel->getIntel();


// INHERITANCE

