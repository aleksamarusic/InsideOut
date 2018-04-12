
CREATE TABLE ACCOUNT
(
	email                CHAR(35) NOT NULL,
	name                 VARCHAR(20) NOT NULL,
	surname              VARCHAR(20) NOT NULL,
	password             VARCHAR(25) NOT NULL,
	CONSTRAINT XPKACCOUNT PRIMARY KEY (email)
);

CREATE TABLE COMPANY
(
	companyName          CHAR(25) NOT NULL,
	numAccounts          INTEGER NOT NULL,
	numAccountsUsed      INTEGER NOT NULL DEFAULT 0,
	registrationLink     VARCHAR(55) NOT NULL,
	CONSTRAINT XPKCOMPANY PRIMARY KEY (companyName)
);

CREATE TABLE MANAGER
(
	email                CHAR(35) NOT NULL,
	companyName          CHAR(25) NOT NULL,
	CONSTRAINT XPKMANAGER PRIMARY KEY (email),
	CONSTRAINT R_4 FOREIGN KEY (email) REFERENCES ACCOUNT (email)
		ON DELETE CASCADE,
	CONSTRAINT R_8 FOREIGN KEY (companyName) REFERENCES COMPANY (companyName)
		ON DELETE CASCADE
);

CREATE TABLE TEAM
(
	teamName             CHAR(20) NOT NULL,
	numWorkers           INTEGER NOT NULL,
	numInProgressTasks   INTEGER NOT NULL,
	companyName          CHAR(25) NOT NULL,
	email                CHAR(35) NULL,
	CONSTRAINT XPKTEAM PRIMARY KEY (teamName,companyName),
	CONSTRAINT R_18 FOREIGN KEY (companyName) REFERENCES COMPANY (companyName)
		ON DELETE CASCADE,
	CONSTRAINT R_21 FOREIGN KEY (email) REFERENCES MANAGER (email)
);

CREATE TABLE TASK
(
	email                CHAR(35) NOT NULL,
	taskId               CHAR(18) NOT NULL,
	teamName             CHAR(20) NULL,
	companyName          CHAR(25) NULL,
	statusPrivacy        CHAR NOT NULL DEFAULT P CHECK ( statusPrivacy IN ('P', 'M') ),
	statusCompletition   CHAR(2) NOT NULL DEFAULT NS CHECK ( statusCompletition IN ('NS', 'IP', 'CP') ),
	statusAcceptance     CHAR(2) NOT NULL DEFAULT A CHECK ( statusAcceptance IN ('D', 'A', 'NA') ),
	taskName             CHAR(30) NOT NULL,
	description          VARCHAR(300) NULL,
	comment              VARCHAR(100) NULL,
	expectedStartDate    DATE NULL,
	expectedEndDate      DATE NULL,
	CONSTRAINT XPKTASK PRIMARY KEY (taskId),
	CONSTRAINT R_19 FOREIGN KEY (email) REFERENCES ACCOUNT (email)
		ON DELETE CASCADE,
	CONSTRAINT R_20 FOREIGN KEY (teamName, companyName) REFERENCES TEAM (teamName, companyName)
);

CREATE TABLE WORKER
(
	email                CHAR(35) NOT NULL,
	companyName          CHAR(25) NOT NULL,
	CONSTRAINT XPKWORKER PRIMARY KEY (email),
	CONSTRAINT R_5 FOREIGN KEY (email) REFERENCES ACCOUNT (email)
		ON DELETE CASCADE,
	CONSTRAINT R_7 FOREIGN KEY (companyName) REFERENCES COMPANY (companyName)
		ON DELETE CASCADE
);

CREATE TABLE IS_WORKING
(
	email                CHAR(35) NOT NULL,
	teamName             CHAR(20) NOT NULL,
	companyName          CHAR(25) NOT NULL,
	CONSTRAINT XPKIS_WORKING PRIMARY KEY (email,teamName,companyName),
	CONSTRAINT R_14 FOREIGN KEY (email) REFERENCES WORKER (email)
		ON DELETE CASCADE,
	CONSTRAINT R_15 FOREIGN KEY (teamName, companyName) REFERENCES TEAM (teamName, companyName)
		ON DELETE CASCADE
);

CREATE TABLE DIRECTOR
(
	companyName          CHAR(25) NOT NULL,
	email                CHAR(35) NOT NULL,
	CONSTRAINT XPKDIRECTOR PRIMARY KEY (email),
	CONSTRAINT R_6 FOREIGN KEY (companyName) REFERENCES COMPANY (companyName)
		ON DELETE CASCADE,
	CONSTRAINT R_11 FOREIGN KEY (email) REFERENCES ACCOUNT (email)
		ON DELETE CASCADE
);

CREATE TABLE ADMIN
(
	email                CHAR(35) NOT NULL,
	CONSTRAINT XPKADMIN PRIMARY KEY (email),
	CONSTRAINT R_12 FOREIGN KEY (email) REFERENCES ACCOUNT (email)
		ON DELETE CASCADE
);
