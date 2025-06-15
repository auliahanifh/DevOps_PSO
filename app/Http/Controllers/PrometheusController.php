<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Prometheus\RenderTextFormat;
use Prometheus\CollectorRegistry;

class PrometheusController extends Controller
{
        public function metrics(CollectorRegistry $registry): Response
    {
        $renderer = new RenderTextFormat();
        $metrics = $registry->getMetricFamilySamples();

        return response(
            $renderer->render($metrics),
            200,
            ['Content-Type' => RenderTextFormat::MIME_TYPE]
        );
    }
}
