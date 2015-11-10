![logo](http://eden.openovate.com/assets/images/cloud-social.png) Eve l10n
====
Localization and Internationalization for the Eve Framework
====
[![Build Status](https://api.travis-ci.org/eve-php/csrf.png)](https://travis-ci.org/eve-php/l10n)
====

- [Install](#install)
- [Usage](#usage)

====

<a name="install"></a>
## Install

`composer install eve-php/l10n`

====

<a name="usage"></a>
## Usage

1. Add this in public/index.php towards the top of the bootstrap chain.

```
//l10n
->add(Eve\L10n\Plugin::i()->import(array(
	//Default
	'default' => array(
		'name' => 'Website',
		'locale' => '%',
		'currency' => 'USD',
		'i18n' => array('en_US'),
	),
	
	//GLOBAL Domain
	'example.com' 			=> 'default',
	
	//Other Domains
	'sub.example.com' => array(
		'name' => 'Philippines Website',
		'location' => 'Philippines',
		'locale' => 'philippines',
		'currency' => 'PHP',
		'i18n' => array('tg_PH', 'en_US'),
	)
))
```

2. Customize as needed.

3. Create both `settings/i18n/en_US.php` and `settings/i18n/tg_PH.php`.

4. Add this to both files

```
<?php //-->
return array(
    'Cancel' => 'Cancel',
    'Edit' => 'Edit',
    'Loading...' => 'Loading...',
    'Login' => 'Login',
    'Logout' => 'Logout',
    'Name must be entered.' => 'Name must be entered.',
    'Remove' => 'Remove',
    'Sign Up' => 'Sign Up',
    'Update' => 'Update',
    'User does not exist!' => 'User does not exist!',
    'View Products' => 'View Products',
);
?>
```

5. Done ;)