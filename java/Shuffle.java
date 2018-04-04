import java.util.ArrayList;
import java.util.Collections;
import java.util.List;
import java.util.Random;

/**
 * Created by Administrator on 2017/9/7.
 */
public class Shuffle {
    public static void main(String[] args) {
        if (args.length == 0) {
            args = new String[]{"i","came","i","saw","i","left"};
        }
        List<String> list = new ArrayList<String>();
        for (String s : args) {
            list.add(s);
        }
        Collections.shuffle(list,new Random());
        System.out.println(list);
    }
}
