LOAD DATA INFILE 'hospital.csv' 
IGNORE INTO TABLE hospital_temp 
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE LINES 1
(surgery_hospital,contact_for_BT,comments,tAC)
DELETE FROM hospital_temp WHERE surgery_hospital = '';
