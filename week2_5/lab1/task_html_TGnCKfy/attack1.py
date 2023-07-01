from requests import *

url = "http://222.92.61.110:25674/login.php"
dict = {
    "password" : "58cd50e14cea4cc40f538428858fda2c"
}

r = post(url=url, data=dict)

print(r.text)
if '{"res":0}' not in r.text:
    print("success")
