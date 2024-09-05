FROM node:18
ARG USER_ID=0
ENV USER_ID ${USER_ID}
RUN echo USER_ID=${USER_ID}

RUN useradd --shell /bin/bash -u 1000 -o -c "" -m user
USER $USER_ID