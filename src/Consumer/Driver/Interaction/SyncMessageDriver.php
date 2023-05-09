<?php

namespace Tienvx\PactPhpPlugin\Consumer\Driver\Interaction;

use PhpPact\Consumer\Driver\Interaction\MessageDriver;

class SyncMessageDriver extends MessageDriver
{
    public function newInteraction(string $description): static
    {
        $this->id = $this->client->call('pactffi_new_sync_message_interaction', $this->pactDriver->getId(), $description);

        return $this;
    }
}
