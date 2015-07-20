<?php namespace Prhost\Phreal\Messages;

/**
 * Created by PhpStorm.
 * User: Hélio
 * Date: 7/8/2015
 * Time: 1:20 PM
 */
class Message
{

    private $destination = [
        'eventAlias' => null,
    ];

    private $data   =   [

    ];


    public function __construct($message)
    {
        $this->validateJson($message);

        $messageRaw = json_decode($message);
        $this->populate($messageRaw);
    }

    public function validadeJson($message){



    }

    public function populate(\stdClass $messageRaw)
    {
        $this->setEvent($messageRaw->event);
        $this->setData($messageRaw->data);
    }

    private function setEvent($event)
    {
        $this->destination['eventAlias'] = $event;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }
}