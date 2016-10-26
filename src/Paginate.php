<?php
namespace abraovic\phpPaginator;


class Paginate
{
    /**
     * This method will prepare all data that will work with pagination.html.twig
     * @param $active
     * @param $pageLimit
     * @param $totalItemsNo
     * @return \stdClass
     */
    public static function data($active, $pageLimit, $totalItemsNo, $link)
    {
        $active = (int)$active;
        $limit = ceil($totalItemsNo/$pageLimit);
        $loopLimit = 5;
        if ($active > 3 && $limit > 5) {
            $loopLimit--;
        }
        if ($active < $limit-2 && $limit > 5){
            $loopLimit--;
        }

        if ($loopLimit >= $limit) {
            $loopLimit = $limit-1;
        }

        $paginationData = new \stdClass();
        $paginationData->active = $active;
        $paginationData->limit = $limit;
        $paginationData->loopLimit = $loopLimit;
        $paginationData->link = $link;

        return $paginationData;
    }

    /**
     * Calculates offset based on current page and page limit
     * @param $page
     * @param $limit
     * @return int
     */
    public static function offset($page, $limit = 25)
    {
        return ($page - 1) * $limit;
    }
}