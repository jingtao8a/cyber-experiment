FROM gqleung/unserialize2

RUN rm -rf /tmp/*
COPY ./files /tmp/

RUN rm -rf /var/www/html/*
RUN cp -rf /tmp/html/ /var/www/ && \
    chown -R root:root /var/www/html && \
    chmod -R 777 /var/www/html
RUN apt update
RUN apt install -y net-tools

RUN rm -rf /usr/local/sbin/run.sh
ADD run.sh /usr/local/sbin/run.sh
RUN chown -R root:root /usr/local/sbin/run.sh
RUN chmod 755 /usr/local/sbin/run.sh

ENTRYPOINT ["/usr/local/sbin/run.sh"]