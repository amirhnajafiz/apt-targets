from flask import Flask




app = Flask(__name__)



@app.route('/api', methods=['GET'])
def read():
    return 'Hello, World!'


@app.route('/api', methods=["PUT"])
def insert():
    pass


if __name__ == "__main__":
    app.run(port=8080)