<?php

namespace Codefuze\Lisk\API;

use Codefuze\Lisk\Request;

class Delegates
{
	protected $client;
	public function __construct($client)
    {
		$this->client = $client;
	}

	public function enableDelegate($secret, $secondSecret = null, $username = null)
	{
		try {
			$payload = [
				'secret' => $secret
			];
			if ($secondSecret !== null)
			{
				$payload['secondSecret'] = $secondSecret;
			}
			if ($username !== null)
			{
				$payload['username'] = $username;
			} else {
				throw new \Exception('You must include a username between 1 and 20 characters!');
			}
			return Request::put($this->client, 'delegates', $payload);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function enable($secret, $secondSecret = null, $username = null)
	{
		return $this->enableDelegate($secret, $secondSecret, $username);
	}

	public function getDelegates($limit = 100, $offset = null, $field = 'rate:desc')
	{
		try {
			$parameters = [];
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
			return Request::get($this->client, 'delegates?' . $url);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function delegates($limit = 100, $offset = null, $field = 'rate:desc')
	{
		return $this->getDelegates($limit, $offset, $field);
	}

	public function getDelegate($publicKey = null, $username = null)
	{
		try {
			$parameters = [];
			if($publicKey !== null)
			{
				$parameters['publicKey'] = $publicKey;
			}
			if($username !== null)
			{
				$parameters['username'] = $username;
			}
			$url = http_build_query($parameters);
			return Request::get($this->client, 'delegates/get?' . $url);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function delegate($publicKey = null, $username = null)
	{
		return $this->getDelegate($publicKey, $username);
	}

	public function searchDelegate($username = null, $field = 'username:desc')
	{
		try {
			$parameters = [];
			if($username !== null)
			{
				$parameters['q'] = $username;
			} else {
				throw new \Exception('You must include a username!');
			}
			if($field !== null)
			{
				$parameters['orderBy'] = $field;
			}
			$url = http_build_query($parameters);
			return Request::get($this->client, 'delegates/search?' . $url);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function search($username = null, $field = 'username:desc')
	{
		return $this->searchDelegate($username, $field);
	}

	public function getCount()
	{
		try {
			return Request::get($this->client, 'delegates/count');
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function count()
	{
		return $this->getCount();
	}

	public function getVotes($address)
	{
		try {
			return Request::get($this->client, 'accounts/delegates/?address=' . $address);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function votes($address)
	{
		return $this->getVotes($address);
	}

	public function getVoters($publicKey)
	{
		try {
			return Request::get($this->client, 'delegates/voters?publicKey=' . $publicKey);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function voters($publicKey)
	{
		return $this->getVoters($publicKey);
	}

	public function enableForging($secret)
	{
		try {
			$payload = [
				'secret' => $secret
			];
			return Request::put($this->client, 'delegates/forging/enable', $payload);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function disableForging($secret)
	{
		try {
			$payload = [
				'secret' => $secret
			];
			return Request::put($this->client, 'delegates/forging/disable', $payload);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function getForged($generatorPublicKey = null, $start = null, $end = null)
	{
		try {
			$parameters = [];
			if($generatorPublicKey !== null)
			{
				$parameters['generatorPublicKey'] = $generatorPublicKey;
			}
			if($start !== null)
			{
				$parameters['start'] = $start;
			}
			if($end !== null)
			{
				$parameters['end'] = $end;
			}
			$url = http_build_query($parameters);
			return Request::get($this->client, 'delegates/forging/getForgedByAccount?' . $url);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function forged($generatorPublicKey = null, $start = null, $end = null)
	{
		return $this->getForged($generatorPublicKey, $start, $end);
	}

	public function nextForgers($limit = 10)
	{
		try {
			$parameters = [];
			if($limit !== null)
			{
				$parameters['limit'] = $end;
			}
			$url = http_build_query($parameters);
			return Request::get($this->client, 'delegates/getNextForgers?' . $url);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function next($limit = 10)
	{
		return $this->nextForgers($limit);
	}

}
