import os

directory = "PHP/"
to_change = ["FROM Users","from Users","from `Users`","FROM `Users`"]


def GetNewLine(line):
    words = line.split(' ')
    new_line = ""
    for word in words:
            if word == "Users":
                new_line += " users "
            elif word=="`Users`":
                new_line += " `users` "
            else:
                new_line+= word+" "
    return new_line


for filename in os.listdir(directory):
    if filename.endswith(".php") or filename.endswith(".py"): 
        print(os.path.join(directory, filename),"\n")
        f = open(os.path.join(directory, filename),"r")
        newText = ""
        for line in f:
            is_changed = False
            for change in to_change:
                if change in line: 
                    newText+=(GetNewLine(line))
                    is_changed = True
            if is_changed==False:
                newText+=(line)
        fwr = open(os.path.join(directory, filename),"w")
        fwr.write(newText)
        fwr.close()
    else:
        continue