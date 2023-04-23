<?php

namespace Market;

use AwsS3\Client\AwsStorageInterface;

class Product
{

	/**
	 * @var FileStorageRepository
	 */
	private FileStorageRepository $storage;

	/**
	 * @var int
	 */
	private $id;

	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var string
	 */
	private $description;

	/**
	 * @var \Market\Category
	 */
	private $category;

	/**
	 * JSON-encoded array of image names
	 * 
	 * @var string
	 */
	private $images;

	/**
	 * @var \Market\StorageService
	 */
	private $storageService;

	public function __construct(StorageService $storageService)
	{
		$this->storageService = $storageService;
	}

	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @return string
	 */
	public function getDescription(): string
	{
		return $this->description;
	}

	/**
	 * @return string
	 */
	public function getCategory(): string
	{
		return $this->category->getName();
	}

	/**
	 * @return array
	 */
	public function getImages(): array
	{
		return $this->storageService->getImageUrls(json_decode($this->images));
	}

	/**
	 * @var array
	 */
	public function setImages(array $images): self
	{
		$this->images = json_encode($images);
		return $this;
	}

	/**
	 * @var \Market\User
	 * @return bool
	 */
	public function isFavorite(User $user): bool
	{
		return in_array($this, $user->getFavorites());
	}

}
