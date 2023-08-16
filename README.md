# Marketplace
Автоматизована платформа для проведення позабіржових угод без участі брокера.

## Опис завдання
Реалізувати сервіс з АРІ, який дозволить:
- отримати список всіх оголошень
- отримати список всіх категорій
- реєстрація нових користувачів
- розміщення нових оголошень користувачами
- створення/видалення категорій
- створення/видалення оголошень
- стоворення контракту між користувачами
- внесення депозита для проведення угод
- виведення коштів користувачем
- кабінет користувача
- чат

## Структура репозиторія проекта
```
.
├── bin
├── config
├── docker
│   ├── nginx
│   │   ├── default.conf
│   │   ├── Dockerfile
│   │   └── nginx.conf
│   ├── php-fpm
│   │   └── Dockerfile
│   └── docker-compose.yml
├── migrations
├── public
├── src
│   ├── Controller
│   ├── DataFixtures
│   ├── DTO
│   ├── Entity
│   ├── Exception
│   ├── Repository
│   ├── Service
│   └── ...
├── templates
├── test
│   ├── Controller
│   ├── Service
│   └── ...
├── Makefile
├── README.md
└── ...
```

## The Fast Track
```
git clone https://github.com/BlackSou/marketplace.git
```
```
make dc_build
```
```
make dc_up
```
```
make app_bash
```
```
php bin/console doctrine:fixtures:load --purge-with-truncate
```
## API Endpoints
http://127.0.0.1:88/api/doc

## DrawSQL
https://drawsql.app/teams/demo-77/diagrams/marketplace

## UML diagram
...
