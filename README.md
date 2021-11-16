<H2> SISTEMA DE AGENDAMENTO DE CONSULTAS MÉDICAS </H2>
<p> Para após clonar o repositório, siga os seguintes passos: </p>

<h3> 1- Use o comando "composer install" na pasta do projeto</h3>
<h3> 2- Crie um banco de dados e seu respectivo usuário (o segundo caso seja necessário) e insira-os no documento ".env", "DB_DATABASE" recebe o nome do banco, "DB_USER" é o nome do usuário e "DB_PASSWORD" é a senha do usuário. </h3>
<h3> 3- Use o comando "php artisan migrate" para migrar as tabelas necessárias para o funcionamento do programa. </h3>
<h3> 4- Use o comando "php artisan db:seed" para inserir o usuário administrador no programa. </h3>
<h3> 5- Para entrar no programa, use o usuário administrador: user = admin / senha = admin.</h3>
