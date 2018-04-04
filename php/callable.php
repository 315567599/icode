<?php
        if (is_callable($executor)) {
            $executor = call_user_func($executor, $this, $options);
        }

/****/

        $callback = function ($string) use ($res) {
            fclose($res);

            return strlen('Hello');
        };

        $this->handler->expects($this->exactly(1))
            ->method('fwrite')
            ->will($this->returnCallback($callback));
