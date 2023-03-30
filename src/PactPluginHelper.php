<?php

namespace Tienvx\PactPhpPlugin;

class PactPluginHelper
{
    public static function setPluginDir(string $pluginDir): void
    {
        \putenv("PACT_PLUGIN_DIR={$pluginDir}");
    }
}
