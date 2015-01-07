#Cockpit CMS test
[Cockpit](http://getcockpit.com/)

##Requirements
* npm, grunt
* [Vagrant](https://www.vagrantup.com) en [VirtualBox](https://www.virtualbox.org/wiki/Downloads).
* [bower](http://bower.io/)
* Composer

##Build
To build
* Get puphpet.zip from [puphpet](https://puphpet.com/) from `/puphpet/config.yaml`
* Add entry `192.168.56.101 cockpit.dev www.cockpit.dev` to `C:\Windows\System32\drivers\etc\hosts`
* `vagrant up` the machine
* SSH to vm
* Build with following commands
```
composer create-project aheinze/cockpit cockpit --stability="dev"
npm install
bower install
grunt build
```
