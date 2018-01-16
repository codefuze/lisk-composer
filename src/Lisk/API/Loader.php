<?php

namespace Codefuze\Lisk\API;

use Codefuze\Lisk\Request;

class Loader
{
	protected $client;
	public function __construct($client)
    {
		$this->client = $client;
	}

	public function status()
	{
		try {
			return Request::get($this->client, 'loader/status');
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function sync()
	{
		try {
			return Request::get($this->client, 'loader/status/sync');
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function ping()
	{
		try {
			return Request::get($this->client, 'loader/status/ping');
		} catch (\Exception $e) {
			throw $e;
		}
	}
}
