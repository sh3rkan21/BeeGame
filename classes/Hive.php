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

        for($i = 1; $i <= self::QUEEN; $i++) {
            $this->hive[] = new Queen(); 
            $this->hive[0]->setName('Queen');
        }

        // generate Workers

        for($i = 1; $i <= self::WORKERS; $i++) {
            $this->hive[] = new Worker();
            $this->hive[$i]->setName('Worker ' . $i);
        }
        
        // generate Drones
        
        for($i = count($this->hive); $i < $this->totalBees; $i++) {
            $this->hive[] = new Drone();  
            $this->hive[$i]->setName('Drone ' . $i);
        }
    }

    private function getRandomBee() {


        $rand = mt_rand(0, $this->totalBees -1);
               
        if(isset($this->hive[$rand])){
            $bee = $this->hive[$rand];
            if($bee->isAlive()) {

                return $bee;
                
            } 
        }
        if($this->hive[0]->getHp() > 0) {
            return $this->getRandomBee();
        }
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

        foreach($this->hive as $bee){
          $type = get_class($bee);
          switch($type) {
              case get_class($bee) == Queen::class :
                
                
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
                  echo $workers;    
            
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

}
              
$s = new hive();

$s->hit();








echo "<pre>";
print_r($s);
echo "</pre>";






















