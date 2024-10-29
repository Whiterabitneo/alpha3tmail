<?php
/**
 * PHPMailer Exception class.
 * PHP Version 5.5
 */

namespace PHPMailer\PHPMailer;

/**
 * PHPMailer exception handler.
 * @package PHPMailer
 */
class Exception extends \Exception
{
    /**
     * Prettify error message output.
     * @return string
     */
    public function errorMessage()
    {
        return '<strong>' . htmlspecialchars($this->getMessage()) . "</strong><br />\n";
    }
}
?>