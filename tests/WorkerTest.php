<?php
use PHPUnit\Framework\TestCase;

final class WorkerTest extends TestCase
{
    public function testConstants()
    {
        $this->assertEquals(75, Worker::MAXHP);
        $this->assertEquals(10, Worker::HIT_DAMAGE);
    }

    public function testCanSetName()
    {
        $bee = new Worker();
        $beeName = 'Worker bee';

        $this->assertNull($bee->getName());
        
        $bee->setName($beeName);
        $this->assertEquals($beeName, $bee->getName());
    }

    public function testHpSetCorrectlyInConstructor()
    {
        $bee = new Worker();

        $this->assertEquals(Worker::MAXHP, $bee->getHP());
    }

    public function testIsAlive()
    {
        $bee = new Worker();

        $this->assertTrue($bee->isAlive());
        // force dead
        $bee->setHp(0);
        $this->assertFalse($bee->isAlive());
    }

    public function testTakeHit()
    {
        $bee = new Worker();

        $initalHP = $bee->getHp();
        $bee->takeHit();
        $finalHP = $bee->getHp();

        $hitDamage = $initalHP - $finalHP;

        $this->assertEquals(Worker::HIT_DAMAGE, $hitDamage);
    }
}
