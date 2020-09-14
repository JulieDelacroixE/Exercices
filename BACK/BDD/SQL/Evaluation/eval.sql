SELECT CompanyName AS 'Société', ContactName AS 'Contact' , ContactTitle AS 'Fonction', phone AS 'Téléphone'
FROM customers
WHERE country = 'France'

SELECT ProductName AS 'Produit', unitprice AS 'Prix'
FROM products
JOIN suppliers
ON products.supplierID = suppliers.SupplierID
WHERE companyName = 'Exotic Liquids'

SELECT CompanyName AS 'Société' , COUNT(*) AS 'Nbre Produits' FROM products
JOIN suppliers 
ON products.supplierID = suppliers.supplierID
WHERE country = 'France'
GROUP BY CompanyName
ORDER BY COUNT(*) DESC

SELECT CompanyName AS 'Client', COUNT(*) AS 'nbre commandes' FROM Orders
JOIN customers
ON orders.customerID = customers.CustomerID
WHERE country = 'France' 
GROUP BY companyname HAVING COUNT(*) > 10
