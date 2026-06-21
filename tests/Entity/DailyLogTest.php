<?php

namespace App\Tests\Entity;

use App\Entity\DailyLog;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class DailyLogTest extends TestCase
{
    public function testDailyLogSettersAndGetters(): void
    {
        $log = new DailyLog();
        $date = new \DateTime();

        $log->setSleepDuration(7.5);
        $log->setSleepQuality(4);
        $log->setMentalNote('Repas équilibré');
        $log->setDate($date);

        $this->assertSame(7.5, $log->getSleepDuration());
        $this->assertSame(4, $log->getSleepQuality());
        $this->assertSame('Repas équilibré', $log->getMentalNote());
        $this->assertSame($date, $log->getDate());
    }

    public function testDailyLogLinkWithUser(): void
    {
        $log = new DailyLog();
        $user = new User();

        $log->setUser($user);

        $this->assertSame($user, $log->getUser());
    }
}
