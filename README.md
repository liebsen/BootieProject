<h1><i class='ion-ios-gear'></i> Caldero</h1>

<p>Micro Web Application Framework</p>

<h2>Install</h2>

<h3>Dump SQL schema</h3>
<p>Create a database and run:</p>

<pre><code data-language="shell">$ zcat vendor/caldero/schema/schema.sql.gz | mysql -u root -p caldero
</code></pre>


<h3>DB access config</h3>
<p>Open your config file</p>
<pre><code data-language="shell">$ cp vendor/caldero/config.default.php config.php
$ nano vendor/caldero/config.php
</code></pre>

<p>Edit with your database credentials</p>
<pre data-language="php"><code>define('DBHOST','localhost');
define('DBUSER','dbuser');
define('DBPASS','dbpass');
define('DBNAME','caldero');
</code></pre>

<h3>Nginx directive</h3>
<p>Create a new nginx entry like this</p>
<pre data-language="shell"><code>server {

        root /var/www/caldero/public;

        index index.php index.html index.htm;

        server_name caldero;

        location / {
                try_files $uri $uri/ /index.php$is_args$args;
        }

        location ~ \.php$ {
                fastcgi_pass unix:/var/run/php5-fpm.sock;
                fastcgi_index index.php;
                include fastcgi_params;
        }
}

</code></pre>