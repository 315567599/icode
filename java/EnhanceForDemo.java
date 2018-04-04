class EnhanceForDemo {
    public static void main(String[] args) {
        int[] numbers = {1,2,3,4,5,6,7,8,9,10};
        for (int item : numbers) {
           System.out.println("Count is" + item);
        }

        int count = numbers.length;
        for (int i = 0; i <count; i++ ) {
            System.out.println("Others Count is" + numbers[i]);
        }
    }
}
