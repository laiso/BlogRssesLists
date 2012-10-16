<?php

class RSSListsControllerTest extends CakeWebTestCase {
    function setUp(){
        $this->end_point = 'http://localhost:9001/rsslists';
    }

    function testAnyResponse(){
        $this->assertTrue($this->get($this->end_point));
    }
}