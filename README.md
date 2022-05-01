
## Project Set-up guidelines

I'm using laravel 8.75 version in this project..
Please Run the folllowing command after cloning the project -

- composer install.
- create a .env file and add your database name in DB_DATABASE field in env file.
- php artisan key:generate
- php artisan migrate.
- php artisan db:seed.
- php artisan serve.

### SQL Data

- when "php artisan db:seed" command will run all static data will insert on table.

### Credentails

    - HR-Credentials 
        email : hr@gmail.com
        password : 123456789

    - employees credentials
        email : user1@gmail.com
        password : 123456789

        email : user2@gmail.com
        password : 123456789

## Project go-thrugh

-- HR Endpoint	

 when your project is started you will redirect to the login page. enter the HR credentials you will redirect to the HR dashboard.
 if HR click on employees in the sidebar then, HR can see the listing of their employees.
 if HR click on Leave a drop-down will open and after clicking on All leaves HR can see all the listing of Leave applied by employees.
 HR can see which employee apply for leave and by clicking on the view they can see all the information about leave.
 if, the leave status is pending and HR wants to apply/deny the leave so, when HR clicks on the view button after that, there is a button take action on the bottom after clicking on take action button a pop-up will open and if hr granted the leave then, leave will be approved and if hr rejected the leave an accordion will open and hr will write the reason of rejection of leave and leave will be rejected.

-- Employee Endpoint
 
 when your project is started you will redirect to the login page. enter the Employee credentials you will redirect to the Employee dashboard.
 if an employee click on Leave a drop-down will open will two options leave history and apply for leave.

 in Apply leave a form will open. employee select their leave-type(casual, sick, paid, leave without pay) leave, leave start-date, select half means in which half they want to take leave first-half or in end-half, select leave end date, select end -date half, and in last employee give reason of their leave.

 thier is some conditions
 - if employee select casual leave or paid leave so, they cannot take more than 2 leave together.
 - if employee select sick leave so, they cannot take more than 6 leave together.
 - if employee select same start-date and end-date and same start-date half and end-date half so, its means thier leave will count as 0.5 days.
 - if employee select same start-date and end-date but diffrent start-date half and end-date half so, its means thier leave will count as 1 days.



## Approach

The employee Leave Module system is interesting, and I’m working on it for the first time.
In this project, I followed the structure of "Kredily". Kredily is a Payroll and HR software.i used Kredily to apply for leave in the previous company. so, I follow the Kredily leave structure in this project.


## Time-Taken On Project

 I started working on this project on Friday night after 8 PM and complete this project on Sunday with testing.

