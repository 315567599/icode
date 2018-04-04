/**
 * Created by Administrator on 2017/8/15.
 */
import java.lang.Thread;
import java.lang.Runnable;

public class Lambda {
    public static void main(String[] args) {
        // Java 8之前：
        new Thread(new Runnable() {
            //@Override
            public void run() {
                System.out.println("Before Java8, too much code for too little to do");
            }
        }).start();


        //Java 8方式：
        new Thread( () -> System.out.println("In Java8, Lambda expression rocks !!") ).start();
    }
}
