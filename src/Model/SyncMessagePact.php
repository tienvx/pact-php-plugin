<?php

namespace Tienvx\PactPhpPlugin\Model;

class SyncMessagePact extends PactPlugin
{
    protected function newInteraction($description): int
    {
        return $this->ffi->pactffi_new_sync_message_interaction($this->id, $description);
    }
}
