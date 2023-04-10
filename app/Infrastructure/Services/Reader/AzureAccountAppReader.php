<?php

declare(strict_types=1);

namespace App\Infrastructure\Services\Reader;

use App\Infrastructure\Services\FileReader;

class AzureAccountAppReader
{
    protected $file;

    public function openFile(string $fileFullPath): void
    {
        unset($this->file);
        $this->file = new FileReader($fileFullPath);
    }

    public function next(): \NoRewindIterator
    {
        return new \NoRewindIterator($this->readFile());
    }

    /**
     * @return \Generator|int
     */
    private function readFile()
    {
        foreach ($this->file->iterateXLS() as $data) {
            if (\is_int($data)) {
                return $data;
            }

            $id = \trim((string) $data[0]);

            if ('' === $id || 'account ids' === \mb_strtolower($id)) {
                continue;
            }

            yield $id;
        }
    }
}
