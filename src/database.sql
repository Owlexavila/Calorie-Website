-- Drop foreign key constraint from Item table
ALTER TABLE "Item"
DROP CONSTRAINT IF EXISTS "Item_date_fkey";

-- Now drop the tables
DROP TABLE IF EXISTS "DailyMenu";
DROP TABLE IF EXISTS "Item";
DROP TABLE IF EXISTS "UserHistory";
DROP TABLE IF EXISTS "Users";

-- Recreate the tables and insert data...
CREATE TABLE IF NOT EXISTS "DailyMenu"
(
    "date" DATE NOT NULL,
    PRIMARY KEY ("date")
);

CREATE TABLE IF NOT EXISTS "Item"
(
    "name" VARCHAR(255) NOT NULL,
    "date" DATE,
    "mealType" VARCHAR(255),
    "totalcal" INT,
    "totalprotein" INT,
    "totalcarb" INT,
    "totalfat" INT,
    PRIMARY KEY ("name"),
    FOREIGN KEY ("date")
        REFERENCES "DailyMenu"("date")
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS "Users"
(
    "email" VARCHAR(255) NOT NULL,
    "password" VARCHAR(255) NOT NULL,
    PRIMARY KEY ("email")
);

CREATE TABLE IF NOT EXISTS "UserHistory"
(
    "email" VARCHAR(255) NOT NULL,
    "date" DATE NOT NULL,
    "totalcal" INT,
    "totalprotein" INT,
    "totalcarb" INT,
    "totalfat" INT,
    "totalwater" INT,
    PRIMARY KEY ("email", "date"),
    FOREIGN KEY ("email")
        REFERENCES "Users"("email")
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

-- Insert data
INSERT INTO public."DailyMenu"(date)
	VALUES ('2024-05-07');

INSERT INTO public."Item"(name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('empanada, spicy chicken', '2024-05-07', 'dinner', 250, 7, 19, 17);
	
INSERT INTO public."Item"(name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('individual guacamole', '2024-05-07', 'lunch', 130, 0, 4, 11);
	
INSERT INTO public."Item"(name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('mild sliced cheddar cheese', '2024-05-07', 'lunch', 90, 4, 1, 7);
	
INSERT INTO public."Item"(name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('nutty buddy', '2024-05-07', 'lunch', 100, 1, 11, 6);
	
INSERT INTO public."Item"(name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('potatoe split top bun', '2024-05-07', 'dinner', 250, 8, 45, 4.5);
	
INSERT INTO public."Item"(name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('roasted brussel sprouts', '2024-05-07', 'dinner', 60, 3, 7, 3);
	
INSERT INTO public."Item"(name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('tilapia tortilla crusted', '2024-05-07', 'dinner', 280, 28, 16, 12);
	
INSERT INTO public."Item"(name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('waffle fries', '2024-05-07', 'dinner', 350, 4, 41, 17);
	
INSERT INTO public."Item"(name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('cake, sinful seven layers', '2024-05-07', 'dinner', 660, 5, 60, 48);
	
INSERT INTO public."Item"(name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('chuckwagon corn', '2024-05-07', 'dinner', 100, 2, 17, 4);
	
UPDATE public."Item"
SET name='cacciatore chicken drumsticks'
	WHERE name='cacciatore';

