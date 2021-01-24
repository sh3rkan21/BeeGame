<?php

include_once 'Bee.php';

class Worker extends Bee {
    
    const MAXHP = 75;
    const HIT_DAMAGE = 10;
    

    public function getDamage() {
        
        return self::HIT_DAMAGE;
    }

    public function __construct() {

        $this->setHp(self::MAXHP);   
    }
    

    public function takeHit() {

        if($this->isAlive() == true) {

        return $this->setHp($this->getHp() - self::HIT_DAMAGE); 
    }     
 }

}
