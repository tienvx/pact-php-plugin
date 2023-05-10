<?php

namespace Tienvx\PactPhpPlugin\Consumer\Driver\Interaction;

use PhpPact\Consumer\Model\Message;

interface SyncMessageDriverInterface
{
    public function verifyMessage(): bool;

    public function registerMessage(Message $message): void;
}
