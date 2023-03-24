-- 1. Select Product name and quantity/unit.
SELECT product_name, quantity_per_unit
FROM products;

-- 2. Show Current product list (ProductID and name).
SELECT id, product_name
FROM products;

-- 3. Show Discontinued product list (ProductID and name).
SELECT id, product_name
FROM products
WHERE discontinued = 1;

-- 4. Most expense and least expensive product list (name and unit price).
SELECT product_name, list_price
FROM products
WHERE list_price = (SELECT MIN(list_price) FROM products)
   OR list_price = (SELECT MAX(list_price) FROM products);


-- 5. Show Product list (id, name, unit price) where current products cost less than $20.
SELECT id, product_name, list_price
FROM products
WHERE list_price < 20;

-- 6. Show Product list (id, name, unit price) where current products cost between $15 and $25.
SELECT id, product_name, list_price
FROM products
WHERE list_price > 15 AND list_price < 25;

-- 7. Show Product list (name, unit price) of above average price.
SELECT product_name, list_price
FROM products 
WHERE list_price > (SELECT AVG(list_price) FROM products);


-- 8. Show Product list (name, unit price) of ten most expensive products.
SELECT product_name, list_price
FROM products
ORDER BY list_price DESC limit 10;

-- 9. Employees who come from the eastern region of the USA.
SELECT first_name
FROM employees
WHERE state_province =

-- 10. Employees who come from the Orlando territory.
SELECT
FROM employees
WHERE state_province = 

-- 11. Insert a product.
INSERT INTO products (product_code, product_name, description, standard_cost, list_price, reorder_level, target_level, quantity_per_unit, discontinued, minimum_reorder_quantity, category)
VALUES ('ABC123', 'Apple', 'fruit', 10.00, 20.00, 5, 10, 'Each', 0, 5, 'Food');

-- 12. Insert an employee.
INSERT INTO employees (company, last_name, first_name, email_address, job_title, business_phone, home_phone, mobile_phone, fax_number, address, city, state_province, zip_postal_code, country_region, web_page, notes, attachments)
VALUES ('ABC Company', 'Doe', 'John', 'johndoe@email.com', 'Programmer', '555-1234', '555-5678', '555-9012', '555-3456', '123 Main St', 'Wichita Falls', 'Texas', '12345', 'USA', 'http://www.johndoe.com', 'Some notes about John Doe', NULL);
