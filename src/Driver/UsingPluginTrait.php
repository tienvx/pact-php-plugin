<?php

namespace Tienvx\PactPhpPlugin\Driver;

use Tienvx\PactPhpPlugin\Exception\PluginNotSupportedBySpecificationException;
use Tienvx\PactPhpPlugin\Exception\InteractionContentNotAddedException;

trait UsingPluginTrait
{
    public function usingPlugin(): self
    {
        if ($this->getSpecification() < $this->ffi->PactSpecification_V4) {
            throw new PluginNotSupportedBySpecificationException($this->config->getPactSpecificationVersion());
        }

        $this->ffi->pactffi_using_plugin($this->pactId, $this->getPluginName(), $this->getPluginVersion());

        return $this;
    }

    protected function cleanUpPlugin(): void
    {
        $this->ffi->pactffi_cleanup_plugins($this->pactId);
    }

    abstract protected function getPluginName(): string;

    protected function getPluginVersion(): ?string
    {
        return null;
    }

    protected function withBody(int $interaction, int $part, ?string $contentType = null, ?string $body = null): void
    {
        if (is_null($body) || is_null($contentType)) {
            // Pact Plugin require content type to be set, or it will panic.
            return;
        }
        $error = $this->ffi->pactffi_interaction_contents($interaction, $part, $contentType, $body);
        if ($error) {
            throw new InteractionContentNotAddedException($error);
        }
    }
}
