/**
 * Created by Administrator on 2017/9/12.
 */
import redis.clients.jedis.Jedis;
import redis.clients.jedis.JedisPool;
import redis.clients.jedis.JedisPoolConfig;

public class RedisTest {
    public static void main(String[] args) {
         JedisPoolConfig jedisPoolConfig = new JedisPoolConfig();
         jedisPoolConfig.setMaxTotal(10);
         JedisPool jedisPool = new JedisPool(jedisPoolConfig, "10.0.8.231",9927);
       // JedisPool jedisPool = new JedisPool(jedisPoolConfig, "10.0.8.141",9927);

        Jedis jedis = jedisPool.getResource();

        int i = 100000;
        long ret ;

        while (i-- > 0) {
           ret = jedis.zadd("test.jiangchao.1",1, Integer.toString(i));
           if (ret == 0) {
              System.out.println("codis zadd err");
               System.out.println("codis idx " + Integer.toString(i));
           } else {
               //System.out.println("codis ret 1");
           }
        }

        System.out.println("done");

    }
}
