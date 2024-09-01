@echo off
set DB_NAME=mmp_sonata
set DB_USER="root"
set DB_PASS=""
set SQL_FILE=mmp_sonata.sql

:: Drop the database if it exists
C:\xampp\mysql\bin\mysql -u %DB_USER% -e "DROP DATABASE IF EXISTS %DB_NAME%;"

:: Create the database
C:\xampp\mysql\bin\mysql -u %DB_USER% -e "CREATE DATABASE %DB_NAME%;"

:: Import the SQL file into the new database
C:\xampp\mysql\bin\mysql -u %DB_USER% %DB_NAME% < %SQL_FILE%
pause
