<?php declare(strict_types=1);

namespace Hansel23\ObservableBunny;

use Bunny\Channel;
use Bunny\Message as BunnyMessage;
use React\Promise\PromiseInterface;

class Message
{
    private BunnyMessage $message;

    private Channel      $channel;

    public function __construct( BunnyMessage $message, Channel $channel )
    {
        $this->message = $message;
        $this->channel = $channel;
    }

    public function getMessage(): BunnyMessage
    {
        return $this->message;
    }

    public function getChannel(): Channel
    {
        return $this->channel;
    }

    public function ack(): bool|PromiseInterface
    {
        return $this->channel->ack( $this->message );
    }

    public function nack(): bool|PromiseInterface
    {
        return $this->channel->nack( $this->message );
    }
}
