sudo nano /etc/nginx/sites-available/airtime254.co.ke

server {
listen 80;
listen [::]:80;

        root /var/www/html/impact/current/public;
        index index.php index.html index.htm index.nginx-debian.html;

        server_name airtime254.co.ke www.airtime254.co.ke;

        location / {
                try_files $uri $uri/ /index.php?$query_string;
        }


        location ~ \.php$ {
                include snippets/fastcgi-php.conf;

                fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
                fastcgi_param DOCUMENT_ROOT $realpath_root;

                fastcgi_pass unix:/run/php/php7.4-fpm.sock;

        }

        location ~ /\.ht {
                deny all;
        }

}

sudo ln -s /etc/nginx/sites-available/airtime254.co.ke /etc/nginx/sites-enabled/
