<?php

namespace Tienvx\PactPhpPlugin\Model;

trait CleanupPluginTrait
{
    protected function cleanUp(): void
    {
        $this->ffi->pactffi_cleanup_plugins($this->id);
        parent::cleanUp();
    }
}
