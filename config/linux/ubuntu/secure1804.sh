######
###### ModSecurity
######

### Get ModSecurity Prerequisites
apt-get -y update && \
    apt-get -y install git \
    libtool \
    dh-autoreconf \
    pkgconf \
    libcurl4-gnutls-dev \
    libxml2 \
    libpcre++-dev \
    libxml2-dev \
    libgeoip-dev \
    libyajl-dev \
    liblmdb-dev \
    ssdeep \
    lua5.2-dev \
    apache2 \
    apache2-dev

### Get Modsecurity V3 and Build
cd /opt && \
    git clone -b v3/master https://github.com/SpiderLabs/ModSecurity
cd /opt/ModSecurity && \
    sh build.sh && \
    git submodule init && \
    git submodule update && \
    ./configure && \
    make && \
    make install
ln -s /usr/sbin/apache2 /usr/sbin/httpd
 
### Get Apache Connector    
cd /opt && \
    git clone https://github.com/SpiderLabs/ModSecurity-apache
cd /opt/ModSecurity-apache/ && \
    ./autogen.sh && \
    ./configure && \
    make && \
    make install

### Load Module
mkdir -p /etc/apache2/modsecurity.d/ && \
    echo "LoadModule security3_module \"$(find /opt/ModSecurity-apache/ -name mod_security3.so)\"" > /etc/apache2/mods-enabled/security.conf && \
    echo "modsecurity_rules 'SecRuleEngine On'" >> /etc/apache2/mods-enabled/security.conf && \
    echo "modsecurity_rules_file '/etc/apache2/modsecurity.d/include.conf'" >> /etc/apache2/mods-enabled/security.conf

### Get OWASP Rules
cd /etc/apache2/modsecurity.d/  && \
    mv /opt/ModSecurity/modsecurity.conf-recommended /etc/apache2/modsecurity.d/modsecurity.conf && \
    echo include modsecurity.conf >> /etc/apache2/modsecurity.d/include.conf && \
    git clone https://github.com/SpiderLabs/owasp-modsecurity-crs owasp-crs && \
    mv /etc/apache2/modsecurity.d/owasp-crs/crs-setup.conf.example /etc/apache2/modsecurity.d/owasp-crs/crs-setup.conf && \
    echo include owasp-crs/crs-setup.conf >> /etc/apache2/modsecurity.d/include.conf && \
    echo include owasp-crs/rules/\*.conf >> /etc/apache2/modsecurity.d/include.conf
    cp /opt/ModSecurity/unicode.mapping /etc/apache2/modsecurity.d/
 
### Final Edits
source /etc/apache2/envvars
httpd -t
sed -ie 's/setvar:tx.paranoia_level=1/setvar:tx.paranoia_level=2/g' /etc/apache2/modsecurity.d/owasp-crs/crs-setup.conf
# remove additional hash signs for paranoia level
sed -ie 's/SecRuleEngine DetectionOnly/SecRuleEngine On/g' /etc/apache2/modsecurity.d/modsecurity.conf
source /etc/apache2/envvars
apache2ctl -k start
