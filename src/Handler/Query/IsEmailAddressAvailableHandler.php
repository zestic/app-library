<?php
declare(strict_types=1);

namespace App\Domain\Handler\Query;

use App\Domain\Message\Query\IsEmailAddressAvailableMessage;
use App\Interactor\DoesUserExist;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class IsEmailAddressAvailableHandler implements MessageHandlerInterface
{
    /** @var \App\Interactor\DoesUserExist */
    private $doesUserExist;

    public function __construct(DoesUserExist $doesUserExist)
    {
        $this->doesUserExist = $doesUserExist;
    }

    public function __invoke(IsEmailAddressAvailableMessage $message)
    {
        $data = [
            'isAvailable' => $this->doesUserExist->isEmailAvailable($message->getEmail()),
        ];

        $message->setResponse($data);
    }
}
