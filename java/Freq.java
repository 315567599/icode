import java.util.HashMap;
import java.util.LinkedHashMap;
import java.util.Map;
import java.util.TreeMap;

/**
 * Created by Administrator on 2017/8/22.
 */
public class Freq {
    public static void main(String[] args) {
        if (args.length == 0) {
           args = new String[]{"if", "it", "is", "to", "be", "it", "is", "up", "to", "me", "to", "delegate"};
        }
        //Map<String, Integer> m = new HashMap<String, Integer>();
        //Map<String, Integer> m = new TreeMap<>();
        Map<String, Integer> m = new LinkedHashMap<String, Integer>();

        for (String s : args) {
            Integer freq = m.get(s);
            m.put(s, (freq == null) ? 1 : freq + 1);
        }

        System.out.println(m.size() + " distinct words");
        System.out.println(m);
    }
}
