import zipfile
import os


with open('password.txt','r') as f:
    password = f.read().replace("passwd is ","").replace('?', '%s')

word = "abcdefghijklmnopqrstuvwxyz0123456789"
sign = 0

for i in range(0,36):
    for j in range(0,36):
        key = password%(word[i], word[j])
        try:
            #print(key)
            ziper = zipfile.ZipFile('misc.zip')
            ziper.extractall('./flag/',pwd = key.encode('utf-8'))
            print(key,flush=True)
            sign = 1
        except Exception as e:
            pass
        finally:
            ziper.close()
            if sign == 1:
                break
    if sign == 1:
        break
