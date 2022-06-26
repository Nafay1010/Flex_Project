
CREATE TABLE LOGIN
(
    USERNAME VARCHAR(8) NOT NULL PRIMARY KEY,
    PASSWORD VARCHAR(10)
);

CREATE TABLE STUDENT
(
    NAME VARCHAR(50),
    EMAIL VARCHAR(30),
    MOBILE_NO VARCHAR(15),
    GENDER VARCHAR(1),
    DOB DATE,
    CGPA NUMERIC(4,2),
    BATCH VARCHAR(4),
    CAMPUS VARCHAR(50),
    DEGREE VARCHAR(10),
    FATHER_NAME VARCHAR(50),
    FATHER_NO VARCHAR(12),
    USERNAME VARCHAR(8), 
    INDEX
(USERNAME), 
    CONSTRAINT FK_SID FOREIGN KEY
(USERNAME) REFERENCES LOGIN
(USERNAME)
);

CREATE TABLE TEACHER
(
    NAME VARCHAR(50),
    MOBILE_NO VARCHAR(15),
    GENDER VARCHAR(1),
    DOB DATE,
    DEPARTMENT VARCHAR(30),
    EMAIL VARCHAR(50),
    BS_GPA NUMERIC(4,2),
    MS_GPA NUMERIC(4,2),
    University VARCHAR(50),
    USERNAME VARCHAR(8), 
    INDEX
(USERNAME), 
    CONSTRAINT FK_TID FOREIGN KEY
(USERNAME) REFERENCES LOGIN
(USERNAME)
);

CREATE TABLE COURSE_INFO
(
    C_ID VARCHAR(10) NOT NULL PRIMARY KEY,
    C_NAME VARCHAR(100),
    CR_HOURS TINYINT(8)
);


