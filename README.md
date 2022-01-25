# Determine Available PHP Shell
![GitHub release (latest by date)](https://img.shields.io/github/v/release/yasapurnama/php-shellrotation)
![GitHub all releases](https://img.shields.io/github/downloads/yasapurnama/php-shellrotation/total)
[![GitHub license](https://img.shields.io/github/license/yasapurnama/php-shellrotation)](https://github.com/yasapurnama/php-shellrotation/blob/master/LICENSE)

![php-shell-rotation](https://user-images.githubusercontent.com/12730759/150984587-d746d54f-87ec-4bbd-86c3-c2bbc3e98287.png)

This package can easily determine which php shell function available to be execute.


## Why?

Mostly web hosting nowaday will disable various php shell function like `system(), exec(), shell_exec(), passthru()`. This package will help to find which php shell function that still exist then use it to execute shell command.


## Installation

Install php-shellrotation via composer

```bash
  $ composer require yasapurnama/php-shellrotation
```


## Shell Function
The package will use these functions if they are exist and can be used:
 - [System](https://www.php.net/manual/en/function.system.php)
 - [Exec](https://www.php.net/manual/en/function.exec.php)
 - [ShellExec](https://www.php.net/manual/en/function.shell-exec.php)
 - [Backtick](https://www.php.net/manual/en/language.operators.execution.php)
 - [Passthru](https://www.php.net/manual/en/function.passthru.php)
 - [Popen](https://www.php.net/manual/en/function.popen.php)
 - [ProcOpen](https://www.php.net/manual/en/function.proc-open.php)


## Basic Usage

```php
use Yasapurnama\PhpShellRotation\Shell;

include 'vendor/autoload.php';


$shell  = new Shell();
$output = $shell->exec('ls -lah');

print_r($output);

```


## Contributing
![contributions-wellcome](https://user-images.githubusercontent.com/12730759/150999538-d6872478-96ab-42d6-bb58-0ae443f514c8.svg)

Contributions are always welcome!


## License

Licensed under the MIT License, see [LICENSE](LICENSE) for more information.
