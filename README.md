<h1>Sistema de Gestão de Propostas de Serviços</h1>

<h2>Rodando localmente</h2>

<p>No terminal navegue até a pasta do projeto e instale as dependências do composer:</p>

<pre>$ composer install</pre>

<p>Certifique-se de ter criado o banco de dados e o tenha configurado no arquivo .env.</p>
<p>Rode a migração para criação das tabelas</p>

<pre>$ php artisan migrate</pre>

<p>Alimente o banco</p>

<pre>$ php artisan db:seed ClientSeeder</pre>

<p>Instale também as dependências do npm:</p>

<pre>$ npm install</pre>

<p>Por fim, starte o projeto com o comando:</p>

<pre>$ php artisan serve</pre>

</p><strong>OBS: </strong>As instruções acima estão considerando que em sua máquina tenha o Node e o Composer instalados.</p>

<p>Abaixo os links para a instalação dos mesmos:</p>

<a href="https://nodejs.org/en/download/">Node install</a>
<a href="https://getcomposer.org/download/">Composer install</a>
