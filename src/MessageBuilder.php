<?php

namespace Tienvx\PactPhpPlugin;

use PhpPact\Consumer\Driver\MessageDriverInterface;
use PhpPact\Consumer\Model\Message;
use PhpPact\Consumer\MessageBuilder as BaseMessageBuilder;

class MessageBuilder extends BaseMessageBuilder
{
    public function __construct(MessageDriverInterface $driver)
    {
        $this->message = new Message();
        $this->driver  = $driver;
    }
}
