import java.util.Arrays;
import java.util.Set;
import java.util.stream.Collectors;

/**
 * Created by Administrator on 2017/9/7.
 */

// The Java platform contains three general-purpose Set implementations: HashSet, TreeSet, and LinkedHashSet.
public class FindDups {
    public static void main(String[] args) {
       if (args.length == 0) {
          args = new String[]{"i","came","i","saw","i","left"};
       }
        Set<String> distinctWords = Arrays.asList(args).stream()
                .collect(Collectors.toSet());
        System.out.println(distinctWords.size()+
                " distinct words: " +
                distinctWords);
    }
}
