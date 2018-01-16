<?php

namespace Codefuze\Lisk;

use GuzzleHttp\Client as Guzzle;

class Client
{
	public $protocol;
	public $baseURI;
	public $request;

    public function __construct($host, $port, $ssl)
    {
		$this->protocol = ($ssl ? 'https' : 'http');
		if ($port == 80 || $port == 443)
		{
			$this->baseURI = $this->protocol . '://' . $host . '/api/';
		} else {
			$this->baseURI = $this->protocol . '://' . $host . ':' . $port . '/api/';
		}
        $this->request = new Guzzle(['base_uri' => $this->baseURI]);
    }
}
