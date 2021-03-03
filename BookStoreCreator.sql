create table BookInventory(
BookInventory_Id int primary key auto_increment,
Book_Name varchar(50) not null,
author varchar(50),
quantity int default 0
);

create table BookInventoryOrder
(
BookInventoryOrder_Id int primary key auto_increment,
Firstname varchar(20) not null,
Lastname varchar(20) not null,
quantity int,
payment_option varchar(15),
BookInventory_Id int,
CONSTRAINT FK_BookOrder FOREIGN KEY (BookInventory_Id)
    REFERENCES BookInventory(BookInventory_Id)
    );