import socket
import ssl
import threading

server_address = ('localhost',12345)

client = []
def handle_client(client_socket):
    client.append(client_socket)
    
    print("Da ket noi voi:", client_socket.getpeername())
    
    try:
        while True:
            data = client_socket.recv(1024)
            if not data:
                break
            print("Nhan:", data.decode('uft-8'))
            
            for client in clients:
                if client != client_socket:
