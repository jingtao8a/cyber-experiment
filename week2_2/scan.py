import telnetlib
def CheckPort(ip,port):
    tn = telnetlib.Telnet()
    try:
        tn.open(ip,int(port),timeout = 1.5)
        print("%s ==> %s open"%(ip,port))
    except Exception as e:
            pass
    finally:
        tn.close()
for i in range(1,65535):
    CheckPort("127.0.0.1",i)

