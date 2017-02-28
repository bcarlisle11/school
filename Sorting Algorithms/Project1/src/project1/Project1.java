/* Brendan Carlisle
 * Project1.Java
 * Sorting Algorithms
 */
package project1;

import java.io.File;
import java.io.FileNotFoundException;
import java.io.PrintWriter;
import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;
import java.util.concurrent.TimeUnit;

public class Project1 {

    private static int MYNUM;
    private static int ARRSIZE;
    private static int USERINPUT;

    public static void main(String[] args) throws FileNotFoundException {
        //declare a scanner to take input
        Scanner keyboard = new Scanner(System.in);

        //prompt user
        System.out.print("Please enter a filename with the .txt extension: ");

        //set filename = to user input
        String filename = keyboard.next();

        System.out.print("How large was the file you chose in thousands? (15, 30, 45, 60, 75, 90, 105, 120, 135, 150): ");

        //set sizeInt = next int
        int sizeInt = keyboard.nextInt();

        //Sets ARRSIZE based on user input
        if (sizeInt == 15) {
            ARRSIZE = 15000;
        } else if (sizeInt == 30) {
            ARRSIZE = 30000;
        } else if (sizeInt == 45) {
            ARRSIZE = 45000;
        } else if (sizeInt == 60) {
            ARRSIZE = 60000;
        } else if (sizeInt == 75) {
            ARRSIZE = 75000;
        } else if (sizeInt == 90) {
            ARRSIZE = 90000;
        } else if (sizeInt == 105) {
            ARRSIZE = 105000;
        } else if (sizeInt == 120) {
            ARRSIZE = 120000;
        } else if (sizeInt == 135) {
            ARRSIZE = 135000;
        } else if (sizeInt == 150) {
            ARRSIZE = 150000;
        } else {
            System.out.println("The number you entered was not valid.");
            System.exit(1);
        }

        String[] stringArr = new String[ARRSIZE];

        System.out.println("Processing Request...");

        //call loadIntoArray
        loadIntoArray(filename, stringArr);

        //prompt user
        System.out.print("Please select a sorting method from the follwing.\n1.Insertion Sort\n2.Merge Sort\n3.Heap Sort\n4.Build Heap\n");

        //set userInput = userInput
        USERINPUT = keyboard.nextInt();

        //call particular sorting method based on user input
        if (USERINPUT == 1) {
            //start timer
            long startTimer = System.nanoTime();
            insertionSort(stringArr);
            //creates the output file
            writeOutputFile(stringArr);
            //end timer
            long endTimer = System.nanoTime();
            //convert time from nano to millisec
            double timeElapsed = TimeUnit.MILLISECONDS.convert(endTimer - startTimer, TimeUnit.NANOSECONDS);
            //print time elapsed
            System.out.println("Time Elapsed = " + timeElapsed + " Milliseconds");
        } else if (USERINPUT == 2) {
            //start timer
            long startTimer = System.nanoTime();
            mergeSort(stringArr);
            //creates output file
            writeOutputFile(stringArr);
            //end timer
            long endTimer = System.nanoTime();
            //convert time from nano to millisecs
            double timeElapsed = TimeUnit.MILLISECONDS.convert(endTimer - startTimer, TimeUnit.NANOSECONDS);
            //print time elapsed
            System.out.println("Time Elapsed = " + timeElapsed + " Milliseconds");
        } else if (USERINPUT == 3) {
            //start timer
            long startTimer = System.nanoTime();
            heapSort(stringArr);
            writeOutputFile(stringArr);
            //end timer
            long endTimer = System.nanoTime();
            //convert time from nano to millisecs
            double timeElapsed = TimeUnit.MILLISECONDS.convert(endTimer - startTimer, TimeUnit.NANOSECONDS);
            //print time elapsed
            System.out.println("Time Elapsed = " + timeElapsed + " Milliseconds");
        } else if (USERINPUT == 4) {
            //start timer
            long startTimer = System.nanoTime();
            buildHeap(stringArr, ARRSIZE);
            writeOutputFile(stringArr);
            //end timer
            long endTimer = System.nanoTime();
            //convert time from nano to millisecs
            double timeElapsed = TimeUnit.MILLISECONDS.convert(endTimer - startTimer, TimeUnit.NANOSECONDS);
            //print time elapsed
            System.out.println("Time Elapsed = " + timeElapsed + " Milliseconds");
        }

    }

    public static void insertionSort(String[] items) {
        //declare local vars
        String temp;
        int num;

        for (int i = 1; i <= items.length - 1; i++) {
            //set temp = curr spot in array
            temp = items[i];
            for (num = i - 1; num >= 0 && items[num].compareTo(temp) > 0; num--) {
                //shift item at num down 1
                items[num + 1] = items[num];
            }
            //set the previously shifted arr spot to temp
            items[num + 1] = temp;
            //test to see what was printing
            //System.out.println(items[num + 1]);
        }
    }

    public static void mergeSort(String[] items) {
        if (items.length > 1) {
            //long startTimer = System.nanoTime();
            //create local var to store 1/2 items length + 1
            int num1 = items.length / 2;
            //create local temp arr with size of 1/2 items length + 1
            String[] leftSide = new String[num1];
            //create a copy of the array
            System.arraycopy(items, 0, leftSide, 0, num1);
            //sort the temp arr
            mergeSort(leftSide);
            //create a local var to store items length - num1
            int num2 = items.length - num1;
            //create a temp arr with size of items - 1/2 items length + 1
            String[] rightSide = new String[num2];
            //create a copy of the array
            System.arraycopy(items, items.length / 2, rightSide, 0, num2);
            //sort the temp arr
            mergeSort(rightSide);
            //merge the two temp arrs together
            merge(leftSide, rightSide, items);

            //long endTimer = System.nanoTime();
            //double timeElapsed = TimeUnit.SECONDS.convert(endTimer - startTimer, TimeUnit.NANOSECONDS);
            //System.out.println("Time Elapsed in Seconds = " + timeElapsed);
        }
    }

