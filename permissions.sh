chmod -R 0777 /home/xtreamcodes/
chmod 0755 /home/xtreamcodes/bin/php/*.pid
chmod 0755 /home/xtreamcodes/status
chmod a+x /home/xtreamcodes/status
chmod 0755 /home/xtreamcodes/service
sudo find /home/xtreamcodes/wwwdir/ -type f -exec chmod 644 {} \;
sudo find /home/xtreamcodes/wwwdir/ -type d -exec chmod 755 {} \;
sudo chmod +x /home/xtreamcodes/bin/nginx_rtmp/sbin/nginx_rtmp
chown xtreamcodes:xtreamcodes -R /home/xtreamcodes > /dev/null
