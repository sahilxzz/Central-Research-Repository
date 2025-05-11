#include <iostream>
#include <string>

using namespace std;

string deleteSubstrings(string sequence) {
    int n = sequence.length();
    string result = "";

    for (int i = 0; i < n; ) {
        if (i + 1 < n && sequence[i] == 'A' && sequence[i + 1] == 'B') {
            i += 2; // Skip 'AB'
        } else if (i + 1 < n && sequence[i] == 'B' && sequence[i + 1] == 'B') {
            i += 2; // Skip 'BB'
        } else {
            result += sequence[i++];
        }
    }

    return result;
}

int findMinimumRemainingLength(string sequence) {
    int prevLength, currentLength;
    prevLength = sequence.length();

    do {
        currentLength = prevLength;
        sequence = deleteSubstrings(sequence);
        prevLength = sequence.length();
    } while (prevLength < currentLength);

    return prevLength;
}

int main() {
    string sequence;
    cout << "Enter the string sequence (consisting of 'A' or 'B' only): ";
    cin >> sequence;

    int minRemainingLength = findMinimumRemainingLength(sequence);
    cout << "Minimum possible length of the remaining string: " << minRemainingLength << endl;

    return 0;
}
