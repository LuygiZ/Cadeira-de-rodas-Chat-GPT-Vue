from flask import Flask, request, jsonify
from flask_cors import CORS

app = Flask(__name__)
CORS(app)  # Permite requisições CORS para que o Vue.js possa se comunicar com o Flask

# Simulando controle de um dispositivo
device_state = {"status": "off"}

@app.route('/device', methods=['GET', 'POST'])
def control_device():
    if request.method == 'POST':
        action = request.json.get('action')
        if action == 'turn_on':
            device_state['status'] = 'on'
            return jsonify({"message": "Device turned on"}), 200
        elif action == 'turn_off':
            device_state['status'] = 'off'
            return jsonify({"message": "Device turned off"}), 200
        else:
            return jsonify({"message": "Invalid action"}), 400
    elif request.method == 'GET':
        return jsonify(device_state), 200

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)
