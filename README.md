# Magento 2 .env module

Adds support for .env configuration files to Magento 2.

This module was created because Magento [recommends](https://devdocs.magento.com/guides/v2.3/config-guide/prod/config-reference-var-name.html#how-to-use-environment-variables) injection of variables into $_ENV through the index.php file. I believe that is a stupid suggestion.

## Installation

Use [composer](https://getcomposer.org/) to install this.

```bash
composer require prooxxy/magento2-dotenv
```

### Alternative installation

If you don't have the option to use composer it's possible to copy the root of this project into the `app/code/PrOOxxy/DotEnv` folder of your magento installation

Make sure the module is enable before start using

```bash
php bin/magento module:enable PrOOxxy_DotEnv
php bin/magento setup:upgrade
```

## Features

This module does only one thing once installed.
It reads and parses any variables that is locate inside <magento_root>/app/etc/.env
and injects it into the global `$_ENV` array

It does this before Magento processes other environments variables.
It does override any preexisting variable with the same name.

## Usage

1. Add .env into app/etc
The file must have chmod level 0644 or below
2. Follow the official devdocs [instructions](https://devdocs.magento.com/guides/v2.3/config-guide/deployment/pipeline/example/environment-variables.html#step-4-update-the-production-system) for how to create the env variable format
3. Add your newly formatted variables into the .env like so e.g

`CONFIG__DEFAULT__SYSTEM__SMTP__HOST="8.8.8.8"`

4. Flush the config cache

```bash
php bin/magento cache:flush config
```

## Compability

This module is compatible with PHP 7.1 and above and Magento 2.3.x and above  
(Module might be compatible with Magento 2.2.x but not supported)

## License
[MIT](https://choosealicense.com/licenses/mit/)
