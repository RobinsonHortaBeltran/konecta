/*Consulta para saber cual es el producto con mas stock disponible */
select * from products order by stock DESC LIMIT 1;

/*Consulta para saber cual es el producto mas vendido*/
SELECT product_id, SUM(cantidad) as total_sales
FROM sales_product
GROUP BY product_id
ORDER BY total_sales DESC
LIMIT 1;