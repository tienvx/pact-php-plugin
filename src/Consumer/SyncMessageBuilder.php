<?php

namespace Tienvx\PactPhpPlugin\Consumer;

use PhpPact\Consumer\AbstractMessageBuilder;
use PhpPact\Standalone\MockService\MockServerConfigInterface;
use Tienvx\PactPhpPlugin\Consumer\Driver\Interaction\SyncMessageDriverInterface;
use Tienvx\PactPhpPlugin\Consumer\Factory\SyncMessageDriverFactory;
use Tienvx\PactPhpPlugin\Consumer\Factory\SyncMessageDriverFactoryInterface;

class SyncMessageBuilder extends AbstractMessageBuilder
{
    private SyncMessageDriverInterface $driver;

    public function __construct(MockServerConfigInterface $config, ?SyncMessageDriverFactoryInterface $driverFactory = null)
    {
        parent::__construct();
        $this->driver = ($driverFactory ?? new SyncMessageDriverFactory())->create($config);
    }

    public function registerMessage(): void
    {
        $this->driver->registerMessage($this->message);
    }

    public function verify(): bool
    {
        return $this->driver->verifyMessage();
    }
}
