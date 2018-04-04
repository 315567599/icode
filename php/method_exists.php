<?php
/**
 * Deteremine if the request passes the authorization check.
 *
 * @return bool
 */
protected function passesAuthorization()
{
    if (method_exists($this, 'authorize')) {
        return $this->authorize();
    }
    return true;
}
/**
 * Handle a failed authorization attempt.
 *
 * @return mixed
 */
protected function failedAuthorization()
{
    throw new UnauthorizedException;
}
