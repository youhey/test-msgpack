# test-msgpack
Studying messagepack

```
$ php serialize.php
Running tests 2000 times.
Testing 6/6 : little phpsagepack

Test                    Time   Time (%)   Memory   Memory (%)
little php              1 ms                 0 B
little messagepack      1 ms                 0 B
little json             1 ms                 0 B
big php               886 ms    88500 %      0 B
big messagepack       918 ms    91700 %      0 B
big json             1913 ms   191200 %      0 B
```

```
$ php unserialize.php
Running tests 1000 times.
Testing 3/3 : phpsagepack

Test             Time   Time (%)   Memory   Memory (%)
messagepack      9 ms                 0 B
php            910 ms    10011 %      0 B
json          1774 ms    19611 %      0 B
```
