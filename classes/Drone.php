<?php

include_once  'Bee.php';

class Drone extends Bee {
    const MAXHP = 50;
    const HIT_DAMAGE = 12;

    public function __construct(){
        $this->setHp(self::MAXHP);
        
    }

    public function getDamage() {

        return self::HIT_DAMAGE;
    }

    public function takeHit() {

        if($this->isAlive() == true) {
            // echo strtoupper(get_class($this))  .  " has been damaged for " . self::HIT_DAMAGE . "! <br>";
        return $this->setHp($this->getHp() - self::HIT_DAMAGE);

        } else {
            // echo "One of your " . get_class($this) . " bees died! <br>" ;
            // echo get_class($this) . " left alive: <br>";
            

        }
    }

    
}
