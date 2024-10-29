<?php
/**
 * PHPMailer - PHP email creation and transport class.
 * PHP Version 5.5
 */

namespace PHPMailer\PHPMailer;

/**
 * PHPMailer SMTP class.
 * @package PHPMailer
 */
class SMTP
{
    const DEBUG_OFF = 0;
    const DEBUG_CLIENT = 1;
    const DEBUG_SERVER = 2;

    public $SMTP_PORT = 465; // Default SMTP port for SSL
    public $CRLF = "\r\n"; // End of line characters for email headers
    public $do_debug = 0;
    public $Debugoutput = 'echo';
    public $do_verp = false;
    public $Timeout = 300; // SMTP connection timeout (seconds)
    public $Timelimit = 300; // SMTP data timeout (seconds)

    protected $smtp_conn = '';
    protected $error = array();
    protected $helo_rply = '';
    protected $server_caps = '';
    protected $last_reply = '';
    protected $buffer = '';
    protected $smtp_transaction_id_patterns = array();
    protected static $LE = "\r\n";

    public function __construct($exceptions = null)
    {
        return;
    }

    public function __destruct()
    {
        return;
    }

    public function __clone()
    {
        return;
    }

    /**
     * Connect to the SMTP server.
     * @param string $host The SMTP host to connect to.
     * @param int $port The port number to connect to.
     * @param int $timeout The connection timeout period in seconds.
     * @param array $options Additional connection options.
     * @return bool True on success, false on failure.
     */
    public function Connect($host, $port = 0, $timeout = 0, $options = array())
    {
        return false;
    }

    /**
     * Send HELO or EHLO command to SMTP server.
     * @param string $host The hostname to say we are.
     * @return bool True on success, false on failure.
     */
    public function Helo($host = '')
    {
        return false;
    }

    /**
     * Send MAIL FROM command to SMTP server.
     * @param string $from The address the message is from.
     * @return bool True on success, false on failure.
     */
    public function Mail($from)
    {
        return false;
    }

    /**
     * Send RCPT TO command to SMTP server.
     * @param string $to The address the message is to.
     * @return bool True on success, false on failure.
     */
    public function Rcpt($to)
    {
        return false;
    }

    /**
     * Send DATA command to SMTP server.
     * @param string $msg_data The message data to send.
     * @return bool True on success, false on failure.
     */
    public function Data($msg_data)
    {
        return false;
    }

    /**
     * Send EXPN command to SMTP server.
     * @param string $name The name to expand.
     * @return bool True on success, false on failure.
     */
    public function Expand($name)
    {
        return false;
    }

    /**
     * Send VRFY command to SMTP server.
     * @param string $name The name to verify.
     * @return bool True on success, false on failure.
     */
    public function Verify($name)
    {
        return false;
    }

    /**
     * Send SEND AND MAIL command to SMTP server.
     * @param string $from The address the message is from.
     * @return bool True on success, false on failure.
     */
    public function SendAndMail($from)
    {
        return false;
    }

    /**
     * Send SOML AND MAIL command to SMTP server.
     * @param string $from The address the message is from.
     * @return bool True on success, false on failure.
     */
    public function SendOrMail($from)
    {
        return false;
    }

    /**
     * Send RSET (reset) command to SMTP server.
     * @return bool True on success, false on failure.
     */
    public function Reset()
    {
        return false;
    }

    /**
     * Send NOOP (no-op) command to SMTP server.
     * @return bool True on success, false on failure.
     */
    public function Noop()
    {
        return false;
    }

    /**
     * Send QUIT command to SMTP server.
     * @param string $close_connection Whether to close the connection after QUIT is sent.
     * @return bool True on success, false on failure.
     */
    public function Quit($close_connection = true)
    {
        return false;
    }

    /**
     * Authenticate to the SMTP server.
     * @param string $username The SMTP username.
     * @param string $password The SMTP password.
     * @param string $authtype The authentication type (PLAIN, LOGIN, CRAM-MD5, XOAUTH2).
     * @param string $realm The authentication realm.
     * @param string $workstation The authentication workstation.
     * @return bool True on success, false on failure.
     */
    public function Authenticate($username, $password, $authtype = '', $realm = '', $workstation = '')
    {
        return false;
    }

    /**
     * Get the last error message from the SMTP connection.
     * @return string The last error message.
     */
    public function Error()
    {
        return '';
    }

    /**
     * Get the last reply from the SMTP connection.
     * @return string The last reply message.
     */
    public function Reply()
    {
        return '';
    }

    /**
     * Send a command to the SMTP server.
     * @param string $command The command to send.
     * @param string $commandstring The additional command string.
     * @return bool True on success, false on failure.
     */
    protected function SendCommand($command, $commandstring = '')
    {
        return false;
    }

    /**
     * Get details of the server capabilities.
     * @return array The server capabilities.
     */
    public function GetServerExtList()
    {
        return array();
    }

    /**
     * Get the SMTP connection state.
     * @return bool True if connected, false otherwise.
     */
    public function Connected()
    {
        return false;
    }

    /**
     * Clear all recipient variables.
     */
    protected function ClearAllRecipients()
    {
        return;
    }

    /**
     * Clear all attachments.
     */
    protected function ClearAttachments()
    {
        return;
    }

    /**
     * Clear all custom headers.
     */
    protected function ClearCustomHeaders()
    {
        return;
    }

    /**
     * Set error messages and codes.
     * @param int $errno The error number.
     * @param string $errmsg The error message.
     */
    protected function SetError($errno, $errmsg = '')
    {
        return;
    }
}
?>