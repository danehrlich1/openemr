FROM ubuntu:18.04

ARG DEBIAN_FRONTEND=noninteractive
RUN apt-get update
RUN apt install apt-transport-https git -y
RUN git clone https://github.com/danehrlich1/openemr.git
WORKDIR /openemr/config/linux/ubuntu/ubuntu-docker
RUN chmod 770 ubuntu1804.sh && ./ubuntu1804.sh

EXPOSE 80 443

CMD ["apache2ctl", "-k", "start"]
