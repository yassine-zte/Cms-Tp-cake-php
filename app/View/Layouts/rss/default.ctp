<?php
if (!isset($documentData)) {
    $documentData = array(
    	'xmlns:dc'=>'http://purl.org/dc/elements/1.1/'
    	);
}
if (!isset($channelData)) {
    $channelData = array();
}
if (!isset($channelData['title'])) {
    $channelData['title'] = $this->fetch('title');
}
$channel = $this->Rss->channel(array(), $channelData, $this->fetch('content'));
echo $this->Rss->document($documentData, $channel);

?>
