<?php

namespace Market;

interface FileStorageInterface
{
	
	public function getUrl($fileName): ?string;
	public function fileExists(string $fileName): bool;
	public function deleteFile(string $fileName): void;
	public function saveFile(string $fileName): void;
}