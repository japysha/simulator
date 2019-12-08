# Reporter

This project simulate change directory (cd) function for an abstract file system..

### Prerequisites

PHP 7.3. need to be installed and run.

If you need help to update your PHP version take a look <a target="_blank" href="https://php-osx.liip.ch/">here</a>.


### Install & Run

The fastest way to install Simulator is to git clone and run composer install (<a target="_blank" href="https://getcomposer.org/">https://getcomposer.org/</a>).

<ol>
<li>Install Composer:

```
$ curl -sS https://getcomposer.org/installer | php
```
</li>
<li>Clone project from git:

```
$ git clone https://github.com/japysha/simulator.git
```
</li>
<li>Run composer install:

```
$ php composer.phar install
```
</li>
<li>Execute Reporter:<br>
Open terminal, go to root project folder and run command (symfony console command)

```
$ ./simulator simulator:cd
```

in case you get error: <br>zsh:permission denied <br>give permission to simulator with command:

```
$ chmod +x ./simulator
```
</li>
</ol>


## Authors

* **japysha** 