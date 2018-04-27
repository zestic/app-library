<?php
declare(strict_types=1);

namespace Common\Jwt\Interactor;

use Carbon\Carbon;
use Common\Entity\UserInterface;
use Common\Jwt\JwtConfiguration;
use Common\Jwt\TokenDataGeneratorInterface;
use Firebase\JWT\JWT;

class CreateJwtToken
{
    /** @var array */
    private $config;
    private $tokenDataGenerator;

    public function __construct(JwtConfiguration $config, TokenDataGeneratorInterface $tokenDataGenerator)
    {
        $this->tokenDataGenerator = $tokenDataGenerator;
        $this->config = $config;
    }

    public function handle(UserInterface $user): string
    {
        $tokenData = $this->tokenDataGenerator->generate($user);
        $data = $tokenData->getData();
        $data['exp'] = Carbon::now()->addSecond($this->config->getTokenTtl())->getTimestamp();

        $jwt = JWT::encode($data, $this->config->getPrivateKey(), $this->config->getAlgorithm());

        return $jwt;
    }
}
