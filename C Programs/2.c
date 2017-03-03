#include <stdio.h>

//creates a function that will take two pointers and swap their values
void swap_ints(int* a, int* b){
        int temp = *a;
	*a = *b;
	*b = temp;
}

int main(){
	int myInt1 = 21;
	int myInt2 = 34;
	//displays initial values
	printf("myInt1 = %d\n", myInt1);
	printf("myInt2 = %d\n", myInt2);
	//run the function
	swap_ints(&myInt1, &myInt2);
	//print the new values
	printf("myInt1 = %d\n", myInt1);
	printf("myInt2 = %d\n", myInt2);
	return 0;
}
