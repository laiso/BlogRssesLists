<?php
class RssListsController extends AppController {
	var $name = 'Rss_lists';
    var $uses = array('RssList', 'BlogRssList');

    function index() {
        $rsslists = $this->RssLists->find('all', 'rss_url');
        $blogRsslists = $this->BlogRssList->find('all', 'pub_date');

        $this->set('rsslists', $rsslists);
        $this->set('blogrsses', $blogRsslists);

        $result = RssList::doSomething($rsslists, $blogRsslists);
        $this->set('result', $result);
    }
}
