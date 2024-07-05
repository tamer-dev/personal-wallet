<?php
namespace App\Utils;


class ResponseUtil 
{
    /**
     * @param string $message
     * @param mixed  $data
     *
     * @return array
     */
    public static function makeResponse($message, $data)
    {
        return [
            'success' => true,
            'data'    => $data,
            'message' => $message,
        ];
    }

    /**
     * @param string $message
     * @param mixed  $data
     *
     * @return array
     */
    public static function makeResponseMerged($message, $data)
    {
        $tmpArray = [
            'success' => true,
            'message' => $message,
        ];
        $result =  array_merge($tmpArray, $data);
        return $result;
    }
    /**
     * @param string $message
     * @param array  $data
     *
     * @return array
     */
    public static function makeError($message, array $errors = [], array $data = [])
    {
        $res = [
            'success' => false,
            'message' => $message,
            'errors' => $errors,
        ];
        if (!empty($data)) {
            $res['data'] = $data;
        }
        return $res;
    }
}
