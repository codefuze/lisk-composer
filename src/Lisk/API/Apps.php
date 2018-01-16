<?php

namespace Codefuze\Lisk\API;

use Codefuze\Lisk\Request;

class Apps
{
	protected $client;
	public function __construct($client)
    {
		$this->client = $client;
	}

	public function registerApp($secret, $category, $name, $link, $description = null, $tags = null, $type = 0, $icon = null, $secondSecret = null)
	{
		try {
			$payload = [
				'secret' => $secret,
				'category' => $category,
				'name'	=> $name,
				'link' => $link
			];
			if ($description !== null)
			{
				$payload['description'] = $description;
			}
			if ($tags !== null)
			{
				$payload['tags'] = $tags;
			}
			if ($type !== null)
			{
				$payload['type'] = $type;
			}
			if ($icon !== null)
			{
				$payload['icon'] = $icon;
			}
			if ($secondSecret !== null)
			{
				$payload['secondSecret'] = $secondSecret;
			}
			return Request::put($this->client, 'delegates', $payload);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function register($secret, $category, $name, $link, $description = null, $tags = null, $type = 0, $icon = null, $secondSecret = null)
	{
		return $this->registerApp($secret, $category, $name, $link, $description, $tags, $type, $icon, $secondSecret);
	}

	public function getApps($category = null, $name = null, $type = null, $link = null, $limit = 100, $offset = null, $field = 'name:desc')
	{
		try {
			$parameters = [];
			if($category !== null)
			{
				$parameters['category'] = $category;
			}
			if($name !== null)
			{
				$parameters['name'] = $name;
			}
			if($type !== null)
			{
				$parameters['type'] = $type;
			}
			if($link !== null)
			{
				$parameters['link'] = $link;
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
			return Request::get($this->client, 'dapps?' . $url);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function apps($category = null, $name = null, $type = null, $link = null, $limit = 100, $offset = null, $field = 'name:desc')
	{
		return $this->getApps($category, $name, $type, $link, $limit, $offset, $field);
	}

	public function getApp($id)
	{
		try {
			return Request::get($this->client, 'dapps/get?id=' . $id);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function app($id)
	{
		return $this->getApp($id);
	}

	public function searchApps($query = null, $category = null, $installed = 0)
	{
		try {
			$parameters = [];
			if($query !== null)
			{
				$parameters['q'] = $query;
			} else {
				throw new \Exception('You must include a query!');
			}
			if($category !== null)
			{
				$parameters['category'] = $category;
			}
			if($installed !== null)
			{
				$parameters['installed'] = $installed;
			}
			$url = http_build_query($parameters);
			return Request::get($this->client, 'dapps/search?' . $url);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function search($query = null, $category = null, $installed = 0)
	{
		return $this->searchApps($query, $category, $installed);
	}

	public function installApp($id)
	{
		try {
			$payload = [
				'id' => $id
			];
			return Request::post($this->client, 'dapps/install', $payload);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function install($id)
	{
		return $this->installApp($id);
	}

	public function installedApps()
	{
		try {
			return Request::get($this->client, 'dapps/installed');
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function installed()
	{
		return $this->installedApps();
	}

	public function installedIDs()
	{
		try {
			return Request::get($this->client, 'dapps/installedIds');
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function ids()
	{
		return $this->installedIDs();
	}

	public function uninstallApp($id)
	{
		try {
			$payload = [
				'id' => $id
			];
			return Request::post($this->client, 'dapps/uninstall', $payload);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function uninstall($id)
	{
		return $this->uninstallApp($id);
	}

	public function launchApp($id, $params = null)
	{
		try {
			$payload = [
				'id' => $id
			];
			if ($params !== null)
			{
				$payload['params'] = $params;
			}
			return Request::post($this->client, 'dapps/launch', $payload);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function launch($id, $params = null)
	{
		return $this->launchApp($id, $params);
	}

	public function installingApps()
	{
		try {
			return Request::get($this->client, 'dapps/installing');
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function installing()
	{
		return $this->installingApps();
	}

	public function uninstallingApps()
	{
		try {
			return Request::get($this->client, 'dapps/uninstalling');
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function uninstalling()
	{
		return $this->uninstallingApps();
	}

	public function launchedApps()
	{
		try {
			return Request::get($this->client, 'dapps/launched');
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function launched()
	{
		return $this->launchedApps();
	}

	public function getCategories()
	{
		try {
			return Request::get($this->client, 'dapps/categories');
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function categories()
	{
		return $this->getCategories();
	}

	public function stopApp($id)
	{
		try {
			$payload = [
				'id' => $id
			];
			return Request::post($this->client, 'dapps/stop', $payload);
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function stop($id)
	{
		return $this->stopApp($id);
	}
}
