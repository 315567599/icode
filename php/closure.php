<?php

/**
 * Execute a Closure within a transaction.
 *
 * @param  \Closure  $callback
 * @return mixed
 *
 * @throws \Exception
 */
public function transaction(Closure $callback)
{
    $this->beginTransaction();
    // We'll simply execute the given callback within a try / catch block
    // and if we catch any exception we can rollback the transaction
    // so that none of the changes are persisted to the database.
    try {
        $result = $callback($this);
        $this->commit();
    }
    // If we catch an exception, we will roll back so nothing gets messed
    // up in the database. Then we'll re-throw the exception so it can
    // be handled how the developer sees fit for their applications.
    catch (Exception $e) {
        $this->rollBack();
        throw $e;
    }
    return $result;
}



/**
 * Run a SQL statement.
 *
 * @param  string    $query
 * @param  array     $bindings
 * @param  \Closure  $callback
 * @return mixed
 *
 * @throws \Illuminate\Database\QueryException
 */
protected function runQueryCallback($query, $bindings, Closure $callback)
{
    // To execute the statement, we'll simply call the callback, which will actually
    // run the SQL against the PDO connection. Then we can calculate the time it
    // took to execute and log the query SQL, bindings and time in our memory.
    try {
        $result = $callback($this, $query, $bindings);
    }
    // If an exception occurs when attempting to run a query, we'll format the error
    // message to include the bindings with SQL, which will make this exception a
    // lot more helpful to the developer instead of just the database's errors.
    catch (Exception $e) {
        throw new QueryException(
            $query, $this->prepareBindings($bindings), $e
        );
    }
    return $result;
}

/**
 * Register a database query listener with the connection.
 *
 * @param  \Closure  $callback
 * @return void
 */
public function listen(Closure $callback)
{
    if (isset($this->events)) {
        $this->events->listen('illuminate.query', $callback);
    }
}
/**
 * Fire an event for this connection.
 *
 * @param  string  $event
 * @return void
 */
protected function fireConnectionEvent($event)
{
    if (isset($this->events)) {
        $this->events->fire('connection.'.$this->getName().'.'.$event, $this);
    }
}
/**
 * Get the elapsed time since a given starting point.
 *
 * @param  int    $start
 * @return float
 */
protected function getElapsedTime($start)
{
    return round((microtime(true) - $start) * 1000, 2);
}
