#Importamos los paquetes de flask
from flask import Flask,render_template,request
#Importamos las funciones para generar hash de contraseñas y verificar si una contraseña coincide con el hash
from werkzeug.security import generate_password_hash, check_password_hash
#Creamos una instancia de nuestra aplicacion
app = Flask(__name__)
app.config['MYSQL_HOST']='localhost'
app.config['MYSQL_USER']='root'
app.config['MYSQL_PASSWORD']=''
app.config['MYSQL_DB']='flaskDB'
#Nos permite que Flask vuelva a cargar las plantillas cuando se modifican 
app.config['TEMPLATES_AUTO_RELOAD'] = True
app.secret_key = 'mysecretkey'


#Creacion de ruta.La ruta/ es la ruta raiz,sera la que se mostrara cuando el proyecto se  
@app.route('/')
def home():
    #Estamos retornando una vista HTML DE LA CARPETA TEMPLATES 
    return render_template('login.html')

@app.route('/registro',method=['GET','POST'])
def registro():
    if request.method=="POST":
        nombre=request.form['nombre']
        apellido_p=request.form['apellido_p']
        correo=request.form['correo']
        password_hash=request.form['password_hash']
        id_rol=request.form['id_rol']
        password_hasheada=generate_password_hash(passwordhash)

#Iniciamos el servidor Flask en el puerto 5000
if __name__ == '__main__':
    app.run(port=5000)