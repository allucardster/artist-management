Artist Management
=================

Requirements
============
- Docker (>= 18.x)
- Docker Compose (>= 1.20)
- Make

Technology Stack
================
- Composer 2.0.x
- PHP 7.4
- Symfony 4.4
- PostgreSQL 13.2
- Nginx 1.x

Development Setup
=================
- Check `.env` file and adjust `artist-management project` section according your needs:
```
###> artist-management project ###
APP_PORT=8000             # Default application port (i.e. http://localhost:8000)
DB_USER=root              # Database username
DB_PASS=root              # Database password
DB_NAME=artist_management # Database name
DB_PORT=5432              # Database port
###< artist-management project ###
```
- Init docker containers
```sh
:~$ make up
```
- Install dependencies
```sh
:~$ make composer-install
```
- Execute database migrations
```sh
:~$ make database-migrations
```

Contributors
============
- Richard Melo [Twitter](https://twitter.com/allucardster), [Linkedin](https://www.linkedin.com/in/richardmelo)