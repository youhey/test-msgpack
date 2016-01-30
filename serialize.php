<?php
/**
 * JSON と MessagePack のシリアライズ速度を比較
 *
 * @link http://www.lifehacker.jp/2015/08/150808mockaroo_1000.html ダミーデータ
 * @link https://github.com/msgpack/msgpack-php msgpack
 */
require __DIR__.DIRECTORY_SEPARATOR.'./vendor/autoload.php';

use Lavoiesl\PhpBenchmark\Benchmark;

$data = include __DIR__.DIRECTORY_SEPARATOR.'./data/mock_data.php';

$benchmark = new Benchmark;

$benchmark->add('big json', function() use ($data) {
    return json_encode($data);
});

$benchmark->add('big messagepack', function() use ($data) {
    return msgpack_pack($data);
});

$benchmark->add('big php', function() use ($data) {
    return serialize($data);
});

$benchmark->add('little json', function() use ($data) {
    return json_encode($data[0]);
});

$benchmark->add('little messagepack', function() use ($data) {
    return msgpack_pack($data[0]);
});

$benchmark->add('little php', function() use ($data) {
    return serialize($data[0]);
});

$benchmark->run();