    public static void merge(String[] lhs, String[] rhs, String[] items) {
        //declare local vars
        int left = 0;
        int right = 0;
        int itemsIndex = 0;

        while (left < lhs.length && right < rhs.length) {
            //if lhs at left is greater than rhs at right, items at itemIndex++ equal to lhs at left++
            if (lhs[left].compareTo(rhs[right]) < 0) {
                items[itemsIndex++] = lhs[left++];
                //otherwise, items at itemIndex++ equal to rhs at right++
            } else {
                items[itemsIndex++] = rhs[right++];
            }
        }
        //while the left index < length of lhs arr, set items at itemIndex++ eqaul to lhs at left++
        while (left < lhs.length) {
            items[itemsIndex++] = lhs[left++];
        }
        //while the right index < length of rhs arr, set items at itemIndex++ eqaul to lhs at right++
        while (right < rhs.length) {
            items[itemsIndex++] = rhs[right++];
        }
        //for (int i = 0; i < ARRSIZE; i++) {
        //  System.out.println(items[i]);
        //}
    }

    public static void heapSort(String myArr[]) {
        //call heapify
        heapify(myArr);
        //while i>0 swap 0 with i, decrement MYNUM, and call maxHeap
        for (int i = MYNUM; i > 0; i--) {
            swap(myArr, 0, i);
            MYNUM--;
            buildHeap(myArr, 0);
        }
        //for (int i = 0; i < myArr.length; i++) {
        //  System.out.println(myArr[i]);
        //}
    }

    public static void heapify(String myArr[]) {
        //give MYNUM a value
        MYNUM = myArr.length - 1;
        //call maxHeap n times
        for (int i = MYNUM / 2; i >= 0; i--) {
            buildHeap(myArr, i);
        }
    }

    public static void buildHeap(String myArr[], int num) {
        //declare vars
        int left = 2 * num;
        int right = 2 * num + 1;
        int max = num;

        if (left <= MYNUM && myArr[left].compareTo(myArr[num]) > 0) {
            //if true set max to left
            max = left;
        }
        if (right <= MYNUM && myArr[right].compareTo(myArr[max]) < 0) {
            //if true set max to right
            max = right;
        }
        if (max != num) {
            //if true swap num and max and buildHeap again
            swap(myArr, num, max);
            buildHeap(myArr, max);
        }
    }

    public static void swap(String myArr[], int num1, int num2) {
        //set temp String to value of myArr at index num1
        String temp = myArr[num1];
        //swap indexes (num2 = num1, num1 = temp)
        myArr[num1] = myArr[num2];
        myArr[num1] = temp;
    }

    public static void loadIntoArray(String filename, String myArr[]) throws FileNotFoundException {
        //create a new scanner to take input
        Scanner inFile = null;
        //BufferedReader readIn = new BufferedReader(new FileReader("path/of/text"));
        try {
            //try to read the file
            inFile = new Scanner(new File(filename));
        } catch (FileNotFoundException e) {
            //if it isn't found, throw this error and crash program
            System.err.println("Error opening file " + filename);
            System.exit(1);
        }
        //while there is another line, read the file
        List<String> arrList = new ArrayList<>();
        while (inFile.hasNextLine()) {
            //add the next work to array list
            arrList.add(inFile.nextLine());
            //convert array list to array
            arrList.toArray(myArr);
        }
        //close input file
        inFile.close();
    }

    public static void writeOutputFile(String[] myArr) throws FileNotFoundException {
        PrintWriter outFile = null;
        String outFilename = "";

        if (USERINPUT == 1) {
            outFilename += "IS";
        } else if (USERINPUT == 2) {
            outFilename += "MS";
        } else if (USERINPUT == 3){
            outFilename += "HS";
        } else {
            outFilename += "BH";
        }

        if (ARRSIZE == 15000) {
            outFilename += "15K.txt";
        } else if (ARRSIZE == 30000) {
            outFilename += "30K.txt";
        } else if (ARRSIZE == 45000) {
            outFilename += "45K.txt";
        } else if (ARRSIZE == 60000) {
            outFilename += "60K.txt";
        } else if (ARRSIZE == 75000) {
            outFilename += "75K.txt";
        } else if (ARRSIZE == 90000) {
            outFilename += "90K.txt";
        } else if (ARRSIZE == 105000) {
            outFilename += "105K.txt";
        } else if (ARRSIZE == 120000) {
            outFilename += "120K.txt";
        } else if (ARRSIZE == 135000) {
            outFilename += "135K.txt";
        } else if (ARRSIZE == 150000) {
            outFilename += "150K.txt";
        }

        try {
            // Create empty file
            outFile = new PrintWriter(outFilename);
        } catch (FileNotFoundException e) {
            System.err.println("Error opening file " + outFilename);
            System.exit(1);
        }
        for (int i = 0; i < myArr.length; i++) {
            outFile.println(myArr[i]);
        }

        outFile.close();
    }
}
