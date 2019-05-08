<?php

namespace core;

/**
 * Class Logs
 * @package core
 */
class Logs
{
    /**
     * Logs constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param $log
     */
    public static function addLog($log){
        App::getDB()->insert("action_log", [
            'id' => null,
            'datetime' => self::getCurrentDatetime(),
            'ip' => self::getUserIp(),
            'log' => $log
        ]);
    }

    /**
     * @return mixed
     */
    private static function getUserIp(){
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }

    private static function getCurrentDatetime(){
        return (new \DateTime())->format('Y-m-d H:i:s');
    }

}