<?php
declare(strict_types=1);

namespace Tests\Fixture;

use Common\Communique\Communique;
use Common\Communique\Reply;
use Common\Communique\ServiceHandlerInterface;

class TestHandlerService implements ServiceHandlerInterface
{
    public function handle(Communique $communique): Reply
    {
       return new Reply();
    }
}
