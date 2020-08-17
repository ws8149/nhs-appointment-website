insert into hospital(surgery_hospital,contact_for_BT,comments,tAC)
SELECT `surgery_hospital`, max(`contact_for_BT`), max(`comments`), max(`tAC`) FROM `hospital_temp` group by surgery_hospital
