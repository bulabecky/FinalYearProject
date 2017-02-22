<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
echo "<?xml version='1.0' ?>";
echo ("<script>console.log('opening of page');</script>");
function parseToXML($htmlStr)  echo __LINE__;exit;
{
$xmlStr=str_replace('<','&lt;',$htmlStr);  echo __LINE__;exit;
$xmlStr=str_replace('>','&gt;',$xmlStr);  echo __LINE__;exit;
$xmlStr=str_replace('"','&quot;',$xmlStr);  echo __LINE__;exit;
$xmlStr=str_replace("'",'&#39;',$xmlStr);  echo __LINE__;exit;
$xmlStr=str_replace("&",'&amp;',$xmlStr);  echo __LINE__;exit;
return $xmlStr;  echo __LINE__;exit;
}

// Opens a connection to a mysqli server
$con = mysqli_connect("localhost","root","Beckyboo4","map");  echo __LINE__;exit;
// Check connection
if (mysqli_connect_errno())  echo __LINE__;exit;
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();  echo __LINE__;exit;
}

$result = mysqli_query($con,'SELECT * FROM `markers` WHERE 1');  echo __LINE__;exit;
if (!$result) {  echo __LINE__;exit;
  die('Invalid query: ' . mysqli_error());  echo __LINE__;exit;
}


// Start XML file, echo parent node
echo ('<markers>');  echo __LINE__;exit;

// Iterate through the rows, printing XML nodes for each
while ($row = mysqli_fetch_assoc($result)){  echo __LINE__;exit;

  echo ("<script>console.log('Heuston, we are in!');</script>");
  // Add to XML document node
  echo __LINE__;exit;
  echo '<marker ';  echo __LINE__;exit;
  echo 'name="' . parseToXML($row['name']) . '" ';  echo __LINE__;exit;
  echo 'address="' . parseToXML($row['address']) . '" ';  echo __LINE__;exit;
  echo 'lat="' . $row['lat'] . '" ';  echo __LINE__;exit;
  echo 'lng="' . $row['lng'] . '" ';  echo __LINE__;exit;
  echo 'type="' . $row['type'] . '" ';  echo __LINE__;exit;
  echo '/>';  echo __LINE__;exit;
}  echo __LINE__;exit;

// End XML file
echo '</markers>';  echo __LINE__;exit;

?>