print("Nhap cac dong van ban (Nhap 'done' de ket thuc):")
lines = []
while True:
    line = input()
    if line.lower() =='done':
        break
    lines.append(line)
    #CHUYEN CAC DONG THANH CHU IN HOA VA IN RA MAN HINH
print("\nCac dong da nhap sau khi chuyen thanh chu in hoa:")
for line in lines:
    print(line.upper())