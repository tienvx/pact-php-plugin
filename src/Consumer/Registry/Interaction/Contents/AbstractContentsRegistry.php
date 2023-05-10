<?php

namespace Tienvx\PactPhpPlugin\Consumer\Registry\Interaction\Contents;

use PhpPact\Consumer\Registry\Interaction\Contents\ContentsRegistryInterface;
use PhpPact\FFI\ClientInterface;
use Tienvx\PactPhpPlugin\Consumer\Exception\InteractionContentNotAddedException;

abstract class AbstractContentsRegistry implements ContentsRegistryInterface
{
    public function __construct(protected ClientInterface $client)
    {
    }

    public function withContents(?string $contentType = null, ?string $contents = null): void
    {
        if (is_null($contents) || is_null($contentType)) {
            // Pact Plugin require content type to be set, or it will panic.
            return;
        }
        $error = $this->client->call('pactffi_interaction_contents', $this->getInteractionId(), $this->getPart(), $contentType, $contents);
        if ($error) {
            throw new InteractionContentNotAddedException($error);
        }
    }

    abstract protected function getInteractionId(): int;

    abstract protected function getPart(): int;
}
