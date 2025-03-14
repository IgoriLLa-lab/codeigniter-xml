# Проект CodeIgniter XML

Это приложение на базе **CodeIgniter 4**, для управления XML-данными. В проекте используется **CodeIgniter** как выбранный PHP-фреймворк и **PostgreSQL** в качестве базы данных.

## Требования

Для запуска проекта убедитесь, что на вашем компьютере установлены следующие компоненты:

- Установленные **Docker** и **Docker Compose**.

## Инструкция по установке

Чтобы развернуть и запустить проект локально, выполните следующие шаги:

### 1. Клонируйте репозиторий

Склонируйте проект с GitHub:

```bash
git clone https://github.com/IgoriLLa-lab/codeigniter-xml.git
cd codeigniter-xml
```

## 3. Настройте файл .env

Скопируйте файл `.env` и настройте его под свои нужды:

```bash
cp env .env
```

Откройте `.env` в текстовом редакторе и обновите следующие параметры:

- `app.baseURL` — укажите базовый URL приложения:

```env
app.baseURL='http://localhost:8081/'
```

Настройки базы данных:

```env
database.default.hostname=postgres
database.default.database=codeigniter_db
database.default.username=admin
database.default.password=secret123
database.default.DBDriver=Postgre
database.default.port=5432
```

### Соберите и запустите контейнеры Docker

Используйте Docker Compose для сборки и запуска приложения и сервисов базы данных:

```bash
docker-compose up --build -d
```

Запустите миграции в контейнере докер 
```
docker exec -it codeigniter-xml php spark migrate --all
```

## Запустите приложение

Откройте браузер и перейдите по адресу:
```
http://localhost:8081/
```