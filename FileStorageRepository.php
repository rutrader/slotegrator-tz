<?php

namespace Market;

final class FileStorageRepository
{

    /**
     * Returns image URL or null.
     * 
     * @param $fileName
     * @return string|null
     */
    public function getUrl($fileName): ?string
    {
        return '';
    }

    /**
     * Returns whether file exists or not.
     * 
     * @param string $fileName
     * @return bool
     */
    public function fileExists(string $fileName): bool
    {
        return true;
    }

    /**
     * Deletes a file in the filesystem and throws an exception in case of errors.
     * 
     * @param string $fileName
     * @return void
     */
    public function deleteFile(string $fileName): void
    {
    }

    /**
     * Saves a file in the filesystem and throws an exception in case of errors.
     * @param string $fileName
     * @return void
     */
    public function saveFile(string $fileName): void
    {
    }
}
