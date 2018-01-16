<?php

namespace Codefuze\Lisk\API;

use Codefuze\Lisk\Request;

class Blocks
{
	protected $client;
	public function __construct($client)
    {
		$this->client = $client;
	}

	public function getBlocks($generatorPublicKey = null, $height = null, $previousBlock = null, $totalAmount = null, $totalFee = null, $limit = 20, $offset = null, $field = 'height:desc')
	{
		try {
			$parameters = [];
			if($generatorPublicKey !== null)
			{
				$parameters['generatorPublicKey'] = $generatorPublicKey;
			}
			if($height !== null)
			{
				$parameters['height'] = $height;
			}
			if($previousBlock !== null)
			{
				$parameters['previousBlock'] = $previousBlock;
			}
			if($totalAmount !== null)
			{
				$parameters['totalAmount'] = $totalAmount;
			}
			if($totalFee !== null)
			{
				$parameters['totalFee'] = $totalFee;
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
			return Request::get($this->client, 'blocks?' . $url);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function blocks($generatorPublicKey = null, $height = null, $previousBlock = null, $totalAmount = null, $totalFee = null, $limit = 20, $offset = null, $field = 'height:desc')
	{
		return $this->getBlocks($generatorPublicKey, $height, $previousBlock, $totalAmount, $totalFee, $limit, $offset, $field);
	}

	public function getBlock($id)
	{
		try {
			return Request::get($this->client, 'blocks/get?id=' . $id);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function block($id)
	{
		return $this->getBlock($id);
	}

	public function getFee()
	{
		try {
			return Request::get($this->client, 'blocks/getFee');
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function fee()
	{
		return $this->getFee();
	}

	public function getFees()
	{
		try {
			return Request::get($this->client, 'blocks/getFees');
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function fees()
	{
		return $this->getFees();
	}

	public function getReward()
	{
		try {
			return Request::get($this->client, 'blocks/getReward');
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function reward()
	{
		return $this->getReward();
	}

	public function getSupply()
	{
		try {
			return Request::get($this->client, 'blocks/getSupply');
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function supply()
	{
		return $this->getSupply();
	}

	public function getHeight()
	{
		try {
			return Request::get($this->client, 'blocks/getHeight');
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function height()
	{
		return $this->getHeight();
	}

	public function getStatus()
	{
		try {
			return Request::get($this->client, 'blocks/getStatus');
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function status()
	{
		return $this->getStatus();
	}

	public function getNethash()
	{
		try {
			return Request::get($this->client, 'blocks/getNethash');
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function nethash()
	{
		return $this->getNethash();
	}

	public function getMilestone()
	{
		try {
			return Request::get($this->client, 'blocks/getMilestone');
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function milestone()
	{
		return $this->getMilestone();
	}
}
