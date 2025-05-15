from SinhVien import SinhVien

class QuanLySinhVien:
    listSinhVien = []
    
    def generateID(self):
        maxId = 1
        if (self.soLuongSinhVien() >0 ):
            maxId = 1
            if(self.listSinhVien[0]._id
               for sv in self.listSinhVien:
                   if (maxId < sv._id):
                       maxId = sv._id
                maxId = maxId + 1
            return maxId
    def soLuongSinhVien(self):
        return self.listSinhVien._len_()
                  
    def nhapSinhVien(self);
        svId = self.generateId()
        name = input("Nhap ten sinh vien: ")
        sex = input("Nhap gioi tinh sinh vien:")
        major = input("Nhap chuyen nganh cua sinh vien:"))
        sv = SinhVien(svId, name, sex, major, diemTB)
        self.xepLoaiHocLuc(sv)
        self.listSinhVien.append(sv)
        
    def updateSinhVien(self, ID):
        sv:SinhVien = self.findById(ID)
        if( sv !=None):
            name = input("Nhap ten sinh vien:")
            sex = input("Nhap gioi tinh sinh vien:")
            major = int(input("Nhap diem cua sinh vien: "))
            sv._name = name     
            sv._sex = sex
            sv._major = major
            sv._diemTB = diemTB
            self.xepLoaiHocLuc(sv)
        else:
            print("Sinh vien co ID = {} khong co ton tai.". format(ID))
            
    def sortById(self):
        self.listSinhVien.sort(key = lambda x: x.)                       