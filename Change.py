import os

directory = "PHP/"
to_change = ["FROM Users","from Users","from `Users`","FROM `Users`"]


def GetNewLine(line):
    words = line.split(' ')
    new_line = "";
    for word in words:
            if word == "Users":
                new_line += " users "
            elif word=="`Users`":
                new_line += " `user` "
            else:
                new_line+= word+" "
    return new_line


for filename in os.listdir(directory):
    if filename.endswith(".php") or filename.endswith(".py"): 
        print(os.path.join(directory, filename),"\n")
        f = open(os.path.join(directory, filename),"r")
        for line in f:
            for change in to_change:
                if change in line: 
                    print(line)
                    print(GetNewLine(line))

    else:
        continue