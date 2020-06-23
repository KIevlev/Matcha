FROM nginx

RUN rm -rf /etc/nginx
ADD conf /etc/nginx

COPY ssl/rootca.crt /etc/nginx/certs/default.crt
COPY ssl/private.key /etc/nginx/certs/default.key
