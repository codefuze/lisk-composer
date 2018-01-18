# Lisk Composer
Lisk Composer is a Lisk API package for use in Laravel and PHP composer projects using Guzzle.
  - Simple yet powerful Lisk API wrapper for PHP
  - Laravel integration with a service provider and config options
  - Can connect to local, custom, or official nodes
  - Easy to understand with documentation

### Requirements
* **PHP** >= 7.0.0
* **cURL** PHP Extension
* [Composer](https://getcomposer.org/)
* (Optional) **Laravel** >= 5.5

### Dependencies
* [Guzzle](http://guzzlephp.org/) - an extensible PHP HTTP client.

### Installation

After you have met the above requirements you can install Lisk Composer into your project using the following command in you project root:

```sh
$ composer require "codefuze/lisk-composer:5.5.*"
```

> Laravel >= 5.5 supports auto-discovery does **not** require you to add service proiders or aliases > to your configs, however if you are having issues you can add them to your **config/app.php** file

```php
'providers' => [
.....
    Codefuze\Lisk\LiskServiceProvider::class,
],
'aliases' => [
.....
    'Lisk' => Codefuze\Lisk\Lisk::class,
```

### Using
You can set the node to connect to when creating an instance of Lisk. If you do not include a connection then a random mainnet node will be used for each instance. If using Laravel you can publish the config file and change the default values so they will be used on any instance without providing the connection.

To publish the config file use the following command to publish to config/lisk.php
```sh
$ php artisan vendor:publish
```

##### Examples

Define a connection:
```php
use Codefuze\Lisk\Lisk;
.....
$lisk = new Lisk('node01.lisk.io', 443, true);
$response = $lisk->accounts->get('11689559667869482649L');
var_dump($response);
```

No connection provided (will use random official node or check config file):
```php
use Codefuze\Lisk\Lisk;
.....
$lisk = new Lisk();
$response = $lisk->accounts->get('11689559667869482649L');
var_dump($response);
```

Testnet:
```php
use Codefuze\Lisk\Lisk;
.....
$lisk = new Lisk('testnet.lisk.io', 443, true);
$response = $lisk->accounts->get('11689559667869482649L');
var_dump($response);
```

### Contributions
Want to contribute? **Great!**
Feel free to fork, post issues, or submit PRs.

**Consider donating some Lisk to:**
11689559667869482649L

### Todos
 - [x] Complete all API endpoints
 - [x] Complete documentation
 - [ ] Unit testing
 - [ ] Artisan commands

License
----

MIT License

Copyright (c) 2018 codefuze

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
