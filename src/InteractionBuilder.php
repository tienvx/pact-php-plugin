<?php

namespace Tienvx\PactPhpPlugin;

use PhpPact\Consumer\Driver\InteractionDriverInterface;
use PhpPact\Consumer\Model\Interaction;
use PhpPact\Consumer\InteractionBuilder as BaseInteractionBuilder;

class InteractionBuilder extends BaseInteractionBuilder
{
    public function __construct(InteractionDriverInterface $driver)
    {
        $this->interaction = new Interaction();
        $this->driver      = $driver;
    }
}
