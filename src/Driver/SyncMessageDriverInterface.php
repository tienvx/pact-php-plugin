<?php

namespace Tienvx\PactPhpPlugin\Driver;

use PhpPact\Consumer\Driver\DriverInterface;

interface SyncMessageDriverInterface extends DriverInterface
{
    public function verifyMessage(): bool;

    public function startMockServer(): void;
}
