<?php

declare(strict_types=1);

namespace App\Infrastructure\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class FileService
{
    /**
     * @throws FileNotFoundException
     */
    public function show(string $disk, string $storage, string $fileName): string
    {
        return Storage::disk($disk)->get("{$storage}/{$fileName}");
    }

    public function delete(string $disk, string $storage, string $fileName): void
    {
        \unlink($this->fullPath($disk, $storage, $fileName));
    }

    public function fileExist(string $disk, string $storage, string $fileName): bool
    {
        return \file_exists(Storage::disk($disk)->path('')."{$storage}/{$fileName}");
    }

    public function fullPath(string $disk, string $storage, string $fileName): string
    {
        return Storage::disk($disk)->path('')."{$storage}/{$fileName}";
    }

    public function move(string $disk, string $sourceFilePath, string $storage, string $fileName): bool
    {
        return Storage::disk($disk)->move($sourceFilePath, "{$storage}/{$fileName}");
    }

    public function put(string $disk, string $storage, string $fileName, string $content)
    {
        return Storage::disk($disk)->put("{$storage}/{$fileName}", $content);
    }

    /**
     * @throws \Exception
     */
    public function generateFileName(string $originalName): string
    {
        return \bin2hex(\random_bytes(8)).'_'.$originalName;
    }
}
