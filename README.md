# FLIP
## Prerequisites
1. Install PHP version 7.x.
2. Install MySQL Database.
3. Install [Postman](https://www.postman.com/) or other API testing tools (i.e curl).

## Setup Configuration
1. Open file ```/flip/config.json```
2. Change your database host, username, and password at this line :
```
{
  "username": "root",
  "password": "admin",
  "host": "127.0.0.1"
}
```
3. save the changes. 

## Setup Database
Open folder ```/flip/migration/``` and run following command :
```bash
php Migration.php
```

## Test API disburse
1. Using curl (don't forget change ```base-url```)
```
curl --location --request POST 'http://base-url/flip/controller/DisbursementController.php' \
--form 'bank_code=BCA' \
--form 'account_number=5270382179' \
--form 'amount=50000' \
--form 'remark=testing'
```



