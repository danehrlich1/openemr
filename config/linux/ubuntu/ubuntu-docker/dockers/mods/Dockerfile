FROM danora/openemr-secure:emr

ARG DEBIAN_FRONTEND=noninteractive
#####
###### Security ######
######

### ModSecurity

### Get ModSecurity Prerequisites


### Get Modsecurity V3 and Build
RUN cd /opt && \
    git clone -b v3/master https://github.com/SpiderLabs/ModSecurity
RUN cd /opt/ModSecurity && \
    sh build.sh && \
    git submodule init && \
    git submodule update && \
    ./configure && \
    make && \
    make install
RUN ln -s /usr/sbin/apache2 /usr/sbin/httpd

### Get Apache Connector
RUN cd /opt && \
    git clone https://github.com/SpiderLabs/ModSecurity-apache
RUN cd /opt/ModSecurity-apache/ && \
    ./autogen.sh && \
    ./configure && \
    make && \
    make install

### Load Module
RUN mkdir -p /etc/apache2/modsecurity.d/ && \
    echo "LoadModule security3_module \"$(find /opt/ModSecurity-apache/ -name mod_security3.so)\"" > /etc/apache2/mods-enabled/security.conf && \
    echo "modsecurity_rules 'SecRuleEngine On'" >> /etc/apache2/mods-enabled/security.conf && \
    echo "modsecurity_rules_file '/etc/apache2/modsecurity.d/include.conf'" >> /etc/apache2/mods-enabled/security.conf

### Get OWASP Rules
RUN cd /etc/apache2/modsecurity.d/ \
    && mv /opt/ModSecurity/modsecurity.conf-recommended /etc/apache2/modsecurity.d/modsecurity.conf \
    && echo include modsecurity.conf >> /etc/apache2/modsecurity.d/include.conf \
    && git clone https://github.com/SpiderLabs/owasp-modsecurity-crs owasp-crs \
    && mv /etc/apache2/modsecurity.d/owasp-crs/crs-setup.conf.example /etc/apache2/modsecurity.d/owasp-crs/crs-setup.conf \
    && echo include owasp-crs/crs-setup.conf >> /etc/apache2/modsecurity.d/include.conf \
    && echo include owasp-crs/rules/\*.conf >> /etc/apache2/modsecurity.d/include.conf \
    && cp /opt/ModSecurity/unicode.mapping /etc/apache2/modsecurity.d/


### MAXMIND
# Program to update database
# Edit apache.conf to allow maxmind and set <if> block
RUN wget https://geolite.maxmind.com/download/geoip/database/GeoLite2-Country.tar.gz \
  && tar -xvf GeoLite2-Country* && mkdir /usr/local/share/GeoIP \
  && mv GeoLite2-Country*/GeoLite2-Country.mmdb /usr/local/share/GeoIP

RUN wget https://github.com/maxmind/mod_maxminddb/releases/download/1.1.0/mod_maxminddb-1.1.0.tar.gz \
  && tar -xvf mod_maxminddb-1.1.0.tar.gz \
  && cd mod_maxminddb-1.1.0
RUN ./configure \
  && make install \
  && go get -u -v github.com/maxmind/geoipupdate2/cmd/geoipupdate && cp -R go/bin/geoipupdate /usr/local/bin/

# Configure GeoIP update https://dev.maxmind.com/geoip/geoipupdate/
#crontab -l | { cat; echo "0 1 * * 1-7 rm -f /usr/local/share/GeoIP/G* \
#&& geoipupdate -d /usr/local/share/GeoIP && apache2ctl -k graceful"; } | crontab -
### remove GO?

### Final Edits
#source /etc/apache2/envvars
#httpd -t
RUN sed -ie 's/setvar:tx.paranoia_level=1/setvar:tx.paranoia_level=2/g' /etc/apache2/modsecurity.d/owasp-crs/crs-setup.conf && \
  sed -ie 's/SecRuleEngine DetectionOnly/SecRuleEngine On/g' /etc/apache2/modsecurity.d/modsecurity.conf
  #source /etc/apache2/envvars
  #apache2ctl -k start

### ModEvasive

### Fail2Ban

### UFW

#sudo ufw allow ‘Apache Full’
#sudo ufw allow ssh
#sudo ufw limit ssh
#— no-install-recommends
### SSH Config
