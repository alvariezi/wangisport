<?php

namespace App\Modules\Catalog;

use App\Modules\ModuleServiceProvider;

final class CatalogServiceProvider extends ModuleServiceProvider
{
    public function register(): void
    {
        // Binding interface/service Catalog
    }

    protected function moduleAlias(): string
    {
        return 'catalog';
    }
}