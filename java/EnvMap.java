import java.util.Map;

/**
 * Created by Administrator on 2017/9/7.
 */
public class EnvMap {
    public static void  main(String[] args) {
        Map<String, String> env = System.getenv();
        for (String envName : env.keySet()) {
           System.out.format("%s=%s%n",
                   envName,
                   env.get(envName));
        }
    }
}
