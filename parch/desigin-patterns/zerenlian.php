<?php
abstract class Logger {
	const ERR = 3;
	const NOTICE = 5;
	const DEBUG = 7;

	protected $mask;
	protected $next; // The next element in the chain of responsibility

	public function setNext(Logger $l) {
		$this->next = $l;
		return $this;
	}

	abstract public function message($msg, $priority);
}

class DebugLogger extends Logger {
	public function __construct($mask) {
		$this->mask = $mask;
	}

	public function message($msg, $priority) {
		if ($priority <= $this->mask) {
			echo "Writing to debug output: {$msg}\n";
		}

		if (false == is_null($this->next)) {
			$this->next->message($msg, $priority);
		}
	}
}

class EmailLogger extends Logger {
	public function __construct($mask) {
		$this->mask = $mask;
	}

	public function message($msg, $priority) {
		if ($priority <= $this->mask) {
			echo "Sending via email: {$msg}\n";
		}

		if (false == is_null($this->next)) {
			$this->next->message($msg, $priority);
		}
	}
}

class StderrLogger extends Logger {
	public function __construct($mask) {
		$this->mask = $mask;
	}

	public function message($msg, $priority) {
		if ($priority <= $this->mask) {
			echo "Writing to stderr: {$msg}\n";
		}

		if (false == is_null($this->next)) {
			$this->next->message($msg, $priority);
		}
	}
}

class ChainOfResponsibilityExample {
	public function __construct() {
		// build the chain of responsibility
		$l = new DebugLogger(Logger::DEBUG);
		$e = new EmailLogger(Logger::NOTICE);
		$s = new StderrLogger(Logger::ERR);

		$e->setNext($s);
		$l->setNext($e);

		$l->message("Entering function y.",		Logger::DEBUG);		// handled by DebugLogger
		$l->message("Step1 completed.",			Logger::NOTICE);	// handled by DebugLogger and EmailLogger
		$l->message("An error has occurred.",	Logger::ERR);		// handled by all three Loggers
	}
}

new ChainOfResponsibilityExample();
?
