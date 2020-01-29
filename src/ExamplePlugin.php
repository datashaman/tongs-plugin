<?php

namespace Example\Tongs;

use Datashaman\Tongs\Plugins\Plugin;
use Datashaman\Tongs\Tongs;

class ExamplePlugin extends Plugin
{
    /**
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $options = $this->normalize($options);

        parent::__construct($options);
    }

    /**
     * Handle files passed down the pipeline, and call the next plugin in the pipeline.
     *
     * @param array $files
     * @param callable $next
     *
     * @return array
     */
    public function handle(array $files, callable $next): array
    {
        $ret = [];

        foreach ($files as $path => $file) {
            $ret[$path] = $this->transform($file, $path);
        }

        return $next($ret);
    }

    /**
     * Normalize options to a consistent internal form, converting
     * strings to arrays or whatever else is needed.
     *
     * @param array $options
     *
     * @return array
     */
    protected function normalize(array $options): array
    {
        return $options;
    }

    /**
     * Transform an individual file's metadata.
     *
     * @param array $file
     * @param string $path
     *
     * @return array
     */
    protected function transform(array $file, string $path): array
    {
        $file['contents'] = $file['title'];

        return $file;
    }
}
