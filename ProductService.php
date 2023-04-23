<?php

namespace Market;

use Market\ProductRepository;
use Market\StorageService;

class ProductService
{

	/**
	 * @var \Market\ProductRepository
	 */
	private $productRepository;

	/**
	 * @var \Market\StorageService
	 */
	private StorageService $storage;

	/**
	 * @var \Market\ProductRepository
	 */
	public function __construct(ProductRepository $productRepository, StorageService $storageService)
	{
		$this->productRepository = $productRepository;
		$this->storage = $storageService;
	}

	/**
	 * @var \Market\User
	 * @return \Market\Product[]
	 */
	public function getProducts(?User $user): array
	{
		return $this->productRepository->findBy(['user' => $user]);
	}

	/**
	 *
	 * 1. Get the Product by id.
	 * 2. For each image from Product::images get url.
	 * 3. For each image from Product::images check (web) accessibility.
	 * 4. Set back working/actual urls to the Product::image
	 * 
	 * @return null|\Market\Product
	 */
	public function getProduct(int $id): ?Product
	{
		return $this->productRepository->getOneById($id);
	}

	/**
	 * @return bool
	 */
	public function updateProductImage(Product $product, string $fileName): bool
	{
		$newImages = $this->storage->updateImageUrls($fileName, $product->getImages());

		$product->setImages($newImages);
		$this->productRepository->save($product);

		return true;
	}

	/**
	 * @var \Market\Product
	 * @return bool
	 */
	public function deleteProduct(Product $product): bool
	{
		if($this->productRepository->remove($product)) {
			$this->storage->clearStorage($product->getImages());
			return true;
		}

		return false;
	}

	/**
	 * @var \Market\Product
	 * @var bool
	 * @return \Market\Product
	 */
	public function makeFavorite(Product $product, bool $isFavorite): Product
	{
		$product->setFavorite($isFavorite);

		$this->productRepository->save($product);
		return $product;
	}

}
