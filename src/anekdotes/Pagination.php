<?php
/*
 * This file is part of the Pagination package.
 *
 * (c) Anekdotes Communication inc. <info@anekdotes.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Anekdotes\Pagination;

/**
 * Pagination class.
 */
class Pagination
{
    /**
     * Generates the pages to display according to its parameters.
     *
     * @param int $pages   The total amount of page
     * @param int $current The current page
     * @param int $length  The number of page to display
     *
     * @return array The pages to display
     */
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

        if ($min > 1 && $current > 1) {
            $datas[] = 1;

            if ($min - 1 > 1) {
                $datas[] = '...';
            }
        }

        for ($i = $min; $i <= $max; ++$i) {
            $datas[] = $i;
        }

        if ($max < $pages && $current < $pages) {
            if ($max + 1 < $pages) {
                $datas[] = '...';
            }

            $datas[] = $pages;
        }

        return $datas;
    }
}
