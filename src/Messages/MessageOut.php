<?php namespace Prhost\Phreal\Messages;

/**
 * Class MessageOut
 * @package Prhost\Phreal\Messages
 */
class MessageOut extends Message
{

    /**
     * @var int
     */
    private $code = 0;

    /**
     * @var string
     */
    private $message = '';

    public function show($conn)
    {
        $json = json_encode([
            'code'    => $this->getCode(),
            'message' => $this->getMessage(),
        ]);

        $conn->send($json);
    }

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param int $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
}