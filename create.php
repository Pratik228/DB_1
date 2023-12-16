<!DOCTYPE html>
<html>
<head>
   <title>Product Entry Form</title>
</head>
<body>
   <h1>Enter Product Details</h1>
   <form action="process_form.php" method="post">
       <label>Product Code: <input type="text" name="productCode" required></label><br>
       <label>Product Name: <input type="text" name="productName" required></label><br>
       <label>Product Line: <input type="text" name="productLine" required></label><br>
       <label>Product Scale: <input type="text" name="productScale" required></label><br>
       <label>Product Vendor: <input type="text" name="productVendor" required></label><br>
       <label>Product Description: <textarea name="productDescription" required></textarea></label><br>
       <label>Quantity in Stock: <input type="number" name="quantityInStock" required></label><br>
       <label>Buy Price: <input type="text" name="buyPrice" required></label><br>
       <label>MSRP: <input type="text" name="MSRP" required></label><br>
       <input type="submit" value="Submit">
   </form>
</body>
</html>
