SET @productsCount := 0, @collectionID := 0;
SELECT Id, Name, Date, Id_collection, Price
FROM (
    SELECT *,
        @productsCount := if(@collectionID = Id_collection, @productsCount + 1, 1) AS productsCount,
        @collectionID := Id_collection
    FROM products
    ORDER BY Id_collection, Date DESC
) AS p
WHERE p.productsCount <= 2;