CREATE OR REPLACE VIEW weight AS
SELECT person.pid, person.fname, person.lname 
FROM person JOIN body_composition 
ON (person.pid=body_composition.pid) 
WHERE body_composition.weight > 140;

CREATE OR REPLACE VIEW bmi AS
SELECT weight.fname, weight.lname, 
ROUND(703*(body_composition.weight/POW(body_composition.height,2)), 0) AS BMI 
FROM weight JOIN body_composition
on (weight.pid = body_composition.pid) 
WHERE body_composition.weight > 150;

SELECT university_name, city FROM university 
WHERE NOT EXISTS 
(SELECT * FROM person WHERE university.uid=person.uid);

SELECT fname, lname FROM person WHERE uid IN 
(SELECT uid FROM university WHERE city = "Columbia");

SELECT pid FROM participated_in WHERE activity_name="running" 
UNION 
(SELECT pid FROM participated_in WHERE activity_name="racquetball");

SELECT person.fname, person.lname, 
body_composition.weight, body_composition.height, body_composition.age 
FROM person JOIN body_composition 
ON (person.pid=body_composition.pid) 
ORDER BY height DESC, weight ASC, lname ASC;