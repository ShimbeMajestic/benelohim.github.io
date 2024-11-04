from flask import Flask

app = Flask(__name__)

@app.route('/')
def home():
    return "Welcome to the AgriTech Project!"

# Add other routes as needed
if __name__ == "__main__":
    app.run(debug=True, port=5000)
