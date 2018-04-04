import java.util.ArrayList;
import java.util.Collections;
import java.util.List;

/**
 * Created by Administrator on 2017/8/22.
 */
public class Deal {
    public static void main(String[] args) {
       if (args.length < 2) {
          args = new String[]{"4", "5"};
       }

       int numHands = Integer.parseInt(args[0]);
       int cardsPerHand = Integer.parseInt(args[1]);

       String[] suit = new String[]{
        "spades", "hearts","diamonds", "clubs"
       };
       String[] rank = new String[]{
         "ace","2","3","4","5" ,"6","7","8","9","jack","queen","king"
       };

       List<String> deck = new ArrayList<String >();
       for (int i =0; i< suit.length; i++)
          for(int j = 0; j < rank.length; j++) {
            deck.add(rank[j] + " of " + suit[i]);
          }

       Collections.shuffle(deck);

       if (numHands * cardsPerHand > deck.size()) {
            System.out.println("Not enough cards.");
            return;
       }

       for (int i =0; i < numHands; i++) {
            System.out.println(delHand(deck, cardsPerHand));
       }

    }

    public static <E> List<E> delHand(List<E> deck, int n) {
       int size = deck.size();
       List<E> handView = deck.subList(size - n, size);
       List<E> hand = new ArrayList<E>(handView);
       handView.clear();
       return hand;
    }
}
