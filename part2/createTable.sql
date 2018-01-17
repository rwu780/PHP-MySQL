CREATE TABLE IF NOT EXISTS lectureInfo(
lectureID INT NOT NULL AUTO_INCREMENT ,
courseName VARCHAR( 20 ) ,
source VARCHAR( 100 ) ,
PRIMARY KEY ( lectureID ) ,
FOREIGN KEY ( courseName ) REFERENCES courseInfo( name )
);

CREATE TABLE IF NOT EXISTS courseInfo(
name VARCHAR( 20 ) ,
description VARCHAR( 100 ) ,
detailDescription VARCHAR(255),
PRIMARY KEY (name, description)
);

CREATE TABLE IF NOT EXISTS quizInfo(
quizID INT NOT NULL AUTO_INCREMENT ,
courseName VARCHAR( 20 ) ,
source VARCHAR( 100 ) ,
detailDescription VARCHAR(255),
PRIMARY KEY ( quizID ) ,
FOREIGN KEY ( courseName ) REFERENCES courseInfo( name )
);

INSERT INTO courseInfo (name, description, detailDescription) VALUES('COMP466', 'Web Technology', "Computer Science 466: Advanced Technologies for Web-Based Systems extends the student's knowledge and skills in computing, network programming, web design, and system development");
