<?php

namespace Tienvx\PactPhpPlugin\Consumer\Factory;

use PhpPact\Consumer\Driver\Pact\PactDriver;
use PhpPact\Consumer\Registry\Pact\PactRegistry;
use PhpPact\Consumer\Service\MockServer;
use PhpPact\FFI\Client;
use PhpPact\Standalone\MockService\MockServerConfigInterface;
use Tienvx\PactPhpPlugin\Consumer\Driver\Interaction\SyncMessageDriver;
use Tienvx\PactPhpPlugin\Consumer\Driver\Interaction\SyncMessageDriverInterface;
use Tienvx\PactPhpPlugin\Consumer\Registry\Interaction\SyncMessageRegistry;

class SyncMessageDriverFactory implements SyncMessageDriverFactoryInterface
{
    public function create(MockServerConfigInterface $config): SyncMessageDriverInterface
    {
        $client = new Client();
        $pactRegistry = new PactRegistry($client);
        $pactDriver = new PactDriver($client, $config, $pactRegistry);
        $messageRegistry = new SyncMessageRegistry($client, $pactRegistry);
        $mockServer = new MockServer($client, $pactRegistry, $config);

        return new SyncMessageDriver($pactDriver, $messageRegistry, $mockServer);
    }
}
