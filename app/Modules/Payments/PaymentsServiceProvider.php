<?php

namespace App\Modules\Payments;

use App\Modules\ModuleServiceProvider;

final class PaymentsServiceProvider extends ModuleServiceProvider
{
    public function register(): void
    {
        // Binding interface/service Payments
    }

    protected function moduleAlias(): string
    {
        return 'payments';
    }
}