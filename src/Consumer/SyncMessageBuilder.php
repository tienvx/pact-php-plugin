<?php

namespace Tienvx\PactPhpPlugin\Consumer;

use PhpPact\Consumer\AbstractMessageBuilder;
use Tienvx\PactPhpPlugin\Consumer\Driver\Interaction\SyncMessageDriverInterface;

class SyncMessageBuilder extends AbstractMessageBuilder
{
    public function __construct(private SyncMessageDriverInterface $driver)
    {
        parent::__construct();
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
