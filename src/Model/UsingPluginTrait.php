<?php

namespace Tienvx\PactPhpPlugin\Model;

use Tienvx\PactPhpPlugin\Exception\PluginNotSupportedBySpecificationException;

trait UsingPluginTrait
{
    public function usingPlugin(string $pluginName, ?string $pluginVersion = null): self
    {
        if ($this->getSpecification() < $this->ffi->PactSpecification_V4) {
            throw new PluginNotSupportedBySpecificationException($this->config->getPactSpecificationVersion());
        }

        $this->ffi->pactffi_using_plugin($this->id, $pluginName, $pluginVersion);

        return $this;
    }
}
