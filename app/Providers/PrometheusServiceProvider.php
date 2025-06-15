<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Prometheus\CollectorRegistry;
use Prometheus\Storage\InMemory;
use Prometheus\Storage\Redis;
use Illuminate\Support\Facades\Config;

class PrometheusServiceProvider extends ServiceProvider
{
    /**
     * Register Prometheus services.
     *
     * @return void
     */
    public function register()
    {
        // Pilih storage adapter berdasarkan konfigurasi
        $this->app->singleton(CollectorRegistry::class, function ($app) {
            $driver = env('PROMETHEUS_DRIVER', 'inmemory');

            switch ($driver) {
                case 'redis':
                    $adapter = new Redis([
                        'host'   => env('PROMETHEUS_REDIS_HOST', '127.0.0.1'),
                        'port'   => env('PROMETHEUS_REDIS_PORT', 6379),
                        'timeout'=> env('PROMETHEUS_REDIS_TIMEOUT', 0.1),
                        'password' => env('PROMETHEUS_REDIS_PASSWORD', null),
                        'database' => env('PROMETHEUS_REDIS_DB', 0),
                    ]);
                    break;
                case 'inmemory':
                default:
                    $adapter = new InMemory();
            }

            return new CollectorRegistry($adapter);
        });
    }

    /**
     * Bootstrap Prometheus services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}