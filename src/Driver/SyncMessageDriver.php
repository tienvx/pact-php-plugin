<?php

namespace Tienvx\PactPhpPlugin\Driver;

use PhpPact\Consumer\Driver\MessageDriver;

class SyncMessageDriver extends MessageDriver
{
    protected function newInteraction(string $description): self
    {
        $this->interactionId = $this->ffi->pactffi_new_sync_message_interaction($this->pactId, $description);

        return $this;
    }
}
