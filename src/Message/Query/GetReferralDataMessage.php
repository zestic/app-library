<?php
declare(strict_types=1);

namespace App\Domain\Message\Query;

use IamPersistent\GraphQL\GraphQLMessage;

final class GetReferralDataMessage extends GraphQLMessage
{
    private string $referralCode;

    public function getReferralCode(): string
    {
        return $this->referralCode;
    }

    public function setReferralCode(string $referralCode): GetReferralDataMessage
    {
        $this->referralCode = $referralCode;

        return $this;
    }
}
