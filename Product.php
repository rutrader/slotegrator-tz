<?php

namespace Market;

class Product
{
    /**
     * @var FileStorageRepository
     */
    private FileStorageRepository $storage;

    /**
     * @var string
     */
    private string $imageFileName;

    /**
     * @param FileStorageRepository $fileStorageRepository 
     */
    public function __construct(FileStorageRepository $fileStorageRepository)
    {
        $this->storage = $fileStorageRepository;
    }

    /**
     * Returns product image URL.
     * 
     * @return string|null
     */
    public function getImageUrl(): ?string
    {
        if ($this->storage->fileExists($this->imageFileName) !== true) {
            return null;
        }

        return $this->storage->getUrl($this->imageFileName);
    }

    public function updateImage(): bool
    {
        try {
            if($this->storage->fileExists($this->imageFileName) !== true) {
                $this->storage->deleteFile($this->imageFileName);
            }

            $this->storage->saveFile($this->imageFileName);
        } catch (\Exception $exception) {
            return false;
        }

        return true;
    }

    // function addProductImage($productId) {
    //     // Проверяем, авторизован ли пользователь
    //     if (!isAuthorized()) {
    //       header('HTTP/1.1 401 Unauthorized');
    //       exit();
    //     }
        
    //     // Проверяем, существует ли продукт с указанным идентификатором
    //     $product = getProductById($productId);
    //     if (!$product) {
    //       header('HTTP/1.1 404 Not Found');
    //       exit();
    //     }
        
    //     // Проверяем, загружен ли файл изображения
    //     if (!isset($_FILES['image'])) {
    //       header('HTTP/1.1 400 Bad Request');
    //       exit();
    //     }
        
    //     // Проверяем, является ли файл изображением JPEG
    //     $imageType = exif_imagetype($_FILES['image']['tmp_name']);
    //     if ($imageType !== IMAGETYPE_JPEG) {
    //       header('HTTP/1.1 400 Bad Request');
    //       exit();
    //     }
        
    //     // Создаем уникальное имя файла
    //     $filename = uniqid('product_image_') . '.jpg';
        
    //     // Сохраняем файл изображения в хранилище (например, AWS S3)
    //     $imageData = file_get_contents($_FILES['image']['tmp_name']);
    //     if (saveImageToStorage($filename, $imageData)) {
    //       // Сохраняем ссылку на изображение в базе данных
    //       $imageUrl = generateImageUrl($filename);
    //       addProductImageUrl($productId, $imageUrl);
          
    //       // Возвращаем ответ с информацией о добавленном изображении
    //       header('HTTP/1.1 201 Created');
    //       header('Content-Type: application/json');
    //       echo json_encode([
    //         'id' => generateImageId(),
    //         'url' => $imageUrl
    //       ]);
    //       exit();
    //     } else {
    //       header('HTTP/1.1 500 Internal Server Error');
    //       exit();
    //     }
    // }
}