CREATE TABLE STUDENT_COURSE
(
    Serial_No mediumint(8) NOT NULL
    AUTO_INCREMENT PRIMARY KEY,
    USERNAME VARCHAR
    (8),
    INDEX
    (USERNAME), 
    CONSTRAINT FK_SID_SCOURSE FOREIGN KEY
    (USERNAME) REFERENCES LOGIN
    (USERNAME),
    C_ID VARCHAR
    (8),
    INDEX
    (C_ID), 
    CONSTRAINT FK_CID_SCOURSE FOREIGN KEY
    (C_ID) REFERENCES COURSE_INFO
    (C_ID)
);
    ALTER TABLE STUDENT_COURSE AUTO_INCREMENT=1;

    CREATE TABLE TEACHER_COURSE
    (
        Serial_No mediumint(8) NOT NULL
        AUTO_INCREMENT PRIMARY KEY,
    USERNAME VARCHAR
        (8),
    INDEX
        (USERNAME), 
    CONSTRAINT FK_TID_TCOURSE FOREIGN KEY
        (USERNAME) REFERENCES LOGIN
        (USERNAME),
    C_ID VARCHAR
        (8),
    INDEX
        (C_ID), 
    CONSTRAINT FK_CID_TCOURSE FOREIGN KEY
        (C_ID) REFERENCES COURSE_INFO
        (C_ID)
);

        ALTER TABLE STUDENT_COURSE AUTO_INCREMENT=1;

        CREATE TABLE Attendance
        (
            att_id mediumint(8) NOT NULL
            AUTO_INCREMENT PRIMARY KEY,
            
        USERNAME VARCHAR
            (8),
    INDEX
            (USERNAME), 
    CONSTRAINT FK_ID_ATT FOREIGN KEY
            (USERNAME) REFERENCES LOGIN
            (USERNAME),
            Date DATE,
    C_ID VARCHAR
            (8),
    INDEX
            (C_ID), 
    CONSTRAINT FK_CID_ATT FOREIGN KEY
            (C_ID) REFERENCES COURSE_INFO
            (C_ID),
            T_ID VARCHAR
            (8), INDEX
            (USERNAME), 
    CONSTRAINT FK_TID_ATT FOREIGN KEY
            (USERNAME) REFERENCES LOGIN
            (USERNAME),
Attendance VARCHAR
            (1)
        );
            ALTER TABLE Attendance AUTO_INCREMENT=1;

            CREATE TABLE COURSE_MARKS
            (
                Serial_NO mediumint
(8) NOT NULL
                AUTO_INCREMENT PRIMARY KEY,
            USERNAME VARCHAR
                (8),
    INDEX
                (USERNAME), 
    CONSTRAINT FK_ID_CM FOREIGN KEY
                (USERNAME) REFERENCES LOGIN
                (USERNAME),
T_ID VARCHAR
                (8), INDEX
                (USERNAME), 
    CONSTRAINT FK_TID_CM FOREIGN KEY
                (USERNAME) REFERENCES LOGIN
                (USERNAME),C_ID VARCHAR
                (8),
    INDEX
                (C_ID), 
    CONSTRAINT FK_CID_CM FOREIGN KEY
                (C_ID) REFERENCES COURSE_INFO
                (C_ID),
                SI NUMERIC
                ,
                SII NUMERIC
                ,
                FINAL NUMERIC
                ,
                
T_SI NUMERIC
                ,
                T_SII NUMERIC
                ,
                T_FINAL NUMERIC
                ,
                T_OBTAINED NUMERIC
                ,
                Grand_Total NUMERIC
                ,
                GPA FLOAT
                
        );

                ALTER TABLE course_marks AUTO_INCREMENT=1;

                /* Inserting data */

                INSERT INTO LOGIN
                VALUES
                    ('S001', 'S001');
                INSERT INTO LOGIN
                VALUES
                    ('S002', 'S002');
                INSERT INTO LOGIN
                VALUES
                    ('S003', 'S003');
                INSERT INTO LOGIN
                VALUES
                    ('S004', 'S004');
                INSERT INTO LOGIN
                VALUES
                    ('S005', 'S005');
                INSERT INTO LOGIN
                VALUES
                    ('S006', 'S006');
                INSERT INTO LOGIN
                VALUES
                    ('S007', 'S007');
                INSERT INTO LOGIN
                VALUES
                    ('S008', 'S008');
                INSERT INTO LOGIN
                VALUES
                    ('S009', 'S009');
                INSERT INTO LOGIN
                VALUES
                    ('S010', 'S010');

                INSERT INTO LOGIN
                VALUES
                    ('T001', 'T001');
                INSERT INTO LOGIN
                VALUES
                    ('T002', 'T002');
                INSERT INTO LOGIN
                VALUES
                    ('T003', 'T003');
                INSERT INTO LOGIN
                VALUES
                    ('admin', 'admin');

                INSERT INTO STUDENT
                VALUES
                    ('Muhammad Abdul Nafay', 'S001@nu.edu.pk', '03328579410', 'M', '2001-05-28', 0, '19', 'Peshawar', 'BSCS', 'Abdul Basit', '12341234134', 'S001');

                INSERT INTO STUDENT
                VALUES
                    ('Muhammad Usman', 'S002@nu.edu.pk', '02322451512', 'M', '1999-05-28', 0, '19', 'lahore', 'BSCS', 'Abdul Nafay', '12341234134', 'S002');

                INSERT INTO STUDENT
                VALUES
                    ('Sheheryaar Ali', 'S003@nu.edu.pk', '01222422312', 'M', '1999-03-28', 0, '19', 'Peshawar', 'BSCS', 'Abdul Nafay', '12341234134', 'S003');

                INSERT INTO STUDENT
                VALUES
                    ('Usman Haider', 'S004@nu.edu.pk', '03328579410', 'M', '1997-04-28', 0, '19', 'Islamabad', 'BSEE', 'Abdul Nafay', '12341234134', 'S004');

                INSERT INTO STUDENT
                VALUES
                    ('Qanmber Ali', 'S005@nu.edu.pk', '03323339410', 'M', '1999-08-21', 0, '20', 'Karachi', 'BSEE', 'Abdul Nafay', '12341234134', 'S005');

                INSERT INTO STUDENT
                VALUES
                    ('Rashid Subhani', 'S006@nu.edu.pk', '03323573430', 'M', '1997-04-20', 0, '18', 'Lahore', 'BSEE', 'Abdul Nafay', '12341234134', 'S006');

                INSERT INTO STUDENT
                VALUES
                    ('Muhammad Ali', 'S007@nu.edu.pk', '03208229410', 'M', '2000-07-28', 0, '19', 'Chiniot-Faisalabad', 'BSSE', 'Abdullah Khan', '12341234134', 'S007');
                INSERT INTO STUDENT
                VALUES
                    ('Laiba Khan', 'S008@nu.edu.pk', '03322522420', 'F', '2022-04-27', 0, '21', 'Islamabad', 'BSEE', 'Muhammad Ali', '12341234134', 'S008');
                INSERT INTO STUDENT
                VALUES
                    ('Muhammad Ali', 'S009@nu.edu.pk', '03328579410', 'M', '1997-04-28', 0, '19', 'Islamabad', 'BSEE', 'Abdul Nafay', '12341234134', 'S009');
                INSERT INTO STUDENT
                VALUES
                    ('Ahmad Abdullah', 'S010@nu.edu.pk', '03328533310', 'M', '1998-05-02', 0, '20', 'Karachi', 'BSEE', 'Abdul Nafay', '12341234134', 'S010');

                INSERT INTO TEACHER
                VALUES
                    ('Ahmed Ali', '03238232240', 'M', '1989-05-28', 'Computer Science', 'ahmed_ali@nu.edu.pk', 3.8, 3.5, 'NUST', 'T001');

                INSERT INTO TEACHER
                VALUES
                    ('Ali Khan', '02238726440', 'M', '1985-10-23', 'Electrical Engineering', 'ali_khan@nu.edu.pk', 3.6, 3.3, 'FAST', 'T002');

                INSERT INTO TEACHER
                VALUES
                    ('Abdul Jabar', '02242953410', 'M', '1982-02-08', 'Software Engineering', 'abdul_jabar@nu.edu.pk', 3.7, 3.2, 'COMSATS', 'T003');

                INSERT INTO COURSE_INFO
                VALUES('AI2002', 'Artificial Intelligence', 4);
                INSERT INTO COURSE_INFO
                VALUES('CS2005', 'Database System', 4);
                INSERT INTO COURSE_INFO
                VALUES('CS3009', 'Software Enginering', 3);
                INSERT INTO COURSE_INFO
                VALUES('CS3006', 'Parallel and Distributed Computing', 3);
                INSERT INTO COURSE_INFO
                VALUES('CS3005', 'Theory of Automata', 3);
                INSERT INTO COURSE_INFO
                VALUES('CS2008', 'Numerical Computing', 3);
                INSERT INTO COURSE_INFO
                VALUES('CS2006', 'Operating Systems', 4);
                INSERT INTO COURSE_INFO
                VALUES('CS3001', 'Computer Networks', 4);
                INSERT INTO COURSE_INFO
                VALUES('CS3004', 'Software Design and Analysis', 3);
                INSERT INTO COURSE_INFO
                VALUES('MT205', 'Probability and Statistics', 3);


                INSERT INTO STUDENT_COURSE
                    (USERNAME, C_ID)
                VALUES('S001', 'AI2002');
                INSERT INTO STUDENT_COURSE
                    (USERNAME, C_ID
                    )
                VALUES('S001', 'CS2005');

                INSERT INTO STUDENT_COURSE
                    (USERNAME, C_ID
                    )
                VALUES('S001', 'CS3009');

                INSERT INTO STUDENT_COURSE
                    (USERNAME, C_ID
                    )
                VALUES('S001', 'CS3006');


                INSERT INTO TEACHER_COURSE
                    (USERNAME, C_ID)
                VALUES('T001', 'AI2002');
                INSERT INTO TEACHER_COURSE
                    (USERNAME, C_ID
                    )
                VALUES('T001', 'CS2005');

                /*Triggers*/
                delimiter $
