import sqlite3
import sys


# Connexion à la base de données
conn = sqlite3.connect('db.db')
cursor = conn.cursor()

if len(sys.argv) == 3:
    password = sys.argv[1]
    email = sys.argv[2]
    
    # Création d'une table
    cursor.execute('''CREATE TABLE IF NOT EXISTS users 
                  (id INTEGER PRIMARY KEY, email INTEGER TEXT, password INTEGER TEXT)''')
    conn.commit()

    # Insertion de données
    cursor.execute("INSERT INTO users (email, password) VALUES (?, ?)", (email, password))
    conn.commit()

    # Fermer la connexion à la base de données
    conn.close()
