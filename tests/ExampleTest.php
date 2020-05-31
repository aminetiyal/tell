<?php

namespace Aminetiyal\Tell\Tests;

use Orchestra\Testbench\TestCase;
use Aminetiyal\Tell\TellServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [TellServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
