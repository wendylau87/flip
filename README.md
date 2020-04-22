# FLIP
## Prerequisites
1. Install PHP version 7.x.
2. Install MySQL Database.
3. Install [Postman](https://www.postman.com/) or other API testing tools.

## Setup Configuration
1. Open file ```/flip/helper/Connect.php```
2. Change your database host, username, and password at this line :
```php
$this->servername = "127.0.0.1";
$this->username = "root";
$this->password = "admin";
```
3. save the changes. 

## Setup Database
Open folder ```/flip/migration/``` and run following command :
```bash
php Migration.php
```

## Test API
TODO