<?php
/**
 * JSON と MessagePack のデコード速度を比較
 *
 * @link http://www.lifehacker.jp/2015/08/150808mockaroo_1000.html ダミーデータ
 * @link https://github.com/msgpack/msgpack-php msgpack
 */
require __DIR__.DIRECTORY_SEPARATOR.'./vendor/autoload.php';

use Lavoiesl\PhpBenchmark\Benchmark;

$data = include __DIR__.DIRECTORY_SEPARATOR.'./data/mock_data.php';

$json = file_get_contents(__DIR__.DIRECTORY_SEPARATOR.'./data/MOCK_DATA.json');
$msgpack = file_get_contents(__DIR__.DIRECTORY_SEPARATOR.'./data/mock_data.msgpack');
$php = serialize($data);

$benchmark = new Benchmark;

$benchmark->add('json', function() use ($json) {
    return json_decode($json);
});

$benchmark->add('messagepack', function() use ($msgpack) {
    return msgpack_pack($msgpack);
});

$benchmark->add('php', function() use ($php) {
    return unserialize($php);
});

$benchmark->run();

