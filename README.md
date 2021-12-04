# Shop Admin Panel

## QuickStart

- Install dependencies:

```bash
$ composer install
```

- Overwrite and configure the .env file

```bash
$ cp .env .env.local
```

- Run server:

(example)

```bash
$ php -S localhost:8787 -t public/
```
 OR
 
```bash
docker-compose -f docker/dev/docker-compose.yml up --build
```
