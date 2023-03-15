<?php

namespace Tienvx\PactPhpPlugin\Model;

use PhpPact\Consumer\Model\Pact;

class PactPlugin extends Pact
{
    use UsingPluginTrait;
    use CleanupPluginTrait;
    use WithBodyTrait;
}
