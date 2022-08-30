<?php

namespace Valbert\IndicesCorrecao;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class IndicesCorrecaoClass
{
    /**
     * Código da serie na qual irá realizar a pesquisa
     * @var int
     */
    private int $codigoSerie;

    /**
     * Data de ínicio da busca
     * @var string
     */
    private string $dataInicial;

    /**
     * Data de final da busca
     * @var string
     */
    private string $dataFinal;

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
     * @param string $inicial
     * @param string $final
     * @return $this
     */
    public function dataInicioFim(string $inicial, string $final): self
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
    public function numeroMeses(int $meses): self
    {
        $this->ultimos = $meses;

        return $this;
    }

    /**
     * Realiza o request para a API do Banco Central
     * @return string
     */
    public function get(): string
    {
        $client = new Client();

        try {
            $response = $client->get("https://api.bcb.gov.br/dados/serie/bcdata.sgs.{$this->codigoSerie}/dados/ultimos/{$this->ultimos}?formato=json")
                ->getBody()
                ->getContents();
        } catch (GuzzleException $e) {
            $response = $e;
        }

        return $response;
    }
}
