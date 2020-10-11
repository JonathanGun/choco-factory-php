<?php
class ViewNotFoundException extends Exception
{
    public function errorMessage()
    {
        //error message
        $errorMsg = '[Templte not found] Error on line ' . $this->getLine() . ' in ' . $this->getFile()
        . ': <b>' . $this->getMessage() . '</b> is not a valid E-Mail address';
        return $errorMsg;
    }
}

class View
{
    public $properties;
    public function __construct($subtitle = '', $properties = array())
    {
        $this->properties = $properties;
        $this->title = "A-Chong-co" . ($subtitle ? " | $subtitle" : '');
    }
    public function render($filename = 'master.php')
    {
        ob_start();
        if (file_exists(TEMPLATE_PATH . $filename)) {
            include TEMPLATE_PATH . $filename;
        } else {
            throw new ViewNotFoundException();
        }
        return ob_get_clean();
    }
    public function __set($k, $v)
    {
        $this->properties[$k] = $v;
    }
    public function __get($k)
    {
        return (($this->properties[$k]) ?? '');
    }
}
