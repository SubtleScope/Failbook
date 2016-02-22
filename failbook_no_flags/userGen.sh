#!/bin/bash

# Script Author: Nathan Wray (m4dh4tt3r)

scriptName=$(/usr/bin/basename "$0")

# Check if running as Root
if [ -f "/usr/bin/id" ]; then
   userName=$("/usr/bin/id" -un)
else
   echo "Command not found: id"
   exit 2
fi

if [ ! "${userName}" == "root" ]; then
       echo "${scriptName} must be run as root."
       exit 2
fi

# Check if cookie dir exists
if [ ! -d /root/cookie ]; then
   mkdir -p /root/cookie
fi


# Define Default Variables

fnameList=("Zoraida" "Chelsey" "Imelda" "Nickie" "Donny" "Gino" "Lily" "Deadra" "Charlesetta" "Kathey" "Collene" "Sheldon" "Ivette" "Christian" "Esmeralda" "Lizette" "Val" "Yelena" "Jc" "Fatimah" "Santana" "Alleen" "Bonita" "Denice" "Maryln" "Wendy" "Teresia" "Altagracia" "Thomasine" "Meghann" "Vella" "Anderson" "Danita" "Shawnda" "Marietta" "Shala" "Assunta" "Trinh" "Ryann" "Derek" "Oma" "Daphine" "Shirlee" "Chiquita" "Tyler" "Ivy" "Anisa" "Marisol" "Loma" "Yukiko" "Sharan" "Lahoma" "Maria" "Shonna" "Evalyn" "Solange" "Kip" "Katheryn" "Arlette" "Hoa" "Florentino" "Romana" "Evette" "Elodia" "Earnestine" "Cary" "Cameron" "Hwa" "Avis" "Sharron" "Greta" "Rufina" "Len" "Katherin" "Glinda" "Gertrudis" "Tamisha" "Laila" "Wai" "Christin" "Halley" "Yuk" "Becky" "Louise" "Kristine" "Ward" "Keenan" "Ozell" "Hae" "Kristin" "Joleen" "Gracia" "Karl" "Tianna" "Nakia" "Olevia" "Latricia" "Mollie" "Treva" "Marinda" "Alishia" "Deadra" "Davida" "Vance" "Jess" "Ernie" "Jodee" "Charise" "Bella" "Tony" "Dayle" "Ashlee" "Elida" "Gertie" "Dottie" "Melvin" "Nina" "Ehtel" "Jada" "Maisie" "Kate" "Joanna" "Deidre" "Eneida" "Margarito" "Jolynn" "Steffanie" "Rickie" "Soon" "Iluminada" "Chantay" "Layne" "Dorsey" "Deane" "Jake" "Cyndi" "Jenni" "Chanda" "Allison" "Emerson" "Aracelis" "Ailene" "Elane" "Owen" "Cristi" "Araceli" "Rosena" "Arlinda" "Lawrence" "Marco")

lnameList=("Lowery" "Allen" "Bray" "Hurst" "Donaldson" "Harrison" "Webb" "Clay" "Brennan" "Haynes" "Herring" "Howell" "Fleming" "Sosa" "Gilbert" "Schneider" "Parsons" "Alvarez" "Becker" "Austin" "Shaffer" "Soto" "Stewart" "Zavala" "Faulkner" "Rowe" "Lawson" "Lawrence" "Crane" "Alvarado" "Valentine" "Shaw" "Brock" "Palmer" "Mckay" "Watts" "Erickson" "Livingston" "Wood" "Cuevas" "Powell" "Richards" "Roach" "Pittman" "Guzman" "Pratt" "Burch" "Shea" "Mcguire" "Patrick" "Meadows" "Young" "Farley" "Morrison" "Fry" "Petty" "Pitts" "Bradshaw" "Mora" "Chaney" "Finley" "Brady" "Charles" "Costa" "Good" "Gomez" "Hendrix" "Arnold" "Meza" "English" "Wallace" "Carlson" "Osborne" "Woodard" "Nicholson" "Barrett" "Whitaker" "Rollins" "Barron" "Wagner" "Higgins" "Brandt" "Cherry" "Carter" "Santana" "Weber" "Davila" "Pope" "Hess" "Lang" "Miranda" "Flynn" "Spence" "Maynard" "Graves" "Mccullough" "Ellison" "Ponce" "Stout" "Madden" "Warner" "Rice" "Dawson" "Collins" "Mclean" "Kramer" "Davidson" "Sutton" "Rangel" "Zimmerman" "Shelton" "Holt" "Gallagher" "Walker" "Figueroa" "Huffman" "Tyler" "Burton" "Richmond" "Love" "Jennings" "Odom" "Kim" "Webster" "Baker" "Whitney" "Johns" "Ashley" "Aguilar" "Wade" "Burke" "Prince" "Wilcox" "Sloan" "Cline" "Mccormick" "Jacobs" "Kline" "Willis" "Pena" "Caldwell" "Randall" "Watkins" "Downs" "Giles" "Medina" "Haney" "Blake" "Horne" "Vance")

