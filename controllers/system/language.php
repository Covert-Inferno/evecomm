<?php
/**
 * Language controller
 *
 * @author     Jaap-Willem Dooge <Jaap-Willem.Dooge@outlook.com>
 * @copyright  2013 Jaap-Willem Dooge
 * @license    http://creativecommons.org/licenses/by-sa/3.0/   Creative Commons Attribution-ShareAlike 3.0 Unported License
 * @link       https://github.com/DoogeJ/evecomm
 */

class Language extends Controller{
	public $pagetitle = "Language";
	public $language = "en";
	private $baselanguage = "en";	//English is the default language
	
	public function getString($shortname){
		$res = $this->base->database->request("SELECT string FROM language WHERE language.language = ? AND language.shortname = ? LIMIT 1", array($this->language, $shortname));
		// try again in the base language (usually English) if the string was not found
		// this is automatic fallback in case not everything is properly translated
		if(count($res) == 0){
			$res = $this->base->database->request("SELECT string FROM language WHERE language.language = ? AND language.shortname = ? LIMIT 1", array($this->baselanguage, $shortname));
			// if the string is also not found in the base language, return the shortname as a worst-case-scenario
			if(count($res) == 0){
				return $shortname;
			}else{
				return $res[0]["string"];
			}
		}else{
			return $res[0]["string"];
		}
	}
	
	public function setLanguage($language){
		$this->language = $language;
	}
}