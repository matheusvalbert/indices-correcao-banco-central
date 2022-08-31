<?php

namespace Valbert\IndicesCorrecao;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Indices
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
        unset($this->ultimos);
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
        unset($this->dataInicial);
        unset($this->dataFinal);
        $this->ultimos = $meses;

        return $this;
    }

    /**
     * Calcula a inflação acumulada
     * @param string $valores
     * @return float
     */
    private function calculaInflacaoAcumulada(string $valores): float
    {
        $valoresJson = json_decode($valores, true);

        $valorInflacaoAcumulada = 1;

        foreach ($valoresJson as $valor) {
            $valorInflacaoAcumulada *= $valor['valor'] / 100 + 1;
        }

        $valorInflacaoAcumulada -= 1;

        $valorInflacaoAcumulada = round($valorInflacaoAcumulada, 6);

        return $valorInflacaoAcumulada;
    }

    /**
     * Realiza o request para a API do Banco Central
     * @param bool $inflacaoAcumulada
     * @return array|Exception[]|GuzzleException[]
     */
    public function get(bool $inflacaoAcumulada = true): array
    {
        $client = new Client();

        try {
            if (isset($this->ultimos)) {
                $indices = $client->get("https://api.bcb.gov.br/dados/serie/bcdata.sgs.{$this->codigoSerie}/dados/ultimos/{$this->ultimos}?formato=json")
                    ->getBody()
                    ->getContents();
            } elseif (isset($this->dataInicial) && isset($this->dataFinal)) {
                $indices = $client->get("https://api.bcb.gov.br/dados/serie/bcdata.sgs.{$this->codigoSerie}/dados?formato=json&dataInicial={$this->dataInicial}&dataFinal={$this->dataFinal}")
                    ->getBody()
                    ->getContents();
            }
        } catch (GuzzleException $e) {
            $indices = $e;
        }

        if ($inflacaoAcumulada) {
            return [
                'inflacao' => $this->calculaInflacaoAcumulada($indices),
                'indices' => $indices,
            ];
        } else {
            return [
                'indices' => $indices,
            ];
        }
    }
}
