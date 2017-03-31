# Thelia Smarty Plugins

Addition Smarty plugins for Thelia
* session_set
* session_get

## Installation

### Manually

* Copy the module into ```<thelia_root>/local/modules/``` directory and be sure that the name of the module is TheliaSmartyPlugins.
* Activate it in your thelia administration panel

### Composer

Add it in your main thelia composer.json file

`composer require zorn-v/thelia-smarty-plugins-module:~1.0`

## Usage

```smarty
{session_set var1="value1" var2="value2"}
{session_get var="var3" default="value3"}
```
