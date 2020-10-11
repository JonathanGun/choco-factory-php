<?php
class ChocolateView extends View
{
    public function __construct($filename, $subtitle = '', $properties = array())
    {
        parent::__construct(
            'Choco' . ($subtitle ? " | $subtitle" : ''),
            $properties
        );
        $this->content_file = CHOCOLATE_PATH . $filename;
    }
}
