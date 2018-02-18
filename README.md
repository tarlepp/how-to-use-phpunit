# What is this ?

[![MIT licensed](https://img.shields.io/badge/license-MIT-blue.svg)](./LICENSE)

Example project to demonstrate how to use [PHPUnit](https://phpunit.de/) 
and [Selenium](http://www.seleniumhq.org/) with certain test cases that you
need to implement.

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
  * [Development](#development)
     * [Basics](#basics)
     * [Demo 'application'](#demo-application)
     * [Tests](#tests)
     * [Reports](#reports)
  * [Useful commands](#useful-commands)
  * [Authors](#authors)
  * [License](#license)

## Requirements

* Docker
  * [Mac](https://docs.docker.com/docker-for-mac/install/)
  * [Windows](https://docs.docker.com/docker-for-windows/install/)
  * [Ubuntu](https://docs.docker.com/engine/installation/linux/docker-ce/ubuntu/)
* IDE / Text editor
  * [PhpStorm](https://www.jetbrains.com/phpstorm/)
  * [NetBeans](https://netbeans.org/)
  * [Sublime Text](https://www.sublimetext.com/)
  * [Visual Studio Code](https://code.visualstudio.com/)
  
## Installation

### Clone repository

Get a clone from GitHub or alternatively just download codes as a zip archive
and extract those to your computer.

```bash
git clone https://github.com/tarlepp/how-to-use-phpunit.git
```

### Install packages

After you've got the codes you need to install required dependencies via
docker with following command:

```bash
docker run -v $(pwd):/app composer install
```

Note that this command must be run on the same directory where you cloned or 
unzipped project source files.

Also note that installation is made via [composer](https://hub.docker.com/_/composer/)
container - so no need for extra installations to get that working.

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

Implement all tests. See next chapter for instructions.

## Development

### Basics

When your containers are running all code changes are synced automatically to
containers - so you don't need to worried about that at all.

### Demo 'application'

Application source code lives under `./src` directory. Note that application
is not a real application - just simple classes that you need to test.

Application itself is built with [Symfony](https://symfony.com/) framework. 

### Tests

You can find all the tests under `./tests` directory. Tests are divided to 
three (3) categories:

* Functional
* Integration
* Unit

By default there is base structure for each test that you need to implement by
yourself.

### Reports

After you have run the tests you can see actual code coverage report under
`./build/report/` directory - just open that `index.html` file with your 
favorite browser to see if you missed something in your tests.

### Seeing what browser is doing

Within Selenium tests it's quite usefully to actually _see_ what browser is
actually doing - no worries this is also covered.

For this you need a [VNC Viewer](https://www.realvnc.com/en/connect/download/viewer/)
so download and install it first.

Next step is to change default password for VNC connection with following 
command:

```bash
docker-compose exec chrome x11vnc -storepasswd <your_password_here> /home/seluser/.vnc/passwd
```

After that open VNC Viewer and connect to `0.0.0.0:5900`

## Useful commands

There's few useful commands you can use to manage with containers.

```bash
# get shell access to running container
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
