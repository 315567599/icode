<?php

final public static function factory( array $params ) {
    $class = $params['class'];
    if ( !class_exists( $class ) ) {
        throw new MWException( "Invalid job queue class '$class'." );
    }
    $obj = new $class( $params );
    if ( !( $obj instanceof self ) ) {
        throw new MWException( "Class '$class' is not a " . __CLASS__ . " class." );
    }

    return $obj;
}

/********/

/**
 * Push a batch of jobs into the queue.
 * This does not require $wgJobClasses to be set for the given job type.
 * Outside callers should use JobQueueGroup::push() instead of this function.
 *
 * @param IJobSpecification[] $jobs
 * @param int $flags Bitfield (supports JobQueue::QOS_ATOMIC)
 * @return void
 * @throws MWException
 */
final public function batchPush( array $jobs, $flags = 0 ) {
    if ( !count( $jobs ) ) {
        return; // nothing to do
    }

    foreach ( $jobs as $job ) {
        if ( $job->getType() !== $this->type ) {
            throw new MWException(
                "Got '{$job->getType()}' job; expected a '{$this->type}' job." );
        } elseif ( $job->getReleaseTimestamp() && !$this->supportsDelayedJobs() ) {
            throw new MWException(
                "Got delayed '{$job->getType()}' job; delays are not supported." );
        }
    }

    $this->doBatchPush( $jobs, $flags );
    $this->aggr->notifyQueueNonEmpty( $this->wiki, $this->type );

    foreach ( $jobs as $job ) {
        if ( $job->isRootJob() ) {
            $this->deduplicateRootJob( $job );
        }
    }
}

/**
 * @see JobQueue::batchPush()
 * @param IJobSpecification[] $jobs
 * @param int $flags
 */
abstract protected function doBatchPush( array $jobs, $flags );



