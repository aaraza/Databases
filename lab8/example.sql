-- Example where we sort the data 
SELECT Name, District FROM City WHERE CountryCode = "BRA" ORDER BY District;

-- Using limits to find the nth least populated cities
SELECT Name, District, Population FROM City ORDER BY Population LIMIT 10;

-- Using Limit and offset to find the 11-20th most populated cities
SELECT Name, District, Population FROM City ORDER BY Population LIMIT 10 OFFSET 10;

-- Match a pattern: Find all Countries that Start with "S" and end with "ia"
SELECT Name FROM Country WHERE Name Like "S%ia";

-- Find City and Country WHERE Population < 1000 using a join statement
SELECT City.Name AS 'City Name', Country.Name AS 'Country Name', City.Population FROM City JOIN Country ON (City.CountryCode = Country.Code) WHERE City.Population < 1000;

-- Ordering by multiple columns 
SELECT Name, District FROM City WHERE CountryCode = "BRA" ORDER BY District, Name DESC;

-- Using math to create new columns
SELECT Name, GNP, GNPOLD, GNPOLD-GNP FROM Country WHERE GNP IS NOT NULL AND GNPOLD IS NOT NULL;