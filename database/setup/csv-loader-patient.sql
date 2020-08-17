LOAD DATA INFILE 'patient.csv' 
IGNORE INTO TABLE patient
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE LINES 1
(forename,surname,patient_id,@date_var,sex,diagnosis,transplant_date,transplant_details)
SET DOB = STR_TO_DATE(@date_var, '%d/%m/%Y'); 