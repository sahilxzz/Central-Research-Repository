import java.util.Scanner;

public class MinimumRemainingLength {
    
    public static String deleteSubstrings(String sequence) {
        StringBuilder result = new StringBuilder();
        int n = sequence.length();

        for (int i = 0; i < n; ) {
            if (i + 1 < n && sequence.charAt(i) == 'A' && sequence.charAt(i + 1) == 'B') {
                i += 2; // Skip 'AB'
            } else if (i + 1 < n && sequence.charAt(i) == 'B' && sequence.charAt(i + 1) == 'B') {
                i += 2; // Skip 'BB'
            } else {
                result.append(sequence.charAt(i++));
            }
        }

        return result.toString();
    }

    public static int findMinimumRemainingLength(String sequence) {
        int prevLength, currentLength;
        prevLength = sequence.length();

        do {
            currentLength = prevLength;
            sequence = deleteSubstrings(sequence);
            prevLength = sequence.length();
        } while (prevLength < currentLength);

        return prevLength;
    }

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        System.out.print("Enter the string sequence (consisting of 'A' or 'B' only): ");
        String sequence = scanner.next();

        int minRemainingLength = findMinimumRemainingLength(sequence);
        System.out.println("Minimum possible length of the remaining string: " + minRemainingLength);

        scanner.close();
    }
}
