<?php
	function getInput($name){
		if($_SERVER['REQUEST_METHOD']=='GET')
			return htmlspecialchars(strip_tags($_GET[$name], ENT_QUOTES));
		if($_SERVER['REQUEST_METHOD']=='POST')
			return htmlspecialchars(strip_tags($_POST[$name]), ENT_QUOTES);
	}
	
	function getAccess($access){
		$accesslev[0]='Member';
		$accesslev[7]='Admin';
		$accesslev[9]='Servant';
		return $accesslev[$access];
	}
	
	function doMysqlError(){
		return mysql_errno().': '.mysql_error();
	}
	
	function friendlyDate($date_to_format){
		return date('D, d M Y', strtotime($date_to_format));
	}
	
	function format_number($num){
		return number_format($num, 2, '.', ',');
	}

	function getLanguage($language){
		$languageArr[0]= 'None';
		$languageArr[1]= 'English';
		$languageArr[2]= 'Kiswahilli';
		$languageArr[3]= 'Kikuyu';
		$languageArr[4]= 'Dholuo';
		$languageArr[5]= 'Kalenjin';
		$languageArr[6]= 'French';
		$languageArr[7]= 'Africaans';
		$languageArr[8]= 'Zulu';
		$languageArr[9]= 'Chinese';
		$languageArr[10]= 'Kamba';
		$languageArr[11]= 'Other';
		return $languageArr[$language];
	}
		
	function getCountry($country){
		$countryArr[0]= 'None';
		$countryArr[1]= 'Kenya';
		$countryArr[2]= 'Uganda';
		$countryArr[3]= 'Tanzania';
		$countryArr[4]= 'Rwanda';
		$countryArr[5]= 'Burundi';
		$countryArr[6]= 'DRC';
		$countryArr[7]= 'Nigeria';
		$countryArr[8]= 'Cameroon';
		$countryArr[9]= 'South Africa';
		$countryArr[10]= 'USA';
		$countryArr[11]= 'Britain';
		$countryArr[12]= 'China';
		$countryArr[13]= 'Australia';
		$countryArr[14]= 'Japan';
		$countryArr[15]= 'India';
		$countryArr[16]= 'Canada';
		$countryArr[17]= 'Germany';
		$countryArr[18]= 'Other';
		return $countryArr[$country];
	}
		
	function getYesno($ans){
		$pubArr[0]= 'Error';
		$pubArr[1]= 'Yes';
		$pubArr[2]= 'No';
		return $pubArr[$ans];
	}
?>