<?php
/**
 * PHPMailer - PHP email creation and transport class.
 * PHP Version 5.5
 */

namespace PHPMailer\PHPMailer;

/**
 * PHPMailer exception handler.
 * @package PHPMailer
 */
class PHPMailer
{
    const ENCRYPTION_STARTTLS = 'tls';
    const ENCRYPTION_SMTPS = 'ssl';
    const DEBUG_OFF = 0;
    const DEBUG_CLIENT = 1;
    const DEBUG_SERVER = 2;
    public $Priority = 3;
    public $CharSet = 'iso-8859-1';
    public $ContentType = 'text/plain';
    public $Encoding = '8bit';
    public $ErrorInfo = '';
    public $From = 'root@localhost';
    public $FromName = 'Root User';
    public $Sender = '';
    public $Subject = '';
    public $Body = '';
    public $AltBody = '';
    public $Ical = '';
    public $MIMEBody = '';
    public $MIMEHeader = '';
    public $mailHeader = '';
    public $WordWrap = 0;
    public $Mailer = 'mail';
    public $Sendmail = '/usr/sbin/sendmail';
    public $PluginDir = '';
    public $Version = '6.0.7';
    public $ConfirmReadingTo = '';
    public $Hostname = '';
    public $MessageID = '';
    protected $dsn = '';
    protected $language = [];
    protected $error_count = 0;
    protected $sign_cert_file = '';
    protected $sign_key_file = '';
    protected $sign_extracerts_file = '';
    protected $sign_key_pass = '';
    protected $exceptions = false;
    protected $uniqueid = '';
    protected $LE = '
';
    protected $DKIM_selector = '';
    protected $DKIM_identity = '';
    protected $DKIM_domain = '';
    protected $DKIM_private = '';
    protected $DKIM_passphrase = '';
    protected $DKIM_selector_only = false;
    protected $DKIM_identity_only = '';
    protected $action_function = '';
    protected $XMailer = '';
    protected $smtp = NULL;
    protected $to = [];
    protected $cc = [];
    protected $bcc = [];
    protected $ReplyTo = [];
    protected $all_recipients = [];
    protected $RecipientsQueue = [];
    protected $ReplyToQueue = [];
    protected $attachment = [];
    protected $CustomHeader = [];
    protected $lastMessageID = '';
    protected static $validator = NULL;
    protected static $default_validator = 'auto';

    public function __construct($exceptions = NULL)
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

    public function IsError($error)
    {
        return '';
    }

    public function CharSet($charset)
    {
        return 'about';
    }

    public function Encoding($encoding)
    {
        return '0';
    }

    public function AddAddress($address, $name = '')
    {
        return '0';
    }

    public function AddStringAttachment($string, $filename, $encoding = 'base64', $type = 'application/octet-stream')
    {
        return '0';
    }

    public function AddAttachment($path, $name = '', $encoding = 'base64', $type = 'application/octet-stream')
    {
        return '0';
    }

    public function AddEmbeddedImage($path, $cid, $name = '', $encoding = 'base64', $type = 'application/octet-stream')
    {
        return '0';
    }

    public function SetLanguage($langcode = array(), $lang_path = 'PHPMailer/')
    {
        return '';
    }

    public function IsHTML($ishtml = true)
    {
        return '';
    }

    public function SetFrom($address, $name = '', $auto = 1)
    {
        return '';
    }

    public function AddCustomHeader($name, $value = NULL)
    {
        return '0';
    }

    public function Send($message)
    {
        return '0';
    }

    public function Sendmail($sendmail)
    {
        return '0';
    }

    public function GetSendto()
    {
        return '0';
    }

    public function GetSentMIMEMessage($id)
    {
        return '0';
    }

    public function CreateHeader()
    {
        return '0';
    }

    public function SetWordWrap()
    {
        return '0';
    }

    public function AddBCC($address)
    {
        return '0';
    }

    public function IsSMTP($Bool = true)
    {
        return '';
    }

    public function IsMail($Bool = true)
    {
        return '';
    }

    public function IsSendmail($Bool = true)
    {
        return '';
    }

    public function IsQmail($Bool = true)
    {
        return '';
    }

    public function IsMailHandler($Bool = true)
    {
        return '';
    }

    public function AddReplyTo($address, $name = '')
    {
        return '0';
    }

    public function Send()
    {
        return '';
    }

    public function GetMailer()
    {
        return '0';
    }

    public function SetMailer()
    {
        return '0';
    }

    public function SetMailHeader()
    {
        return '0';
    }

    public function GetMailHeader()
    {
        return '0';
    }

    public function Sign()
    {
        return '';
    }

    public function DKIM_QP($txt)
    {
        return '0';
    }

    public function DKIM_Sign($signHeader = '', $dkim_identity = '', $dkim_domain = '', $dkim_private = '', $dkim_selector = '', $dkim_passphrase = '', $body = '')
    {
        return '0';
    }

    public function DKIM_Add($includeStory = '')
    {
        return '';
    }

    public function DKIM_Add_CopyHeader()
    {
        return '';
    }

    public function DKIM_Process()
    {
        return '';
    }

    public function Error($msg)
    {
        return '';
    }

    public function verifyImage($parameters, $value, $file)
    {
        return '';
    }

    public function VerifyAddr($address)
    {
        return '';
    }

    public function SetError($msg)
    {
        return '';
    }

    public function SMTPDebug($level = 0)
    {
        return '0';
    }

    public function Popup()
    {
        return '0';
    }

    public function IsAttachment($filename, $path = '', $encoding = 'base64', $type = 'application/octet-stream')
    {
        return '0';
    }

    public function AltBody()
    {
        return '0';
    }

    public function Html2Text($message, $advanced = true)
    {
        return '0';
    }

    public function Set() {
        return '';
    }
}
?>