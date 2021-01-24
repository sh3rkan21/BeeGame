<?php
use PHPUnit\Framework\TestCase;

final class DroneTest extends TestCase
{
    public function testConstants()
    {
        $this->assertEquals(50, Drone::MAXHP);
        $this->assertEquals(12, Drone::HIT_DAMAGE);
    }

    public function testCanSetName()
    {
        $bee = new Drone();
        $beeName = 'Drone bee';

        $this->assertNull($bee->getName());
        
        $bee->setName($beeName);
        $this->assertEquals($beeName, $bee->getName());
    }

    public function testHpSetCorrectlyInConstructor()
    {
        $bee = new Drone();

        $this->assertEquals(Drone::MAXHP, $bee->getHP());
    }

    public function testIsAlive()
    {
        $bee = new Drone();

        $this->assertTrue($bee->isAlive());
        // force dead
        $bee->setHp(0);
        $this->assertFalse($bee->isAlive());
    }

    public function testTakeHit()
    {
        $bee = new Drone();

        $initalHP = $bee->getHp();
        $bee->takeHit();
        $finalHP = $bee->getHp();

        $hitDamage = $initalHP - $finalHP;

        $this->assertEquals(Drone::HIT_DAMAGE, $hitDamage);
    }
}
