
-- System Admin Table
CREATE TABLE SystemAdmin (
  AdminID int AUTO_INCREMENT PRIMARY KEY,
  AdminFName varchar(20) NOT NULL,
  AdminMName varchar(20),
  AdminSName varchar(20) NOT NULL,
  AdminEMail varchar(50) NOT NULL,
  Adminstatus varchar(20) CHECK (Adminstatus IN ('accepted', 'pending', 'rejected')),
  AdminPNo int
);

CREATE TABLE Department(
Departmentname varchar(50) primary key

);


-- Student Table
CREATE TABLE Student (
  StudentTnumber varchar(30) PRIMARY KEY,
  StudentFname varchar(50) NOT NULL,
  StudentMname varchar(50),
  StudentSname varchar(50) NOT NULL,
  StudentEmail varchar(50) NOT NULL,
  StudentPhoneNo int NOT NULL,
  StudentPassword varchar(50) NOT NULL,
  StudentProPicture varchar(40),
  StudentStatus varchar(20) CHECK (StudentStatus IN ('accepted', 'pending', 'rejected'))
);

-- Past Papers Table
CREATE TABLE Pastpaper (
  PastID int AUTO_INCREMENT PRIMARY KEY,
  YearLevel int CHECK (YearLevel BETWEEN 1 AND 4), 
  Examlevel varchar(20) CHECK (Examlevel IN ('Test 01', 'Test 02', 'UE')),  
  pastyear int NOT NULL,
  PastProgram varchar(100),
  PastCourse varchar(100) not null,
  StudentTnumber varchar(30),
  PastStatus varchar(20) CHECK (PastStatus IN ('accepted', 'pending', 'rejected')),
  Departmentname varchar(50),
  FOREIGN KEY (Departmentname) REFERENCES Department(Departmentname),
  FOREIGN KEY (StudentTnumber) REFERENCES Student(StudentTnumber)
    ON DELETE NO ACTION
    ON UPDATE CASCADE
);



-- Notes Table
CREATE TABLE Notes (
  NotesID int AUTO_INCREMENT PRIMARY KEY,
  Noteslevel int CHECK (Noteslevel BETWEEN 1 AND 4),
  Notesyear varchar(4) NOT NULL,
  StudentTnumber varchar(30),
  NotesProgram varchar(50),
  NotesCourse varchar(50),
  NotesStatus varchar(20) CHECK (NotesStatus IN ('accepted', 'pending', 'rejected')),
  Departmentname varchar(50),
  FOREIGN KEY (Departmentname) REFERENCES Department(Departmentname),
  FOREIGN KEY (StudentTnumber) REFERENCES Student(StudentTnumber)
    ON DELETE NO ACTION
    ON UPDATE CASCADE
);



-- Setup Table
CREATE TABLE Setup (
  SetupID int AUTO_INCREMENT PRIMARY KEY,
  title varchar(100),
  description text,
  linkSet varchar(300),
  StudentTnumber varchar(30),
  SetupStatus varchar(20) CHECK (SetupStatus IN ('accepted', 'pending', 'rejected')),
  FOREIGN KEY (StudentTnumber) REFERENCES Student(StudentTnumber)
    ON DELETE NO ACTION
    ON UPDATE CASCADE
);


-- Tutorial Table
CREATE TABLE Tutorial (
  TutID int AUTO_INCREMENT PRIMARY KEY,
  title varchar(100),
  description text,
  linkTut varchar(300),
  StudentTnumber varchar(30),
  Tutorialstatus varchar(20) CHECK (Tutorialstatus IN ('accepted', 'pending', 'rejected')),
  FOREIGN KEY (StudentTnumber) REFERENCES Student(StudentTnumber)
    ON DELETE NO ACTION
    ON UPDATE CASCADE
);


-- Books Table
CREATE TABLE Book (
  BookID int AUTO_INCREMENT PRIMARY KEY,
  BookName varchar(50),
  Description text,
  Booklink varchar(300),
  StudentTnumber varchar(30),
  Bookstatus varchar(20) CHECK (Bookstatus IN ('accepted', 'pending', 'rejected')),
  FOREIGN KEY (StudentTnumber) REFERENCES Student(StudentTnumber)
    ON DELETE NO ACTION
    ON UPDATE CASCADE
);


