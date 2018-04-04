import java.io.FileInputStream;
import java.util.Properties;

/**
 * Created by Administrator on 2017/9/7.
 */
public class PropertiesTest {
    public static void main(String[] args) throws Exception {
        FileInputStream propFile = new FileInputStream("C:\\Users\\Administrator\\Desktop\\untitled\\out\\production\\untitled\\myProperties.txt");
        Properties p = new Properties(System.getProperties());
        p.load(propFile);

        System.setProperties(p);
        System.getProperties().list(System.out);
    }
}
