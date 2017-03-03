/*
Brendan Carlisle (800463980)
Project1
CS 447
Client Server Model
Client.cpp
*/


/*Includes*/
#include <iostream>
#include <string>
#include <time.h>
#include <windows.h>
#include <sys\timeb.h>
#include <windows.h>
#include <stdio.h>
#include <winsock.h>

/*Defines*/
#define	PROHIBITED_CLIENT	"146.163.147.208"
#define MAX_BUFFER_SIZE	100
#define MY_PORT_NUM	3069
#define MAX_CLIENTS	3

void main(void) {
	WORD wVersionRequested = MAKEWORD(1, 1);
	WSADATA wsaData;
	unsigned int sock_id, child_sock;
	struct sockaddr_in my_addr, client_addr;
	int client;
	int status, sendStatus;
	char in_buffer[MAX_BUFFER_SIZE];
	char time[MAX_BUFFER_SIZE];

	//Init winsock
	printf("Intializing WinSock..\n");
	if (WSAStartup(wVersionRequested, &wsaData) != 0) {
		printf("Failed to initialize Winsock. :'(");
		exit(EXIT_FAILURE);
	}

	//create socket
	sock_id = socket(AF_INET, SOCK_STREAM, 0);
	my_addr.sin_family = AF_INET;         /* Address Family To Be Used */
	my_addr.sin_port = htons(MY_PORT_NUM);     /* Port number to use */
	my_addr.sin_addr.s_addr = htonl(INADDR_ANY);
	printf("Socket created successfully!\n");

	//bind
	if (bind(sock_id, (struct sockaddr *) &my_addr, sizeof(my_addr)) == SOCKET_ERROR) {
		printf("Binding error with code: %d.\n Exiting.", WSAGetLastError);
		exit(EXIT_FAILURE);
	}
	printf("Binding succesful!\n");

	//listen
	printf("Listening for connections...\n");
	status = listen(sock_id, 3);


	for (int i = 0; i < 15; i ++){
		//accept
		client = sizeof(struct sockaddr_in);
		child_sock = accept(sock_id, (struct sockaddr *) &client_addr, &client);
		if (child_sock == INVALID_SOCKET) {
			printf("Accept failure with code: %d.\n Exiting.", WSAGetLastError);
			exit(EXIT_FAILURE);
		}
		//receive
		printf("Receiving..\n");
		status = recv(child_sock, in_buffer, MAX_BUFFER_SIZE, 0);
		printf("A connection request arrived!\n");
		char *client_ip = inet_ntoa(client_addr.sin_addr);
		printf("Request received from Client: %d\n", status);

		if (status > 0) {

		//send
			if (client_ip != PROHIBITED_CLIENT) {
				_strtime(time);
				char out_buffer[] = "Current Time: ";
				printf(time);
				sendStatus = send(child_sock, out_buffer + time, MAX_BUFFER_SIZE, 0);
				if (sendStatus == SOCKET_ERROR) {
					printf("Send failure with code: %d.\n Exiting.", WSAGetLastError());
					exit(EXIT_FAILURE);
				}
			}
			else {
				char out_buffer[] = "Your access is denied by this server!";
				sendStatus = send(child_sock, out_buffer, MAX_BUFFER_SIZE, 0);
			}

		}

		//close
		status = closesocket(child_sock);
		printf("Socket closed!\n");
	}

	//clean winsock
	WSACleanup();
}