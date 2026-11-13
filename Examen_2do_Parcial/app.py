#LIBRERIAS
from flask import Flask, flash, redirect, render_template, request, url_for
from flask_mysqldb import MySQL


#Crear aplicacion
app=Flask(__name__)
app.config["TEMPLATES_AUTO_RELOAD"]=True

#Conexion
app.config['MYSQL_HOST']='localhost'
app.config['MYSQL_USER']='root'
app.config['MYSQL_PASSWORD']=''
app.config['MYSQL_DB']='crud_directorio'
app.secret_key='mysecretkey'
mysql=MySQL(app)

#Ruta Principal: read
@app.route('/')
def index():
    con=mysql.connection.cursor()
    con.execute("SELECT * FROM contactos")
    conContactos=con.fetchall()
    print(conContactos)
    return render_template('index.html',contactos=conContactos)
    

#Ruta guardar
@app.route('/guardar',methods=['POST'])
def guardar():
    if request.method=='POST':
        nombre=request.form['txtNombre']
        apellido=request.form['txtApellido']
        telefono=request.form['txtTelefono']
        correo=request.form['txtCorreo']
        direccion=request.form['txtDireccion']
        print(nombre,apellido,telefono,correo,direccion)
        con=mysql.connection.cursor()
        con.execute("INSERT INTO contactos(nombre,apellido,telefono,correo,direccion) VALUES(%s,%s,%s,%s,%s)",(nombre,apellido,telefono,correo,direccion))
        mysql.connection.commit()
    flash('Contacto Guardado Correctamente')
    
    return redirect(url_for('index'))

#Ruta editar
@app.route('/editar/<int:id>')
def editar(id):
    con=mysql.connection.cursor()
    con.execute("SELECT * FROM contactos WHERE id=%s",(id,))
    consultarId=con.fetchone();
    con.close()

    return render_template('editarContactos.html',contactos=consultarId)

@app.route('/actualizar/<int:id>', methods=['POST'])
def actualizar(id):
    if request.method=='POST':
        nombre=request.form['txtNombre']
        apellido=request.form['txtApellido']
        telefono=request.form['txtTelefono']
        correo=request.form['txtCorreo']
        direccion=request.form['txtDireccion']

        con=mysql.connection.cursor()
        con.execute('UPDATE contactos SET nombre=%s,apellido=%s,telefono=%s,correo=%s,direccion=%s WHERE id=%s',(nombre,apellido,telefono,correo,direccion))
        mysql.connection.commit()
    flash('Se actualizo el album')
    return redirect(url_for('index'))
@app.route('/eliminar/<int:id>',methods=['POST'])
def eliminar():
    if request.method=='POST':

        nombre=request.form['txtNombre']
        con=mysql.connection.cursor()
        con.execute('DELETE FROM contactos WHERE id=%s',(id,))
        mysql.connection.commit()
    flash('Se elimino el contacto'+nombre)
    return redirect(url_for('index'))




#Ejecutar aplicacion
if __name__=='__main__':
    app.run(debug=True)