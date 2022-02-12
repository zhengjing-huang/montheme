<?php
class YtbWidget extends WP_Widget{
    public function __construct()
    {
        parent::__construct('youtube_widget','Youtube Widget');
    }

    public function widget($args, $instance)
    {
        # code...
    }

    public function form($instance)
    {
        # code...
    }

    public function update($newInstance,$oldInstance)
    {
        return [];
    }
}