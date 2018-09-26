# Nova Random Password Generation Field
A Laravel Nova password field with generating random password option
 
## Installation:

You can install the package in to a Laravel app that uses Nova via composer:

```bash
composer require naif/generate-password
```

## Usage:
<h4>Add the below to Nova/User.php resource:</h4>

```php

GeneratePassword::make('Password')
    ->onlyOnForms()
    ->creationRules('required', 'string', 'min:6')
    ->updateRules('nullable', 'string', 'min:6')
    ->length(12), //You can specifiy the password length here
         
```

<img src="https://raw.githubusercontent.com/naifalshaye/nova-random-password-generation/master/screenshots/screen.gif" width="700">

## Support:
naif@naif.io

https://www.linkedin.com/in/naif

## License:
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
