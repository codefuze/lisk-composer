<?php

namespace Codefuze\Lisk;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\BadResponseException;

Class Request
{
	public static function get($client, $url)
	{
		try
		{
			$request = $client->request->get($url);
			$response = json_decode($request->getBody());
			if ($response->success == true)
			{
				return $response;
			} else {
				throw new \Exception($response->error);
			}
		}
		catch (RequestException $e)
		{
			throw $e;
		}
		catch (BadResponseException $e)
		{
			throw $e;
		}
	}

	public static function post($client, $url, $payload)
	{
		try
		{
			$request = $client->request->post($url, [
				'json' => $payload
			]);
			$response = json_decode($request->getBody());
			if ($response->success == true)
			{
				return $response;
			} else {
				throw new \Exception($response->error);
			}
		}
		catch (RequestException $e)
		{
			throw $e;
		}
		catch (BadResponseException $e)
		{
			throw $e;
		}
	}

	public static function put($client, $url, $payload)
	{
		try
		{
			$request = $client->request->put($url, [
				'json' => $payload
			]);
			$response = json_decode($request->getBody());
			if ($response->success == true)
			{
				return $response;
			} else {
				throw new \Exception($response->error);
			}
		}
		catch (RequestException $e)
		{
			throw $e;
		}
		catch (BadResponseException $e)
		{
			throw $e;
		}
	}
}
