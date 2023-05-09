<?php

namespace Tienvx\PactPhpPlugin\Consumer\Service;

use PhpPact\Consumer\Model\Message;

interface SyncMessageRegistryInterface
{
    public function verifyMessage(): bool;

    public function registerMessage(Message $message): void;
}
