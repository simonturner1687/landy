<?php
include 'model/m_events.php';

$devID = 'f78fc8ed-773d-4dee-93a1-2e7d358b3567';
$appID = 'woodhous-woodhous-PRD-6e6e89e50-38222e10';
$certID = 'PRD-e6e89e5081d0-886a-481f-a875-8946';
$serverUrl = 'https://api.ebay.com/ws/api.dll';
//Use this URL for sandbox mode: https://api.sandbox.ebay.com/ws/api.dll
//Use this URL for production mode: https://api.ebay.com/ws/api.dll
$userToken = 'AgAAAA**AQAAAA**aAAAAA**o/LXVw**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6AFlYqpDJCEpAWdj6x9nY+seQ**TW4DAA**AAMAAA**sV7Z2+u1S8JK8jtojSz92QBmK1DP53ojDLyub3M8ilsluqTDXKrv3/FLJs1EaPnySVRSiKzVgDagzye8OQTGTmZV961AMEUMi/U+MZzJN3ou7EYa/iaSEfRGKUOLC63nhXMIlEDTP6RjNM3QaViPx2cLahR6byhGUV7PfNhmhLA+8iY8Sf3vRzBETAtW1+RLTik8f5Ah5f7fXtdlky51Sl4bxiVcXrCgbymdk6ycwE3MAsoUEC33skrhKUoyj+l4rxi+miuCSXMmrRl9g5B0eJqZ3QUztHzS6nY7agDolZydq1rBd1R9/vbGmfmEi9YuAwDCvkEGWU3/W7kGb+40vMXg1ETCoMj7Mcg8qGgpEvTZe23nJD6YlhqA+d0hlsFhnMVobZsHWZiqy0irrFhTn2W4fdn40MkpDYoeHUPp1JYZV/8KfR5QOGom2Mgg4eM5ooMpRBVIKglpIcvj82cS5s6AawhNSFlk50KrXK1Iq6HK86H6WQwOuRnvsjoZGA8x0ENXpXYbk1BCB/skkpUyBnAKaZpCZCZbm14iHiHcf9eAxR9tfHVnUH2H9vF1URi2Gi1ba3AqFFBqzIERudGr4NhEFVs+iOfKdVPiaNv2UpoU8FnEDYg9UHKJhpGmmY5kwl5AQ9FmY7x8WF6pvgK5niPmDv8uGTVNwMJB27TORpO4oUELxs09SLyoDiWeGH6wBRlNo6o53WiKLllbOKuCJIGq0kvjRGUyq9X58pULIdEDdVN3zIe4F0vPU2te7hWN';

$username = 'woodhouseautomotiveltd';
//1158840659
//SiteID must also be set in the Request's XML
//SiteID = 0  (US) – UK = 3, Canada = 2, Australia = 15, ….
//SiteID Indicates the eBay site to associate the call with


$date= date_create();
$timestamp = date_timestamp_get($date);
date_sub($date,date_interval_create_from_date_string("120 days"));
$startfrom = date_format($date,"Y-m-d");

$date= date_create();
$timestamp = date_timestamp_get($date);
date_sub($date,date_interval_create_from_date_string("1 days"));
$startto = date_format($date,"Y-m-d");


$siteID = 3;
$verb = 'GetSellerList'; //API call name
$StartTimeFrom = $startfrom.'T21:59:59.005Z';
$StartTimeTo = $startto.'T21:59:59.005Z';
$EntriesPerPage = '200';

$headers = array (
//Regulates versioning of the XML interface for the API
'X-EBAY-API-COMPATIBILITY-LEVEL: 967',

//set the keys
'X-EBAY-API-DEV-NAME:  '. $devID,
'X-EBAY-API-APP-NAME:  '. $appID,
'X-EBAY-API-CERT-NAME: ' . $certID,

//the name of the call we are requesting
'X-EBAY-API-CALL-NAME: ' . $verb,

'X-EBAY-API-SITEID:  '. $siteID,
);

//Build the request Xml string
$requestXmlBody ='<xml version=\"1.0" encoding="utf-8">
<GetSellerListRequest xmlns="urn:ebay:apis:eBLBaseComponents">
<RequesterCredentials>
<eBayAuthToken>'.$userToken.'</eBayAuthToken>
</RequesterCredentials>
<ErrorLanguage>en_US</ErrorLanguage>
<WarningLevel>High</WarningLevel>
<UserID>'.$username.'</UserID>
<DetailLevel>ReturnAll</DetailLevel>
<StartTimeFrom>'.$StartTimeFrom.'</StartTimeFrom>
<StartTimeTo>'.$StartTimeTo.'</StartTimeTo>
<Pagination>
<EntriesPerPage>'.$EntriesPerPage.'</EntriesPerPage>
</Pagination>
</GetSellerListRequest>';

//build eBay headers using variables passed via constructor

//initialise a CURL session
$connection = curl_init();
//set the server we are using (could be Sandbox or Production server)
curl_setopt($connection, CURLOPT_URL, $serverUrl);

//stop CURL from verifying the peer's certificate
curl_setopt($connection, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($connection, CURLOPT_SSL_VERIFYHOST, 0);

//set the headers using the array of headers
curl_setopt($connection, CURLOPT_HTTPHEADER, $headers);

//set method as POST
curl_setopt($connection, CURLOPT_POST, 1);

//set the XML body of the request
curl_setopt($connection, CURLOPT_POSTFIELDS, $requestXmlBody);

//set it to return the transfer as a string from curl_exec
curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);

//Send the Request
$response = curl_exec($connection);

//close the connection
curl_close($connection);

if(stristr($response, 'HTTP 404') || $response == '')
die('<P>Error sending request');

$resultXmlData = simplexml_load_string($response);


$ebay_id = ''; 
$title = ''; 
$description = ''; 
$listing_status = ''; 
$current_price = ''; 
$quant = ''; 
$image_1 = ''; 
$image_2 = ''; 
$image_3 = ''; 
$image_4 = ''; 
$image_5 = ''; 
$image_6 = ''; 
$image_7 = ''; 
$image_8 = ''; 
$image_9 = ''; 
$image_10 = ''; 
$image_11 = ''; 
$image_12 = '';


foreach ($resultXmlData->ItemArray->Item as $item) {

 $ebay_id = $item->ItemID;
 $title = $item->Title;
 $description = $item->Description;
 $current_price = $item->SellingStatus->CurrentPrice;
 $listing_status = $item->SellingStatus->ListingStatus;
 $quant = $item->Quantity;
 $no = 1;
foreach ($item->PictureDetails->PictureURL as $picture) {
	
	${'image_' . $no} = $picture; 

    $no++;

	}

	$eBay_Dump = new Posts();
    $ebay_dump = $eBay_Dump->ebay_dump($ebay_id, $title, $description, $listing_status, $current_price, $quant, $image_1, $image_2, $image_3, $image_4, $image_5, $image_6, $image_7, $image_8, $image_9, $image_10, $image_11, $image_12);
}

?>