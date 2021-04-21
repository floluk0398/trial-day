<p align="center"><a href="https://additive.eu" target="_blank"><img src="https://raw.githubusercontent.com/additive-apps/trial-day/master/logo.png" width="400"></a></p>


# 02 SQL (PostgreSQL)

Given the following Database:

Host: `ec2-54-220-215-8.eu-west-1.compute.amazonaws.com`

Port: `5432`

User: `trial-day`

PW: `p603b779a25b633f683b230ccaa75cb01230460b84e8b14cd155cead03909bbab`

Database: `dbem6ff3g5orbe`

Schema: `trial`

With it's tables

- organizations
- products
- orders

# Queries

Write a query to:

- get the total amount (amount_to_pay) of all orders per organisation per year ordered by year descending

    #### Expected Result:
    | Organization | Year | Amount |
    | ------------ | ---- | ----- |
    | Testhotel Post | 2021 | 123 |
    | ... | ... | ... |
---

- Get all organizations with at least 70 orders in the current year
    #### Expected Result:
  
    | Organization | Count |
    | ------------ | ----- |
    | Testhotel Post | 123 |
    | ... | ... |
---

Add your queries to this document and create a pull request at the end to complete your work.

## Bonus


- Do some further analysis
- get the most sold product per organisation

  #### Expected Result:

  | Organization | Product Name | Count |
  | ------------ | ---- | ----- |
  | Testhotel Post | Übernachtungsgutschein Einzelzimmer | 123 |
  | ... | ... | ... |
---



## MY ANSWERS:

- get the total amount (amount_to_pay) of all orders per organisation per year ordered by year descending

SELECT 
    organizations.name AS organization,
    EXTRACT(YEAR FROM orders.created_at) AS year,
    SUM(orders.amount_to_pay) AS amount
FROM 
    organizations
INNER JOIN orders ON  organizations.id = orders.organization_id
GROUP BY organization, year
ORDER BY year DESC


- Get all organizations with at least 70 orders in the current year

SELECT 
    organizations.name AS organization, 
    count(orders) as count
FROM 
    organizations
INNER JOIN orders ON organizations.id = orders.organization_id
AND EXTRACT(YEAR FROM orders.created_at) = date_part('year', CURRENT_DATE)
GROUP BY organizations.name
HAVING count(orders) >= 70





BONUS:
 - get the most sold product per organisation

## no net fertig! isch mit olle produkte, und net lei die most sold noch organization
SELECT organizations.name AS organization, products.name AS product_name, count(orders) as count
FROM orders
INNER JOIN organizations ON orders.organization_id = organizations.id
INNER JOIN products ON orders.product_id = products.id
GROUP BY organizations.name, products.name






