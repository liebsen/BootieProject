<h1><i class='ion-ios-gear'></i> Bootie</h1>

<h3>PHP 5 Micro Web Application Framework</h3>
<h5>Based on Micromvc by David Pennington</h5>
<p>This is a Bootie Framework Integrated Example Project</p>
<p>You can see an <a href="http://bootie.devmeta.net">online demo of this project</a></p>
<p>You can see <a href="https://github.com/martinfree/BootieREST">REST example</a></p>
<p>You can also clone a <a href="https://github.com/martinfree/BootieScheleton">scheleton project</a></p>

<hr>
<h2>This project covers</h2>
<ul>
<li>Posts CMS and Frontpages with images and tags</li>
<li>Static pages</li>
<li>Auth system</li>
</ul>

<h2>Improvements</h2>
<ul>
<li>Dispatching method simplification</li>
<li>Routing request method based</li>
<li>Multiple database connections</li>
<li>Filters</li>
<li>Speed Cache</li>
<li>Model pagination</li>
<li>Flash messages</li>
</ul>

<h2>Install</h2>

<p> Pull libraries</p>
<pre><code data-language="shell">$ composer install
</code></pre>

<p> Create an empty database and set your access credentials here</p>
<pre><code data-language="shell">$ cat config/config.sample.php > config/config.php
$ nano config/config.php
</code></pre>

<p>With Micro migrations tools run</p>
<pre><code data-language="shell">$ php cli create
$ php cli restore
</code></pre>

<h3>Nginx</h3>
<p>Nginx suggested directive</p>
<pre data-language="shell"><code>server {

        root /var/www/bootie/public;

        index index.php index.html index.htm;

        server_name bootie.local;

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

<p>Now you can login</p>
<pre><code data-language="shell">username: admin
password: admin
</code></pre>
