<?php

namespace Market;

use AwsS3\Client\AwsStorageInterface;
use Market\FileStorageInterface;

class StorageService
{

	/**
	 * @var \Market\FileStorageRepository
	 */
	private FileStorageInterface $fileStorage;

	/**
	 * @var \Market\AwsStorage\AwsStorageRepository
	 */
	private AwsStorageInterface $awsStorage;

	/**
	 * @var \Market\ProductRepository
	 * @var \Market\FileStorageRepository
	 * @var \Market\AwsStorage\AwsStorageRepository
	 */
	public function __construct(
		FileStorageInterface $fileStorageInterface,
		AwsStorageInterface $awsStorageInterface
	) {
		$this->fileStorage = $fileStorageInterface;
		$this->awsStorage = $awsStorageInterface;
	}

	public function getImageUrls(array $imageNames): array
	{
		$images = [];

		foreach ($imageNames as $fileName) {
			try {
				$url = $this->awsStorage->getUrl($fileName) ?? $this->fileStorage->getUrl($fileName);
				$headers = @get_headers($url);

				if ($headers && strpos($headers[0], '200') !== false) {
					$images[] = $url;
				}
			} catch (\Exception $e) {
				continue;
			}
		}

		return $images;
	}

	/**
	 * @var string
	 * @var array
	 * @return array
	 */
	public function updateImageUrls(string $fileName, array $images): array
	{
		$imageIndex = array_search($fileName, $images);

		try {
			if ($imageIndex !== false) {
				if ($this->awsStorage->getUrl($fileName)) {
					$this->awsStorage->deleteFile($fileName);
				} else if ($this->fileStorage->fileExists($fileName)) {
					$this->fileStorage->deleteFile($fileName);
				}
			} else {
				$imageIndex = count($images);
			}
	
			$this->awsStorage->saveFile($fileName);

			$images[$imageIndex] = $fileName;

		} catch (\Exception $e) {
			return $images;
		}

		return $images;
	}

	public function clearStorage(array $images): bool
	{
		try {
			foreach($images as $image) {
				if ($this->awsStorage->getUrl($image)) {
					$this->awsStorage->deleteFile($image);
				} else if ($this->fileStorage->fileExists($image)) {
					$this->fileStorage->deleteFile($image);
				}
			}	
		} catch (\Exception $e) {
			return false;
		}

		return true;
	}
}
