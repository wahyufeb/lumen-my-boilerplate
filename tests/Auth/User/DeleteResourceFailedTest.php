<?php
/**
 * Created by PhpStorm.
 * User: Lloric Mayuga Garcia <lloricode@gmail.com>
 * Date: 12/25/18
 * Time: 12:17 PM
 */

namespace Test\Auth\User;

use Database\Factories\Auth\User\UserFactory;
use Test\TestCase;

class DeleteResourceFailedTest extends TestCase
{
    /** @test */
    public function purge_none_deleted_user_will_give_404()
    {
        $this->loggedInAs();

        $user = UserFactory::new()->create();

        $this->delete(route('backend.users.purge', ['id' => self::forId($user)]), [], $this->addHeaders());
        $this->assertResponseStatus(404);
    }

    /** @test */
    public function restore_none_deleted_user_will_give_404()
    {
        $this->loggedInAs();

        $user = UserFactory::new()->create();

        $this->put(route('backend.users.restore', ['id' => self::forId($user)]), [], $this->addHeaders());
        $this->assertResponseStatus(404);
    }
}