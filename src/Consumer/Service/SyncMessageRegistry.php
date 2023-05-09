<?php

namespace Tienvx\PactPhpPlugin\Consumer\Service;

use PhpPact\Consumer\Driver\Interaction\MessageDriverInterface;
use PhpPact\Consumer\Model\Message;
use PhpPact\Consumer\Service\MockServerInterface;

class SyncMessageRegistry implements SyncMessageRegistryInterface
{
    public function __construct(
        private MessageDriverInterface $messageDriver,
        private MockServerInterface $mockServer
    ) {
    }

    public function verifyMessage(): bool
    {
        $matched = $this->mockServer->isMatched();

        try {
            if ($matched) {
                $this->mockServer->writePact();
            }
        } finally {
            $this->mockServer->cleanUp();
        }

        return $matched;
    }

    public function registerMessage(Message $message): void
    {
        $this->messageDriver
            ->newInteraction($message->getDescription())
            ->given($message->getProviderStates())
            ->expectsToReceive($message->getDescription())
            ->withMetadata($message->getMetadata())
            ->withContents($message->getContentType(), $message->getContents());

        $this->mockServer->start();
    }
}
