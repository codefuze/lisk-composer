<?php

namespace Codefuze\Lisk\API;

use Codefuze\Lisk\Request;

class MultiSignature
{
	protected $client;
	public function __construct($client)
    {
		$this->client = $client;
	}

	public function getMultisignatures($secret, $lifetime, $min, $keysgroup, $secondSecret = null)
	{
		try {
			$payload = [
				'secret' => $secret,
				'lifetime' => $lifetime,
				'min'	=> $min,
				'keysgroup' => $keysgroup
			];
			if ($secondSecret !== null)
			{
				$payload['secondSecret'] = $secondSecret;
			}
			return Request::put($this->client, 'multisignatures', $payload);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function multisignatures($secret, $lifetime, $min, $keysgroup, $secondSecret = null)
	{
		return $this->getMultisignatures($secret, $lifetime, $min, $keysgroup, $secondSecret);
	}

	public function getAccounts($publicKey)
	{
		try {
			$parameters = [
				'publicKey' => $publicKey
			];
			$url = http_build_query($parameters);
			return Request::get($this->client, 'multisignatures/accounts?' . $url);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function accounts($publicKey)
	{
		return $this->getAccounts($publicKey);
	}

	public function signTransaction($secret, $transactionId)
	{
		try {
			$payload = [
				'secret' => $secret,
				'transactionId' => $transactionId
			];
			return Request::post($this->client, 'multisignatures/sign', $payload);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function sign($secret, $transactionId)
	{
		return $this->signTransaction($secret, $transactionId);
	}

	public function getPending($publicKey)
	{
		try {
			return Request::get($this->client, 'multisignatures/pending?publicKey=' . $publicKey);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function pending($publicKey)
	{
		return $this->getPending($publicKey);
	}
}
