<<<<<<< HEAD
//NEVER runa UPDATE or DELETE queries without a WHERE clause//





DROP TABLE IF EXISTS customer CASCADE;

CREATE TABLE customer (
id SERIAL   PRIMARY KEY,
first_name  VARCHAR(80)   NOT NULL,
last_name   VARCHAR(80)   NOT NULL,
address      TEXT      NOT NULL,
tel      VARCHAR(20)   NOT NULL,
email    VARCHAR(255)  NOT NULL
);

INSERT INTO customer ( first_name, last_name, address, tel, email )
VALUES ('Cynthia', 'Black', '600N 250W', '(801)123-4567', 'cblack@icloud.com');

SELECT * FROM customer;

-- //>>>>>>>>>>>>>>>>>>>>
-- //>>>>>>>>>>>>>>>>>>>>
-- //>>>>>>>>>>>>>>>>>>>>
-- //>>>>>>>>>>>>>>>>>>>>
-- //>>>>>>>>>>>>>>>>>>>>
-- //>>>>>>>>>>>>>>>>>>>>

DROP TABLE IF EXISTS category CASCADE;

CREATE TABLE category (
  id   SERIAL      PRIMARY KEY,
  name VARCHAR(64) NOT NULL UNIQUE
);


INSERT INTO category (name)
SELECT unnest(ARRAY[
  'SKIRT',
  'DRESS',
  'TOPS' 
]);





DROP TABLE IF EXISTS size CASCADE;

CREATE TABLE size (
  id   SERIAL PRIMARY KEY,
  name VARCHAR(32) UNIQUE,
  code CHAR(2)     UNIQUE
);

INSERT INTO size (name, code) VALUES
  ('Small', 'sm'),
  ('Medium', 'md'),
  ('Large', 'lg');




DROP TABLE IF EXISTS product CASCADE;

CREATE TABLE product (
  id          SERIAL      PRIMARY KEY,
  category_id INTEGER     NOT NULL REFERENCES category (id),
  size_id     INTEGER     NOT NULL REFERENCES size (id),
  name        VARCHAR(64) NOT NULL UNIQUE,
  price       MONEY       NOT NULL
);
//add picture
ALTER TABLE product ADD COLUMN description VARCHAR(256);
ALTER TABLE product ADD COLUMN image_url   VARCHAR(256);


INSERT INTO product (name, price, category_id, size_id) VALUES
  (
    'Floral Maxi Skirt',
    35.00,
    (SELECT id FROM category WHERE name = 'SKIRT'),
    (SELECT id FROM size WHERE code = 'sm')
  );




DROP TABLE IF EXISTS purchase CASCADE;

CREATE TABLE purchase (
  id SERIAL     PRIMARY KEY,
  customer_id   INTEGER NOT NULL REFERENCES customer (id),
  purchase_date DATE    NOT NULL DEFAULT CURRENT_DATE
);

INSERT INTO purchase (customer_id) VALUES
  (
    (SELECT id FROM customer WHERE first_name = 'Cynthia' AND last_name = 'Black')
  );




DROP TABLE IF EXISTS purchase_item CASCADE;

CREATE TABLE purchase_item (
  id          SERIAL  PRIMARY KEY,
  purchase_id INTEGER NOT NULL REFERENCES purchase (id),
  product_id  INTEGER NOT NULL REFERENCES product  (id),
  discount    MONEY   NOT NULL DEFAULT 0.00
);

INSERT INTO purchase_item (purchase_id, product_id) VALUES
  (
    (SELECT id FROM purchase LIMIT 1), -- Proof-of-concept: get 1 purchase, doesn't matter which for this example
  (SELECT id FROM product WHERE name = 'Floral Maxi Skirt')
  );

INSERT INTO purchase_item (purchase_id, product_id, discount) VALUES
  (
    (SELECT id FROM purchase LIMIT 1), -- Proof-of-concept: get 1 purchase, doesn't matter which for this example
  (SELECT id FROM product WHERE name = 'Floral Maxi Skirt'),
  25.00
  );




-- Sample query:
SELECT
  customer.first_name,
  customer.last_name,
  purchase.purchase_date,
  product.name,
  product.price,
  purchase_item.discount,
  product.price - purchase_item.discount AS net_price
FROM customer
  INNER JOIN purchase
    ON customer.id = purchase.customer_id
  INNER JOIN purchase_item
    ON purchase.id = purchase_item.purchase_id
  INNER JOIN product ON
    purchase_item.product_id = product.id;
  
