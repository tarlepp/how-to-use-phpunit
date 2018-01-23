# What is this ?

Project to demonstrate how to use [PHPUnit](https://phpunit.de/)

## Table of Contents

* [What is this ?](#what-is-this-)
  * [Table of Contents](#table-of-contents)
  * [Requirements](#requirements)
  * [Installation](#installation)
     * [Clone repository](#clone-repository)
     * [Install packages](#install-packages)
  * [Running](#running)
     * [Start the container](#start-the-container)
  * [Useful commands](#useful-commands)
  * [Authors](#authors)
  * [License](#license)

## Requirements

* Docker
  * [Mac](https://docs.docker.com/docker-for-mac/install/)
  * [Windows](https://docs.docker.com/docker-for-windows/install/)
  * [Ubuntu](https://docs.docker.com/engine/installation/linux/docker-ce/ubuntu/)
  
## Installation

**Note: in Windows environment use `%cd%` (in PowerShell use `${PWD}`) instead 
of `$(pwd)`**

### Clone repository

Get a checkout from GitHub

```bash
git clone https://github.com/tarlepp/how-to-use-phpunit.git
```

Or alternatively just download those codes as a zip archive and extract those 
into your computer.

### Install packages

```bash
docker run -v $(pwd):/app composer install
```

Note that this command must be run on the same directory where you cloned or 
unzipped project source files.

## Running

### Start the container

```bash
# using the docker-compose (preferred way)
docker-compose up -d

# as a daemon
docker run -v $(pwd):/how-to-use-phpunit -d how-to-use-phpunit

# in interactive mode
docker run -v $(pwd):/how-to-use-phpunit -it how-to-use-phpunit /bin/bash
```

### Running tests

```bash
docker-compose exec phpunit ./bin/phpunit
```

## Useful commands

There's few useful commands you can use to manage with containers.

```bash
# attach to running container (when started with docker-compose)
docker-compose exec phpunit /bin/bash

# stop containers
docker-compose down
```

Need more? Just run `docker` or `docker-compose` and you will be provided a
list of available commands or give [online documentation](https://docs.docker.com/engine/reference/commandline/docker/) 
a change.

## Authors

[Tarmo Leppänen](https://github.com/tarlepp)

## License

[The MIT License (MIT)](LICENSE)

Copyright (c) 2018 Tarmo Leppänen
