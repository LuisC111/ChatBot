from base64 import b64decode, b16encode
encriptada = ''
contra = b16encode(b64decode(encriptada)).lower()
print(contra)
