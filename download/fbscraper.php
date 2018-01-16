<?php
/*
 * Disclaimer
 * This script should be used for learning purposes only.
 * By downloading and running this script you take every responsibility for wrong or illegal uses of it.
 * Please read Facebook Terms of Service for more information: https://www.facebook.com/terms
 */

/*
 * MIT License

 * Copyright (c) 2016 NerdsUnity

 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation
 * files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify,
 * merge, publish, distribute, sublicense, and/or sell copies of the Software,
 * and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:

 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the
 * Software.

 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED,
 * INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR
 * PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE
 * FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE,
 * ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

require("httpful.phar");

/* THIS IS A BUG */
// ->;This\$isA\$Bug;<-



$file = fopen("./phone.txt", "r");
$members = array();
while (!feof($file)) {
   $members[] = fgets($file);
}
fclose($file);
$phone = array(
'0983473762',
'01638930692',
'0986735283',
'0982303017',
'0905088618',
'0949585555',
'01679023900',
'0984463543',
'0983936231',
'01643559975',
);
foreach($phone as $emailToScrape){
// $emailToScrape = "01666001485";
$fbQueryUrl = "https://www.facebook.com/search/people/?q=".$emailToScrape;
	$fbQuery = \Httpful\Request::get($fbQueryUrl)->expectsHtml()->send();
	if (strpos($fbQuery->body, 'captcha_persist_data') !== false) {
		echo "FACEBOOK CAPTCHA ENABLED. DYING..\n";
		die;
	}

	if (strpos($fbQuery->body, 'pagelet_search_no_results') !== false) {
		$fbUserId = '';
		$params = array($emailToScrape,$fbUserId);
		echo  json_encode($params,true);
	}

	preg_match('/\&#123;&quot;id&quot;:(?P<fbUserId>\d+)\,/', $fbQuery->body, $matches);

	if(isset($matches["fbUserId"]) && $matches["fbUserId"] != ""){
		$fbUserId = $matches["fbUserId"];
		$params = array($emailToScrape,$fbUserId);
		echo  json_encode($params,true);
	}
}
?>