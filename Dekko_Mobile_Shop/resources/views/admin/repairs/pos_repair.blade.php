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
        }
        header h1 {
            font-size: 2rem;
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
            transition: transform 0.3s ease;
        }
        .repair-card:hover, .bill-card:hover {
            transform: scale(1.05);
        }
        .repair-card h3, .bill-card h3 {
            font-size: 1.4rem;
            margin-bottom: 10px;
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
            padding: 10px 15px;
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
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .bill-summary .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
        }
        .bill-summary .summary-row strong {
            font-size: 1.1rem;
        }
        .bill-summary .summary-row .value {
            font-size: 1.1rem;
            color: #333;
        }
        .bill-summary .final-total {
            font-size: 1.5rem;
            color: #00A9A4;
            font-weight: bold;
            margin-top: 20px;
        }
        @media (max-width: 768px) {
            .repair-card, .bill-card {
                width: 100%;
            }
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
            <tbody id="repair-list">
                <!-- Dynamic Rows -->
            </tbody>
        </table>
    </div>

    <!-- Bill Generation Section -->
    <div class="bill-card">
        <h3>Bill Summary</h3>
        <div class="bill-summary">
            <div class="summary-row">
                <strong>Bill ID:</strong>
                <span class="value" id="bill-id">1</span>
            </div>
            <div class="summary-row">
                <strong>Customer Name:</strong>
                <span class="value" id="bill-customer">-</span>
            </div>
            <div class="summary-row">
                <strong>Billing Type:</strong>
                <span class="value" id="bill-type">Repair</span>
            </div>
            <div class="summary-row">
                <strong>Total Amount:</strong>
                <span class="value" id="bill-total">0</span>
            </div>
            <div class="summary-row">
                <strong>Discount:</strong>
                <input type="number" id="discount" class="value" style="width: 60px;" value="0" />
            </div>
            <div class="summary-row">
                <strong>Total After Discount:</strong>
                <span class="value" id="bill-after-discount">0</span>
            </div>
            <div class="final-total">
                <strong>Total Due: <span id="final-total">$0</span></strong>
            </div>
            <button class="btn" onclick="finalizeBill()">Finalize Bill</button>
        </div>
    </div>
</div>

<script>
    const repairs = [
        {
            id: 1001,
            customer: "John Doe",
            device: "iPhone 12",
            estimatedCost: 100,
            spareParts: "2x Screen ($50), 1x Frame ($30)",
            totalCost: 180
        },
        {
            id: 1002,
            customer: "Jane Smith",
            device: "Samsung S21",
            estimatedCost: 50,
            spareParts: "1x Battery ($40), 1x Cover ($20)",
            totalCost: 110
        }
    ];

    const repairList = document.getElementById("repair-list");
    const billTotal = document.getElementById("bill-total");
    const discountInput = document.getElementById("discount");
    const billAfterDiscount = document.getElementById("bill-after-discount");
    const finalTotal = document.getElementById("final-total");

    let currentBill = {
        customer: "-",
        total: 0
    };

    function loadRepairs() {
        repairs.forEach((repair) => {
            const row = document.createElement("tr");
            row.innerHTML = `
                <td>${repair.id}</td>
                <td>${repair.customer}</td>
                <td>${repair.device}</td>
                <td>$${repair.estimatedCost}</td>
                <td>${repair.spareParts}</td>
                <td>$${repair.totalCost}</td>
                <td><button class="btn" onclick="addToBill(${repair.id})">Add to Bill</button></td>
            `;
            repairList.appendChild(row);
        });
    }

    function addToBill(id) {
        const repair = repairs.find((r) => r.id === id);
        if (repair) {
            currentBill.customer = repair.customer;
            currentBill.total = repair.totalCost;

            document.getElementById("bill-customer").textContent = repair.customer;
            billTotal.textContent = `$${repair.totalCost}`;
            calculateTotal();
        }
    }

    function calculateTotal() {
        const discount = parseFloat(discountInput.value) || 0;
        const afterDiscount = currentBill.total - discount;
        billAfterDiscount.textContent = `$${afterDiscount}`;
        finalTotal.textContent = `$${afterDiscount}`;
    }

    discountInput.addEventListener("input", calculateTotal);

    function finalizeBill() {
        alert("Bill finalized!");
    }

    loadRepairs();
</script>

</body>
</html>
