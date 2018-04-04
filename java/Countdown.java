import java.util.LinkedList;
import java.util.Queue;

/**
 * Created by Administrator on 2017/9/7.
 */
public class Countdown {
    public static void  main(String[] args) throws InterruptedException {
        if (args.length == 0) {
            args = new String[]{"20"};
        }

        int time = Integer.parseInt(args[0]);
        Queue<Integer> queue = new LinkedList<Integer>();

        for (int i = time; i>=0; i--) {
            queue.add(i);
        }

        while (!queue.isEmpty()) {
            System.out.print(queue.remove());
            Thread.sleep(1000);
        }
    }
}
