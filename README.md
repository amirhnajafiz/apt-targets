<h1 align="center">
    Microservice
</h1>

<br />

## What is Microservice?

Microservices are an architectural and organizational approach to software development 
where software is composed of small independent services that communicate over well-defined APIs. 
These services are owned by small, self-contained teams.

<br />

## Example

### Storage

Golang service for storing objects in database and read objects from storage.

```shell
curl -X PUT -d '{}' localhost:10020/store
```

```shell
curl -X GET localhost:10020/store
```

### Manager

Golang service for processing user requests.

```shell
curl -X POST -H 'Content-type: application/json' -d '{}' localhost:10021/
```

### Users

Python service for handling users.

```shell
curl -X PUT -H 'Content-type: application/json' -d '{}' localhost:8080/api
```

```shell
curl -X GET localhost:8080/api
```
