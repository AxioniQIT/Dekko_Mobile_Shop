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
            background: #f8f9fa;
            color: #495057;
            padding: 20px;
        }

        header {
            background-color: #FFFFFFFF;
            color: black;
            padding: 25px;
            border-radius: 20px;
            margin-bottom: 50px;
            text-align: center;
        }

        header h1 {
            font-size: 2rem;
            font-weight: 700;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .repair-card, .bill-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 48%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-sizing: border-box;
        }

        .repair-card:hover, .bill-card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
        }

        h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            word-wrap: break-word;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            overflow-wrap: break-word;
        }

        table th {
            background-color: #f1f1f1;
            color: #343a40;
        }

        table tr:hover {
            background-color: #f9f9f9;
        }

        .btn {
            background-color: #28a745;
            color: white;
            padding: 12px 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .btn:hover {
            background-color: #218838;
        }

        .bill-summary {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .summary-row strong {
            font-size: 1.1rem;
            font-weight: 600;
        }

        .summary-row .value {
            font-size: 1.1rem;
            color: #495057;
        }

        .final-total {
            font-size: 1.5rem;
            font-weight: 700;
            color: #28a745;
            margin-top: 20px;
        }

        /* Mobile responsiveness */
        @media (max-width: 768px) {
            header h1 {
                font-size: 1.6rem;
            }

            .container {
                flex-direction: column;
                align-items: center;
                gap: 20px;
            }

            .repair-card, .bill-card {
                width: 90%;
                margin-bottom: 20px;
            }

            table th, table td {
                font-size: 0.9rem;
                padding: 10px;
            }

            .btn {
                font-size: 1rem;
                padding: 14px;
            }

            .bill-summary .summary-row {
                flex-direction: column;
                align-items: flex-start;
            }

            .summary-row strong, .summary-row .value {
                font-size: 1rem;
            }

            .final-total {
                font-size: 1.4rem;
            }
        }

        /* Enhancements for very small screens */
        @media (max-width: 480px) {
            header h1 {
                font-size: 1.4rem;
            }

            .repair-card h3, .bill-card h3 {
                font-size: 1.3rem;
            }

            .btn {
                font-size: 0.9rem;
                padding: 10px 12px;
            }

            .final-total {
                font-size: 1.2rem;
            }

            /* Make the repair details table scrollable */
            table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

            table th, table td {
                min-width: 120px;
                padding: 10px;
            }

            /* Adjust bill summary layout for small screens */
            .bill-summary {
                padding: 15px;
            }

            .summary-row {
                flex-direction: column;
                align-items: flex-start;
            }

            .summary-row strong, .summary-row .value {
                font-size: 1rem;
            }

            .final-total {
                font-size: 1.3rem;
            }
        }
    </style>
</head>
<body>

<header>
    <div class="repair-form">
        <h2>POS System - Repair & Bill Generation</h2>
    </div>
</header>

<div class="container">
    <!-- Repair Details Section -->
    <div class="repair-card">
        <h3>Repair Details</h3>
        <div style="overflow-x:auto;">
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
                    <!-- Dynamic Rows will be inserted here -->
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
                <td><button class="btn" onclick="generateBill(${repair.id})">Generate Bill</button></td>
            `;
            repairList.appendChild(row);
        });
    }

    function generateBill(id) {
        const selectedRepair = repairs.find(r => r.id === id);
        currentBill.customer = selectedRepair.customer;
        currentBill.total = selectedRepair.totalCost;
        billTotal.textContent = currentBill.total;
        document.getElementById("bill-customer").textContent = currentBill.customer;
        document.getElementById("bill-id").textContent = id;
    }

    function finalizeBill() {
        const discount = parseInt(discountInput.value) || 0;
        const totalAfterDiscount = currentBill.total - discount;
        billAfterDiscount.textContent = totalAfterDiscount;
        finalTotal.textContent = `$${totalAfterDiscount}`;
    }

    // Initialize the page with repair details
    loadRepairs();
</script>

</body>
</html>
