control

Projeto controle financeiro PHP

# Install modules - Lamp/git

$ sudo apt-get update
$ sudo install lamp-server^
$ sudo apt-get install git


$ sudo chmod 777 /var/www/html/ -Rf
$ git config --global user.name "João Silva" 
$ git config --global user.email "exemplo@seuemail.com.br"

$ git clone https://github.com/control.git 

# Para transformar qualquer diretório em um repositório GIT, o simples comando git init 
$ cd control 
$ git init /var/www/html/control

# Start the WebServer 
$ systemctl start apache2 
$ systemctl status apache2
$ 
# Access the web app in browser: 
$ http://localhost/control


# Migrate Tables (Escolha o sistema operacional apropriado)
# Para Linux
$ acessar localhost/control/install_linux
# Para Windows
$ $ acessar localhost/control/install_win


# Criar repositorio remoto (em teste)
$ git remote add origin https://github.com/ 

# Enviar arquivos para respositorio
$ git add <nome_do_arquivo>
$ git commit –m “Adicionar qualquer mensagem sobre o commit aqui”

$ Escolher qual branch será usada para alinhar os arquivos locais com o remoto
$ git checkout main

$substituir pela branch correspondente a sua área de trabalho
$ git push origin main 






