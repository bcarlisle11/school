#include <stdio.h>

//creates a funcion that takes two pointers and swaps them
void swap_ptrs(int** a, int** b){
	int *temp = *a;
	*a = *b;
	*b = temp;
}

int main(){
	int myInt1 = 16;
	int myInt2 = 213;
	int* myPtr1 = &myInt1;
	int* myPtr2 = &myInt2;
	//display initial values
	printf("myPtr1 = %d\n", *myPtr1);
	printf("myPtr2 = %d\n", *myPtr2);
	//run the funcion to swap pointers
	swap_ptrs(&myPtr1, &myPtr2);
	//display new values
	printf("myPtr1 = %d\n", *myPtr1);
	printf("myPtr2 = %d\n", *myPtr2);
	return 0;
}
