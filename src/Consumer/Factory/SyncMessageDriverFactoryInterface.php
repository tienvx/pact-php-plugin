<?php

namespace Tienvx\PactPhpPlugin\Consumer\Factory;

use PhpPact\Standalone\MockService\MockServerConfigInterface;
use Tienvx\PactPhpPlugin\Consumer\Driver\Interaction\SyncMessageDriverInterface;

interface SyncMessageDriverFactoryInterface
{
    public function create(MockServerConfigInterface $config): SyncMessageDriverInterface;
}
