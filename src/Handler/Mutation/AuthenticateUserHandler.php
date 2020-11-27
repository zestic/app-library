<?php
declare(strict_types=1);

namespace App\Domain\Handler\Mutation;

use App\Authenticate\AuthenticateUsernamePassword;
use App\Domain\Interactor\FormatAuthenticatedUserResponse;
use App\Domain\Message\Mutation\AuthenticateUserMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class AuthenticateUserHandler implements MessageHandlerInterface
{
    /** @var \App\Authenticate\AuthenticateUsernamePassword */
    private $authenticateUser;
    /** @var \App\Domain\Interactor\FormatAuthenticatedUserResponse */
    private $formatResponse;

    public function __construct(
        AuthenticateUsernamePassword $authenticateUser,
        FormatAuthenticatedUserResponse $formatResponse
    ) {
        $this->authenticateUser = $authenticateUser;
        $this->formatResponse = $formatResponse;
    }

    public function __invoke(AuthenticateUserMessage $message)
    {
        $authenticated = $this->authenticateUser->authenticate($message->getUsername(), $message->getPassword());

        if ($authenticated['success']) {
            $response = $this->formatResponse->format($authenticated);
            $message->setResponse($response);
        }
    }
}
