[![Build Status](https://travis-ci.org/KarlJakober/PLS.svg?branch=master)](https://travis-ci.org/KarlJakober/PLS)
[![Coverage Status](https://img.shields.io/coveralls/KarlJakober/PLS.svg)](https://coveralls.io/r/KarlJakober/PLS)

PLS
===
### Pong Lan Software

### Installation

1. Sign up for github.com if you dont have an account

2. go to koding.com and sign up (not sign up with github!)

3. Click terminal (4th icon from left  ">_" )

4. run:
```
ssh-keygen -t rsa -C "your_email@example.com"
```
5. When it asks you for a filename just press enter, then enter a password (or dont, just hit enter)

6. run:
```
vim ~/.ssh/id_rsa.pub
```

7. copy the contents of the file (select text and ctrl c) into a new 'ssh key' on  https://github.com/settings/ssh (this is to authorize your koding development environment with your github account)

8. go back to koding (if vim is still open press esc, then type `:q` and press enter to close the file)

9. run:
```
sudo apt-get install fabric -y
cd ~
git clone git@github.com:KarlJakober/PLS.git
cd PLS
fab dev bootstrap
```

  (it will prompt you for MYSQL Root Password, just press enter!)
  if it hangs, close the terminal, start a new one and run

  ```
  cd PLS
  fab dev deploy
  ```
10. You are all set! go to yourusername.kd.io


### Its giving me a mysql error!

If you come back to koding after a length of time, your mysql may automatically turn off

To fix this simply run:
```
sudo service mysql start
```

### No images or Styles are loading,

You need to enable mod_rewrite

```
a2enmod rewrite

sudo service apache2 restart
```


Additional Resources
===

- Steam login requires an API key which needs to be entered into your database options table (keyname = 'steam_api') with value equal to api key given here http://steamcommunity.com/dev/apikey

- Bootstrap theme: United - http://bootswatch.com/united/

- Cakephp Documentation: http://book.cakephp.org/2.0/en/index.html

- jQuery Documentation: http://api.jquery.com/

- Learn Git: http://try.github.io

- Need to tinker with the database? `sudo apt-get install phpmyadmin` select apache2 with tab, then space to check, then tab to OK and press space. phpmyadmin will be installed at yourusername.kd.io/phpmyadmin, username root, no password by default
