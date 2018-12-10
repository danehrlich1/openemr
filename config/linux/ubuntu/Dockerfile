FROM ubuntu:18.04

RUN apt-get update
RUN apt-get install apt-transport-https -y && apt-get upgrade -y && apt-get install git -y
RUN git clone https://github.com/danehrlich1/openemr.git && cd openemr/config/linux/ubuntu
RUN chmod 770 ubuntu1804.sh && ./ubuntu1804.sh

EXPOSE 80 443

CMD ["apache2ctl", "-k", "start"]
