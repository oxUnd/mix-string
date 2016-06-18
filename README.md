# Shouding\Mix\Str

## Description

When unicode characters and ascii characters mixed, according to your needs, calculate the length of the string

## Example

need composer

```json
{
    "require": {
        "shouding/mix-string": "1.0.0"
    }
}
```

```php
>>> require('vendor/autoload.php')
=> Composer\Autoload\ClassLoader {#162}
>>> use Shouding\Mix\Str;
=> null
>>> Str::length("this is a test 中国")
=> 6
>>> Str::length("this is a test 中国", Str::TYPE_CHAR)
=> 17
>>> Str::length("this is a test 中国", Str::TYPE_BYTES)
=> 21
```