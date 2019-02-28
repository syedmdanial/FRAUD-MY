"FRAUD.MY: A Crowdsourcing Web Based Application to detect scammers with Algolia and Google Extension Plugin"

There are a lot of people facing scams and frauds each day throughout the year, everywhere around the world. While scam or a fraud can be a civil wrong or even a criminal wrong, a lot of the con artist are still at large. This is because scammers have honed their craft over years and years of trial and error. Currently, there are not enough or well-equipped platform as a place of reference where online shopper can go to when doing online shopping. Therefore, the proposed project have been developed which is FRAUD.MY: A crowdsourcing web application to detect scammer with Algolia and Google Extension Plugin. FRAUD.MY helps in providing online shoppers a place of reference when doing online shopping. With its search capabilities powered by Algolia Search Engine API, users can swiftly search any details regarding a scammer. FRAUD.MY is also equipped with a Google Extension Plugin where users can search without the hassle of going through FRAUD.MY itself.

How to Install and use FRAUD.MY for localhost:-
!! [Must have internet connection due to algolia and the cdn library]

1. Run xampp then go to phpmyadmin and create a database name 'fraud'
2. Just let the xampp run
3. Go to cmd (I assume that composer have been installed. If not, go to here) -> https://getcomposer.org/download/
4. Use the cmd to go into where the 'fraud' folder is
5. When in the 'fraud' directory, lets say -> C:/user/desktop/fraud> 
6. Then run command ->php artisan migrate<- 
7. After that run command ->php artisan storage:link<-
8.Then run command ->php artisan scout:flush "App\Scammer"-
9.Then run command ->php artisan scout:flush "App\Report"<-
10.Next run command ->php artisan scout:import "App\Scammer"<-
11.And then run command ->php artisan scout:import "App\Report"<-
12.Finally run command ->php artisan serve<- (can also run  server with custom ip & port)
13.Make sure when it runs, the IP is <127.0.0.1:8000> (localhost) -DEFAULT-
14.For the first time installation, go to this <127.0.0.1:8000/dump -> it will create a default admin user
15.So if running on localhost or anything need to check and change the IP acccordingly for the graph and google extension plugin to work at (fraud/public/assets/js/admin-charts-all.js) & (plugin/popup.js)

Default admin user:-
	email : fraud.my@gmail.com
	password : 123456

Usage:-
1. Menu manager user (CRUD) only for admin, not normal user
2. Rules for user registeration:-
	
	username 	: must be unique (diff user,  diff username) ,must be more than 3 letters
	email		: must be unique (diff user,  diff username)
	password 	: must be 6 and above
	profile picture	: a default picture will be used upon registeration or if no picture was uploaded. during update, if no new picture is uploaded, it will use the old one

3. Both user can report a scammer but only the admin can approve/decline, delete and all
4. Rules for scammer and report :-

	username 	: must be unique also, if already exist, cannot proceed. need to add report to existing scammer. (to avoid redundent data)
	nama 		: must be unique also
	evidence	: default picture will be used if not evidence is uploaded

5. The admin needs to approve/decline the submitted scammer & report. A pending one the status will be -0-. Decline ones will be automatically deleted from the db. Approved ones only will be shown on the graph & can be searched.
 

How to set up router to enable remote server
!! [Must have use streamyx/unifi and have access to the router (admin)]

1) Open browser, connect to the router through wifi/cable. Go to the default ip, example: 192.168.0.1 (D-Link)
2) Key in the router's password; should have a sticker below the router with the details of the default settings, example: admin@zzzz
3) After you're in the router's interface,depending on the brand, but if you're using a D-Link router, go to the features tab ->port forwarding -> virtual server.
4) Add a new rule, it should look like this:-
	Name: HTTP
	Local IP: your local private ip; example: 192.160.0.168 (According to you own ip)
	Protocol: TCP
	External Port: 80 (can use other ports also)
	Internal Port: 80 (can use other ports also)
	Schedule: Always Enable
5) Apply then save. Now you can access your web server from the outside through your public IP. The public IP should be available at the router's interface or you could check here -> http://whatismyip.host/
6) To enable a DNS for it, can set up a free one here -> https://www.noip.com/
7) Register, verify your email. 
8) Then go to dynamic DNS -> create hostname. Type in your desired hostname, example: 'myhost' then choose your desired domain, example: 'ddns.net', then put your public up in the ipv4 address field the finally the record type is DNS host(A).
9) After everything is done, you should be able to access your web server through the dns example: 'http://myhost.ddnet.net:8000' . This is for anyone that is using port 80.
10) If youre using other ports like 8000 then it should be 'http://myhost.ddnet.net:8000'.