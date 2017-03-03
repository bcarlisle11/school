#include <stdio.h>
#include <stdlib.h>

//creates a struct to hold values
struct listnode{
	int myData;
	struct listnode* next;
}*head = NULL;

//function that will be called when nodes need to be added
void insertNodes(struct listnode *nodePtr, int myNewData){
	while(nodePtr->next != NULL){
		nodePtr = nodePtr->next;
}
	nodePtr->next = (struct listnode *)malloc(sizeof(struct listnode));
	nodePtr = nodePtr->next;
	nodePtr->myData = myNewData;
	nodePtr->next = NULL;
}

//finds the user specified element in the list
void find_Nth_element(struct listnode* head, int N){
	int num = 0;
	struct listnode *myNode = head;
	
	while(myNode != NULL){
		myNode = myNode->next;
		num++;

	}
	
	if(num < N){
		return;
	}

	myNode = head;

	for(int i = N; i > 1; i--){
		myNode = myNode->next;
	}

	printf("Nth node = %d \n", myNode->myData);
}	

void displayList(struct listnode *nodePtr){
	if(nodePtr == NULL){
		return;
	}

	printf("%d ", nodePtr->myData);
	displayList(nodePtr->next);
}

int main(){
	struct listnode *head;
	
	head = (struct listnode *)malloc(sizeof(struct listnode));	

	
	head->next = NULL;

	//creates the list
	insertNodes(head, 11);
	insertNodes(head->next, 512);
	insertNodes(head->next->next, 7);
	insertNodes(head->next->next->next, 66);

	//promp for node to display
	int userInput;
	printf("Which node would you like the value of? (1-4): ");
	scanf("%d", &userInput);

	//error checking for bad user input
	while((userInput > 4) || (userInput < 0)){
		printf("Please select a valid node: (1-4): ");
		scanf("%d", &userInput);
	}

	//run the function
	find_Nth_element(head, userInput);

	//show the list
	displayList(head);

	return 0;
}