$

//Student Trigger

                CREATE TRIGGER delete_Slogin AFTER
                DELETE ON student
FOR EACH
                ROW
                BEGIN
                    DECLARE user varchar
                    (8);
                SELECT old.username
                INTO user;
                DELETE from student_course where username = user;
                DELETE from attendance where username = user;
                DELETE from login where username = user;
                END $$

//Teacher Trigger

                CREATE TRIGGER delete_Tlogin AFTER
                DELETE ON teacher
FOR EACH
                ROW
                BEGIN
                    DECLARE user varchar
                    (8);
                SELECT old.username
                INTO user;
                DELETE from teacher_course where username = user;
                DELETE from attendance where T_ID = user;
                DELETE from login where username = user;
                END $$

//Course_Info Trigger

                CREATE TRIGGER delete_st_course AFTER
                DELETE ON course_info
FOR EACH
                ROW
                BEGIN
                    DECLARE cor varchar
                    (10);
                SELECT old.C_ID
                INTO cor;
                DELETE from course_marks where C_ID = cor;
                DELETE from attendance where C_ID = cor;
                DELETE from student_course where C_ID = cor;
                DELETE from teacher_course where C_ID = cor;
                END $$

//Student_Course

                CREATE TRIGGER delete_s_course AFTER
                DELETE ON student_course
FOR EACH
                ROW
                BEGIN
                    DECLARE cor varchar
                    (10);
                SELECT old.C_ID
                INTO cor;
                DELETE from course_marks where C_ID = cor;
                DELETE from attendance where C_ID = cor;
                END $$

//Teacher_Course

delimiter $$

                CREATE TRIGGER delete_t_course AFTER
                DELETE ON teacher_course
FOR EACH
                ROW
                BEGIN
                    DECLARE cor varchar
                    (10);
                SELECT old.C_ID
                INTO cor;
                DELETE from course_marks where C_ID = cor;
                DELETE from attendance where C_ID = cor;
                DELETE from student_course where C_ID = cor;
                END $$