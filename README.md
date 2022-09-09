# Índices correção Banco Central

[![Latest Version on Packagist](https://img.shields.io/packagist/v/valbert/indices-correcao-banco-central.svg?style=flat-square)](https://packagist.org/packages/valbert/indices-correcao-banco-central)
[![Tests](https://github.com/matheusvalbert/indices-correcao-banco-central/actions/workflows/run-tests.yml/badge.svg)](https://github.com/matheusvalbert/indices-correcao-banco-central/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/valbert/indices-correcao-banco-central.svg?style=flat-square)](https://packagist.org/packages/valbert/indices-correcao-banco-central)

Realiza a consulta dos índices de correção através da API do Banco Central.

## Instalação
```bash
composer require valbert/indices-correcao-banco-central
```

## Código dos índices

Para obter o código dos índices, basta verificar no [Link](https://www3.bcb.gov.br/sgspub/localizarseries/localizarSeries.do?method=prepararTelaLocalizarSeries).

## Utilização

```php
Indices::codigoSerie(189)
    ->numeroMeses(12)
    ->get();

Indices::codigoSerie(189)
    ->dataInicioFim('01/01/2020', '01/01/2022')
    ->get();
```

## Testes

```bash
composer test
```

## Changelog

Verifique o [CHANGELOG](CHANGELOG.md) para verificar o que mudou recentemente.

## Licença

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
