<?php

use Valbert\IndicesCorrecao\Indices;

/** @test */
it('Número de messes', function () {
    $indice = new Indices();

    $ind = $indice
        ->codigoSerie(189)
        ->numeroMeses(12)
        ->get();

    expect($ind['inflacao'])->toBeFloat()
        ->and($ind['inflacao'])->toBeLessThan(1)
        ->and($ind['inflacao'])->toBeGreaterThanOrEqual(0)
        ->and($ind['indices'])->toBeString()
        ->and($ind)->toBeArray();
});

/** @test */
it('Período início e fim', function () {
    $indice = new Indices();

    $ind = $indice
        ->codigoSerie(189)
        ->dataInicioFim('01/01/2020', '01/01/2022')
        ->get();

    expect($ind['inflacao'])->toBeFloat()
        ->and($ind['inflacao'])->toBeLessThan(1)
        ->and($ind['inflacao'])->toBeGreaterThanOrEqual(0)
        ->and($ind['indices'])->toBeString()
        ->and($ind)->toBeArray();
});
