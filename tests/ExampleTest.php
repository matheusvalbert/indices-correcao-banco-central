<?php

use Valbert\IndicesCorrecao\IndicesCorrecaoClass;

it('can test', function () {

    $indice = new IndicesCorrecaoClass();

    $indice
        ->NumeroMeses(1)
        ->get();

    dump($indice);

    expect(true)->toBeTrue();
});
