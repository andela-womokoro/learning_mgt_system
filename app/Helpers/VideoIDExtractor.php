<?php

class VideoIDExtractor
{
    public static function getVideoID($youtubeURL)
    {
        $youtubeVideoID = str_replace('=', '', strrchr($youtubeURL, '='));

        return $youtubeVideoID;
    }
}
