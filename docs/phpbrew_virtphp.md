# phpbrew & virtphp

## Basic
The idea is to create isolated php environment for each app.
* Create your virtual env. by specifying your PHP build. If you don't have PHP build yet, you can use phpbrew
* Run the virtual env.
* Run your app.

## Requirements
### Install phpbrew
For MacOs user :
```bash
brew install automake autoconf curl pcre re2c mhash libtool icu4c gettext jpeg libxml2 mcrypt gmp libevent
brew link icu4c
```
1. First, install phpbrew on your system, like this (follow any instructions these commands print to the screen):

    ```bash
    curl -L -O https://github.com/phpbrew/phpbrew/raw/master/phpbrew
    chmod +x phpbrew
    sudo mv phpbrew /usr/local/bin/phpbrew #/usr/bin might be protected by MacOS SIP policy, so use /usr/local/bin
    ```
2. Then, you should init a bash script for your shell environment, which will place a `bashrc` file in the `~/.phpbrew` folder.

    ```phpbrew init```
3. Then source this file to your `.bashrc` or `.zshrc` file with this line:

    ```source ~/.phpbrew/bashrc```
    
    Follow the output instruction to add some lines in your `~/.bashrc`, then start new console.
4. Test it with `phpbrew known`

### Install virtphp
1. Download the [virtphp.phar](https://github.com/virtphp/virtphp/releases) file from the latest release 
2. Place it in `/usr/local/bin` or wherever it's accessible from your PATH
3. Add execution permission `sudo chmod +x /usr/local/bin/virtphp.phar`
4. Add alais to make it easier : `alias virtphp="/usr/local/bin/virtphp.phar`
5. Test it with `virtphp` command

## Creating your php build and your virtual env.
1. Install php build with default options and mysql database supports + needed requirements by Laravel 5.4 :
    ```bash
    phpbrew install 7.1.1 +mysql+default+openssl+tokenizer
    ```
    If you get an error like this (on some MacOs distribution) `configure: error: invalid readline installation detected. Try --with-libedit instead.`, add ` -- --with-libedit` :
    ```bash
    phpbrew install 7.1.1 +mysql+default+openssl+tokenizer -- --with-libedit
    ```    
    Note, after the installation, you will have new directory such as : `~/.phpbrew/php/php-7.1.1/bin`. You can list your existing builds `phpbrew list`
2. Create a virtual env. following this example:
    ```yaml
    virtphp create --php-bin-dir="{your home directory path}/.phpbrew/php/php-7.1.1/bin" {your project name env.}
    ```
    Phpbrew may not locate the `~/`, use an absolute path `{your home directory path}`. You can check existing virtual env. by `virtphp show`

## Running app
1. Run your virtual env.
`source /Users/user/.virtphp/envs/{your project name env.}/bin/activate`

2. Make sure you use the right php build `which php`. (in case you need to force, use `phpbrew use php-{your installed version}`)
3. Run/update you app and enjoy. Do not forget to run virtual env. for each time you need to run your app.

## Alternative way to run app
* Just use the absolute path for php and for artisan
`~/.phpbrew/php/php-7.1.1/bin/php /var/www/vfaHC4L/artisan serve --host=0.0.0.0 --port=8060`
* For remote deployment, append the command in crontab with unique time reference (current time, note : sunday =0)
`34 6 3 10 2 nohup ~/.phpbrew/php/php-7.1.1/bin/php /var/www/vfaHC4L/artisan serve --host=0.0.0.0 --port=8060 > /dev/null 2>&1 &`

## Resources
* For more info about **phpbrew** commands & installation, go [here](http://phpbrew.github.io/phpbrew/)
* For more info about **virtphp** commands & installation, go [here](https://github.com/virtphp/virtphp)
* You can follow this tuto too : [installing virtphp and phpbrew](https://www.sitepoint.com/use-phpbrew-virtphp/)
* Installing extension with phpbrew, such as xDebug, visit  [here](https://github.com/phpbrew/phpbrew/wiki/Extension-Installer)
## Helps in case of errors
### Invalid php version when 'phpbrew use php-{version}"
Solution : run firstly ```source $HOME/.phpbrew/bashrc```