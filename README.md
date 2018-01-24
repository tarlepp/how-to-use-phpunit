# What is this ?

Project to demonstrate how to use [PHPUnit](https://phpunit.de/) and [Selenium](http://www.seleniumhq.org/)

## Table of Contents

* [What is this ?](#what-is-this-)
  * [Table of Contents](#table-of-contents)
  * [Requirements](#requirements)
  * [Installation](#installation)
     * [Clone repository](#clone-repository)
     * [Install packages](#install-packages)
     * [Notes for Windows environment](#notes-for-windows-environment)
  * [Usage](#usage)
     * [Start the containers](#start-the-containers)
     * [Performing tests](#performing-tests)
     * [Next steps](#next-steps)
  * [Useful commands](#useful-commands)
  * [Authors](#authors)
  * [License](#license)

## Requirements

* Docker
  * [Mac](https://docs.docker.com/docker-for-mac/install/)
  * [Windows](https://docs.docker.com/docker-for-windows/install/)
  * [Ubuntu](https://docs.docker.com/engine/installation/linux/docker-ce/ubuntu/)
  
## Installation

### Clone repository

Get a checkout from GitHub

```bash
git clone https://github.com/tarlepp/how-to-use-phpunit.git
```

Or alternatively just download codes as a zip archive and extract that to your 
computer.

### Install packages

```bash
docker run -v $(pwd):/app composer install
```

Note that this command must be run on the same directory where you cloned or 
unzipped project source files.

### Notes for Windows environment

* Within commands use `%cd%` (in PowerShell use `${PWD}`) instead of `$(pwd)`
* Check that you've activated shared drives, open Docker settings from your tray and open `Shared Drives`
* If you're using eg. [VirtualBox](https://www.virtualbox.org/) or [VMware](https://www.vmware.com/solutions/virtualization.html) you need to disable `Hyper-V` [manually](https://docs.microsoft.com/en-us/virtualization/hyper-v-on-windows/quick-start/enable-hyper-v) if/when you want to use those again

## Usage

### Start the containers

To start all necessary containers you need to run following command.

```bash
docker-compose up -d
```

This command will download and build all containers at first runtime - and it
will take some time.

### Performing tests

After previous command is run without errors, you can run `phpunit` inside
container with following command.

```bash
docker-compose exec phpunit ./bin/phpunit
```

You will get test output to your shell where you'll see all possible errors
and other information about those tests.

Note that at first time you run this command it will install necessary packages
for PhpUnit.

You can run this command at any time you want to run tests again

### Next steps

Fix and implement all tests.

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
