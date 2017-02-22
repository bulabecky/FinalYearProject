<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
echo "<?xml version='1.0' ?>";
echo ("<script>console.log('opening of page');</script>");
function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// Opens a connection to a mysqli server
$con = mysqli_connect("localhost","root","Beckyboo4","map");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,'SELECT * FROM `markers` WHERE 1');
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}


// Start XML file, echo parent node
echo ('<markers>');

// Iterate through the rows, printing XML nodes for each
while ($row = mysqli_fetch_assoc($result)){

  echo ("<script>console.log('Heuston, we are in!');</script>");
  // Add to XML document node
  echo __LINE__;exit;
  echo '<marker ';
  echo 'name="' . parseToXML($row['name']) . '" ';
  echo 'address="' . parseToXML($row['address']) . '" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
  echo 'type="' . $row['type'] . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';

?>