## Добавляем PHP

```yaml
version: '3'
services:
  nginx:
    image: nginx:alpine
    container_name: app-nginx
    ports:
      - "8090:8090"
      - "443:443"
    volumes:
      - ./:/var/www

  db:
    platform: linux/x86_64
    image: mysql:5.6.47
    container_name: app-db
    ports:
      - "3306:3306"
    volumes:
      - ./etc/infrastructure/mysql/my.cnf:/etc/mysql/my.cnf
      - ./etc/database/base.sql:/docker-entrypoint-initdb.d/base.sql

  php:
    image: php:7.4-fpm
    container_name: app-php
    ports:
      - "9000:9000"
    volumes:
      - ./:/var/www

```

---

### Чтобы использовать другую версию MySQL, нужно создать ещё один `docker-compose.dev.yaml`:


```yaml
version: '3'
services:
  db:
    image: mysql:8
```

Соответственно, запуск будет проходить так:

```yaml
docker-compose -f docker-compose.yaml -f docker-compose.dev.yaml up
```

---

Объединяем все сервисы в одну сеть

```yaml
version: '3'
services:
  nginx:
    image: nginx:alpine
    container_name: app-nginx
    ports:
      - "8090:8090"
      - "443:443"
    volumes:
      - ./:/var/www
    networks:
      - app-network

  db:
    image: mysql:5.6.47
    container_name: app-db
    ports:
      - "3306:3306"
    volumes:
      - ./etc/infrastructure/mysql/my.cnf:/etc/mysql/my.cnf
      - ./etc/database/base.sql:/docker-entrypoint-initdb.d/base.sql
    networks:
      - app-network

  php:
    image: php:7.4-fpm
    container_name: app-php
    ports:
      - "9000:9000"
    volumes:
      - ./:/var/www
    networks:
      - app-network

networks:
  app-network:

```

---

Для управлением портами nginx, мы можем или использовать ENV-переменные:

```bash
NGINX_PORT=8090
NGINX_SSL_PORT=443
```

```yaml
version: '3'
services:
  nginx:
    image: nginx:alpine
    container_name: app-nginx
    ports:
      - "${NGINX_PORT}:${NGINX_PORT}"
      - "${NGINX_SSL_PORT}:${NGINX_SSL_PORT}"
    volumes:
      - ./:/var/www

  db:
    platform: linux/x86_64
    image: mysql:5.6.47
    container_name: app-db
    ports:
      - "3306:3306"
    volumes:
      - ./etc/infrastructure/mysql/my.cnf:/etc/mysql/my.cnf
      - ./etc/database/base.sql:/docker-entrypoint-initdb.d/base.sql

  php:
    image: php:7.4-fpm
    container_name: app-php
    ports:
      - "9000:9000"
    volumes:
      - ./:/var/www

networks:
  app-network:
```

Или мы можем создать отдельный файл и смонтировать его в nginx:

```yaml
nginx:
    image: nginx:alpine
    container_name: app-nginx
    volumes:
      - ./default.conf:/etc/nginx/conf.d/default.conf
      - ./:/var/www
    networks:
      app-network:
        aliases:
          - app-nginx
    depends_on:
      - php
    restart: always
```