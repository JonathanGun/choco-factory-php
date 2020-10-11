<?php
class UserView extends View
{
    public function __construct($filename, $subtitle = '', $properties = array())
    {
        parent::__construct(
            'User' . ($subtitle ? " | $subtitle" : ''),
            $properties
        );
        $this->content_file = USER_PATH . $filename;
    }
}
