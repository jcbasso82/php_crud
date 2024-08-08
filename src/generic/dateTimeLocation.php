<?php
class DateTimeLocation
{
    function get()
    {
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('Y-m-d H:i');
        return $date;
    }
}
