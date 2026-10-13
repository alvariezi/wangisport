<?php

namespace App\Modules\Operations;

use App\Modules\ModuleServiceProvider;

final class OperationsServiceProvider extends ModuleServiceProvider
{
    public function register(): void
    {
        // Binding interface/service Operations
    }

    protected function moduleAlias(): string
    {
        return 'operations';
    }
}