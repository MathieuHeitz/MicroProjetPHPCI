<?php

namespace App;

use PHPUnit\Framework\TestCase;
use App\models\User;
use App\UserManager;
use App\NotifierInterface;

class UserManagerTest extends TestCase
{
    public function testSuspendUserSendsNotification()
    {
        $user = new User();
        $suspendUser = $this->createMock(NotifierInterface::class);

        $expectedMessage = "Your account has been suspended.";

        $suspendUser->expects($this->once())
            ->method('notify')
            ->with(
                $this->identicalTo($user),
                $this->equalTo($expectedMessage)
            );

        $manager = new UserManager($suspendUser);

        $manager->suspendUser($user);

        $this->assertTrue($user->isSuspended());
    }

}
