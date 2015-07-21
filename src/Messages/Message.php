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

    public function __construct($message, MessageOut $messageOut)
    {
        try {

            $messageRaw = json_decode($message);

            InvalidMessageFormat::validateJson();

            $this->populate($messageRaw);

            //example message out
            $messageOut->setCode(200);
            $messageOut->setMessage('Ok');
            $messageOut->show();

        } catch (InvalidMessageFormat $e) {

            InvalidMessageFormat::show($e);

        }
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
     */
    private function setEvent(\stdClass $message)
    {
        try {
            if (isset($message->event)) {
                $event = $message->event;
                $this->destination['eventAlias'] = $event;
            } else {
                throw new \Exception('Event required', 400);
            }

        } catch (\Exception $e) {
            MessageOut::render($e);
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