# CI Test

This is a small program to learn testing using PHPUnit for Codeigniter.

The program is simple, given a user id, then it prints a greeting message in certain condition:

* if fetched exact one member, compose "Hello, [name]!"
* else if fetched many members, compose "Hello, world!"
* otherwise (no member with such an id), compose "Hello, anyone?"

# How to run application

1. Import sql dump located in `application/database/sql`
1. Config your database credentials in `application/config/database.php`
1. Run in browser http://localhost/ci_test/index.php/welcome/index/ or http://localhost/ci_test/index.php/welcome/index/1 (for member id = 1)

# How to run test

1. Run `composer install` in root folder
1. Go to `application/tests` folder
1. Run `phpunit`
1. If no error, it will output `(5 tests, 12 assertions)`