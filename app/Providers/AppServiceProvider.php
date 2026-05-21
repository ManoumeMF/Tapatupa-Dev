<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Spatie\LaravelPdf\Facades\Pdf;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');

        Blade::directive('currency', function ($expression) {
            return "Rp. <?php echo number_format($expression,0,',','.'); ?>";
        });

        Blade::directive('Terbilang', function ($angka) {
            return "<?php echo App\Helpers\TerbilangAngka::Terbilang( $angka ); ?>";
        });

        // Nonaktifkan SSL verification di environment lokal/testing
        // (Windows tidak memiliki CA bundle yang lengkap)
        if (app()->environment('local', 'testing')) {
            Http::globalOptions([
                'verify' => false,
            ]);
        }
    }
}