-- //>>>>>>>>>>>>>>>>>>>>
-- //>>>>>>>>>>>>>>>>>>>>
-- //>>>>>>>>>>>>>>>>>>>>
-- //>>>>>>>>>>>>>>>>>>>>
-- //>>>>>>>>>>>>>>>>>>>>
-- //>>>>>>>>>>>>>>>>>>>>


CREATE TABLE purchase (
prod_id  SERIAL  PRIMARY KEY,
prod_name  VARCHAR(80)    NOT NULL,
category  TEXT      NOT NULL,
size    VARCHAR(4)    NOT NULL,
price    MONEY      NOT NULL,
discount  MONEY      NOT NULL,
quantity  INTEGER      NOT NULL
);

INSERT INTO purchase ( prod_name, category, size, price, discount, quantity)
VALUES ('Floral Maxi Skirt','SKIRT', 'S', '$35.00', '$5.00', '1');

SELECT * FROM purchase;




DROP TABLE IF EXIXTS member_acct CASCADE;

CREATE TABLE member_acct (
purchase_id SERIAL   PRIMARY KEY,
id        INTEGER     NOT NULL,
prod_id      VARCHAR(10)    NOT NULL,
prod_name    VARCHAR(80)    NOT NULL,
quantity    INTEGER      NOT NULL,
price      MONEY      NOT NULL,
discount    MONEY      NOT NULL,
day_purch    DATE      NOT NULL
);

INSERT INTO member_acct ( id, prod_id, prod_name, quantity, price, discount, day_purch)
VALUES ('0001', '16001','perfect dress', '1', '50.00', '2.00', '05/05/2018');

SELECT * FROM member_acct;




DROP TABLE IF EXISTS supplier CASCADE;

CREATE TABLE supplier (
suppl_id SERIAL PRIMARY KEY,
suppl_name    TEXT      NOT NULL,
suppl_address  TEXT      NOT NULL,
suppl_tel    VARCHAR(20)   NOT NULL,
suppl_email    VARCHAR(255)  NOT NULL
);

INSERT INTO supplier (suppl_name, suppl_address, suppl_tel, suppl_email)
VALUES ('ALIBABA', '650N 900E', '+3(123)145-6987', 'alibabasales@alibaba.com');

SELECT * FROM supplier;














=======
//NEVER runa UPDATE or DELETE queries without a WHERE clause//





DROP TABLE IF EXISTS customer CASCADE;

CREATE TABLE customer (
id SERIAL   PRIMARY KEY,
first_name  VARCHAR(80)   NOT NULL,
last_name   VARCHAR(80)   NOT NULL,
address      TEXT      NOT NULL,
tel      VARCHAR(20)   NOT NULL,
email    VARCHAR(255)  NOT NULL
);

INSERT INTO customer ( first_name, last_name, address, tel, email )
VALUES ('Cynthia', 'Black', '600N 250W', '(801)123-4567', 'cblack@icloud.com');

SELECT * FROM customer;

-- //>>>>>>>>>>>>>>>>>>>>
-- //>>>>>>>>>>>>>>>>>>>>
-- //>>>>>>>>>>>>>>>>>>>>
-- //>>>>>>>>>>>>>>>>>>>>
-- //>>>>>>>>>>>>>>>>>>>>
-- //>>>>>>>>>>>>>>>>>>>>

DROP TABLE IF EXISTS category CASCADE;

CREATE TABLE category (
  id   SERIAL      PRIMARY KEY,
  name VARCHAR(64) NOT NULL UNIQUE
);


INSERT INTO category (name)
SELECT unnest(ARRAY[
  'SKIRT',
  'DRESS',
  'TOPS' 
]);





DROP TABLE IF EXISTS size CASCADE;

CREATE TABLE size (
  id   SERIAL PRIMARY KEY,
  name VARCHAR(32) UNIQUE,
  code CHAR(2)     UNIQUE
);

INSERT INTO size (name, code) VALUES
  ('Small', 'sm'),
  ('Medium', 'md'),
  ('Large', 'lg');




DROP TABLE IF EXISTS product CASCADE;

CREATE TABLE product (
  id          SERIAL      PRIMARY KEY,
  category_id INTEGER     NOT NULL REFERENCES category (id),
  size_id     INTEGER     NOT NULL REFERENCES size (id),
  name        VARCHAR(64) NOT NULL UNIQUE,
  price       MONEY       NOT NULL
);
//add picture
ALTER TABLE product ADD COLUMN description VARCHAR(256);
ALTER TABLE product ADD COLUMN image_url   VARCHAR(256);


