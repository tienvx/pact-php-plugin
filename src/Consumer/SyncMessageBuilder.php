<?php

namespace Tienvx\PactPhpPlugin\Consumer;

use PhpPact\Consumer\BuilderInterface;
use PhpPact\Consumer\Model\Message;
use Tienvx\PactPhpPlugin\Consumer\Service\SyncMessageRegistryInterface;

class SyncMessageBuilder implements BuilderInterface
{
    private Message $message;

    public function __construct(private SyncMessageRegistryInterface $registry)
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
        $this->registry->registerMessage($this->message);
    }

    public function verify(): bool
    {
        return $this->registry->verifyMessage();
    }
}
