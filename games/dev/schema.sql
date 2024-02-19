drop table appuser cascade;

CREATE TABLE appuser(
    userid VARCHAR(50) PRIMARY KEY,
    password VARCHAR(50) NOT NULL,
    gender VARCHAR(10),
    games VARCHAR(255), -- Assuming we'll store games as a comma-separated string
    age VARCHAR(20),
    birthday DATE,
    comments VARCHAR(20)
);

CREATE TABLE wonFrogGame (
	userid VARCHAR(50),
	hasWonnedFrog INT,
	PRIMARY KEY (userid, hasWonnedFrog),
	FOREIGN KEY (userid) REFERENCES appuser(userid)
);

CREATE TABLE wonRockGame (
	userid VARCHAR(50),
	hasWonnedRock INT,
	PRIMARY KEY (userid, hasWonnedRock),
	FOREIGN KEY (userid) REFERENCES appuser(userid)
);

CREATE TABLE wonGuessGame (
	userid VARCHAR(50),
	hasWonnedGuess INT,
	PRIMARY KEY (userid, hasWonnedGuess),
	FOREIGN KEY (userid) REFERENCES appuser(userid)
);

insert into appuser values('auser', md5('apassword'));
insert into wonFrogGame values ('auser', 0);
insert into wonGuessGame values ('auser', 0);
insert into wonRockGame values ('auser', 0);

