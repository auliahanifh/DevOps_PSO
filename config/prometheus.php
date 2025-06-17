<?php

return [
    'default_bag' => 'default',
    'enabled' => env('PROMETHEUS_ENABLED', false),
    'app_name' => env('PROMETHEUS_APP_NAME', env('APP_NAME')),
    'bags' => [
        'default' => [
            'namespace' => env('PROMETHEUS_NAMESPACE', 'app'),
            'route' => 'metrics',
            'basic_auth' => [
                'login' => env('PROMETHEUS_AUTH_LOGIN'),
                'password' => env('PROMETHEUS_AUTH_PASSWORD'),
            ],
            // setup your storage
//            'connection' => [
//                'connection' => 'default',
//                'bag' => 'default',
//            ],
//            or
//            'apcu-ng' => [
//                'prefix' => 'metrics'
//            ],
//            or
            'apcu' => [
                'prefix' => 'metrics'
            ],
            'label_middlewares' => [
                \Ensi\LaravelPrometheus\LabelMiddlewares\AppNameLabelMiddleware::class,
            ],
            'on_demand_metrics' => [
                \Ensi\LaravelPrometheus\OnDemandMetrics\MemoryUsageOnDemandMetric::class,
            ],
            'metrics' => [
                [
                    'type' => 'counter',
                    'name' => 'http_requests_count',
                    'help' => 'Total HTTP requests',
                    'labels' => ['endpoint', 'code'],
                ],
                [
                    'type' => 'summary',
                    'name' => 'http_requests_duration_seconds',
                    'help' => 'HTTP request duration in seconds',
                    'max_age_seconds' => 60,
                    'quantiles' => [0.5, 0.95, 0.99],
                ],
            ],
        ],
    ],
];
