<?php
declare(strict_types=1);

namespace App\Domain\Handler\Query;

use App\Domain\Handler\Authorize\HasMatchingPersonIdTrait;
use App\Domain\Message\Query\GetAppStateMessage;
use Zapi\View\GetAppState;

final class GetAppStateHandler
{
    use HasMatchingPersonIdTrait;

    public function __construct(
        private GetAppState $getAppState,
    ) {}

    public function __invoke(GetAppStateMessage $message)
    {
        if (!$this->isAuthorized($message)) {
            $message->setErrorResponse("You do not have permission to do that");

            return;
        }

        $this->getAppState->buildResponse($message);
    }
}
