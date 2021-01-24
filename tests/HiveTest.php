<?php
use PHPUnit\Framework\TestCase;


final class HiveTest extends TestCase
{
    public function testConstants()
    {
        $this->assertEquals(1, Hive::QUEEN);
        $this->assertEquals(5, Hive::WORKERS);
        $this->assertEquals(8, Hive::DRONES);
    }

    public function testbeesAlive() {
        $hive = new Hive();
        $totalBees = Hive::QUEEN + Hive::WORKERS + Hive::DRONES;

        $this->assertEquals($totalBees, $hive->beesAlive);

    }

}
