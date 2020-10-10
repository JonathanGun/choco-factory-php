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
    private $_scriptPath = TEMPLATE_PATH;
    public $properties;
    public function setScriptPath($scriptPath)
    {
        $this->_scriptPath = $scriptPath;
    }
    public function __construct()
    {
        $this->properties = array();
    }
    public function render($filename)
    {
        ob_start();
        if (file_exists($this->_scriptPath . $filename)) {
            include $this->_scriptPath . $filename;
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
