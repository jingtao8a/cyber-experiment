FROM gqleung/php72

RUN rm -rf /etc/apt/sources.list
ADD sources.list /etc/apt/sources.list

RUN apt-get update && apt-get -y install mysql-server
RUN apt -y install apache2 
RUN apt -y install uuid

RUN apt install -y openssh-server
RUN rm -f /etc/ssh/sshd_config
ADD sshd_config  /etc/ssh/sshd_config
RUN echo 'root:password'|chpasswd

RUN rm -rf /etc/profile.d/01-locale-fix.sh
ADD 01-locale-fix.sh /etc/profile.d/01-locale-fix.sh

RUN rm -rf /etc/apache2/apache2.conf
RUN rm -rf /etc/apache2/mods-enabled/dir.conf
RUN rm -rf /etc/php/7.2/apache2/php.ini
ADD apache2.conf /etc/apache2/apache2.conf
ADD dir.conf /etc/apache2/mods-enabled/dir.conf
ADD php.ini /etc/php/7.2/apache2/php.ini
#RUN apt -y install vim
RUN apt-get -y install php7.2-mysql

COPY ./files /tmp/
RUN rm -rf /var/www/html/*
RUN cp -rf /tmp/html/ /var/www/ && \
    chown -R root:root /var/www/html && \
    chmod -R 777 /var/www/html

RUN chown -R mysql:mysql /var/lib/mysql
RUN rm -rf /var/run/mysqld/mysqld.sock.lock

ADD ./ctf.sql /ctf.sql
ADD run.sh /usr/local/sbin/run.sh
RUN chown -R root:root /usr/local/sbin/run.sh
RUN chmod 755 /usr/local/sbin/run.sh

WORKDIR /var/www/html

VOLUME ["/var/lib/mysql"]
RUN mkdir -p /var/run/mysqld   #change
RUN usermod -d /var/lib/mysql/ mysql
RUN find /var/lib/mysql -type f -exec touch {} \;        #change
RUN chown -R mysql:mysql /var/lib/mysql /var/run/mysqld  #change


ENTRYPOINT ["/usr/local/sbin/run.sh"]