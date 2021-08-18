# php-protobuf-example

Example project demonstrating the official Protobuf integration with PHP.

### How to run

Clone the repository then run the following command:

```
docker-compose up --build
```

When the container is done executing everything you should see the following in your terminal:

```
Protobuf binary payload (17 bytes): 0a0c48656c6c6f20776f726c642110d209
Equivalent JSON payload (47 bytes): {"exampleStr":"Hello world!","exampleInt":1234}

Decoded: example_str is Hello world!, example_int is 1234
```

It means it worked 🚀