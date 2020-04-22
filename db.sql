/*
db.sql
Hannah, Jeb, Tony
CS360 Proj1
Feb-17-2020

MySQL code to create worker, sport, equipment, issue_info, locker, athlete tables in EQ Room DB
*/

CREATE TABLE admin (
	aid VARCHAR(8),			--admin ID, college given username
	fname VARCHAR(16),
	lname VARCHAR(16),
	PRIMARY KEY (aid)
);

CREATE TABLE worker (
	wid VARCHAR(8),		-- college given username
	fname VARCHAR(16),
	lname VARCHAR(16),
	PRIMARY KEY (wid)	
);

CREATE TABLE athlete (
	id VARCHAR(8),		-- college given username
	fname VARCHAR(16),
	lname VARCHAR(16),
	class CHAR(4),
	scode VARCHAR(5),	-- foreign key to sport 
	jnum INT,
	PRIMARY KEY (id)
);

CREATE TABLE sport (
	scode VARCHAR(5),
	sname VARCHAR(16),
	PRIMARY KEY (scode)
);

CREATE TABLE equipment (
	inum INT,
	etype VARCHAR(16),
	eq_size VARCHAR(4),
	color VARCHAR(8),
	brand VARCHAR(16),
	model VARCHAR(16),
	-- lockID INT,
	-- plockID INT,
	PRIMARY KEY (inum)
);

CREATE TABLE iinfo (
	inum INT,
	iby VARCHAR(8),			-- issued by: worker id
	ito VARCHAR(8),			-- issued to: athlete id
	season VARCHAR(8),
	PRIMARY KEY (inum)
);

CREATE TABLE locker (
	room INT,				-- code for room: 1, 2, 3 (1st floor, 2nd floor, stadium)
	lockID INT,
	PRIMARY KEY (room, lockID)
);

CREATE TABLE padlock (
	combo VARCHAR(16),
	plockID INT,
	PRIMARY KEY (combo, plockID)
);

CREATE TABLE eq_assign (
	id VARCHAR(8),			-- athlete id
	inum INT,				-- inventory number
	PRIMARY KEY (id)
);

CREATE TABLE lock_assign (
	inum INT,
	lockID INT,
	plockID INT,
	PRIMARY KEY(inum)
);

CREATE TABLE team (
	id VARCHAR(8),		-- athlete id
	scode VARCHAR(5),
	season VARCHAR(8),
	PRIMARY KEY (id)
);

CREATE TABLE missing (
	inum INT,			-- inventory number of missing equipment	
	PRIMARY KEY (inum)
)

