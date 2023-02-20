<h1 align="center">
    Microservice
</h1>

<br />

## What is Microservice?

Microservices are an architectural and organizational approach to software development
where software is composed of small independent services that communicate over well-defined APIs.
These services are owned by small, self-contained teams.

<br />

## Why Microservice?

Microservices improve performance because teams handle specific services rather 
than an app as a whole. This advantage leads to greater accountability, compliance, 
and data security. Microservices allow developers to become language and technology agnostic.

<br />

## Is Microservice Restful?

Microservices are the blocks of your application and perform different services, 
while REST APIs work as the glue or the bridge that integrates these separate microservices. 
APIs can be made up, wholly or partially, out of microservices. 
Developers can use Microservices for a lot more, though.

<br />

## Microservice better than Monolithic?

Another advantage of the microservices approach is that each element can be 
scaled independently. So the entire process is more cost- and 
time-effective than with monoliths when the whole application has 
to be scaled even if there is no need for it.

<br />

## Example

Creating a python service for handling users, which uses two other Golang services for managing and storing.

### Endpoints

```shell
curl -X PUT -H 'Content-type: application/json' -d '{"id": 100, "value": {"name": "amir", "student_number": "9831065"}}' localhost:8080/api
```

```shell
curl -X GET localhost:8080/api
```
