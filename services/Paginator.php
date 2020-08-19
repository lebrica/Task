<?php

namespace task\Services;

class Paginator
{
    public function paginate(int $page, int $countOnPage): string
    {
        if (empty($page) && is_numeric($page) === false) {
            $page = 1;
        }
        $offset = $countOnPage;
        $limit = $countOnPage * ($page - 1);
        return "$limit, $offset";
    }

    public function countPages(int $countRows, int $countOnPage): int
    {
        return ceil($countRows / $countOnPage);
    }
}