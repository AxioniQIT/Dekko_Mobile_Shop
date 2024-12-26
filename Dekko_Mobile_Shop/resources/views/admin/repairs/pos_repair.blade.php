<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS System with Repair Details</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #f7f7f7, #e3f4f7);
            color: #333;
            padding: 20px;
        }
        header {
            background-color: #00A9A4;
            color: white;
            padding: 20px 0;
            text-align: center;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        header h1 {
            font-size: 2.2rem;
            font-weight: bold;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .repair-card, .bill-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 30px;
            width: 48%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .repair-card:hover, .bill-card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 18px rgba(0,0,0,0.15);
        }
        .repair-card h3, .bill-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #00A9A4;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        table th {
            background-color: #f1f1f1;
            color: #555;
        }
        table tr:hover {
            background-color: #f9f9f9;
        }
        .btn {
            background-color: #00A9A4;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #007C74;
        }
        .bill-summary {
            background-color: #f7f7f7;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .bill-summary .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }
        .bill-summary .summary-row strong {
            font-size: 1.1rem;
            color: #333;
        }
        .bill-summary .summary-row .value {
            font-size: 1.1rem;
            color: #00A9A4;
        }
        .bill-summary .final-total {
            font-size: 1.6rem;
            color: #00A9A4;
            font-weight: bold;
            margin-top: 20px;
            text-align: center;
        }
        .bill-summary .final-total strong {
            color: #007C74;
        }
        @media (max-width: 768px) {
            .repair-card, .bill-card {
                width: 100%;
            }
        }
        .table-wrapper {
            overflow-x: auto;
        }
    </style>
</head>
<body>

<header>
    <h1>POS System - Repair & Bill Generation</h1>
</header>

<div class="container">
    <!-- Repair Details Section -->
    <div class="repair-card">
        <h3>Repair Details</h3>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Repair ID</th>
                        <th>Customer Name</th>
                        <th>Device</th>
                        <th>Estimated Cost</th>
                        <th>Spare Parts Used</th>
                        <th>Total Cost</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1001</td>
                        <td>John Doe</td>
                        <td>iPhone 12</td>
                        <td>$100</td>
                        <td>2x Screen ($50), 1x Frame ($30)</td>
                        <td>$180</td>
                        <td><button class="btn">Add to Bill</button></td>
                    </tr>
                    <tr>
                        <td>1002</td>
                        <td>Jane Smith</td>
                        <td>Samsung S21</td>
                        <td>$50</td>
                        <td>1x Battery ($40), 1x Cover ($20)</td>
                        <td>$110</td>
                        <td><button class="btn">Add to Bill</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bill Generation Section -->
    <div class="bill-card">
        <h3>Bill Summary</h3>
        <div class="bill-summary">
            <div class="summary-row">
                <strong>Bill ID:</strong>
                <span class="value">1</span>
            </div>
            <div class="summary-row">
                <strong>Customer Name:</strong>
                <span class="value">John Doe</span>
            </div>
            <div class="summary-row">
                <strong>Billing Type:</strong>
                <span class="value">Repair</span>
            </div>
            <div class="summary-row">
                <strong>Total Amount:</strong>
                <span class="value">$180</span>
            </div>
            <div class="summary-row">
                <strong>Discount:</strong>
                <span class="value">$0</span>
            </div>
            <div class="summary-row">
                <strong>Total After Discount:</strong>
                <span class="value">$180</span>
            </div>
            <div class="summary-row">
                <strong>Status:</strong>
                <span class="value">Pending</span>
            </div>
            <div class="final-total">
                <strong>Total Due: $180</strong>
            </div>
            <button class="btn">Finalize Bill</button>
        </div>
    </div>
</div>

</body>
</html>
