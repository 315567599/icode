import java.util.HashSet;
import java.util.Set;

/**
 * Created by Administrator on 2017/8/22.
 */
public class FindDups2 {
    public static void main(String[]  args) {
        Set<String> uniques = new HashSet<String>();
        Set<String> dups = new HashSet<String>();

        for (String a : args) {
            if (!uniques.add(a)) {
               dups.add(a);
            }
        }

        uniques.removeAll(dups);

        System.out.println("Unique words:" + uniques);
        System.out.println("Dups words:" + dups);
    }
}
