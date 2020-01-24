<?php

declare(strict_types=1);

namespace Example\Tongs\Tests;

use Datashaman\Tongs\Tongs;
use Example\Tongs\ExamplePlugin;

class ExamplePluginTest extends TestCase
{
    public function testHandle()
    {
        $tongs = new Tongs($this->fixture('example-scenario'));
        $tongs->use(new ExamplePlugin($tongs));
        $tongs->build();
        $this->assertDirEquals($this->fixture('example-scenario/expected'), $this->fixture('example-scenario/build'));
    }
}
