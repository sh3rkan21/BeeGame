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
        $workers = 0;
        $drones = 0;
        $queen = 0;

        foreach($this->hive as $bee){
          $type = get_class($bee);
          switch($type) {
              case get_class($bee) == Queen::class :
                if($bee->isAlive()){
                    $queen++;
                }
                               
                break;
                case get_class($bee) == Worker::class :  
                    if($bee->isAlive()){
                        $workers++;
                    }
                    break;
                case get_class($bee) == Drone::class :
                    if($bee->isAlive()){
                        $drones++;
                    }
                break;

          }        
        }
        echo "Queen HP: "; 
}
        // for($i = 1; $i <= self::WORKERS; $i++){
        //     if(!$this->hive[$i]->isAlive())
        //     $workers[] = $this->hive[$i];
        // }

        // for($i = 1; $i <= self::DRONES; $i++){
        //     if(!$this->hive[$i]->isAlive())
        //     $drones[] = $this->hive[$i];
        // }
        
        // if($beesAlive <= 0) {
        //     $message = "No bee alive! Game Over!";
        //     echo $message;
        //     exit();
        // }

        // if(!$this->hive[0]->isAlive()){
        //     $message = "Queen Died. Game Over!";
        //     echo $message;
        //     exit();
        // }

        // echo "Bees alive: " . $this->beesAlive.  "<br>Queen HP:". $this->hive[0]->getHp() ."<br> Workers bee dead:   <br> Drones bee dead:  <br><br>";         
        
    

}
              
$s = new Hive();

$s->hit();


























