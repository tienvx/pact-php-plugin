<?php

namespace Tienvx\PactPhpPlugin\Consumer\Driver\Interaction\Contents;

use PhpPact\Consumer\Driver\Interaction\Contents\AbstractBodyDriver;
use Tienvx\PactPhpPlugin\Consumer\Exception\InteractionContentNotAddedException;

abstract class AbstractContentsDriver extends AbstractBodyDriver
{
    public function withContents(?string $contentType = null, ?string $contents = null): void
    {
        if (is_null($contents) || is_null($contentType)) {
            // Pact Plugin require content type to be set, or it will panic.
            return;
        }
        $error = $this->client->call('pactffi_interaction_contents', $this->interactionDriver->getId(), $this->getPart(), $contentType, $contents);
        if ($error) {
            throw new InteractionContentNotAddedException($error);
        }
    }
}
