<?php
// Load the PHPZip library
require_once('vendor/autoload.php');

// Get the uploaded file
$file = $_FILES['file']['tmp_name'];

// Extract the text from the .docx file
$zip = new PHPZip($file);
$docXml = $zip->getEntryContents('word/document.xml');
$text = strip_tags($docXml);

// Count the number of words in the text
$wordCount = preg_match_all('/\b\w+\b/', $text);

// Send the word count back to the client-side JavaScript code
echo json_encode(array('wordCount' => $wordCount));
?>
