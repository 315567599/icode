<?php
	/**
	 * 考虑到Linux同一目录下的文件个数限制，这里拆分成1000个文件缓存目录
	 */
    protected function createCacheFilePath($key) {
        $folderSufix = sprintf('%03d', hexdec(substr(sha1($key), -5)) % 1000);
        $cacheFolder = $this->createCacheFileFolder() . DIRECTORY_SEPARATOR . $folderSufix;
        if (!is_dir($cacheFolder)) {
            mkdir($cacheFolder, 0777, TRUE);
        }

        return $cacheFolder . DIRECTORY_SEPARATOR . md5($key) . '.dat';
    }

?>
