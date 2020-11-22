<?php

namespace Epmnzava\Pesapal\Tests;

use Orchestra\Testbench\TestCase;
use Epmnzava\Pesapal\PesapalServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [PesapalServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
