<?php
/**
 * uksort() 函数使用用户自定义的比较函数按照键名对数组排序，并保持索引关系。
 *
 * 如果成功则返回 TRUE，否则返回 FALSE。
 *
 * 如果要排序的数组需要用一种不寻常的标准进行排序，那么应该使用此函数。
 *
 * 自定义函数应接受两个参数，该参数将被数组中的一对键名填充。比较函数在第一个参数小于，等于，或大于第二个参数时必须分别返回一个小于零，等于零，或大于零的整数。
 * 用户自定义的函数。函数必须设计为返回 -1, 0, 或 1，并应该接受两个供比较的参数，同时以类似下面这样的方式来工作：
 *
 *     如果 a = b, 返回 0
 *         如果 a > b, 返回 1
 *             如果 a < b, 返回 -1
 *
 *
 */

function cmp($a, $b)
{
    $a = preg_replace('@^(a|an|the) @', '', $a);
    $b = preg_replace('@^(a|an|the) @', '', $b);
    return strcasecmp($a, $b);
}

$a = array("John" => 1, "the Earth" => 2, "an apple" => 3, "a banana" => 4);

uksort($a, "cmp");

foreach ($a as $key => $value) {
    echo "$key: $value\n";
}
?>

<?php
echo PHP_SAPI;

protected function sendDeltasUDP( array $deltas ) {
    $aggregateStatsID = $this->config->get( 'AggregateStatsID' );
    $id = strlen( $aggregateStatsID ) ? $aggregateStatsID : wfWikiID();

    $lines = array();
    foreach ( $deltas as $key => $count ) {
        $lines[] = sprintf( $this->config->get( 'StatsFormatString' ), $id, $count, $key );
    }

    if ( count( $lines ) ) {
        static $socket = null;
        if ( !$socket ) {
            $socket = socket_create( AF_INET, SOCK_DGRAM, SOL_UDP );
        }
        $packet = '';
        $packets = array();
        foreach ( $lines as $line ) {
            if ( ( strlen( $packet ) + strlen( $line ) ) > 1450 ) {
                $packets[] = $packet;
                $packet = '';
            }
            $packet .= $line;
        }
        if ( $packet != '' ) {
            $packets[] = $packet;
        }
        foreach ( $packets as $packet ) {
            wfSuppressWarnings();
            socket_sendto(
                $socket,
                $packet,
                strlen( $packet ),
                0,
                $this->config->get( 'UDPProfilerHost' ),
                $this->config->get( 'UDPProfilerPort' )
            );
            wfRestoreWarnings();
        }
    }
}
?>
