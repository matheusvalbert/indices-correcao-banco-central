<?php

use Valbert\IndicesCorrecao\IndicesCorrecaoClass;

it('can test', function () {

    $indice = new IndicesCorrecaoClass();

    $ind = $indice
        ->numeroMeses(1)
        ->get();

    dd($ind);

    expect(true)->toBeTrue();
});
