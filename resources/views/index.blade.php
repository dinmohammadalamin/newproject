<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form with Phone and Email</title>
    <style>
       
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .field-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .field-container label {
            flex: 1;
            margin-right: 10px;
        }

        .field-container input {
            flex: 2;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .field-container button {
            flex: 1;
            padding: 8px;
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .field-container button:hover {
            background-color: #c82333;
        }

        button.add-btn {
            display: block;
            margin: 10px 0;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button.add-btn:hover {
            background-color: #218838;
        }

        button.remove-btn {
            display: block;
            margin-top: 5px;
            padding: 8px;
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button.remove-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
<div class="container">

    <form  action="{{ url('submitForm') }} method="post">
        @csrf
        <div class="field-container">
                <label for="name_1">Name:</label>
                <input type="text" name="name[]" id="name_1" required>
        </div>
    
        <div id="phoneFieldsContainer">
            <div class="field-container">
            

                <label for="phone_number_1">Phone Number 1:</label>
                <input type="tel" name="phone_number[]" id="phone_number_1" required>
                <button type="button" class="remove-btn" onclick="removeField('phoneFieldsContainer', this)">Remove</button>
            </div>
        </div>

        <button type="button" class="add-btn" onclick="addField('phoneFieldsContainer', 'phone_number', 'Phone Number')">Add Phone Number</button>

        <div id="emailFieldsContainer">
            <div class="field-container">
                <label for="email_1">Email 1:</label>
                <input type="email" name="email[]" id="email_1" required>
                <button type="button" class="remove-btn" onclick="removeField('emailFieldsContainer', this)">Remove</button>
            </div>
        </div>
        <button type="button" class="add-btn" onclick="addField('emailFieldsContainer', 'email', 'Email')">Add Email</button>
        <div class="field-container">
        <label class="col-md-4 control-label">Address</label> 
        <input name="address" placeholder="Address" class="form-control" type="text">
        </div>
       
        <div class="field-container">
        <label class="col-md-4 control-label">City</label> 
        <input name="city" placeholder="city" class="form-control"  type="text">
        </div>

        <div class="field-container">
        <label class="col-md-4 control-label">thana</label> 
        <input name="thana" placeholder="thana" class="form-control"  type="text">
        </div>

       
        <div class="field-container">
        <label class="col-md-4 control-label">password</label> 
        <input name="password" placeholder="password" class="form-control"  type="password">
        </div>
     

        <button type="submit">Submit</button>
    </form>

    <script>
        function addField(containerId, fieldName, label) {
            const container = document.getElementById(containerId);
            const fieldCount = container.querySelectorAll('.field-container').length + 1;

            if (fieldCount <= 3) {
                const newField = document.createElement('div');
                newField.classList.add('field-container');
                newField.innerHTML = `
                    <label for="${fieldName}_${fieldCount}">${label} ${fieldCount}:</label>
                    <input type="${fieldName === 'email' ? 'email' : 'tel'}" name="${fieldName}[]" id="${fieldName}_${fieldCount}" required>
                    <button type="button" class="remove-btn" onclick="removeField('${containerId}', this)">Remove</button>
                `;

                container.appendChild(newField);
            }
        }

        function removeField(containerId, button) {
            const container = document.getElementById(containerId);
            const fieldContainer = button.closest('.field-container');
            container.removeChild(fieldContainer);
        }
        

    </script>

</body>
</html>
