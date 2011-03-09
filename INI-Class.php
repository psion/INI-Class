<?php

/*  Copyright 2011 Jason Marshall

    This file is part of INI-class.

    INI-Class is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    INI-Class is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with INI-Class.  If not, see <http://www.gnu.org/licenses/>.

*/

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
		   } 
		   
		   I don't know what I need here.  I might rewrite the construct function, just
		   not right now.  When I do, it will be to something that won't have to rewrite
		   the damn INI file each time.  Next time, I guess. */
		   
	function __construct($file)
	{
		$this->ini_file=$file;
if(is_file($file))
{
	$this->ini_hand=fopen($file,'r');
	$this->ini=fread($this->ini_hand, filesize($file));
	fclose($this->ini_hand);
	}		
		$this->parseString();
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
		
		
	function parseString($string = null)
	{
		if($string == null) { $string = $this->ini; }
		$this->ini_array = array();
		$jones=preg_split($pattern = "/\n/", $string);
		$re1='(#)';	# Any Single Character 1
		$re2='(\\[.*?\\])';	# Square Braces 1
		$re3='.*?';	# Non-greedy match on filler
		$re4='((?:[a-z][a-z]+))';	# Word 1
		foreach($jones as $txt)
		{
			 if (!$c=preg_match_all ("/".$re1."/is", $txt, $matches))
			 {
			 	if ($c=preg_match_all ("/".$re2."/is", $txt, $matches))
			 	{
			 		$section=$matches[1][0];
			 		$this->ini_array[$section]=array();
			 		}
			 	elseif($c=preg_match_all ("/".$re3.$re4."/is", $txt, $matches)) 
			 	{
			 		$matches=explode("=",$txt,2);
			 		$name=$matches[0];
			 		$value=$matches[1];
			 		$this->ini_array[$section][$name]=$value;
			 		}
			 		}
			 		}
			 		}
			 	
		
		   
	   
	function __destruct() {
		$this->saveINI(); //Until I figure out what I really need.
		fclose($this->ini_hand); }

}
		
		
		?>