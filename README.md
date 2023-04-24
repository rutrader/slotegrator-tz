- **A. Документация API:**
  - Products
    - Список продуктов [GET /products](./docs/products/ProductsList.md)
    - Детали продукта [GET /products/{id}/detail](./docs/products/ProductDetail.md)
    
  - Favorites
      - Добавление продукта в избранные [POST /favorites](./docs/products/FavoritesAdd.md)
      - Получение списка избранных продуктов [GET /favorites](./docs/products/FavoritesList.md)
      - Удаление из избранных [DELETE /favorites/{product_id}](./docs/products/FavoritesDelete.md)
  
  - Добавление изображения к продукту [POST /products/{id}/images](./docs/products/ImageAddToProduct.md)

- [**B. Реализация**](./docs/b_realisation.md):
- [**C. Тесты**](./docs/c_tests.md)
- [**Структуры корзины заказов**](./Cart/Cart.php)
- [**Репозиторий билетов**](./docs/tickets.md)
- [**Composer: Обновление зависимости**](./docs/composer.md)
- [**SQL: Оценки студентов**](./docs/students.md)
- [**Docker: Модификация конфигурации сервисов**](./docs/docker.md)