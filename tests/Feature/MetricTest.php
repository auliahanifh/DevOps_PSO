<?php

namespace Tests\Feature;

use Tests\TestCase;

class MetricTest extends TestCase
{
    public function testMetricsRouteIsAccessible(): void
    {
        $response = $this->get('/metrics');
        $response->assertStatus(200);
        $this->assertStringContainsString('text/plain; version=0.0.4', (string) $response->headers->get('Content-Type')); 
        $this->assertStringContainsString('# HELP', (string) $response->getContent()); 
    }
}
