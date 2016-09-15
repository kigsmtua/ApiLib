<?php
Namespace Cellulant\CARD_GATEWAY\Utilities;
use Log4php\Logger; 
/**
 * Beep logger class.
 *
 * PHP VERSION 5.3.6
 *
 * @category  Logging
 * @package   Logger
 * @author    Daniel Mbugua <daniel.mbugua@cellulant.com>
 * @copyright 2013 Cellulant Ltd
 * @license   Proprietory License
 * @link      http://www.cellulant.com
 */
class BeepLogger extends Logger
{

    /**
     * Log object in the class.
     *
     * @var string
     */
    private $log;
    /**
     * Class Constructor.
     */
    public function __construct() {
        $this->log = Logger::getLogger(__CLASS__);
    }
    /**
     * Function to write info logs.
     *
     * @param string $logFile the log file to write to
     * @param int $uniqueID the unique ID for the transaction
     * @param string $message the message to log
     */
    public function info($logFile, $uniqueID, $message, $from = "", $to = "") {
        $this->setConfigurations($logFile, $uniqueID, $from, $to);
        $this->log->info($message);
    }
    /**
     * Function to write error logs.
     *
     * @param string $logFile the log file to write to
     * @param int $uniqueID the unique ID for the transaction
     * @param string $message the message to log
     */
    public function error($logFile, $uniqueID, $message, $from = "", $to = "") {
        $this->setConfigurations($logFile, $uniqueID, $from, $to);
        $this->log->error($message);
    }

    /**
     * Function to write warning logs.
     *
     * @param string $logFile the log file to write to
     * @param int $uniqueID the unique ID for the transaction
     * @param string $message the message to log
     */
    public function warn($logFile, $uniqueID, $message, $from = "", $to = "") {
        $this->setConfigurations($logFile, $uniqueID, $from, $to);
        $this->log->warn($message);
    }

    /**
     * Function to write debug logs.
     *
     * @param string $logFile the log file to write to
     * @param int $uniqueID the unique ID for the transaction
     * @param string $message the message to log
     */
    public function debug($logFile, $uniqueID, $message, $from = "", $to = "") {
        $this->setConfigurations($logFile, $uniqueID, $from, $to);
        $this->log->debug($message);
    }

    /**
     * Function to write fatal logs.
     *
     * @param string $logFile the log file to write to
     * @param int $uniqueID the unique ID for the transaction
     * @param string $message the message to log
     */
    public function fatal($logFile, $uniqueID, $message, $from = "", $to = "") {
        $this->setConfigurations($logFile, $uniqueID, $from, $to);
        $this->log->fatal($message);
    }

    /**
     * Function to write SQL logs.
     *
     * @param string $logFile the log file to write to
     * @param int $uniqueID the unique ID for the transaction
     * @param string $message the message to log
     */
    public function sequel($logFile, $uniqueID, $message, $from = "", $to = "") {
        $this->log->configure(
            array(
                "rootLogger" => array(
                    "appenders" => array("default"),
                ),
                "appenders" => array(
                    "default" => array(
                        "class" => "LoggerAppenderFile",
                        "layout" => array(
                            "class" => "LoggerLayoutPattern",
                            "params" => array(
                                "conversionPattern" =>
                                date("Y-m-d H:i:s") . " | SEQUEL | %F | "
                                . "%method | LINE:%L | " . $uniqueID
                                . " | From: " . $from
                                . " | To: " . $to
                                . " | %message%newline"
                            )
                        ),
                        "params" => array(
                            "file" => "$logFile"
                        )
                    )
                ),
            )
        );

        $this->log->debug($message);
    }

    /**
     * Sets the log format and appender file class.
     *
     * @param string $logFile the log file to write to
     * @param int $uniqueID the unique ID for the transaction
     */
    private function setConfigurations($logFile, $uniqueID, $from, $to) {
        $this->log->configure(
            array(
                "rootLogger" => array(
                    "appenders" => array("default"),
                ),
                "appenders" => array(
                    "default" => array(
                        "class" => "LoggerAppenderFile",
                        "layout" => array(
                            "class" => "LoggerLayoutPattern",
                            "params" => array(
                                "conversionPattern" =>
                                date("Y-m-d H:i:s") . " | %p | %F | "
                                . "%method | LINE:%L | " . $uniqueID
                                . " | From: " . $from
                                . " | To: " . $to
                                . " | %message%newline"
                            )
                        ),
                        "params" => array("file" => "$logFile")
                    )
                ),
            )
        );
    }

    /**
     * Utility to print an array. Strips out passwords.
     *
     * @param array $arr The array to print
     *
     * @return string The array as a string that can be printed
     */
    public function printArray($arr) {
        $str = print_r($arr, true);
        $str_replaced = preg_replace(
            "/.password] => (.+)/", "[password] => **********", $str
        );
        $str1 = str_replace("\n", "", $str_replaced);
        $str2 = str_replace("   ", "", $str1);
        $str3 = str_replace("  ", "", $str2);
        return $str3;
    }

}