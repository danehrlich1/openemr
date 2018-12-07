### ModSecure

apt-get update
apt-get upgrade -y
apt-get install libapache2-modsecurity -y

mv /etc/modsecurity/modsecurity.conf-recommended  modsecurity.conf

git clone https://github.com/SpiderLabs/owasp-modsecurity-crs.git
cd owasp-modsecurity-crs
mv crs-setup.conf.example /etc/modsecurity/crs-setup.conf
mv rules/ /etc/modsecurity/

apache2ctl -k restart

### ModEvasive

### Fail2Ban

### UFW

### SSH Config
