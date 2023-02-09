from flask import Flask, request, jsonify
import requests



app = Flask(__name__)

MANAGER_URL = "localhost:10021/"
STORAGE_URL = "localhost:10020/store"



@app.route('/api', methods=['GET'])
def read():
    return jsonify({"status": "OK"})


@app.route('/api', methods=["PUT"])
def insert():
    content = request.get_json(silent=True)

    return jsonify(content)


if __name__ == "__main__":
    app.run(host="127.0.0.1", port=8080, debug=False)