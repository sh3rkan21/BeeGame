<?php
include_once 'Bee.php';

class Queen extends Bee {

    const MAXHP = 100;
    const HIT_DAMAGE = 8;

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








