from flask import Flask, redirect, url_for, render_template

app = Flask(__name__)


if __name__ == "__main__":
    app.run(debug=True)
