from typing import final
import zipfile
import shutil

with open('./hint.txt', 'r') as f:
    passwd = f.read().replace('password is ', '').replace('?', '%s')
for i in range(36, 127):
    key = passwd % (chr(i))
    try:
        ziper = zipfile.ZipFile('onion.zip')
        ziper.extractall('./tmp/', pwd=key.encode('utf-8'))
        print(key)
        break
    except Exception as e:
        pass
    finally:
        ziper.close()
