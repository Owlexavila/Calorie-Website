
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

-- Manage the sessions
 
	CREATE TABLE IF NOT EXISTS "Sessions" (
    session_id VARCHAR(255) PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    last_activity TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert data

INSERT INTO public."DailyMenu"(
date)

VALUES('2024-05-06');

INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('BURRITO BREAKFAST BACON BURRITO KITCHEN', '2024-05-06', 'breakfast1', 380, 16, 31, 22);
	

	
INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('BURRITO, BREAKFAST EGG POTATO CHEESE', '2024-05-06', 'breakfast2', 430, 21, 42, 19);
	

	

	
INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('Garlic Roasted Breakfast Potatoes', '2024-05-06', 'breakfast3', 220, 3, 26, 12);
	

	

	
INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('Buttered and Seasoned Broccoli', '2024-05-06', 'lunch1', 60, 3, 4, 4);
	

	

	
INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('CHICKEN,TENDERS BRD 68-124 PC FRY/BAKE', '2024-05-06', 'lunch2', 410, 32, 36, 16);


	

	
INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('Macaroni and Cheese Gourmet Cobblestreet Market', '2024-05-06', 'lunch3', 350, 13, 33, 19);
	

	

	
INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('Cacciatore Chicken Drumsticks', '2024-05-06', 'dinner1', 540, 47, 15, 32);
	

	

	
INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('Cheesecake, Petite Assorted Bites', '2024-05-06', 'dinner2', 140, 2, 10, 11);
	

	

	
INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('Garlic Breadsticks', '2024-05-06', 'dinner3', 310, 7, 46, 10);
	
	
	
INSERT INTO public."DailyMenu"(
date)

VALUES('2024-05-07');

INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('After Breakfast" Sandwich #2', '2024-05-07', 'breakfast1', 400, 25, 38, 17);
	
INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('Chicken Sausage Patty', '2024-05-07', 'breakfast2', 80, 7, 0, 6);

INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('Cinnamon French Toast', '2024-05-07', 'breakfast3', 480, 14, 68, 16);

INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('Beef, Patty Cooked 4oz', '2024-05-07', 'lunch1', 190, 29, 1, 8);

INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('Buttered Capri Blend Vegetables', '2024-05-07', 'lunch2', 60, 1, 5, 3.5);
	
INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('Nutty Buddy', '2024-05-07', 'lunch3', 100, 1, 11, 6);

INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('Roasted Brussels Sprouts', '2024-05-07', 'dinner1', 60, 3, 7, 3);

INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('TILAPIA TORTILLA CRUSTED', '2024-05-07', 'dinner2', 280, 28, 16, 12);

INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('Waffle Fries', '2024-05-07', 'dinner3', 350, 4, 41, 17);




INSERT INTO public."DailyMenu"(
date)

VALUES('2024-05-08');

INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('After Breakfast" Burrito #1', '2024-05-08', 'breakfast1', 450, 25, 42, 20);

INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('Bacon', '2024-05-08', 'breakfast2', 120, 7, 0, 9);

INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('Cheese Omelette', '2024-05-08', 'breakfast3', 230, 16, 3, 16);


INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('Basmati Rice and Peas', '2024-05-08', 'lunch1', 280, 6, 58, 3.5);
	
	
INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('Buttered Corn', '2024-05-08', 'lunch2', 100, 2, 17, 4);
	
INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('COCONUT CURRY CHIKN', '2024-05-08', 'lunch3', 400, 36, 16, 23);
	
INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('BREAD, PITA NO FOLD 6 WHITE', '2024-05-08', 'dinner1', 140, 4, 24, 3.5);
	
INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('Butter & Margarine', '2024-05-08', 'dinner2', 100, 0, 0, 11);
	
INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('CHEESE, FETA BULK', '2024-05-08', 'dinner3', 70, 4, 1, 6);

INSERT INTO public."DailyMenu"(
date)

VALUES('2024-05-09');

INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('Beyond Meat, Vegan Bfast Patty', '2024-05-09', 'breakfast1', 310, 19, 10, 21);

INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('Chicken Sausage Links', '2024-05-09', 'breakfast2', 80, 6, 0, 6);
	
INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('Etais Breakfast Sandwich English Muffin Egg Cheese', '2024-05-09', 'breakfast3', 360, 20, 35, 16);
	
INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('Blackened Salmon', '2024-05-09', 'lunch1', 410, 34, 0, 29);
	
INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('Buttered Green Beans', '2024-05-09', 'lunch2', 60, 1, 5, 3.5);
	
INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('Candy Bar, Snickers w/Almonds, 1/24/PK', '2024-05-09', 'lunch3', 230, 3, 33, 10);
	
INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('Herb & Parmesan Baby Baker Potatoes', '2024-05-09', 'dinner1', 170, 5, 25, 5);
	
INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('Kim Js Kajun Shrimp w/Sauce', '2024-05-09', 'dinner2', 270, 38, 7, 8);
	
INSERT INTO public."Item"(
	name, date, "mealType", totalcal, totalprotein, totalcarb, totalfat)
	VALUES ('Prime 6oz Beef Tenderloin Steak 2023', '2024-05-09', 'dinner3', 270, 37, 3, 12);







	
	
