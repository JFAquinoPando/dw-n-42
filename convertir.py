from PIL import Image
import os
import sys

def convert_images_to_jpg(input_folder, output_folder):
    # Verificar si el directorio de salida existe, si no, crearlo
    if not os.path.exists(output_folder):
        os.makedirs(output_folder)

    # Lista de extensiones de archivos de imágenes que se deben convertir
    image_extensions = ['.png', '.jfif', '.gif', '.jpeg', '.jpg']

    # Recorrer todos los archivos en el directorio de entrada
    for filename in os.listdir(input_folder):
        if(filename == sys.argv[1]):
            file_extension = os.path.splitext(filename)[1].lower()
            if file_extension in image_extensions:
                input_path = os.path.join(input_folder, filename)
                output_path = os.path.join(output_folder, os.path.splitext(filename)[0] + ".jpg")
                
                # Abrir la imagen y guardarla en formato JPG
                try:
                    with Image.open(input_path) as img:
                        img.convert("RGB").save(output_path, "JPEG")
                    print(f"{filename} convertido a JPG.")
                except Exception as e:
                    print(f"Error al convertir {filename}: {e}")

if __name__ == "__main__":
    input_folder = "C:\\xampp\\htdocs\\dw-n-42\\images"  # Cambia esta ruta por la carpeta que contiene las imágenes originales
    output_folder = "C:\\xampp\\htdocs\\dw-n-42\\images-min"  # Cambia esta ruta por la carpeta donde quieres guardar las imágenes convertidas
    #print(sys.argv[1])
    convert_images_to_jpg(input_folder, output_folder)
