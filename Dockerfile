# Utiliza una imagen base de servidor web (nginx o apache)
FROM nginx:alpine

# Copia los archivos HTML al directorio web del servidor
COPY . /usr/share/nginx/html

# Expone el puerto 80 para acceder a la página web
EXPOSE 80