from keras.preprocessing.image import img_to_array
from keras.models import load_model
import numpy as np
import argparse
import imutils
import cv2

ap = argparse.ArgumentParser()
ap.add_argument("-m1", "--model1", required=True, help="path to model1") 
ap.add_argument("-m2", "--model2", required=True, help="path to model2")
ap.add_argument("-i", "--image", required=True, help="path to image")
args = vars(ap.parse_args())

image = cv2.imread(args["image"])
orig = image.copy()

image = cv2.resize(image, (64, 64))
image = image.astype("float") / 255.0
image = img_to_array(image)
image = np.expand_dims(image, axis=0)

model1 = load_model(args["model1"]) 
model2 = load_model(args["model2"])
print("models loaded") 

(other, xray) = model1.predict(image)[0]
label2 = "Xray" if xray > other else "Other"
proba = "Xray" if xray > other else other
label = "{}: {:.2f}%".format(label2, proba * 100)

if label2 == "Xray":

    (infected, healthy) = model2.predict(image)[0]
    label2 = "Healthy" if healthy > infected else "Infected" 
    proba = "Healthy" if healthy > infected else "Infected" 
    label = "{}: {:.2f}%".format(label2, proba * 100)
    output = imutils.resize(orig, width=400)
    cv2.putText(output, label, (10, 25), cv2.FONT_HERSHEY_SIMPLEX,  0.7, (0, 255, 0), 2)
    cv2.imshow("Output", output) 
    cv2.waitKey(0)
else:

    output = imutils.resize(orig, width=400)
    cv2.putText(output, label, (10, 25), cv2.FONT_HERSHEY_SIMPLEX,  0.7, (0, 255, 0), 2)
    cv2.imshow("Output", output)
    cv2.waitKey(0)

