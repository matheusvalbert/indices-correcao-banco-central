<?php

namespace Valbert\IndicesCorrecao;

use Throwable;

class chamadaFuncaoException extends \Exception
{
    /**
     * Mensagem de erro Exception
     * @var string
     */
    protected $message = 'Não é permitido chamar a função numeroMeses e dataInicioFim em conjunto.';

    /**
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($this->message, $code, $previous);
    }
}
