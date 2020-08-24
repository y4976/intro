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
