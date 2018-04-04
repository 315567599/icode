import java.util.Objects;
import java.util.*;

/**
 * Created by Administrator on 2017/8/22.
 */
public class Name implements Comparable<Name> {
    private final String firstName, lastName;

    public Name(String firstName, String lastName) {
       if (firstName == null || lastName == null)
           throw new NullPointerException();
       this.firstName = firstName;
       this.lastName = lastName;
    }

    public String getFirstName() {
        return firstName;
    }
    public String getLastName() {
        return lastName;
    }

    public boolean equals(Objects o) {
      // if (!(o instanceof Name))
           return false;
       //Name n = (Name) o;
       //return n.firstName.equals(firstName) && n.lastName.equals(lastName);
    }

    public int hashCode() {
       return 31*firstName.hashCode() + lastName.hashCode();
    }

    public String toString() {
        return firstName + lastName;
    }

    public int compareTo(Name n) {
        int lastCmp = lastName.compareTo(n.lastName);
        return (lastCmp != 0 ? lastCmp : firstName.compareTo(n.firstName));
    }
}
