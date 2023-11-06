<?php

declare(strict_types=1);

namespace App\Traits;

trait AutoLoginLinkTrait
{
    public function getAutoLoginLink(): string
    {
        return str_replace('://', '://'.config('app.autoLoginCredentials').'@', route($this->getRouteName(), $this->id));
    }

    abstract protected function getRouteName(): string;
}
