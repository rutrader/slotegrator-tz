## Тесты для ProductService:

- проверить getProducts(), которые должен возвращать массив объектов Product. Нужно проверить метод **для авторизованного пользователя и для гостя**;
- проверить getProduct(), который должен возвращать объект Product;
- проверить, что Product корректно возвращает ссылку на изображение;
- `updateProductImage()` должен успешно обновлять ссылку на изображение;
- `deleteProduct()` должен успешно удалять продукт;
- `toggleFavorite()` должен успешно изменять статус продукта.

## StorageService:

- `getImageUrls()`
  - При передаче пустого массива, метод должен возвращать пустой массив;
  - При передаче массива имен, метод возвращает непустой массив.

- `updateImageUrls()` 
  - метод должен вернуть обновленный массив, если ссылка на изображение уже была в БД;
  - метод должен вернуть обновленный массив, если ссылка в БД не хранилась.


- `clearStorage()`: метод должен возвращать `true`

## Тесты для User* сущностей:

- Нужно проверить случаЙ, при котором неавторизованный пользователь не может просматривать список избранных продуктов;
