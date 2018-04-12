# mystorytelling-sserver
Instant App Socket Server

## How to run the example ?

1. Install the zmq PHP extension

We need the extension in order to communicate with zeromq.

```bash
# Ubuntu/Debian package
sudo apt-get install php-zmq


# Or pecl extension
sudo pecl install zmq-beta
``` 

2. Install php packages

```bash
composer install
``` 

3. Start the php server

```bash
php -S localhost:9000 -t example
``` 

4. Open another terminal and start the WebSocket Server


```bash
php example/server.php
``` 

- Open http://localhost:9000/gallery.html and inspect the console
- Open http://localhost:9000/form.php and submit the form (don't change the eventId)
- Check the console of http://localhost:9000/gallery.html

