<?php

class RSSList extends AppModel {
    var $fetcher;

    function RSSList(){
        $this->fetcher = new RssFetcher();
    }

    static function doSomething($rssLists, $blogRssLists){
        $result = array();
        foreach ($rssLists as $rssList) {
            $result[] = $rssList->doSomethingOne();
        }
        return $result;
    }

    function doSomethingOne(){
        $rss = $this->fetcher->exec($this->rss_url);
        foreach ($rss->items as $key => $item) {

        }
    }
}
