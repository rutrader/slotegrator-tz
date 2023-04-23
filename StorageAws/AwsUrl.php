<?php

namespace Market\AwsStorage;

use AwsS3\AwsUrlInterface;

/**
 * AwsUrlInterface implementation
 */
class AwsUrl implements AwsUrlInterface
{

	/**
	 * @var string
	 */
	private $bucketName;

	/**
	 * @private $string
	 */
	private $objectKey;

	/**
	 * @var string
	 */
	public function __toString(): string
	{
		return "https://{$this->bucketName}.s3.amazonaws.com/{$this->objectKey}";
	}
}