<?php

namespace Codefuze\Lisk\API;

use Codefuze\Lisk\Request;

class Transactions
{
	protected $client;
	public function __construct($client)
    {
		$this->client = $client;
	}

	public function getTransactions($blockId = null, $senderId = null, $recipientId = null, $limit = 100, $offset = null, $field = 'timestamp:desc')
	{
		try {
			$parameters = [];
			if($blockId !== null)
			{
				$parameters['blockId'] = $blockId;
			}
			if($senderId !== null)
			{
				$parameters['senderId'] = $senderId;
			}
			if($recipientId !== null)
			{
				$parameters['recipientId'] = $recipientId;
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
			return Request::get($this->client, 'transactions?' . $url);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function transactions($blockId = null, $senderId = null, $recipientId = null, $limit = 100, $offset = null, $field = 'timestamp:desc')
	{
		return $this->getTransactions($blockId, $senderId, $recipientId, $limit, $offset, $field);
	}

	public function sendTransaction($amount, $recipientId, $secret, $secondSecret = null)
	{
		try {
			$payload = [
				'recipientId' => $recipientId,
				'secret' => $secret
			];
			if(is_float($amount))
			{
				$payload['amount'] = $amount * pow(10, 8);
			} elseif(is_int($amount))
			{
				if($amount >= pow(10, 8))
				{
					$payload['amount'] = $amount;
				} else {
					$payload['amount'] = $amount * pow(10, 8);
				}
			} else {
				throw new \Exception('Amount must be a float, an integer, or an integer * 10^8!');
			}
			if ($secondSecret !== null)
			{
				$payload['secondSecret'] = $secondSecret;
			}
			return Request::put($this->client, 'transactions', $payload);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function send($amount, $recipientId, $secret, $secondSecret = null)
	{
		return $this->sendTransaction($amount, $recipientId, $secret, $secondSecret);
	}

	public function getTransaction($id)
	{
		try {
			return Request::get($this->client, 'transactions/get?id=' . $id);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function transaction($id)
	{
		return $this->getTransaction($id);
	}

	public function getUnconfirmed($id)
	{
		try {
			return Request::get($this->client, 'transactions/unconfirmed/get?id=' . $id);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function unconfirmed()
	{
		try {
			return Request::get($this->client, 'transactions/unconfirmed');
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function queued()
	{
		try {
			return Request::get($this->client, 'transactions/queued');
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function getQueued($id)
	{
		try {
			return Request::get($this->client, 'transactions/queued/get?id=' . $id);
		} catch (\Exception $e) {
			throw $e;
		}
	}
}
