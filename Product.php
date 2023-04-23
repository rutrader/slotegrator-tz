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
	 * @var bool
	 */
	private $isFavorite;

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
	 * @return bool
	 */
	public function isFavorite(): bool
	{
		return $this->isFavorite;
	}

	public function setFavorite($isFavorite): self
	{
		$this->isFavorite = $isFavorite;
		return $this;
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

}
