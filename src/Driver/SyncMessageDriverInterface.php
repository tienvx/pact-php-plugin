<?php

namespace Tienvx\PactPhpPlugin\Driver;

use PhpPact\Consumer\Driver\DriverInterface;
use PhpPact\Consumer\Model\Message;

interface SyncMessageDriverInterface extends DriverInterface
{
    public function verifyMessage(): bool;

    public function registerMessage(Message $message): void;
}
