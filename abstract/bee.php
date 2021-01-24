<?php

abstract class bee {

    protected $hp;
    protected $name;

    public function getHp() {
        return $this->hp;
    }
    
    public function setHp($hp) {
        $this->hp = $hp;
    }


    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
    }

    abstract public function takeHit();

    public function isAlive() {

        if($this->getHp() > 0 ){
            return true;
        } else {
            return false;
        }
    }       
    
}

