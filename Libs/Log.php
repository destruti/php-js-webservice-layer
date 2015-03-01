<?php

namespace Libs;

class Log
{

    public static function mongo($message) {
        error_log(date('Y.d.m h:i:s').' > '.var_export($message, true).PHP_EOL, 3, "/tmp/mongo.log");
    }

    public static function error($message) {
        error_log(date('Y.d.m h:i:s').' > '.var_export($message, true).PHP_EOL, 3, "/tmp/error.log");
    }

}