import mysql.connector

try:
    connect = mysql.connector\
        .connect(user = "root",
                 password = "",
                 host = "localhost",
                 database = "dataonline"
                 )
    print("Connect is successfuly.")
except: print("Connect is fail!")