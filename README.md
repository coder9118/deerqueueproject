# Requirement

1. Php 8.1
2. Database (Mysql/Sqlite)
3. Queue DB (Redis/Sqlite)
4. MailPit (To Catch mail sent to client) or u can use service like MailTrap
5. composer 2.0+ is required

# Setup

### Clone the project

### Copy .env.example file to .env

### Run composer install

### Edit configuration file like

1. APP_NAME="Deer"

### Downloading MailPit (If you want to catch mail on your own)

1. Download binary file from here https://github.com/axllent/mailpit/releases
2. Run the binary, it will run over port (1025, 8025)
3. visit localhost:8025 for viewing mail received
4. edit .env file to use Mailpit by editing MAIL_MAILER=smtp, MAIL_HOST=localhost, MAIL_PORT=1025

### Queue Configuration

#### Redis as Driver, Add Configuration

1. REDIS_HOST=127.0.0.1
2. REDIS_PASSWORD=null
3. REDIS_PORT=6379
4. QUEUE_CONNECTION=redis

#### Database as Driver

1. QUEUE_CONNECTION=database

### Database Setup

#### Mysql as db, edit the following config

1. DB_CONNECTION=mysql
2. DB_HOST=127.0.0.1
3. DB_PORT=3306
4. DB_DATABASE=laravel
5. DB_USERNAME=root
6. DB_PASSWORD=

#### sqlite as Db , follow these step

1. create a database.sqlite file inside database folder
2. Edit config to use sqlite by adding
3. DB_CONNECTION=sqlite
4. DB_DATABASE=/mnt/d/queuedeerproject/database/database.sqlite (absolute full path to database). Change it according to
   ur
   location

### Migrate Table RUn

```shell
php artisan migrate
```

### Run MailPit in terminal 1 (must be keep running)

```shell
./mailpit
```

### Run queue worker to run laravel queue:worker in terminal 2 (must be keep running)

```shell
php artisan queue:work
```

### Use Final command to demonstrate the flow in terminal 3

```shell
php artisan order rahulkumar9118@gmail.com 30
```

```php
command Signature is 
php order {email} {amount}
```

### Testing

```php
php artisan test
```
