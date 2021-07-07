## CAS-Web

### CAS-Web SETUP WITH DOCKER

STEPS
1) Enable WSL2 ON windows and install linux distro (ubuntu) using this: https://docs.microsoft.com/en-us/windows/wsl/install-win10#step-3---enable-virtual-machine-feature

2) Install Docker Desktop: https://www.docker.com/products/docker-desktop
and enable ubuntu and wsl2 from settings.

3) Open ubuntu terminal by searching ubuntu in windows search

4) Navigate to home and create a directory
`cd ~`

`mkdir development`

5) Take a git clone of the project here.
`git clone https://github.com/maheshjshukla/CAS-Web`

`cd CAS-Web`

6) Run following docker command
`docker-compose build`

7) Start Project
`docker-compose up -d`

8) Install vendor files
`docker-compose exec -u0:0 web composer install`

9) Copy .env.example and save as .env

10) Run Migration
`docker-compose exec web php artisan migrate:fresh --seed

### To Start Project

- Run following command to start project (It will take some time first run)
`docker-compose up -d`

- You will be able to access website at
http://localhost/admin
username: check from DB
password: password

- You can access phpmyadmin at
http://localhost:8081
username: root
password: password

### To Stop Project
`docker-compose down`

### To Run single command once inside docker container
`docker-compose exec web your command`

### To get in the docker shell
`docker-compose exec web bash`
- Now you can run artisan and composer commands directly
`php artisan migrate`

### Other notes
- You can start, stop and use shell using the docker desktop application as well.

please ignore this line. Since this a test line
