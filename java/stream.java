import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import java.util.stream.Stream;

/**
 * Created by Administrator on 2017/9/6.
 */
public class stream {
    public static void main(String[] args) {
       List<String> l = new ArrayList<String>(Arrays.asList("one", "two"));
       Stream<String> sl = l.stream();
       //
        int[] numbers = {1,2,3,4,5,6,7,8,9,10};
        int sum = Arrays.stream(numbers).reduce(0, (x,y)-> x+y);

        System.out.println("sum:" + Integer.toString(sum));
    }
}
