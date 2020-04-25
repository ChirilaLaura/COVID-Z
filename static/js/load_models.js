


const model1 = tf.loadLayersModel('../../model_xray/model.json');
const model2 = tf.loadLayersModel('../../model_covid/model.json');


const example = tf.fromPixels('../../imagini_random2.jpg');  // for example
const prediction = model1.predict(example);

console.log(prediction);
