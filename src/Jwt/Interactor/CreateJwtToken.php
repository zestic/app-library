<?php
declare(strict_types=1);

namespace App\Jwt\Interactor;

use App\Entity\Interfaces\UserInterface;
use App\Jwt\JwtConfiguration;
use App\Jwt\TokenDataGeneratorInterface;
use Carbon\Carbon;
use Firebase\JWT\JWT;

class CreateJwtToken
{
    /** @var \App\Jwt\JwtConfiguration */
    private $config;
    /** @var \App\Jwt\TokenDataGeneratorInterface */
    private $tokenDataGenerator;

    public function __construct(JwtConfiguration $config, TokenDataGeneratorInterface $tokenDataGenerator)
    {
        $this->config = $config;
        $this->tokenDataGenerator = $tokenDataGenerator;
    }

    public function handle(UserInterface $user): array
    {
        $tokenData = $this->tokenDataGenerator->generate($user);
        $data = $tokenData->getData();
        $expires = Carbon::now()->addSecond($this->config->getTokenTtl())->getTimestamp();
        $data['exp'] = $expires;

        return [
            JWT::encode($data, $this->config->getPrivateKey(), $this->config->getAlgorithm()),
            $expires,
        ];}
}
