<?php
/**
* Simple Logger Class
*
* @author Josh Nesbitt <josh@josh-nesbitt.net>
*
* By default will write to path/to/logger/ + log/filename.log
*
* Modified by: 
* @author Kiragu
* @email <mutuakiragu@gmail.com> 
**/
namespace Cellulant\SMS_CPG\Core\Utilities;

class Logger {
  var $file, $path, $level, $stream;
  const INFO  = 4;
  const DEBUG = 3;
  const WARN  = 2;
  const ERROR = 1;
  const FATAL = 0;
  	function __construct($path='info.log', $level=4)
	{
		//$this->file = $file;
		$this->level = $level;
		$this->path = $path;
		$this->start();
	}
	
	function info($string)
	{
          return $this->check_level(self::INFO) ? true : $this->log($string);
	}
	
	function warn($string)
	{
	  return $this->check_level(self::WARN) ? true : $this->log($string);
	}
	
	function debug($string)
	{
	  return $this->check_level(self::DEBUG) ? true : $this->log($string);
	}
	
	function error($string)
	{
	  return $this->check_level(self::ERROR) ? true : $this->log($string);
	}
	
	function fatal($string)
	{
	  return $this->check_level(self::FATAL) ? true : $this->log($string);
	}
	
	function clear()
	{
	  $this->close();
	  $this->open("w");
	  $this->close();
	  $this->open();
	}
	
	private function check_level($level)
	{
	  return $this->level < $level;
	}
	
	function log($string,$path=null)
	{
           
           if(!is_null($path)){
               $this->path = $path;
               $this->start();
           }
          
          /*Hack by Andrew Muleke to convert any object or array passed*/
          if(is_array($string) || is_object($string)){
              $string = json_encode($string);
          }
          /*Hack by Andrew Muleke to convert any object or array passed*/
          
	  $this->write("[". date('d-m-Y: h:i:sa') . "] ". $string . "\r\n");
          
	}
  
	private function write($string)
	{
	  return fwrite($this->stream, $string);
	}
  
	private function start()
	{
	  return $this->open();
	}
	
	private function open($mode="a")
	{
              
         try{
            if(file_exists($this->path)){
                return $this->stream = fopen($this->path, $mode) or die("Cannot write to file '$this->path', please ensure '$this->path' is writable.");
            }
            else{
                return $this->stream = fopen($this->path, 'w');
            }
          }
          catch(Exception $e){
              
          }
	}
	
	private function close()
	{
	  return fclose($this->stream);
	}
	
}

