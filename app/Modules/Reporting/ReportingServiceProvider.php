<?php

namespace App\Modules\Reporting;

use App\Modules\ModuleServiceProvider;

final class ReportingServiceProvider extends ModuleServiceProvider
{
    public function register(): void
    {
        // Binding interface/service Reporting
    }

    protected function moduleAlias(): string
    {
        return 'reporting';
    }
}