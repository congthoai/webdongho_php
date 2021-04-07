
create TABLE type_account(  
	id int not null PRIMARY KEY AUTO_INCREMENT,
	name varchar(50) not null
);

INSERT into type_account VALUES (null, 'user');
INSERT into type_account VALUES (null, 'admin');

create TABLE account (  
    id int not null PRIMARY KEY AUTO_INCREMENT,
	type_id int not null,
    name varchar(50) not null,
	username varchar(50) not null,
	password varchar(200) not null , 
    phone varchar(15),
    email varchar(50) not null, 
	
	FOREIGN KEY(type_id) REFERENCES type_account(id)   
);

INSERT into account VALUES (null, 1, 'Quản trị viên', 'admin', 'admin', '0983583845', 'thoaidaica@gmail.com');
INSERT into account VALUES (null, 1, 'Quản trị viên 2', 'admin2', 'admin', '0983583845', 'thoaidaica@gmail.com');
INSERT into account VALUES (null, 2, 'Người dùng abc', 'user', 'user', '0983583845', 'thoaidaica@gmail.com');
INSERT into account VALUES (null, 2, 'Người dùng 1', 'user1', 'user', '0983583845', 'thoaidaica@gmail.com');
INSERT into account VALUES (null, 2, 'Người dùng 2', 'user2', 'user', '0983583845', 'thoaidaica@gmail.com');
INSERT into account VALUES (null, 2, 'Người dùng 3', 'user3', 'user', '0983583845', 'thoaidaica@gmail.com');
INSERT into account VALUES (null, 2, 'Người dùng 4', 'user4', 'user', '0983583845', 'thoaidaica@gmail.com');
INSERT into account VALUES (null, 2, 'Người dùng 5', 'user5', 'user', '0983583845', 'thoaidaica@gmail.com');
INSERT into account VALUES (null, 2, 'Người dùng 6', 'user6', 'user', '0983583845', 'thoaidaica@gmail.com');
INSERT into account VALUES (null, 2, 'Người dùng 7', 'user7', 'user', '0983583845', 'thoaidaica@gmail.com');
INSERT into account VALUES (null, 2, 'Người dùng 8', 'user8', 'user', '0983583845', 'thoaidaica@gmail.com');
INSERT into account VALUES (null, 2, 'Người dùng 9', 'user9', 'user', '0983583845', 'thoaidaica@gmail.com');
INSERT into account VALUES (null, 2, 'Người dùng 10', 'user10', 'user', '0983583845', 'thoaidaica@gmail.com');
INSERT into account VALUES (null, 2, 'Người dùng 11', 'user11', 'user', '0983583845', 'thoaidaica@gmail.com');
INSERT into account VALUES (null, 2, 'Người dùng 12', 'user12', 'user', '0983583845', 'thoaidaica@gmail.com');


create table typeofwatch(
	id int not null PRIMARY KEY AUTO_INCREMENT,
    name varchar(50) not null,
    descrip varchar(300)

);

INSERT into typeofwatch VALUES (null, 'Đồng hồ cơ', 'Đồng hồ lên dây cót');
INSERT into typeofwatch VALUES (null, 'Đồng hồ pin', 'Đồng hồ chạy bằng pin');
INSERT into typeofwatch VALUES (null, 'Đồng hồ năng lượng', 'Đồng hồ sạc năng lượng mặt trời');

create table brand(
	id int not null PRIMARY KEY AUTO_INCREMENT,
    name varchar(50) not null,
	place varchar(50),
    descrip varchar(300)

);

INSERT into brand VALUES (null, 'Seiko', 'Japan', 'SX tại nhật');
INSERT into brand VALUES (null, 'DanielWellington', 'Thụy điển', 'Đồng hồ nổi tiếng tại thụy điển');
INSERT into brand VALUES (null, 'Casio', 'Japan', 'SX tại nhật');
INSERT into brand VALUES (null, 'Q&Q', 'Japan', 'SX tại nhật');

