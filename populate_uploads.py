import os
import shutil
import random

image_paths = []
for (dirpath, dirnames, filenames) in os.walk(os.getcwd() + "/public" + "/images"):
    for filename in filenames:
        file = dirpath + "/" + filename
        image_paths.append(file)

n = 100
for i in range(n):
    image_path = random.choice(image_paths)
    shutil.copy(image_path, os.getcwd() + "/public" + "/uploads")
    os.rename(os.getcwd() + "/public" + "/uploads" + "/" + os.path.split(image_path)[-1], os.getcwd() + "/public" + "/uploads" + "/" + "choco" + str(i + 1) + ".jpg")
