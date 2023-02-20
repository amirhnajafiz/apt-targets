<h1 align="center">
    Microservice
</h1>

<br />

## What is Microservice?

Microservices are an architectural and organizational approach to software development
where software is composed of small independent services that communicate over well-defined APIs.
These services are owned by small, self-contained teams.

<br />

### APIs

Python service for handling users, which uses two other Golang services for managing and storing.

```shell
curl -X PUT -H 'Content-type: application/json' -d '{"id": 100, "value": {"name": "amir", "student_number": "9831065"}}' localhost:8080/api
```

```shell
curl -X GET localhost:8080/api
```
