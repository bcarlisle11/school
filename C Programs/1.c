#include <stdio.h>

//creates a funciton that will take a pointer and an int
void set(int *a, int val){
*a = val;
}


int main(){

int i = 11;
//print current value of i
printf("i = %d\n", i);
//run the function
set(&i, 2);
//print the new output
printf("i = %d\n", i);
return 0;
}

