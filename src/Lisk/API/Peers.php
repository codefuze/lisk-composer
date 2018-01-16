<?php

namespace Codefuze\Lisk\API;

use Codefuze\Lisk\Request;

class Peers
{
	protected $client;
	public function __construct($client)
    {
		$this->client = $client;
	}

	public function getPeers($state = null, $os = null, $version = null, $limit = 100, $offset = null, $field = 'height:desc')
	{
		try {
			$parameters = [];
			if($state !== null)
			{
				$parameters['state'] = $state;
			}
			if($os !== null)
			{
				$parameters['os'] = $os;
			}
			if($version !== null)
			{
				$parameters['version'] = $version;
			}
			if($limit !== null)
			{
				$parameters['limit'] = $limit;
			}
			if($offset !== null)
			{
				$parameters['offset'] = $offset;
			}
			if($field !== null)
			{
				$parameters['orderBy'] = $field;
			}
			$url = http_build_query($parameters);
			return Request::get($this->client, 'peers?' . $url);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function peers($state = null, $os = null, $version = null, $limit = 100, $offset = null, $field = 'height:desc')
	{
		return $this->getPeers($state, $os, $version, $limit, $offset, $field);
	}

	public function getPeer($ip, $port)
	{
		try {
			return Request::get($this->client, 'peers/get?ip=' . $ip . '&port=' . $port);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function peer($ip, $port)
	{
		return $this->getPeer($ip, $port);
	}

	public function getVersion()
	{
		try {
			return Request::get($this->client, 'peers/version');
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function version()
	{
		return $this->getVersion();
	}
}
