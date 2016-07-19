<?php

namespace Anekdotes\Pagination;

class Pagination
{
    public function pager($pages, $current, $length = 6)
    {
        if (intval($pages) == 0) {
            return false;
        }
        if (intval($length) == 0) {
            return false;
        }

        $datas = [];
        $min = 1;
        $max = $length > $pages ? $pages : $length;
        $sub = floor($length / 2);

        if ($current > ($min + $sub)) {
            $min = ($current - $sub);
            $max = ($min + $length);
            if ($max > $pages) {
                $diff = $max - $pages;
                $max = $pages;
                $min -= $diff;
                $min = $min < 1 ? 1 : $min;
            }
        }

        for ($i = $min; $i <= $max; $i++) {
            $datas[] = $i;
        }

        return $datas;
    }
}
