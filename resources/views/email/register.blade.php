<!DOCTYPE html>
<html>

<head>
    <title>Verification Form</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .container {
        background-color: #ffffff;
        border-radius: 8px;
        padding: 30px;
        /* Increased padding for more space */
        box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
        width: 400px;
        /* Increased width */
    }

    .container h2 {
        margin: 0;
        padding-bottom: 10px;
        border-bottom: 1px solid #ccc;
    }

    .alert {
        background-color: #d4edda;
        color: #155724;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 10px;
    }

    .alert.success {
        background-color: #d4edda;
        color: #155724;
    }

    label {
        font-weight: bold;
    }

    input[type="text"],
    input[type="email"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Verification Form</h2>
        <br>
        @if(Session::get('success'))
        <div class="alert success">
            {{ Session::get('success') }}
        </div>
        @endif

        <form method="post" action="{{ route('user.save') }}">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>
