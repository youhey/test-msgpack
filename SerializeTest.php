<?php

class SerializeTest extends PHPUnit_Framework_TestCase
{
    protected $json_data;
    protected $php_data;

    protected function setUp()
    {
        $this->json_data = file_get_contents(__DIR__.DIRECTORY_SEPARATOR.'./data/MOCK_DATA.json');
        $this->php_data  = include __DIR__.DIRECTORY_SEPARATOR.'./data/mock_data.php';
    }

    public function testMsgpack()
    {
        $msg = msgpack_pack($this->php_data);
        $data = msgpack_unpack($msg);
        $this->assertEquals($this->php_data, $data);
    }
}
