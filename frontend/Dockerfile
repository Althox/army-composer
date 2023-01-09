FROM node:18.12.1-alpine

WORKDIR /app

COPY package.json ./package.json
COPY package-lock.json ./package-lock.json
COPY next.config.js ./next.config.js
COPY pages ./pages
COPY public ./public
COPY styles ./styles

RUN npm install
