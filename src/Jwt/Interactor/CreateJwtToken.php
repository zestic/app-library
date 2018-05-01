<?php
declare(strict_types=1);

namespace App\Jwt\Interactor;

use App\Jwt\JwtConfiguration;
use App\Jwt\TokenDataGeneratorInterface;
use Carbon\Carbon;
use Common\Entity\UserInterface;
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
