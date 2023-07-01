img1=open('img1','rb')
img2=open('img2','rb')
img1 = img1.read()
img2 = img2.read()
for i in range(100,700):
    width = str(hex(i)).replace('0x','')
    if i < 256:
        width = bytes.fromhex("00" + width)
    elif i>=256:
        width = bytes.fromhex("0" + width)
    img=img1+width+img2
    f = open('%s.jpg'%i,'wb')
    f.write(img)
