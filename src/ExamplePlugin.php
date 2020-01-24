<?php

namespace Example\Tongs;

use Datashaman\Tongs\Plugins\Plugin;
use Datashaman\Tongs\Tongs;
use Illuminate\Support\Collection;

class ExamplePlugin extends Plugin
{
    public function __construct(Tongs $tongs, array $options = [])
    {
        parent::__construct($tongs, $options);
    }

    public function handle(Collection $files, callable $next): Collection
    {
        $files = $files
            ->map(
                function ($file, $path) {
                    $file['contents'] = $file['title'];

                    return $file;
                }
            );

        return $next($files);
    }
}
