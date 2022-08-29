<?php

namespace Valbert\IndicesCorrecao;

use DateTime;

use GuzzleHttp\Client;

class IndicesCorrecaoClass
{
    /**
     * Código da serie na qual irá realizar a pesquisa
     * @var int
     */
    private int $codigoSerie;

    /**
     * Data de ínicio da busca
     * @var DateTime
     */
    private DateTime $dataInicial;

    /**
     * Data de final da busca
     * @var DateTime
     */
    private DateTime $dataFinal;

    /**
     * Últimos N messes da busca
     * @var int
     */
    private int $ultimos;

    /**
     * Set código da série
     * @param int $codigoSerie
     * @return $this
     */
    public function codigoSerie(int $codigoSerie): self
    {
        $this->codigoSerie = $codigoSerie;

        return $this;
    }

    /**
     * Set data inicial e final da busca
     * @param DateTime $inicial
     * @param DateTime $final
     * @return $this
     */
    public function dataInicioFim(DateTime $inicial, DateTime $final): self
    {
        $this->dataInicial = $inicial;
        $this->dataFinal = $final;

        return $this;
    }

    /**
     * Set número últimos meses
     * @param int $meses
     * @return $this
     */
    public function NumeroMeses(int $meses): self
    {
        $this->ultimos = $meses;

        return $this;
    }

    /**
     * Realiza o request para a API do Banco Central
     * @return string
     */
    public function get()
    {
        $client = new Client();

        $response = $client->get('http://api.bcb.gov.br/dados/serie/bcdata.sgs.{4175}/dados/ultimos/{2}?formato=json');

        return $response;
    }
}
