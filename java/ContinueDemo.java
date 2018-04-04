/**
 * Created by Administrator on 2017/8/2.
 */
public class ContinueDemo {
    public static void main(String[] args) {
        String searchMe =  "peter piper picked a " + "peck of pickled peppers";
        int max = searchMe.length();
        int numPos = 0;
        boolean found = false;

        for (int i = 0; i < max; i++) {
           if (searchMe.charAt(i) != 'p')
               continue;
           numPos++;
           found = true;
        }

        System.out.println("Found " + numPos +"p's in the string");
    }
}
