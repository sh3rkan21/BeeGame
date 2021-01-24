<?php

include 'Queen.php';
include 'Worker.php';
include 'Drone.php';

class Hive   {

    const QUEEN = 1;
    const WORKERS = 5;
    const DRONES = 8;
    protected $totalBees = self::QUEEN + self::WORKERS + self::DRONES;
   
    

    public function __construct(){

        $this->beesAlive = self::QUEEN + self::WORKERS + self::DRONES;

        for($i = 0; $i < self::QUEEN; $i++) {
            $this->hive[] = (new Queen())->setName('Queen ' . $i);
        }

        // generate Workers

        for($i = 0; $i < self::WORKERS; $i++) {
            $this->hive[] = (new Worker())->setName('Worker' . $i);
        }
        
        // generate Drones
        
        for($i = 0; $i < self::DRONES; $i++) {
            $this->hive[] = (new Drone())->setName('Drone' . $i);
        }
        // echo "<pre>";
        // print_r($this->hive);
        // echo "</pre>";
        // echo "sunt in constructor";
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
        
            print_r($this->hive[$beeIndex]);
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
        
        $this->showStats();
    }

    

    private function showStats(){

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
          echo "<pre>";
          print_r($bee);       
          echo "</pre>";
        }

        echo "Queen: " . $queenAlive;
        echo "Workers: " . $workersAlive;
        echo "Drones: " . $dronesAlive;
}
   
        
    

}
              
$s = new Hive();

$s->hit();


























