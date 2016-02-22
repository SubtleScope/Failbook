#!/bin/bash

line1=$(echo -en "\\033[0;42m~~~~~~~~~~~~~~~~ \\033[0m")
line2=$(echo -en "\\033[0;43m~~~~~~~~~~~~~~~~ \\033[0m")
line3=$(echo -en "\\033[0;45m~~~~~~~~~~~~~~~~ \\033[0m")
line4=$(echo -en "\\033[0;46m~~~~~~~~~~~~~~~~ \\033[0m")

a0=$(echo "                  _")
a1=$(echo "                 ( \\")
a2=$(echo "                  ) )                          ____________")
a3=$(echo "${line2} ( (  _''''''_   A.-.A       /            \\")
a4=$(echo "${line3}  \ \\/         \\/ , , \\     <    Meow!!   |")
a5=$(echo "${line4}   \           =   t  /=     \\____________/")
a6=$(echo "${line1}    \ ||'''''|  ',---,")
a7=$(echo "                /===/  //=====|   ||=========/")
a8=$(echo "               /   /__,))     |__,))        /")
a9=$(echo "              /============================/")

arrCat=("${a0}" "${a1}" "${a2}" "${a3}" "${a4}" "${a5}" "${a6}" "${a7}" "${a8}" "${a9}")
arrCatLen=${#arrCat[@]}

for (( i=0; i<${arrCatLen}; i++ ))
do
    if [ "${i}" == "3" ]
    then
       x=$(echo "${arrCat[$i]}" | sed 's/^/\~\~/')
       echo -en "\\033[0;43m${x} \n"
       sleep 0.1
    elif [ "${i}" == "4" ]
    then
       x=$(echo "${arrCat[$i]}" | sed 's/^/\~\~/')
       echo -en "\\033[0;45m${x}\\033[0m\n"
       sleep 0.1
    elif [ "${i}" == "5" ]
    then
       x=$(echo "${arrCat[$i]}" | sed 's/^/\~\~/')
       echo -en "\\033[0;46m${x}\\033[0m\n"
       sleep 0.1
    elif [ "${i}" == "6" ]
    then
       x=$(echo "${arrCat[$i]}" | sed 's/^/\~\~/')
       echo -en "\\033[0;42m${x}\\033[0m\n"
       sleep 0.1
    elif [ "${i}" == "0" ] || [ "${i}" == "1" ] || [ "${i}" == "2" ] || [ "${i}" == "7" ] || [ "${i}" == "8" ] || [ "${i}" == "9" ]
    then
       echo "${arrCat[$i]}" | sed 's/^/  /'
       sleep 0.1
    else
       echo "Cat Failure ... You hit your 9th life and now you're dead. Good job."
    fi
done
