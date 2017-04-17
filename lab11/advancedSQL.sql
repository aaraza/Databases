--- Create views to store the result of your queries as a table for easy access ---
CREATE OR REPLACE VIEW weight AS
SELECT person.pid, person.fname, person.lname 
FROM person JOIN body_composition 
ON (person.pid=body_composition.pid) 
WHERE body_composition.weight > 140;

--- Use nested queries to select data based on the result of another query ---
--- Here I select the name and city of a university if the uid does not exist in the person table ---
SELECT university_name, city FROM university 
WHERE NOT EXISTS 
(SELECT * FROM person WHERE university.uid=person.uid);

--- Union is used to join the result of two queries ---
SELECT pid FROM participated_in WHERE activity_name="running" 
UNION 
(SELECT pid FROM participated_in WHERE activity_name="racquetball");