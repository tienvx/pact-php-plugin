<?php

namespace Tienvx\PactPhpPlugin\Model;

use Tienvx\PactPhpPlugin\Exception\InteractionContentNotAddedException;

trait WithBodyTrait
{
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
