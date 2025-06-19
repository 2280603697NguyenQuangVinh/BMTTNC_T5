import socket
import ssl
import threading

# Thông tin server
server_address = ('localhost', 23456)

def receive_data(ssl_socket):
    try:
        while True:
            data = ssl_socket.recv(1024)
            if not data:
                break
            print("Nhận:", data.decode('utf-8'))
    except:
        print("Lỗi khi nhận dữ liệu.")
    finally:
        ssl_socket.close()
        print("Kết nối đã đóng.")

# Tạo socket thường
client_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

# Bọc SSL
context = ssl.SSLContext(ssl.PROTOCOL_TLS_CLIENT)
context.check_hostname = False
context.verify_mode = ssl.CERT_NONE

ssl_socket = context.wrap_socket(client_socket, server_hostname='localhost')

# Kết nối đến server
try:
    ssl_socket.connect(server_address)
    print("Đã kết nối đến server.")
except Exception as e:
    print("Không thể kết nối đến server:", e)
    exit()

# Tạo luồng để nhận dữ liệu
receive_thread = threading.Thread(target=receive_data, args=(ssl_socket,), daemon=True)
receive_thread.start()

# Gửi tin nhắn
try:
    while True:
        message = input("Nhập tin nhắn: ")
        if message.strip().lower() == "exit":
            break
        ssl_socket.send(message.encode('utf-8'))
except KeyboardInterrupt:
    print("\nNgắt bởi người dùng.")
finally:
    ssl_socket.close()