-- Accessories Table
CREATE TABLE Accessories (
  AccID int AUTO_INCREMENT PRIMARY KEY,
  Description text,
  link varchar(300),
  AdminID int,
  FOREIGN KEY (AdminID) REFERENCES SystemAdmin(AdminID)
    ON DELETE NO ACTION
    ON UPDATE CASCADE
);


-- Downloads Table
CREATE TABLE Downloads (
  FileID int AUTO_INCREMENT PRIMARY KEY,
  FilePathname varchar(100) NOT NULL,
  BookID int,
  TutID int,
  SetupID int,
  PastID int,
  AccID int,
  NotesID int,
  FOREIGN KEY (SetupID) REFERENCES Setup(SetupID)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (TutID) REFERENCES Tutorial(TutID)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (AccID) REFERENCES Accessories(AccID)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (NotesID) REFERENCES Notes(NotesID)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (PastID) REFERENCES Pastpaper(PastID)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (BookID) REFERENCES Book(BookID)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);




-- Comments Table
  CREATE TABLE Comments (
    CommentID int AUTO_INCREMENT PRIMARY KEY,
    CommentDescription text,
    BookID int,
    TutID int,
    SetupID int,
    PastID int,
    AccID int,
    NotesID int,
    StudentTnumber varchar(30),
    FOREIGN KEY (StudentTnumber) REFERENCES Student(StudentTnumber)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (SetupID) REFERENCES Setup(SetupID)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (TutID) REFERENCES Tutorial(TutID)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (AccID) REFERENCES Accessories(AccID)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (NotesID) REFERENCES Notes(NotesID)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (PastID) REFERENCES Pastpaper(PastID)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (BookID) REFERENCES Book(BookID)
        ON DELETE CASCADE
        ON UPDATE CASCADE

 
);













modification of sql server:
-- System Admin Table
CREATE TABLE SystemAdmin (
  AdminID INT IDENTITY(1,1) PRIMARY KEY,
  AdminFName VARCHAR(20) NOT NULL,
  AdminMName VARCHAR(20),
  AdminSName VARCHAR(20) NOT NULL,
  AdminEMail VARCHAR(50) NOT NULL,
  Adminstatus VARCHAR(20) CHECK (Adminstatus IN ('accepted', 'pending', 'rejected')),
  AdminPNo INT
);

CREATE TABLE Department (
  Departmentname VARCHAR(50) PRIMARY KEY
);

-- Student Table
CREATE TABLE Student (
  StudentTnumber VARCHAR(30) PRIMARY KEY,
  StudentFname VARCHAR(50) NOT NULL,
  StudentMname VARCHAR(50),
  StudentSname VARCHAR(50) NOT NULL,
  StudentEmail VARCHAR(50) NOT NULL,
  StudentPhoneNo INT NOT NULL,
  StudentPassword VARCHAR(50) NOT NULL,
  StudentProPicture VARCHAR(40),
  StudentStatus VARCHAR(20) CHECK (StudentStatus IN ('accepted', 'pending', 'rejected'))
);

-- Past Papers Table
CREATE TABLE Pastpaper (
  PastID INT IDENTITY(1,1) PRIMARY KEY,
  YearLevel INT CHECK (YearLevel BETWEEN 1 AND 4), 
  Examlevel VARCHAR(20) CHECK (Examlevel IN ('Test 01', 'Test 02', 'UE')),  
  pastyear INT NOT NULL,
  PastProgram VARCHAR(100),
  PastCourse VARCHAR(100) NOT NULL,
  StudentTnumber VARCHAR(30),
  PastStatus VARCHAR(20) CHECK (PastStatus IN ('accepted', 'pending', 'rejected')),
  Departmentname VARCHAR(50),
  FOREIGN KEY (Departmentname) REFERENCES Department(Departmentname),
  FOREIGN KEY (StudentTnumber) REFERENCES Student(StudentTnumber)
    ON DELETE NO ACTION
    ON UPDATE CASCADE
);