INSERT INTO product (name, price, category_id, size_id) VALUES
  (
    'Floral Maxi Skirt',
    35.00,
    (SELECT id FROM category WHERE name = 'SKIRT'),
    (SELECT id FROM size WHERE code = 'sm')
  );




DROP TABLE IF EXISTS purchase CASCADE;

CREATE TABLE purchase (
  id SERIAL     PRIMARY KEY,
  customer_id   INTEGER NOT NULL REFERENCES customer (id),
  purchase_date DATE    NOT NULL DEFAULT CURRENT_DATE
);

INSERT INTO purchase (customer_id) VALUES
  (
    (SELECT id FROM customer WHERE first_name = 'Cynthia' AND last_name = 'Black')
  );




DROP TABLE IF EXISTS purchase_item CASCADE;

CREATE TABLE purchase_item (
  id          SERIAL  PRIMARY KEY,
  purchase_id INTEGER NOT NULL REFERENCES purchase (id),
  product_id  INTEGER NOT NULL REFERENCES product  (id),
  discount    MONEY   NOT NULL DEFAULT 0.00
);

INSERT INTO purchase_item (purchase_id, product_id) VALUES
  (
    (SELECT id FROM purchase LIMIT 1), -- Proof-of-concept: get 1 purchase, doesn't matter which for this example
  (SELECT id FROM product WHERE name = 'Floral Maxi Skirt')
  );

INSERT INTO purchase_item (purchase_id, product_id, discount) VALUES
  (
    (SELECT id FROM purchase LIMIT 1), -- Proof-of-concept: get 1 purchase, doesn't matter which for this example
  (SELECT id FROM product WHERE name = 'Floral Maxi Skirt'),
  25.00
  );




-- Sample query:
SELECT
  customer.first_name,
  customer.last_name,
  purchase.purchase_date,
  product.name,
  product.price,
  purchase_item.discount,
  product.price - purchase_item.discount AS net_price
FROM customer
  INNER JOIN purchase
    ON customer.id = purchase.customer_id
  INNER JOIN purchase_item
    ON purchase.id = purchase_item.purchase_id
  INNER JOIN product ON
    purchase_item.product_id = product.id;
  
-- //>>>>>>>>>>>>>>>>>>>>
-- //>>>>>>>>>>>>>>>>>>>>
-- //>>>>>>>>>>>>>>>>>>>>
-- //>>>>>>>>>>>>>>>>>>>>
-- //>>>>>>>>>>>>>>>>>>>>
-- //>>>>>>>>>>>>>>>>>>>>


CREATE TABLE purchase (
prod_id  SERIAL  PRIMARY KEY,
prod_name  VARCHAR(80)    NOT NULL,
category  TEXT      NOT NULL,
size    VARCHAR(4)    NOT NULL,
price    MONEY      NOT NULL,
discount  MONEY      NOT NULL,
quantity  INTEGER      NOT NULL
);

INSERT INTO purchase ( prod_name, category, size, price, discount, quantity)
VALUES ('Floral Maxi Skirt','SKIRT', 'S', '$35.00', '$5.00', '1');

SELECT * FROM purchase;




DROP TABLE IF EXIXTS member_acct CASCADE;

CREATE TABLE member_acct (
purchase_id SERIAL   PRIMARY KEY,
id        INTEGER     NOT NULL,
prod_id      VARCHAR(10)    NOT NULL,
prod_name    VARCHAR(80)    NOT NULL,
quantity    INTEGER      NOT NULL,
price      MONEY      NOT NULL,
discount    MONEY      NOT NULL,
day_purch    DATE      NOT NULL
);

INSERT INTO member_acct ( id, prod_id, prod_name, quantity, price, discount, day_purch)
VALUES ('0001', '16001','perfect dress', '1', '50.00', '2.00', '05/05/2018');

SELECT * FROM member_acct;




DROP TABLE IF EXISTS supplier CASCADE;

CREATE TABLE supplier (
suppl_id SERIAL PRIMARY KEY,
suppl_name    TEXT      NOT NULL,
suppl_address  TEXT      NOT NULL,
suppl_tel    VARCHAR(20)   NOT NULL,
suppl_email    VARCHAR(255)  NOT NULL
);

INSERT INTO supplier (suppl_name, suppl_address, suppl_tel, suppl_email)
VALUES ('ALIBABA', '650N 900E', '+3(123)145-6987', 'alibabasales@alibaba.com');

SELECT * FROM supplier;














>>>>>>> 49a80b2f2adae315ac4d08a66776ba3830fb6db6
