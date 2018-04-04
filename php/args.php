<?php
function select($columns = ['*'])
    {
        $columns = is_array($columns) ? $columns : func_get_args();
        var_dump($columns);
    }
select('hello', 'world', '1');
?>
