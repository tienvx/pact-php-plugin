<?php

namespace Tienvx\PactPhpPlugin\Consumer\Driver\Pact;

use PhpPact\Consumer\Driver\Pact\PactDriver;
use Tienvx\PactPhpPlugin\Consumer\Exception\PluginNotSupportedBySpecificationException;

abstract class AbstractPluginPactDriver extends PactDriver
{
    public function cleanUp(): void
    {
        $this->client->call('pactffi_cleanup_plugins', $this->id);
        parent::cleanUp();
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this
            ->setPluginDir()
            ->usingPlugin();
    }

    abstract protected function getPluginName(): string;

    protected function getPluginVersion(): ?string
    {
        return null;
    }

    abstract protected function getPluginDir(): string;

    private function usingPlugin(): self
    {
        if ($this->getSpecification() < $this->client->get('PactSpecification_V4')) {
            throw new PluginNotSupportedBySpecificationException($this->config->getPactSpecificationVersion());
        }

        $this->client->call('pactffi_using_plugin', $this->id, $this->getPluginName(), $this->getPluginVersion());

        return $this;
    }

    private function setPluginDir(): self
    {
        \putenv("PACT_PLUGIN_DIR={$this->getPluginDir()}");

        return $this;
    }
}
