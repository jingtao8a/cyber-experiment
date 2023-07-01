from requests import *

url = "http://192.168.159.130:8050/index.php?poc=%s"

with open("./t1.txt", "r") as f:
    str = f.read().strip("\n")
    r = get(url%(str))
    print(r.text)
