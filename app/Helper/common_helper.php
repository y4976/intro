<?php

if (! function_exists('now')) {
    /**
     * @return string
     */
    function now()
    {
        return date("Y-m-d H:i:s");
    }
}

if (! function_exists('implodeQuot')) {
    /**
     * @param array $list
     * @return string
     */
    function implodeQuot($list)
    {
        $commaList = [];
        foreach ($list as $item) {
            if ($item == '') continue;
            array_push($commaList, "'{$item}'");
        }
        return implode(',', $commaList);
    }
}

if (! function_exists('getRealClientIp')) {
    /**
     * @return string
     */
    function getRealClientIp()
    {
        if (getenv('HTTP_CLIENT_IP')) {
            $ip = getenv('HTTP_CLIENT_IP');
        } else if (getenv('HTTP_X_FORWARDED_FOR')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        } else if (getenv('HTTP_X_FORWARDED')) {
            $ip = getenv('HTTP_X_FORWARDED');
        } else if (getenv('HTTP_FORWARDED_FOR')) {
            $ip = getenv('HTTP_FORWARDED_FOR');
        } else if (getenv('HTTP_FORWARDED')) {
            $ip = getenv('HTTP_FORWARDED');
        } else if (getenv('REMOTE_ADDR')) {
            $ip = getenv('REMOTE_ADDR');
        } else {
            $ip = '알수없음';
        }

        return $ip;
    }
}
