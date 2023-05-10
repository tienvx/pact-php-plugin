<?php

namespace Tienvx\PactPhpPlugin\Consumer\Registry\Interaction;

use PhpPact\Consumer\Registry\Interaction\MessageRegistry;

class SyncMessageRegistry extends MessageRegistry
{
    public function newInteraction(string $description): static
    {
        $this->id = $this->client->call('pactffi_new_sync_message_interaction', $this->pactRegistry->getId(), $description);

        return $this;
    }
}
