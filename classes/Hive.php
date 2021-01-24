<?php

class Hive   {

    const QUEEN = 1;
    const WORKERS = 5;
    const DRONES = 8;
    protected $totalBees = self::QUEEN + self::WORKERS + self::DRONES;
   
    

    public function __construct() {

        $this->beesAlive = self::QUEEN + self::WORKERS + self::DRONES;

        for($i = 0; $i < self::QUEEN; $i++) {
            $this->hive[] = (new Queen())->setName('Queen ' . $i);
        }


        for($i = 0; $i < self::WORKERS; $i++) {
            $this->hive[] = (new Worker())->setName('Worker ' . $i);
        }
        
        
        for($i = 0; $i < self::DRONES; $i++) {
            $this->hive[] = (new Drone())->setName('Drone ' . $i);
        }
   
    }

    private function getRandomBee() {

        $beeStatus = [];    
        foreach($this->hive as $key=>$bee){
            if($bee->isAlive()) {
                $beeStatus[$key] = $bee->isAlive();
            }
        }
        
        if(count($beeStatus) == 0){
            return null;
        }
        $beeIndex = array_rand($beeStatus);
           return $this->hive[$beeIndex];        
    }
       

    public function hit() {

        $bee = $this->getRandomBee();  
        

        if($bee !=  null) {
            $bee->takeHit();

            if($bee->isAlive() == false){
                $this->beesAlive -= 1; 
            }
        }         
        
    }

    

    public function showStats(){

        $beesAlive = $this->beesAlive;
        $workersAlive = 0;
        $dronesAlive = 0;
        $queenAlive = 0;

        foreach($this->hive as $bee){
          $type = get_class($bee);
          switch($type) {
                case Queen::class :
                if($bee->isAlive()){
                    $queenAlive++;
                }         
                break;
                case Worker::class :  
                    if($bee->isAlive()){
                        $workersAlive++;
                    }
                    break;
                case Drone::class :
                    if($bee->isAlive()){
                        $dronesAlive++;
                    }
                break;
          } 

        echo "Bee name: " . $bee->getName() . " - Bee HP: " . $bee->getHp() . "<br><br>";

        }
        $bee = $this->getRandomBee();
        if($beesAlive > 0) {

            echo $bee->getName() . " has been hit for " . $bee->getDamage() . " damage!<br><br>"; 
        }

        echo "Bees alive: " . $beesAlive . "<br>";
        echo "Queen: " . $queenAlive . "<br>";
        echo "Workers: " . $workersAlive . "<br>";
        echo "Drones: " . $dronesAlive . "<br>";
        

        if($queenAlive == 0) {
            echo "<a href=?action=reset>RESET</a><br>";
            exit("Queen Died. Game over!");
        }

        
        if($beesAlive == 0) {
            echo "<a href=?action=reset>RESET</a><br>";
            exit("No bees alive. Game over!");
        }


    }
}






























