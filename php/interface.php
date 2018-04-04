<?php
/**
 * Create a new Validator factory instance.
 *
 * @param  \Symfony\Component\Translation\TranslatorInterface  $translator
 * @param  \Illuminate\Contracts\Container\Container  $container
 * @return void
 */
public function __construct(TranslatorInterface $translator, Container $container = null)
{
    $this->container = $container;
    $this->translator = $translator;
}



namespace Illuminate\Validation;
interface PresenceVerifierInterface
{
    /**
     * Count the number of objects in a collection having the given value.
     *
     * @param  string  $collection
     * @param  string  $column
     * @param  string  $value
     * @param  int     $excludeId
     * @param  string  $idColumn
     * @param  array   $extra
     * @return int
     */
    public function getCount($collection, $column, $value, $excludeId = null, $idColumn = null, array $extra = []);
    /**
     * Count the number of objects in a collection with the given values.
     *
     * @param  string  $collection
     * @param  string  $column
     * @param  array   $values
     * @param  array   $extra
     * @return int
     */
    public function getMultiCount($collection, $column, array $values, array $extra = []);
}
