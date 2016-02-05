 <?php
    $youtubeURL = $video->url;
    $extracted = strrchr($youtubeURL, '=');
    $youtubeVideoID = str_replace('=', '', $extracted);
?>