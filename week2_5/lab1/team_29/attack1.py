from requests import *

url = "http://222.92.61.110:21921/login.php"
dict = {
    "password" : "9ad2b3c1e055cf5b9159966bac76e44e"
}

r = post(url=url, data=dict)

print(r.text)
if '{"res":0}' not in r.text:
    print("success")
