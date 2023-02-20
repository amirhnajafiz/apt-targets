from flask import Flask, request, jsonify
import requests



app = Flask(__name__)

MANAGER_URL = "http://127.0.0.1:10021/"
STORAGE_URL = "http://127.0.0.1:10020/store"



@app.route('/api', methods=['GET'])
def read():
    global STORAGE_URL

    try:
        response = requests.get(STORAGE_URL, headers={'Accept': 'application/json'})
        if response.status_code != 200:
            print('storage failed')
            return jsonify({})
    except:
        print('server error')
        return jsonify({})


@app.route('/api', methods=["PUT"])
def insert():
    content = request.get_json(silent=True)

    response = requests.post(MANAGER_URL, json=content, headers={'Content-type': 'application/json'})
    if response.status_code != 201:
        print('manager failed')
        return jsonify({'status': 'FAIL'})


    return jsonify({'status': 'OK'})


if __name__ == "__main__":
    app.run(host="127.0.0.1", port=8080, debug=False)
