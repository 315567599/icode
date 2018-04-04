import java.io.File;
import java.io.IOException;
import java.util.*;

/**
 * Created by Administrator on 2017/8/22.
 */
public class Anagrams {
    public final static int minGroupSize = 2;

    public static void main(String[] args) {
        if (args.length ==0 ) {
            args = new String[]{"C:\\Users\\Administrator\\Desktop\\untitled\\src\\word.txt"};
        }

        Map<String, List<String>> m = new HashMap<String , List<String>>();
        try {
            Scanner s = new Scanner(new File(args[0]));
            while (s.hasNext()) {
                String word = s.next();
                String alpha = alphabetize(word);
                List<String> l = m.get(alpha);
                if (l == null) {
                   m.put(alpha, l= new ArrayList<String>());
                }
                l.add(word);
            }

        } catch (IOException e) {
           System.out.println(e);
           System.exit(1);
        }

        for (List<String> l : m.values()) {
           if (l.size() >= minGroupSize) {
               System.out.print(l.size() + ": " + l);
           }
        }
    }

    private static String alphabetize(String s) {
       char[] a = s.toCharArray();
        Arrays.sort(a);
        return new String(a);
    }
}
