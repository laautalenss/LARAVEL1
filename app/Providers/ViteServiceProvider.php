<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class ViteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::directive('vite', function () {
            return '<?php echo \'<script src="https://cdn.tailwindcss.com"></script>\'; ?>';
        });
    }
}
