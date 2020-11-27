<?php
declare(strict_types=1);

namespace App\Domain\Handler\Query;

use App\Domain\Message\Query\IsUsernameAvailableMessage;
use App\Interactor\DoesUserExist;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class IsUsernameAvailableHandler implements MessageHandlerInterface
{
    /** @var \App\Interactor\DoesUserExist */
    private $doesUserExist;

    public function __construct(DoesUserExist $doesUserExist)
    {
        $this->doesUserExist = $doesUserExist;
    }

    public function __invoke(IsUsernameAvailableMessage $message)
    {
        $data = [
            'isAvailable' => $this->doesUserExist->isUsernameAvailable($message->getUsername()),
        ];

        $message->setResponse($data);
    }
}