-- Notes Table
CREATE TABLE Notes (
  NotesID INT IDENTITY(1,1) PRIMARY KEY,
  Noteslevel INT CHECK (Noteslevel BETWEEN 1 AND 4),
  Notesyear VARCHAR(4) NOT NULL,
  StudentTnumber VARCHAR(30),
  NotesProgram VARCHAR(50),
  NotesCourse VARCHAR(50),
  NotesStatus VARCHAR(20) CHECK (NotesStatus IN ('accepted', 'pending', 'rejected')),
  Departmentname VARCHAR(50),
  FOREIGN KEY (Departmentname) REFERENCES Department(Departmentname),
  FOREIGN KEY (StudentTnumber) REFERENCES Student(StudentTnumber)
    ON DELETE NO ACTION
    ON UPDATE CASCADE
);

-- Setup Table
CREATE TABLE Setup (
  SetupID INT IDENTITY(1,1) PRIMARY KEY,
  title VARCHAR(100),
  description TEXT,
  linkSet VARCHAR(300),
  StudentTnumber VARCHAR(30),
  SetupStatus VARCHAR(20) CHECK (SetupStatus IN ('accepted', 'pending', 'rejected')),
  FOREIGN KEY (StudentTnumber) REFERENCES Student(StudentTnumber)
    ON DELETE NO ACTION
    ON UPDATE CASCADE
);

-- Tutorial Table
CREATE TABLE Tutorial (
  TutID INT IDENTITY(1,1) PRIMARY KEY,
  title VARCHAR(100),
  description TEXT,
  linkTut VARCHAR(300),
  StudentTnumber VARCHAR(30),
  Tutorialstatus VARCHAR(20) CHECK (Tutorialstatus IN ('accepted', 'pending', 'rejected')),
  FOREIGN KEY (StudentTnumber) REFERENCES Student(StudentTnumber)
    ON DELETE NO ACTION
    ON UPDATE CASCADE
);

-- Books Table
CREATE TABLE Book (
  BookID INT IDENTITY(1,1) PRIMARY KEY,
  BookName VARCHAR(50),
  Description TEXT,
  Booklink VARCHAR(300),
  StudentTnumber VARCHAR(30),
  Bookstatus VARCHAR(20) CHECK (Bookstatus IN ('accepted', 'pending', 'rejected')),
  FOREIGN KEY (StudentTnumber) REFERENCES Student(StudentTnumber)
    ON DELETE NO ACTION
    ON UPDATE CASCADE
);

-- Accessories Table
CREATE TABLE Accessories (
  AccID INT IDENTITY(1,1) PRIMARY KEY,
  Description TEXT,
  link VARCHAR(300),
  AdminID INT,
  FOREIGN KEY (AdminID) REFERENCES SystemAdmin(AdminID)
    ON DELETE NO ACTION
    ON UPDATE CASCADE
);

-- Downloads Table
CREATE TABLE Downloads (
  FileID INT IDENTITY(1,1) PRIMARY KEY,
  FilePathname VARCHAR(100) NOT NULL,
  BookID INT,
  TutID INT,
  SetupID INT,
  PastID INT,
  AccID INT,
  NotesID INT,
  FOREIGN KEY (SetupID) REFERENCES Setup(SetupID)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (TutID) REFERENCES Tutorial(TutID)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (AccID) REFERENCES Accessories(AccID)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (NotesID) REFERENCES Notes(NotesID)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (PastID) REFERENCES Pastpaper(PastID)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (BookID) REFERENCES Book(BookID)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

-- Comments Table
CREATE TABLE Comments (
  CommentID INT IDENTITY(1,1) PRIMARY KEY,
  CommentDescription TEXT,
  BookID INT,
  TutID INT,
  SetupID INT,
  PastID INT,
  AccID INT,
  NotesID INT,
  StudentTnumber VARCHAR(30),
  FOREIGN KEY (StudentTnumber) REFERENCES Student(StudentTnumber)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (SetupID) REFERENCES Setup(SetupID)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (TutID) REFERENCES Tutorial(TutID)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (AccID) REFERENCES Accessories(AccID)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (NotesID) REFERENCES Notes(NotesID)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (PastID) REFERENCES Pastpaper(PastID)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (BookID) REFERENCES Book(BookID)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

