# forecast_model.py
#The code defines a Flask web server with an endpoint /predict.
#When a POST request is sent to this endpoint with crop data (temperature and rainfall), the module calculates a predicted yield and returns it as JSON.
from flask import Flask, request, jsonify

app = Flask(__name__)

@app.route('/predict', methods=['POST'])
def predict_yield():
    """Endpoint to predict crop yield based on weather data."""
    data = request.json
    temperature = data.get('temperature')
    rainfall = data.get('rainfall')

    # Basic yield prediction logic (adjust as needed)python forecast_model.py

    predicted_yield = (temperature * 0.5) + (rainfall * 0.3)

    # Return the prediction as JSON
    return jsonify({'predicted_yield': predicted_yield})

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=True)
