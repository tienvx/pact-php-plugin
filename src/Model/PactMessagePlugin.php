<?php

namespace Tienvx\PactPhpPlugin\Model;

use PhpPact\Standalone\PactMessage\PactMessage;

class PactMessagePlugin extends PactMessage
{
    use UsingPluginTrait;
    use CleanupPluginTrait;
    use WithBodyTrait;
}
