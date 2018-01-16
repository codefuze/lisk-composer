<?php

namespace Codefuze\Lisk\API;

use Codefuze\Lisk\Request;

class Accounts
{
	protected $client;
	public function __construct($client)
    {
		$this->client = $client;
	}

	public function openAccount($secret)
	{
		try {
			$payload = [
				'secret' => $secret
			];
			return Request::post($this->client, 'accounts/open', $payload);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function open($secret)
	{
		return $this->openAccount($secret);
	}

	public function getBalance($address)
	{
		try {
			return Request::get($this->client, 'accounts/getBalance?address=' . $address);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function balance($address)
	{
		return $this->getBalance($address);
	}

	public function getPublicKey($address)
	{
		try {
			return Request::get($this->client, 'accounts/getPublicKey?address=' . $address);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function key($address)
	{
		return $this->getPublicKey($address);
	}

	public function generatePublicKey($secret)
	{
		try {
			$payload = [
				'secret' => $secret
			];
			return Request::post($this->client, 'accounts/generatePublicKey', $payload);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function generate($secret)
	{
		return $this->generatePublicKey($secret);
	}

	public function getAccount($address)
	{
		try {
			return Request::get($this->client, 'accounts?address=' . $address);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function get($address)
	{
		return $this->getAccount($address);
	}

	public function getDelegates($address)
	{
		try {
			return Request::get($this->client, 'delegates?address=' . $address);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function delegates($address)
	{
		return $this->getDelegates($address);
	}

	public function voteDelegates($delegates, $secret, $secondSecret = null)
	{
		try {
			if (is_array($delegates))
			{
				if (count($delegates) <= 33)
				{
					$payload = [
						'secret' => $secret,
						'delegates' => $delegates
					];
					if ($secondSecret !== null)
					{
						$payload['secondSecret'] = $secondSecret;
					}
					return Request::put($this->client, 'accounts/delegates', $payload);
				} else {
					throw new \Exception('You can only vote for 33 delegates at a time!');
				}
			} else {
				throw new \Exception('Delegates must be an array!');
			}
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function vote($delegates, $secret, $secondSecret = null)
	{
		return $this->voteDelegates($delegates, $secret, $secondSecret);
	}
}
