<?php namespace Prhost\Phreal\Exceptions;

/**
 * Class InvalidMessageFormat
 * @package Prhost\Phreal\Exceptions
 */
class InvalidMessageFormat extends \Exception
{
    /**
     * Validate json format
     * @return bool true
     * @throws InvalidMessageFormat
     */
    public static function validateJson()
    {
        if (json_last_error() != 'JSON_ERROR_NONE') {
            throw new InvalidMessageFormat('Json format invalid.', 400);
        } else {
            return true;
        }
    }

    /**
     * @param \Exception $e
     */
    public static function show(\Exception $e)
    {
        echo json_encode([
            'code'    => $e->getCode(),
            'message' => $e->getMessage(),
        ]);
    }
}