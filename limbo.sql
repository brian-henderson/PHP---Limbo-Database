/*  Authors: <Brian Henderson, Kevin Kleinschmidt>
    Purpose: Create limbo database for lost and found 
    Version: v0.1 -- Assignment 2
    Deadline: 09-30-2016
*/

drop database if exists limbo_db ;
create database limbo_db ;
use limbo_db ;

CREATE TABLE IF NOT EXISTS users (
    user_id INT UNSIGNED NOT NULL AUTO_INCREMENT ,
    first_name VARCHAR(20) NOT NULL ,
    last_name VARCHAR(40) NOT NULL ,
    email VARCHAR(60) NOT NULL ,
    pass CHAR(40) NOT NULL ,
    reg_date DATETIME NOT NULL ,
    PRIMARY KEY (user_id) ,
    UNIQUE ( email )
) ;

INSERT INTO users ( first_name, last_name, email, pass, reg_date )
     VALUES ( "Admin" , " " , "Admin" , "gaze11e" , '2016-09-27 00:00:00' ) ;

CREATE TABLE IF NOT EXISTS stuff (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	item_name TEXT NOT NULL ,
    location_id VARCHAR(70) NOT NULL ,
    description TEXT NOT NULL ,
    create_date DATETIME NOT NULL ,
    update_date DATETIME NOT NULL ,
    owner TEXT ,
    finder TEXT ,
    status SET( 'found' , 'lost' , 'claimed' ) ,
    FOREIGN KEY (location_id) REFERENCES locations (id)
) ;

CREATE TABLE IF NOT EXISTS locations (
    id VARCHAR(70) PRIMARY KEY ,
    create_date DATETIME NOT NULL ,
    update_date DATETIME NOT NULL
) ;

INSERT INTO stuff (item_name, location_id, description, create_date, update_date, owner, finder, status)
	VALUES ( "iPhone", "Cannavino Library", "iPhone 6 with black Otter Box", '2016-11-1 18:30:00', NOW(), "Kevin James", '', "lost" ),
		   ( "Wallet", "McCann Center", "Black leather wallet with $20", '2015-01-1 00:30:33', NOW(), "John Smith", '', "lost"),
		   ( "Student ID", "Fontaine Hall", "Marist Student ID in a plastic cover", '2016-09-23 13:11:58', NOW(), "", "Amanda Johnson", "found"),
		   ( "Flash Drive", "Leo Hall", "Blue SanDisk flashdrive", '2016-03-05 8:37:00', NOW(), "Andrew Zimmerman", '', "lost"),
		   ( "Notebook", "North Campus Housing Complex", "Purple notebook with calculus notes", '2015-12-12 16:44:09', NOW(), '', "Jamie Matthews", "found"),
		   ( "Headphones", "Steel Plant Studios and Gallery", "Blue Apple headphones, tangled", "2016-10-31 23:56:48", NOW(), '', "Dan Williams", "found") ;

INSERT INTO locations (id, create_date, update_date)
    VALUES ( "Byrne House" , NOW() , NOW() ) ,
           ( "Cannavino Library" , NOW() , NOW() ) ,
           ( "Champagnat Hall" , NOW() , NOW() ) ,
           ( "Chapel" , NOW() , NOW() ) ,
           ( "Cornell Boathouse" , NOW() , NOW() ) ,
           ( "Donnelly Hall" , NOW() , NOW() ) ,
           ( "Dyson Center" , NOW() , NOW() ) ,
           ( "Fern Tor" , NOW() , NOW() ) ,
           ( "Fontaine Hall" , NOW() , NOW() ) ,
           ( "Foy Townhouses" , NOW() , NOW() ) ,
           ( "Fulton Street Townhouses(Lower)" , NOW() , NOW() ) ,
           ( "Fulton Street Townhouses (Upper)" , NOW() , NOW() ) ,
           ( "Greystone Hall" , NOW() , NOW() ) ,
           ( "Hancock Center" , NOW() , NOW() ) ,
           ( "Kieran Gatehouse" , NOW() , NOW() ) ,
           ( "Kirk House" , NOW() , NOW() ) ,
           ( "Leo Hall" , NOW() , NOW() ) ,
           ( "Longview Park" , NOW() , NOW() ) ,
           ( "Lowell Thomas Communications Center" , NOW() , NOW() ) ,
           ( "Lower Townhouses" , NOW() , NOW() ) ,
           ( "Marian Hall", NOW() , NOW() ) ,
           ( "Marist Boathouse" , NOW() , NOW() ) ,
           ( "McCann Center" , NOW() , NOW() ) ,
           ( "Mid-Rise Hall" , NOW() , NOW() ) ,
           ( "North Campus Housing Complex" , NOW() , NOW() ) ,
           ( "St. Ann's Hermitage" , NOW() , NOW() ) ,
           ( "St. Peter's" , NOW() , NOW() ) ,
           ( "Science and Allied Health Building" , NOW() , NOW() ) ,
           ( "Sheahan Hall" , NOW() , NOW() ) ,
           ( "Steel Plant Studios and Gallery" , NOW() , NOW() ) ,
           ( "Student Center/Music Building" , NOW() , NOW() ) ,
           ( "West Cedar Townhouses (Lower)" , NOW() , NOW() ) ,
           ( "West Cedar Townhouses (Upper)" , NOW() , NOW() ) ;

explain users ;
explain stuff ;
explain locations ;

select * from users ;
select * from locations ;