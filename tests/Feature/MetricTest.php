<?php

namespace Tests\Feature;

use Tests\TestCase;

class MetricTest extends TestCase
{
    public function testMetricsRouteIsAccessible()
    {
        $response = $this->get('/metrics');
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/plain; version=0.0.4'); 
        $this->assertStringContainsString('# HELP', $response->getContent()); 
    }
}
