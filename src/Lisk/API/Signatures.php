<?php

namespace Codefuze\Lisk\API;

use Codefuze\Lisk\Request;

class Signatures
{
	protected $client;
	public function __construct($client)
    {
		$this->client = $client;
	}

	public function getFee()
	{
		try {
			return Request::get($this->client, 'signatures/fee');
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function fee()
	{
		return $this->getFee();
	}

	public function addSignature($secret, $secondSecret = null)
	{
		try {
			$payload = [
				'secret' => $secret
			];
			if ($secondSecret !== null)
			{
				$payload['secondSecret'] = $secondSecret;
			} else {
				throw new \Exception('You must include a second secret!');
			}
			return Request::put($this->client, 'signatures', $payload);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function add($secret, $secondSecret = null)
	{
		return $this->addSignature($secret, $secondSecret);
	}

}
