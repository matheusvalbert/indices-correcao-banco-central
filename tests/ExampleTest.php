<?php

use Valbert\IndicesCorrecao\IndicesCorrecaoClass;

it('Número de messes teste', function () {
    $indice = new IndicesCorrecaoClass();

    $ind = $indice
        ->codigoSerie(4175)
        ->numeroMeses(5)
        ->get();

    dd($ind);

    expect(true)->toBeTrue();
});

it('Período início e fim', function () {
    $indice = new IndicesCorrecaoClass();

    $ind = $indice
        ->codigoSerie(4175)
        ->dataInicioFim('01/01/2020', '01/01/2022')
        ->get();

    expect(true)->toBeTrue();
});
