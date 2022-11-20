# docker-compose-stack
Running Apache, MySQL, Sematext on Docker Compose in Ubuntu 

We configure our own docker-compose.yml based on jersonmartinez's docker-lamp. (https://github.com/jersonmartinez/docker-lamp).

Demostration Video Link:
https://youtu.be/LrPHfLAmc-U

We recommend you to install docker and MySQL extensions in VS Code for better management and visualization.

To pull this LAMP stack to your linux machine and run the the docker , please enter:

git clone https://github.com/lukkawai/docker-compose-stack.git 

Then change the directory of the terminal to the root folder of the docker-compose-stack by "cd" command.

Then, run the containers by typing(If no images exist, it will automatically pull the required images):
"sudo docker compose up -d" 

To import the database by SQL, you can simply connect the MySQL databse by the MySQL extension.
Then placing all the SQL in TSS.sql into a newly created SQL file. Next, execute.

To make the website sucessfully connecting to the database, you need to edit some php files under docker-compose-stack/www/3335 on host machine:

1. type "ip addr |grep inet " in your host machine terminal 
2. copy your own docker IP address(global docker0, usally started with 172.xx.x.x)
3.Buying.php: on line 13, change the ip address to your own docker IP address 
4.Registration.php: on line 13, change the ip address to your own docker IP address
5. Ticket.php: on line 16, change the ip address to your own docker IP address







