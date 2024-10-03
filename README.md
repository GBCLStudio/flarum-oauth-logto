# Sign in With Logto

![License](https://img.shields.io/badge/license-MIT-blue.svg) [![Latest Stable Version](https://img.shields.io/packagist/v/gbcl/oauth-logto.svg)](https://packagist.org/packages/gbcl/oauth-logto) [![Total Downloads](https://img.shields.io/packagist/dt/gbcl/oauth-logto.svg)](https://packagist.org/packages/gbcl/oauth-logto)

A [Flarum](http://flarum.org) extension. Sign in with Logto Cloud or OSS

## Installation

Install with composer:

```sh
composer require gbcl/oauth-logto:"*"
```

## Updating

```sh
composer update gbcl/oauth-logto
php flarum cache:clear
```

## Configuration

Once enabled, this extension will add a `Logto` option to the settings page of `fof/oauth`. Toggle `Logto` on, and hit the configure icon.

Created an `Traditional Web` Application on `Authentication > Applications > Create Application`
Set the `Redirect URIs` labels to `https://your-flarum/auth/logto`,
then, copy three things in the settings:
 - Logto endpoint
 - App secrets > Default secret > value
 - App ID

Paste the stuff above to the settings page of `fof/oauth`. One thing you need to notice that the `logto_domain` label needs to exclude the HTTP Protocol.

## Support

This extension is under active development. Provide [GitHub Issues](https://github.com/GBCLStudio/flarum-oauth-logto/issues) to help us improve.

## Links

- [Packagist](https://packagist.org/packages/gbcl/oauth-logto)
- [GitHub](https://github.com/GBCLStudio/flarum-oauth-logto)

## Made with ❤ by GBCLStudio

Support Us:
 - [Afdian 爱发电](https://afdian.com/@GBCLStudio)
 - [OpenCollective](https://opencollective.com/gbclstudio)
