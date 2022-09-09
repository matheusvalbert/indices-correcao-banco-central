<?php

use Valbert\IndicesCorrecao\Indices;

/** @test */
it('Erro na chamada numeroMeses e dataInicioFim em conjuto', function () {
    Indices::codigoSerie(189)
        ->numeroMeses(12)
        ->dataInicioFim('01/01/2020', '01/01/2022')
        ->get();
})->expectException(\Valbert\IndicesCorrecao\chamadaFuncaoException::class);

/** @test */
it('Erro ao chamar get sem chamar numeroMeses ou dataInicioFim', function () {
    Indices::codigoSerie(189)
        ->get();
})->expectException(Exception::class);

/** @test */
it('Número de messes', function () {
    $indice = Indices::codigoSerie(189)
        ->numeroMeses(12)
        ->get();

    expect($indice['inflacao'])->toBeFloat()
        ->and($indice['inflacao'])->toBeLessThan(1)
        ->and($indice['inflacao'])->toBeGreaterThanOrEqual(0)
        ->and($indice['indices'])->toBeString()
        ->and($indice)->toBeArray();
});

/** @test */
it('Período início e fim', function () {
    $indice = Indices::codigoSerie(189)
        ->dataInicioFim('01/01/2020', '01/01/2022')
        ->get();

    expect($indice['inflacao'])->toBeFloat()
        ->and($indice['inflacao'])->toBeLessThan(1)
        ->and($indice['inflacao'])->toBeGreaterThanOrEqual(0)
        ->and($indice['indices'])->toBeString()
        ->and($indice)->toBeArray();
});
