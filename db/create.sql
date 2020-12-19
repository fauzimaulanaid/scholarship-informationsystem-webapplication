--1. Drop and Create

drop database scholarship;
create database scholarship;

use scholarship;

--2b Child table (table with FK)
create table participant(
    participant_id int(9) not NULL auto_increment primary key
    ,full_name varchar(40) not NULL
    ,gender varchar(40) not NULL
    ,dob DATE not NULL
    ,p_address varchar(200) not NULL
    ,email varchar(200) not NULL
    ,phone varchar(100) not NULL
    ,university varchar(200) not NULL
    ,university_web varchar(200) not NULL
    ,university_sg varchar(200) not NULL
);

describe participant;

create table user(
    userid int(9) not NULL auto_increment primary key
    ,fullname varchar(255) not NULL
    ,username varchar(255) not NULL
    ,userpassword varchar(255) not NULL
    ,userrole varchar(255) not NULL
);

describe user;

create table log_activity(
    log_activity_id int(9) not NULL auto_increment primary key
    ,time_log varchar(255) not NULL
    ,username varchar(255) not NULL
    ,activity varchar(255) not NULL
    ,userrole varchar(255) not NULL
);

describe log_activity;

insert into user(fullname,username,userpassword,userrole) values ('Mr Arif Rifai Dwiyanto','admin','admin123','administrator');
insert into user(fullname,username,userpassword,userrole) values ('Mr Arif Rifai Dwiyanto','viewer','viewer123','viewer');

INSERT INTO `participant` (`full_name`, `gender`, `dob`, `p_address`, `email`, `phone`, `university`, `university_web`, `university_sg`) VALUES
('Muhammad Fajar Ramadhan', 'Male', '2000-08-11', 'Jalan Rawa Dolar', 'muhfajar@gmail.com', '087867543456', 'Universitas Indraprasta PGRI', 'www.unindra.ac.id', 'National University of Singapore (NUS)'),
('Rosalina Rahmawati', 'Female', '2000-04-15', 'Kampung Sawah', 'oca@gmail.com', '081356780978', 'Universitas Indonesia', 'www.ui.ac.id', 'Singapore Management University (SMU)'),
('Syahrul Hidayat', 'Male', '2000-07-05', 'Ujung Aspal Pondok Gede', 'syahrul411@gmail.com', '087867541230', 'Universitas Gunadarma', 'www.gunadarma.ac.id', 'Singapore University of Technology and Design (SUTD)'),
('Raisya', 'Female', '2000-08-17', 'Jalan Meruya Utara', 'raisya@gmail.com', '085878980912', 'Universitas Mercu Buana', 'www.mercubuana.ac.id', 'Singapore Management University (SMU)'),
('Marselina Adinda Pratiwi', 'Female', '2001-02-28', 'Jalan Bojong Nangka 2', 'marselina@gmail.com', '081345676567', 'Institut Teknologi Bandung', 'www.itb.ac.id', 'Singapore Management University (SMU)'),
('Albert Patrick', 'Male', '1998-04-04', 'Raflles Regency Cibubur', 'albert@gmail.com', '081345678790', 'Universitas Mercu Buana', 'www.mercubuana.ac.id', 'Singapore Institute of Management (SIM)'),
('Mila Handayani', 'Female', '2000-08-02', 'Jalan Matador no.4', 'milahndyn@gmail.com', '085878987656', 'Universitas Trisakti', 'www.trisakti.ac.id', 'Singapore Management University (SMU)'),
('Ardiansyah Saputra', 'Male', '2002-08-30', 'Jalan Alternatif Cibubur no.5', 'ardiganteng@gmail.com', '081234561236', 'Universitas Gunadarma', 'www.gunadarma.ac.id', 'Nanyang Technological University (NTU)'),
('Aditya Nurdin', 'Male', '2000-03-29', 'Jalan Alternatif Cibubur no.10', 'aditya252@gmail.com', '085167891235', 'Bina Sarana Informatika', 'www.bsi.ac.id', 'Nanyang Technological University (NTU)'),
('Bagas Romansyah', 'Male', '2000-09-12', 'Jalan Rawa Bebek', 'bagas.okem@gmail.com', '087867898787', 'Universitas Indraprasta PGRI', 'www.unindra.ac.id', 'Singapore University of Technology and Design (SUTD)'),
('Alvin Irwanto', 'Male', '2000-06-07', 'Kunciran indah', 'alvin@mercubuana.ac.id', '087867542098', 'Universitas Mercu Buana', 'www.mercubuana.ac.id', 'Nanyang Technological University (NTU)'),
('Agus Saputra Hidayatullah', 'Male', '1998-11-06', 'Jalan Mawar, Pondok Indah', 'agusz@gmail.com', '081345627189', 'Universitas Borobudur', 'www.ub.ac.id', 'Singapore Management University (SMU)'),
('Joko Wicahya Ramadhan', 'Male', '2001-05-19', 'Jalan Cendana, Taman Royal 1', 'jokowi@gmail.com', '081245126709', 'Universitas Budi Luhur', 'www.ubl.ac.id', 'Nanyang Technological University (NTU)'),
('Asep Saputra', 'Male', '1999-12-19', 'Jatimakmur, Pondok Gede', 'asep.kasep@gmail.com', '0813456128798', 'Universitas Krisnadwipayana', 'www.unkris.ac.id', 'Singapore Management University (SMU)'),
('Manggy Angelique', 'Female', '1999-08-16', 'Duta Indah, Pondok Gede', 'manggy.que@gmail.com', '08587786152', 'Universitas Gunadarma', 'www.gunadarma.ac.id', 'National University of Singapore (NUS)'),
('Musfira Aprilia', 'Female', '2000-04-01', 'Kampung Sawah', 'neng.mus@gmail.com', '087809891263', 'Universitas Krisnadwipayana', 'www.unkris.ac.id', 'Singapore Institute of Management (SIM)');