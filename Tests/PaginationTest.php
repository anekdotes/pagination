<?php

/*
 * This file is part of the Pagination package.
 *
 * (c) Anekdotes Communication inc. <info@anekdotes.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests;

use Anekdotes\Pagination\Pagination;
use PHPUnit\Framework\TestCase;

final class PaginationTest extends TestCase
{
    public function testInstantiatePagination()
    {
        $pagination = new Pagination();

        $this->assertInstanceOf(Pagination::class, $pagination);
    }

    public function testPaginationPager1()
    {
        $pagination = new Pagination();
        $result = $pagination->pager(0, 1, 6);

        $this->assertFalse($result);
    }

    public function testPaginationPager2()
    {
        $pagination = new Pagination();
        $result = $pagination->pager(20, 1, 0);

        $this->assertFalse($result);
    }

    public function testPaginationPager3()
    {
        $pagination = new Pagination();
        $result = $pagination->pager(5, 1);

        $this->assertFalse(false);

        $expected = [1, 2, 3, 4, 5];

        $this->assertEquals($result, $expected);
    }

    public function testPaginationPager4()
    {
        $pagination = new Pagination();
        $result = $pagination->pager(10, 1);
        $expected = [1, 2, 3, 4, 5, 6, '...', 10];

        $this->assertEquals($result, $expected);
    }

    public function testPaginationPager5()
    {
        $pagination = new Pagination();
        $result = $pagination->pager(10, 5, 3);
        $expected = [1, '...', 4, 5, 6, 7, '...', 10];

        $this->assertEquals($result, $expected);
    }

    public function testPaginationPager6()
    {
        $pagination = new Pagination();
        $result = $pagination->pager(10, 10);
        $expected = [1, '...', 4, 5, 6, 7, 8, 9, 10];

        $this->assertEquals($result, $expected);
    }

    public function testPaginationPager7()
    {
        $pagination = new Pagination();
        $result = $pagination->pager(10, 11);
        $expected = [1, '...', 4, 5, 6, 7, 8, 9, 10];

        $this->assertEquals($result, $expected);
    }

    public function testPaginationPager8()
    {
        $pagination = new Pagination();
        $result = $pagination->pager(10, 0);
        $expected = [1, 2, 3, 4, 5, 6, '...', 10];
        
        $this->assertEquals($result, $expected);
    }
}
