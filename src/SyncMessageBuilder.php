<?php

namespace Tienvx\PactPhpPlugin;

use PhpPact\Consumer\BuilderInterface;
use PhpPact\Consumer\Model\Message;
use Tienvx\PactPhpPlugin\Driver\SyncMessageDriverInterface;

class SyncMessageBuilder implements BuilderInterface
{
    protected Message $message;

    public function __construct(protected SyncMessageDriverInterface $driver)
    {
        $this->message = new Message();
    }

    public function given(string $name, array $params = [], $overwrite = false): self
    {
        $this->message->setProviderState($name, $params, $overwrite);

        return $this;
    }

    public function expectsToReceive(string $description): self
    {
        $this->message->setDescription($description);

        return $this;
    }

    public function withMetadata(array $metadata): self
    {
        $this->message->setMetadata($metadata);

        return $this;
    }

    public function withContent(mixed $contents): self
    {
        $this->message->setContents($contents);

        return $this;
    }

    public function withContentType(?string $contentType): self
    {
        $this->message->setContentType($contentType);

        return $this;
    }

    public function registerMessage(): void
    {
        $this->driver->registerMessage($this->message);
    }

    public function verify(): bool
    {
        return $this->driver->verifyMessage();
    }
}
