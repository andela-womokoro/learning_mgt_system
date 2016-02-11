<?php

class VideoIDExtractor
{
    /**
     * Extract Youtube video ID from a Youtube video URL.
     * @param  $youtubeURL
     * @return String  $youtubeVideoID
     */
    public static function getVideoID($youtubeURL)
    {
        $youtubeVideoID = str_replace('=', '', strrchr($youtubeURL, '='));

        return $youtubeVideoID;
    }
}
