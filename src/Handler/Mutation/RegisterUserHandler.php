<?php
declare(strict_types=1);

namespace App\Domain\Handler\Mutation;

use App\Domain\Interactor\FormatAuthenticatedUserResponse;
use App\Domain\Message\Mutation\RegisterUserMessage;
use App\Entity\User;
use App\Interactor\FindPersonByIdInterface;
use App\Interactor\RegisterUser;
use App\Jwt\Interactor\CreateJwtToken;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class RegisterUserHandler implements MessageHandlerInterface
{
    /** @var \App\Jwt\Interactor\CreateJwtToken */
    private $createJwtToken;
    /** @var \App\Interactor\FindPersonByIdInterface */
    private $findPersonById;
    /** @var \App\Domain\Interactor\FormatAuthenticatedUserResponse */
    private $formatResponse;
    /** @var \App\Interactor\RegisterUser */
    private $registerUser;

    public function __construct(
        CreateJwtToken $createJwtToken,
        FindPersonByIdInterface $findPersonById,
        FormatAuthenticatedUserResponse $formatResponse,
        RegisterUser $registerUser
    ) {
        $this->createJwtToken = $createJwtToken;
        $this->findPersonById = $findPersonById;
        $this->formatResponse = $formatResponse;
        $this->registerUser = $registerUser;
    }

    public function __invoke(RegisterUserMessage $message)
    {
        $results = $this->registerUser->register($message);

        $personId = (string) $results['person']->getId();

        $details = [
            'personId' => $personId,
        ];
        $user = (new User($message->getUsername(), [], $details));
        $jwt = $this->createJwtToken->handle($user);

        $authenticated = [
            'jwt'    => $jwt,
            'person' => $this->findPersonById->find($personId),
        ];

        $response = $this->formatResponse->format($authenticated);
        $message->setResponse($response);
    }
}
