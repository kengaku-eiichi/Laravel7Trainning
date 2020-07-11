FROM mysql:8.0
RUN set -x
RUN echo "Asia/Tokyo"> /etc/timezone
RUN cp /usr/share/zoneinfo/Asia/Tokyo /etc/localtime
COPY conf/default_authentication_plugin.cnf /etc/mysql/conf.d/
RUN chmod 644 /etc/mysql/conf.d/default_authentication_plugin.cnf
COPY conf/lower_case_table_names.cnf /etc/mysql/conf.d/
RUN chmod 644 /etc/mysql/conf.d/lower_case_table_names.cnf
