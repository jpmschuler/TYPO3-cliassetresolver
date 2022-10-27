[![CI](https://github.com/jpmschuler/TYPO3-cliassetresolver/actions/workflows/ci.yml/badge.svg)](https://github.com/jpmschuler/TYPO3-tvplus-contentslide/actions/workflows/ci.yml)
![PHP-v](https://shields.io/packagist/php-v/jpmschuler/cliassetresolver)
![Packagist](https://shields.io/packagist/v/jpmschuler/cliassetresolver)



# EXT:cliassetresolver
This extension allows you to get the asset folder for an extension, e.g.

- with cms-composer-installers < 4: `public/typo3conf/ext/exampleext/Resources/Public`
- with cms-composer-installers < 4 and typo3-secure-web: `private/typo3conf/ext/exampleext/Resources/Public`
- with cms-composer-installers >= 4: `./_assets/2398498a6ab234234234/`

