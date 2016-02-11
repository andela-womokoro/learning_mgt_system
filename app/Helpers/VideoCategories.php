<?php

class VideoCategories
{
    /**
     * Store all video categories in an array. Video categories are either add or removed from here.
     * @return array $categories
     */
    public static function getCategories()
    {
        $categories = [
                'Computing',
                'Science',
                'Technology',
                'Engineering',
                'Arts And Humanities'
            ];

        return $categories;
    }
}
