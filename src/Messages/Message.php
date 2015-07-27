<?php namespace Prhost\Phreal\Messages;

use Prhost\Phreal\Exceptions\InvalidMessageFormat;

/**
 * Class Message
 * @package Prhost\Phreal\Messages
 */
class Message
{
    private $destination = [
        'eventCall'  => null,
        'eventAlias' => null
    ];

    private $data = [];

    public function __construct($message)
    {
        $messageRaw = json_decode($message);

        InvalidMessageFormat::validateJson();

        $this->populate($messageRaw);
    }

    /**
     * @param \stdClass $messageRaw
     */
    public function populate(\stdClass $messageRaw)
    {
        $this->setEvent($messageRaw);
        $this->setData($messageRaw);
    }

    /**
     * @param \stdClass $message
     * @throws \Exception
     */
    private function setEvent(\stdClass $message)
    {
        if ($message->event) {
            $event = $message->event;
            $this->destination['eventAlias'] = $event;
        } else {
            throw new \Exception('Event required', 400);
        }
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param \stdClass $message
     */
    public function setData(\stdClass $message)
    {
        if (isset($message->data)) {
            $this->data = $message->data;
        }
    }
}