<?php

namespace Tienvx\PactPhpPlugin;

use PhpPact\Consumer\Driver\InteractionDriver;
use PhpPact\Consumer\Driver\InteractionDriverInterface;
use PhpPact\Consumer\Model\Interaction;
use PhpPact\Consumer\InteractionBuilder as BaseInteractionBuilder;
use PhpPact\Standalone\MockService\MockServerEnvConfig;

class InteractionBuilder extends BaseInteractionBuilder
{
    public function __construct(?InteractionDriverInterface $driver = null)
    {
        $this->interaction = new Interaction();
        $this->driver      = $driver ?? new InteractionDriver(new MockServerEnvConfig());
    }
}
