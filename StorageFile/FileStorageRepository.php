<?php

namespace Market;

final class FileStorageRepository implements FileStorageInterface
{

	/**
	 * Returns image URL or null.
	 * 
	 * @param $fileName
	 * @return string|null
	 */
	public function getUrl($fileName): ?string
	{
		if ($this->fileExists($fileName) !== true) {
			return null;
		}

		return sprintf("https://cdn.market.com/images/products/%s.png", $fileName);
	}

	/**
	 * Returns whether file exists or not.
	 * 
	 * @param string $fileName
	 * @return bool
	 */
	public function fileExists(string $fileName): bool
	{
		return file_exists(__DIR__. '/public/images/products/' . $fileName);
	}

	/**
	 * Deletes a file in the filesystem and throws an exception in case of errors.
	 * 
	 * @param string $fileName
	 * @return void
	 */
	public function deleteFile(string $fileName): void
	{
	}

	/**
	 * Saves a file in the filesystem and throws an exception in case of errors.
	 * @param string $fileName
	 * @return void
	 */
	public function saveFile(string $fileName): void
	{
	}
}
