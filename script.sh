#! /bin/bash

kubectl create -f mysql-secrets.yml
kubectl create -f pv-mysql.yml --validate=false
kubectl create -f pvc-mysql.yml --validate=false
kubectl create -f mysql-deployment.yml
kubectl create -f mysql-service.yml --validate=false
kubectl create -f webserver.yml
kubectl create -f webserver-service.yml --validate=false
