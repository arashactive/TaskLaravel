# Welcome to My Task
## Let's start by looking at the task description:

*We have attached a list of customers who are supposed to receive refunds from us in batches using Proficash, and their records should be logged.*
*Proficash is a bank payment software that uses an XML file for group payments. We need the import file.
The payer is us:
Name: Fullstack Agency
IBAN: DE11 1111 2222 3333 0000 22
BIC: WMSXXX*

## Getting Started
Project Contents:
1. A sample file named customer.xlsx
2. Project code
*To begin, copy the code onto your system. If it's in compressed format, extract it.*

Next, navigate to the root directory of the project and run the following command in the terminal:
```
composer install
```

After that, execute the following command in the terminal:
```
php artisan serve
```

#### Please modify the information entered in the .env file according to your database credentials.

Finally, enter the following command to create the necessary tables for this project:
```
php artisan migrate
```

*At this point, you will have access to the project using Postman or similar software.*

# Project Routes
#### Upload Excel file from customers:
POST= api/customer/upload

#### List all previously uploaded XML files with pagination:
GET= api/xmls

#### Download an XML file by selecting its ID:
GET= api/xml/{id}/download

#### View information of a specific XML file:
GET= api/xml/{id}

#### View all refund logs for a specific XML file:
GET api/xml/{id}/log

## System Process Explanation
- After uploading an Excel file to the system, all internal information is extracted from it, converted to XML format, and then saved as a file on the server.

- Once the XML file is saved and finalized, all internal information is collected in the form of an array named "bulks." This array is then sent to the database using a query.

* This task is designed based on the repository pattern and services.

* Unit tests cover the services, while feature tests cover the controllers.

## Arash Dehghani
##### best regards
