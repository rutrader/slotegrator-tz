<?php

namespace Market\AwsStorage;

use AwsS3\AwsUrlInterface;
use AwsS3\Client\AwsStorageInterface;
use Market\AwsStorage\AwsUrl;

class AwsStorageRepository implements AwsStorageInterface
{
	/**
	 * @return true
	 */
	public function isAuthorized(): bool
	{
		return true;
	}

	/**
	 * @return \AwsS3\AwsUrlInterface
	 */
	public function getUrl(string $fileName): AwsUrlInterface
	{
		return new AwsUrl();
	}

	public function deleteFile($fileName): void
	{
		// 
	}

	public function saveFile($fileName): void
	{
		// 
	}

}