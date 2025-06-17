<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Ensi\LaravelPrometheus\Prometheus;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void {
    Prometheus::counter(name: 'http_requests_count')->labels(labels: ['endpoint', 'code']);
    Prometheus::summary(name: 'http_requests_duration_seconds', maxAgeSeconds: 60, quantiles: [0.5, 0.95, 0.99]);
    }
}