postList=("This website is really cool!!!!" "Oh yeah, this is the next big thing in social networking. Take that Facebook and Myspace" "Hope the FailBots don't catch me." "Generally, I would have to agree with my inner child." "Charles Barkley, srsly? Charles Barkley" "Haha, just read a message while eating cereal and milk come out of my nose." "Really? What is the world coming to these days! #notamused" "GrammarNazis need to stop monitoring my posts, if I want to use poor grammar, then I can; Haha, take that." "Is anyone else experienceing problems with their account?" "What's with all the weird traffic these days?" "I wish I could live in a bubble, I love bubbles" "I've been wondering for quite a while, is the world going to end?" "What, what?!?!?!? I won a million dollars in the UK Lottery. Thank you Nirobi Jane for informing me via email!" "Hoping to have some fun this weekend. Anyone want to join me?" "Hey, I just met you and I don't like you....;)" "Loving this new site!" "Tom is the best, can't believe he made such a cool website!" "I'm so tired of the news...how about some positive stuff once in a while" "My phone died. Goog thing this website doesn't have an app yet." "School is so boring, I can't wait for the day to be over." "omg...." "Tyler just proposed, I am so freakin' happy!!!" "I hope no one hacks my account!" "It is something special when you hold your child for the first time" "When will it end? When will it end?!?!?!")

agentList=("Mozilla/5.0 (Windows NT 6.1; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0" "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_2) AppleWebKit/600.3.18 (KHTML, like Gecko) Version/8.0.3 Safari/600.3.18" "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.111 Safari/537.36" "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.10; rv:35.0) Gecko/20100101 Firefox/35.0" "Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.111 Safari/537.36" "Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0" "Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:35.0) Gecko/20100101 Firefox/35.0" "Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; rv:11.0) like Gecko" "Mozilla/5.0 (iPhone; CPU iPhone OS 8_1_3 like Mac OS X) AppleWebKit/600.1.4 (KHTML, like Gecko) Version/8.0 Mobile/12B466 Safari/600.1.4" "Mozilla/5.0 (Windows NT 6.3; WOW64; Trident/7.0; rv:11.0) like Gecko")

realVal=0
randVal=1
likePost=0
userCount=250
userPid="1886239931"
genUser=$(tr -dc A-Za-z0-9 < /dev/urandom | head -c 8)
userAgent="Mozilla/5.0 (Windows NT 6.1; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0"

help() {
    echo "User Generator Help:"
    echo -e "\tThis script is used to generate users for Failbook using cURL."
    echo ""
    echo "Options:"
    echo -e "\t-h,--help"
    echo -e "\t => Prints this help message."
    echo ""
    echo -e "\t-rand,--random"
    echo -e "\t => Generates random users of Failbook with unrealistic names (e.g. - j3BGwj0T)."
    echo -e "\t => This is the default method."
    echo ""
    echo -e "\t-real,--realistic"
    echo -e "\t => Generates random users of Failbook with realistic names (e.g. - Chesley Webster)."
    echo ""
    echo -e "\t-n,--num"
    echo -e "\t => Sets the number of users to create (e.g. - 1000)."
    echo ""
    echo -e "\t-p,--pid"
    echo -e "\t => Sets the pid of a user, used with the -l option."
    echo -e "\t => Default value of 1886239931 (Tom's Account)."
    echo ""
    echo -e "\t-l,--like"
    echo -e "\t => Toggle this option to enable all generated users to like a certain user's post, used with the -p option."
    echo ""
    echo -e "\t-t,--target"
    echo -e "\t => Sets the desired Failbook host IP/hostname."
    echo -e "\t => This option is required."
	echo ""
	echo -e "\t-u,--useragent"
    echo -e "\t => Sets a random user agent to connect to Failbook."
}

