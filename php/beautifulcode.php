<?php    
/*留意参数的排列方式*/
public static function compile(Route $route)
    {
        $hostVariables = array();
        $variables = array();
        $hostRegex = null;
        $hostTokens = array();

        if ('' !== $host = $route->getHost()) {
            $result = self::compilePattern($route, $host, true);

            $hostVariables = $result['variables'];
            $variables = array_merge($variables, $hostVariables);

            $hostTokens = $result['tokens'];
            $hostRegex = $result['regex'];
        }

        $path = $route->getPath();

        $result = self::compilePattern($route, $path, false);

        $staticPrefix = $result['staticPrefix'];

        $pathVariables = $result['variables'];
        $variables = array_merge($variables, $pathVariables);

        $tokens = $result['tokens'];
        $regex = $result['regex'];

        return new CompiledRoute(
            $staticPrefix,
            $regex,
            $tokens,
            $pathVariables,
            $hostRegex,
            $hostTokens,
            $hostVariables,
            array_unique($variables)
        );
    }


?>

<?php
	/**
	 * Get the URL (no query string) for the request.
	 *
	 * @return string
	 */
	public function url()
	{
		return rtrim(preg_replace('/\?.*/', '', $this->getUri()), '/');
	}

	/**
	 * Get the current path info for the request.
	 *
	 * @return string
	 */
	public function path()
	{
		$pattern = trim($this->getPathInfo(), '/');

		return $pattern == '' ? '/' : $pattern;
	}
?>

<?php

    /**
     * Selects the adapter to use.
     *
     * @param string $name
     *
     * @throws \InvalidArgumentException
     *
     * @return Finder The current Finder instance
     */
    public function setAdapter($name)
    {
        if (!isset($this->adapters[$name])) {
            throw new \InvalidArgumentException(sprintf('Adapter "%s" does not exist.', $name));
        }

        $this->resetAdapterSelection();
        $this->adapters[$name]['selected'] = true;

        return $this->sortAdapters();
    }

    /**
     * Removes all adapters registered in the finder.
     *
     * @return Finder The current Finder instance
     */
    public function removeAdapters()
    {
        $this->adapters = array();

        return $this;
    }

    public function ignoreDotFiles($ignoreDotFiles)
    {
        if ($ignoreDotFiles) {
            $this->ignore = $this->ignore | static::IGNORE_DOT_FILES;
        } else {
            $this->ignore = $this->ignore & ~static::IGNORE_DOT_FILES;
        }

        return $this;
    }

    /**
     * Returns the contents of the file
     *
     * @return string the contents of the file
     *
     * @throws \RuntimeException
     */
    public function getContents()
    {
        $level = error_reporting(0);
        $content = file_get_contents($this->getPathname());
        error_reporting($level);
        if (false === $content) {
            $error = error_get_last();
            throw new \RuntimeException($error['message']);
        }

        return $content;
    }

    public function testCommand($command)
    {
        if (!function_exists('exec')) {
            return false;
        }

        // todo: find a better way (command could not be available)
        $testCommand = 'which ';
        if (self::TYPE_WINDOWS === $this->type) {
            $testCommand = 'where ';
        }

        $command = escapeshellcmd($command);

        exec($testCommand.$command, $output, $code);

        return 0 === $code && count($output) > 0;
    }

    public function sign($uri)
    {
        return $uri.(false === (strpos($uri, '?')) ? '?' : '&').'_hash='.$this->computeHash($uri);
    }

    private function computeHash($uri)
    {
        return urlencode(base64_encode(hash_hmac('sha256', $uri, $this->secret, true)));
    }

    public function check($uri)
    {
        if (!preg_match('/^(.*)(?:\?|&)_hash=(.+?)$/', $uri, $matches)) {
            return false;
        }

        return $this->computeHash($matches[1]) === $matches[2];
    }
?>


<?php
    protected function varToString($var)
    {
        if (is_object($var)) {
            return sprintf('Object(%s)', get_class($var));
        }
        if (is_array($var)) {
            $a = array();
            foreach ($var as $k => $v) {
                $a[] = sprintf('%s => %s', $k, $this->varToString($v));
            }
            return sprintf('Array(%s)', implode(', ', $a));
        }
        if (is_resource($var)) {
            return sprintf('Resource(%s)', get_resource_type($var));
        }
        if (null === $var) {
            return 'null';
        }
        if (false === $var) {
            return 'false';
        }
        if (true === $var) {
            return 'true';
        }
        return (string) $var;
    }
?>

<?php
 public static function formatTime($secs)
    {
        static $timeFormats = array(
            array(0, '< 1 sec'),
            array(2, '1 sec'),
            array(59, 'secs', 1),
            array(60, '1 min'),
            array(3600, 'mins', 60),
            array(5400, '1 hr'),
            array(86400, 'hrs', 3600),
            array(129600, '1 day'),
            array(604800, 'days', 86400),
        );
        foreach ($timeFormats as $format) {
            if ($secs >= $format[0]) {
                continue;
            }
            if (2 == count($format)) {
                return $format[1];
            }
            return ceil($secs / $format[2]).' '.$format[1];
        }
    }

    public static function formatMemory($memory)
    {
        if ($memory >= 1024 * 1024 * 1024) {
            return sprintf('%.1f GiB', $memory / 1024 / 1024 / 1024);
        }
        if ($memory >= 1024 * 1024) {
            return sprintf('%.1f MiB', $memory / 1024 / 1024);
        }
        if ($memory >= 1024) {
            return sprintf('%d KiB', $memory / 1024);
        }
        return sprintf('%d B', $memory);
    }

?>

<?php

    /**
     * 自定义排序： Sorts items by descending quality.
     */
    private function sort()
    {
        if (!$this->sorted) {
            uasort($this->items, function ($a, $b) {
                $qA = $a->getQuality();
                $qB = $b->getQuality();

                if ($qA === $qB) {
                    return $a->getIndex() > $b->getIndex() ? 1 : -1;
                }

                return $qA > $qB ? -1 : 1;
            });

            $this->sorted = true;
        }
    }
?>

<?php

    /**
     * array_map 与闭包、引用的使用
     * Builds an AcceptHeader instance from a string.
     *
     * @param string $headerValue
     *
     * @return AcceptHeader
     */
    public static function fromString($headerValue)
    {
        $index = 0;

        return new self(array_map(function ($itemValue) use (&$index) {
            $item = AcceptHeaderItem::fromString($itemValue);
            $item->setIndex($index++);

            return $item;
        }, preg_split('/\s*(?:,*("[^"]+"),*|,*(\'[^\']+\'),*|,+)\s*/', $headerValue, 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE)));
    }
?>

<?php
    /**
     * Sends content for the current web response.
     *
     * @return Response
     */
    public function sendContent()
    {
        echo $this->content;

        return $this;
    }

    /**
     * Sends HTTP headers and content.
     *
     * @return Response
     *
     * @api
     */
    public function send()
    {
        $this->sendHeaders();
        $this->sendContent();

        if (function_exists('fastcgi_finish_request')) {
            fastcgi_finish_request();
        } elseif ('cli' !== PHP_SAPI) {
            static::closeOutputBuffers(0, true);
        }

        return $this;
    }
?>

<?php
    if ( $path[0] !== '/' ) {
        $path = '/' . $path;
    }
?>


