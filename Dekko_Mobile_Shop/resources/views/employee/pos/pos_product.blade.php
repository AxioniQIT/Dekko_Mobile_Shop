<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seller Sales</title>
  <!--<link rel="stylesheet" href="seller.css">-->

  <link rel="stylesheet" href="{{ asset('css/Pos/product_pos.css') }}">

</head>
<body>
  <!-- Header -->
  <header class="header">
    <div class="logo">
      <img src="home-icon.png" alt="Home Icon">
      <span>Home</span>
    </div>
    <h1>Seller Sales</h1>
    <div class="user-menu">
      <span class="user-icon">👤</span>
      <span>Seller</span>
    </div>
    
  </header>
  <button id="dark-mode-toggle" class="dark-mode-btn">🌙</button>
  <!-- Main Content -->
  <main class="container">
    <!-- Filters -->
    <div class="filters">
      <div class="search">
        <input type="text" id="search" placeholder="Search">
        <button><img src="search-icon.png" alt="Search"></button>
      </div>
      <div class="category">
        <input type="text" id="category" placeholder="Category">
      </div>
    </div>

    <!-- Product Table -->
    <div class="product-table">
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Stock</th>
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Mac Book Air</td>
            <td>10</td>
            <td>Laptop</td>
            <td>150000.00</td>
            <td>2</td>
            <td>147000.00</td>
            <th><button>Add</button></th>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Final Bill Section -->
    <div class="final-bill">
      <h2>Final Bill</h2>
      <form>
        <label for="customer-name">Customer Name</label>
        <input type="text" id="customer-name" placeholder="Customer Name">

        <label for="phone-number">Phone Number</label>
        <input type="text" id="phone-number" placeholder="Phone Number">

        <label for="address">Address</label>
        <input type="text" id="address" placeholder="Address">

        <table>
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Color</th>
              <th>Discount</th>
              <th>New Price</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Mac Book Air</td>
              <td>1500</td>
              <td>1</td>
              <td>Silver</td>
              <td>500.00</td>
              <td>10000.00</td>
            </tr>
          </tbody>
        </table>

        <p>Total</p>
        <p>Discount</p>
        <p>Final Total</p>

        <!-- Action Buttons -->
        <button type="button" class="confirm-btn">Confirm</button>
        <button type="button" class="print-btn">Print</button>
      </form>
    </div>
  </main>
</body>
<script src="{{ asset('js/Pos/product_pos.js') }}"></script>
</html>
