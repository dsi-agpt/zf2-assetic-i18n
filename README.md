# zf2-assetic-i18n

A few classes to add javascript internationalization feature to assetic in zf2 context (via widmogrod/zf2-assetic-module).

### String management

Replace all your string by codes in js files and enclose it between curly brackets.

```javascript
alert("{UC-03-TRS-MSG-01}");
```
Then, create a *text* entry anywhere in ZF2 configuration and convert your codes into *primary strings* whith gettext mark so that your string is loaded by your i18n tool (e.g. poedit).

```php
'text' => array(
        'UC-03-TRS-MSG-01' => _("This an i18n test.")
    )
```

### Configuration requirements

Add an *available_language* entry under the translator key of your configuration.

```php
'translator' => array(
  'available_languages' => array(
      'fr_FR',
      'en_US',
      'de_DE'
  ),
```

### What the module does

#### At build time

All the javascript collections of your assetic configuration will be expanded in th following way :
asset_js gives en_US_asset_js, fr_FR_asset_js.
Each of them receives a filter that performs replacement of codes by primary strings and translation of primary strings into the target language.

#### At runtime

HeadScript and InlineScript view helpers behaviour is modified in order to prefix the javascript's files path with the current locale. The interest of this approach is that no translation is performed at runtime. Internationalized javascript files are served as static resources.

### Issue

*ServiceLocatorFactory* module had to be introduced to get the service locator in alternative ViewHelperStrategy.
But it's a bad practice.


