<?php
class PaginationView extends View
{
    public function __construct($pages, $updateFunction)
    {
        parent::__construct();
        $this->pages = $pages;
        $this->updateFunction = $updateFunction;
    }

    public function render($filename = 'pagination.php')
    {
        return parent::render($filename);
    }
}
