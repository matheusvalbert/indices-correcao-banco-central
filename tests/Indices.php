<?php

use Valbert\IndicesCorrecao\Indices;

/** @test */
it('Número de messes teste', function () {
    $indice = new Indices();

    $ind = $indice
        ->codigoSerie(189)
        ->numeroMeses(12)
        ->getMeses(true);

    expect($ind['valorInflacao'])->toBeFloat()
        ->and($ind['indice'])->toBeString()
        ->and($ind['valorInflacao'])->toBeLessThan(1)
        ->and($ind)->toBeArray();
});

/** @test */
it('Período início e fim', function () {
    $indice = new Indices();

    $ind = $indice
        ->codigoSerie(189)
        ->dataInicioFim('01/01/2020', '01/01/2022')
        ->getPeriodo(true);

    expect($ind['valorInflacao'])->toBeFloat()
        ->and($ind['indice'])->toBeString()
        ->and($ind['valorInflacao'])->toBeLessThan(1)
        ->and($ind)->toBeArray();
});
