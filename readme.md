## Weblearn

[![Build Status](https://travis-ci.org/andela-womokoro/learning_mgt_system.svg)](https://travis-ci.org/andela-womokoro/learning_mgt_system)
[![Coverage Status](https://coveralls.io/repos/github/andela-womokoro/learning_mgt_system/badge.svg?branch=master)](https://coveralls.io/github/andela-womokoro/learning_mgt_system?branch=master)

Weblearn is an online video learning resource website. Learning videos are categorized and users can view videos on the site based on their chosen category.

Registered users can publish learning videos on the site by uploading Youtube links of their videos together with details of the videos.

Weblearn was built with PHP's Laravel framework.

### <a name="demo"></a>Demo
View a live demo of Weblearn on heroku at [Weblearn](https://weblearn.herokuapp.com/).

### Project Features
- Video resources viewing by guests
- Video resources selection by category
- Traditional authentication
- Social media authentication (github, twitter, facebook)
- User profile management (avatar upload/updating, editing)
- Video resources management (uploading, editing, deletion)

### Usage
Install the following software before cloning the application from github.

- Git
- [Composer](https://getcomposer.org/doc/00-intro.md)
- [Laravel homestead](http://laravel.com/docs/5.1/homestead)

After installing the above software, clone the repository from github into your working directory:

```
$ git clone https://github.com/andela-womokoro/learning_mgt_system
`````

Run

```
$ composer install
```
to install the required packages.

Also on homestead
```
    php artisan migrate
```
to setup your database.


### Testing
```
$ vendor/bin/phpunit test
```

### Contributors

[Wilson Omokoro](https://github.com/andela-womokoro)

### License

Weblearn is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