create table watch(
	id int not null PRIMARY Key AUTO_INCREMENT,
    type_id int not null,
    brand_id int not null,
    name varchar(150) not null,
	gender varchar(5) not null,
    price int not null,
    discount int DEFAULT 0,
    image_link varchar(300),
    view int DEFAULT 0,
    warranty int DEFAULT 12,
    buyed int DEFAULT 0,
    quantity int DEFAULT 0,
    size int,
    material varchar(300),
    waterproof int,
    
    FOREIGN KEY(type_id) REFERENCES typeofwatch(id),
    FOREIGN KEY(brand_id) REFERENCES brand(id)
    
);


INSERT into watch VALUES (null, 1, 1, 'Đồng hồ 001','Nam', 900000, 50000, '../image/watch/dhnam.jpg', 0, 12, 0, 100, 41,'kim loại da bò', 100 );
INSERT into watch VALUES (null, 1, 2, 'Đồng hồ 002', 'Nam',800000, 0, '../image/watch/dh5.jpg', 0, 12, 0, 100, 41,'kim loại da trâu', 100 );
INSERT into watch VALUES (null, 2, 3, 'Đồng hồ 003', 'Nữ',750000, 50000, '../image/watch/dhnu.jpg', 0, 12, 0, 100, 41,'kim loại da', 100 );
INSERT into watch VALUES (null, 2, 4, 'Đồng hồ 004', 'Nữ',1000000, 0, '../image/watch/dh9.jpg', 0, 12, 0, 100, 41,'kim loại da heo', 100 );
INSERT into watch VALUES (null, 1, 1, 'Đồng hồ 005','Nam', 900000, 50000, '../image/watch/dh1.jpg', 0, 12, 0, 100, 41,'kim loại da bò', 100 );
INSERT into watch VALUES (null, 1, 2, 'Đồng hồ 006', 'Nam',800000, 50000, '../image/watch/dh2.jpg', 0, 12, 0, 100, 41,'kim loại da trâu', 100 );
INSERT into watch VALUES (null, 2, 3, 'Đồng hồ 007', 'Nữ',750000, 50000, '../image/watch/dh6.jpg', 0, 12, 0, 100, 41,'kim loại da', 100 );
INSERT into watch VALUES (null, 2, 4, 'Đồng hồ 008', 'Nữ',1000000, 50000, '../image/watch/dh7.jpg', 0, 12, 0, 100, 41,'kim loại da heo', 100 );
INSERT into watch VALUES (null, 1, 1, 'Đồng hồ 009','Nam', 900000, 50000, '../image/watch/dh3.jpg', 0, 12, 0, 100, 41,'kim loại da bò', 100 );
INSERT into watch VALUES (null, 1, 2, 'Đồng hồ 010', 'Nam',800000, 50000, '../image/watch/dh4.jpg', 0, 12, 0, 100, 41,'kim loại da trâu', 100 );
INSERT into watch VALUES (null, 2, 3, 'Đồng hồ 011', 'Nữ',750000, 50000, '../image/watch/dh8.jpg', 0, 12, 0, 100, 41,'kim loại da', 100 );
INSERT into watch VALUES (null, 2, 4, 'Đồng hồ 012', 'Nữ',1000000, 50000, '../image/watch/dh9.jpg', 0, 12, 0, 100, 41,'kim loại da heo', 100 );
INSERT into watch VALUES (null, 1, 1, 'Đồng hồ 013','Nam', 900000, 50000, '../image/watch/dh5.jpg', 0, 12, 0, 100, 41,'kim loại da bò', 100 );
INSERT into watch VALUES (null, 2, 4, 'Đồng hồ 014', 'Nữ',1000000, 50000, '../image/watch/dh10.jpg', 0, 12, 0, 100, 41,'kim loại da heo', 100 );

