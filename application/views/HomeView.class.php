<?php
class HomeView extends View
{
    public function __construct($filename, $subtitle = '', $properties = array())
    {
        parent::__construct(
            'Home' . ($subtitle ? " | $subtitle" : ''),
            $properties
        );
        $this->content_file = HOME_PATH . $filename;
    }
}
