<?php

namespace Codefuze\Lisk;

use Codefuze\Lisk\Client;
use Codefuze\Lisk\API\Accounts;
use Codefuze\Lisk\API\Apps;
use Codefuze\Lisk\API\Blocks;
use Codefuze\Lisk\API\Delegates;
use Codefuze\Lisk\API\Loader;
use Codefuze\Lisk\API\MultiSignature;
use Codefuze\Lisk\API\Peers;
use Codefuze\Lisk\API\Signatures;
use Codefuze\Lisk\API\Transactions;

class Lisk
{
	private $host;
	private $port;
	private $ssl;
	public $client;
	public $accounts;
	public $apps;
	public $blocks;
	public $delegates;
	public $loader;
	public $multisignature;
	public $peers;
	public $signatures;
	public $transactions;

	public function __construct($host = null, $port = null, $ssl = null)
    {

		if ($host !== null)
		{
			$this->host = $host;
		} else {
			if (function_exists('config') && config('lisk.host') !== null)
			{
				$this->host = config('lisk.host');
			} else {
				$nodes = ['node01.lisk.io', 'node02.lisk.io', 'node03.lisk.io', 'node04.lisk.io', 'node05.lisk.io', 'node06.lisk.io', 'node07.lisk.io', 'node08.lisk.io'];
				$this->host = $nodes[array_rand($nodes)];
			}
		}
		if ($port !== null)
		{
			$this->port = $port;
		} else {
			if (function_exists('config') && config('lisk.host') !== null)
			{
				$this->port = config('lisk.port');
			} else {
				$this->port = 443;
			}
		}
		if ($ssl !== null)
		{
			$this->ssl = $ssl;
		} else {
			if (function_exists('config') && config('lisk.host') !== null)
			{
				$this->ssl = config('lisk.ssl');
			} else {
				$this->ssl = true;
			}
		}
		$this->client = new Client($this->host, $this->port, $this->ssl);
		$this->accounts = new Accounts($this->client);
		$this->apps = new Apps($this->client);
		$this->blocks = new Blocks($this->client);
		$this->delegates = new Delegates($this->client);
		$this->loader = new Loader($this->client);
		$this->multisignature = new MultiSignature($this->client);
		$this->peers = new Peers($this->client);
		$this->signatures = new Signatures($this->client);
		$this->transactions = new Transactions($this->client);
	}
}
