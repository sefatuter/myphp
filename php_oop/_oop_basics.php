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
echo "<hr>";

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

echo "<hr>";

// INHERITANCE

class AgentHeritance {
    protected $name; 

    public function __construct($name) {
        $this->name = $name;
    }

    public function identify() {
        echo "🕵️ Agent: {$this->name}<br>";
    }
}

class EliteAgent extends AgentHeritance {
    public function missionBrief() {
        echo "🔒 Clearance granted to: {$this->name}<br>";
    }
}


$agent = new EliteAgent("Sefa");
$agent->identify();        // From parent
$agent->missionBrief();    // From child


//challenge

class MissionCh {
    protected $name;
    public $type;

    public function __construct($name, $type) {
        $this->name = $name;
        $this->type = $type;
    }

    public function launch(){
        echo "<br>Mission is : ". $this->name;
    }
}

class CovertMission extends MissionCh {
    private $difficulty;

    public function __construct($name, $type, $difficulty) {
        parent::__construct($name, $type);
        $this->difficulty = $difficulty;
    }

    public function brief(){
        echo "<br>Name : " . $this->name . ", Difficulty: " . $this->difficulty .  ", Type: " . $this->type . "<br>";
    }
}


$mission = new CovertMission("Ghost Recon", "Stealth", "Omega Black");

$mission->launch();
$mission->brief();

echo "<hr>";

// POLYMORPHISM

abstract class MissionAb {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    abstract public function execute(); // must be defined in childs

    public function brief() {
        echo "🧾 Mission: {$this->name}<br>";
    }
}

class ReconMission extends MissionAb {
    public function execute() { // defined
        echo "👣 Executing RECON mission: {$this->name}<br>";
    }
}

class StrikeMission extends MissionAb {
    public function execute() { // defined
        echo "💥 STRIKE team deployed for: {$this->name}<br>";
    }
}

$missions = [
    new ReconMission("Silent Hawk"),
    new StrikeMission("Crimson Viper")
];

foreach ($missions as $m) {
    $m->brief();       // inherited from parent
    $m->execute();     // polymorphic behavior
}

// challenge
echo "<br>";

abstract class FileTransfer {
    protected $filename;

    public function __construct($filename) {
        $this->filename = $filename;
    }

    abstract public function transfer();
}

class HttpTransfer extends FileTransfer {
    
    public function transfer() {
        echo "<br>🌐 HTTP transferring " . $this->filename . "...<br>";
    }
}

class FtpTransfer extends FileTransfer {
    
    public function transfer() {
        echo "<br>📡 FTP sending " . $this->filename .  "...<br>";
    }
}

$transfers = [
    new HttpTransfer("mission_doc.pdf"),
    new FtpTransfer("mission_doc.pdf")
];

foreach ($transfers as $t) {
    $t->transfer();
}

echo "<hr>";