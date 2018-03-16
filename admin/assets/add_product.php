<?php
echo '
<div class="form-group">
	<label>Product Name</label>
	<input name="name" class="form-control" type="text">
	</div>

	<div class="form-group">
	<label>Category</label>
	<select name="category" class="form-control">
	<option value="1">Rice</option>
	<option value="2">Meat</option>
	</select>
	</div>

	<div class="form-group">
	<label>Stock Price</label>
	<input name="stock_price" class="form-control" type="number">
	</div>

	<div class="form-group">	
	<label>Price Retail</label>
	<input name="price_retail" class="form-control" type="number">
	</div>

	<div class="form-group">
	<label>Stocks on Hand (Per Kilo)</label>
	<input name="stocks_onhand" class="form-control" type="number">
	</div>

	<div class="form-group">
	<label>Description</label>
	<textarea type="text" class="form-control" name="description" rows="4" style="resize: none;" placeholder="Describe the product here" required></textarea>
	</div>
';