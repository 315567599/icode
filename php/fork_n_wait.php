<?php

if (! function_exists('pcntl_fork')) die('PCNTL functions not available on this PHP installation');
$childs = array();
$starttime = microtime(TRUE);

for ($x = 1; $x < 100; $x++) {
    switch ($pid = pcntl_fork()) {
    case -1:
        // @fail
        die('Fork failed');

    case 0:
        // @child: Include() misbehaving code here
        print "FORK: Child #{$x} preparing to nuke...\n";
        sleep($x+1);
        generate_fatal_error(); // Undefined function
        // The child process needed to end the loop.
        exit();

    default:
        // @parent
        print "FORK: Parent, letting the child run amok...\n";
        $childs[] = $pid;
    }
}

while(count($childs) > 0) {
    foreach($childs as $key => $pid) {
        $res = pcntl_waitpid($pid, $status, WNOHANG);
        
        // If the process has already exited
        if($res == -1 || $res > 0)
            unset($childs[$key]);
    }
    
    sleep(1);
}

$elapsed = microtime(TRUE) - $starttime;
print " ==> total elapsed: " . sprintf("%f secs. ", $elapsed);
 
print "Dione! :^)\n\n";
?>
