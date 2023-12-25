<?php


namespace App\Routing\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class AuthAttribute
{
    public function __construct(private bool $requireLogin = true)
    {
    }

    public function requiresLogin(): bool
    {
        return $this->requireLogin;
    }
}
