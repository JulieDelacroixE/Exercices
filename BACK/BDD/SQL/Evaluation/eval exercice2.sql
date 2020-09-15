USE northwind;

SELECT CompanyName AS 'Société', ContactName AS 'Contact' , ContactTitle AS 'Fonction', phone AS 'Téléphone'
FROM customers
WHERE country = 'France';

SELECT ProductName AS 'Produit', unitprice AS 'Prix'
FROM products
JOIN suppliers
ON products.supplierID = suppliers.SupplierID
WHERE companyName = 'Exotic Liquids';

SELECT CompanyName AS 'Société' , COUNT(*) AS 'Nbre Produits' FROM products
JOIN suppliers 
ON products.supplierID = suppliers.supplierID
WHERE country = 'France'
GROUP BY CompanyName
ORDER BY COUNT(*) DESC;

SELECT CompanyName AS 'Client', COUNT(*) AS 'nbre commandes' FROM Orders
JOIN customers
ON orders.customerID = customers.CustomerID
WHERE country = 'France' 
GROUP BY companyname HAVING COUNT(*) > 10;

SELECT CompanyName AS 'Client', SUM(order_details.unitprice*order_details.quantity) AS 'CA', country AS 'Pays'
FROM customers
JOIN orders
ON orders.CustomerID = customers.customerID
JOIN order_details
ON orders.orderID = order_details.OrderID
GROUP BY companyname, country
HAVING SUM(order_details.unitprice*order_details.quantity) > 30000
ORDER BY SUM(order_details.unitprice*order_details.quantity) DESC;


SELECT distinct country AS 'Pays' FROM customers
JOIN orders
ON customers.customerID = orders.CustomerID
JOIN order_details
ON orders.OrderID = order_details.OrderID
WHERE orders.OrderID IN (SELECT order_details.orderID FROM order_details
JOIN products
ON order_details.productID = products.productID
JOIN suppliers
ON products.supplierID = suppliers.SupplierID
WHERE suppliers.CompanyName = 'Exotic liquids');


SELECT SUM(unitprice*quantity) AS 'Montant ventes 97' FROM order_details
JOIN orders
ON orders.orderID = order_details.orderID
WHERE OrderDate LIKE '1997-%';

SELECT MONTH(Orderdate) AS 'Mois 97', SUM(unitprice*quantity) AS 'montant ventes' FROM order_details
JOIN orders
ON orders.orderID = order_details.orderID
WHERE Orderdate LIKE '1997%'
GROUP BY MONTH(Orderdate);

SELECT MAX(Orderdate) AS 'Date de dernière commande' FROM orders
JOIN customers
ON orders.CustomerID = customers.customerID
WHERE customers.companyname = 'Du monde entier';

SELECT round(avg(DATEDIFF(shippeddate, orderdate))) AS 'délai moyen de livraison en jours' FROM orders;