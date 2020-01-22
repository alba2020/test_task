<?php

class Response
{
    protected $status;
    protected $payload;
    protected $message;

    const STATUS_OK = 'ok';
    const STATUS_ERROR = 'error';

    /**
     * Response constructor.
     * @param $status
     * @param $payload
     * @param $message
     */
    public function __construct($status, $payload, $message='')
    {
        $this->status = $status;
        $this->payload = $payload;
        $this->message = $message;
    }

    public function toJson()
    {
        return json_encode([
            'status' => $this->status,
            'payload' => $this->payload,
            'message' => $this->message,
        ]);
    }

    public static function ok($payload, $message='')
    {
        return new Response(self::STATUS_OK, $payload, $message);
    }

    public static function error($message)
    {
        return new Response(self::STATUS_ERROR, null, $message);
    }
}
