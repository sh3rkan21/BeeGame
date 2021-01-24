<?php

include_once  'Bee.php';

class Drone extends Bee {
    
    const MAXHP = 50;
    const HIT_DAMAGE = 12;

    public function __construct() {

        $this->setHp(self::MAXHP);
        
    }

    public function getDamage() {

        return self::HIT_DAMAGE;
    }

    public function takeHit() {

        if($this->isAlive() == true) {
            
        return $this->setHp($this->getHp() - self::HIT_DAMAGE);  

        }
    }

    
}