create TABLE `order` (
	id int not null PRIMARY KEY AUTO_INCREMENT,
    account_id int not null,
    total_amount int,
    message varchar(500) DEFAULT '',
    created date,
    status int DEFAULT 0,
	phone varchar(15),
	email varchar(50),
	address varchar(200),
    
    FOREIGN KEY (account_id) REFERENCES account(id)
);

create TABLE order_detail (
	id int not null PRIMARY KEY AUTO_INCREMENT,
    order_id int not null,
	watch_id int not null, 
    qty int not null,
    amount int,
    
    FOREIGN KEY (order_id) REFERENCES `order`(id),
	FOREIGN KEY (watch_id) REFERENCES watch(id)
);

create table `comment`(
	id int not null PRIMARY Key AUTO_INCREMENT,
    account_id int not null,
    watch_id int not null,
    content text,
    created date,
       
    FOREIGN KEY(account_id) REFERENCES account(id),
    FOREIGN KEY(watch_id) REFERENCES watch(id)
    
);

Insert into `comment` values (null, 2, 1 , 'cho em hỏi đồng hồ này sử dụng có bền không ạ?', curdate());
Insert into `comment` values (null, 2, 1 , 'cho em hỏi đồng hồ này đeo đi bơi có sao không ạ?', curdate());

create TABLE slide (
	id int not null PRIMARY KEY AUTO_INCREMENT,
    image_name varchar(100) not null,
    image_link varchar(100) not null,
    link varchar(100),
    sort int
);


Insert into Slide values (null, 'slide 1', '../image/slide/slide1.png', 'https://tiki.vn/', 1);
Insert into Slide values (null, 'slide 2', '../image/slide/slide2.png', null, 2);
Insert into Slide values (null, 'slide 3', '../image/slide/slide3.png', null, 3);


create TABLE news (
	id int not null PRIMARY KEY AUTO_INCREMENT,
    title varchar(300) not null,
    image_link varchar(100) not null,
    content text,
    link varchar(100),
    sort int
);






DELIMITER $$
CREATE PROCEDURE sp_Loc_SP(_id varchar(10), _name varchar(50), _brand varchar(50), _page int, _limit int)
BEGIN
   if(_id != "" ) then
   	select * from watch where id=_id;
   end if;
   
    if(_name = "" and _brand = "" and _id="" ) then
   	   select * from watch LIMIT _page, _limit;
   end if;
   
   if(_name != "" and _brand = "" ) then
   	select * from watch where name like concat('%',REPLACE(_name,' ','%'), '%') LIMIT _page, _limit;
   end if;
   
   if(_name = "" and _brand != "" ) then
   	select * from watch where brand_id=_brand LIMIT _page, _limit;
   end if;
   
   if(_name != "" and _brand != "" ) then
   	select * from watch where name like concat('%',REPLACE(_name,' ','%'), '%')and brand_id=_brand LIMIT _page, _limit;
   end if;
        
END; $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE sp_get_TongSP(_id varchar(10), _name varchar(50), _brand varchar(50))
BEGIN
   if(_id != "" ) then
   	select count(id) from watch where id=_id;
   end if;
   
   if(_name != "" and _brand = "" ) then
   	select count(id) from watch where name like concat('%',REPLACE(_name,' ','%'), '%');
   end if;
   
   if(_name = "" and _brand != "" ) then
   	select COUNT(id) from watch where brand_id=_brand;
   end if;
   
   if(_name != "" and _brand != "" ) then
   	select COUNT(id) from watch where name like concat('%',REPLACE(_name,' ','%'), '%')and brand_id=_brand;
   end if;
        
END; $$
DELIMITER ;



DELIMITER $$
CREATE TRIGGER update_total_amount
    BEFORE INSERT ON order_detail
    FOR EACH ROW 
BEGIN
	UPDATE `order` SET total_amount = total_amount + NEW.amount
    WHERE id = NEW.order_id;
END$$
DELIMITER ;


