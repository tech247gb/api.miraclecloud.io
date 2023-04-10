<?php

declare(strict_types=1);

namespace App\Infrastructure\Services;

use Box\Spout\Reader\Common\Creator\ReaderFactory;

class FileReader
{
    /** @var string */
    protected $filename;

    /** @var string */
    private $mode;

    public function __construct(string $filename, string $mode = 'r')
    {
        if (! file_exists($filename)) {
            throw new \DomainException("File {$filename} not found");
        }

        $this->filename = $filename;
        $this->mode = $mode;
    }

    /**
     * @throws \Box\Spout\Reader\Exception\ReaderNotOpenedException
     * @throws \Box\Spout\Common\Exception\UnsupportedTypeException
     * @throws \Box\Spout\Common\Exception\IOException
     */
    public function xls(?string $sheetName = null): \NoRewindIterator
    {
        return new \NoRewindIterator($this->iterateXLS($sheetName));
    }

    /**
     * @throws \Box\Spout\Common\Exception\IOException
     * @throws \Box\Spout\Reader\Exception\ReaderNotOpenedException
     * @throws \Box\Spout\Common\Exception\UnsupportedTypeException
     *
     * @return int|\Generator
     */
    public function iterateXLS(?string $sheetName = null)
    {
        $path = $this->filename;
        $reader = ReaderFactory::createFromFile($path);
        $reader->open($path);
        $workSheet = null;
        $count = 0;
        foreach ($reader->getSheetIterator() as $sheet) {
            $workSheet = $sheet;
            if (null === $sheetName) {
                break;
            }

            if ($sheet->getName() === $sheetName) {
                $workSheet = $sheet;

                break;
            }
        }

        if (null === $workSheet) {
            return $count;
        }

        foreach ($workSheet->getRowIterator() as $row) {
            yield $row->toArray();
            $count++;
        }
        $reader->close();
        unset($path, $sheet, $workSheet, $reader, $row);

        return $count;
    }
}
