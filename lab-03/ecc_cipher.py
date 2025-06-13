import sys
import requests
from PyQt5.QtWidgets import QApplication, QMainWindow, QMessageBox
from ui.ecc import Ui_MainWindow  # Giả sử bạn đã thiết kế UI bằng Qt Designer và sinh file Ui_MainWindow

class MyApp(QMainWindow):
    def __init__(self):
        super().__init__()
        self.ui = Ui_MainWindow()
        self.ui.setupUi(self)

        # Gắn các nút vào các hàm
        self.ui.btn_gen_keys.clicked.connect(self.call_api_gen_keys)
        self.ui.btn_sign.clicked.connect(self.call_api_sign)
        self.ui.btn_verify.clicked.connect(self.call_api_verify)

    def call_api_gen_keys(self):
        url = "http://127.0.0.1:5000/api/ecc/generate_keys"
        try:
            response = requests.get(url)
            if response.status_code == 200:
                data = response.json()
                self.show_message("Thông báo", data["message"])
            else:
                self.show_message("Lỗi", "Không thể gọi API tạo khóa")
        except requests.exceptions.RequestException as e:
            self.show_message("Lỗi", f"Exception: {e}")

    def call_api_sign(self):
        url = "http://127.0.0.1:5000/api/ecc/sign"
        payload = {
            "message": self.ui.txt_info.toPlainText()
        }
        try:
            response = requests.post(url, json=payload)
            if response.status_code == 200:
                data = response.json()
                self.ui.txt_sign.setText(data["signature"])
                self.show_message("Thông báo", "Đã ký thành công")
            else:
                self.show_message("Lỗi", "Không thể gọi API ký")
        except requests.exceptions.RequestException as e:
            self.show_message("Lỗi", f"Exception: {e}")

    def call_api_verify(self):
        url = "http://127.0.0.1:5000/api/ecc/verify"
        payload = {
            "message": self.ui.txt_info.toPlainText(),
            "signature": self.ui.txt_sign.toPlainText()
        }
        try:
            response = requests.post(url, json=payload)
            if response.status_code == 200:
                data = response.json()
                if data["is_verified"]:
                    self.show_message("Thông báo", "Xác minh thành công")
                else:
                    self.show_message("Thông báo", "Xác minh thất bại")
            else:
                self.show_message("Lỗi", "Không thể gọi API xác minh")
        except requests.exceptions.RequestException as e:
            self.show_message("Lỗi", f"Exception: {e}")

    def show_message(self, title, content):
        msg = QMessageBox()
        msg.setWindowTitle(title)
        msg.setIcon(QMessageBox.Information)
        msg.setText(content)
        msg.exec_()

if __name__ == "__main__":
    app = QApplication(sys.argv)
    window = MyApp()
    window.show()
    sys.exit(app.exec_())
