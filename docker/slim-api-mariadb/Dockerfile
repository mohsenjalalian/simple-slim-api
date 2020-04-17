FROM mariadb:10.4.10

RUN apt-get update \
 && apt-get install --no-install-recommends -y tzdata \
 && apt-get clean \
 && rm -r /var/lib/apt/lists/*

ENV TZ Asia/Tehran

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# copy our custom config file to container
COPY ./docker/slim-api-mariadb/slimapi.cnf /etc/mysql/conf.d/slimapi.cnf
