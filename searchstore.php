<?php
 
 
error_reporting(E_ALL); // Turn on all errors, warnings and notices for easier debugging
 
// API request variables
$endpoint  = 'http://svcs.ebay.com/services/search/FindingService/v1'; // URL to call
$version   = '1.11.0'; // API version supported by your application
$appid     = 'id'; // Replace with your own AppID
$globalid  = 'EBAY-UK'; // Global ID of the eBay site you want to search (e.g., EBAY-DE)
$query     = 'golf'; // You may want to supply your own query
$safequery = urlencode($query); // Make the query URL-friendly
 
// Construct the findItemsByKeywords HTTP GET call
$apicall = "$endpoint?";
$apicall .= "OPERATION-NAME=findItemsAdvanced";
$apicall .= "&SERVICE-VERSION=$version";
$apicall .= "&SECURITY-APPNAME=$appid";
$apicall .= "&GLOBAL-ID=$globalid";
$apicall .= "&keywords=$safequery";
$apicall .= "&paginationInput.entriesPerPage=12";
$apicall .= "&paginationInput.pageNumber=1";
$apicall .= "&categoryId=1513";
 
// Load the call and capture the document returned by eBay API
$resp = simplexml_load_file($apicall);
 
// Check to see if the request was successful, else print an error
if ($resp->ack == "Success") {
    $results = '';
    // If the response was loaded, parse it and build links
    foreach ($resp->searchResult->item as $item) {
        $pic   = $item->galleryURL;
        $link  = $item->viewItemURL;
        $title = $item->title;
        $price = $item->currentPrice;
 
        // For each SearchResultItem node, build a link and append it to $results
        $results .= "<div id='prod-wrap'><div class='prodimg-wrap' align='center'><img src=\"$pic\" class='prodimg'></div> <div class='prodtxt' align='center'><a href=\"$link\">$title</a>$price</div></div>";
    }
}
// If the response does not indicate 'Success,' print an error
else {
    $results = "<h3>Oops! The request was not successful. Make sure you are using a valid ";
    $results .= "AppID for the Production environment.</h3>";
}
?>