while [ $# -gt 0 ]
do
    if [ "${1}" = "-h" ]
    then
       help
       exit 0
    fi

    if  [ "${1}" = "-rand" ] || [ "${1}" = "--random" ]
    then
       shift
       randVal=1
       realVal=0
       continue
    fi 

    if [ "${1}" = "-real" ] || [ "${1}" = "--realistic" ]
    then
       shift
       randVal=0
       realVal=1
       continue
    fi

    if [ "${1}" = "-n" ] || [ "${1}" = "--num" ]
    then
       shift
       userCount="${1}"
       shift
       continue
    fi

    if [ "${1}" = "-p" ] || [ "${1}" = "--pid" ]
    then
       shift
       userPid="${1}"
       shift
       continue
    fi
       
    if [ "${1}" = "-l" ] || [ "${1}" = "--like" ]
    then
       shift
       likePost=1
       continue
    fi

    if [ "${1}" = "-t" ] || [ "${1}" = "--target" ] 
    then
       shift
       targetSys="${1}"
	   if [ "${targetSys}" = "" ]
	   then
	      echo "Target (-t option) must be set!"
		  exit 1
	   fi
       shift
       continue
    fi
	
	if [ "${1}" = "-u" ] || [ "${1}" = "--useragent" ] 
    then
       shift
       userAgent=""
       continue
    fi

    shift $#
done

for ((i=1; i<="${userCount}"; i++))
do
    if [ "${randVal}" == "1" ] && [ "${realVal}" == "0" ]
    then
       # Generate Random String
       genUser=$(tr -dc A-Za-z0-9 < /dev/urandom | head -c 8)

       # Select User Agent
       userAgent=${agentList[$RANDOM % ${#agentList[@]}]}

       # Create User Account
       curl -A "${userAgent}" -d "fname=${genUser}&lname=${genUser}&username=${genUser}&password=${genUser}&pconfirm=${genUser}" "http://${targetSys}/register.php"

       # Login as User
       curl --insecure -A "${userAgent}" -c "/root/cookie/cookie$genUser.txt" -d "username=$genUser&pass=$genUser" "http://${targetSys}/login.php"

       # Create Post as User
       postText=${postList[$RANDOM % ${#postList[@]}]}
       curl --insecure -A "${userAgent}" -b "/root/cookie/cookie$genUser.txt" -d "text=${postText}" "http://${targetSys}/posts.php"

       if [ "${likePost}" == "1" ]
       then 
          # Like a User's Post
          curl --insecure -A "${userAgent}" -b "/root/cookie/cookie$genUser.txt" -d "pid=${userPid}" "http://${targetSys}/userlikes.php"
       fi

       echo "${i}: ${genUser} ${genUser}" >> /root/cookie/userList.txt
    elif [ "${randVal}" == "0" ] && [ "${realVal}" == "1" ]
    then
       # Generate Password
       genPass=$(tr -dc A-Za-z0-9 < /dev/urandom | head -c '8')

       # Select User Agent
       userAgent=${agentList[$RANDOM % ${#agentList[@]}]}
  
       # Generate First Name
       fnameSet=${fnameList[$RANDOM % ${#fnameList[@]}]}

       # Generate Last Name
       lnameSet=${lnameList[$RANDOM % ${#lnameList[@]}]}

       # Generate Username
       middleLtr=$(tr -dc "[:lower:]" < /dev/urandom | head -c '1')

       userName=$(echo ${fnameSet,,} | head -c 1 && echo -n "${middleLtr}" && echo ${lnameSet,,})       

       # Create User Account
       curl -A "${userAgent}" -d "fname=${fnameSet}&lname=${lnameSet}&username=${userName}&password=${genPass}&pconfirm=${genPass}" "http://${targetSys}/register.php"
  
       # Login as User
       curl --insecure -A "${userAgent}" -c "/root/cookie/cookie_${userName}.txt" -d "username=${userName}&pass=${genPass}" "http://${targetSys}/login.php"

       # Create Post as User
       postText=${postList[$RANDOM % ${#postList[@]}]}
       curl --insecure -A "${userAgent}" -b "/root/cookie/cookie_${userName}.txt" -d "text=${postText}" "http://${targetSys}/posts.php"
       if [ "${likePost}" == "1" ]
       then
          # Like a User's Post
          curl --insecure -A "${userAgent}" -b "/root/cookie/cookie_${userName}.txt" -d "pid=${userPid}" "http://${targetSys}/userlikes.php"
       fi

       echo "${i}: ${userName} ${genPass} ${userAgent}" >> /root/cookie/userList.txt
    else
       echo "An unspecified error has occured."
       exit 1
    fi
done
