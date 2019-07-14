<?php

namespace App\Console\Commands;

use InvalidArgumentException;
use Illuminate\Console\Command;

class SetEnvCommand extends Command
{
    /**
     * O nome e a assinatura do comando no console
     *
     * @var string
     */
    protected $signature = 'env:set {key} {value?}';

    /**
     * A descrição do comando no console.
     *
     * @var string
     */
    protected $description = 'Define e salva uma variável de ambiente no arquivo .env';

    /**
     * Cria uma nova instância do comando.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Executa o comando
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            [$key, $value] = $this->getKeyValue();
        } catch (\InvalidArgumentException $e) {
            return $this->error($e->getMessage());
        }
        $envFilePath = app()->environmentFilePath();
        $contents = file_get_contents($envFilePath);
        if ($oldValue = $this->getOldValue($contents, $key)) {
            $contents = str_replace("{$key}={$oldValue}", "{$key}={$value}", $contents);
            $this->writeFile($envFilePath, $contents);
            return $this->info("A variável de ambiente com a chave '{$key}' mudou de '{$oldValue}' para '{$value}'");
        }
        $contents = $contents . "\n{$key}={$value}\n";
        $this->writeFile($envFilePath, $contents);
        return $this->info("Uma nova variável de ambiente com a '{$key}' mudou para '{$value}'");
    }

    /**
     * Sobrescreve o conteúdo do arquivo.
     *
     * @param string $path
     * @param string $contents
     * @return boolean
     */
    protected function writeFile(string $path, string $contents): bool
    {
        $file = fopen($path, 'w');
        fwrite($file, $contents);
        return fclose($file);
    }

    /**
     * Obtém o antigo valor de uma chave do arquivo de variáveis de ambiente.
     *
     * @param string $envFile
     * @param string $key
     * @return string
     */
    protected function getOldValue(string $envFile, string $key): string
    {
        preg_match("/^{$key}=[^\r\n]*/m", $envFile, $matches);
        if (count($matches)) {
            return substr($matches[0], strlen($key) + 1);
        }
        return '';
    }

    /**
     * Determina qual a chave e o valor fornecidos no comando atual.
     *
     * @return array
     */
    protected function getKeyValue(): array
    {
        $key = $this->argument('key');
        $value = $this->argument('value');
        if (!$value) {
            $parts = explode('=', $key, 2);
            if (count($parts) !== 2) {
                throw new InvalidArgumentException('Nenhum valor foi definido');
            }
            $key = $parts[0];
            $value = $parts[1];
        }
        if (!$this->isValidKey($key)) {
            throw new InvalidArgumentException('Chave de argumento inválida');
        }
        if (!is_bool(strpos($value, ' '))) {
            $value = '"' . $value . '"';
        }
        return [strtoupper($key), $value];
    }

    /**
     * Verifica se uma determinada string é válida como uma chave de variável de ambiente.
     *
     * @param string $key
     * @return boolean
     */
    protected function isValidKey(string $key): bool
    {
        if (str_contains($key, '=')) {
            throw new InvalidArgumentException("Chave da variável de ambiente não deve conter '='");
        }
        if (!preg_match('/^[a-zA-Z_]+$/', $key)) {
            throw new InvalidArgumentException('Chave de ambiente inválida. Use apenas letras e sublinhados');
        }
        return true;
    }
}
