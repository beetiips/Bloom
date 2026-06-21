<?php

namespace App\Tests\Entity;

use App\Entity\User;
use PHPUnit\Framework\TestCase;
use App\Entity\WorkoutRoutine;

class UserTest extends TestCase
{
    public function testOnboardingStatus(): void
    {
        $user = new User();

        $this->assertFalse($user->hasCompletedOnboarding());
    }

    public function testOnboardingChangesStatus(): void
    {
        $user = new User();
        $user->setHasCompletedOnboarding(true);

        $this->assertTrue($user->hasCompletedOnboarding());
    }

    public function testUserHasAtLeastRoleUser(): void
    {
        $user = new User();

        $this->assertContains('ROLE_USER', $user->getRoles());
    }

    public function testUserRolesAreUnique(): void
    {
        $user = new User();

        $user->setRoles(['ROLE_USER', 'ROLE_ADMIN']);
        $this->assertCount(2, $user->getRoles());
    }

    public function testAddWorkoutRoutineLinksUser(): void
    {
        $user = new User();

        $fakeRoutine = $this->createMock(WorkoutRoutine::class);

        $fakeRoutine->expects($this->once())
            ->method('setUser')
            ->with($user);

        $user->addWorkoutRoutine($fakeRoutine);

        $this->assertContains($fakeRoutine, $user->getWorkoutRoutines());
    }
}
