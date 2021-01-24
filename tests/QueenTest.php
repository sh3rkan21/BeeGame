<?php
use PHPUnit\Framework\TestCase;

final class QueenTest extends TestCase
{
    public function testConstants()
    {
        $this->assertEquals(100, Queen::MAXHP);
        $this->assertEquals(8, Queen::HIT_DAMAGE);
    }

    public function testCanSetName()
    {
        $bee = new Queen();
        $beeName = 'Queen bee';

        $this->assertNull($bee->getName());
        
        $bee->setName($beeName);
        $this->assertEquals($beeName, $bee->getName());
    }

    public function testHpSetCorrectlyInConstructor()
    {
        $bee = new Queen();

        $this->assertEquals(Queen::MAXHP, $bee->getHP());
    }

    public function testIsAlive()
    {
        $bee = new Queen();

        $this->assertTrue($bee->isAlive());
        // force dead
        $bee->setHp(0);
        $this->assertFalse($bee->isAlive());
    }

    public function testTakeHit()
    {
        $bee = new Queen();

        $initalHP = $bee->getHp();
        $bee->takeHit();
        $finalHP = $bee->getHp();

        $hitDamage = $initalHP - $finalHP;

        $this->assertEquals(Queen::HIT_DAMAGE, $hitDamage);
    }
}
