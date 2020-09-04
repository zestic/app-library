<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I
use Phinx\Console\PhinxApplication;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\Dotenv\Dotenv;

class Functional extends \Codeception\Module
{
    public function _before($settings = [])
    {
        (new Dotenv())
            ->usePutenv()
            ->load(__DIR__ . '/../../../.env.test');

        $app = new PhinxApplication();
        $app->setAutoExit(false);
        $app->run(new StringInput('rollback -e testing -t 0'), new NullOutput());
        $app->run(new StringInput('migrate -e testing'), new NullOutput());
    }
}
