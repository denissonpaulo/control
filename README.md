# control
Projeto controle financeiro PHP

$ sudo apt-get update 
$ sudo apt-get install git

$ git config --global user.name "João Silva" 
$ git config --global user.email "exemplo@seuemail.com.br"

Para transformar qualquer diretório em um repositório GIT, o simples comando git init <directory>

# Get the code
$ git clone https://github.com/control.git
$ cd control
$
$ # Virtualenv modules installation (Unix based systems)
$ virtualenv env
$ source env/bin/activate
$
$ # Virtualenv modules installation (Windows based systems)
$ # virtualenv env
$ # .\env\Scripts\activate
$
$ # Install modules - MySQL Storage
$ pip3 install -r requirements.txt
$
$ # Create tables
$ python manage.py makemigrations
$ python manage.py migrate
$
$ # Start the application (development mode)
$ python manage.py runserver # default port 8000
$
$ # Start the app - custom port
$ # python manage.py runserver 0.0.0.0:<your_port>
$
$ # Access the web app in browser: http://127.0.0.1:8000/
