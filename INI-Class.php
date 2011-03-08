<?php

class parseINI
{
	public $ini;			// The INI string, as a full string.
	public $ini_file;		// The filename.
	public $ini_hand; 	// The INI file handle.  
	public $ini_array;	// The INI broken down into an array
	
	
	/*function __construct($file)
	{
		if(is_file($file))
		{  $this->ini_file=fopen($file,'r+b');
		   $this->ini=fread($this->ini_file,filesize($file));
		   } else { $this->ini_file=fopen($file,'w+b'); }
		   } */
		   
	function __construct($file)
	{
		$this->ini_file=$file;
if(is_file($file))
{
	$this->ini_hand=fopen($file,'r');
	$this->ini=fgets($this->ini_hand, filesize($file));
	fclose($this->ini_hand);
	}		
		
		$this->ini_hand=fopen($file,'w');
		}
		   
	function parseArray($array = null)
	{
		if ($array == null) { $array=$this->ini_array; }
      $str="#INI Files Created by Me.\n"; //Just something to set the string file up.
		foreach($array as $section => $nxt_arry)
		{  $str=$str."[".$section."]\n";
		   foreach($nxt_arry as $name => $value)
		   {  $str=$str.$name."=".$value."\n"; }
			 }
			 $this->ini=$str;
			 return($str);
			}
			
	function saveINI($str=null)
	{
		if ($str == null ) { $str=$this->ini; }
		//rewind($this->ini_file);
		fwrite($this->ini_hand,$str);
		}
		
		
	/*function parseString($string)
		   
*/		   
	function __destruct() {
		//$this->saveINI(); Until I figure out what I really need.
		fclose($this->ini_file); }

}
		
		
		?>