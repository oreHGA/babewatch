import cv2
import face_recognition

image = face_recognition.load_image_file("OG.jpg")
print (face_recognition.__version__)
face_locations = face_recognition.face_locations(image)