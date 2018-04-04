<?php
/**
 * easy log
 */

/**
 * Converts the response object to string containing all headers and the response content.
 *
 * @return string The response with headers and content
 */
public function __toString()
{
    $headers = '';
    foreach ($this->headers as $name => $value) {
        if (is_string($value)) {
            $headers .= $this->buildHeader($name, $value);
        } else {
            foreach ($value as $headerValue) {
                $headers .= $this->buildHeader($name, $headerValue);
            }
        }
    }

    return $headers."\n".$this->content;
}



/**
 * Returns the build header line.
 *
 * @param string $name  The header name
 * @param string $value The header value
 *
 * @return string The built header line
 */
protected function buildHeader($name, $value)
{
    return sprintf("%s: %s\n", $name, $value);
}

