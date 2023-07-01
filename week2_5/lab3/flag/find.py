import os

route = ""

def search(path):
    filelist = os.listdir(path)
    for file in filelist:
        if os.path.isdir(path + file):
            search(path + file + "/")
        else:
            if os.path.getsize(path + file):
                print("file route==>", path + file)
                global route
                route = path + file
                
if __name__ == "__main__":
    path = "./misc/"
    search(path)
    with open(route, "r") as f:
        print("==>", f.read())