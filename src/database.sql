DROP "DailyMenu"
CREATE TABLE IF NOT EXISTS "DailyMenu"
(
    date date NOT NULL,
    CONSTRAINT "DailyMenu_pkey" PRIMARY KEY (date)
);

DROP "Item"
CREATE TABLE IF NOT EXISTS "Item"
(
    name character varying NOT NULL,
    date date,
    "mealType" character varying,
    totalcal integer,
    totalprotein integer,
    totalcarb integer,
    totalfat integer,
    CONSTRAINT "Item_pkey" PRIMARY KEY (name),
    CONSTRAINT date FOREIGN KEY (date)
        REFERENCES "DailyMenu" (date) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);

Drop "User"
CREATE TABLE IF NOT EXISTS "User"
(
    email character varying NOT NULL,
    password character varying NOT NULL,
    CONSTRAINT "User_pkey" PRIMARY KEY (email)
);

Drop "UserHistory"
CREATE TABLE IF NOT EXISTS "UserHistory"
(
    email character varying NOT NULL,
    date date NOT NULL,
    totalcal integer,
    totalprotein integer,
    totalcarb integer,
    totalfat integer,
    totalwater integer,
    CONSTRAINT "UserHistory_pkey" PRIMARY KEY (email, date),
    CONSTRAINT email FOREIGN KEY (email)
        REFERENCES "User" (email) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);


