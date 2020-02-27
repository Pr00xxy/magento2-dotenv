# Magento 2 .env module

Adds easier support for .env files to Magento 2.

This module was created because magento [recommends](https://devdocs.magento.com/guides/v2.3/config-guide/prod/config-reference-var-name.html#how-to-use-environment-variables) injection of variables into $_ENV through the index.php and I believe that is stupid

## Installation

Use the package manager [composer](https://getcomposer.org/) that is bundled with magento 2 to install.

```bash
composer install prooxxy/dotenv
```

Make sure the module is enable before start using

```bash
php bin/magento module:enable PrOOxxy_DotEnv
```

## Features

This module does only one this once enabled.
It reads and parses any variables that is locate inside <magento_root>/app/etc/.env
and injects it into the global $_ENV array

It does this before Magento processes other environments variables.
It does override any preexisting variables with the same names

## Compability

## License
[MIT](https://choosealicense.com/licenses/mit/)
